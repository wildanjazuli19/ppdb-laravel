<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #0f172a;
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>

</head>

<body class="text-white">

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-72 h-screen bg-slate-900 border-r border-slate-800 fixed">

            <div class="p-6">

                <h1 class="text-2xl font-bold">
                    🎓 PPDB ONLINE
                </h1>

                <p class="text-slate-400 text-sm mt-1">
                    Admin Dashboard
                </p>

            </div>

            <nav class="mt-6">

                <a href="#" class="block px-6 py-3 hover:bg-slate-800">
                    📊 Dashboard
                </a>

                <a href="{{ route('admin.students.index') }}" class="block px-6 py-3 hover:bg-slate-800">
                    👨‍🎓 Data Siswa
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-slate-800">
                    📄 Verifikasi Dokumen
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-slate-800">
                    📍 Seleksi Zonasi
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-slate-800">
                    🏆 Seleksi Prestasi
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-slate-800">
                    📢 Pengumuman
                </a>

            </nav>

        </aside>

        <!-- Main -->
        <main class="ml-72 w-full">

            <!-- Navbar -->
            <div class="bg-slate-900 border-b border-slate-800 p-5 flex justify-between">

                <h2 class="text-xl font-semibold">
                    Dashboard PPDB
                </h2>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg">
                        Logout
                    </button>

                </form>

            </div>

            <div class="p-8">

                <!-- Statistik -->
                <div class="grid md:grid-cols-4 gap-5">

                    <div class="glass rounded-2xl p-5">
                        <p class="text-slate-400">
                            Total Pendaftar
                        </p>

                        <h2 class="text-4xl font-bold mt-3">
                            120
                        </h2>
                    </div>

                    <div class="glass rounded-2xl p-5">
                        <p class="text-slate-400">
                            Verifikasi
                        </p>

                        <h2 class="text-4xl font-bold mt-3">
                            85
                        </h2>
                    </div>

                    <div class="glass rounded-2xl p-5">
                        <p class="text-slate-400">
                            Diterima
                        </p>

                        <h2 class="text-4xl font-bold mt-3">
                            50
                        </h2>
                    </div>

                    <div class="glass rounded-2xl p-5">
                        <p class="text-slate-400">
                            Ditolak
                        </p>

                        <h2 class="text-4xl font-bold mt-3">
                            35
                        </h2>
                    </div>

                </div>

                <!-- Menu -->
                <div class="grid md:grid-cols-3 gap-6 mt-8">

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            👨‍🎓 Data Siswa
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Kelola seluruh data calon peserta didik.
                        </p>
                    </div>

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            📄 Verifikasi Dokumen
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Verifikasi KK, Akta, Rapor dan Sertifikat.
                        </p>
                    </div>

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            📍 Seleksi Zonasi
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Seleksi berdasarkan jarak rumah ke sekolah.
                        </p>
                    </div>

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            🏆 Seleksi Prestasi
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Seleksi berdasarkan nilai dan sertifikat.
                        </p>
                    </div>

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            📢 Pengumuman
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Kelola hasil seleksi PPDB.
                        </p>
                    </div>

                    <div class="glass rounded-2xl p-6">
                        <h3 class="text-xl font-bold">
                            📈 Laporan
                        </h3>

                        <p class="text-slate-400 mt-2">
                            Statistik dan laporan PPDB.
                        </p>
                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>