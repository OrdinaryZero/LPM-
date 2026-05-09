<!-- HEADER HALAMAN CMS ASPIRASI -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-extrabold text-gray-800 flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-blue-500 animate-pulse"></span>
            Aspirasi & Keluhan Warga
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">Tinjau dan tindak lanjuti masukan dari warga Banjarbaru.</p>
    </div>
    <div class="bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl font-bold text-sm border border-blue-100 flex items-center gap-2">
        Total Masuk: {{ count($aspirasi ?? []) }} Laporan
    </div>
</div>

<!-- GRID KARTU ASPIRASI -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    
    @forelse($aspirasi ?? [] as $asp)
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 flex flex-col hover:shadow-md transition-shadow relative overflow-hidden">
        
        <!-- Garis warna penanda status -->
        <div class="absolute top-0 left-0 w-full h-1 {{ ($asp->status == 'Dibalas') ? 'bg-green-500' : 'bg-[#d4a017]' }}"></div>

        <div class="flex justify-between items-start mb-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center font-extrabold text-gray-400 text-sm uppercase">
                    <!-- Mengambil huruf pertama dari nama -->
                    {{ substr($asp->nama ?? 'W', 0, 1) }}
                </div>
                <div>
                    <!-- Menggunakan variabel nama dan no_hp -->
                    <h4 class="font-extrabold text-gray-800 text-sm">{{ $asp->nama ?? 'Warga' }}</h4>
                    <p class="text-[10px] font-bold text-gray-400">{{ $asp->no_hp ?? '-' }} • {{ $asp->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
        
        <!-- Menggunakan variabel kategori -->
        <div class="mb-3">
            <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold bg-gray-100 text-gray-600 border border-gray-200 uppercase">
                Kategori: {{ $asp->kategori ?? 'Umum' }}
            </span>
        </div>
        
        <!-- Menggunakan variabel pesan -->
        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100 flex-1 mb-5">
            <p class="text-sm text-gray-600 font-medium leading-relaxed">
                "{{ $asp->pesan ?? 'Tidak ada pesan' }}"
            </p>
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
            <span class="text-xs font-bold {{ ($asp->status == 'Dibalas') ? 'text-green-500' : 'text-[#d4a017]' }}">
                {{ ($asp->status == 'Dibalas') ? '✓ Sudah dibalas' : '⏳ Menunggu respon' }}
            </span>
            <button class="text-xs font-bold bg-[#1f2328] hover:bg-[#d4a017] text-white px-4 py-2 rounded-lg transition-colors">
                Tanggapi
            </button>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center flex flex-col items-center">
        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
        <h3 class="text-lg font-extrabold text-gray-800 mb-1">Kotak Masuk Kosong</h3>
        <p class="text-gray-500 font-medium text-sm">Belum ada aspirasi atau pesan baru dari warga.</p>
    </div>
    @endforelse

</div>