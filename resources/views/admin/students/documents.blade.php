<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Upload Dokumen PPDB
    </h1>

    <form method="POST"
          action="{{ route('student.documents.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-4">
            <label>KK</label>
            <input type="file"
                   name="kk"
                   class="block w-full">
        </div>

        <div class="mb-4">
            <label>Akta Kelahiran</label>
            <input type="file"
                   name="akta"
                   class="block w-full">
        </div>

        <div class="mb-4">
            <label>Rapor</label>
            <input type="file"
                   name="rapor"
                   class="block w-full">
        </div>

        <div class="mb-4">
            <label>Surat Lulus</label>
            <input type="file"
                   name="surat_lulus"
                   class="block w-full">
        </div>

        <div class="mb-4">
            <label>Sertifikat Prestasi (Opsional)</label>
            <input type="file"
                   name="sertifikat"
                   class="block w-full">
        </div>

        <button
            class="bg-green-600 text-white px-5 py-3 rounded">

            Upload Dokumen

        </button>

    </form>

</div>

</x-app-layout>