<?php

namespace App\Http\Controllers\Student;

use App\Services\AesEncryptionService;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\RegistrationNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', Auth::id())->first();
        // dd($student);

        $action = $student
            ? route('student.registration.update', $student->id)
            : route('student.registration.store');

        $method = $student ? 'PUT' : 'POST';
        $action = route('student.registration.store');

        return view('student.registration', compact('action', 'method', 'student'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'jalur' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Student::create([

            'nomor_pendaftaran' =>
            $request->nomor_pendaftaran,

            'user_id' => auth()->id(),

            'nik' => $request->nik,

            'nisn' => $request->nisn,

            'nama_lengkap' => $request->nama_lengkap,

            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => $request->tanggal_lahir,

            'alamat' => $request->alamat,

            'nama_ayah' => $request->nama_ayah,

            'nama_ibu' => $request->nama_ibu,

            'no_hp' => $request->no_hp,

            'asal_sekolah' => $request->asal_sekolah,

            'jalur' => $request->jalur,

            'status' => 'pending',
            'jenis_kelamin' => $request->jenis_kelamin,

        ]);
        return redirect()
            ->route('student.registration')
            ->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request)
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'nullable|email|max:255',
            'nik'            => 'required|string|max:16',
            'nisn'           => 'required|string|max:10',
            'asal_sekolah'   => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:100',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
            'no_hp'          => 'required|string|max:15',
            'jalur'          => 'required|string|max:50',
            'alamat'         => 'required|string',
            'nama_ayah'      => 'required|string|max:255',
            'nama_ibu'       => 'required|string|max:255',
        ]);

        $student->update($validated);

        return redirect()
            ->route('student.registration.index')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }
}
