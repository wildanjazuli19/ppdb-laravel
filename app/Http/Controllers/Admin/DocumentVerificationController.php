<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentVerificationController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);

        return view(
            'admin.document-verifications.index',
            compact('students')
        );
    }

    public function show(Student $student)
    {
        // dd($student);
        return view(
            'admin.document-verifications.show',
            compact('student')
        );
    }

    public function update(Request $request, Student $student)
    {
        // dd($request);
        $request->validate([
            'status_verifikasi' => 'required|in:pending,verified,rejected',
            'catatan_verifikasi' => 'nullable|string',
        ]);

        $student->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_verifikasi' => $request->catatan_verifikasi,
        ]);

        return redirect()
            ->route('admin.document-verifications.index')
            ->with('success', 'Verifikasi berhasil diperbarui.');
    }


    // public function verifyCertificate(Request $request, Certificate $certificate)
    // {
    //     $validated = $request->validate([
    //         'status_verifikasi' => ['required', 'in:pending,verified,rejected'],
    //         'poin' => ['nullable', 'integer', 'min:0'],
    //     ]);

    //     $certificate->update([
    //         'status_verifikasi' => $validated['status_verifikasi'],
    //         'poin' => $validated['poin'] ?? 0,
    //     ]);

    //     return back()->with('success', 'Verifikasi sertifikat berhasil disimpan.');
    // }

    public function verifyCertificate(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'status_verifikasi' => ['required', 'in:pending,verified,rejected'],
            'poin' => ['nullable', 'integer', 'min:0'],
        ]);

        DB::transaction(function () use ($certificate, $validated) {
            // 1. Update sertifikat yang sedang diverifikasi
            $certificate->update([
                'status_verifikasi' => $validated['status_verifikasi'],
                'poin' => $validated['poin'] ?? 0,
            ]);

            // 2. Hitung total poin semua sertifikat milik student
            //    Jika hanya sertifikat yang verified yang dihitung, lihat opsi di bawah
            $totalPoin = Certificate::where('student_id', $certificate->student_id)
                ->sum('poin');

            // 3. Update total poin ke tabel students
            $certificate->student()->update([
                'poin_sertifikat' => $totalPoin,
            ]);
        });

        return back()->with('success', 'Verifikasi sertifikat berhasil disimpan.');
    }
}
