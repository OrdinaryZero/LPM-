<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Report & Command Center - LPM Banjarbaru</title>
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
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-[#d4a017] text-white rounded-xl font-bold transition-colors shadow-[0_4px_15px_rgba(212,160,23,0.3)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                Dashboard Induk
            </a>

            <div class="pt-4">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">Layanan Warga</p>
                <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
                    Aspirasi Masuk
                </a>
                
                <a href="{{ route('admin.usulan.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
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
                <h2 class="text-xl font-extrabold text-gray-800">Live Report Dashboard</h2>
                <p class="text-xs font-medium text-gray-500">Pusat pemantauan real-time wilayah LPM Banjarbaru</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-bold text-gray-700">Sistem Aktif & Terhubung</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 mb-1">Total Laporan Hari Ini</p>
                        <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalLaporanHariIni ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-red-600 to-red-700 p-6 rounded-2xl shadow-lg flex items-center justify-between text-white">
                    <div>
                        <p class="text-sm font-bold text-red-100 mb-1">Ambulance Aktif</p>
                        <h3 class="text-3xl font-extrabold">{{ $totalAmbulance ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 mb-1">Laporan Rescue</p>
                        <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalRescue ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group">
                    <div>
                        <p class="text-sm font-bold text-gray-500 mb-1">Petugas Jaga Aktif</p>
                        <h3 class="text-3xl font-extrabold text-green-600">{{ isset($petugas_aktif) ? count($petugas_aktif) : 0 }} <span class="text-sm font-medium text-gray-400">Orang</span></h3>
                    </div>
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                    <h3 class="font-extrabold text-lg text-gray-800">Personel Lapangan Standby</h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($petugas_aktif ?? [] as $aktif)
                        <div class="bg-white rounded-xl p-4 shadow-sm border border-green-200 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gray-100 border-2 border-white shadow-sm overflow-hidden flex-shrink-0">
                                @if($aktif->foto) 
                                    <img src="{{ asset($aktif->foto) }}" class="w-full h-full object-cover"> 
                                @else
                                    <svg class="w-full h-full text-gray-300 p-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm truncate">{{ $aktif->nama }}</h4>
                                <p class="text-[11px] font-bold text-green-600 uppercase">{{ $aktif->jabatan }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full bg-red-50 py-4 px-6 rounded-xl border border-red-100 text-red-600 font-bold text-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Belum ada petugas lapangan yang mengaktifkan shift jaga!
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-[500px]">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/30">
                        <div>
                            <h3 class="font-extrabold text-gray-800 text-lg">Jadwal & Roster Shift Lapangan</h3>
                            <p class="text-xs text-gray-500 font-medium">Status operasional seluruh petugas rescue.</p>
                        </div>
                        <a href="{{ route('admin.petugas') }}" class="text-xs font-bold bg-[#d4a017] text-white px-4 py-2 rounded-lg shadow-sm hover:bg-[#b8860b] transition-colors">Atur Shift</a>
                    </div>
                    
                    <div class="flex-1 overflow-y-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 text-xs text-gray-400 uppercase tracking-wider sticky top-0 backdrop-blur-md">
                                    <th class="p-4 pl-6 font-bold border-b border-gray-100">Personel</th>
                                    <th class="p-4 font-bold border-b border-gray-100">Peran</th>
                                    <th class="p-4 font-bold border-b border-gray-100">Kontak (WA)</th>
                                    <th class="p-4 font-bold border-b border-gray-100">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                @forelse($jadwal_petugas ?? [] as $jadwal)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 pl-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                                            @if($jadwal->foto) <img src="{{ asset($jadwal->foto) }}" class="w-full h-full object-cover"> @endif
                                        </div>
                                        <p class="font-bold text-gray-800">{{ $jadwal->nama }}</p>
                                    </td>
                                    <td class="p-4 text-gray-600 font-medium">{{ $jadwal->jabatan }}</td>
                                    <td class="p-4 text-gray-600 font-medium">{{ $jadwal->no_hp }}</td>
                                    <td class="p-4">
                                        @if($jadwal->status_jaga == 'Aktif')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-green-50 text-green-700 border border-green-200">Standby</span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200">Off Duty</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-gray-400 font-medium">Belum ada data personel lapangan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 flex flex-col h-[500px]">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="font-extrabold text-gray-800 text-lg flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                            Monitor CCTV Area
                        </h3>
                    </div>
                    <div class="p-4 flex-1 flex flex-col gap-4 bg-gray-50 overflow-y-auto">
                        <div class="relative bg-black rounded-xl overflow-hidden shadow-inner h-40 group cursor-pointer">
                            <div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold px-2 py-0.5 rounded flex items-center gap-1 z-10">
                                <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span> REC
                            </div>
                            <div class="absolute bottom-3 left-3 text-white/80 text-xs font-bold z-10 drop-shadow-md">CAM 01 - Gerbang Utama</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent z-0"></div>
                            <div class="flex items-center justify-center h-full text-gray-600">
                                <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>

                        <div class="relative bg-black rounded-xl overflow-hidden shadow-inner h-40 group cursor-pointer">
                            <div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-extrabold px-2 py-0.5 rounded flex items-center gap-1 z-10">
                                <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span> REC
                            </div>
                            <div class="absolute bottom-3 left-3 text-white/80 text-xs font-bold z-10 drop-shadow-md">CAM 02 - Taman & Lapangan</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent z-0"></div>
                            <div class="flex items-center justify-center h-full text-gray-600">
                                <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>