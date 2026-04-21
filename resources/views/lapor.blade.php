<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rescue Darurat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

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

    <section class="relative bg-gradient-to-r from-[#c09015] via-[#d4a017] to-[#fcd34d] pt-32 pb-40 px-4 text-center z-10 overflow-hidden">

            <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

        <div class="absolute top-0 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="fade-up opacity-0 translate-y-8 transition-all duration-[800ms] ease-out">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3 drop-shadow-md">Layanan Rescue Darurat</h1>
            <p class="text-white/90 text-sm md:text-base mb-8 max-w-2xl mx-auto font-medium">Laporkan kejadian darurat dan dapatkan bantuan segera dari tim rescue LPM Banjarbaru.</p>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10">
            <svg class="relative block w-full h-[40px] md:h-[80px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,123.8,188.47,115,234.35,107.91,278.36,83.9,321.39,56.44Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    <section class="relative z-20 -mt-5 md:-mt-5 px-4 pb-20 flex-grow">
        <div class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out delay-100 max-w-3xl mx-auto bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-gray-100 overflow-hidden">
            
            <div class="bg-gray-50 border-b border-gray-100 px-6 py-5 flex items-center justify-between">
                <h2 class="text-lg md:text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    Form Laporan Baru
                </h2>
                <span class="text-[11px] font-bold bg-green-100 text-green-700 px-3 py-1 rounded-full uppercase tracking-wider">Aman & Rahasia</span>
            </div>

            <div class="p-6 md:p-8">
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<form action="{{ route('rescue.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pelapor</label>
            <input type="text" name="nama" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
        </div>
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">No. Telepon Darurat</label>
            <input type="number" name="hp" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Insiden</label>
        <select name="jenis" required class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm">
            <option value="Kecelakaan Lalu Lintas">Kecelakaan Lalu Lintas</option>
            <option value="Kebakaran">Kebakaran</option>
            <option value="Pohon Tumbang">Pohon Tumbang</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">Titik Lokasi Kejadian</label>
        
        <div id="map" class="w-full h-48 rounded-xl border-2 border-gray-200 mb-3" style="z-index: 1;"></div>
        
        <div class="relative">
            <textarea id="lokasi_teks" name="lokasi" required rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm font-medium" placeholder="Mencari alamat lokasi... (Bisa ditambahkan patokan manual)"></textarea>
            
            <input type="hidden" name="link_gps" id="link_gps">
            
            <button type="button" onclick="ambilLokasiRescue()" class="absolute right-2 top-2 text-[10px] bg-red-100 text-red-700 px-3 py-1.5 rounded-md font-bold uppercase hover:bg-red-200 transition-colors">
                📍 Lacak Ulang
            </button>
        </div>
        <p id="status_gps_rescue" class="text-[10px] mt-1 text-gray-500 italic">Menunggu izin lokasi...</p>
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kejadian</label>
        <textarea name="deskripsi" required rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-red-500 outline-none text-sm"></textarea>
    </div>

    <div>
        <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto (Wajib jika ada)</label>
        <input type="file" name="foto" accept="image/*" class="w-full text-sm">
    </div>

    <button type="submit" class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-extrabold py-4 rounded-xl shadow-lg text-sm uppercase">
        Laporkan ke Tim Rescue
    </button>
</form>

<script>
    let mapRescue;
    let markerRescue;

    function initMap(lat, lng) {
        if (!mapRescue) {
            // Buat peta 
            mapRescue = L.map('map').setView([lat, lng], 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mapRescue);
            markerRescue = L.marker([lat, lng]).addTo(mapRescue);
        } else {
            // Update posisi peta
            mapRescue.setView([lat, lng], 16);
            markerRescue.setLatLng([lat, lng]);
        }
    }

    function ambilLokasiRescue() {
        const status = document.getElementById('status_gps_rescue');
        const inputTeks = document.getElementById('lokasi_teks');
        const inputLink = document.getElementById('link_gps');

        if (!navigator.geolocation) { 
            status.textContent = "Browser tidak mendukung GPS."; 
            return; 
        }

        status.textContent = "Sedang mengunci lokasi dari satelit...";

        navigator.geolocation.getCurrentPosition(
            (pos) => {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;
                
                initMap(lat, lng);
                
                inputLink.value = `https://www.google.com/maps?q=${lat},${lng}`;
                
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(res => res.json())
                    .then(data => {
                        inputTeks.value = data.display_name + " (Patokan tambahan: ...)";
                        status.textContent = "✅ Lokasi Akurat Ditemukan!"; 
                        status.style.color = "green";
                    })
                    .catch(() => {
                        inputTeks.value = "Titik GPS dikunci. Silakan tulis alamat lengkap Anda di sini.";
                    });
            },
            (err) => { 
                status.textContent = "❌ Gagal akses lokasi. Pastikan GPS HP menyala."; 
                status.style.color = "red"; 
            },
            { enableHighAccuracy: true }
        );
    }
        window.onload = ambilLokasiRescue;
</script>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-16">
            <h3 class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out text-center text-gray-500 font-bold text-sm uppercase tracking-widest mb-8">Bagaimana Laporan Diproses?</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                
                <div class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out delay-[100ms] flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-gray-800">1. Input Laporan</h4>
                    <p class="text-xs text-gray-500 mt-1">Kirim keluhan via form.</p>
                </div>

                <div class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out delay-[250ms] flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-gray-800">2. Staff </h4>
                    <p class="text-xs text-gray-500 mt-1">Staff menerima pemberitahuan.</p>
                </div>

                <div class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out delay-[400ms] flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-gray-800">3. Tindak Lanjut</h4>
                    <p class="text-xs text-gray-500 mt-1">Laporan diproses staff.</p>
                </div>

                <div class="fade-up opacity-0 translate-y-12 transition-all duration-[800ms] ease-out delay-[550ms] flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-gray-800">4. Selesai</h4>
                    <p class="text-xs text-gray-500 mt-1">Masalah tertangani.</p>
                </div>

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
        document.addEventListener("DOMContentLoaded", function() {
            const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-12', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>