@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('page-title', '👨‍🎓 Data Siswa')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

    <div>
        <h3 class="text-2xl font-bold">Daftar Siswa</h3>
        <p class="text-slate-400">
            Kelola seluruh data calon peserta didik.
        </p>
    </div>

    <a href="{{ route('admin.students.create') }}"
        class="bg-blue-600 hover:bg-blue-700 px-4 py-3 rounded-lg font-medium transition">
        + Tambah Siswa
    </a>


</div>

<div class="glass rounded-2xl overflow-hidden">


    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-800 text-slate-300">

                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">No. Pendaftaran</th>
                    <th class="px-6 py-4 text-left">Nama Lengkap</th>
                    <th class="px-6 py-4 text-left">Tanggal Lahir</th>
                    <th class="px-6 py-4 text-left">Alamat</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                <tr class="border-t border-slate-800 hover:bg-slate-800/40 transition">

                    <td class="px-6 py-4">
                        {{ $students->firstItem() + $loop->index }}
                    </td>

                    <td class="px-6 py-4 font-medium">
                        {{ $student->nomor_pendaftaran }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $student->nama_lengkap }}
                    </td>

                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4 max-w-xs truncate">
                        {{ $student->alamat }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex items-center justify-center gap-2">

                            <a href="{{ route('admin.students.edit', $student) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 px-3 py-2 rounded-lg text-sm transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.students.destroy', $student) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded-lg text-sm transition">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="px-6 py-10 text-center text-slate-400">
                        Belum ada data siswa.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>


</div>

@if($students->hasPages())


<div class="mt-6">
    {{ $students->links() }}
</div>


@endif

@endsection