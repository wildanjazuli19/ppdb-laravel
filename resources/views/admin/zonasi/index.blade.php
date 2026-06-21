@extends('layouts.admin')

@section('title', 'Seleksi Zonasi')

@section('page-title', '📍 Seleksi Zonasi')

@section('content')

<div class="flex justify-end mb-6">

    <form action="{{ route('admin.zonasi.process') }}"
        method="POST">

        @csrf

        <button
            class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl">
            Proses Seleksi
        </button>

    </form>

</div>

<div class="glass rounded-2xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-800">

            <tr>
                <th class="px-6 py-4 text-left">No</th>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Sekolah</th>
                <th class="px-6 py-4 text-left">Jarak (KM)</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse(\App\Models\Student::with('school')
            ->where('jalur', 'zonasi')
            ->orderBy('jarak_zonasi')
            ->get() as $student)

            <tr class="border-t border-slate-800">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->nama_lengkap }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->school?->nama_sekolah }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->jarak_zonasi ?? '-' }}
                </td>

                <td class="px-6 py-4">

                    @if($student->status_seleksi === 'diterima')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                        Diterima
                    </span>

                    @elseif($student->status_seleksi === 'ditolak')

                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">
                        Ditolak
                    </span>

                    @else

                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                        Pending
                    </span>

                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="px-6 py-6 text-center">
                    Belum ada data.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection