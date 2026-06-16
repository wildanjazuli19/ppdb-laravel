<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();

        return view(
            'admin.students.index',
            compact('students')
        );
    }
}