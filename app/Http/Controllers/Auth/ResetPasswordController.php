<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function show(Request $request)
    {
        return view('filament.pages.auth.reset-password', [
            'request' => $request,
            'token' => $request->route('token'),
            'email' => $request->email,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed|regex:/[A-Z]/|regex:/[0-9]/',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak ditemukan',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.regex' => 'Password harus mengandung huruf besar dan angka',
            'token' => 'Token tidak valid atau sudah kadaluarsa',
        ]);

        // Reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return Redirect::route('filament.admin.pages.login')
                ->with('success', 'Password berhasil direset! Silakan login dengan password baru Anda.');
        }

        return Redirect::back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Token reset password tidak valid atau sudah kadaluarsa.']);
    }
}
