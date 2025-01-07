<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('admin-dashboard.auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->with(['error' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('admin-dashboard.auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->validated(),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                Mail::send('admin-dashboard.emails.password-changed', ['user' => $user], function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Password Successfully Changed');
                });
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin-dashboard.login')->with('success', __($status))
            : back()->with(['error' => __($status)]);
    }
}
