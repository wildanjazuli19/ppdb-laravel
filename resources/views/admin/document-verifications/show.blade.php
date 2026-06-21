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

                    @if($student->document?->akta)

                    <a
                        href="{{ asset('storage/' . $student->document->akta) }}"
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
                <div class="bg-slate-800 rounded-xl p-5 md:col-span-2">

                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-semibold">
                            🏆 Sertifikat Prestasi
                        </h4>

                        <span class="text-sm text-slate-400">
                            Total: {{ $student->certificates->count() }} sertifikat
                        </span>
                    </div>

                    @if($student->certificates && $student->certificates->count())
                    <div class="space-y-4">
                        @foreach($student->certificates as $certificate)

                        @php
                        $certBadgeColor = match($certificate->status_verifikasi) {
                        'verified' => 'bg-green-500/20 text-green-400',
                        'rejected' => 'bg-red-500/20 text-red-400',
                        default => 'bg-yellow-500/20 text-yellow-400',
                        };

                        $certBadgeText = match($certificate->status_verifikasi) {
                        'verified' => 'Disetujui',
                        'rejected' => 'Ditolak',
                        default => 'Menunggu',
                        };
                        @endphp

                        <div class="rounded-xl border border-slate-700 bg-slate-900/40 p-5">
                            <div class="flex flex-col xl:flex-row gap-6 xl:items-start xl:justify-between">

                                {{-- Info sertifikat --}}
                                <div class="flex-1">
                                    <p class="text-lg font-semibold text-white">
                                        {{ $certificate->nama_prestasi }}
                                    </p>

                                    <div class="mt-3 flex flex-wrap gap-2 text-sm">
                                        <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-300">
                                            Tingkat: {{ $certificate->tingkat }}
                                        </span>

                                        @if($certificate->peringkat)
                                        <span class="px-3 py-1 rounded-full bg-purple-500/20 text-purple-300">
                                            Peringkat: {{ $certificate->peringkat }}
                                        </span>
                                        @endif

                                        <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300">
                                            Poin: {{ $certificate->poin ?? 0 }}
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        <span class="inline-block px-3 py-1 rounded-full text-sm {{ $certBadgeColor }}">
                                            {{ $certBadgeText }}
                                        </span>
                                    </div>

                                    @if($certificate->file)
                                    <div class="mt-4">
                                        <a
                                            href="{{ asset('storage/' . $certificate->file) }}"
                                            target="_blank"
                                            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white text-sm">
                                            Lihat Sertifikat
                                        </a>
                                    </div>
                                    @else
                                    <p class="mt-4 text-sm text-slate-400">
                                        File sertifikat tidak tersedia.
                                    </p>
                                    @endif
                                </div>

                                {{-- Form verifikasi sertifikat --}}
                                <div class="w-full xl:w-[340px] bg-slate-800/80 rounded-xl border border-slate-700 p-4">
                                    <h5 class="font-semibold text-white mb-4">
                                        Verifikasi Sertifikat
                                    </h5>

                                    <form method="POST"
                                        action="{{ route('admin.certificates.verify', $certificate->id) }}"
                                        class="space-y-4">
                                        @csrf
                                        @method('PATCH')

                                        <div>
                                            <label class="block mb-2 text-sm font-medium">
                                                Status Verifikasi
                                            </label>
                                            <select
                                                name="status_verifikasi"
                                                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-blue-500 focus:outline-none">
                                                <option value="pending"
                                                    {{ old('status_verifikasi', $certificate->status_verifikasi) == 'pending' ? 'selected' : '' }}>
                                                    Menunggu
                                                </option>
                                                <option value="verified"
                                                    {{ old('status_verifikasi', $certificate->status_verifikasi) == 'verified' ? 'selected' : '' }}>
                                                    Disetujui
                                                </option>
                                                <option value="rejected"
                                                    {{ old('status_verifikasi', $certificate->status_verifikasi) == 'rejected' ? 'selected' : '' }}>
                                                    Ditolak
                                                </option>
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium">
                                                Poin Sertifikat
                                            </label>
                                            <input
                                                type="number"
                                                name="poin"
                                                min="0"
                                                value="{{ old('poin', $certificate->poin) }}"
                                                class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-blue-500 focus:outline-none"
                                                placeholder="Masukkan poin sertifikat">
                                        </div>

                                        <div class="pt-2">
                                            <button
                                                type="submit"
                                                class="w-full px-4 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-medium">
                                                Simpan Verifikasi
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="rounded-xl border border-dashed border-slate-700 p-6 text-center">
                        <p class="text-slate-400">
                            Tidak ada sertifikat.
                        </p>
                    </div>
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