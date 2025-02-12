<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Percentage;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $percentages = Auth::user()->percentages;
        return view('student.dashboard', compact('percentages'));
    }

    public function storePercentage(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'standard' => 'required|string',
            'percentage' => 'required|numeric|between:0,100',
        ]);

        Percentage::create([
            'student_id' => Auth::id(),
            'year' => $request->year,
            'standard' => $request->standard,
            'percentage' => $request->percentage,
        ]);

        return back()->with('success', 'Percentage added successfully!');
    }
}
