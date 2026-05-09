<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Report & Command Center - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-100 h-screen flex overflow-hidden">

    <aside class="w-64 bg-[#1f2328] text-white flex flex-col hidden md:flex h-full shadow-2xl relative z-20">
        <div class="h-20 flex items-center px-6 border-b border-gray-700 bg-black/20">
            <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-10">
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">Main Panel</p>
            
            <a href="{{ route('admin.dashboard') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 bg-[#d4a017] text-white rounded-xl font-bold transition-colors shadow-[0_4px_15px_rgba(212,160,23,0.3)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                Dashboard
            </a>
            
            <a href="{{ route('admin.rescue.index') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-white hover:text-white hover:bg-[#1f2328] rounded-xl transition-all duration-300 group mb-2">
                <div class="bg-red-50 text-red-500 group-hover:bg-red-500 group-hover:text-white p-2 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="font-bold text-sm">Laporan Darurat</span>
            </a>

            <div class="pt-4">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">Layanan Warga</p>
                <a href="{{ route('admin.aspirasi.index') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
                    Aspirasi Masuk
                </a>
                
                <a href="{{ route('admin.usulan.index') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    Usulan Proyek
                </a>

                
            </div>
            
            <div class="pt-4">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 px-2">CMS & Pengaturan</p>
                <a href="{{ route('admin.petugas') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Jadwal & Staf
                </a>
                <a href="{{ route('admin.struktur.index') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    Struktur Organisasi
                </a>
                <a href="{{ route('admin.galeri') }}" onclick="pindahPanel(event, this.href)" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/10 rounded-xl font-semibold transition-colors">
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
                <span id="loading-indicator" class="hidden text-xs font-bold text-[#d4a017] animate-pulse">Memuat...</span>
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm font-bold text-gray-700">Sistem Aktif & Terhubung</span>
            </div>
        </header>

        <!-- WADAH KONTEN YANG AKAN BERGANTI-GANTI -->
        <div class="flex-1 overflow-y-auto p-8" id="panel-konten">
            @include('admin.partials.dashboard_main')
        </div>

    </main>

    <!-- MESIN PEMINDAH PANEL -->
    <!-- MESIN PEMINDAH PANEL (SPA) -->
<script>
    // 1. Fungsi untuk Menggambar Grafik
    function renderGrafik() {
        const canvas = document.getElementById('chartLaporan');
        // Cek apakah elemen canvas ada di halaman saat ini
        if (!canvas) return; 

        // Ambil data (dari variabel global jika ada, atau gunakan default kosong sementara loading)
        const dataGrafik = window.dataGrafikGlobal || [0,0,0,0,0,0,0,0,0,0,0,0];

        // Hancurkan chart lama jika ada agar tidak menumpuk/error
        if(window.myChartLaporan) { window.myChartLaporan.destroy(); }
        
        const ctx = canvas.getContext('2d');
        window.myChartLaporan = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Kejadian',
                    data: dataGrafik,
                    borderColor: '#dc2626',
                    backgroundColor: 'rgba(220, 38, 38, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });
    }

    // 2. Fungsi Utama Pemindah Panel
    function pindahPanel(event, url) {
        event.preventDefault(); // Cegah refresh halaman
        
        const panel = document.getElementById('panel-konten');
        const loading = document.getElementById('loading-indicator');
        
        panel.style.opacity = '0.5';
        loading.classList.remove('hidden');

        fetch(url, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        })
        .then(response => response.text())
        .then(html => {
            // Masukkan HTML baru ke dalam panel
            panel.innerHTML = html;
            panel.style.opacity = '1';
            loading.classList.add('hidden');
            window.history.pushState({}, '', url);

            // ==========================================
            // KUNCI JAWABANNYA ADA DI SINI:
            // Setelah HTML disuntikkan, paksa fungsi renderGrafik jalan!
            // ==========================================
            if (html.includes('id="chartLaporan"')) {
                // Beri jeda sepersekian detik memastikan DOM (canvas) sudah "nempel" di browser
                setTimeout(renderGrafik, 100); 
            }
        })
        .catch(err => {
            console.log("Error loading panel:", err);
            panel.style.opacity = '1';
            loading.classList.add('hidden');
        });
    }

    // 3. Jalankan render grafiknya untuk pertama kali saat halaman di-refresh (F5)
    document.addEventListener('DOMContentLoaded', function() {
        // Simpan data dari Laravel ke variabel global (JavaScript)
        // (Pastikan variabel $dataGrafik ini dikirim dari controller AdminAuthController@dashboard)
        window.dataGrafikGlobal = @json($dataGrafik ?? []);
        
        renderGrafik();
    });
</script>

    <script>
    // Dihancurkan dulu chart-nya kalau sudah ada, biar gak numpuk pas pindah-pindah menu
    if(window.myChartLaporan) { window.myChartLaporan.destroy(); }
    
    const ctx = document.getElementById('chartLaporan').getContext('2d');
    window.myChartLaporan = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Kejadian',
                data: @json($dataGrafik),
                borderColor: '#dc2626',
                backgroundColor: 'rgba(220, 38, 38, 0.1)',
                fill: true,
                tension: 0.4
            }]
        }
    });
</script>
</body>
</html>