@extends('layouts.admin')

@section('title', 'Seleksi Prestasi')

@section('page-title', '🏆 Seleksi Prestasi')

@section('content')

<div class="flex justify-end mb-6">

    <form method="POST"
        action="{{ route('admin.prestasi.process') }}">

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
                <th class="px-6 py-4 text-left">Nilai Rapor</th>
                <th class="px-6 py-4 text-left">Poin Sertifikat</th>
                <th class="px-6 py-4 text-left">Nilai Akhir</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($students as $student)

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
                    {{ $student->nilai_rapor }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->poin_sertifikat }}
                </td>

                <td class="px-6 py-4 font-semibold text-blue-400">
                    {{ number_format($student->nilai_prestasi, 2) }}
                </td>

                <td class="px-6 py-4">

                    @if($student->status_seleksi == 'diterima')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                        Diterima
                    </span>

                    @elseif($student->status_seleksi == 'ditolak')

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
                <td colspan="7"
                    class="px-6 py-8 text-center text-slate-400">
                    Belum ada data prestasi.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection