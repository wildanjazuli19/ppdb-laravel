@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- Tombol Kembali --}}
    <div class="mb-6">
        <a href="{{ route('student.announcement.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-600 bg-slate-800 px-5 py-3 text-white transition hover:bg-slate-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7" />
            </svg>

            Kembali ke Pengumuman
        </a>
    </div>

    <div class="rounded-3xl border border-slate-700 bg-slate-800 shadow-xl overflow-hidden">

        {{-- Header --}}
        <div class="border-b border-slate-700 p-8">

            <div class="flex items-center gap-3 text-sm text-slate-400">

                <span>📅</span>

                <span>
                    Dipublikasikan
                    {{ $announcement->tanggal_publish->translatedFormat('d F Y') }}
                </span>

            </div>

            <h1 class="mt-4 text-4xl font-bold text-white leading-tight">
                {{ $announcement->judul }}
            </h1>

        </div>

        {{-- Isi --}}
        <div class="p-8">

            <article class="prose prose-invert max-w-none prose-headings:text-white prose-p:text-slate-300">

                {!! nl2br(e($announcement->isi)) !!}

            </article>

        </div>

        {{-- Footer --}}
        <div class="flex justify-between items-center border-t border-slate-700 p-6">

            <span class="text-sm text-slate-500">
                PPDB Tahun Ajaran 2026/2027
            </span>

            <a href="{{ route('student.announcement.index') }}"
                class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700">

                ← Kembali

            </a>

        </div>

    </div>

</div>

@endsection