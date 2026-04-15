<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Center - LPM Banjarbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-white min-h-screen flex">
    
    <div class="hidden lg:flex lg:w-1/2 relative bg-[#1f2328] items-center justify-center overflow-hidden">
                <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('videos/back.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-[#d4a017] rounded-full mix-blend-multiply filter blur-[100px] opacity-20"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-red-600 rounded-full mix-blend-multiply filter blur-[100px] opacity-20"></div>
        
        <div class="relative z-20 text-center px-12 text-white fade-up">
            <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-28 mx-auto mb-8 drop-shadow-2xl hover:scale-105 transition-transform duration-500">
            <h1 class="text-4xl font-extrabold mb-4 leading-tight tracking-wide">
                Command Center<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4a017] to-[#fcd34d]">LPM Banjarbaru</span>
            </h1>
            <p class="text-gray-400 font-medium text-lg max-w-md mx-auto">Pusat kendali operasional, manajemen laporan darurat, dan administrasi kawasan terpadu.</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 relative bg-gray-50 lg:bg-white">
        
        <a href="{{ route('beranda') }}" class="absolute top-8 right-8 flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-[#d4a017] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
            Beranda
        </a>

        <div class="w-full max-w-md">
            <div class="text-center mb-10 lg:hidden">
                <img src="{{ asset('images/logort.png') }}" alt="Logo LPM" class="h-16 mx-auto mb-4 bg-[#1f2328] p-2 rounded-xl">
                <h2 class="text-2xl font-extrabold text-gray-900">Akses Admin</h2>
                <p class="text-sm text-gray-500 font-medium mt-1">Silakan masuk ke Command Center</p>
            </div>

            <div class="hidden lg:block mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Selamat Datang</h2>
                <p class="text-base text-gray-500 font-medium mt-2">Masukkan kredensial akses untuk melanjutkan.</p>
            </div>

            @if(session('error'))
                <div class="bg-red-50 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm font-bold border border-red-100 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Username Administrator</label>
                    <input type="text" name="username" required class="w-full px-5 py-4 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-[#d4a017] focus:border-[#d4a017] outline-none transition-all shadow-sm" placeholder="Masukkan username">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Password Akses</label>
                    <input type="password" name="password" required class="w-full px-5 py-4 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-[#d4a017] focus:border-[#d4a017] outline-none transition-all shadow-sm" placeholder="••••••••">
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-[#c09015] to-[#d4a017] hover:from-[#d4a017] hover:to-[#fcd34d] text-white font-extrabold py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 text-sm uppercase tracking-widest mt-4">
                    Otorisasi Masuk
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 font-medium mt-10">
                Sistem Informasi LPM Banjarbaru © 2026<br>
                Diakses dari IP: {{ request()->ip() }}
            </p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const elements = document.querySelectorAll('.fade-up');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('opacity-100', 'translate-y-0');
                    el.classList.remove('opacity-0', 'translate-y-8');
                }, 100 * index);
            });
        });
    </script>
</body>
</html>