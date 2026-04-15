<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Warga - LPM Banjarbaru</title>
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
                <span class="border-b-2 border-white pb-1">UMKM Warga</span>
            </div>
        </div>
        <a href="{{ route('beranda') }}" class="bg-white/20 hover:bg-white/30 px-5 py-2 rounded-full text-sm font-bold transition-colors">Kembali</a>
    </nav>

    <section class="relative bg-gradient-to-r from-[#c09015] via-[#d4a017] to-[#fcd34d] pt-32 pb-48 text-center">

        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
        </video>


        <div class="fade-up opacity-0 translate-y-8 transition-all duration-700">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-2 drop-shadow-md">Direktori UMKM Warga</h1>
            <p class="text-white/90 font-medium max-w-lg mx-auto">Dukung roda perekonomian lingkungan. Temukan berbagai produk dan jasa dari tetangga untuk tetangga di LPM Banjarbaru.</p>
        </div>
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10">
            <svg class="relative block w-full h-[60px] md:h-[80px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,123.8,188.47,115,234.35,107.91,278.36,83.9,321.39,56.44Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    <section class="relative z-20 -mt-1 md:-mt-1 px-4 pb-20 flex-grow">        
        <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.06)] p-4 md:p-6 mb-10 border border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between">
            
            <div class="relative w-full md:w-1/3">
                <input type="text" placeholder="Cari nama toko atau jasa..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-[#d4a017] outline-none transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                <button class="bg-[#d4a017] text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md transition-colors">Semua Kategori</button>
                <button class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition-colors">Kuliner</button>
                <button class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition-colors">Sembako</button>
                <button class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition-colors">Jasa</button>
                <button class="bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition-colors hidden lg:block">Fashion</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 delay-100 bg-white rounded-[24px] shadow-sm hover:shadow-xl overflow-hidden border border-gray-100 group">
                <div class="h-52 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">Buka</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-[10px] font-bold bg-[#d4a017]/10 text-[#d4a017] px-3 py-1 rounded-full inline-block uppercase tracking-wider">Sembako</div>
                        <div class="flex items-center gap-1 text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <span class="text-xs text-gray-600 font-bold">4.8</span>
                        </div>
                    </div>
                    <h4 class="font-extrabold text-xl text-gray-900 mb-1">Warung Madura</h4>
                    <p class="text-xs text-gray-500 flex items-center gap-1.5 mb-4 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Blok A No. 12
                    </p>
                    <p class="text-sm text-gray-600 mb-6 line-clamp-2 leading-relaxed">Menyediakan berbagai macam kebutuhan pokok harian, gas LPG, isi ulang galon, dan sayur mayur segar.</p>
                    <div class="flex gap-3">
                        <a href="#" class="flex-grow bg-gray-900 hover:bg-[#d4a017] text-white text-center font-bold py-3 rounded-xl transition-colors text-xs uppercase tracking-widest">Hubungi WA</a>
                        <a href="#" class="w-12 bg-gray-50 hover:bg-gray-100 border border-gray-200 flex items-center justify-center rounded-xl transition-colors text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 delay-200 bg-white rounded-[24px] shadow-sm hover:shadow-xl overflow-hidden border border-gray-100 group">
                <div class="h-52 relative overflow-hidden">
                    <img src="{{ asset('images/photo3.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">Buka</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-[10px] font-bold bg-[#d4a017]/10 text-[#d4a017] px-3 py-1 rounded-full inline-block uppercase tracking-wider">Kuliner</div>
                        <div class="flex items-center gap-1 text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <span class="text-xs text-gray-600 font-bold">5.0</span>
                        </div>
                    </div>
                    <h4 class="font-extrabold text-xl text-gray-900 mb-1">Nasi Uduk Pembatuan</h4>
                    <p class="text-xs text-gray-500 flex items-center gap-1.5 mb-4 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Blok C No. 05
                    </p>
                    <p class="text-sm text-gray-600 mb-6 line-clamp-2 leading-relaxed">Menerima pesanan nasi uduk, nasi kuning, tumpeng mini, dan katering untuk acara rapat atau arisan.</p>
                    <div class="flex gap-3">
                        <a href="#" class="flex-grow bg-gray-900 hover:bg-[#d4a017] text-white text-center font-bold py-3 rounded-xl transition-colors text-xs uppercase tracking-widest">Hubungi WA</a>
                        <a href="#" class="w-12 bg-gray-50 hover:bg-gray-100 border border-gray-200 flex items-center justify-center rounded-xl transition-colors text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 delay-300 bg-white rounded-[24px] shadow-sm hover:shadow-xl overflow-hidden border border-gray-100 group">
                <div class="h-52 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-gray-500 text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">Tutup</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-[10px] font-bold bg-[#d4a017]/10 text-[#d4a017] px-3 py-1 rounded-full inline-block uppercase tracking-wider">Jasa</div>
                        <div class="flex items-center gap-1 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <span class="text-xs text-gray-500 font-bold">Baru</span>
                        </div>
                    </div>
                    <h4 class="font-extrabold text-xl text-gray-900 mb-1">Servis AC Pak Dika</h4>
                    <p class="text-xs text-gray-500 flex items-center gap-1.5 mb-4 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Blok B No. 20
                    </p>
                    <p class="text-sm text-gray-600 mb-6 line-clamp-2 leading-relaxed">Melayani cuci AC panggilan, perbaikan kulkas, mesin cuci, dan instalasi listrik rumahan.</p>
                    <div class="flex gap-3">
                        <a href="#" class="flex-grow bg-gray-900 hover:bg-[#d4a017] text-white text-center font-bold py-3 rounded-xl transition-colors text-xs uppercase tracking-widest">Hubungi WA</a>
                        <a href="#" class="w-12 bg-gray-50 hover:bg-gray-100 border border-gray-200 flex items-center justify-center rounded-xl transition-colors text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="fade-up opacity-0 translate-y-12 transition-all duration-700 delay-400 mt-16 bg-gradient-to-r from-gray-900 to-[#1f2328] rounded-[30px] p-8 md:p-12 text-center border border-gray-800 shadow-2xl relative overflow-hidden">
            <svg class="absolute top-0 right-0 text-white/5 w-64 h-64 -mt-10 -mr-10 transform rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            
            <div class="relative z-10">
                <span class="bg-[#d4a017]/20 text-[#d4a017] border border-[#d4a017]/30 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">Bebas Biaya</span>
                <h3 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Punya Usaha atau Jasa?</h3>
                <p class="text-gray-400 font-medium max-w-xl mx-auto mb-8">Daftarkan usaha Anda ke dalam direktori UMKM LPM Banjarbaru untuk menjangkau lebih banyak pelanggan dari lingkungan sendiri.</p>
                <a href="#" class="inline-flex items-center gap-2 bg-[#d4a017] hover:bg-white hover:text-[#d4a017] text-white px-8 py-3.5 rounded-xl font-bold text-sm transition-all shadow-lg uppercase tracking-wider">
                    Daftarkan Usaha Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7-7m7-7H3" /></svg>
                </a>
            </div>
        </div>

    </section>

    <footer class="bg-[#1f2328] text-white pt-20 pb-10 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <div class="fade-up reveal">
                    <img src="{{ asset('images/logort.png') }}" alt="Logo RT" class="h-20 mb-8 opacity-90">
                    <p class="text-gray-400 font-medium leading-relaxed mb-6">
                        Website Resmi Layanan LPM Banjarbaru. Media informasi dan transparansi untuk seluruh warga di lingkungan Kawasan RT 1 Banjarbaru.
                    </p>
                </div>

                <div class="fade-up reveal">
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

                <div class="fade-up reveal">
                    <h3 class="text-lg font-bold border-l-4 border-[#d4a017] pl-4 mb-8">Tautan Layanan</h3>
                    <div class="grid grid-cols-2 gap-4 text-gray-400 font-bold text-sm uppercase tracking-wide">
                        <a href="#profil" class="hover:text-[#d4a017] transition-colors">Profil RT</a>
                        <a href="#acara" class="hover:text-[#d4a017] transition-colors">Agenda Warga</a>
                        <a href="#informasi" class="hover:text-[#d4a017] transition-colors">Layanan Info</a>
                        <a href="#galeri" class="hover:text-[#d4a017] transition-colors">Dokumentasi</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center md:text-left text-sm font-medium text-gray-500">
                <p>Website Resmi Layanan LPM Banjarbaru Banjarbaru &copy; 2026 &middot; Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-12', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
    </script>
</body>
</html>