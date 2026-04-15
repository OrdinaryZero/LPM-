<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Report & CCTV - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-[#fafafb] min-h-screen flex flex-col text-gray-800">

    <nav class="py-4 px-6 md:px-10 flex justify-between items-center border-b border-gray-200 bg-white sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <a href="{{ route('beranda') }}" class="text-gray-500 hover:text-gray-800 font-semibold text-sm transition-colors flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
            <div class="h-4 w-px bg-gray-300 hidden md:block"></div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse"></span>
                <span class="font-extrabold text-gray-900 uppercase tracking-widest text-[13px]">RT01 Live Reports</span>
            </div>
        </div>
        <div class="text-[11px] md:text-xs font-extrabold text-[#d4a017] bg-[#fcf9f2] px-4 py-2 rounded-md border border-[#f0e6d2] tracking-wider" id="clock">
            00.00.00 WITA
        </div>
    </nav>

    <section class="p-6 md:p-10 w-full flex-grow max-w-[1400px] mx-auto">
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 md:gap-10">
            
            <div class="xl:col-span-2 flex flex-col gap-8">
                
                <div class="fade-up opacity-0 translate-y-6 transition-all duration-700">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-extrabold text-gray-900 flex items-center gap-2 text-[15px] uppercase tracking-wide">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                            LIVE CAM 
                        </h2>
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] text-red-500 font-extrabold uppercase tracking-widest flex items-center gap-1 animate-pulse">
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full inline-block"></span> REC
                            </span>
                            <span class="text-[10px] text-blue-500 font-bold bg-blue-50 px-2 py-0.5 rounded border border-blue-100">1080p</span>
                        </div>
                    </div>
                    
                <div class="w-full aspect-video bg-gray-900 rounded-[24px] overflow-hidden shadow-md border border-gray-200 relative group">
                        
<div class="relative w-full aspect-video">
    <video
        id="cctv-video"
        class="absolute top-0 left-0 w-full h-full object-cover"
        autoplay
        muted
        controls
        playsinline>
    </video>
</div>

                        <div class="absolute top-0 left-0 w-full h-full z-20 pointer-events-none shadow-[inset_0_0_50px_rgba(0,0,0,0.5)]">
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 border-2 border-white/20 rounded-full"></div>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-1.5 h-1.5 bg-white/50 rounded-full"></div>
                            <div class="absolute bottom-4 right-4 text-white/90 font-mono text-xs font-bold drop-shadow-lg tracking-wider" id="cam-date"></div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="flex flex-col gap-4 fade-up opacity-0 translate-y-6 transition-all duration-700 delay-200">
                <h2 class="font-extrabold text-gray-900 mb-1 flex items-center gap-2 text-[15px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    Status Sistem & Wilayah
                </h2>
                
                <div class="bg-white border border-gray-100 p-5 rounded-2xl flex items-center justify-between shadow-sm">
                    <div>
                        <p class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold mb-0.5">CCTV</p>
                        <p class="text-gray-900 font-extrabold text-sm">Online</p>
                    </div>
                    <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                </div>

                <div class="bg-white border border-gray-100 p-5 rounded-2xl flex items-center justify-between shadow-sm">
                    <div>
                        <p class="text-[9px] text-gray-400 uppercase tracking-widest font-extrabold mb-0.5">GERBANG UTAMA</p>
                        <p class="text-gray-900 font-extrabold text-sm">Ditutup</p>
                    </div>
                    <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                </div>

                <div class="bg-[#fcf9f2] border border-[#f0e6d2] p-8 rounded-[28px] mt-2 text-center shadow-sm relative">
                    <div class="w-14 h-14 rounded-2xl bg-white text-[#d4a017] flex items-center justify-center mx-auto mb-4 shadow-sm border border-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-1">STAFF POS JAGA</p>
                    <p class="text-gray-900 font-black text-lg mb-6">Adit & 76 Apel</p>
                    
                    <button class="w-full bg-[#111827] hover:bg-gray-800 text-white py-3.5 rounded-xl text-[11px] font-extrabold uppercase tracking-widest transition-colors shadow-md">
                        HUBUNGI STAFF
                    </button>
                </div>

            </div>
        </div>

                        <div class="fade-up opacity-0 translate-y-6 transition-all duration-700 delay-100">
                    <h2 class="font-extrabold text-gray-900 flex items-center gap-2 mb-4 text-[15px] uppercase tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#d4a017]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                        Logs Laporan
                    </h2>
                    
                    <div class="bg-white border border-gray-100 rounded-[30px] p-6 shadow-sm">
                        <div class="space-y-6 border-l-2 border-gray-100 pl-6 relative">
                            
                            @forelse ($laporans as $laporan)
                                <div class="relative">
                                    <span class="absolute -left-[31px] top-0 w-3.5 h-3.5 bg-red-500 rounded-full ring-4 ring-white shadow-sm"></span>
                                    
                                    <p class="text-[10px] text-[#d4a017] font-extrabold uppercase tracking-widest mb-1">{{ $laporan->created_at->diffForHumans() }}</p>
                                    
                                    <p class="font-extrabold text-gray-900 text-[15px] mb-2">Laporan {{ $laporan->kategori }} <span class="text-gray-400 font-medium text-sm ml-1">oleh {{ $laporan->nama_warga }} ({{ $laporan->no_rumah }})</span></p>
                                    
                                    <div class="bg-gray-50 border border-gray-100 p-4 rounded-2xl text-gray-600 text-sm font-medium">
                                        {{ $laporan->deskripsi_laporan }}
                                    </div>
                                </div>
                            @empty
                                <div class="relative">
                                    <span class="absolute -left-[31px] top-0 w-3.5 h-3.5 bg-gray-300 rounded-full ring-4 ring-white"></span>
                                    <p class="text-gray-500 font-medium text-sm">Belum ada log laporan masuk dari warga.</p>
                                </div>
                            @endforelse

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
        setInterval(() => {
            const date = new Date();
            const timeStr = date.toLocaleTimeString('id-ID', { timeZone: 'Asia/Makassar' }).replace(/:/g, '.');
            const dateStr = date.toLocaleDateString('id-ID', { timeZone: 'Asia/Makassar', day: '2-digit', month: 'short', year: 'numeric' });
            
            document.getElementById('clock').innerText = timeStr + ' WITA';
            
            // Format overlay di kamera (tanggal + jam)
            const camDateElement = document.getElementById('cam-date');
            if(camDateElement) {
                camDateElement.innerText = dateStr + ' • ' + timeStr;
            }
        }, 1000);

        // Efek transisi muncul (Fade Up)
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-6');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
        });
    </script>


<!-- cctv nih -->
<script>

const video = document.getElementById('cctv-video');

const videoSrc = "https://stream-backup.banjarbarukota.go.id/c1_simpang4_arah_cempaka/index.m3u8";

if (Hls.isSupported()) {

    const hls = new Hls({
        liveSyncDurationCount: 3
    });

    hls.loadSource(videoSrc);
    hls.attachMedia(video);

    hls.on(Hls.Events.MANIFEST_PARSED, function () {
        video.play();
    });

} else if (video.canPlayType('application/vnd.apple.mpegurl')) {

    video.src = videoSrc;

    video.addEventListener('loadedmetadata', function () {
        video.play();
    });

}

</script>



</body>
</html>