<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaundryApp - Solusi Manajemen Laundry</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] antialiased">
    
    <div class="flex min-h-screen flex-col lg:flex-row">
        
        <div class="lg:w-1/2 bg-blue-600 dark:bg-blue-900 flex items-center justify-center relative overflow-hidden p-8 py-20 lg:py-8">
            <div class="absolute w-96 h-96 bg-blue-500 rounded-full -top-20 -left-20 opacity-50 blur-3xl"></div>
            <div class="absolute w-96 h-96 bg-purple-500 rounded-full -bottom-20 -right-20 opacity-30 blur-3xl"></div>
            
            <div class="relative z-10 w-full max-w-lg">
                <div class="bg-white/10 backdrop-blur-xl p-6 lg:p-8 rounded-[2.5rem] border border-white/20 shadow-2xl">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <div class="bg-white p-1.5 rounded-lg">
                                <i data-lucide="waves" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <span class="text-white font-bold tracking-tight">Status Live</span>
                        </div>
                        <span class="text-white/60 text-xs font-medium px-3 py-1 bg-white/10 rounded-full">Baru saja diperbarui</span>
                    </div>

                    <div class="space-y-4">
                        @foreach(['Cuci Kiloan - Budi', 'Sepatu - Citra', 'Dry Clean - Andi'] as $index => $item)
                        <div class="flex items-center justify-between p-4 bg-white/10 border border-white/10 rounded-2xl">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                                    <i data-lucide="{{ $index == 1 ? 'check-circle' : 'clock' }}" class="w-5 h-5 text-white"></i>
                                </div>
                                <span class="text-sm font-medium text-white">{{ $item }}</span>
                            </div>
                            <span class="text-[10px] uppercase tracking-wider font-bold px-3 py-1 rounded-lg {{ $index == 1 ? 'bg-green-400/20 text-green-300' : 'bg-yellow-400/20 text-yellow-200' }}">
                                {{ $index == 1 ? 'Selesai' : 'Proses' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/2 flex flex-col relative bg-[#FDFDFC] dark:bg-[#0a0a0a]">
            
            <nav class="absolute top-0 right-0 p-6 flex gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-medium border border-[#19140035] dark:border-[#3E3E3A] rounded-xl hover:bg-gray-50 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-medium hover:text-blue-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium bg-[#1b1b18] dark:bg-white text-white dark:text-black rounded-xl hover:opacity-90 transition">Daftar</a>
                        @endif
                    @endauth
                @endif
            </nav>

            <div class="flex-1 flex flex-col justify-center px-8 lg:px-20 py-20">
                <div class="max-w-md">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950 text-blue-600 dark:text-blue-400 text-[11px] font-bold uppercase tracking-wider mb-6">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        Sistem Manajemen Terintegrasi
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold tracking-tight mb-6 leading-tight dark:text-white">
                        Cucian Bersih, <br>
                        <span class="text-[#706f6c] dark:text-[#A1A09A]">Bisnis Makin Rapih.</span>
                    </h1>

                    <p class="text-lg text-gray-500 dark:text-gray-400 mb-10 leading-relaxed">
                        Kelola transaksi laundry, pantau kurir, dan catat keuangan dalam satu platform cerdas yang dirancang untuk efisiensi maksimal.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-[#1b1b18] dark:bg-white text-white dark:text-black font-bold rounded-xl shadow-lg hover:translate-y-[-2px] transition-all flex items-center justify-center gap-2">
                            Mulai Sekarang
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                        <a href="#features" class="px-8 py-4 border border-[#19140035] dark:border-[#3E3E3A] font-bold rounded-xl hover:bg-gray-50 dark:hover:bg-[#161615] transition-all flex items-center justify-center">
                            Lihat Demo
                        </a>
                    </div>

                    <div class="mt-16 pt-8 border-t border-gray-100 dark:border-[#161615] flex items-center gap-6">
                        <div class="flex -space-x-2">
                            @foreach([1,2,3] as $i)
                                <div class="w-8 h-8 rounded-full border-2 border-white dark:border-black bg-gray-200"></div>
                            @endforeach
                        </div>
                        <p class="text-sm text-gray-400 font-medium">Dipercaya oleh 500+ pengusaha laundry</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>