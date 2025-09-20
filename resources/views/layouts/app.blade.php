<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r p-4">
            <h2 class="text-lg font-bold mb-4">Menu</h2>
            <ul class="space-y-2">
                <li>
                    <!-- Menu ini mengarahkan ke halaman arsip. Ketika diklik, akan menampilkan semua data surat. -->
                    <a href="{{ route('archives.index') }}" class="flex items-center space-x-2 text-blue-600 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Arsip</span>
                    </a>
                </li>
                <li>
                    <!-- Menu ini mengarahkan ke halaman kategori surat. -->
                    <a href="{{ route('categories.index') }}" class="flex items-center space-x-2 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.25l-2 2h-2.5l-2-2H5a2 2 0 01-2-2V5zm1.5 0a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM6 5a.5.5 0 000 1h8a.5.5 0 000-1H6zm-2 4a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5V9zm6.5 0a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zm3.5-.5a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1a.5.5 0 01.5-.5h1z" clip-rule="evenodd" />
                        </svg>
                        <span>Kategori Surat</span>
                    </a>
                </li>
                <li>
                    <!-- Menu ini akan mengarahkan ke halaman "About" seperti yang diminta. -->
                    <a href="{{ route('about') }}" class="flex items-center space-x-2 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5L5.454 11.23a.25.25 0 00-.022.015.75.75 0 00-.012 1.057l1.248 1.439.006.006a1.5 1.5 0 002.348 0L10 13.882l2.195-2.518a1.5 1.5 0 00-2.348 0L9.044 12.26a.75.75 0 00.012-1.057.25.25 0 00.022-.015L10.867 7A1 1 0 0010 7z" clip-rule="evenodd" />
                        </svg>
                        <span>About</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-2">Arsip Surat</h1>
            <p class="mb-4 text-sm text-gray-600">
                Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat.
            </p>

            <!-- Form Pencarian: Ketika tombol "Cari!" diklik, form akan mengirimkan query ke rute 'archives.index' -->
            <form method="GET" action="{{ route('archives.index') }}" class="flex items-center mb-4 space-x-2">
                <div class="relative w-1/3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" placeholder="Cari surat..." class="border rounded-full p-2 pl-10 w-full text-sm">
                </div>
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-full text-sm font-medium">Cari!</button>
            </form>

            <!-- Pesan sukses -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Arsip -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nomor Surat</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kategori</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Waktu Pengarsipan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($archives as $archive)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $archive->nomor_surat }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $archive->kategori->nama }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $archive->judul }}</td>
                                <td class="px-4 py-3 text-sm text-gray-800">{{ $archive->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-2 py-2 flex space-x-2 items-center">
                                    <!-- Hapus: Form ini akan mengirim permintaan DELETE ke rute 'archives.destroy' -->
                                    <form action="{{ route('archives.destroy', $archive->id) }}" method="POST" onsubmit="return confirm('Yakin hapus surat ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs font-medium">Hapus</button>
                                    </form>
                                    <!-- Unduh: Tombol ini akan mengunduh file PDF dari rute 'archives.download'. -->
                                    <a href="{{ route('archives.download', $archive->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded-full text-xs font-medium">Unduh</a>
                                    <!-- Lihat: Tombol ini akan mengarahkan ke halaman detail surat. -->
                                    <a href="{{ route('archives.show', $archive->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-full text-xs font-medium">Lihat >></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500">Belum ada arsip.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tombol Arsipkan: Tombol ini akan mengarahkan ke halaman untuk menambahkan surat baru. -->
            <div class="mt-4">
                <a href="{{ route('archives.create') }}" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-full text-sm font-medium shadow-md">
                    Arsipkan Surat
                </a>
            </div>
        </main>
    </div>
</body>
</html>
