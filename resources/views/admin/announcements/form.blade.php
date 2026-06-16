@extends('layouts.admin')

@section('title', isset($announcement) ? 'Edit Pengumuman' : 'Tambah Pengumuman')

@section('page-title', '📢 Pengumuman')

@section('content')

<form method="POST"
    action="{{ isset($announcement)
        ? route('admin.announcements.update', $announcement)
        : route('admin.announcements.store') }}">

    @csrf

    @isset($announcement)
    @method('PUT')
    @endisset

    <div class="glass rounded-2xl p-6 space-y-6">

        <div>

            <label class="block mb-2">
                Judul
            </label>

            <input
                type="text"
                name="judul"
                value="{{ old('judul', $announcement->judul ?? '') }}"
                class="w-full bg-slate-800 rounded-xl px-4 py-3">

        </div>

        <div>

            <label class="block mb-2">
                Tanggal Publish
            </label>

            <input
                type="date"
                name="tanggal_publish"
                value="{{ old('tanggal_publish', isset($announcement) ? $announcement->tanggal_publish->format('Y-m-d') : '') }}"
                class="w-full bg-slate-800 rounded-xl px-4 py-3">

        </div>

        <div>

            <label class="block mb-2">
                Status
            </label>

            <select
                name="status"
                class="w-full bg-slate-800 rounded-xl px-4 py-3">

                <option value="draft"
                    {{ old('status', $announcement->status ?? '') == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>

                <option value="published"
                    {{ old('status', $announcement->status ?? '') == 'published' ? 'selected' : '' }}>
                    Published
                </option>

            </select>

        </div>

        <div>

            <label class="block mb-2">
                Isi Pengumuman
            </label>

            <textarea
                name="isi"
                rows="8"
                class="w-full bg-slate-800 rounded-xl px-4 py-3">{{ old('isi', $announcement->isi ?? '') }}</textarea>

        </div>

        <div class="flex justify-end gap-3">

            <a href="{{ route('admin.announcements.index') }}"
                class="bg-slate-700 px-5 py-3 rounded-xl">
                Kembali
            </a>

            <button
                class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl">
                Simpan
            </button>

        </div>

    </div>

</form>

@endsection