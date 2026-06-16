<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        return view('student.dashboard');
    }
}
