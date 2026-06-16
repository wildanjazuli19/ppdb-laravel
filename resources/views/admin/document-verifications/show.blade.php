@extends('layouts.admin')

@section('title', 'Verifikasi Dokumen')

@section('page-title', '📄 Verifikasi Dokumen')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Informasi Siswa --}}
    <div class="lg:col-span-1">

        <div class="glass rounded-2xl p-6">

            <h3 class="text-xl font-bold mb-6">
                Informasi Siswa
            </h3>

            <div class="space-y-4">

                <div>
                    <p class="text-slate-400 text-sm">
                        Nomor Pendaftaran
                    </p>

                    <p class="font-semibold">
                        {{ $student->nomor_pendaftaran }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        Nama Lengkap
                    </p>

                    <p class="font-semibold">
                        {{ $student->nama }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        NIK
                    </p>

                    <p>
                        {{ $student->nik }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        NISN
                    </p>

                    <p>
                        {{ $student->nisn }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        Jalur Pendaftaran
                    </p>

                    <span class="inline-block bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full">
                        {{ ucfirst($student->jalur) }}
                    </span>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        Asal Sekolah
                    </p>

                    <p>
                        {{ $student->asal_sekolah }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        Tanggal Lahir
                    </p>

                    <p>
                        {{ $student->tanggal_lahir?->format('d F Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400 text-sm">
                        Alamat
                    </p>

                    <p>
                        {{ $student->alamat }}
                    </p>
                </div>

            </div>

        </div>

    </div>

    {{-- Dokumen dan Verifikasi --}}
    <div class="lg:col-span-2 space-y-6">

        {{-- Dokumen --}}
        <div class="glass rounded-2xl p-6">

            <div class="flex items-center justify-between mb-6">

                <h3 class="text-xl font-bold">
                    Dokumen Siswa
                </h3>

                @php
                $badgeColor = match($student->status_verifikasi) {
                'verified' => 'bg-green-500/20 text-green-400',
                'rejected' => 'bg-red-500/20 text-red-400',
                default => 'bg-yellow-500/20 text-yellow-400',
                };

                $badgeText = match($student->status_verifikasi) {
                'verified' => 'Disetujui',
                'rejected' => 'Ditolak',
                default => 'Menunggu',
                };
                @endphp

                <span class="px-4 py-2 rounded-full {{ $badgeColor }}">
                    {{ $badgeText }}
                </span>

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Kartu Keluarga --}}
                <div class="bg-slate-800 rounded-xl p-5">

                    <h4 class="font-semibold mb-4">
                        📋 Kartu Keluarga
                    </h4>

                    @if($student->document?->kk)

                    <a
                        href="{{ asset('storage/' . $student->document->kk) }}"
                        target="_blank"
                        class="inline-block bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                        Lihat Dokumen
                    </a>

                    @else

                    <p class="text-slate-400">
                        Belum diunggah
                    </p>

                    @endif

                </div>

                {{-- Akta --}}
                <div class="bg-slate-800 rounded-xl p-5">

                    <h4 class="font-semibold mb-4">
                        📄 Akta Kelahiran
                    </h4>

                    @if($student->document?->akta_lahir)

                    <a
                        href="{{ asset('storage/' . $student->document->akta_lahir) }}"
                        target="_blank"
                        class="inline-block bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                        Lihat Dokumen
                    </a>

                    @else

                    <p class="text-slate-400">
                        Belum diunggah
                    </p>

                    @endif

                </div>

                {{-- Rapor --}}
                <div class="bg-slate-800 rounded-xl p-5">

                    <h4 class="font-semibold mb-4">
                        📘 Rapor
                    </h4>

                    @if($student->document?->rapor)

                    <a
                        href="{{ asset('storage/' . $student->document->rapor) }}"
                        target="_blank"
                        class="inline-block bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                        Lihat Dokumen
                    </a>

                    @else

                    <p class="text-slate-400">
                        Belum diunggah
                    </p>

                    @endif

                </div>

                {{-- Sertifikat --}}
                <div class="bg-slate-800 rounded-xl p-5">

                    <h4 class="font-semibold mb-4">
                        🏆 Sertifikat
                    </h4>

                    @if($student->document?->sertifikat)

                    <a
                        href="{{ asset('storage/' . $student->document->sertifikat) }}"
                        target="_blank"
                        class="inline-block bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                        Lihat Dokumen
                    </a>

                    @else

                    <p class="text-slate-400">
                        Tidak ada sertifikat
                    </p>

                    @endif

                </div>

            </div>

        </div>

        {{-- Form Verifikasi --}}
        <div class="glass rounded-2xl p-6">

            <h3 class="text-xl font-bold mb-6">
                Form Verifikasi
            </h3>

            <form
                method="POST"
                action="{{ route('admin.document-verifications.update', $student) }}"
                class="space-y-6">

                @csrf
                @method('PATCH')

                <div>

                    <label class="block mb-2 text-sm font-medium">
                        Status Verifikasi
                    </label>

                    <select
                        name="status_verifikasi"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none">

                        <option value="pending"
                            {{ old('status_verifikasi', $student->status_verifikasi) == 'pending' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="verified"
                            {{ old('status_verifikasi', $student->status_verifikasi) == 'verified' ? 'selected' : '' }}>
                            Disetujui
                        </option>

                        <option value="rejected"
                            {{ old('status_verifikasi', $student->status_verifikasi) == 'rejected' ? 'selected' : '' }}>
                            Ditolak
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 text-sm font-medium">
                        Catatan Verifikasi
                    </label>

                    <textarea
                        name="catatan_verifikasi"
                        rows="5"
                        placeholder="Masukkan catatan verifikasi..."
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none">{{ old('catatan_verifikasi', $student->catatan_verifikasi) }}</textarea>

                </div>

                <div class="flex justify-end gap-3">

                    <a
                        href="{{ route('admin.document-verifications.index') }}"
                        class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600">
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700">
                        Simpan Verifikasi
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection