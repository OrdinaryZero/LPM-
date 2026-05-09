<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-800 flex items-center gap-2">
            🏗️ Usulan Proyek Pembangunan
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">Daftar usulan infrastruktur dan program dari warga LPM Banjarbaru.</p>
    </div>
    <button class="bg-[#d4a017] hover:bg-[#b8860b] text-white px-5 py-2.5 rounded-xl font-bold transition-all text-sm flex items-center gap-2 shadow-lg shadow-[#d4a017]/30">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Usulan
    </button>
</div>

<!-- KONTEN TABEL -->
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
        <h3 class="font-extrabold text-gray-800 text-sm">Daftar Usulan Masuk</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 text-xs text-gray-400 uppercase tracking-wider border-b border-gray-100">
                    <th class="p-4 pl-6 font-bold">Judul Usulan</th>
                    <th class="p-4 font-bold">Pengusul</th>
                    <th class="p-4 font-bold">Lokasi</th>
                    <th class="p-4 font-bold text-center">Status</th>
                    <th class="p-4 pr-6 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-50">
                @forelse($usulan ?? [] as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4 pl-6 font-bold text-gray-800">{{ $item->judul ?? 'Perbaikan Drainase' }}</td>
                    <td class="p-4 text-gray-600">{{ $item->nama_pengusul ?? 'Ketua RT 05' }}</td>
                    <td class="p-4 text-gray-600 truncate max-w-[150px]">{{ $item->lokasi ?? 'Jl. Manggis Raya' }}</td>
                    <td class="p-4 text-center">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-blue-50 text-blue-600 border border-blue-100">
                            Menunggu Review
                        </span>
                    </td>
                    <td class="p-4 pr-6 text-right">
                        <button class="text-[#d4a017] hover:bg-[#d4a017] hover:text-white p-2 rounded-lg transition-colors border border-transparent hover:border-[#d4a017]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-12 text-center text-gray-400">
                        <p class="font-medium text-sm">Belum ada usulan proyek.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>