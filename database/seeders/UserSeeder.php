<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach(Role::where('name', 'admin')->first());

        // Accountant
        $acc = User::create([
            'name' => 'Accountant',
            'email' => 'acc@test.com',
            'password' => Hash::make('password')
        ]);

        $acc->roles()->attach(Role::where('name', 'accountant')->first());

        // Teacher
        $teacherUser = User::create([
            'name' => 'Teacher One',
            'email' => 'teacher@test.com',
            'password' => Hash::make('password')
        ]);

        $teacherUser->roles()->attach(Role::where('name', 'teacher')->first());
    }
}