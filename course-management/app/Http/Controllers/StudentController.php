<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        $students = Student::orderBy('name')->get();

        return view('students.index', compact('students'));
    }
}
