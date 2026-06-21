@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Upload Dokumen PPDB</h3>

    <p><b>Nama Siswa:</b> {{ $student->nama_lengkap }}</p>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('student.documents.store', $student->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- KK -->
            <div>
                <label class="block mb-2 text-sm font-medium">
                    Kartu Keluarga (KK)
                </label>

                <input type="file" name="kk"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700">

                @if(!empty($document?->kk))
                <a href="{{ asset('storage/'.$document->kk) }}"
                    target="_blank"
                    class="text-blue-400 text-sm mt-2 inline-block">
                    📄 Lihat KK (PDF)
                </a>
                @endif
            </div>

            <!-- Akta -->
            <div>
                <label class="block mb-2 text-sm font-medium">
                    Akta Kelahiran
                </label>

                <input type="file" name="akta"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700">

                @if(!empty($document?->akta))
                <a href="{{ asset('storage/'.$document->akta) }}"
                    target="_blank"
                    class="text-blue-400 text-sm mt-2 inline-block">
                    📄 Lihat Akta
                </a>
                @endif
            </div>

            <!-- Rapor -->
            <div>
                <label class="block mb-2 text-sm font-medium">
                    Rapor
                </label>

                <input type="file" name="rapor"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700">

                @if(!empty($document?->rapor))
                <a href="{{ asset('storage/'.$document->rapor) }}"
                    target="_blank"
                    class="text-blue-400 text-sm mt-2 inline-block">
                    📄 Lihat Rapor
                </a>
                @endif
            </div>

            <!-- Surat Lulus -->
            <div>
                <label class="block mb-2 text-sm font-medium">
                    Surat Keterangan Lulus
                </label>

                <input type="file" name="surat_lulus"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700">

                @if(!empty($document?->surat_lulus))
                <a href="{{ asset('storage/'.$document->surat_lulus) }}"
                    target="_blank"
                    class="text-blue-400 text-sm mt-2 inline-block">
                    📄 Lihat Surat Lulus
                </a>
                @endif
            </div>

            <!-- Sertifikat -->
            <div class="md:col-span-2">
                <label class="block mb-2 text-sm font-medium">
                    Sertifikat (opsional)
                </label>

                <input type="file" name="sertifikat"
                    class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700">

                @if(!empty($document?->sertifikat))
                <a href="{{ asset('storage/'.$document->sertifikat) }}"
                    target="_blank"
                    class="text-blue-400 text-sm mt-2 inline-block">
                    📄 Lihat Sertifikat
                </a>
                @endif
            </div>

        </div>

        <!-- Button -->
        <div class="flex justify-end pt-4">
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 transition">
                Upload / Update Dokumen
            </button>
        </div>

    </form>

</div>
@endsection