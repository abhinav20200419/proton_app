<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeeStructure;
use App\Models\Student;
use App\Models\StudentFeeAssignment;

class FeeSeeder extends Seeder
{
    public function run()
    {
        $classId = 1;

        $monthly = FeeStructure::create([
            'class_id' => $classId,
            'name' => 'Monthly Plan',
            'fee_type' => 'monthly',
            'monthly_amount' => 2000
        ]);

        $yearly = FeeStructure::create([
            'class_id' => $classId,
            'name' => 'Yearly Plan',
            'fee_type' => 'yearly',
            'total_amount' => 20000
        ]);

        $students = Student::all();

        foreach ($students as $student) {

            $structure = $student->fee_type === 'monthly' ? $monthly : $yearly;

            StudentFeeAssignment::create([
                'student_id' => $student->id,
                'fee_structure_id' => $structure->id,
                'start_date' => now(),
                'discount_type' => 'fixed',
                'discount_value' => rand(0, 500),
                'discount_reason' => 'Test Discount',
                'final_amount' => 18000
            ]);
        }
    }
}