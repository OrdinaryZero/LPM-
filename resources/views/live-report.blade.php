<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Laporan & Evakuasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        html { scroll-behavior: smooth; } 
        .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="bg-white min-h-screen">
    
    <nav class="absolute top-0 left-0 w-full z-50 py-6 px-6 md:px-12 flex justify-between items-center text-white">
        <div class="flex items-center gap-8">
            <a href="{{ route('beranda') }}"><img src="{{ asset('images/logort.png') }}" class="h-10 hover:scale-105 transition-transform"></a>
            <div class="hidden lg:flex gap-6 font-semibold tracking-wide">
                <a href="{{ route('beranda') }}" class="hover:opacity-80 transition-opacity">Beranda</a>
                <span class="border-b-2 border-white pb-1">Status Laporan</span>
            </div>
        </div>
        <a href="{{ route('beranda') }}" class="bg-white/20 hover:bg-white/30 px-5 py-2 rounded-full text-sm font-bold transition-colors">Kembali</a>
    </nav>

    <div id="mobileMenu" class="hidden fixed top-20 left-0 w-full bg-white shadow-xl z-[90] lg:hidden">
        <div class="flex flex-col text-gray-800 font-semibold">
            <a href="{{ url('/') }}" class="px-6 py-4 border-b hover:bg-gray-50">Beranda</a>
            <a href="{{ route('status') }}" class="px-6 py-4 border-b hover:bg-gray-50 text-[#d4a017]">Status</a>
            <a href="{{ url('/') }}#profil" class="px-6 py-4 border-b hover:bg-gray-50">Profil</a>
            <a href="{{ url('/') }}#lokasi" class="px-6 py-4 border-b hover:bg-gray-50">Posko Utama</a>
            <a href="{{ route('admin.login') }}" class="px-6 py-4 text-red-600 font-bold flex items-center gap-2">
                <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                Command Center  
            </a>
        </div>
    </div>

    <section class="relative pt-32 pb-32 px-6 md:px-20 overflow-hidden flex items-center min-h-[560px]">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        </video>
        
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#c09015]/80 via-[#d4a017]/60 to-[#fcd34d]/40 z-10"></div>

        <div class="max-w-4xl relative z-20 w-full md:w-1/2">
            <div class="mb-6 fade-up reveal opacity-0 translate-y-8 transition-all duration-1000">
                <img src="{{ asset('images/logort.png') }}" alt="Logo Instansi" class="w-20 md:w-28 h-auto drop-shadow-xl mb-6 hover:scale-105 transition-transform duration-300">
                <h2 class="text-white/90 text-xs md:text-sm font-semibold mb-2 tracking-widest uppercase drop-shadow-sm">Sistem Terintegrasi</h2>
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow-md">Status Layanan <br> & Evakuasi</h1>
                <p class="text-white/90 mt-5 max-w-md text-[14px] md:text-base leading-relaxed drop-shadow-sm font-medium">Pantau secara real-time status laporan masyarakat dan pergerakan armada LPM Banjarbaru.</p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-30">
            <svg class="relative block w-full h-[60px] md:h-[140px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C400,140 1000,-20 1440,60 L1440,120 L0,120 Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <section class="bg-white relative z-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto bg-white rounded-[40px] shadow-[0_20px_60px_rgba(0,0,0,0.06)] border border-gray-100 p-8 md:p-14">
        </div>
    </section>

    <section class="bg-white -mt-10 md:-mt-40 relative z-40 pb-16 px-4">
        <div class="max-w-6xl mx-auto bg-white rounded-[40px] shadow-[0_15px_50px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12 fade-up reveal">
                
                <div class="w-full bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 text-center hover:-translate-y-1 transition-all duration-300">
                    <p class="text-sm font-bold text-gray-500 mb-1">Total Laporan</p>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900">{{ $totalAmbulance }}</h3>
                </div>

                <div class="w-full bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 text-center hover:shadow-[0_20px_50px_rgba(212,160,23,0.1)] hover:border-[#f0e6d2] hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-[#d4a017] transition-colors">Menunggu</p>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-[#d4a017]">{{ $menunggu }}</h3>
                </div>

                <div class="w-full bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 text-center hover:shadow-[0_20px_50px_rgba(37,99,235,0.1)] hover:border-blue-100 hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-blue-600 transition-colors">Diproses</p>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-blue-600">{{ $diproses }}</h3>
                </div>

                <div class="w-full bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 text-center hover:shadow-[0_20px_50px_rgba(34,197,94,0.1)] hover:border-green-100 hover:-translate-y-1 transition-all duration-300 group">
                    <p class="text-sm font-bold text-gray-500 mb-1 group-hover:text-green-600 transition-colors">Selesai</p>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-green-600">{{ $selesai }}</h3>
                </div>

            </div>

            <div class="border-t border-gray-100 w-full mx-auto mb-10 fade-up reveal"></div>

            <div class="fade-up reveal delay-100 w-full overflow-x-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-extrabold text-gray-900 text-xl">Riwayat Pemanggilan Terkini</h3>
                    <span class="text-xs font-bold text-gray-400 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Data otomatis dari Command Center
                    </span>
                </div>
                
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead>
                        <tr class="text-xs text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="py-4 px-2 font-extrabold">Waktu Lapor</th>
                            <th class="py-4 px-2 font-extrabold">Pelapor</th>
                            <th class="py-4 px-2 font-extrabold text-right">Status Terkini</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        @forelse($laporan as $log)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-2">
                                <span class="block text-gray-900 font-bold">{{ $log->created_at->format('d M Y') }}</span>
                                <span class="text-xs font-semibold text-[#d4a017]">{{ $log->created_at->format('H:i') }} WITA</span>
                            </td>
                            <td class="py-4 px-2">
                                <p class="font-bold text-gray-800">{{ substr($log->nama_pemohon, 0, 3) }}***</p>
                                <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Masyarakat</span>
                            </td>
                            <td class="py-4 px-2 text-right">
                                @if($log->status == 'Selesai')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-green-50 text-green-600 border border-green-100">
                                        Selesai / Tuntas
                                    </span>
                                @elseif($log->status == 'Diproses')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> Unit Berangkat
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-[#fcf9f2] text-[#d4a017] border border-[#f0e6d2]">
                                        Menunggu Antrean
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-400 font-medium">
                                Belum ada laporan darurat hari ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($laporan->hasPages())
                <div class="pt-6 mt-4 border-t border-gray-100">
                    {{ $laporan->links() }}
                </div>
                @endif
            </div>

        </div>
    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <div class="fade-up reveal">
                    <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-20 mb-8 opacity-90">
                    <p class="text-gray-400 font-medium leading-relaxed mb-6">
                        Website Pusat Komando Layanan Darurat LPM Banjarbaru. Platform komunikasi tanggap bencana untuk seluruh masyarakat di wilayah Banjarbaru.
                    </p>
                </div>

                <div class="fade-up reveal">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Markas & Kontak</h3>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li class="flex items-start gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d4a017] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>HQ2R+RM2, Jl. Sapta Marga, Guntungmanggis, Kec. Landasan Ulin, Kota Banjar Baru, Kalimantan Selatan 70721</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>(+62) 85751524327</span>
                        </li>
                    </ul>
                </div>

                <div class="fade-up reveal">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Akses Cepat</h3>
                    <div class="grid grid-cols-2 gap-4 text-gray-400 font-bold text-sm uppercase tracking-wide">
                        <a href="{{ url('/') }}#profil" class="hover:text-[#d4a017] transition-colors">Profil LPM</a>
                        <a href="{{ url('/') }}#acara" class="hover:text-[#d4a017] transition-colors">Jadwal Giat</a>
                        <a href="{{ url('/') }}#informasi" class="hover:text-[#d4a017] transition-colors">Info Darurat</a>
                        <a href="{{ url('/') }}#galeri" class="hover:text-[#d4a017] transition-colors">Dokumentasi</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center md:text-left text-sm font-medium text-gray-500">
                <p>Pusat Komando LPM Banjarbaru © 2026 · Dioperasikan untuk Pelayanan Publik Masyarakat.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observerOptions = {
                threshold: 0.15 
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active'); 
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });

        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            const nav = document.getElementById("mainNav");
            const search = document.getElementById("searchInput");
            const links = nav.querySelectorAll("a:not(.bg-white\\/10)"); 
            
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                nav.classList.remove("text-white", "py-5", "absolute");
                nav.classList.add("bg-white", "shadow-md", "text-gray-800", "py-3", "fixed");
                if(search) {
                    search.classList.add("bg-gray-100");
                    search.classList.remove("bg-white/90");
                }
                
                links.forEach(link => {
                    link.classList.remove("hover:text-white/80");
                });
            } else {
                nav.classList.add("text-white", "py-5", "absolute");
                nav.classList.remove("bg-white", "shadow-md", "text-gray-800", "py-3", "fixed");
                if(search) {
                    search.classList.remove("bg-gray-100");
                    search.classList.add("bg-white/90");
                }
                
                links.forEach(link => {
                    link.classList.add("hover:text-white/80");
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const observerOptions = { threshold: 0.1 };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-12');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const fadeElements = document.querySelectorAll('.fade-up');
            fadeElements.forEach(el => observer.observe(el));
        });

        const btn = document.getElementById("menuBtn");
        const menu = document.getElementById("mobileMenu");
        if(btn && menu) {
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        }
    </script>
</body>
</html>