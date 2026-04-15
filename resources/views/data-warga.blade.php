<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <nav class="absolute top-0 left-0 w-full z-50 py-6 px-6 md:px-12 flex justify-between items-center text-white">
        <div class="flex items-center gap-8">
            <a href="{{ route('beranda') }}"><img src="{{ asset('images/logort.png') }}" class="h-10 hover:scale-105 transition-transform"></a>
            <div class="hidden lg:flex gap-6 font-semibold tracking-wide">
                <a href="{{ route('beranda') }}" class="hover:opacity-80 transition-opacity">Beranda</a>
                <span class="border-b-2 border-white pb-1">Data Warga</span>
            </div>
        </div>
        <a href="{{ route('beranda') }}" class="bg-white/20 hover:bg-white/30 px-5 py-2 rounded-full text-sm font-bold transition-colors">Kembali</a>
    </nav>

    <section class="relative bg-gradient-to-r from-[#c09015] via-[#d4a017] to-[#fcd34d] pt-32 pb-40 text-center">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/20 z-0"></div>

        <div class="fade-up opacity-0 translate-y-8 transition-all duration-700 relative z-10">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-2 drop-shadow-md">Demografi Data Warga</h1>
            <p class="text-white/90 font-medium">Transparansi jumlah penduduk dan statistik keluarga LPM Banjarbaru</p>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10 translate-y-[1px]">
            <svg class="relative block w-full h-[60px] md:h-[140px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C400,140 1000,-20 1440,60 L1440,120 L0,120 Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    <section class="relative z-20 -mt-2 md:-mt-5 px-4 pb-20 max-w-6xl mx-auto w-full flex-grow">
        <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 delay-100 bg-white rounded-[40px] shadow-[0_20px_60px_rgba(0,0,0,0.06)] p-8 md:p-12 border border-gray-100">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gray-50 p-6 rounded-3xl text-center border border-gray-100">
                    <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Total Warga</p>
                    <h3 class="text-3xl font-extrabold text-[#d4a017]">142</h3>
                </div>
                <div class="bg-gray-50 p-6 rounded-3xl text-center border border-gray-100">
                    <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Kepala Keluarga</p>
                    <h3 class="text-3xl font-extrabold text-[#d4a017]">45</h3>
                </div>
                <div class="bg-gray-50 p-6 rounded-3xl text-center border border-gray-100">
                    <p class="text-gray-500 font-bold text-xs uppercase tracking-widest mb-1">Wajib Ronda</p>
                    <h3 class="text-3xl font-extrabold text-[#d4a017]">38</h3>
                </div>
            </div>

            <h3 class="text-xl font-extrabold text-gray-900 mb-6 border-b border-gray-100 pb-4">Distribusi Wilayah Blok</h3>
            <div class="overflow-x-auto mb-16">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th class="py-4 px-2 text-gray-400 text-xs font-bold uppercase tracking-wider">Blok / Wilayah</th>
                            <th class="py-4 px-2 text-gray-400 text-xs font-bold uppercase tracking-wider">Jumlah KK</th>
                            <th class="py-4 px-2 text-gray-400 text-xs font-bold uppercase tracking-wider">Status Pembaruan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 font-medium">
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-2">Blok A (Anggrek)</td>
                            <td class="py-4 px-2">12 Keluarga</td>
                            <td class="py-4 px-2"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Terdata</span></td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-2">Blok B (Bakung)</td>
                            <td class="py-4 px-2">15 Keluarga</td>
                            <td class="py-4 px-2"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Terdata</span></td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-2">Blok C (Cempaka)</td>
                            <td class="py-4 px-2">18 Keluarga</td>
                            <td class="py-4 px-2"><span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Pembaruan</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="text-xl font-extrabold text-gray-900 mb-6 border-b border-gray-100 pb-4">Statistik Kependudukan</h3>
            
            <div id="grafik-section" class="grid grid-cols-1 md:grid-cols-2 gap-8 fade-up opacity-0 translate-y-12 transition-all duration-700">
                <div class="bg-gray-50 p-8 rounded-[30px] border border-gray-100">
                    <h4 class="font-extrabold text-gray-800 mb-6 text-center">Berdasarkan Jenis Kelamin</h4>
                    <div class="relative h-64 w-full flex justify-center">
                        <canvas id="chartGender"></canvas>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-[30px] border border-gray-100">
                    <h4 class="font-extrabold text-gray-800 mb-6 text-center">Berdasarkan Kelompok Umur</h4>
                    <div class="relative h-64 w-full">
                        <canvas id="chartUmur"></canvas>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-[30px] border border-gray-100 md:col-span-2">
                    <h4 class="font-extrabold text-gray-800 mb-6 text-center">Berdasarkan Tingkat Pendidikan</h4>
                    <div class="relative h-72 w-full">
                        <canvas id="chartPendidikan"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12 mt-auto">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <div class="fade-up opacity-0 translate-y-8 transition-all duration-700">
                    <img src="{{ asset('images/logort.png') }}" alt="Logo RT" class="h-20 mb-8 opacity-90">
                    <p class="text-gray-400 font-medium leading-relaxed mb-6">
                        Website Resmi Layanan LPM Banjarbaru. Media informasi dan transparansi untuk seluruh warga di lingkungan Kawasan RT 1 Banjarbaru.
                    </p>
                </div>

                <div class="fade-up opacity-0 translate-y-8 transition-all duration-700 delay-100">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Alamat & Kontak</h3>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li class="flex items-start gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d4a017] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>GQH2+GQM, Kemuning, Banjarbaru Selatan, Banjarbaru City, South Kalimantan 70732</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>(+62) 85751524327</span>
                        </li>
                    </ul>
                </div>

                <div class="fade-up opacity-0 translate-y-8 transition-all duration-700 delay-200">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Tautan Layanan</h3>
                    <div class="grid grid-cols-2 gap-4 text-gray-400 font-bold text-sm uppercase tracking-wide">
                        <a href="{{ route('beranda') }}#profil" class="hover:text-[#d4a017] transition-colors">Profil RT</a>
                        <a href="{{ route('beranda') }}#acara" class="hover:text-[#d4a017] transition-colors">Agenda Warga</a>
                        <a href="{{ route('beranda') }}#informasi" class="hover:text-[#d4a017] transition-colors">Layanan Info</a>
                        <a href="{{ route('beranda') }}#galeri" class="hover:text-[#d4a017] transition-colors">Dokumentasi</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center md:text-left text-sm font-medium text-gray-500">
                <p>Website Resmi Layanan LPM Banjarbaru Banjarbaru &copy; 2026 &middot; Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartsRendered = false;

        function renderCharts() {
            Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
            Chart.defaults.color = '#6b7280';
            
            const colorGold = '#d4a017';
            const colorDark = '#1f2937';
            const colorLightGold = '#fef08a';

            new Chart(document.getElementById('chartGender').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        data: [68, 74],
                        backgroundColor: [colorGold, colorDark],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true, font: { weight: 'bold' } } }
                    }
                }
            });

            new Chart(document.getElementById('chartUmur').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['0-14 Tahun', '15-64 Tahun', '65+ Tahun'],
                    datasets: [{
                        label: 'Jumlah Jiwa',
                        data: [25, 95, 22],
                        backgroundColor: [colorLightGold, colorGold, colorDark],
                        borderRadius: 8,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [4, 4], color: '#f3f4f6' } },
                        x: { grid: { display: false } }
                    }
                }
            });

            new Chart(document.getElementById('chartPendidikan').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: ['Belum Sekolah', 'SD Sederajat', 'SMP Sederajat', 'SMA Sederajat', 'Diploma/Sarjana'],
                    datasets: [{
                        label: 'Jumlah Jiwa',
                        data: [15, 30, 42, 35, 20],
                        backgroundColor: colorGold,
                        borderRadius: 6,
                        barThickness: 20
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { beginAtZero: true, grid: { borderDash: [4, 4], color: '#f3f4f6' } },
                        y: { grid: { display: false }, ticks: { font: { weight: 'bold' } } }
                    }
                }
            });
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-12', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    
                    if (entry.target.id === 'grafik-section' && !chartsRendered) {
                        renderCharts();
                        chartsRendered = true;
                    }
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
    </script>
</body>
</html>