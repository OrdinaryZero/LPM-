<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Warga - LPM Banjarbaru</title>
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
    
    @if(session('success'))
        <div id="toastSukses" class="fixed top-24 left-1/2 transform -translate-x-1/2 z-[999] bg-green-500 text-white px-8 py-4 rounded-full shadow-2xl font-bold flex items-center gap-3 animate-bounce">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            {{ session('success') }}
        </div>
        <script>setTimeout(() => { document.getElementById('toastSukses').style.display = 'none'; }, 4000);</script>
    @endif

    <nav id="mainNav" class="fixed top-0 left-0 w-full z-[100] py-5 px-6 md:px-10 lg:px-12 flex justify-between items-center text-white transition-all duration-300">
        <div class="flex items-center gap-5 lg:gap-8">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-10 md:h-[42px] w-auto drop-shadow-md hover:scale-105 transition-transform">
            </a>
            <div class="hidden lg:flex items-center gap-5 text-[15px] tracking-wide">
                <a href="{{ url('/') }}" class="hover:text-[#d4a017] transition font-medium drop-shadow-sm">Beranda</a>
                <a href="{{ route('status') }}" class="hover:text-[#d4a017] transition font-medium">Status</a>
                <a href="{{ route('admin.login') }}" class="hover:text-white/80 transition font-medium flex items-center gap-1 bg-white/10 px-3 py-1.5 rounded-full border border-white/20">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                    <span class="text-[#ef4444] font-bold drop-shadow-sm">Command</span> Center
                </a>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-32 px-6 md:px-20 overflow-hidden flex items-center min-h-[560px]">
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        </video>
        
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#c09015]/80 via-[#d4a017]/60 to-[#fcd34d]/40 z-10"></div>

        <div class="max-w-4xl relative z-20 w-full md:w-1/2">
            <div class="mb-6 fade-up reveal opacity-0 translate-y-8 transition-all duration-1000">
                <img src="{{ asset('images/logort.png') }}" alt="Logo Instansi" class="w-20 md:w-28 h-auto drop-shadow-xl mb-6">
                <h2 class="text-white/90 text-xs md:text-sm font-semibold mb-2 tracking-widest uppercase drop-shadow-sm">Layanan Publik</h2>
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow-md">Aspirasi <br> Masyarakat</h1>
                <p class="text-white/90 mt-5 max-w-md text-[14px] md:text-base leading-relaxed drop-shadow-sm font-medium">Sampaikan keluhan, masukan, dan ide untuk pembangunan kota yang lebih baik langsung ke sistem pusat LPM.</p>
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

    <section class="bg-white -mt-10 md:-mt-40 relative z-40 pb-16 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-[40px] shadow-[0_15px_50px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12 fade-up reveal">

            <div class="mb-8 border-b border-gray-100 pb-6 text-center">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Formulir Penyampaian Aspirasi</h2>
                <div class="w-16 h-1.5 bg-[#d4a017] mx-auto rounded-full mb-4"></div>
                <p class="text-gray-500 text-sm font-medium">Identitas pelapor akan dijaga kerahasiaannya oleh sistem LPM.</p>
            </div>

            <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-5 py-3.5 rounded-2xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nomor WhatsApp</label>
                        <input type="number" name="no_hp" required class="w-full px-5 py-3.5 rounded-2xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Aspirasi</label>
                    <select name="kategori" required class="w-full px-5 py-3.5 rounded-2xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm cursor-pointer">
                        <option value="Infrastruktur Umum">Infrastruktur & Jalan</option>
                        <option value="Lingkungan">Lingkungan & Kebersihan</option>
                        <option value="Keamanan">Keamanan & Ketertiban</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Detail Pesan / Keluhan</label>
                    <textarea name="pesan" rows="4" required class="w-full px-5 py-3.5 rounded-2xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#d4a017] outline-none text-sm resize-none"></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#d4a017] hover:bg-[#b8860b] text-white font-extrabold py-4 rounded-2xl shadow-lg transition-all text-sm uppercase tracking-widest">
                        Kirim Aspirasi
                    </button>
                </div>
            </form>

        </div>
    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12 mt-10">
        <div class="max-w-7xl mx-auto text-center text-sm font-medium text-gray-500">
            <p>Pusat Komando LPM Banjarbaru © 2026 · Dioperasikan untuk Pelayanan Publik Masyarakat.</p>
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
    </script>
</body>
</html>