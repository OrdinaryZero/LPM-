<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Komando & Layanan LPM Terpadu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        html { scroll-behavior: smooth; } 
        /* 1. Kondisi A: Saat Masih Tersembunyi */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s ease-out;
        }

        /* 2. Kondisi B: Saat Sudah Muncul */
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes galeriSlide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-galeri {
            animation: galeriSlide 25s linear infinite;
        }
        
        /* Tambahan biar pas hover galerinya stop jalan */
        .animate-galeri:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-white min-h-screen">
    
    @if(session('success'))
        <div id="toastSukses" class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[999] bg-green-500 text-white px-8 py-4 rounded-full shadow-2xl font-bold flex items-center gap-3 animate-bounce">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => { document.getElementById('toastSukses').style.display = 'none'; }, 4000);
        </script>
    @endif
    
    <nav id="mainNav" class="fixed top-0 left-0 w-full z-[100] py-5 px-6 md:px-10 lg:px-12 flex justify-between items-center text-white transition-all duration-300">
        <div class="flex items-center gap-5 lg:gap-8">
            <a href="#">
                <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-10 md:h-[42px] w-auto drop-shadow-md hover:scale-105 transition-transform">
            </a>

            <div class="hidden lg:flex items-center gap-5 text-[15px] tracking-wide">
                <a href="#" class="font-extrabold text-[17px] drop-shadow-sm">Beranda</a>
                <a href="#profil" class="flex items-center gap-1 hover:text-[#d4a017] transition cursor-pointer font-medium">Profil</a>
                <a href="#acara" class="hover:text-[#d4a017] transition font-medium">Agenda Siaga</a>
                <a href="#lokasi" class="hover:text-[#d4a017] transition font-medium">Posko</a>
                <a href="#informasi" class="hover:text-[#d4a017] transition font-medium">Info Darurat</a>
                <a href="#galeri" class="hover:text-[#d4a017] transition font-medium">Dokumentasi</a>
                
                <a href="{{ route('admin.login') }}" class="hover:text-white/80 transition font-medium flex items-center gap-1 bg-white/10 px-3 py-1.5 rounded-full border border-white/20">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                    <span class="text-[#ef4444] font-bold drop-shadow-sm">Command</span> Center
                </a>
            </div>
        </div>

        <div class="flex items-center">
            <button id="menuBtn" class="lg:hidden text-white ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="5" r="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <circle cx="12" cy="19" r="2"/>
                </svg>
            </button>

            <div class="relative hidden lg:block">
                <input id="searchInput"
                type="text"
                placeholder="Cari Laporan/Berita..."
                class="py-1.5 pl-4 pr-10 rounded text-gray-700 text-[13px]
                focus:outline-none w-64 lg:w-72 shadow-sm bg-white/90
                border border-transparent transition-all">

                <svg xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 absolute right-3 top-2 cursor-pointer"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </nav>

    <div id="mobileMenu" class="hidden fixed top-20 left-0 w-full bg-white shadow-xl z-[90] lg:hidden">
        <div class="flex flex-col text-gray-800 font-semibold">
            <a href="#" class="px-6 py-4 border-b hover:bg-gray-50">Home</a>
            <a href="#profil" class="px-6 py-4 border-b hover:bg-gray-50">Profil</a>
            <a href="#acara" class="px-6 py-4 border-b hover:bg-gray-50">Agenda Siaga</a>
            <a href="#lokasi" class="px-6 py-4 border-b hover:bg-gray-50">Posko Utama</a>
            <a href="#informasi" class="px-6 py-4 border-b hover:bg-gray-50">Info Darurat</a>
            <a href="#galeri" class="px-6 py-4 border-b hover:bg-gray-50">Dokumentasi</a>
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
                <h2 class="text-white/90 text-xs md:text-sm font-semibold mb-2 tracking-widest uppercase drop-shadow-sm">Mitra Pemerintah Kota, Pelindung Masyarakat</h2>
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow-md">Pusat Komando <br> LPM Banjarbaru</h1>
                <p class="text-white/90 mt-5 max-w-md text-[14px] md:text-base leading-relaxed drop-shadow-sm font-medium">Sistem tanggap darurat, pelayanan sosial, dan pemberdayaan masyarakat. Bersama kita wujudkan kota yang responsif, aman, dan siaga.</p>

                <div class="mt-8 flex gap-4">
                    <a href="#informasi" class="bg-white text-[#d4a017] px-8 py-3 rounded-full font-bold text-sm shadow-lg hover:bg-gray-50 hover:-translate-y-1 transition-all duration-300 flex items-center gap-2">
                        Panggil Bantuan
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-30">
            <svg class="relative block w-full h-[60px] md:h-[140px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C400,140 1000,-20 1440,60 L1440,120 L0,120 Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <section class="bg-white relative z-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto bg-white rounded-[40px] shadow-[0_20px_60px_rgba(0,0,0,0.06)] border border-gray-100 p-8 md:p-14 ">
        </div>
    </section>

    <section class="bg-white -mt-10 md:-mt-40 relative z-40 pb-16 px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-[40px] shadow-[0_15px_50px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12">

            <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-10 mb-12 fade-up reveal">
                
                <a href="{{ route('surat.index') }}" class="w-full md:w-[420px] bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 flex items-center gap-5 hover:shadow-[0_20px_50px_rgba(220,38,38,0.1)] hover:border-red-100 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-16 h-16 rounded-[20px] bg-red-50 text-red-600 flex items-center justify-center shrink-0 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-1 group-hover:text-red-600 transition-colors duration-300">Ambulance Darurat</h3>
                        <p class="text-sm font-medium text-gray-500 line-clamp-1">Layanan medis & evakuasi 24 Jam</p>
                    </div>
                </a>

                <a href="{{ route('lapor.index') }}" class="w-full md:w-[420px] bg-white p-6 rounded-[30px] shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-gray-100 flex items-center gap-5 hover:shadow-[0_20px_50px_rgba(212,160,23,0.1)] hover:border-[#f0e6d2] hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-16 h-16 rounded-[20px] bg-[#fcf9f2] text-[#d4a017] flex items-center justify-center shrink-0 group-hover:bg-[#d4a017] group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" /></svg>
                    </div>
                    <div class="text-left">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-1 group-hover:text-[#d4a017] transition-colors duration-300">Laporan Rescue</h3>
                        <p class="text-sm font-medium text-gray-500 line-clamp-1">Bantuan bencana & insiden darurat</p>
                    </div>
                </a>

            </div>

            <div class="border-t border-gray-100 w-2/3 mx-auto mb-10 fade-up reveal"></div>

            <div class="flex flex-wrap justify-center gap-8 md:gap-24 fade-up reveal delay-100">
                
                <a href="{{ route('warga.index') }}" class="flex flex-col items-center group cursor-pointer w-24 md:w-32">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center shadow-[0_5px_20px_rgba(0,0,0,0.04)] mb-3 group-hover:-translate-y-2 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <span class="text-xs md:text-sm font-bold text-gray-600 tracking-wide group-hover:text-[#d4a017] text-center">Data<br>Masyarakat</span>
                </a>
                
                <a href="{{ route('kas-rt.index') }}" class="flex flex-col items-center group cursor-pointer w-24 md:w-32">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center shadow-[0_5px_20px_rgba(0,0,0,0.04)] mb-3 group-hover:-translate-y-2 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <span class="text-xs md:text-sm font-bold text-gray-600 tracking-wide group-hover:text-[#d4a017] text-center">Transparansi<br>Hibah</span>
                </a>
                
                <a href="{{ route('umkm.index') }}" class="flex flex-col items-center group cursor-pointer w-24 md:w-32">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center shadow-[0_5px_20px_rgba(0,0,0,0.04)] mb-3 group-hover:-translate-y-2 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <span class="text-xs md:text-sm font-bold text-gray-600 tracking-wide group-hover:text-[#d4a017] text-center">UMKM<br>Binaan</span>
                </a>

            </div>

        </div>
    </section>

    <section id="profil" class="max-w-7xl mx-auto px-6 lg:px-12 py-10 scroll-mt-24">
        <div class="flex flex-col md:flex-row gap-10 items-center bg-gray-50 rounded-[40px] p-8 md:p-12 shadow-sm border border-gray-100 fade-up reveal">
            
            <div class="w-full md:w-1/3 text-center shrink-0">
                <img src="{{ asset('images/siganteng.jpeg') }}" class="w-40 h-40 object-cover rounded-full mx-auto shadow-md border-4 border-white mb-4">
                <span class="text-[10px] font-extrabold bg-[#d4a017] text-white px-3 py-1 rounded-full uppercase tracking-widest">Ketua LPM Banjarbaru</span>
                <h3 class="text-xl font-extrabold mt-3 text-gray-900">Aditya Febrian</h3>
            </div>

            <div class="w-full md:w-2/3">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Mengenal LPM Banjarbaru</h2>
                <p class="text-gray-600 leading-relaxed font-medium mb-6">
                    Lembaga Pemberdayaan Masyarakat (LPM) adalah mitra strategis pemerintah kelurahan yang dibentuk untuk memfasilitasi partisipasi warga. Kami memastikan pembangunan lokal berjalan sesuai kebutuhan nyata masyarakat melalui 5 fungsi utama:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    
                    <div class="flex items-start gap-3 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-gray-900 mb-0.5">Perencanaan</h4>
                            <p class="text-[11px] font-medium text-gray-500 leading-snug">Menyusun rencana pembangunan partisipatif via Musrenbangdes.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-green-50 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-gray-900 mb-0.5">Penyaluran Aspirasi</h4>
                            <p class="text-[11px] font-medium text-gray-500 leading-snug">Menampung suara warga terkait infrastruktur & program sosial.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-yellow-50 text-[#d4a017] flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-gray-900 mb-0.5">Penggerak Partisipasi</h4>
                            <p class="text-[11px] font-medium text-gray-500 leading-snug">Mendorong gotong royong dan kesadaran swadaya masyarakat.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-gray-900 mb-0.5">Monitoring & Evaluasi</h4>
                            <p class="text-[11px] font-medium text-gray-500 leading-snug">Mengawasi jalannya proyek agar tepat sasaran dan bermanfaat.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow md:col-span-2">
                        <div class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-gray-900 mb-0.5">Pemberdayaan Ekonomi</h4>
                            <p class="text-[11px] font-medium text-gray-500 leading-snug">Membantu kelompok ekonomi masyarakat, UMKM lokal, dan meningkatkan kapasitas SDM warga Banjarbaru.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section id="struktur-pengurus" class="bg-white scroll-mt-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-16">
        <div class="text-center mb-16 fade-up reveal">
            <span class="text-[#d4a017] font-extrabold text-sm uppercase tracking-widest mb-2 block">Tim Inti</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Struktur Komando & Pengurus</h2>
            <div class="w-16 h-1.5 bg-[#d4a017] mx-auto rounded-full"></div>
            <p class="text-gray-500 font-medium mt-4">Jajaran pengurus operasional dan koordinator relawan LPM Banjarbaru.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($pengurus as $index => $p)
                @php
                    $styles = [
                        [ 'bg' => 'bg-[#d4a017]', 'text' => 'text-[#d4a017]', 'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' ],
                        [ 'bg' => 'bg-blue-500', 'text' => 'text-blue-600', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z' ],
                        [ 'bg' => 'bg-red-500', 'text' => 'text-red-600', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z' ],
                        [ 'bg' => 'bg-green-500', 'text' => 'text-green-600', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z' ]
                    ];
                    $style = $styles[$index % 4]; 
                @endphp

                <div class="bg-gray-50 p-8 rounded-[30px] border border-gray-100 text-center hover:bg-white hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-300 fade-up reveal" style="transition-delay: {{ $index * 75 }}ms;">
                    <div class="relative w-28 h-28 mx-auto mb-5">
<div class="relative w-28 h-28 mx-auto mb-5 bg-gray-100 rounded-full border-4 border-white shadow-md">
    @if($p->foto)
        <img src="{{ asset($p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover rounded-full">
    @else
        <svg class="w-full h-full text-gray-300 p-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
    @endif
    
    <div class="absolute bottom-0 right-0 {{ $style['bg'] }} text-white p-1.5 rounded-full shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $style['icon'] }}" />
        </svg>
    </div>
</div>
                        <div class="absolute bottom-0 right-0 {{ $style['bg'] }} text-white p-1.5 rounded-full shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $style['icon'] }}" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-900 mb-1">{{ $p->nama }}</h3>
                    <p class="text-xs font-bold {{ $style['text'] }} uppercase tracking-widest">{{ $p->jabatan }}</p>
                </div>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500 italic">Data struktural belum diatur di Admin.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
        </section>

    <section id="informasi" class="max-w-7xl mx-auto px-6 lg:px-12 py-16 scroll-mt-24">
        <div class="text-center mb-12 fade-up reveal">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Informasi Operasional Siaga</h2>
            <div class="w-16 h-1.5 bg-[#d4a017] mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up reveal delay-100">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-[#d4a017]/10 text-[#d4a017] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 class="font-extrabold text-lg text-gray-900 mb-2">Jam Buka Posko Induk</h3>
                <p class="text-gray-500 text-sm font-medium">Senin - Jumat: 08.00 - 20.00 WITA<br>Layanan Darurat: Aktif 24 Jam</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                </div>
                <h3 class="font-extrabold text-lg text-gray-900 mb-2">Hotline Kedaruratan</h3>
                <p class="text-gray-500 text-sm font-medium">Rescue & Kecelakaan: (+62) 85751524327<br>Evakuasi Medis: 969</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </div>
                <h3 class="font-extrabold text-lg text-gray-900 mb-2">Tim Rescue Standby</h3>
                <p class="text-gray-500 text-sm font-medium">Unit armada disiagakan di posko utama untuk mobilitas cepat penanganan insiden.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-16 bg-white overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 fade-up reveal">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Laporan Kegiatan</h2>
                <div class="w-16 h-1.5 bg-[#d4a017] rounded-full"></div>
            </div>
            <a href="#" class="text-[#d4a017] font-bold underline hover:text-black transition-colors mt-4 md:mt-0">Lihat semua publikasi</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 group cursor-pointer fade-up reveal">
                <div class="overflow-hidden rounded-[30px] shadow-sm mb-6">
                    <img src="{{ asset('images/berita1.jpeg') }}" alt="Giat Utama" class="w-full h-[400px] object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
                <div class="flex items-center gap-3 text-sm font-bold text-[#d4a017] mb-3 uppercase tracking-widest">
                    <span>Pelatihan Siaga</span> <span class="text-gray-300">•</span> <span class="text-gray-500">10 April 2026</span>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight group-hover:text-[#d4a017] transition-colors">Pelatihan Rescue Terpadu & Pertolongan Pertama Medis</h3>
            </div>

            <div class="flex flex-col gap-8">
                <div class="flex gap-5 group cursor-pointer fade-up reveal">
                    <img src="{{ asset('images/berita2.jpg') }}" class="w-28 h-28 rounded-2xl object-cover shadow-sm">
                    <div class="flex flex-col justify-center">
                        <p class="text-[11px] font-bold text-[#d4a017] uppercase mb-1">Koordinasi</p>
                        <h4 class="font-bold text-gray-800 leading-snug group-hover:text-[#d4a017] transition-colors">Tim LPM berkoordinasi dengan BPBD Banjarbaru</h4>
                    </div>
                </div>
                <div class="flex gap-5 group cursor-pointer fade-up reveal">
                    <img src="{{ asset('images/berita3.jpg') }}" class="w-28 h-28 rounded-2xl object-cover shadow-sm">
                    <div class="flex flex-col justify-center">
                        <p class="text-[11px] font-bold text-[#d4a017] uppercase mb-1">Bakti Sosial</p>
                        <h4 class="font-bold text-gray-800 leading-snug group-hover:text-[#d4a017] transition-colors">Distribusi Bantuan Sosial ke Wilayah Rawan Bencana</h4>
                    </div>
                </div>
                <div class="flex gap-5 group cursor-pointer fade-up reveal">
                    <img src="{{ asset('images/berita4.jpeg') }}" class="w-28 h-28 rounded-2xl object-cover shadow-sm">
                    <div class="flex flex-col justify-center">
                        <p class="text-[11px] font-bold text-[#d4a017] uppercase mb-1">Sosialisasi</p>
                        <h4 class="font-bold text-gray-800 leading-snug group-hover:text-[#d4a017] transition-colors">Sosialisasi Mitigasi Bencana bersama Dosen UIN Antasari</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-20 bg-gray-50 overflow-hidden scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Dokumentasi Lapangan & Armada</h2>
                <div class="w-16 h-1.5 bg-[#d4a017] mx-auto rounded-full"></div>
            </div>

            <div class="relative overflow-hidden group">
                <div class="flex gap-4 animate-galeri group-hover:[animation-play-state:paused]">
                    
                    @forelse ($armada as $img)
                        <div class="min-w-[250px] h-72 rounded-2xl overflow-hidden shadow-md relative bg-white">
                            <img src="{{ asset('uploads/galeri/' . $img->foto) }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                <p class="text-white text-sm font-bold truncate">{{ $img->judul }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-10">
                            <p class="text-gray-500 italic">Data dokumentasi armada belum tersedia.</p>
                        </div>
                    @endforelse

                    @if($armada->count() > 0)
                        @foreach ($armada as $img)
                            <div class="min-w-[250px] h-72 rounded-2xl overflow-hidden shadow-md relative bg-white">
                                <img src="{{ asset('uploads/galeri/' . $img->foto) }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                    <p class="text-white text-sm font-bold truncate">{{ $img->judul }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section id="lokasi" class="bg-gray-50 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-16">
            <div class="flex flex-col md:flex-row gap-10 items-center">
                <div class="w-full md:w-1/3 fade-up reveal">
                    <span class="text-[#d4a017] font-extrabold text-sm uppercase tracking-widest mb-2 block">Peta Posko</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">Posko Utama LPM Banjarbaru</h2>
                    <p class="text-gray-500 font-medium mb-6 leading-relaxed">
                        Pusat koordinasi relawan, armada rescue, dan layanan operasional LPM terletak di kawasan strategis Banjarbaru.
                    </p>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <h4 class="font-extrabold text-gray-900 mb-2">Alamat Markas</h4>
                        <p class="text-sm text-gray-600 font-medium leading-relaxed">
                            GQH2+GQM, Kemuning, Banjarbaru Selatan, Banjarbaru City, South Kalimantan 70732
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-2/3 fade-up reveal delay-100">
                    <div class="bg-white p-2 rounded-[30px] shadow-sm border border-gray-100">
                        <div class="w-full h-[350px] md:h-[450px] rounded-[24px] overflow-hidden bg-gray-200">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.5959744918246!2d114.79162600000001!3d-3.447988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de683c42a53e09d%3A0x999feec9ff68ddf0!2sLembaga%20Pemberdayaan%20Masyarakat%20LPM!5e0!3m2!1sen!2sid!4v1776187966933!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </www.google.com>
                        </div>
                    </div>
                </div>
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
                        <a href="#profil" class="hover:text-[#d4a017] transition-colors">Profil LPM</a>
                        <a href="#acara" class="hover:text-[#d4a017] transition-colors">Jadwal Giat</a>
                        <a href="#informasi" class="hover:text-[#d4a017] transition-colors">Info Darurat</a>
                        <a href="#galeri" class="hover:text-[#d4a017] transition-colors">Dokumentasi</a>
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
                search.classList.add("bg-gray-100");
                search.classList.remove("bg-white/90");
                
                links.forEach(link => {
                    link.classList.remove("hover:text-white/80");
                });
            } else {
                nav.classList.add("text-white", "py-5", "absolute");
                nav.classList.remove("bg-white", "shadow-md", "text-gray-800", "py-3", "fixed");
                search.classList.remove("bg-gray-100");
                search.classList.add("bg-white/90");
                
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
    </script>

    <script>
        const btn = document.getElementById("menuBtn");
        const menu = document.getElementById("mobileMenu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>