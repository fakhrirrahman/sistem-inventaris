<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('filament.pages.auth.forgot-password');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar di sistem',
        ]);

        // Send password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return Redirect::route('password.request')
                ->with('status', 'Link reset password telah dikirim ke email Anda! Silakan cek email untuk melanjutkan.');
        }

        return Redirect::route('password.request')
            ->withErrors(['email' => 'Gagal mengirim link reset password. Silakan coba lagi.']);
    }
}
