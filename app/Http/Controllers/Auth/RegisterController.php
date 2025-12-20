<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function show()
    {
        return view('filament.pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'class' => 'required|string|max:100',
            'major' => 'required|string|max:100',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'class' => $request->class,
            'major' => $request->major,
            'email_verified_at' => now(),
        ]);
        $user->assignRole('User');


        return Redirect::route('filament.admin.pages.register')
            ->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}