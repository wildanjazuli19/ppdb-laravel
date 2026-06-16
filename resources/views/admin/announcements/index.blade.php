@extends('layouts.admin')

@section('title', 'Pengumuman')

@section('page-title', '📢 Pengumuman')

@section('content')

<div class="flex justify-end mb-6">

    <a href="{{ route('admin.announcements.create') }}"
        class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl">
        + Tambah Pengumuman
    </a>

</div>

<div class="glass rounded-2xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-800">

            <tr>
                <th class="px-6 py-4 text-left">Judul</th>
                <th class="px-6 py-4 text-left">Tanggal</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-left">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($announcements as $announcement)

            <tr class="border-t border-slate-800">

                <td class="px-6 py-4">
                    {{ $announcement->judul }}
                </td>

                <td class="px-6 py-4">
                    {{ $announcement->tanggal_publish->format('d M Y') }}
                </td>

                <td class="px-6 py-4">

                    @if($announcement->status == 'published')

                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                        Published
                    </span>

                    @else

                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">
                        Draft
                    </span>

                    @endif

                </td>

                <td class="px-6 py-4 flex gap-2">

                    <a href="{{ route('admin.announcements.edit', $announcement) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('admin.announcements.destroy', $announcement) }}">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4"
                    class="text-center py-8 text-slate-400">

                    Belum ada pengumuman.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-6">
    {{ $announcements->links() }}
</div>

@endsection