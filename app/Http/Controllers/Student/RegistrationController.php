<?php

namespace App\Http\Controllers\Student;

use App\Services\AesEncryptionService;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $action = route('student.registration.store');
        $method = 'POST';
        return view('student.registration', compact('action', 'method'));
    }

    public function create()
    {
        return view('student.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomor_hp' => 'required',
            'asal_sekolah' => 'required',
            'jalur' => 'required',
        ]);

        Student::create([

            'nomor_pendaftaran' =>
            RegistrationNumberService::generate(),

            'user_id' => auth()->id(),

            'nik' => AesEncryptionService::encrypt($request->nik),

            'nisn' => AesEncryptionService::encrypt($request->nisn),

            'nama_lengkap' => $request->nama_lengkap,

            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => $request->tanggal_lahir,

            'alamat' => AesEncryptionService::encrypt($request->alamat),

            'nama_ayah' => AesEncryptionService::encrypt($request->nama_ayah),

            'nama_ibu' => AesEncryptionService::encrypt($request->nama_ibu),

            'nomor_hp' => AesEncryptionService::encrypt($request->nomor_hp),

            'asal_sekolah' => $request->asal_sekolah,

            'jalur' => $request->jalur,

            'status' => 'pending'

        ]);
        return redirect()
            ->route('student.dashboard')
            ->with('success', 'Data berhasil disimpan');
    }
}
