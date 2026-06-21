@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6"
    x-data="certificatePage()">

    <h3 class="text-2xl font-bold">Upload Dokumen PPDB</h3>

    <div class="mb-4 space-y-1">
        <p class="text-slate-400"><b>Nama Siswa:</b> {{ $student->nama_lengkap }}</p>
        <p class="text-slate-400">
            <b>Jalur Pendaftaran:</b>
            {{ ucfirst($student->jalur ?? '-') }}
        </p>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="mb-4 rounded-xl border border-green-200 bg-green-50 text-green-700 px-4 py-3">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 text-red-700 px-4 py-3">
        {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 text-red-700 px-4 py-3">
        <ul class="list-disc pl-5 space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- ====================== FORM DOKUMEN ====================== --}}
    <div class="bg-white shadow-sm rounded-2xl border border-slate-200 p-6">
        <form action="{{ route('student.documents.store', $student->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- KK --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Kartu Keluarga (KK)
                    </label>
                    <input type="file" name="kk"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none">

                    @if(!empty($document?->kk))
                    <a href="{{ asset('storage/'.$document->kk) }}"
                        target="_blank"
                        class="text-blue-600 text-sm mt-2 inline-block hover:underline">
                        📄 Lihat KK
                    </a>
                    @endif
                </div>

                {{-- Akta --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Akta Kelahiran
                    </label>
                    <input type="file" name="akta"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none ">

                    @if(!empty($document?->akta))
                    <a href="{{ asset('storage/'.$document->akta) }}"
                        target="_blank"
                        class="text-blue-600 text-sm mt-2 inline-block hover:underline">
                        📄 Lihat Akta
                    </a>
                    @endif
                </div>

                {{-- Rapor --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Rapor
                    </label>
                    <input type="file" name="rapor"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none ">

                    @if(!empty($document?->rapor))
                    <a href="{{ asset('storage/'.$document->rapor) }}"
                        target="_blank"
                        class="text-blue-600 text-sm mt-2 inline-block hover:underline">
                        📄 Lihat Rapor
                    </a>
                    @endif
                </div>

                {{-- Surat Lulus --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-slate-700">
                        Surat Keterangan Lulus
                    </label>
                    <input type="file" name="surat_lulus"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none ">

                    @if(!empty($document?->surat_lulus))
                    <a href="{{ asset('storage/'.$document->surat_lulus) }}"
                        target="_blank"
                        class="text-blue-600 text-sm mt-2 inline-block hover:underline">
                        📄 Lihat Surat Lulus
                    </a>
                    @endif
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit"
                    class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 text-white font-medium hover:bg-blue-700 transition">
                    Upload / Update Dokumen
                </button>
            </div>
        </form>
    </div>

    {{-- ====================== CRUD SERTIFIKAT ====================== --}}
    @if(($student->jalur ?? null) === 'prestasi')
    <div class="mt-8 bg-white shadow-sm rounded-2xl border border-slate-200 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-5">
            <div>
                <h4 class="text-lg font-semibold text-slate-800">Sertifikat Prestasi</h4>
                <p class="text-sm text-slate-500">
                    Tambahkan sertifikat prestasi siswa jika mendaftar melalui jalur prestasi.
                </p>
            </div>

            <button type="button"
                @click="openCreateModal()"
                class="inline-flex items-center justify-center rounded-xl bg-green-600 px-4 py-2.5 text-white font-medium hover:bg-green-700 transition">
                + Tambah Sertifikat
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-slate-200 rounded-xl overflow-hidden">
                <thead class="bg-slate-100 text-slate-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left border-b">No</th>
                        <th class="px-4 py-3 text-left border-b">Nama Prestasi</th>
                        <th class="px-4 py-3 text-left border-b">Tingkat</th>
                        <th class="px-4 py-3 text-left border-b">Peringkat</th>
                        <th class="px-4 py-3 text-left border-b">File</th>
                        <th class="px-4 py-3 text-left border-b">Status Verifikasi</th>
                        <th class="px-4 py-3 text-left border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($student->certificates as $certificate)
                    <tr class="hover:bg-slate-50 text-slate-700">
                        <td class="px-4 py-3 border-b">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 border-b">{{ $certificate->nama_prestasi }}</td>
                        <td class="px-4 py-3 border-b">{{ $certificate->tingkat }}</td>
                        <td class="px-4 py-3 border-b">{{ $certificate->peringkat ?? '-' }}</td>
                        <td class="px-4 py-3 border-b">
                            @if($certificate->file)
                            <a href="{{ asset('storage/' . $certificate->file) }}"
                                target="_blank"
                                class="text-blue-600 hover:underline">
                                Lihat File
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b">
                            @php
                            $statusClass = match($certificate->status_verifikasi) {
                            'verified' => 'bg-green-100 text-green-700',
                            'rejected' => 'bg-red-100 text-red-700',
                            default => 'bg-yellow-100 text-yellow-700',
                            };
                            @endphp
                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $statusClass }}">
                                {{ ucfirst($certificate->status_verifikasi) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border-b">
                            <div class="flex flex-wrap gap-2">
                                <form action="{{ route('student.certificate.destroy', $certificate->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus sertifikat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-lg bg-red-600 px-3 py-2 text-white text-xs font-medium hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-slate-500">
                            Belum ada data sertifikat.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- ====================== MODAL CREATE ====================== --}}
    @if(($student->jalur ?? null) === 'prestasi')
    <div
        x-show="showCreateModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;">
        {{-- overlay --}}
        <div class="absolute inset-0 bg-black/50" @click="closeCreateModal()"></div>

        {{-- modal --}}
        <div
            @click.stop
            class="relative z-10 w-full max-w-3xl rounded-2xl bg-white shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                <h5 class="text-lg font-semibold text-slate-800">Tambah Sertifikat</h5>
                <button type="button"
                    @click="closeCreateModal()"
                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700">
                    ✕
                </button>
            </div>

            <form action="{{ route('student.certificate.store', $student->id) }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-6">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Prestasi</label>
                            <input type="text"
                                name="nama_prestasi"
                                class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none"
                                required>
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Tingkat</label>
                            <select name="tingkat"
                                class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none"
                                required>
                                <option value="">-- Pilih --</option>
                                <option value="Sekolah">Sekolah</option>
                                <option value="Kecamatan">Kecamatan</option>
                                <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                <option value="Provinsi">Provinsi</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Peringkat</label>
                            <input type="text"
                                name="peringkat"
                                placeholder="Juara 1 / Finalis / dll"
                                class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none ">
                        </div>

                        <div class="md:col-span-12">
                            <label class="block text-sm font-medium text-slate-700 mb-2">File Sertifikat</label>
                            <input type="file"
                                name="file"
                                class="w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:outline-none"
                                required>
                            <p class="mt-2 text-xs text-slate-500">
                                Format: PDF / JPG / JPEG / PNG, maksimal 2 MB
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">
                    <button type="button"
                        @click="closeCreateModal()"
                        class="rounded-xl border border-slate-300 px-4 py-2.5 text-slate-700 hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit"
                        class="rounded-xl bg-green-600 px-5 py-2.5 text-white hover:bg-green-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ====================== MODAL EDIT ====================== --}}
    <div
        x-show="showEditModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;">
        {{-- overlay --}}
        <div class="absolute inset-0 bg-black/50" @click="closeEditModal()"></div>

        {{-- modal --}}
        <div
            @click.stop
            class="relative z-10 w-full max-w-3xl rounded-2xl bg-white shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                <h5 class="text-lg font-semibold text-slate-800">Edit Sertifikat</h5>
                <button type="button"
                    @click="closeEditModal()"
                    class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700">
                    ✕
                </button>
            </div>

            <form :action="editFormAction"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-6">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Prestasi</label>
                            <input type="text"
                                name="nama_prestasi"
                                x-model="editForm.nama_prestasi"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Tingkat</label>
                            <select name="tingkat"
                                x-model="editForm.tingkat"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="">-- Pilih --</option>
                                <option value="Sekolah">Sekolah</option>
                                <option value="Kecamatan">Kecamatan</option>
                                <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                <option value="Provinsi">Provinsi</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Peringkat</label>
                            <input type="text"
                                name="peringkat"
                                x-model="editForm.peringkat"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="md:col-span-12">
                            <label class="block text-sm font-medium text-slate-700 mb-2">File Sertifikat</label>
                            <input type="file"
                                name="file"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-slate-100 file:px-3 file:py-2 hover:file:bg-slate-200">
                            <p class="mt-2 text-xs text-slate-500">
                                Kosongkan jika tidak ingin mengganti file.
                            </p>

                            <template x-if="editForm.file_url">
                                <div class="mt-3">
                                    <a :href="editForm.file_url"
                                        target="_blank"
                                        class="text-blue-600 hover:underline text-sm">
                                        Lihat file saat ini
                                    </a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-200 px-6 py-4">
                    <button type="button"
                        @click="closeEditModal()"
                        class="rounded-xl border border-slate-300 px-4 py-2.5 text-slate-700 hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit"
                        class="rounded-xl bg-blue-600 px-5 py-2.5 text-white hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    function certificatePage() {
        return {
            showCreateModal: false,
            showEditModal: false,

            editFormAction: '',
            editForm: {
                id: null,
                nama_prestasi: '',
                tingkat: '',
                peringkat: '',
                file_url: null,
            },

            openCreateModal() {
                this.showCreateModal = true;
                document.body.classList.add('overflow-hidden');
            },

            closeCreateModal() {
                this.showCreateModal = false;
                document.body.classList.remove('overflow-hidden');
            },

            openEditModal(data) {
                this.editForm.id = data.id;
                this.editForm.nama_prestasi = data.nama_prestasi ?? '';
                this.editForm.tingkat = data.tingkat ?? '';
                this.editForm.peringkat = data.peringkat ?? '';
                this.editForm.file_url = data.file_url ?? null;

                this.editFormAction = `/student/certificates/${data.id}`;
                this.showEditModal = true;
                document.body.classList.add('overflow-hidden');
            },

            closeEditModal() {
                this.showEditModal = false;
                document.body.classList.remove('overflow-hidden');
            }
        }
    }
</script>
@endpush