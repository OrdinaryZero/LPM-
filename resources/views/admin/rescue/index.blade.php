<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Laporan Darurat - Command Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen">

    <header class="bg-[#1f2328] text-white py-4 px-8 shadow-md flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logort.png') }}" alt="Logo" class="h-8">
            <h1 class="font-bold text-lg border-l border-gray-600 pl-4">Command Center - Laporan Masuk</h1>
        </div>
        <a href="{{ route('admin.dashboard') ?? '#' }}" class="text-sm font-bold text-gray-300 hover:text-white bg-white/10 px-4 py-2 rounded-lg transition-colors">
            &larr; Kembali ke Dashboard
        </a>
    </header>

    <main class="max-w-7xl mx-auto p-8">
        <div class="mb-8 flex justify-between items-end">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800">Manajemen Laporan Darurat</h2>
                <p class="text-gray-500 font-medium text-sm mt-1">Ubah status laporan dan unggah foto bukti penanganan lapangan.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50 text-xs text-gray-500 uppercase tracking-wider">
                        <tr>
                            <th class="p-4 font-bold border-b border-gray-100">Kode & Tanggal</th>
                            <th class="p-4 font-bold border-b border-gray-100">Pelapor</th>
                            <th class="p-4 font-bold border-b border-gray-100">Detail Insiden</th>
                            <th class="p-4 font-bold border-b border-gray-100 text-center">Status</th>
                            <th class="p-4 font-bold border-b border-gray-100 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        @forelse($rescues as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4">
                                <p class="font-extrabold text-[#d4a017] text-base">{{ $item->kode_laporan }}</p>
                                <p class="text-xs font-medium text-gray-500">{{ $item->created_at->format('d M Y, H:i') }}</p>
                            </td>
                            <td class="p-4">
                                <p class="font-bold text-gray-900">{{ $item->nama_pelapor }}</p>
                                <p class="text-xs font-medium text-gray-500">{{ $item->no_hp }}</p>
                            </td>
                            <td class="p-4 max-w-xs">
                                <span class="inline-block px-2.5 py-1 rounded text-[10px] font-bold bg-red-50 text-red-600 uppercase mb-1">
                                    {{ $item->jenis_kejadian }}
                                </span>
                                <p class="text-xs text-gray-600 truncate" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</p>
                            </td>
                            <td class="p-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                    {{ $item->status == 'Selesai' ? 'bg-green-100 text-green-700' : 
                                      ($item->status == 'Diproses' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <button type="button" data-item="{{ json_encode($item) }}" onclick="openEditModal(this)" class="bg-[#1f2328] hover:bg-black text-white px-4 py-2 rounded-lg text-xs font-bold transition-colors">
                                    Update Status
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 font-medium">
                                Belum ada laporan masuk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="modalEdit" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl w-full max-w-md shadow-2xl overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-extrabold text-lg text-gray-800">Update Status Laporan</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <form id="formEdit" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Kode Laporan</label>
                    <input type="text" id="edit_kode" disabled class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-100 text-gray-500 font-bold outline-none text-sm cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Ubah Status</label>
                    <select id="edit_status" name="status" onchange="toggleUploadFoto()" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm font-bold text-gray-700">
                        <option value="Menunggu">🟡 Menunggu</option>
                        <option value="Diproses">🔵 Diproses</option>
                        <option value="Selesai">🟢 Selesai</option>
                    </select>
                </div>
                
                <div id="upload_box" class="hidden">
                    <label class="block text-sm font-bold text-green-700 mb-1">Upload Foto Bukti Penanganan</label>
                    <div class="border-2 border-dashed border-green-200 rounded-xl p-4 bg-green-50 text-center">
                        <input type="file" name="foto_penanganan" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-green-100 file:text-green-700 hover:file:bg-green-200 transition-all">
                        <p class="text-[10px] text-green-600 mt-2 font-medium">Wajib diunggah sebagai bukti transparansi ke warga.</p>
                    </div>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex gap-3">
                    <button type="button" onclick="closeEditModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3.5 rounded-xl transition-colors text-sm">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-[#1f2328] hover:bg-black text-white font-bold py-3.5 rounded-xl shadow-lg transition-all text-sm uppercase">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(btnElement) {
            const data = JSON.parse(btnElement.getAttribute('data-item'));
            const modal = document.getElementById('modalEdit');
            
            document.getElementById('formEdit').action = `/admin/rescue/${data.id}`;
            document.getElementById('edit_kode').value = data.kode_laporan;
            document.getElementById('edit_status').value = data.status || 'Menunggu';
            
            toggleUploadFoto(); // Cek apakah perlu nampilin form upload
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('modalEdit');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function toggleUploadFoto() {
            const statusVal = document.getElementById('edit_status').value;
            const uploadBox = document.getElementById('upload_box');
            
            if(statusVal === 'Selesai') {
                uploadBox.classList.remove('hidden');
            } else {
                uploadBox.classList.add('hidden');
            }
        }
    </script>
</body>
</html>