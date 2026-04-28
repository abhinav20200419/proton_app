<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSession;
use App\Models\ClassModel;
use App\Models\Batch;
use App\Models\Teacher;
use App\Models\User;

class AcademicSeeder extends Seeder
{
    public function run()
    {
        $session = UserSession::create([
            'name' => '2026-27',
            'start_date' => '2026-04-01',
            'end_date' => '2027-03-31',
            'is_active' => true
        ]);

        $class11 = ClassModel::create(['name' => '11th']);
        $class12 = ClassModel::create(['name' => '12th']);

        $teacherUser = User::where('email', 'teacher@test.com')->first();

        $teacher = Teacher::create([
            'user_id' => $teacherUser->id,
            'phone' => '9999999999',
            'specialization' => 'Biology'
        ]);

        Batch::create([
            'class_id' => $class11->id,
            'teacher_id' => $teacher->id,
            'session_id' => $session->id,
            'name' => 'NEET Batch A'
        ]);
    }
}
