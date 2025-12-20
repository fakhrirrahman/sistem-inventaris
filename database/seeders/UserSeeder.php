<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $user = User::create([
            'name' => 'Admin User',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'address' => '123 Admin St',
            'phone' => '1234567890',
            'class' => 'Admin Class',
            'major' => 'Administration',
        ]);
        $user->assignRole('SuperAdmin');
    }
}
