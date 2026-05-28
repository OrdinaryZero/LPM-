<!DOCTYPE html>
<html lang="id">
<head>
    <title>Semua Berita - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-6">
        <a href="/" class="text-blue-600 font-bold mb-6 inline-block">← Kembali ke Beranda</a>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Semua Publikasi & Kegiatan</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($beritas as $berita)
            <a href="{{ route('berita.show', $berita->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all block group">
                <img src="{{ asset($berita->foto) }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="p-5">
                    <span class="text-[#d4a017] text-xs font-bold">{{ $berita->kategori }} • {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                    <h3 class="font-bold text-lg text-gray-900 mt-2">{{ $berita->judul }}</h3>
                </div>
            </a>
            @endforeach
        </div>
        
        <div class="mt-8">{{ $beritas->links() }}</div>
    </div>
</body>
</html>