@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">


    <div class="glass rounded-2xl p-8">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h3 class="text-2xl font-bold">
                    Form Tambah Siswa
                </h3>

                <p class="text-slate-400 mt-1">
                    Lengkapi data calon peserta didik.
                </p>
            </div>

        </div>

        <form action="{{ $action }}"
            method="POST"
            class="space-y-6">

            @if ($method === 'PUT')
            @method('PUT')
            @endif

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="nik"
                        class="block mb-2 text-sm font-medium">
                        NIK
                    </label>

                    <input
                        type="text"
                        id="nik"
                        name="nik"
                        value="{{ old('nik', $student->nik ?? '') }}"
                        maxlength="16"
                        inputmode="numeric"
                        placeholder="Masukkan 16 digit NIK"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nik') border-red-500 @enderror">

                    @error('nik')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="nisn"
                        class="block mb-2 text-sm font-medium">
                        NISN
                    </label>

                    <input
                        type="text"
                        id="nisn"
                        name="nisn"
                        value="{{ old('nisn', $student->nisn ?? '') }}"
                        maxlength="10"
                        inputmode="numeric"
                        placeholder="Masukkan 10 digit NISN"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nisn') border-red-500 @enderror">

                    @error('nisn')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="asal_sekolah"
                        class="block mb-2 text-sm font-medium">
                        Asal Sekolah
                    </label>

                    <input
                        type="text"
                        id="asal_sekolah"
                        name="asal_sekolah"
                        value="{{ old('asal_sekolah', $student->asal_sekolah ?? '') }}"
                        placeholder="Contoh: SDN 01 Tangerang Selatan"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('asal_sekolah') border-red-500 @enderror">

                    @error('asal_sekolah')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div>
                    <label for="nomor_pendaftaran"
                        class="block mb-2 text-sm font-medium">
                        Nomor Pendaftaran
                    </label>

                    <input
                        type="text"
                        id="nomor_pendaftaran"
                        name="nomor_pendaftaran"
                        value="{{ old('nomor_pendaftaran', $student->nomor_pendaftaran ?? '') }}"
                        placeholder="PPDB-2026-0001"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nomor_pendaftaran') border-red-500 @enderror">

                    @error('nomor_pendaftaran')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="nama_lengkap"
                        class="block mb-2 text-sm font-medium">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama_lengkap"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap', $student->nama_lengkap ?? '') }}"
                        placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nama_lengkap') border-red-500 @enderror">

                    @error('nama_lengkap')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium">
                        Tempat Lahir
                    </label>

                    <input
                        type="text"
                        id="tempat_lahir"
                        name="tempat_lahir"
                        value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}"
                        placeholder="Contoh: Tangerang Selatan"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('tempat_lahir') border-red-500 @enderror">

                    @error('tempat_lahir')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_lahir"
                        class="block mb-2 text-sm font-medium">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        id="tanggal_lahir"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', isset($student) ? \Carbon\Carbon::parse($student->tanggal_lahir)->format('Y-m-d') : '') }}"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('tanggal_lahir') border-red-500 @enderror">

                    @error('tanggal_lahir')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>
            <div>
                <label for="jenis_kelamin"
                    class="block mb-2 text-sm font-medium">
                    Jenis Kelamin
                </label>

                <select
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('jenis_kelamin') border-red-500 @enderror">

                    <option value="">Pilih Jenis Kelamin</option>

                    <option value="L" {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="P" {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

                @error('jenis_kelamin')
                <p class="text-red-400 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <!-- No. HP -->
            <div>
                <label for="no_hp"
                    class="block mb-2 text-sm font-medium">
                    No. HP
                </label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp', $student->no_hp ?? '') }}"
                    inputmode="numeric"
                    placeholder="Contoh: 081234567890"
                    oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15)"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('no_hp') border-red-500 @enderror">

                @error('no_hp')
                <p class="text-red-400 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <!-- Jalur Pendaftaran -->
            <div>
                <label for="jalur"
                    class="block mb-2 text-sm font-medium">
                    Jalur Pendaftaran
                </label>

                <select
                    id="jalur"
                    name="jalur"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('jalur') border-red-500 @enderror">

                    <option value="">Pilih Jalur</option>

                    @foreach (['zonasi', 'prestasi', 'afirmasi', 'perpindahan'] as $jalur)
                    <option value="{{ $jalur }}"
                        {{ old('jalur', $student->jalur ?? '') === $jalur ? 'selected' : '' }}>
                        {{ ucfirst($jalur) }}
                    </option>
                    @endforeach

                </select>

                @error('jalur')
                <p class="text-red-400 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div>
                <label for="alamat"
                    class="block mb-2 text-sm font-medium">
                    Alamat
                </label>

                <textarea
                    id="alamat"
                    name="alamat"
                    rows="4"
                    placeholder="Masukkan alamat lengkap"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('alamat') border-red-500 @enderror">{{ old('alamat', $student->alamat ?? '') }}</textarea>

                @error('alamat')
                <p class="text-red-400 text-sm mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <h4 class="text-lg font-semibold border-b border-slate-700 pb-3 mt-8">
                Data Orang Tua
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div>
                    <label for="nama_ayah"
                        class="block mb-2 text-sm font-medium">
                        Nama Ayah
                    </label>

                    <input
                        type="text"
                        id="nama_ayah"
                        name="nama_ayah"
                        value="{{ old('nama_ayah', $student->nama_ayah ?? '') }}"
                        placeholder="Masukkan nama lengkap ayah"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nama_ayah') border-red-500 @enderror">

                    @error('nama_ayah')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="nama_ibu"
                        class="block mb-2 text-sm font-medium">
                        Nama Ibu
                    </label>

                    <input
                        type="text"
                        id="nama_ibu"
                        name="nama_ibu"
                        value="{{ old('nama_ibu', $student->nama_ibu ?? '') }}"
                        placeholder="Masukkan nama lengkap ibu"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none @error('nama_ibu') border-red-500 @enderror">

                    @error('nama_ibu')
                    <p class="text-red-400 text-sm mt-2">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('admin.students.index') }}"
                    class="px-6 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition">
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 transition">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>


</div>
@endsection