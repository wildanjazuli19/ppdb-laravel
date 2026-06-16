<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\RSAService;

class StudentController extends Controller
{
    protected $rsa;

    public function __construct(RSAService $rsa)
    {
        $this->rsa = $rsa;
    }

    public function index()
    {
        $students = Student::latest()->paginate(10);

        foreach ($students as $student) {

            $student->nik = $this->rsa->decrypt($student->nik);

            $student->nisn = $this->rsa->decrypt($student->nisn);

            $student->no_hp = $this->rsa->decrypt($student->no_hp);

            $student->nama_ayah = $this->rsa->decrypt($student->nama_ayah);

            $student->nama_ibu = $this->rsa->decrypt($student->nama_ibu);
        }

        return view(
            'admin.students.index',
            compact('students')
        );
    }

    public function create()
    {
        $action = route('admin.students.store');
        $method = 'POST';
        return view('admin.students.form', compact('action', 'method'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'nisn' => 'required',
            'asal_sekolah' => 'required',
            'nomor_pendaftaran' => 'required|unique:students',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp' => 'required',
            'jalur' => 'required|in:reguler,prestasi,zonasi',
        ]);

        $validated['nik'] =
            $this->rsa->encrypt($validated['nik']);

        $validated['nisn'] =
            $this->rsa->encrypt($validated['nisn']);

        $validated['alamat'] =
            $this->rsa->encrypt($validated['alamat']);

        $validated['nama_ayah'] =
            $this->rsa->encrypt($validated['nama_ayah']);

        $validated['nama_ibu'] =
            $this->rsa->encrypt($validated['nama_ibu']);

        $validated['no_hp'] =
            $this->rsa->encrypt($validated['no_hp']);

        $validated['user_id'] = auth()->id();

        Student::create($validated);

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Data siswa berhasil ditambahkan.'
            );
    }

    public function edit(Student $student)
    {
        $student->nik =
            $this->rsa->decrypt($student->nik);

        $student->nisn =
            $this->rsa->decrypt($student->nisn);

        $student->alamat =
            $this->rsa->decrypt($student->alamat);

        $student->nama_ayah =
            $this->rsa->decrypt($student->nama_ayah);

        $student->nama_ibu =
            $this->rsa->decrypt($student->nama_ibu);

        $student->no_hp =
            $this->rsa->decrypt($student->no_hp);

        $action = route(
            'admin.students.update',
            $student
        );

        $method = 'PUT';

        return view(
            'admin.students.form',
            compact(
                'student',
                'action',
                'method'
            )
        );
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nomor_pendaftaran' =>
            'required|unique:students,nomor_pendaftaran,' . $student->id,
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $validated['alamat'] =
            $this->rsa->encrypt($validated['alamat']);

        $student->update($validated);

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Data siswa berhasil diperbarui.'
            );
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Data siswa berhasil dihapus.'
            );
    }
}
