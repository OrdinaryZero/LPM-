<!DOCTYPE html>
<html lang="id">
<head>
    <title>Manajemen Berita - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-extrabold text-gray-800 mb-6">Manajemen Berita & Publikasi</h2>
        
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">✅ {{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-fit">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Tulis Berita Baru</h3>
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Judul Berita</label>
                        <input type="text" name="judul" required class="w-full px-4 py-2 rounded-xl border bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" class="w-full px-4 py-2 rounded-xl border bg-gray-50">
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Bakti Sosial">Bakti Sosial</option>
                            <option value="Rescue">Rescue</option>
                            <option value="Pengumuman">Pengumuman</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" required class="w-full px-4 py-2 rounded-xl border bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Foto Utama</label>
                        <input type="file" name="foto" required accept="image/*" class="w-full px-4 py-2 rounded-xl border bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Isi Berita</label>
                        <textarea name="konten" rows="5" required class="w-full px-4 py-2 rounded-xl border bg-gray-50"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#1f2328] hover:bg-black text-white font-bold py-3 rounded-xl">SIMPAN BERITA</button>
                </form>
            </div>

            <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Daftar Publikasi</h3>
                <div class="space-y-4">
                    @foreach($beritas as $item)
                        <div class="flex gap-4 items-center border-b pb-4">
                            <img src="{{ asset($item->foto) }}" class="w-20 h-20 rounded-lg object-cover">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-[#d4a017]">{{ $item->kategori }} • {{ $item->tanggal }}</span>
                                <h4 class="font-bold text-gray-900">{{ $item->judul }}</h4>
                            </div>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm bg-red-50 p-2 rounded">Hapus</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>