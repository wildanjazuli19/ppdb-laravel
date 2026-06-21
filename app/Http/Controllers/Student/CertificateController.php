<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function store(Request $request, Student $student)
    {
        // hanya boleh input sertifikat jika jalur prestasi
        if (($student->jalur ?? null) !== 'prestasi') {
            return back()->with('error', 'Sertifikat hanya bisa ditambahkan untuk jalur prestasi.');
        }

        $validated = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'peringkat' => ['nullable', 'string', 'max:100'],
            'file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('certificates', 'public');
        }

        Certificate::create([
            'student_id' => $student->id,
            'nama_prestasi' => $validated['nama_prestasi'],
            'tingkat' => $validated['tingkat'],
            'peringkat' => $validated['peringkat'] ?? null,
            'file' => $path,
            'status_verifikasi' => 'pending',
            'poin' => 0,
        ]);

        return back()->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $student = $certificate->student;

        if (($student->jalur_pendaftaran ?? null) !== 'prestasi') {
            return back()->with('error', 'Sertifikat hanya bisa diubah untuk jalur prestasi.');
        }

        $validated = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'peringkat' => ['nullable', 'string', 'max:100'],
            'file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ]);

        $data = [
            'nama_prestasi' => $validated['nama_prestasi'],
            'tingkat' => $validated['tingkat'],
            'peringkat' => $validated['peringkat'] ?? null,
        ];

        if ($request->hasFile('file')) {
            if ($certificate->file && Storage::disk('public')->exists($certificate->file)) {
                Storage::disk('public')->delete($certificate->file);
            }

            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        $certificate->update($data);

        return back()->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file && Storage::disk('public')->exists($certificate->file)) {
            Storage::disk('public')->delete($certificate->file);
        }

        $certificate->delete();

        return back()->with('success', 'Sertifikat berhasil dihapus.');
    }
}
