@extends('layouts.admin')

@section('content')





<div class="p-8">

    <!-- Statistik -->
    <div class="grid md:grid-cols-4 gap-5">

        <div class="glass rounded-2xl p-5">
            <p class="text-slate-400">
                Total Pendaftar
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ number_format($totalStudents) }}
            </h2>
        </div>

        <div class="glass rounded-2xl p-5">
            <p class="text-slate-400">
                Verifikasi
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ number_format($totalVerified) }}
            </h2>
        </div>

        <div class="glass rounded-2xl p-5">
            <p class="text-slate-400">
                Diterima
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ number_format($totalAccepted) }}
            </h2>
        </div>

        <div class="glass rounded-2xl p-5">
            <p class="text-slate-400">
                Ditolak
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ number_format($totalRejected) }}
            </h2>
        </div>

    </div>

    <!-- Menu -->
    <div class="grid md:grid-cols-3 gap-6 mt-8">

        <a href="{{ route('admin.students.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                👨‍🎓 Data Siswa
            </h3>

            <p class="text-slate-400 mt-2">
                Kelola seluruh data calon peserta didik.
            </p>

        </a>

        <a href="{{ route('admin.document-verifications.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                📄 Verifikasi Dokumen
            </h3>

            <p class="text-slate-400 mt-2">
                Verifikasi KK, Akta, Rapor dan Sertifikat.
            </p>

        </a>

        <a href="{{ route('admin.zonasi.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                📍 Seleksi Zonasi
            </h3>

            <p class="text-slate-400 mt-2">
                Seleksi berdasarkan jarak rumah ke sekolah.
            </p>

        </a>

        <a href="{{ route('admin.prestasi.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                🏆 Seleksi Prestasi
            </h3>

            <p class="text-slate-400 mt-2">
                Seleksi berdasarkan nilai dan sertifikat.
            </p>

        </a>

        <a href="{{ route('admin.announcements.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                📢 Pengumuman
            </h3>

            <p class="text-slate-400 mt-2">
                Kelola hasil seleksi PPDB.
            </p>

        </a>

        <a href="{{ route('admin.reports.index') }}"
            class="glass rounded-2xl p-6 hover:bg-slate-800 transition">

            <h3 class="text-xl font-bold">
                📈 Laporan
            </h3>

            <p class="text-slate-400 mt-2">
                Statistik dan laporan PPDB.
            </p>

        </a>

    </div>

</div>




@endsection