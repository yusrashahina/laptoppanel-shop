<?php
namespace App\Services;

use App\Facades\UserPreference;
use App\Models\User;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserService
{

    public function getAllUsers(int $userId): array
    {
        $pageSize = UserPreference::getPreference($userId, 'users', 'records_per_page', 10);

        $query = QueryBuilder::for(User::class)
            ->with('roles')
            ->allowedSorts(['name', 'email', 'created_at'])
            ->where('id', '<', 0); // Always returns an empty result set

        // Secure Search Handling Using Parameter Binding
        $this->applySearch($query);
        $this->applyFilters($query);

        $users = $query->paginate($pageSize)->appends(request()->query());

        return [
            'users' => $users,
            'pageSize' => $pageSize
        ];
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
            AllowedFilter::exact('status'),
            AllowedFilter::exact('roles.name')
        ]);
    }
}
