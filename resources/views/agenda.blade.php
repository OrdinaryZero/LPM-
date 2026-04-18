<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Sosial - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        html { scroll-behavior: smooth; } 
        .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col">
    
    <nav id="mainNav" class="fixed top-0 left-0 w-full z-[100] py-5 px-6 md:px-10 lg:px-12 flex justify-between items-center text-white transition-all duration-300">
        <div class="flex items-center gap-5 lg:gap-8">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-10 md:h-[42px] w-auto drop-shadow-md hover:scale-105 transition-transform">
            </a>
            <div class="hidden lg:flex items-center gap-5 text-[15px] tracking-wide">
                <a href="{{ url('/') }}" class="hover:text-[#d4a017] transition font-medium drop-shadow-sm">Beranda</a>
                <a href="{{ route('status') }}" class="hover:text-[#d4a017] transition font-medium">Status Laporan</a>
                <a href="{{ route('admin.login') }}" class="hover:text-white/80 transition font-medium flex items-center gap-1 bg-white/10 px-3 py-1.5 rounded-full border border-white/20">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                    <span class="text-[#ef4444] font-bold drop-shadow-sm">Command</span> Center
                </a>
            </div>
        </div>
        <div class="flex items-center">
            <button id="menuBtn" class="lg:hidden text-white ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="5" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="12" cy="19" r="2"/></svg>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden fixed top-20 left-0 w-full bg-white shadow-xl z-[90] lg:hidden">
        <div class="flex flex-col text-gray-800 font-semibold">
            <a href="{{ url('/') }}" class="px-6 py-4 border-b hover:bg-gray-50">Beranda</a>
            <a href="{{ route('status') }}" class="px-6 py-4 border-b hover:bg-gray-50">Status Laporan</a>
        </div>
    </div>

    <section class="relative pt-32 pb-40 px-6 md:px-20 overflow-hidden flex items-center min-h-[560px]">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        </video>
        
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#1f2328]/90 via-[#2a2f35]/80 to-green-900/40 z-10"></div>

        <div class="max-w-4xl relative z-20 w-full md:w-1/2">
            <div class="mb-6 fade-up reveal opacity-0 translate-y-8 transition-all duration-1000">
                <img src="{{ asset('images/logort.png') }}" alt="Logo Instansi" class="w-20 md:w-28 h-auto drop-shadow-xl mb-6">
                <h2 class="text-green-400 text-xs md:text-sm font-extrabold mb-2 tracking-widest uppercase drop-shadow-sm">Pemberdayaan Masyarakat</h2>
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow-md">Agenda <br> Sosial Warga</h1>
                <p class="text-white/90 mt-5 max-w-md text-[14px] md:text-base leading-relaxed drop-shadow-sm font-medium">Informasi jadwal kegiatan gotong royong, posyandu, sosialisasi, dan program kemasyarakatan lainnya.</p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-30">
            <svg class="relative block w-full h-[60px] md:h-[140px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C400,140 1000,-20 1440,60 L1440,120 L0,120 Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <section class="bg-white relative z-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto bg-white rounded-[40px] shadow-[0_20px_60px_rgba(0,0,0,0.06)] border border-gray-100 p-8 md:p-14"></div>
    </section>

    <section class="flex-1 bg-white -mt-10 md:-mt-40 relative z-40 pb-20 px-4">
        <div class="max-w-6xl mx-auto bg-white rounded-[40px] shadow-[0_15px_50px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12 fade-up reveal">
            
            <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-6">
                <div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Jadwal Kegiatan Sosial</h2>
                    <p class="text-gray-500 text-sm font-medium">Mari berpartisipasi dalam agenda pemberdayaan lingkungan sekitar.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($agendas as $agenda)
                    <div class="border border-gray-100 p-6 rounded-[24px] {{ $agenda->status == 'Selesai' ? 'bg-gray-50 opacity-60' : 'bg-white shadow-[0_5px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_40px_rgba(34,197,94,0.1)]' }} hover:-translate-y-1 transition-all duration-300 group">
                        
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-14 h-14 {{ $agenda->status == 'Selesai' ? 'bg-gray-200 text-gray-500' : 'bg-green-50 text-green-600' }} rounded-[16px] flex flex-col items-center justify-center shrink-0 shadow-sm border {{ $agenda->status == 'Selesai' ? 'border-gray-300' : 'border-green-100' }}">
                                <span class="text-xl font-extrabold leading-none">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</span>
                                <span class="text-[10px] font-bold uppercase tracking-wider">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('M') }}</span>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('Y') }}</p>
                                <span class="text-[10px] font-bold px-2.5 py-1 rounded-md mt-1 inline-block {{ $agenda->status == 'Selesai' ? 'bg-gray-200 text-gray-600' : 'bg-green-100 text-green-700' }}">
                                    {{ $agenda->status }}
                                </span>
                            </div>
                        </div>

                        <h3 class="text-xl font-extrabold text-gray-900 mb-2 {{ $agenda->status == 'Selesai' ? '' : 'group-hover:text-green-600' }} transition-colors line-clamp-2">{{ $agenda->nama_kegiatan }}</h3>
                        <p class="text-sm font-medium text-gray-500 mb-5 leading-relaxed line-clamp-3">{{ $agenda->deskripsi }}</p>
                        
                        <div class="pt-4 border-t border-gray-100 text-xs font-bold text-gray-600 flex items-start gap-2">
                            <svg class="h-4 w-4 text-[#d4a017] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span class="leading-snug">{{ $agenda->lokasi }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-20 h-20 bg-[#fcf9f2] rounded-full flex items-center justify-center mx-auto mb-4 border border-[#f0e6d2]">
                            <svg class="w-10 h-10 text-[#d4a017]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <p class="text-gray-900 font-extrabold text-xl mb-1">Belum Ada Agenda</p>
                        <p class="text-gray-500 font-medium">Belum ada jadwal kegiatan sosial yang dipublikasikan oleh tim LPM.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12 mt-auto">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <div class="fade-up reveal">
                    <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-20 mb-8 opacity-90">
                    <p class="text-gray-400 font-medium leading-relaxed mb-6">Website Pusat Komando Layanan Darurat LPM Banjarbaru. Platform komunikasi tanggap bencana untuk seluruh masyarakat di wilayah Banjarbaru.</p>
                </div>
                <div class="fade-up reveal">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Markas & Kontak</h3>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li class="flex items-start gap-4">
                            <svg class="h-6 w-6 text-[#d4a017] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>HQ2R+RM2, Jl. Sapta Marga, Banjar Baru 70721</span>
                        </li>
                    </ul>
                </div>
                <div class="fade-up reveal">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Akses Cepat</h3>
                    <div class="grid grid-cols-2 gap-4 text-gray-400 font-bold text-sm uppercase tracking-wide">
                        <a href="{{ url('/') }}#profil" class="hover:text-[#d4a017] transition-colors">Profil LPM</a>
                        <a href="{{ route('status') }}" class="hover:text-[#d4a017] transition-colors">Status</a>
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
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('active'); });
            }, { threshold: 0.15 });
            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });

        window.onscroll = function() {
            const nav = document.getElementById("mainNav");
            const links = nav.querySelectorAll("a:not(.bg-white\\/10)"); 
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                nav.classList.remove("text-white", "py-5", "absolute");
                nav.classList.add("bg-white", "shadow-md", "text-gray-800", "py-3", "fixed");
                links.forEach(link => link.classList.remove("hover:text-white/80"));
            } else {
                nav.classList.add("text-white", "py-5", "absolute");
                nav.classList.remove("bg-white", "shadow-md", "text-gray-800", "py-3", "fixed");
                links.forEach(link => link.classList.add("hover:text-white/80"));
            }
        };

        document.getElementById("menuBtn").addEventListener("click", () => {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        });
    </script>
</body>
</html>