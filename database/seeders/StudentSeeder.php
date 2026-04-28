<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $batch = Batch::first();
        $role = Role::where('name', 'student')->first();

        for ($i = 1; $i <= 20; $i++) {

            $user = User::create([
                'name' => "Student $i",
                'email' => "student$i@test.com",
                'password' => Hash::make('password')
            ]);

            $user->roles()->attach($role);

            Student::create([
                'user_id' => $user->id,
                'name' => "Student $i",
                'father_name' => "Father $i",
                'phone' => '900000000' . $i,
                'admission_no' => 'ADM' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'admission_date' => now(),
                'session_id' => $batch->session_id,
                'batch_id' => $batch->id,
                'fee_type' => $i % 2 == 0 ? 'monthly' : 'yearly',
                'fee_start_date' => now(),
                'status' => true
            ]);
        }
    }
}