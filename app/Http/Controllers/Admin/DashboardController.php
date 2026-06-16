<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }

    public function index()
    {
        $data = [
            'totalStudents' => Student::count(),
            'totalVerified' => Student::where('status_verifikasi', 'diterima')->count(),
            'totalAccepted' => Student::where('status', 'accepted')->count(),
            'totalRejected' => Student::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', $data);
    }
}
