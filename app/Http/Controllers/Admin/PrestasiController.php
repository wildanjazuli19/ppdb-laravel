<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $students = Student::with('school')
            ->where('jalur', 'prestasi')
            ->orderByDesc('nilai_prestasi')
            ->get();

        return view(
            'admin.prestasi.index',
            compact('students')
        );
    }

    public function process()
    {
        $schools = School::all();

        foreach ($schools as $school) {

            $students = Student::where('school_id', $school->id)
                ->where('jalur', 'prestasi')
                ->where('status_verifikasi', 'verified')
                ->get();

            foreach ($students as $student) {

                $nilaiPrestasi =
                    ($student->nilai_rapor * 0.7) +
                    ($student->poin_sertifikat * 0.3);

                $student->update([
                    'nilai_prestasi' => $nilaiPrestasi
                ]);
            }

            $ranking = Student::where('school_id', $school->id)
                ->where('jalur', 'prestasi')
                ->where('status_verifikasi', 'verified')
                ->orderByDesc('nilai_prestasi')
                ->get();

            foreach ($ranking as $index => $student) {

                $student->update([
                    'status_seleksi' => $index < $school->kuota_prestasi
                        ? 'diterima'
                        : 'ditolak'
                ]);
            }
        }

        return back()->with(
            'success',
            'Seleksi prestasi berhasil diproses.'
        );
    }
}
