<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'PPDB Online Dashboard')</title>

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

        .sidebar-link.active {
            background: rgb(30 41 59);
            border-right: 3px solid rgb(59 130 246);
        }
    </style>

    @stack('styles')

</head>

<body class="text-white">

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-72 h-screen bg-slate-900 border-r border-slate-800 fixed overflow-y-auto">

            <div class="p-6">

                <h1 class="text-2xl font-bold">
                    🎓 PPDB ONLINE
                </h1>

                <p class="text-slate-400 text-sm mt-1">
                    Admin Dashboard
                </p>

            </div>

            <nav class="mt-6">

                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>

                <a href="{{ route('admin.students.index') }}"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                    👨‍🎓 Data Siswa
                </a>

                <a href="#"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800">
                    📄 Verifikasi Dokumen
                </a>

                <a href="#"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800">
                    📍 Seleksi Zonasi
                </a>

                <a href="#"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800">
                    🏆 Seleksi Prestasi
                </a>

                <a href="#"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800">
                    📢 Pengumuman
                </a>

                <a href="#"
                    class="sidebar-link block px-6 py-3 hover:bg-slate-800">
                    📈 Laporan
                </a>

            </nav>

        </aside>

        <!-- Main -->
        <main class="ml-72 w-full min-h-screen">

            <!-- Navbar -->
            <div class="bg-slate-900 border-b border-slate-800 p-5 flex justify-between items-center">

                <div>
                    <h2 class="text-xl font-semibold">
                        @yield('page-title', 'Dashboard PPDB')
                    </h2>

                    <p class="text-sm text-slate-400 mt-1">
                        Selamat datang, {{ auth()->user()->name }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition">
                        Logout
                    </button>

                </form>

            </div>

            <div class="p-8">

                @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-600">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-600">
                    <ul class="list-disc ml-5">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')

            </div>

        </main>

    </div>

    @stack('scripts')

</body>

</html>