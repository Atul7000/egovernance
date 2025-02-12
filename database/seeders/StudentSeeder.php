<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => 'Admin Teacher',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'mobile_no' => '9876543210',
            'pan_card_no' => 'ABCDE1234F',
            'id_card_path' => 'uploads/admin_id.pdf',
            'role' => 'teacher',
        ]);

        for ($i = 1; $i <= 9; $i++) {
            Student::create([
                'name' => "Student $i",
                'email' => "student$i@example.com",
                'password' => Hash::make('password'),
                'mobile_no' => '987654321' . $i,
                'pan_card_no' => 'ABCDE123' . $i,
                'id_card_path' => "uploads/student$i.pdf",
                'role' => 'student',
            ]);
        }
    }
}
