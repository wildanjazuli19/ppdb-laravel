<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('status', 'published')
            ->whereDate('tanggal_publish', '<=', now())
            ->latest('tanggal_publish')
            ->take(3)
            ->get();

        // dd($announcements);
        return view('student.dashboard', compact('announcements'));
    }
}
