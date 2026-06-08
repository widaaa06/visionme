<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin — VisionMe</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Style Tambahan untuk Efek Gelombang Asimetris di Bawah */
        .wave-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 35vh;
            background-color: #0f172a; /* Slate 900 / Deep Navy */
            border-top-left-radius: 50% 20%;
            border-top-right-radius: 50% 30%;
            transform: scaleX(1.1);
            z-index: 0;
        }
    </style>
</head>
<body class="min-h-screen bg-[#f1f5f9] flex items-center justify-center p-4 md:p-8 antialiased relative overflow-hidden">

    <div class="wave-bg"></div>

    <div class="w-full max-w-4xl bg-white rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(15,23,42,0.15)] border border-slate-100 p-8 md:p-16 relative z-10 overflow-hidden min-h-[550px] flex flex-col justify-between">
        
        <div class="absolute top-[-10%] right-[-5%] w-64 h-64 bg-indigo-50 rounded-full blur-3xl pointer-events-none opacity-70"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-72 h-72 bg-blue-50/70 rounded-full blur-3xl pointer-events-none opacity-70"></div>

        <div class="flex items-center justify-between relative z-10 w-full mb-6">
            <div class="flex items-center gap-2 text-slate-900">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-sm shadow-indigo-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <span class="font-extrabold text-xl tracking-tight text-indigo-950">VisionMe</span>
            </div>
            
            <div class="text-[11px] font-bold tracking-wider uppercase text-indigo-700 bg-indigo-50 px-3 py-1.5 rounded-full border border-indigo-100/50">
                Portal Admin
            </div>
        </div>

        <div class="max-w-md w-full mx-auto my-auto relative z-10 py-6">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                    VisionMe Admin Login
                </h1>
                <p class="text-sm text-slate-400 mt-2 font-medium">
                    Pemeriksaan Mata Mandiri — Panel Manajemen
                </p>
            </div>

            @if (session('status'))
                <div class="mb-5 rounded-2xl bg-emerald-50 border border-emerald-100 p-4 text-xs font-semibold text-emerald-700 text-center animate-fade-in">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="w-full bg-white border @error('email') border-red-300 focus:border-red-500 focus:ring-red-500/10 @else border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/5 @enderror rounded-full pl-12 pr-5 py-3.5 text-sm text-slate-800 placeholder:text-slate-400/90 focus:outline-none transition-all duration-200 font-medium"
                        placeholder="Username atau Email">
                    
                    @error('email')
                        <p class="mt-2 ml-4 text-xs font-medium text-red-500 flex items-center gap-1">
                            <span>•</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v-6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="w-full bg-white border @error('password') border-red-300 focus:border-red-500 focus:ring-red-500/10 @else border-slate-300 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-600/5 @enderror rounded-full pl-12 pr-5 py-3.5 text-sm text-slate-800 placeholder:text-slate-400/90 focus:outline-none transition-all duration-200 font-medium"
                        placeholder="Password">

                    @error('password')
                        <p class="mt-2 ml-4 text-xs font-medium text-red-500 flex items-center gap-1">
                            <span>•</span> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between px-3 pt-1 text-xs">
                    <label for="remember_me" class="flex items-center cursor-pointer select-none">
                        <input type="checkbox" id="remember_me" name="remember" 
                            class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500/20 focus:ring-offset-0 accent-indigo-600 transition cursor-pointer">
                        <span class="ml-2 font-medium text-slate-500">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="font-semibold text-indigo-600 hover:text-indigo-700 transition" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <div class="pt-4 flex flex-col gap-2">
                    <button type="submit" 
                        class="w-full bg-[#1e293b] hover:bg-[#0f172a] text-white font-bold py-3.5 px-6 rounded-full shadow-md hover:shadow-lg active:scale-[0.99] transition-all duration-200 cursor-pointer text-center text-sm tracking-wide">
                        Login
                    </button>
                </div>
            </form>
        </div>

        <div class="w-full text-center relative z-10 mt-6 flex flex-col items-center justify-center gap-2 border-t border-slate-100 pt-6">
    <p class="text-[11px] font-semibold text-slate-400 tracking-wide">
        &copy; {{ date('Y') }} VisionMe. All rights reserved.
    </p>
        </div>

    </div>

</body>
</html>