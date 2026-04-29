<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    $students = Student::all();
    return view('students.index', compact('students'));
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    Student::create([
        'name' => $request->name,
        'course' => $request->course,
        'year' => $request->year,
    ]);

    return redirect('/students');
}
}
