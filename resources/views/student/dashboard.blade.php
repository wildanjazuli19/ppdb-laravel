@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-700 via-indigo-700 to-cyan-600 p-8 shadow-2xl">

        <div class="absolute right-0 top-0 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative flex flex-col lg:flex-row justify-between">

            <div>

                <p class="text-blue-100">
                    Portal PPDB
                </p>

                <h1 class="mt-2 text-4xl font-bold">
                    Selamat Datang,
                    {{ auth()->user()->name }}
                    👋
                </h1>

                <p class="mt-4 text-blue-100">
                    Tahun Ajaran 2026 / 2027
                </p>

                <div class="mt-8 inline-flex rounded-xl bg-white/20 px-5 py-3 backdrop-blur">

                    Nomor Pendaftaran :

                    <span class="ml-2 font-bold">
                        {{ $student->nomor_pendaftaran ?? '-' }}
                    </span>

                </div>

            </div>

            <div class="mt-8 lg:mt-0">

                <div class="rounded-2xl bg-white p-6 text-slate-800 shadow-xl">

                    <div class="text-sm text-slate-500">
                        Status
                    </div>

                    <div class="mt-2 text-2xl font-bold text-emerald-600">

                        {{ ucfirst($student->status ?? 'Draft') }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CARD --}}
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl bg-slate-800 p-6 shadow-lg border border-slate-700">

            <div class="text-4xl">
                👤
            </div>

            <h3 class="mt-4 font-semibold">
                Data Diri
            </h3>

            <p class="text-slate-400 text-sm">
                Sudah Lengkap
            </p>

        </div>

        <div class="rounded-2xl bg-slate-800 p-6 shadow-lg border border-slate-700">

            <div class="text-4xl">
                📄
            </div>

            <h3 class="mt-4 font-semibold">
                Berkas
            </h3>

            <p class="text-slate-400 text-sm">
                {{ $student->documents_count ?? 0 }} File
            </p>

        </div>

        <div class="rounded-2xl bg-slate-800 p-6 shadow-lg border border-slate-700">

            <div class="text-4xl">
                🔎
            </div>

            <h3 class="mt-4 font-semibold">
                Verifikasi
            </h3>

            <p class="text-yellow-400">
                Menunggu
            </p>

        </div>

        <div class="rounded-2xl bg-slate-800 p-6 shadow-lg border border-slate-700">

            <div class="text-4xl">
                🏆
            </div>

            <h3 class="mt-4 font-semibold">
                Hasil
            </h3>

            <p class="text-slate-400">
                Belum Ada
            </p>

        </div>

    </div>

    <div class="grid gap-8 lg:grid-cols-3">

        {{-- LEFT --}}
        <div class="space-y-8 lg:col-span-2">

            {{-- Progress --}}
            <div class="rounded-2xl bg-slate-800 p-8 shadow border border-slate-700">

                <div class="flex justify-between">

                    <h2 class="font-bold text-xl">

                        Progress Pendaftaran

                    </h2>

                    <span>

                        80%

                    </span>

                </div>

                <div class="mt-6 h-3 rounded-full bg-slate-700">

                    <div
                        class="h-3 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500"
                        style="width:80%">
                    </div>

                </div>

            </div>

            {{-- Menu --}}
            <div class="rounded-2xl bg-slate-800 p-8 shadow border border-slate-700">

                <h2 class="font-bold text-xl mb-6">

                    Menu Cepat

                </h2>

                <div class="grid gap-5 md:grid-cols-2">

                    <a href="{{ route('student.registration') }}"
                        class="rounded-xl bg-slate-700 p-5 hover:bg-blue-600 transition">

                        👤

                        <h4 class="mt-3 font-semibold">

                            Data Pendaftaran

                        </h4>

                    </a>

                    <a href="{{ route('student.documents') }}"
                        class="rounded-xl bg-slate-700 p-5 hover:bg-blue-600 transition">

                        📄

                        <h4 class="mt-3 font-semibold">

                            Upload Berkas

                        </h4>

                    </a>

                    <a href="{{ route('student.registration.print') }}"
                        class="rounded-xl bg-slate-700 p-5 hover:bg-blue-600 transition">

                        🖨

                        <h4 class="mt-3 font-semibold">

                            Cetak Bukti

                        </h4>

                    </a>

                    <div class="rounded-3xl bg-slate-800 border border-slate-700 shadow-lg">

                        <div class="flex items-center justify-between border-b border-slate-700 px-8 py-6">

                            <div>

                                <h2 class="text-2xl font-bold">

                                    📢 Pengumuman Terbaru

                                </h2>

                                <p class="text-slate-400 mt-1">

                                    Informasi terbaru dari Panitia PPDB

                                </p>

                            </div>

                            <a href="{{ route('student.announcement.index') }}"
                                class="rounded-xl bg-blue-600 px-5 py-2 hover:bg-blue-700">

                                Lihat Semua

                            </a>

                        </div>

                        <div class="divide-y divide-slate-700">

                            @forelse($announcements as $announcement)

                            <a href="{{ route('student.announcement.show',$announcement->id) }}"
                                class="block p-6 hover:bg-slate-700 transition">

                                <div class="flex justify-between items-start">

                                    <div class="flex-1">

                                        <h3 class="text-xl font-semibold">

                                            {{ $announcement->judul }}

                                        </h3>

                                        <p class="mt-3 text-slate-300">

                                            {{ \Illuminate\Support\Str::limit(strip_tags($announcement->isi),150) }}

                                        </p>

                                        <div class="mt-4 flex items-center gap-4 text-sm text-slate-400">

                                            <span>

                                                📅
                                                {{ $announcement->tanggal_publish->translatedFormat('d F Y') }}

                                            </span>

                                        </div>

                                    </div>

                                    <div class="ml-6">

                                        <span
                                            class="rounded-full bg-blue-600 px-4 py-2 text-sm">

                                            Baca →

                                        </span>

                                    </div>

                                </div>

                            </a>

                            @empty

                            <div class="py-16 text-center">

                                <div class="text-6xl">

                                    📭

                                </div>

                                <h3 class="mt-4 text-xl font-semibold">

                                    Belum Ada Pengumuman

                                </h3>

                                <p class="mt-2 text-slate-400">

                                    Pengumuman dari panitia akan muncul di sini.

                                </p>

                            </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="space-y-8">

            {{-- Timeline --}}
            <div class="rounded-2xl bg-slate-800 p-8 shadow border border-slate-700">

                <h2 class="font-bold text-xl mb-6">

                    Timeline PPDB

                </h2>

                <div class="space-y-6">

                    <div>✅ Registrasi Akun</div>

                    <div>✅ Lengkapi Data</div>

                    <div>✅ Upload Berkas</div>

                    <div class="text-yellow-400">
                        ⏳ Verifikasi
                    </div>

                    <div class="text-slate-500">
                        ○ Pengumuman
                    </div>

                </div>

            </div>

            {{-- Info --}}
            <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-600 p-8 shadow-xl">

                <h2 class="text-xl font-bold">

                    Informasi PPDB

                </h2>

                <ul class="mt-6 space-y-3 text-blue-100">

                    <li>📅 Penutupan : 31 Juli 2026</li>

                    <li>📄 Verifikasi : 1–3 Agustus 2026</li>

                    <li>🎉 Pengumuman : 5 Agustus 2026</li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection