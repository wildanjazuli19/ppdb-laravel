<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $totalPendaftar = Student::count();

        $totalVerifikasi = Student::where(
            'status_verifikasi',
            'verified'
        )->count();

        $totalDiterima = Student::where(
            'status_seleksi',
            'diterima'
        )->count();

        $totalDitolak = Student::where(
            'status_seleksi',
            'ditolak'
        )->count();

        $zonasi = Student::where(
            'jalur',
            'zonasi'
        )->count();

        $prestasi = Student::where(
            'jalur',
            'prestasi'
        )->count();

        $students = Student::selectRaw('
                jalur,
                count(*) as total
            ')
            ->groupBy('jalur')
            ->get();

        return view(
            'admin.reports.index',
            compact(
                'totalPendaftar',
                'totalVerifikasi',
                'totalDiterima',
                'totalDitolak',
                'zonasi',
                'prestasi',
                'students'
            )
        );
    }
}
