<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Bukti Pendaftaran PPDB</title>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

    @vite(['resources/css/app.css'])

    <style>
        @media print {

            .no-print {
                display: none;
            }

        }
    </style>

</head>

<body class="bg-slate-100">

    <div class="max-w-4xl mx-auto bg-white shadow-xl p-10 mt-10">

        <div class="flex justify-between items-center border-b pb-6">

            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />

            <div class="text-center">

                <h1 class="text-3xl font-bold">
                    SMP NEGERI 1 XXXXX
                </h1>

                <p>
                    PENERIMAAN PESERTA DIDIK BARU
                </p>

                <p>
                    Tahun Ajaran 2026/2027
                </p>

            </div>

            <div class="w-20"></div>

        </div>

        <h2 class="text-center text-2xl font-bold my-8">

            BUKTI PENDAFTARAN

        </h2>

        <table class="w-full">

            <tr>
                <td class="py-2 w-56">Nomor Pendaftaran</td>
                <td>: {{ $student->nomor_pendaftaran }}</td>
            </tr>

            <tr>
                <td>Tanggal Daftar</td>
                <td>: {{ $student->created_at->format('d F Y') }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td>: {{ ucfirst($student->status) }}</td>
            </tr>

        </table>

        <hr class="my-8">

        <h3 class="font-bold text-xl mb-5">

            Data Peserta

        </h3>

        <table class="w-full">

            <tr>
                <td class="py-2 w-56">NIK</td>
                <td>: {{ $student->nik }}</td>
            </tr>

            <tr>
                <td>NISN</td>
                <td>: {{ $student->nisn }}</td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>: {{ $student->nama_lengkap }}</td>
            </tr>

            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:
                    {{ $student->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($student->tanggal_lahir)->translatedFormat('d F Y') }}
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $student->jenis_kelamin }}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>: {{ $student->email }}</td>
            </tr>

            <tr>
                <td>No HP</td>
                <td>: {{ $student->no_hp }}</td>
            </tr>

            <tr>
                <td>Jalur</td>
                <td>: {{ ucfirst($student->jalur) }}</td>
            </tr>

            <tr>
                <td>Asal Sekolah</td>
                <td>: {{ $student->asal_sekolah }}</td>
            </tr>

            <tr>
                <td>Sekolah Tujuan</td>
                <td>: {{ $student->school->name ?? '-' }}</td>
            </tr>

        </table>

        <div class="mt-16 flex justify-between">

            <div>

                {{-- nanti bisa QR Code --}}

            </div>

            <div class="text-center">

                <p>

                    {{ now()->translatedFormat('d F Y') }}

                </p>

                <br><br><br>

                ______________________

                <br>

                Panitia PPDB

            </div>

        </div>

    </div>

    <div class="text-center mt-8 no-print">

        <button
            onclick="window.print()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

            Cetak

        </button>

    </div>

</body>

</html>