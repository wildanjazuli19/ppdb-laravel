@extends('layouts.admin')

@section('title', 'Verifikasi Dokumen')

@section('page-title', '📄 Verifikasi Dokumen')

@section('content')

<div class="glass rounded-2xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-800">
            <tr>
                <th class="px-6 py-4 text-left">No</th>
                <th class="px-6 py-4 text-left">No. Pendaftaran</th>
                <th class="px-6 py-4 text-left">Nama</th>
                <th class="px-6 py-4 text-left">Jalur</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($students as $student)

            <tr class="border-t border-slate-800">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->nomor_pendaftaran }}
                </td>

                <td class="px-6 py-4">
                    {{ $student->nama_lengkap }}
                </td>

                <td class="px-6 py-4">
                    {{ ucfirst($student->jalur) }}
                </td>

                <td class="px-6 py-4">

                    @if($student->status_verifikasi == 'pending')
                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                        Menunggu
                    </span>
                    @elseif($student->status_verifikasi == 'verified')
                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                        Disetujui
                    </span>
                    @else
                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">
                        Ditolak
                    </span>
                    @endif

                </td>

                <td class="px-6 py-4">

                    <a href="{{ route('admin.document-verifications.show', $student) }}"
                        class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg">
                        Verifikasi
                    </a>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-slate-400">
                    Belum ada data.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">
    {{ $students->links() }}
</div>

@endsection