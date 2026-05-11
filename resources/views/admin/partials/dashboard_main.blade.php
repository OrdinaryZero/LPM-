<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-bold text-gray-500 mb-1">Total aspirasi</p>
            <h3 class="text-3xl font-extrabold text-gray-900">{{ count($aspirasi ?? []) }}</h3>
        </div>
        
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
    </div>
    <div class="bg-gradient-to-br from-red-600 to-red-700 p-6 rounded-2xl shadow-lg flex items-center justify-between text-white">
        <div>
            <p class="text-sm font-bold text-red-100 mb-1">Ambulance Aktif</p>
            <h3 class="text-3xl font-extrabold">6</h3>
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
</div>

<div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 mb-8">
    <h3 class="font-bold text-gray-800 mb-4">Tren Laporan Darurat {{ date('Y') }}</h3>
    <canvas id="chartLaporan" height="100"></canvas>
    
</div>
<a href="{{ route('admin.laporan.cetak') }}" class="bg-[#d4a017] text-white px-4 py-2 rounded-xl font-bold">
            Cetak Laporan PDF
        </a>
