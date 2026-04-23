<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Struktur - Command Center LPM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <header class="bg-[#1f2328] text-white py-4 px-8 shadow-md flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logort.png') }}" alt="Logo" class="h-8">
            <h1 class="font-bold text-lg border-l border-gray-600 pl-4">Manajemen Struktur Komando</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-gray-300 hover:text-white bg-white/10 px-4 py-2 rounded-lg transition-colors">
            &larr; Kembali ke Dashboard
        </a>
    </header>

    <main class="max-w-7xl mx-auto p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-extrabold text-gray-800">Family Tree Pengurus</h2>
            <p class="text-gray-500 font-medium text-sm mt-1">Atur hirarki jabatan, urutan tampil, dan petakan foto pengurus.</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-fit">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Tambah Pengurus Baru</h3>
                <form action="{{ route('admin.struktur.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Pengurus</label>
                        <input type="text" name="nama" placeholder="Contoh: Aditya Febrian" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" required placeholder="Contoh: Ketua LPM" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Urutan Tampil</label>
                        <input type="number" name="urutan" value="1" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm" title="Angka 1 akan tampil paling kiri/atas">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Pilih Foto Bank</label>
                        <select name="foto_nomer" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm font-semibold text-gray-700">
                            <option value="">-- Klik untuk Pilih Foto --</option>
                            @foreach($pilihanFoto as $foto)
                                <option value="{{ $foto }}">{{ $foto }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Melapor Kepada (Atasan)</label>
                        <select name="parent_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                            <option value="">-- Paling Atas (Ketua Puncak) --</option>
                            @foreach($strukturs as $s)
                                <option value="{{ $s->id }}">{{ $s->jabatan }} - {{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit" class="w-full bg-[#1f2328] hover:bg-black text-white font-bold py-3.5 rounded-xl shadow-lg transition-all text-sm uppercase tracking-wide">
                            Simpan ke Struktur
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-lg text-gray-800">Daftar Hirarki Saat Ini</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50/50 text-xs text-gray-400 uppercase tracking-wider">
                            <tr>
                                <th class="p-4 font-bold border-b border-gray-100 w-16">Foto</th>
                                <th class="p-4 font-bold border-b border-gray-100">Jabatan & Nama</th>
                                <th class="p-4 font-bold border-b border-gray-100">Melapor Ke</th>
                                <th class="p-4 font-bold border-b border-gray-100 text-center">Urut</th>
                                <th class="p-4 font-bold border-b border-gray-100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm">
                            @forelse($strukturs as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4">
                                    <div class="w-10 h-10 rounded-full border-2 border-gray-200 overflow-hidden bg-gray-100">
                                        <img src="{{ asset('uploads/struktur/' . $item->foto_nomer) }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://via.placeholder.com/150?text=No+Img';">
                                    </div>
                                </td>
                                <td class="p-4">
                                    <p class="font-extrabold text-gray-900">{{ $item->jabatan }}</p>
                                    <p class="text-xs font-medium text-gray-500">{{ $item->nama ?? 'Belum Diisi' }}</p>
                                </td>
                                <td class="p-4">
                                    @if($item->atasan)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700">
                                            {{ $item->atasan->jabatan }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-[#d4a017]/10 text-[#d4a017]">
                                            ⭐ Pimpinan
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-center font-bold text-gray-700">
                                    {{ $item->urutan }}
                                </td>
                                <td class="p-4 flex gap-2">
                                    <button type="button" data-item="{{ json_encode($item) }}" onclick="openEditModal(this)" class="text-gray-400 hover:text-blue-600 bg-white hover:bg-blue-50 p-2 rounded-lg border border-gray-100 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>

                                    <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jabatan ini? Jika ada bawahan, mereka juga terhapus!');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 bg-white hover:bg-red-50 p-2 rounded-lg border border-gray-100 transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-400 font-medium">
                                    Belum ada data struktur.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div id="modalEdit" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl w-full max-w-md shadow-2xl overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-extrabold text-lg text-gray-800">Edit Pengurus</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <form id="formEdit" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Pengurus</label>
                    <input type="text" id="edit_nama" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                    <input type="text" id="edit_jabatan" name="jabatan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" id="edit_urutan" name="urutan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Ganti Foto Bank</label>
                    <select id="edit_foto" name="foto_nomer" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none text-sm font-semibold text-gray-700">
                        @foreach($pilihanFoto as $foto)
                            <option value="{{ $foto }}">{{ $foto }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Pindah Atasan (Melapor Ke)</label>
                    <select id="edit_parent" name="parent_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none text-sm">
                        <option value="">-- Paling Atas (Ketua Puncak) --</option>
                        @foreach($strukturs as $s)
                            <option value="{{ $s->id }}">{{ $s->jabatan }} - {{ $s->nama }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex gap-3">
                    <button type="button" onclick="closeEditModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3.5 rounded-xl transition-colors text-sm">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all text-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(btnElement) {
            // Ambil data JSON yang dititipkan di tombol edit
            const data = JSON.parse(btnElement.getAttribute('data-item'));
            const modal = document.getElementById('modalEdit');
            
            // Ubah action form agar mengarah ke route update yang benar
            document.getElementById('formEdit').action = `/admin/struktur/${data.id}`;
            
            // Isi inputan dengan data lama
            document.getElementById('edit_nama').value = data.nama || '';
            document.getElementById('edit_jabatan').value = data.jabatan || '';
            document.getElementById('edit_urutan').value = data.urutan || '1';
            document.getElementById('edit_foto').value = data.foto_nomer || '';
            document.getElementById('edit_parent').value = data.parent_id || '';
            
            // Tampilkan Modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('modalEdit');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

</body>
</html>