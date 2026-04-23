<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri - Command Center LPM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <header class="bg-[#1f2328] text-white py-4 px-8 shadow-md flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logort.png') }}" alt="Logo" class="h-8">
            <h1 class="font-bold text-lg border-l border-gray-600 pl-4">Manajemen Galeri & Struktur</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-gray-300 hover:text-white bg-white/10 px-4 py-2 rounded-lg transition-colors">
            &larr; Kembali ke Dashboard
        </a>
    </header>

    <main class="max-w-7xl mx-auto p-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800">Aset Visual Web</h2>
                <p class="text-gray-500 font-medium text-sm mt-1">Unggah foto dokumentasi, armada, atau perbarui struktur organisasi web.</p>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                Unggah Foto Baru
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galeri as $g)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all">
                    <div class="h-48 w-full bg-gray-200 relative overflow-hidden">
                        <img src="{{ asset($g->foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute top-3 left-3">
                            <span class="bg-black/70 backdrop-blur text-white text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">
                                {{ $g->kategori }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-4 flex justify-between items-center bg-white">
                        <h3 class="font-bold text-gray-800 text-sm truncate pr-4" title="{{ $g->judul }}">{{ $g->judul }}</h3>
                        
                        <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus aset visual ini secara permanen?');">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-600 bg-gray-50 hover:bg-red-50 p-2 rounded-lg transition-colors" title="Hapus Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white p-16 text-center rounded-2xl shadow-sm border border-gray-100 border-dashed">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <h3 class="text-lg font-bold text-gray-500 mb-1">Galeri Masih Kosong</h3>
                    <p class="text-sm text-gray-400">Silakan unggah foto struktur atau dokumentasi armada di sini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <div id="modalTambah" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-extrabold text-lg text-gray-800">Unggah Aset Visual</h3>
                <button onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Judul / Deskripsi Singkat</label>
                    <input type="text" name="judul" required placeholder="Misal: Ambulance Alpha 01" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Pilih Kategori Tampilan</label>
                        <select name="kategori" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                            <option value="Armada">Armada & Fasilitas</option>
                        </select>
                    </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Pilih File Foto</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:bg-gray-50 transition-colors">
                        <input type="file" name="foto" required accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#d4a017]/10 file:text-[#d4a017] hover:file:bg-[#d4a017]/20">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2 font-medium">Format didukung: JPG, PNG. Maksimal ukuran file: 5MB.</p>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all text-sm uppercase tracking-wide">
                        Mulai Unggah
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>