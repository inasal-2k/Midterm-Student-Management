<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $status = $request->query('status', 'All');

        $query = Student::orderBy('name');

        if ($search !== '') {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($status !== 'All') {
            $query->where('status', strtolower($status));
        }

        $students = $query->get();

        $totals = [
            'all' => Student::count(),
            'active' => Student::where('status', 'active')->count(),
            'pending' => Student::where('status', 'pending')->count(),
            'inactive' => Student::where('status', 'inactive')->count(),
        ];

        return view('students.index', compact('students', 'search', 'status', 'totals'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30', 'unique:students,phone'],
            'status' => ['required', 'string', 'in:pending,active,inactive'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        abort(404);
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email,' . $student->id],
            'age' => ['required', 'integer', 'min:1', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30', 'unique:students,phone,' . $student->id],
            'status' => ['required', 'string', 'in:pending,active,inactive'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student removed successfully.');
    }
}
