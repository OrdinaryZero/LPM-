<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Log Laporan - Command Center LPM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-100 h-screen flex overflow-hidden">

    <aside class="w-64 bg-[#1f2328] text-white flex flex-col hidden md:flex h-full shadow-2xl relative z-20">
        <div class="h-20 flex items-center px-6 border-b border-gray-700 bg-black/20">
            <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-10">
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">Main Panel</p>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                Live Report
            </a>
            
            <a href="{{ route('admin.logs') }}" class="flex items-center gap-3 px-4 py-3 bg-[#d4a017] text-white rounded-xl font-bold transition-colors shadow-[0_4px_15px_rgba(212,160,23,0.3)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Log Laporan
            </a>

            <div class="pt-6">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">CMS & Pengaturan</p>
                <a href="{{ route('admin.petugas') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Jadwal & Staf
                </a>
                <a href="{{ route('admin.galeri') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    Galeri & Gambar
                </a>
            </div>
        </div>
        <div class="p-4 border-t border-gray-700">
            <a href="{{ route('admin.logout') }}" class="flex items-center justify-center gap-2 w-full bg-red-600/10 text-red-500 hover:bg-red-600 hover:text-white py-3 rounded-xl font-bold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                Keluar Panel
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 shrink-0 z-10">
            <div>
                <h2 class="text-xl font-extrabold text-gray-800">Semua Log Laporan</h2>
                <p class="text-xs font-medium text-gray-500">Riwayat panggilan darurat & evakuasi medis</p>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
                    <h3 class="font-extrabold text-gray-800 text-lg">Database Laporan Masuk</h3>
                    
                    <div class="relative">
                        <input type="text" placeholder="Cari laporan..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#d4a017]">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 text-xs text-gray-500 uppercase tracking-wider">
                                <th class="p-4 pl-6 font-bold border-b border-gray-100">Waktu & Tanggal</th>
                                <th class="p-4 font-bold border-b border-gray-100">Pemohon / Kontak</th>
                                <th class="p-4 font-bold border-b border-gray-100">Lokasi Penjemputan</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-1/4">Kondisi / Keluhan</th>
                                <th class="p-4 font-bold border-b border-gray-100 text-center">Status & Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-50">
                            @forelse($logs as $log)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 pl-6 text-gray-600 font-medium whitespace-nowrap">
                                    <span class="block text-gray-800 font-bold">{{ $log->created_at->format('d M Y') }}</span>
                                    <span class="text-xs text-gray-400">{{ $log->created_at->format('H:i') }} WITA</span>
                                </td>
                                <td class="p-4">
                                    <p class="font-bold text-gray-800">{{ $log->nama_pemohon }}</p>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $log->no_hp) }}" target="_blank" class="text-xs text-green-600 font-bold hover:underline">
                                        {{ $log->no_hp }}
                                    </a>
                                </td>
                                <td class="p-4 text-gray-600 font-medium">
                                    {{ $log->lokasi_jemput }}
                                </td>
                                <td class="p-4">
                                    <p class="text-xs font-medium text-gray-700 bg-gray-100 p-2 rounded-lg inline-block border border-gray-200">
                                        {{ $log->kondisi_pasien ?? 'Tidak ada keterangan khusus' }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('admin.logs.status', $log->id) }}" method="POST" class="flex flex-col gap-2 items-center">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg border-gray-200 px-3 py-1.5 focus:ring-0 cursor-pointer shadow-sm
                                            {{ $log->status == 'Selesai' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                            {{ $log->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}
                                            {{ $log->status == 'Menunggu' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                        ">
                                            <option value="Menunggu" {{ $log->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="Diproses" {{ $log->status == 'Diproses' ? 'selected' : '' }}>Evakuasi (Diproses)</option>
                                            <option value="Selesai" {{ $log->status == 'Selesai' ? 'selected' : '' }}>Selesai / Clear</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 font-medium">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    Belum ada data laporan masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($logs->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $logs->links() }}
                </div>
                @endif
                
            </div>
        </div>
    </main>

</body>
</html>