<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Status Laporan - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <nav class="absolute top-0 left-0 w-full z-50 py-6 px-6 md:px-12 flex justify-between items-center text-white">
        <div class="flex items-center gap-8">
            <a href="{{ route('beranda') }}"><img src="{{ asset('images/logort.png') }}" class="h-10 hover:scale-105 transition-transform"></a>
            <div class="hidden lg:flex gap-6 font-semibold tracking-wide">
                <a href="{{ route('beranda') }}" class="hover:opacity-80 transition-opacity">Beranda</a>
                <a href="{{ route('lapor.index') ?? '#' }}" class="hover:opacity-80 transition-opacity">Lapor Darurat</a>
            </div>
        </div>
        <a href="{{ route('beranda') }}" class="bg-white/20 hover:bg-white/30 px-5 py-2 rounded-full text-sm font-bold transition-colors">Kembali</a>
    </nav>

    <section class="relative bg-gradient-to-r from-[#1e293b] to-[#0f172a] pt-32 pb-48 px-4 text-center z-10 overflow-hidden">
        <div class="absolute top-0 left-10 w-72 h-72 bg-[#d4a017]/20 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="animate-[translateY_1s_ease-out]">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3 drop-shadow-md">Transparansi Layanan</h1>
            <p class="text-white/80 text-sm md:text-base mb-8 max-w-xl mx-auto font-medium">Pantau statistik penanganan masalah kota dan lacak status laporan pribadi Anda.</p>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10">
            <svg class="relative block w-full h-[60px] md:h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,123.8,188.47,115,234.35,107.91,278.36,83.9,321.39,56.44Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    <section class="relative z-20 -mt-24 md:-mt-32 px-4 pb-20 flex-grow">
        <div class="max-w-4xl mx-auto">
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10 animate-[opacity_1.5s_ease-in]">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <h4 class="text-3xl font-extrabold text-gray-900">{{ $total ?? 0 }}</h4>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mt-1">Total Laporan</p>
                </div>
                
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-500 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h4 class="text-3xl font-extrabold text-gray-900">{{ $menunggu ?? 0 }}</h4>
                    <p class="text-xs font-bold text-yellow-600 uppercase tracking-wider mt-1">Menunggu</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h4 class="text-3xl font-extrabold text-gray-900">{{ $diproses ?? 0 }}</h4>
                    <p class="text-xs font-bold text-blue-600 uppercase tracking-wider mt-1">Diproses</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    </div>
                    <h4 class="text-3xl font-extrabold text-gray-900">{{ $selesai ?? 0 }}</h4>
                    <p class="text-xs font-bold text-green-600 uppercase tracking-wider mt-1">Selesai</p>
                </div>
            </div>

            <div class="bg-white rounded-[32px] shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-100 overflow-hidden p-8 md:p-10">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-extrabold text-gray-900">Lacak Tiket Laporan Anda</h2>
                    <p class="text-gray-500 text-sm mt-2">Masukkan kode yang Anda dapatkan saat melapor (misal: LPM-080526-XYZ)</p>
                </div>

                <form action="{{ route('status.cek') }}" method="POST" class="flex flex-col md:flex-row gap-4 mb-2">
                    @csrf
                    <div class="flex-grow">
                        <input type="text" name="kode" value="{{ request('kode') }}" placeholder="Ketik Kode Laporan..." required class="w-full px-5 py-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:ring-0 focus:border-[#d4a017] outline-none text-gray-800 font-bold tracking-widest transition-colors text-center md:text-left">
                    </div>
                    <button type="submit" class="bg-[#1f2328] hover:bg-black text-white font-extrabold py-4 px-8 rounded-xl shadow-lg transition-colors whitespace-nowrap uppercase tracking-wide text-sm">
                        Lacak Laporan
                    </button>
                </form>

                @if(session('error'))
                    <div class="mt-4 p-4 bg-red-50 border border-red-100 rounded-xl text-red-600 text-sm font-bold flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        {{ session('error') }}
                    </div>
                @endif

                @if(isset($laporan))
                    <div class="mt-12 border-t border-gray-100 pt-10 animate-[opacity_1s_ease-in]">
                        
                        <div class="flex flex-col md:flex-row justify-between items-center md:items-start mb-8 gap-4 text-center md:text-left">
                            <div>
                                <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">KODE TIKET DITEMUKAN</p>
                                <h3 class="text-3xl font-extrabold text-[#d4a017]">{{ $laporan->kode_laporan }}</h3>
                            </div>
                            <span class="px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wider shadow-sm border
                                {{ $laporan->status == 'Selesai' ? 'bg-green-50 text-green-700 border-green-200' : 
                                  ($laporan->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'bg-yellow-50 text-yellow-700 border-yellow-200') }}">
                                {{ $laporan->status }}
                            </span>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 mb-10">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-xs text-gray-500 font-semibold mb-1">Tanggal & Waktu</p>
                                    <p class="text-sm font-bold text-gray-800">{{ $laporan->created_at->format('d M Y, H:i') }} WITA</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-semibold mb-1">Jenis Insiden</p>
                                    <p class="text-sm font-bold text-gray-800">{{ $laporan->jenis_kejadian }}</p>
                                </div>
                                <div class="md:col-span-2 border-t border-gray-200 pt-4">
                                    <p class="text-xs text-gray-500 font-semibold mb-1">Nama Pelapor</p>
                                    <p class="text-sm font-bold text-gray-800">{{ $laporan->nama_pelapor }} (No. Telp dirahasiakan demi keamanan)</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative mb-8 max-w-2xl mx-auto px-4 md:px-0">
                            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1.5 bg-gray-100 rounded-full z-0"></div>
                            
                            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1.5 rounded-full z-0 transition-all duration-1000
                                {{ $laporan->status == 'Selesai' ? 'w-full bg-green-500' : 
                                  ($laporan->status == 'Diproses' ? 'w-1/2 bg-[#d4a017]' : 'w-0') }}">
                            </div>

                            <div class="relative z-10 flex justify-between">
                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-sm
                                        bg-[#d4a017] text-white shadow-md ring-4 ring-white">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    </div>
                                    <span class="mt-3 text-xs md:text-sm font-extrabold text-gray-800">Menunggu</span>
                                </div>

                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-sm ring-4 ring-white transition-colors
                                        {{ in_array($laporan->status, ['Diproses', 'Selesai']) ? 'bg-[#d4a017] text-white shadow-md' : 'bg-gray-100 text-gray-400' }}">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                    </div>
                                    <span class="mt-3 text-xs md:text-sm font-extrabold {{ in_array($laporan->status, ['Diproses', 'Selesai']) ? 'text-gray-800' : 'text-gray-400' }}">Diproses</span>
                                </div>

                                <div class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-sm ring-4 ring-white transition-colors
                                        {{ $laporan->status == 'Selesai' ? 'bg-green-500 text-white shadow-md' : 'bg-gray-100 text-gray-400' }}">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span class="mt-3 text-xs md:text-sm font-extrabold {{ $laporan->status == 'Selesai' ? 'text-green-600' : 'text-gray-400' }}">Selesai</span>
                                </div>
                            </div>
                        </div>

                        @if($laporan->status == 'Selesai' && $laporan->foto_penanganan)
                            <div class="bg-green-50 rounded-2xl p-6 border border-green-200 mt-10">
                                <p class="text-sm font-extrabold text-green-800 mb-4 flex items-center gap-2">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    Bukti Penanganan Selesai
                                </p>
                                <img src="{{ asset($laporan->foto_penanganan) }}" alt="Bukti Selesai" class="w-full md:w-2/3 h-auto max-h-80 object-cover rounded-xl shadow-md border-4 border-white mx-auto block">
                            </div>
                        @endif

                    </div>
                @endif
            </div>
        </div>
    </section>
</body>
</html>