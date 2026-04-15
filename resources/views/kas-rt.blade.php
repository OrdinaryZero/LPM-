<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparansi Kas - LPM Banjarbaru</title>
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
                <span class="border-b-2 border-white pb-1">Kas RT</span>
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
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-2 drop-shadow-md">Transparansi Kas RT</h1>
            <p class="text-white/90 font-medium">Laporan arus kas, pemasukan, dan pengeluaran dana lingkungan</p>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10 translate-y-[1px]">
            <svg class="relative block w-full h-[60px] md:h-[140px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C400,140 1000,-20 1440,60 L1440,120 L0,120 Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    <section class="relative z-20 -mt-2 md:-mt-5 px-4 pb-20 max-w-6xl mx-auto w-full flex-grow">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 fade-up opacity-0 translate-y-12 transition-all duration-700">
            <div class="bg-white p-6 rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col justify-center items-center text-center">
                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Total Saldo Kas</p>
                <h2 class="text-3xl font-black text-gray-900">Rp {{ number_format($saldoAkhir ?? 0, 0, ',', '.') }}</h2>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col justify-center items-center text-center">
                <p class="text-green-500 font-bold text-xs uppercase tracking-widest mb-1">Total Pemasukan</p>
                <h2 class="text-3xl font-black text-green-600">+ Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}</h2>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.04)] border border-gray-100 flex flex-col justify-center items-center text-center">
                <p class="text-red-500 font-bold text-xs uppercase tracking-widest mb-1">Total Pengeluaran</p>
                <h2 class="text-3xl font-black text-red-600">- Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</h2>
            </div>
        </div>

        <div id="grafik-section" class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.06)] p-8 border border-gray-100 fade-up opacity-0 translate-y-12 transition-all duration-700 delay-100 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-extrabold text-gray-900 text-xl">Grafik Arus Kas (2026)</h3>
            </div>
            <div class="relative h-72 w-full">
                <canvas id="kasChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.06)] p-8 border border-gray-100 fade-up opacity-0 translate-y-12 transition-all duration-700 delay-200">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-100 pb-6">
                <h3 class="font-extrabold text-gray-900 text-xl">Rincian Transaksi</h3>
                <div class="flex gap-2 w-full md:w-auto">
                    <select class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#d4a017] outline-none text-gray-700 font-medium">
                        <option>Semua Bulan</option>
                        <option>April 2026</option>
                        <option>Maret 2026</option>
                    </select>
                    <select class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-[#d4a017] outline-none text-gray-700 font-medium">
                        <option>Semua Jenis</option>
                        <option>Pemasukan</option>
                        <option>Pengeluaran</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th class="py-3 px-4 text-gray-400 text-xs font-bold uppercase tracking-wider">Tanggal</th>
                            <th class="py-3 px-4 text-gray-400 text-xs font-bold uppercase tracking-wider">Keterangan</th>
                            <th class="py-3 px-4 text-gray-400 text-xs font-bold uppercase tracking-wider">Jenis</th>
                            <th class="py-3 px-4 text-right text-gray-400 text-xs font-bold uppercase tracking-wider">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 font-medium text-sm">
                        @forelse($transaksi as $item)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td class="py-4 px-4 font-bold text-gray-800">{{ $item->keterangan }}</td>
                            <td class="py-4 px-4">
                                @if($item->jenis == 'Pemasukan')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Pemasukan</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Pengeluaran</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right font-extrabold {{ $item->jenis == 'Pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $item->jenis == 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500 font-bold">Belum ada riwayat transaksi kas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12 mt-auto">
        <div class="max-w-7xl mx-auto">
            <div class="text-center md:text-left text-sm font-medium text-gray-500 border-t border-gray-800 pt-8">
                <p>Website Resmi Layanan LPM Banjarbaru Banjarbaru &copy; 2026 &middot; Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartsRendered = false;

        function renderCharts() {
            Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
            
            const ctx = document.getElementById('kasChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: [1200000, 1300000, 1250000, 1500000],
                            borderColor: '#10b981', 
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true
                        },
                        {
                            label: 'Pengeluaran',
                            data: [300000, 450000, 200000, 500000],
                            borderColor: '#ef4444', 
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: { legend: { position: 'top', labels: { font: { weight: 'bold' } } } },
                    scales: {
                        y: { beginAtZero: true, grid: { borderDash: [4, 4] } },
                        x: { grid: { display: false } }
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