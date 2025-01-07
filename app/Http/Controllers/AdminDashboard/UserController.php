<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Facades\UserPreference;
use App\Facades\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\UpdateRecordsPerPageRequest;
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
        return view('admin-dashboard.user.create');
    }

    public function store()
    {

    }

    public function updateRecordsPerPage(UpdateRecordsPerPageRequest $request)
    {
        // Directly call the service method without duplication
        UserPreference::savePreference(Auth::id(), 'users', 'records_per_page', $request->input('page_size'));

        return redirect()->route('admin-dashboard.users.index');
    }
}
