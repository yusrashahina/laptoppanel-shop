<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Facades\RoleService;
use App\Facades\UserPreference;
use App\Facades\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\BulkUpdateUsersRequest;
use App\Http\Requests\AdminDashboard\UpdateRecordsPerPageRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = UserService::getAllUsers(Auth::id());
        return view('admin-dashboard.user.index', $data);

    }

    public function create()
    {
        $roles = RoleService::getRoleNamesWithIds();
        return view('admin-dashboard.user.create',compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        UserService::storeUser($request->validated());
        return redirect()->route('admin-dashboard.users.index')->with('success', 'User created successfully.');
    }

    public function updateRecordsPerPage(UpdateRecordsPerPageRequest $request)
    {
        UserPreference::savePreference(Auth::id(), 'users', 'records_per_page', $request->input('page_size'));
        return redirect()->route('admin-dashboard.users.index');
    }

    public function bulkUpdateUsers(BulkUpdateUsersRequest $request)
    {
        UserService::bulkUpdateUsers(
            $request->validated()['user_ids'],
            $request->validated()['action']
        );

        return response()->json(['message' => 'Bulk action completed successfully.']);
    }


    public function bulkDeleteUsers(BulkUpdateUsersRequest $request)
    {
        UserService::bulkDeleteUsers($request->validated()['user_ids']);
        return response()->json(['message' => 'Users permanently deleted successfully.']);
    }
}
