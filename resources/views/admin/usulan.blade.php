<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Usulan Pembangunan - Admin LPM</title>
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
                Dashboard Induk
            </a>

            <div class="pt-4">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">Layanan Warga</p>
                
                <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
                    Aspirasi Masuk
                </a>
                
                <a href="{{ route('admin.usulan.index') }}" class="flex items-center gap-3 px-4 py-3 bg-[#d4a017] text-white rounded-xl font-bold transition-colors shadow-[0_4px_15px_rgba(212,160,23,0.3)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    Usulan Proyek
                </a>

                <a href="{{ route('admin.agenda.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    Kelola Agenda
                </a>
            </div>

            <div class="pt-4">
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
                <h2 class="text-xl font-extrabold text-gray-800">Manajemen Usulan Warga</h2>
                <p class="text-xs font-medium text-gray-500">Tinjau dan tindak lanjuti usulan pembangunan dari masyarakat</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-bold text-gray-700">Database Sinkron</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6 font-bold border border-green-200">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-extrabold text-gray-800 text-lg">Daftar Usulan Masuk</h3>
                </div>
                
                <div class="flex-1 overflow-y-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 text-xs text-gray-400 uppercase tracking-wider">
                                <th class="p-4 pl-6 font-bold border-b border-gray-100 w-1/4">Nama Proyek & Waktu</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-1/4">Lokasi Sasaran</th>
                                <th class="p-4 font-bold border-b border-gray-100 w-1/3">Tujuan & Manfaat</th>
                                <th class="p-4 font-bold border-b border-gray-100 text-center">Status Usulan</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-50">
                            @forelse($data_usulan as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 pl-6">
                                    <p class="font-bold text-gray-800">{{ $item->nama_program }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $item->created_at->format('d M Y - H:i') }} WITA</p>
                                </td>
                                <td class="p-4 text-gray-600 font-medium">
                                    <div class="flex items-start gap-1">
                                        <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        {{ $item->lokasi }}
                                    </div>
                                </td>
                                <td class="p-4">
                                    <p class="text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg border border-gray-100 leading-relaxed">
                                        {{ $item->manfaat }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('admin.usulan.status', $item->id) }}" method="POST" class="flex justify-center">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg border-gray-200 px-3 py-1.5 focus:ring-0 cursor-pointer shadow-sm outline-none
                                            {{ $item->status == 'Selesai' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                            {{ $item->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}
                                            {{ $item->status == 'Menunggu' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                        ">
                                            <option value="Menunggu" {{ $item->status == 'Menunggu' ? 'selected' : '' }}>Menunggu Review</option>
                                            <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Masuk Musrenbang</option>
                                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Disetujui / Selesai</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-400 font-medium">
                                    Belum ada usulan pembangunan yang masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($data_usulan->hasPages())
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    {{ $data_usulan->links() }}
                </div>
                @endif

            </div>
        </div>
    </main>

</body>
</html>