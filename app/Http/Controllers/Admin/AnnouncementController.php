<?php

namespace App\Http\Controllers\Admin;

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
            'admin.announcements.index',
            compact('announcements')
        );
    }

    public function create()
    {
        return view('admin.announcements.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tanggal_publish' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        $validated['user_id'] = auth()->id();

        Announcement::create($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Announcement $announcement)
    {
        return view(
            'admin.announcements.form',
            compact('announcement')
        );
    }

    public function update(
        Request $request,
        Announcement $announcement
    ) {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tanggal_publish' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        $announcement->update($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with(
            'success',
            'Pengumuman berhasil dihapus.'
        );
    }
}
