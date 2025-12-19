<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => '123 Admin St',
            'phone' => '1234567890',
            'class' => 'Admin Class',
            'major' => 'Administration',
        ]);
    }
}
