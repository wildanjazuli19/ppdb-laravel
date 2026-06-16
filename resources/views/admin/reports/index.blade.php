@extends('layouts.admin')

@section('title', 'Laporan')

@section('page-title', '📈 Laporan PPDB')

@section('content')

<div class="grid md:grid-cols-4 gap-5">

    <div class="glass rounded-2xl p-5">
        <p class="text-slate-400">Total Pendaftar</p>
        <h2 class="text-4xl font-bold mt-3">
            {{ $totalPendaftar }}
        </h2>
    </div>

    <div class="glass rounded-2xl p-5">
        <p class="text-slate-400">Terverifikasi</p>
        <h2 class="text-4xl font-bold mt-3 text-green-400">
            {{ $totalVerifikasi }}
        </h2>
    </div>

    <div class="glass rounded-2xl p-5">
        <p class="text-slate-400">Diterima</p>
        <h2 class="text-4xl font-bold mt-3 text-blue-400">
            {{ $totalDiterima }}
        </h2>
    </div>

    <div class="glass rounded-2xl p-5">
        <p class="text-slate-400">Ditolak</p>
        <h2 class="text-4xl font-bold mt-3 text-red-400">
            {{ $totalDitolak }}
        </h2>
    </div>

</div>

<div class="grid md:grid-cols-2 gap-6 mt-8">

    <div class="glass rounded-2xl p-6">

        <h3 class="text-xl font-bold mb-4">
            Jalur Pendaftaran
        </h3>

        <div class="space-y-4">

            <div class="flex justify-between">
                <span>Zonasi</span>
                <span class="font-bold text-blue-400">
                    {{ $zonasi }}
                </span>
            </div>

            <div class="flex justify-between">
                <span>Prestasi</span>
                <span class="font-bold text-yellow-400">
                    {{ $prestasi }}
                </span>
            </div>

        </div>

    </div>

    <div class="glass rounded-2xl p-6">

        <h3 class="text-xl font-bold mb-4">
            Status Seleksi
        </h3>

        <div class="space-y-4">

            <div class="flex justify-between">
                <span>Diterima</span>
                <span class="font-bold text-green-400">
                    {{ $totalDiterima }}
                </span>
            </div>

            <div class="flex justify-between">
                <span>Ditolak</span>
                <span class="font-bold text-red-400">
                    {{ $totalDitolak }}
                </span>
            </div>

        </div>

    </div>

</div>

<div class="glass rounded-2xl overflow-hidden mt-8">

    <div class="px-6 py-5 border-b border-slate-800">

        <h3 class="text-xl font-bold">
            Rekap Data Siswa
        </h3>

    </div>

    <table class="w-full">

        <thead class="bg-slate-800">

            <tr>
                <th class="px-6 py-4 text-left">No</th>
                <th class="px-6 py-4 text-left">No. Pendaftaran</th>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Jalur</th>
                <th class="px-6 py-4 text-left">Verifikasi</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse(App\Models\Student::latest()->take(10)->get() as $student)

            <tr class="border-t border-slate-800">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->nomor_pendaftaran }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->nama }}
                </td>

                <td class="px-6 py-4 capitalize">
                    {{ $student->jalur }}
                </td>

                <td class="px-6 py-4">

                    <span class="px-3 py-1 rounded-full
                            {{ $student->status_verifikasi == 'verified'
                                ? 'bg-green-500/20 text-green-400'
                                : 'bg-yellow-500/20 text-yellow-400' }}">

                        {{ $student->status_verifikasi }}

                    </span>

                </td>

                <td class="px-6 py-4">

                    <span class="px-3 py-1 rounded-full
                            {{ $student->status_seleksi == 'diterima'
                                ? 'bg-green-500/20 text-green-400'
                                : 'bg-red-500/20 text-red-400' }}">

                        {{ ucfirst($student->status_seleksi ?? 'pending') }}

                    </span>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6"
                    class="px-6 py-8 text-center text-slate-400">

                    Belum ada data.

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection