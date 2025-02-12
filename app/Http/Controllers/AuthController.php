<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6|confirmed',
            'mobile_no' => 'required|digits:10',
            'pan_card_no' => 'required|unique:students',
            'id_card_path' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('id_card_path')->store('uploads');

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_no' => $request->mobile_no,
            'pan_card_no' => $request->pan_card_no,
            'id_card_path' => $path,
            'role' => 'student',
        ]);

        return redirect('/login');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get authenticated user
            if ($user->role == 'teacher') {
                return redirect('/teacher/students');
            } else {
                return redirect('/student/dashboard');
            }
        }
    
        return back()->withErrors(['Invalid credentials']);
    }
}
