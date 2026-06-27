@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="rounded-3xl bg-gradient-to-r from-blue-700 via-indigo-700 to-cyan-600 p-10 shadow-xl">

        <h1 class="text-4xl font-bold text-white">
            Pengumuman PPDB
        </h1>

        <p class="mt-3 text-blue-100">
            Informasi terbaru seputar PPDB Tahun Ajaran 2026/2027.
        </p>

    </div>

    {{-- Search --}}
    <div>

        <input
            type="text"
            placeholder="Cari pengumuman..."
            class="w-full rounded-xl border border-slate-700 bg-slate-800 px-5 py-4 text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500">

    </div>

    {{-- List Berita --}}
    <div class="grid lg:grid-cols-2 gap-8">

        @foreach($announcements as $announcement)

        <div
            class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-800 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">

            <div class="p-6">

                <h2
                    class="mt-4 text-2xl font-bold">

                    {{ $announcement->judul }}

                </h2>

                <div
                    class="mt-2 text-sm text-slate-400">

                    {{ $announcement->created_at->translatedFormat('d F Y') }}

                </div>

                <p
                    class="mt-5 text-slate-300">

                    {{ Str::limit(strip_tags($announcement->isi),150) }}

                </p>

                <a
                    href="{{ route('student.announcement.show',$announcement->id) }}"
                    class="mt-6 inline-flex rounded-xl bg-blue-600 px-5 py-3 font-semibold hover:bg-blue-700">

                    Baca Selengkapnya →

                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection