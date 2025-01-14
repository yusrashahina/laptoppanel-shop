<?php
namespace App\Services;

use App\Facades\UserPreference;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserService
{

    public function getAllUsers(int $userId): array
    {
        $pageSize = UserPreference::getPreference($userId, 'users', 'records_per_page', 10);

        $query = QueryBuilder::for(User::class)
            ->with(['roles' => function ($query) {
                $query->select('id', 'name');
            }])
            ->allowedSorts(['name', 'email', 'created_at', 'status']);

        $this->applySearch($query);
        $this->applyFilters($query);

        $users = $query->paginate($pageSize)->appends(request()->query());

        return array_merge(
            ['users' => $users, 'pageSize' => $pageSize],
            $this->getUserCounts()
        );
    }

    private function applySearch(QueryBuilder $query): void
    {
        if (request()->filled('search')) {
            $searchTerm = request('search');

            // Secure binding using whereRaw and parameter binding
            $query->where(function ($q) use ($searchTerm) {
                $q->whereRaw('name LIKE ?', ['%' . $searchTerm . '%'])
                    ->orWhereRaw('email LIKE ?', ['%' . $searchTerm . '%']);
            });
        }
    }

    private function applyFilters(QueryBuilder $query): void
    {
        $query->allowedFilters([
            AllowedFilter::exact('status'), // Active (1) / Suspended (0)
            AllowedFilter::exact('roles.name'), // Filtering by roles
            AllowedFilter::callback('trashed', function ($query) {
                $query->onlyTrashed(); // Soft-deleted users only
            }),
        ]);
    }

    private function getUserCounts(): array
    {
        $counts = User::selectRaw("COUNT(*) as totalUsers, SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as activeUsers, SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as suspendedUsers")->first();
        $trashedUsers = User::onlyTrashed()->count();

        return [
            'totalUsers' => $counts->totalUsers,
            'activeUsers' => $counts->activeUsers,
            'suspendedUsers' => $counts->suspendedUsers,
            'trashedUsers' => $trashedUsers
        ];
    }

    public function bulkUpdateUsers(array $userIds, string $action): void
    {
        $this->preventSelfAction($userIds);
        match ($action) {
            'activate' => $this->activateUsers($userIds),
            'suspend' => $this->suspendUsers($userIds),
            'trash' => $this->trashUsers($userIds),
            'restore' => $this->restoreUsers($userIds),
            default => throw new \InvalidArgumentException('Invalid bulk action provided.'),
        };
    }

    public function bulkDeleteUsers(array $userIds): void
    {
        User::onlyTrashed()->whereIn('id', $userIds)->forceDelete();
    }

    private function activateUsers(array $userIds): void
    {
        User::whereIn('id', $userIds)->update(['status' => 1]);
    }

    private function suspendUsers(array $userIds): void
    {
        User::whereIn('id', $userIds)->update(['status' => 0]);
    }

    private function trashUsers(array $userIds): void
    {
        User::whereIn('id', $userIds)->delete();
    }

    private function restoreUsers(array $userIds): void
    {
        User::onlyTrashed()->whereIn('id', $userIds)->restore();
    }

    private function preventSelfAction(array $userIds): void
    {
        if (in_array(auth()->id(), $userIds)) {
            throw new \Exception("You cannot perform this action on yourself.");
        }
    }

    public function storeUser(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            if (isset($data['role_id'])) {
                $role = Role::findOrFail($data['role_id']); // Ensure the role exists
                $user->assignRole($role);
            }

            return $user;
        });
    }

}
