<div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
     class="fixed inset-y-0 left-0 z-50 w-72 bg-[#0b0e14] transition-transform duration-300 ease-in-out md:static md:translate-x-0 flex flex-col justify-between border-r border-white/5 shadow-2xl">
    
    <div>
        <div class="px-8 py-10">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 text-white shadow-lg shadow-indigo-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white tracking-tight leading-tight">VisionMe</h2>
                    <p class="text-[10px] font-bold text-slate-500 tracking-[0.2em] uppercase mt-0.5">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="px-5 space-y-2 mt-2">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-5 py-4 rounded-2xl transition duration-200 {{ Route::is('dashboard') ? 'active-menu' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6 mr-4 {{ Route::is('dashboard') ? 'opacity-90' : 'opacity-50' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/>
                </svg>
                <span class="text-sm {{ Route::is('dashboard') ? 'font-semibold' : 'font-medium' }}">Dashboard Overview</span>
            </a>
            
            <a href="{{ route('pemeriksaan.index') }}" 
               class="flex items-center px-5 py-4 rounded-2xl transition duration-200 {{ Route::is('pemeriksaan.*') ? 'active-menu' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6 mr-4 {{ Route::is('pemeriksaan.*') ? 'opacity-90' : 'opacity-50' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <span class="text-sm {{ Route::is('pemeriksaan.*') ? 'font-semibold' : 'font-medium' }}">Hasil Pemeriksaan</span>
            </a>

            <a href="{{ route('pasien.index') }}" 
    class="flex items-center px-5 py-4 rounded-2xl transition duration-200 {{ Route::is('pasien.*') ? 'active-menu' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
    <svg class="w-6 h-6 mr-4 {{ Route::is('pasien.*') ? 'opacity-90' : 'opacity-50' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
    </svg>
    <span class="text-sm {{ Route::is('pasien.*') ? 'font-semibold' : 'font-medium' }}">Manajemen Pasien</span>
</a>
        </nav>
    </div>

    <div class="px-5 py-8">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center px-5 py-4 text-rose-500 rounded-2xl hover:bg-rose-500/10 transition duration-200 cursor-pointer group">
                <svg class="w-6 h-6 mr-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                <span class="font-bold text-sm tracking-wide">Keluar Akun</span>
            </button>
        </form>
    </div>
</div>