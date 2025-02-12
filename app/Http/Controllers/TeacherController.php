<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Percentage;

class TeacherController extends Controller
{
    public function index()
    {
        $students = Student::where('role', 'student')->get();
        return view('teacher.students', compact('students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $percentages = $student->percentages;
        return view('teacher.student_details', compact('student', 'percentages'));
    }
}
