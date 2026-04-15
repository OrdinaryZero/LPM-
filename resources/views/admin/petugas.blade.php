<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Staf & Tim Inti - Command Center LPM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <header class="bg-[#1f2328] text-white py-4 px-8 shadow-md flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logort.png') }}" alt="Logo" class="h-8">
            <h1 class="font-bold text-lg border-l border-gray-600 pl-4">Manajemen SDM LPM</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-gray-300 hover:text-white bg-white/10 px-4 py-2 rounded-lg transition-colors">
            &larr; Kembali ke Dashboard
        </a>
    </header>

    <main class="max-w-7xl mx-auto p-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="mb-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-200 pb-4">
                <div>
                    <span class="text-[#d4a017] font-extrabold text-sm uppercase tracking-widest">Struktural Publik</span>
                    <h2 class="text-2xl font-extrabold text-gray-800">Tim Inti Pengurus</h2>
                    <p class="text-gray-500 font-medium text-sm mt-1">Data di bawah ini akan ditampilkan pada halaman beranda utama warga.</p>
                </div>
                <button onclick="document.getElementById('modalTimInti').classList.remove('hidden')" class="bg-[#d4a017] hover:bg-[#b8860b] text-white font-bold py-3 px-6 rounded-xl shadow-md transition-all text-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Tim Inti
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($tim_inti as $ti)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center relative group">
                        <div class="w-20 h-20 mx-auto rounded-full bg-gray-100 border-2 border-gray-200 overflow-hidden mb-3">
                            @if($ti->foto) <img src="{{ asset($ti->foto) }}" class="w-full h-full object-cover"> @endif
                        </div>
                        <h3 class="font-bold text-gray-900">{{ $ti->nama }}</h3>
                        <p class="text-xs font-bold text-[#d4a017] uppercase">{{ $ti->jabatan }}</p>
                        
                        <form action="{{ route('admin.petugas.destroy', $ti->id) }}" method="POST" onsubmit="return confirm('Hapus pejabat ini dari beranda?');" class="mt-4">
                            @csrf
                            <button type="submit" class="text-xs text-red-500 hover:text-red-700 bg-red-50 py-1.5 px-4 rounded-lg w-full font-bold">Hapus Data</button>
                        </form>
                    </div>
                @empty
                    <div class="col-span-full bg-white p-8 text-center rounded-2xl border border-dashed border-gray-300">
                        <p class="text-gray-400 font-medium">Belum ada data Tim Inti.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-200 pb-4">
                <div>
                    <span class="text-red-600 font-extrabold text-sm uppercase tracking-widest">Operasional Lapangan</span>
                    <h2 class="text-2xl font-extrabold text-gray-800">Petugas Siaga & Rescue</h2>
                    <p class="text-gray-500 font-medium text-sm mt-1">Kelola data anggota rescue dan atur shift jaga secara real-time.</p>
                </div>
                <button onclick="document.getElementById('modalPetugas').classList.remove('hidden')" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition-all text-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Petugas Lapangan
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($petugas_lapangan as $p)
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative">
                        <div class="absolute top-4 right-4">
                            @if($p->status_jaga == 'Aktif')
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1.5 shadow-sm border border-green-200">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Jaga Shift
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1.5 border border-gray-200">
                                    <span class="w-2 h-2 rounded-full bg-gray-400"></span> Off Duty
                                </span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4 mb-4 mt-2">
                            <div class="w-16 h-16 rounded-full bg-gray-100 border-2 border-gray-200 overflow-hidden flex-shrink-0">
                                @if($p->foto) <img src="{{ asset($p->foto) }}" class="w-full h-full object-cover"> @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">{{ $p->nama }}</h3>
                                <p class="text-sm font-semibold text-gray-500">{{ $p->jabatan }}</p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-600 font-medium mb-4 flex items-center gap-2">
                            📞 {{ $p->no_hp }}
                        </div>

                        <div class="flex gap-2 border-t border-gray-100 pt-4">
                            <form action="{{ route('admin.petugas.toggle', $p->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full py-2 rounded-lg text-xs font-bold transition-colors {{ $p->status_jaga == 'Aktif' ? 'bg-orange-50 text-orange-600 hover:bg-orange-100' : 'bg-green-50 text-green-600 hover:bg-green-100' }}">
                                    {{ $p->status_jaga == 'Aktif' ? 'Matikan Shift' : 'Aktifkan Shift' }}
                                </button>
                            </form>
                            
                            <form action="{{ route('admin.petugas.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus petugas lapangan ini?');">
                                @csrf
                                <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white p-8 text-center rounded-2xl border border-dashed border-gray-300">
                        <p class="text-gray-400 font-medium">Belum ada data Petugas Lapangan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <div id="modalTimInti" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-extrabold text-lg text-gray-800">Tambah Tim Inti (Struktural)</h3>
                <button onclick="document.getElementById('modalTimInti').classList.add('hidden')" class="text-gray-400 hover:text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <form action="{{ route('admin.petugas.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="kategori_petugas" value="Pengurus"> <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Pejabat/Pengurus</label>
                    <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan Struktural</label>
                    <input type="text" name="jabatan" placeholder="Misal: Ketua LPM, Sekretaris, dll" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Pas Foto (Formal)</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#d4a017]/10 file:text-[#d4a017]">
                </div>
                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full bg-[#d4a017] hover:bg-[#b8860b] text-white font-bold py-3 rounded-xl shadow-lg transition-all text-sm uppercase">Simpan Tim Inti</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalPetugas" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-extrabold text-lg text-gray-800">Tambah Petugas Siaga</h3>
                <button onclick="document.getElementById('modalPetugas').classList.add('hidden')" class="text-gray-400 hover:text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <form action="{{ route('admin.petugas.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="kategori_petugas" value="Lapangan"> <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Petugas</label>
                    <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Peran Lapangan</label>
                    <select name="jabatan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
                        <option value="Komandan Regu">Komandan Regu</option>
                        <option value="Supir Ambulance">Supir Ambulance</option>
                        <option value="Paramedis">Paramedis</option>
                        <option value="Operator Radio">Operator Radio</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">No. WhatsApp / Kontak</label>
                    <input type="number" name="no_hp" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Foto Petugas (Opsional)</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-red-50 file:text-red-700">
                </div>
                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full bg-[#1f2328] hover:bg-black text-white font-bold py-3 rounded-xl shadow-lg transition-all text-sm uppercase">Simpan Petugas Lapangan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>