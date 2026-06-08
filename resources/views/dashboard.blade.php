<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Dashboard Overview — VisionMe</title>

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <style>
            body {
                font-family: "Plus Jakarta Sans", sans-serif;
            }
            /* Custom scrollbar biar lebih smooth & clean */
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            ::-webkit-scrollbar-track {
                background: transparent;
            }
            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        </style>
    </head>
    <body class="bg-[#f4f6fa] text-slate-800 antialiased min-h-screen flex">
        <aside
            class="w-72 bg-[#0b0f19] text-slate-400 p-6 flex flex-col justify-between hidden lg:flex fixed h-full z-20 shadow-xl"
        >
            <div class="space-y-8">
                <div class="flex items-center gap-3 px-2">
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-md shadow-indigo-600/30"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2.5"
                            stroke="currentColor"
                            class="w-5 h-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                            />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="font-extrabold text-lg text-white block tracking-tight"
                            >VisionMe</span
                        >
                        <span
                            class="text-[10px] font-bold text-indigo-400 uppercase tracking-widest"
                            >Admin Panel</span
                        >
                    </div>
                </div>

                <nav class="space-y-1.5">
    <a href="{{ route('dashboard') }}" 
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white font-medium transition duration-200' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
        </svg>
        Dashboard
    </a>
    
    <a href="{{ route('pemeriksaan.index') }}" 
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('pemeriksaan.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white font-medium transition duration-200' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
        Hasil Pemeriksaan
    </a>

    <a href="{{ route('pasien.index') }}" 
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('pasien.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white font-medium transition duration-200' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
        </svg>
        Manajemen Pasien
    </a>

    <a href="{{ route('users.index') }}" 
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white font-medium transition duration-200' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.43l-1.003.754c-.29.218-.443.576-.408.94.004.055.006.112.006.168a1.125 1.125 0 0 1-.006.168c-.035.364.117.722.408.94l1.003.754a1.125 1.125 0 0 1 .26 1.43l-1.296 2.247a1.125 1.125 0 0 1-1.37.49l-1.216-.456a1.125 1.125 0 0 0-1.07.124c-.073.044-.146.087-.22.128-.332.183-.582.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281a1.125 1.125 0 0 0-.646-.87c-.074-.04-.147-.083-.22-.127a1.124 1.124 0 0 0-1.074-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.43l1.004-.754c.29-.218.443-.576.408-.94a1.15 1.15 0 0 1-.006-.168c0-.056-.002-.113-.006-.168-.035-.364-.117-.722-.408-.94l-1.004-.754a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.49l1.216.456c.356.133.751.072 1.076-.124.072-.041.146-.084.218-.128.333-.183.582-.495.645-.869l.214-1.28Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        Manajemen User
    </a>

    <a href="{{ route('obat.index') }}" 
       class="flex items-center gap-3.5 px-4 py-3 rounded-xl font-semibold transition-all {{ request()->routeIs('obat.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white font-medium transition duration-200' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Apotek / Obat
    </a>
</nav>
            </div>

            <div>
                <form action="#" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="w-full flex items-center gap-3.5 px-4 py-3 rounded-xl text-rose-400 hover:bg-rose-500/10 font-semibold transition duration-150 cursor-pointer"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-5 h-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M19.5 12l-3-3m3 3l-3 3m3-3H9"
                            />
                        </svg>
                        Keluar Akun
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 lg:ml-72 flex flex-col min-h-screen">
            <header
                class="bg-white border-b border-slate-200/80 px-8 py-4 flex items-center justify-between sticky top-0 z-10"
            >
                <div class="relative w-80">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.603 10.601Z"
                            />
                        </svg>
                    </span>
                    <input
                        type="text"
                        placeholder="Cari data pasien, rekam medis..."
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-4 py-2 text-sm focus:outline-none focus:border-indigo-500 focus:bg-white transition"
                    />
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <span class="block text-sm font-bold text-slate-900"
                            >Admin User</span
                        >
                        <span class="block text-xs font-semibold text-slate-400"
                            >id: admin@gmail.com</span
                        >
                    </div>
                    <div
                        class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 font-bold shadow-sm"
                    >
                        AU
                    </div>
                </div>
            </header>

            <main class="p-8 space-y-8 flex-1">
    @yield('content')
</main>
        </div>
    </body>
</html>
