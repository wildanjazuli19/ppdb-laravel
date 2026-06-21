<?php

namespace App\Http\Controllers\Student;

use App\Services\AesEncryptionService;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use App\Services\DistanceService;
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

    public function store(Request $request, DistanceService $distanceService)
    {
        // dd($request->all());
        $data = $request->validate([
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

        $data['school_id'] = null;

        if ($request->jalur === 'zonasi') {
            $data['school_id'] = 1;
            $school = School::findOrFail(1);
            $jarak = $distanceService->calculateKm(
                $request->latitude,
                $request->longitude,
                $school->latitude,
                $school->longitude
            );
            // dd($jarak);
            $data['jarak_zonasi'] = $jarak;
            $data['latitude'] = $request->latitude;
            $data['longitude'] = $request->longitude;
        }

        if ($request->jalur === 'prestasi') {
            $data['nilai_rapor'] = $request->nilai_rapor;
            $data['school_id'] = 1;
            // dd($data);
            // $data['poin_sertifikat'] = $request->poin_sertifikat;
            // $data['nilai_prestasi'] = $request->nilai_prestasi;
        }

        $data['user_id'] = auth()->id();
        $data['nomor_pendaftaran'] = $request->nomor_pendaftaran;
        $data['status'] = 'pending';

        Student::create($data);

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
            ->route('student.registration')
            ->with('success', 'Data pendaftaran berhasil diperbarui.');
    }
}
