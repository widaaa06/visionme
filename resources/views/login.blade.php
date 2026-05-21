<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin - VisionMe</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-color: #f8fafc; /* Slate 50 (Sangat bersih) */
            background-image: radial-gradient(rgba(59, 130, 246, 0.04) 1px, transparent 0);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col items-center justify-center p-6 antialiased">

    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg border border-slate-100">
        
        <div class="flex flex-col items-center mb-8">
            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-50 text-blue-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">VisionMe Admin</h2>
            <p class="text-sm text-slate-500 mt-1">Pemeriksaan Mata Mandiri</p>
        </div>

        @if (session('status'))
            <div class="mb-5 rounded-xl bg-emerald-50 p-4 text-sm text-emerald-600 border border-emerald-100">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Admin</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full rounded-xl bg-slate-50 border @error('email') border-red-400 focus:border-red-500 focus:ring-red-500/20 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/20 @enderror px-4 py-3 text-slate-900 placeholder-slate-400 focus:ring-2 focus:outline-none transition duration-150"
                    placeholder="nama@email.com">
                
                @error('email')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                    @if (Route::has('password.request'))
                        <a class="text-xs font-medium text-slate-500 hover:text-blue-600 transition duration-150" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>
                
                <input type="password" id="password" name="password" required autocomplete="current-password"
                    class="w-full rounded-xl bg-slate-50 border @error('password') border-red-400 focus:border-red-500 focus:ring-red-500/20 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/20 @enderror px-4 py-3 text-slate-900 placeholder-slate-400 focus:ring-2 focus:outline-none transition duration-150"
                    placeholder="••••••••">

                @error('password')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <label for="remember_me" class="flex items-center cursor-pointer select-none">
                    <input type="checkbox" id="remember_me" name="remember" class="rounded border-slate-300 bg-slate-50 text-blue-600 focus:ring-blue-500/20 w-4 h-4 transition duration-150">
                    <span class="ml-2 text-sm text-slate-600">Ingat perangkat ini</span>
                </label>
            </div>

            <button type="submit" 
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-500 transition duration-150 cursor-pointer shadow-sm shadow-blue-500/10">
                Masuk ke Dashboard
            </button>
        </form>
    </div>

    <div class="mt-8 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} VisionMe. All rights reserved.
    </div>

</body>
</html>