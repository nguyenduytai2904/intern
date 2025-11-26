<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id . '|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $student->update($validated);

        return redirect()->route('students.show', $student)->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        $name = $student->name;
        $student->delete();

        return redirect()->route('students.index')->with('success', "Student '{$name}' deleted successfully!");
    }
}
