<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\LoginRequest;
use App\Http\Requests\AdminDashboard\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin-dashboard.auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            Auth::user()->update([
                'last_login' => now(),
            ]);
            return redirect()->intended('dashboard');
        }
        return back()->with(['error' => 'Incorrect email or password'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin-dashboard.login');
    }
}
