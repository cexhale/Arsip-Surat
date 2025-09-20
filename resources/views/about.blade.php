<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
                    <a href="{{ route('archives.index') }}" class="flex items-center space-x-2 hover:text-blue-600">
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
                    <a href="{{ route('about') }}" class="flex items-center space-x-2 text-blue-600 font-semibold">
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
            <h1 class="text-2xl font-bold mb-4">About</h1>
            
            <div class="bg-white rounded-lg shadow-md p-6 max-w-lg mx-auto">
                <div class="flex items-center space-x-6">
                    <!-- Placeholder untuk foto profil -->
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                        <!-- Ganti URL di bawah ini dengan path ke foto Anda -->
                        <img src="{{ asset('images/423049145.jpg') }}" alt="Foto Profil" class="object-cover w-full h-full">
                    </div>
                    
                    <div class="space-y-2">
                        <h2 class="text-xl font-bold text-gray-800">Aplikasi ini dibuat oleh:</h2>
                        <div class="text-gray-700">
                            <p><strong>Nama:</strong> Chalimatus Sa`diyah</p>
                            <p><strong>Prodi:</strong> D3-MI PSDKU Kediri</p>
                            <p><strong>NIM:</strong> 2331730002</p>
                            <p><strong>Tanggal:</strong> 20 September 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
