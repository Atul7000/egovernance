<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;

        return response()->json(['token' => $token, 'message' => 'Login successfully'], 200);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $user->tokens()->delete(); 
            return response()->json(['message' => 'Logged out successfully'], 200);
        }
    
        return response()->json(['error' => 'No authenticated user'], 401);
    }

    /**
     * Get student data
     *
     * @param  mixed $id
     * @return void
     */
    public function getStudentData($id)
    {
        // Ensure user is authenticated
        if (!Auth::guard('api')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // Fetch student data with related records (if any)
        $student = Student::with('percentages')->find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json($student);
    }

    
    /**
     * Show student data in the table
     *
     * @param  mixed $id
     * @return void
     */
    public function getStudentDataTable($id)
    {
        // Fetch student data with related records (if any)
        $student = Student::with('percentages')->find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json(['data'=>$student]);
    }
}
