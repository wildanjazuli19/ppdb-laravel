<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()
            ->paginate(10);

        return view(
            'student.announcements',
            compact('announcements')
        );
    }

    public function show(Announcement $announcement)
    {
        // abort_if(!$announcement->status, 404);

        return view('student.announcement.show', compact('announcement'));
    }
}
