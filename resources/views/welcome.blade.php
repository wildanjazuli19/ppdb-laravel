<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB Online 2026</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #020617;
        }

        .glass {
            backdrop-filter: blur(20px);
            background: rgba(15, 23, 42, .65);
            border: 1px solid rgba(255, 255, 255, .08);
        }

        .gradient {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
        }
    </style>
</head>

<body class="text-white">

    <!-- ================= NAVBAR ================= -->

    <header class="fixed top-0 left-0 w-full z-50 glass">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center h-20">

                <div>
                    <h1 class="font-bold text-2xl">
                        PPDB 2026
                    </h1>
                </div>

                <nav class="hidden md:flex gap-8 text-sm">

                    <a href="#home" class="hover:text-blue-400">Beranda</a>
                    <a href="#about" class="hover:text-blue-400">Tentang</a>
                    <a href="#flow" class="hover:text-blue-400">Alur</a>
                    <a href="#schedule" class="hover:text-blue-400">Jadwal</a>

                </nav>

                <div class="flex gap-3">

                    <a href="/login"
                        class="px-5 py-2 rounded-xl border border-slate-600 hover:bg-slate-700">
                        Login
                    </a>

                    <a href="/register"
                        class="gradient px-5 py-2 rounded-xl">
                        Daftar
                    </a>

                </div>

            </div>

        </div>
    </header>

    <!-- ================= HERO ================= -->

    <section id="home" class="pt-40 pb-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div>

                    <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm">
                        🎓 PPDB Tahun Ajaran 2026/2027
                    </span>

                    <h1 class="text-5xl lg:text-6xl font-black mt-6 leading-tight">
                        Penerimaan Peserta Didik Baru
                        <span class="text-blue-400">
                            Online
                        </span>
                    </h1>

                    <p class="text-slate-300 mt-8 text-lg leading-8">

                        Daftar sekolah kini lebih mudah.
                        Isi formulir secara online,
                        upload dokumen,
                        pantau proses seleksi,
                        dan lihat hasil penerimaan
                        dalam satu aplikasi.

                    </p>

                    <div class="flex flex-wrap gap-4 mt-10">

                        <a href="/register"
                            class="gradient px-8 py-4 rounded-xl font-semibold">

                            Daftar Sekarang

                        </a>

                        <a href="#flow"
                            class="border border-slate-600 px-8 py-4 rounded-xl hover:bg-slate-800">

                            Pelajari Alur

                        </a>

                    </div>

                </div>

                <div>

                    <div class="glass rounded-3xl p-10">

                        <div class="grid grid-cols-2 gap-6">

                            <div class="bg-slate-800 rounded-2xl p-6 text-center">
                                <div class="text-4xl font-bold text-blue-400">
                                    1000+
                                </div>

                                <p class="mt-2 text-slate-300">
                                    Pendaftar
                                </p>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-6 text-center">
                                <div class="text-4xl font-bold text-green-400">
                                    15
                                </div>

                                <p class="mt-2 text-slate-300">
                                    Rombel
                                </p>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-6 text-center">
                                <div class="text-4xl font-bold text-purple-400">
                                    4
                                </div>

                                <p class="mt-2 text-slate-300">
                                    Jalur
                                </p>
                            </div>

                            <div class="bg-slate-800 rounded-2xl p-6 text-center">
                                <div class="text-4xl font-bold text-yellow-400">
                                    100%
                                </div>

                                <p class="mt-2 text-slate-300">
                                    Online
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= KEUNGGULAN ================= -->

    <section id="about" class="py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center">

                <h2 class="text-4xl font-bold">
                    Mengapa Memilih Sekolah Kami?
                </h2>

                <p class="text-slate-400 mt-4">
                    Pendidikan berkualitas dengan lingkungan belajar yang nyaman.
                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">

                <div class="glass rounded-2xl p-8">
                    <div class="text-5xl">🏫</div>
                    <h3 class="mt-5 font-bold text-xl">Fasilitas Lengkap</h3>
                    <p class="text-slate-400 mt-3">
                        Ruang kelas modern, laboratorium, perpustakaan, dan area olahraga.
                    </p>
                </div>

                <div class="glass rounded-2xl p-8">
                    <div class="text-5xl">👨‍🏫</div>
                    <h3 class="mt-5 font-bold text-xl">Guru Profesional</h3>
                    <p class="text-slate-400 mt-3">
                        Didukung tenaga pendidik yang berpengalaman dan kompeten.
                    </p>
                </div>

                <div class="glass rounded-2xl p-8">
                    <div class="text-5xl">🏆</div>
                    <h3 class="mt-5 font-bold text-xl">Berprestasi</h3>
                    <p class="text-slate-400 mt-3">
                        Banyak prestasi akademik maupun non-akademik tingkat daerah dan nasional.
                    </p>
                </div>

                <div class="glass rounded-2xl p-8">
                    <div class="text-5xl">💻</div>
                    <h3 class="mt-5 font-bold text-xl">Digital Learning</h3>
                    <p class="text-slate-400 mt-3">
                        Mendukung pembelajaran berbasis teknologi dan digital.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <!-- ================= ALUR ================= -->

    <section id="flow" class="py-24 bg-slate-900/50">

        <div class="max-w-6xl mx-auto px-6">

            <div class="text-center">

                <h2 class="text-4xl font-bold">
                    Alur Pendaftaran
                </h2>

            </div>

            <div class="grid md:grid-cols-4 gap-8 mt-16">

                @foreach([
                'Buat Akun',
                'Isi Formulir',
                'Upload Dokumen',
                'Lihat Hasil'
                ] as $step)

                <div class="glass rounded-2xl p-8 text-center">

                    <div class="w-14 h-14 mx-auto rounded-full gradient flex items-center justify-center font-bold text-xl">
                        {{ $loop->iteration }}
                    </div>

                    <h3 class="mt-6 font-bold text-xl">
                        {{ $step }}
                    </h3>

                </div>

                @endforeach

            </div>

        </div>

    </section>

    <!-- ================= JADWAL ================= -->

    <section id="schedule" class="py-24">

        <div class="max-w-5xl mx-auto px-6">

            <div class="glass rounded-3xl p-10">

                <h2 class="text-4xl font-bold text-center">
                    Jadwal PPDB
                </h2>

                <div class="mt-10 space-y-5">

                    <div class="flex justify-between border-b border-slate-700 pb-4">
                        <span>Pendaftaran Online</span>
                        <span>4 Juli 2026 - 12 September 2026</span>
                    </div>

                    <div class="flex justify-between border-b border-slate-700 pb-4">
                        <span>Verifikasi Berkas</span>
                        <span>Setiap Hari Kerja</span>
                    </div>

                    <div class="flex justify-between border-b border-slate-700 pb-4">
                        <span>Pengumuman</span>
                        <span>15 September 2026</span>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= CTA ================= -->

    <section class="py-24">

        <div class="max-w-5xl mx-auto px-6">

            <div class="gradient rounded-3xl p-14 text-center">

                <h2 class="text-4xl font-bold">
                    Siap Menjadi Bagian dari Sekolah Kami?
                </h2>

                <p class="mt-6 text-lg opacity-90">
                    Daftarkan diri Anda sekarang juga sebelum masa pendaftaran berakhir.
                </p>

                <a href="/register"
                    class="inline-block mt-10 bg-white text-slate-900 px-10 py-4 rounded-xl font-bold hover:scale-105 transition">

                    Daftar Sekarang

                </a>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->

    <footer class="border-t border-slate-800 py-8">

        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-slate-400">
                © 2026 PPDB Online. All Rights Reserved.
            </p>

            <div class="flex gap-6 text-slate-400">
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">YouTube</a>
            </div>

        </div>

    </footer>

</body>

</html>