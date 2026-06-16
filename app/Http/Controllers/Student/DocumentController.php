<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function create()
    {
        return view('student.documents');
    }

    public function store(Request $request)
{
    $request->validate([
        'kk' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        'akta' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        'rapor' => 'nullable|mimes:pdf,jpg,jpeg,png|max:4096',
        'surat_lulus' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        'sertifikat' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $student = Student::where(
        'user_id',
        auth()->id()
    )->first();

    if (!$student) {
        return back()->with(
            'error',
            'Silakan isi formulir pendaftaran terlebih dahulu'
        );
    }

    Document::updateOrCreate(
        [
            'student_id' => $student->id
        ],
        [
            'kk' => $request->file('kk')
                ? $request->file('kk')->store('kk', 'public')
                : null,

            'akta' => $request->file('akta')
                ? $request->file('akta')->store('akta', 'public')
                : null,

            'rapor' => $request->file('rapor')
                ? $request->file('rapor')->store('rapor', 'public')
                : null,

            'surat_lulus' => $request->file('surat_lulus')
                ? $request->file('surat_lulus')->store('surat_lulus', 'public')
                : null,

            'sertifikat' => $request->file('sertifikat')
                ? $request->file('sertifikat')->store('sertifikat', 'public')
                : null,

            'status' => 'pending'
        ]
    );

    return redirect()
        ->route('student.dashboard')
        ->with(
            'success',
            'Dokumen berhasil diupload'
        );
}
}