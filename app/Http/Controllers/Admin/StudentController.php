<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);

        // dd($students);

        return view('admin.students.index', compact('students'));
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
            'nik' => 'required|unique:students',
            'nisn' => 'required|unique:students',
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

        $validated['user_id'] = auth()->id();

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Student $student)
    {
        $action = route('admin.students.update', $student);
        $method = 'PUT';
        return view('admin.students.form', compact('student', 'action', 'method'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nomor_pendaftaran' => 'required|unique:students,nomor_pendaftaran,' . $student->id,
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
