<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class ZonasiController extends Controller
{
    public function index()
    {
        $schools = School::all();

        return view('admin.zonasi.index', compact('schools'));
    }

    public function process()
    {
        $schools = School::all();

        foreach ($schools as $school) {

            $students = Student::where('school_id', $school->id)
                ->where('jalur', 'zonasi')
                ->where('status_verifikasi', 'verified')
                ->get();

            foreach ($students as $student) {

                $student->jarak_zonasi = $this->calculateDistance(
                    $student->latitude,
                    $student->longitude,
                    $school->latitude,
                    $school->longitude
                );

                $student->save();
            }

            $ranked = Student::where('school_id', $school->id)
                ->where('jalur', 'zonasi')
                ->where('status_verifikasi', 'verified')
                ->orderBy('jarak_zonasi')
                ->get();

            foreach ($ranked as $index => $student) {

                $student->update([
                    'status_seleksi' => $index < $school->kuota_zonasi
                        ? 'diterima'
                        : 'ditolak'
                ]);
            }
        }

        return back()->with(
            'success',
            'Seleksi zonasi berhasil diproses.'
        );
    }

    private function calculateDistance(
        $lat1,
        $lon1,
        $lat2,
        $lon2
    ) {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a =
            sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) *
            cos(deg2rad($lat2)) *
            sin($dLon / 2) *
            sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return round($earthRadius * $c, 2);
    }
}
