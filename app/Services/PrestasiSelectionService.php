<?php

namespace App\Services;

use App\Models\Student;

class PrestasiSelectionService
{
    public static function calculate(Student $student): void
    {
        // Hanya jalur prestasi
        if ($student->jalur !== 'prestasi') {
            return;
        }

        // Verifikasi siswa harus selesai
        if ($student->status_verifikasi !== 'verified') {
            return;
        }

        // Nilai rapor wajib sudah ada
        if (is_null($student->nilai_rapor)) {
            return;
        }

        // Semua sertifikat harus sudah diproses (tidak ada yang pending)
        $hasPendingCertificate = $student->certificates()
            ->where('status_verifikasi', 'pending')
            ->exists();

        if ($hasPendingCertificate) {
            return;
        }

        $nilaiPrestasi =
            ($student->nilai_rapor * 0.70) +
            (($student->poin_sertifikat ?? 0) * 0.30);

        $student->update([
            'nilai_prestasi' => round($nilaiPrestasi, 2),
        ]);
    }
}
