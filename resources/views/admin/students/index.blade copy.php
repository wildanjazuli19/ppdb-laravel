<x-app-layout>

<div class="p-8">

    <h1 class="text-3xl font-bold mb-6">
        Data Pendaftar PPDB
    </h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">
                        No Pendaftaran
                    </th>

                    <th class="p-3 text-left">
                        Nama
                    </th>

                    <th class="p-3 text-left">
                        Jalur
                    </th>

                    <th class="p-3 text-left">
                        Status
                    </th>

                    <th class="p-3 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($students as $student)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $student->nomor_pendaftaran }}
                    </td>

                    <td class="p-3">
                        {{ $student->nama_lengkap }}
                    </td>

                    <td class="p-3">
                        {{ ucfirst($student->jalur) }}
                    </td>

                    <td class="p-3">

                        @if($student->status == 'pending')

                            <span class="text-yellow-600">
                                Pending
                            </span>

                        @elseif($student->status == 'accepted')

                            <span class="text-green-600">
                                Diterima
                            </span>

                        @elseif($student->status == 'rejected')

                            <span class="text-red-600">
                                Ditolak
                            </span>

                        @endif

                    </td>

                    <td class="p-3">

                        <a href="#"
                           class="bg-blue-500 text-white px-3 py-1 rounded">

                            Detail

                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>