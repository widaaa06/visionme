<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionMe Mobile App & Design System Simulator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans for UI, Inter for body -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom VisionMe app stylesheet -->
    <link href="{{ asset('css/visionme-app.css') }}" rel="stylesheet">
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0ea5e9',
                        teal: '#0d9488',
                        cyan: '#06b6d4',
                        navy: '#1e3a8a',
                        slateBg: '#0f172a'
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f0fdfa 0%, #e0f2fe 100%);
        }
        /* Custom scrollbars for design explorer */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.02);
            border-radius: 99px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(14, 165, 233, 0.2);
            border-radius: 99px;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 antialiased p-4 lg:p-8 flex flex-col items-center justify-center">

    <!-- Header bar -->
    <header class="w-full max-w-7xl flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
        <div class="flex items-center gap-3">
            <div class="h-12 w-12 bg-gradient-to-tr from-sky-400 to-teal-500 rounded-2xl flex items-center justify-center text-white shadow-md shadow-sky-400/20">
                <i data-lucide="eye" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 flex items-center gap-2">
                    VisionMe <span class="text-xs font-bold bg-sky-100 text-sky-700 px-2 py-0.5 rounded-full border border-sky-200">UX/UI Prototype</span>
                </h1>
                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Digital Eye Health Platform</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 bg-slate-900 text-white font-bold py-2.5 px-5 rounded-full hover:bg-slate-800 shadow-md hover:shadow-lg transition-all active:scale-[0.98]">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                Go to Admin Portal
            </a>
        </div>
    </header>

    <!-- Main Simulator Container -->
    <main class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Panel: Design System Explorer & Controls (7 cols) -->
        <section class="lg:col-span-7 bg-white/70 backdrop-blur-md border border-white/80 rounded-[2.5rem] shadow-xl p-6 md:p-8 flex flex-col gap-6 h-[780px] custom-scroll overflow-y-auto">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900 tracking-tight mb-1">VisionMe Design System</h2>
                <p class="text-xs text-slate-500">Material Design 3 specifications & parameters optimized for eye health.</p>
            </div>

            <!-- Tab Buttons -->
            <div class="flex gap-2 border-b border-slate-100 pb-2">
                <button onclick="switchTab('spec')" id="tab-spec" class="tab-btn active px-4 py-2 text-xs font-bold text-sky-600 border-b-2 border-sky-500 focus:outline-none">Colors & Typography</button>
                <button onclick="switchTab('flutter')" id="tab-flutter" class="tab-btn px-4 py-2 text-xs font-semibold text-slate-500 hover:text-slate-900 focus:outline-none">Flutter Theme</button>
                <button onclick="switchTab('accessibility')" id="tab-accessibility" class="tab-btn px-4 py-2 text-xs font-semibold text-slate-500 hover:text-slate-900 focus:outline-none">Accessibility</button>
            </div>

            <!-- TAB 1: Specs -->
            <div id="content-spec" class="tab-content flex flex-col gap-6">
                <!-- Color palette -->
                <div>
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Color Swatches</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="bg-gradient-to-br from-sky-400 to-sky-500 color-chip" onclick="navigator.clipboard.writeText('#0ea5e9'); alert('Copied Core Primary hex!')">
                            <span>Primary Core</span>
                            <span class="opacity-75 font-mono text-[9px]">#0EA5E9</span>
                        </div>
                        <div class="bg-gradient-to-br from-teal-500 to-teal-600 color-chip" onclick="navigator.clipboard.writeText('#0d9488'); alert('Copied Primary Teal hex!')">
                            <span>Primary Teal</span>
                            <span class="opacity-75 font-mono text-[9px]">#0D9488</span>
                        </div>
                        <div class="bg-gradient-to-br from-cyan-400 to-cyan-500 color-chip" onclick="navigator.clipboard.writeText('#06b6d4'); alert('Copied Primary Cyan hex!')">
                            <span>Primary Cyan</span>
                            <span class="opacity-75 font-mono text-[9px]">#06B6D4</span>
                        </div>
                        <div class="bg-slate-900 color-chip" onclick="navigator.clipboard.writeText('#0f172a'); alert('Copied Deep Navy hex!')">
                            <span>Deep Navy</span>
                            <span class="opacity-75 font-mono text-[9px]">#0F172A</span>
                        </div>
                    </div>
                </div>

                <!-- Typography Scale -->
                <div>
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Typography Scale</h3>
                    <div class="bg-slate-50 rounded-2xl p-4 flex flex-col gap-4 border border-slate-100">
                        <div class="border-b border-slate-200 pb-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase block mb-1">Display Large (Plus Jakarta Sans)</span>
                            <span class="text-2xl font-extrabold text-navy tracking-tight">Eye Care For You</span>
                        </div>
                        <div class="border-b border-slate-200 pb-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase block mb-1">Headline Medium (Plus Jakarta Sans)</span>
                            <span class="text-lg font-bold text-slate-900">Astigmatism Examination</span>
                        </div>
                        <div class="border-b border-slate-200 pb-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase block mb-1">Title Small (Plus Jakarta Sans)</span>
                            <span class="text-sm font-semibold text-slate-900">Dr. Sarah Wijaya</span>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-slate-400 uppercase block mb-1">Body Medium (Inter)</span>
                            <span class="text-xs text-slate-600 leading-relaxed block">Visual acuity measures the sharpness of your vision. VisionMe offers high-contrast testing using Snellen metrics.</span>
                        </div>
                    </div>
                </div>

                <!-- Material Design 3 Spec -->
                <div>
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">MD3 Component Guidelines</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border border-slate-200 rounded-2xl p-4 bg-white flex flex-col gap-2 shadow-sm">
                            <span class="text-[10px] font-bold text-teal-600 bg-teal-50 px-2 py-0.5 rounded-full w-max">Glassmorphic Card</span>
                            <p class="text-xs text-slate-500">Backdrop-filter blur 12px, border overlays, 16px corner radius. Used for health stats.</p>
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-4 bg-white flex flex-col gap-2 shadow-sm">
                            <span class="text-[10px] font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full w-max">Pill & Chip Controls</span>
                            <p class="text-xs text-slate-500">Fully rounded borders (9999px) for difficulty adjustments, category tags, filters.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: Flutter Theme -->
            <div id="content-flutter" class="tab-content hidden flex flex-col gap-4">
                <div>
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-2">ThemeData Dart Code</h3>
                    <p class="text-xs text-slate-500 mb-2">Drop this theme model into your `lib/theme/app_theme.dart` file for Flutter development.</p>
                    <div class="relative bg-slate-900 text-slate-200 p-4 rounded-2xl font-mono text-[11px] h-72 overflow-y-auto border border-slate-800">
                        <button onclick="copyFlutterCode()" class="absolute top-2.5 right-2.5 bg-slate-800 hover:bg-slate-700 text-white font-bold py-1 px-2.5 rounded-md text-[10px] border border-slate-700">Copy</button>
                        <pre id="flutter-code">
import 'package:flutter/material.dart';

class VisionMeTheme {
  static ThemeData get lightTheme {
    return ThemeData(
      useMaterial3: true,
      fontFamily: 'PlusJakartaSans',
      primaryColor: const Color(0xFF0EA5E9),
      colorScheme: ColorScheme.fromSeed(
        seedColor: const Color(0xFF0EA5E9),
        primary: const Color(0xFF0EA5E9),
        secondary: const Color(0xFF0D9488),
        tertiary: const Color(0xFF06B6D4),
        background: const Color(0xFFF0FDFA),
        surface: Colors.white.withOpacity(0.75),
      ),
      cardTheme: CardTheme(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(16.0),
        ),
        elevation: 2,
      ),
      inputDecorationTheme: InputDecorationTheme(
        filled: true,
        fillColor: Colors.white,
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(24.0),
          borderSide: const BorderSide(color: Color(0xFFCBD5E1)),
        ),
      ),
    );
  }
}
                        </pre>
                    </div>
                </div>
            </div>

            <!-- TAB 3: Accessibility -->
            <div id="content-accessibility" class="tab-content hidden flex flex-col gap-4">
                <div>
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-2">User Persona Accommodations</h3>
                    <div class="flex flex-col gap-3">
                        <div class="bg-sky-50 border border-sky-100 rounded-2xl p-4 flex gap-3 items-start">
                            <i data-lucide="graduation-cap" class="w-5 h-5 text-sky-600 mt-0.5"></i>
                            <div>
                                <h4 class="text-xs font-bold text-sky-800">Students (Fatigue Relief)</h4>
                                <p class="text-[11px] text-sky-700 leading-relaxed mt-1">Implements blue-light rest notifications, dynamic night-mode theme shifts, and interactive eye training exercises.</p>
                            </div>
                        </div>
                        <div class="bg-teal-50 border border-teal-100 rounded-2xl p-4 flex gap-3 items-start">
                            <i data-lucide="briefcase" class="w-5 h-5 text-teal-600 mt-0.5"></i>
                            <div>
                                <h4 class="text-xs font-bold text-teal-800">Adults (Quick Screening)</h4>
                                <p class="text-[11px] text-teal-700 leading-relaxed mt-1">Offers fast astigmatism checkups and digital pharmacy purchases with automatic payment reminders.</p>
                            </div>
                        </div>
                        <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4 flex gap-3 items-start">
                            <i data-lucide="heart" class="w-5 h-5 text-yellow-600 mt-0.5"></i>
                            <div>
                                <h4 class="text-xs font-bold text-yellow-800">Elderly Users (High Accessibility)</h4>
                                <p class="text-[11px] text-yellow-700 leading-relaxed mt-1">Supports large font sizing toggles, high-contrast layouts, and audible instruction capabilities.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-4 mt-2">
                    <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Live Simulation Toggles</h3>
                    <div class="flex flex-wrap gap-3">
                        <button onclick="toggleAccessibilitySize()" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-2 px-4 rounded-xl text-xs flex items-center gap-2">
                            <i data-lucide="zoom-in" class="w-4 h-4"></i>
                            Toggle Large Fonts (Elderly Mode)
                        </button>
                        <button onclick="toggleTheme()" class="bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold py-2 px-4 rounded-xl text-xs flex items-center gap-2">
                            <i data-lucide="moon" class="w-4 h-4"></i>
                            Toggle Night Mode Theme
                        </button>
                        <button onclick="resetSimulator()" class="bg-rose-50 hover:bg-rose-100 text-rose-700 font-bold py-2 px-4 rounded-xl text-xs flex items-center gap-2 border border-rose-100">
                            <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                            Reset App Simulator
                        </button>
                    </div>
                </div>
            </div>

            <!-- Active User Role Indicator -->
            <div class="border-t border-slate-100 pt-4 mt-auto">
                <span class="text-[10px] font-bold text-slate-400 uppercase block mb-2">Simulate Login State</span>
                <div class="flex flex-wrap gap-2">
                    <button onclick="setMockRole('guest')" id="role-btn-guest" class="role-btn active px-3 py-1.5 rounded-full text-xs font-bold bg-sky-100 text-sky-800 border border-sky-200">
                        Guest
                    </button>
                    <button onclick="setMockRole('student')" id="role-btn-student" class="role-btn px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700">
                        Student (Alex Johnson)
                    </button>
                    <button onclick="setMockRole('elderly')" id="role-btn-elderly" class="role-btn px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700">
                        Elderly (Ahmad Hidayat)
                    </button>
                </div>
            </div>
        </section>

        <!-- Right Panel: Smartphone Frame and Interface Simulator (5 cols centered) -->
        <section class="lg:col-span-5 flex justify-center">
            
            <!-- Phone mock chassis -->
            <div id="phone-chassis" class="phone-mockup">
                <div class="phone-notch"></div>
                
                <!-- Phone screen -->
                <div id="phone-screen-container" class="phone-screen">
                    
                    <!-- Status Bar -->
                    <div class="phone-status-bar">
                        <span id="phone-clock">17:48</span>
                        <div class="flex items-center gap-1">
                            <i data-lucide="wifi" class="w-3.5 h-3.5"></i>
                            <i data-lucide="signal" class="w-3.5 h-3.5"></i>
                            <i data-lucide="battery" class="w-3.5 h-3.5"></i>
                        </div>
                    </div>

                    <!-- Main App Content -->
                    <div id="app-viewport" class="phone-content custom-scroll">
                        <!-- Screen views will render dynamically here -->
                    </div>

                    <!-- Bottom Nav -->
                    <nav id="app-bottom-nav" class="phone-bottom-nav">
                        <a onclick="navigateTo('dashboard')" id="nav-dashboard" class="nav-item">
                            <i data-lucide="home"></i>
                            <span>Home</span>
                        </a>
                        <a onclick="navigateTo('test_selection')" id="nav-tests" class="nav-item">
                            <i data-lucide="eye"></i>
                            <span>Tests</span>
                        </a>
                        <a onclick="navigateTo('pharmacy')" id="nav-pharmacy" class="nav-item">
                            <i data-lucide="shopping-bag"></i>
                            <span>Pharmacy</span>
                        </a>
                        <a onclick="navigateTo('test_history')" id="nav-history" class="nav-item">
                            <i data-lucide="clipboard-list"></i>
                            <span>History</span>
                        </a>
                        <a onclick="navigateTo('profile')" id="nav-profile" class="nav-item">
                            <i data-lucide="user"></i>
                            <span>Profile</span>
                        </a>
                    </nav>

                    <!-- Home Indicator -->
                    <div class="phone-home-indicator"></div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer Information -->
    <footer class="mt-12 text-center text-xs text-slate-500 font-semibold max-w-7xl w-full border-t border-slate-200/50 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <span>© 2026 VisionMe Digital Eye Platform. Built with Material 3 Principles.</span>
        <div class="flex gap-4">
            <span class="hover:underline cursor-pointer" onclick="navigateTo('about')">About Us</span>
            <span>|</span>
            <span class="hover:underline cursor-pointer" onclick="switchTab('accessibility')">Accessibility Statement</span>
        </div>
    </footer>

    <!-- Pass backend variables to JS variables -->
    <script>
        window.VISIONME_PRODUCTS = @json($products);
        window.VISIONME_USERS = @json($users);
    </script>

    <!-- Main JS logic containing the simulator state engine -->
    <script>
        // Tab switching logic in design system specs
        function switchTab(tabId) {
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active', 'text-sky-600', 'border-b-2', 'border-sky-500');
                btn.classList.add('text-slate-500');
            });
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            const selectedBtn = document.getElementById('tab-' + tabId);
            selectedBtn.classList.add('active', 'text-sky-600', 'border-b-2', 'border-sky-500');
            selectedBtn.classList.remove('text-slate-500');
            
            document.getElementById('content-' + tabId).classList.remove('hidden');
        }

        function copyFlutterCode() {
            const code = document.getElementById('flutter-code').innerText;
            navigator.clipboard.writeText(code);
            alert('Flutter code copied to clipboard!');
        }

        // Live Clock in Status Bar
        function updateClock() {
            const now = new Date();
            const hrs = String(now.getHours()).padStart(2, '0');
            const mins = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('phone-clock').innerText = `${hrs}:${mins}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>

    <!-- State & Render Handlers for all 25 Screens -->
    <script>
        // APP STATE DATABASE
        const STATE = {
            activeScreen: 'splash',
            user: null, // null = Guest, or User Object
            isGuest: true,
            cart: [],
            currentTest: {
                type: '', // colorblind, acuity, astigmatism
                difficulty: 'Medium',
                currentStep: 0,
                score: 0,
                timer: null,
                timerSeconds: 15,
                answers: []
            },
            testHistory: [
                { id: 101, user_id: 1, kategori_uji: 'Buta Warna', hasil_pengukuran: 'Normal (3/3)', status_medis: 'Normal', tanggal: '2026-06-02' },
                { id: 102, user_id: 1, kategori_uji: 'Snellen Chart', hasil_pengukuran: '20/20 OD/OS', status_medis: 'Normal', tanggal: '2026-05-18' }
            ],
            purchaseHistory: [
                { id: 'TX-9021', tanggal: '2026-05-28', total: 64500.00, status: 'Delivered', produk: 'Insto Dry Eyes + Cendo Xitrol' },
                { id: 'TX-8910', tanggal: '2026-04-12', total: 48500.00, status: 'Delivered', produk: 'Eyevit Eye Vitamin' }
            ],
            bookmarkedArticles: new Set([1, 3]),
            theme: 'light',
            fontSize: 'normal',
            selectedProductId: null,
            selectedArticleId: null,
            paymentTimer: null,
            paymentTimerSeconds: 600,
            activePaymentMethod: 'QRIS',
            checkoutAddress: 'Jalan Pahlawan No. 45, Jakarta Selatan',
            checkoutCourier: 'GrabExpress Instant',
            checkoutPromo: '',
            checkoutDiscount: 0,
            registrationForm: {
                name: '',
                email: '',
                password: '',
                confirm: ''
            }
        };

        // Static Articles list
        const ARTICLES = [
            {
                id: 1,
                title: '5 Habits that Secretly Damage Your Eyesight',
                category: 'Tips',
                readTime: '4 min read',
                author: 'Dr. Evelyn Tan',
                date: 'June 5, 2026',
                summary: 'Working on laptops without breaks and rubbing your eyes are common actions that cause long-term retina strains.',
                image: 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=400&q=80',
                content: 'Prolonged exposure to computer screens causes digital eye strain. Symptoms include dry eyes, headaches, blurred vision, and neck pain. To prevent this, implement the 20-20-20 rule: every 20 minutes, look at something 20 feet away for at least 20 seconds. Also, ensure your work environment has adequate lighting and that your monitor is positioned slightly below eye level. Adequate hydration and lubricating eye drops can also help manage dry eye symptoms efficiently.'
            },
            {
                id: 2,
                title: 'Understanding Color Blindness: Causes & Types',
                category: 'Medical',
                readTime: '6 min read',
                author: 'Dr. Sarah Wijaya',
                date: 'May 24, 2026',
                summary: 'Learn about Deutranopia, Protanopia, and how Ishihara plate tests can help diagnose different visual deficits.',
                image: 'https://images.unsplash.com/photo-1579684389782-64d84b5e901a?auto=format&fit=crop&w=400&q=80',
                content: 'Color blindness is a genetic condition usually passed from mother to son on the X chromosome. It occurs when one or more of the light-sensitive cone cells in the retina fail to respond appropriately to variations in color. The most common type is red-green color blindness. Screening is frequently conducted using Ishihara plates, which consist of circles filled with colored dots forming numbers. Regular eye tests are key for kids to prevent learning difficulties in school.'
            },
            {
                id: 3,
                title: 'Top Vitamins & Nutrition for Optimal Eye Health',
                category: 'Pharmacy',
                readTime: '3 min read',
                author: 'Nutritionist Rian S.',
                date: 'May 12, 2026',
                summary: 'Lutein, Zeaxanthin, Vitamin A, and Bilberry extracts are crucial blocks to nourish your lenses and photoreceptors.',
                image: 'https://images.unsplash.com/photo-1616671285419-f538180f12c7?auto=format&fit=crop&w=400&q=80',
                content: 'Maintaining healthy eyes goes beyond regular visual examinations. Nutrition plays a vital role in protecting your eyes from age-related macular degeneration and cataracts. Vitamin A, Vitamin C, Vitamin E, Zinc, and Omega-3 fatty acids are essential. Lutein and Zeaxanthin, found in dark leafy vegetables, act as natural sunscreens for your retina. Adding bilberry extracts also promotes capillary health in the ocular region.'
            }
        ];

        // Accessibility Toggles
        function toggleAccessibilitySize() {
            const container = document.getElementById('phone-screen-container');
            if (STATE.fontSize === 'normal') {
                STATE.fontSize = 'large';
                container.classList.add('accessibility-large-text');
            } else {
                STATE.fontSize = 'normal';
                container.classList.remove('accessibility-large-text');
            }
        }

        function toggleTheme() {
            const container = document.getElementById('phone-screen-container');
            if (STATE.theme === 'light') {
                STATE.theme = 'dark';
                container.classList.add('bg-slate-900', 'text-white');
                container.classList.remove('bg-f8fafc', 'text-slate-800');
                document.querySelectorAll('.phone-status-bar').forEach(sb => sb.classList.add('text-white'));
                document.querySelectorAll('.phone-status-bar').forEach(sb => sb.classList.remove('text-slate-800'));
            } else {
                STATE.theme = 'light';
                container.classList.remove('bg-slate-900', 'text-white');
                container.classList.add('bg-f8fafc', 'text-slate-800');
                document.querySelectorAll('.phone-status-bar').forEach(sb => sb.classList.remove('text-white'));
                document.querySelectorAll('.phone-status-bar').forEach(sb => sb.classList.add('text-slate-800'));
            }
            renderActiveScreen();
        }

        function resetSimulator() {
            STATE.activeScreen = 'splash';
            STATE.user = null;
            STATE.isGuest = true;
            STATE.cart = [];
            STATE.testHistory = [
                { id: 101, user_id: 1, kategori_uji: 'Buta Warna', hasil_pengukuran: 'Normal (3/3)', status_medis: 'Normal', tanggal: '2026-06-02' },
                { id: 102, user_id: 1, kategori_uji: 'Snellen Chart', hasil_pengukuran: '20/20 OD/OS', status_medis: 'Normal', tanggal: '2026-05-18' }
            ];
            STATE.purchaseHistory = [
                { id: 'TX-9021', tanggal: '2026-05-28', total: 64500.00, status: 'Delivered', produk: 'Insto Dry Eyes + Cendo Xitrol' },
                { id: 'TX-8910', tanggal: '2026-04-12', total: 48500.00, status: 'Delivered', produk: 'Eyevit Eye Vitamin' }
            ];
            setMockRole('guest');
            startAppFlow();
        }

        function setMockRole(role) {
            document.querySelectorAll('.role-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-sky-100', 'text-sky-800', 'border-sky-200');
                btn.classList.add('bg-slate-100', 'text-slate-700');
            });
            
            const activeBtn = document.getElementById('role-btn-' + role);
            if(activeBtn) {
                activeBtn.classList.add('active', 'bg-sky-100', 'text-sky-800', 'border-sky-200');
                activeBtn.classList.remove('bg-slate-100', 'text-slate-700');
            }

            if (role === 'guest') {
                STATE.user = null;
                STATE.isGuest = true;
            } else if (role === 'student') {
                STATE.user = { id: 1, name: 'Alex Johnson', email: 'alex@example.com', role: 'Student' };
                STATE.isGuest = false;
            } else if (role === 'elderly') {
                STATE.user = { id: 2, name: 'Ahmad Hidayat', email: 'ahmad@example.com', role: 'Elderly' };
                STATE.isGuest = false;
            }
            
            if (STATE.activeScreen !== 'splash' && STATE.activeScreen.indexOf('onboarding') === -1) {
                navigateTo('dashboard');
            }
        }

        function navigateTo(screenId) {
            // Guest block rule: Guests can only access splash, onboarding, login, register, articles, article_detail, test_selection, colorblind_test (1 time only), test_result, about
            const guestAllowed = ['splash', 'onboarding1', 'onboarding2', 'onboarding3', 'onboarding4', 'login', 'register', 'dashboard', 'articles', 'article_detail', 'test_selection', 'colorblind_test', 'test_result', 'about'];
            if (STATE.isGuest && !guestAllowed.includes(screenId)) {
                alert('Access Restricted: Guest accounts are restricted to Articles and 1 Color Blindness test. Register to unlock all features!');
                STATE.activeScreen = 'login';
                renderActiveScreen();
                return;
            }

            // Clean active timers
            if (STATE.currentTest.timer) {
                clearInterval(STATE.currentTest.timer);
                STATE.currentTest.timer = null;
            }
            if (STATE.paymentTimer) {
                clearInterval(STATE.paymentTimer);
                STATE.paymentTimer = null;
            }

            STATE.activeScreen = screenId;
            renderActiveScreen();
        }

        function startAppFlow() {
            STATE.activeScreen = 'splash';
            renderActiveScreen();
            
            setTimeout(() => {
                if (STATE.activeScreen === 'splash') {
                    STATE.activeScreen = 'onboarding1';
                    renderActiveScreen();
                }
            }, 2500);
        }

        window.addEventListener('DOMContentLoaded', () => {
            startAppFlow();
        });
    </script>

    <!-- Template Builders -->
    <script>
        function updateRegField(field, val) {
            STATE.registrationForm[field] = val;
        }

        function handleLoginAction() {
            const email = document.getElementById('login-email').value;
            if (email.trim() === '') {
                alert('Please enter a valid email.');
                return;
            }
            if (email.includes('elderly')) {
                setMockRole('elderly');
            } else {
                setMockRole('student');
            }
            navigateTo('dashboard');
        }

        function handleRegisterAction() {
            const form = STATE.registrationForm;
            if (!form.name || !form.email || !form.password) {
                alert('Please fill out all fields.');
                return;
            }
            if (form.password !== form.confirm) {
                alert('Passwords do not match.');
                return;
            }
            alert('Registration successful! Please log in.');
            navigateTo('login');
        }

        function continueAsGuest() {
            setMockRole('guest');
            navigateTo('dashboard');
        }

        // --- 5. HOME DASHBOARD ---
        function renderHomeDashboard() {
            const userName = STATE.isGuest ? 'Guest' : STATE.user.name;
            const healthScore = STATE.isGuest ? '--' : '88';
            const statusLabel = STATE.isGuest ? 'No active screening' : 'Excellent Vision';
            
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <!-- Top User Bar -->
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Welcome back,</span>
                        <h3 class="text-sm font-extrabold text-slate-800">${userName}</h3>
                    </div>
                    <div class="h-8 w-8 rounded-xl bg-gradient-to-tr from-sky-400 to-teal-400 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                        ${userName.substring(0,2).toUpperCase()}
                    </div>
                </div>

                <!-- Score Card (Glassmorphic) -->
                <div class="bg-gradient-to-br from-sky-400 to-teal-500 rounded-3xl p-4 text-white shadow-md relative overflow-hidden flex justify-between items-center">
                    <div class="flex flex-col gap-1 relative z-10">
                        <span class="text-[9px] font-bold text-white/80 uppercase tracking-widest">Eye Health Index</span>
                        <h4 class="text-xl font-black">${healthScore}/100</h4>
                        <span class="text-[10px] bg-white/20 border border-white/30 rounded-full px-2.5 py-0.5 w-max font-semibold">${statusLabel}</span>
                    </div>
                    <div class="h-16 w-16 bg-white/10 rounded-full border border-white/20 flex items-center justify-center relative z-10 cursor-pointer" onclick="navigateTo('performance')">
                        <i data-lucide="trending-up" class="w-7 h-7 text-white"></i>
                    </div>
                    <div class="absolute -bottom-8 -left-8 h-24 w-24 bg-white/5 rounded-full blur-xl"></div>
                </div>

                <!-- Quick Actions Grid -->
                <div>
                    <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider mb-2.5 block">Quick Actions</span>
                    <div class="grid grid-cols-4 gap-2">
                        <button onclick="navigateTo('test_selection')" class="flex flex-col items-center gap-1.5 p-2 bg-white rounded-2xl shadow-sm border border-slate-100 hover:bg-slate-50">
                            <div class="h-8 w-8 bg-sky-50 rounded-xl flex items-center justify-center text-sky-500"><i data-lucide="eye" class="w-4 h-4"></i></div>
                            <span class="text-[9px] font-bold text-slate-600">Exam</span>
                        </button>
                        <button onclick="navigateTo('pharmacy')" class="flex flex-col items-center gap-1.5 p-2 bg-white rounded-2xl shadow-sm border border-slate-100 hover:bg-slate-50">
                            <div class="h-8 w-8 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600"><i data-lucide="shopping-bag" class="w-4 h-4"></i></div>
                            <span class="text-[9px] font-bold text-slate-600">Apothecary</span>
                        </button>
                        <button onclick="navigateTo('articles')" class="flex flex-col items-center gap-1.5 p-2 bg-white rounded-2xl shadow-sm border border-slate-100 hover:bg-slate-50">
                            <div class="h-8 w-8 bg-cyan-50 rounded-xl flex items-center justify-center text-cyan-600"><i data-lucide="book-open" class="w-4 h-4"></i></div>
                            <span class="text-[9px] font-bold text-slate-600">Articles</span>
                        </button>
                        <button onclick="navigateTo('test_history')" class="flex flex-col items-center gap-1.5 p-2 bg-white rounded-2xl shadow-sm border border-slate-100 hover:bg-slate-50">
                            <div class="h-8 w-8 bg-violet-50 rounded-xl flex items-center justify-center text-violet-600"><i data-lucide="clipboard-list" class="w-4 h-4"></i></div>
                            <span class="text-[9px] font-bold text-slate-600">Reports</span>
                        </button>
                    </div>
                </div>

                <!-- Mini Chart Section -->
                <div class="bg-white rounded-3xl p-3 border border-slate-100 shadow-sm flex flex-col gap-2">
                    <div class="flex items-center justify-between px-1">
                        <span class="text-[9px] font-extrabold text-slate-400 uppercase">Acuity Tracking</span>
                        <span class="text-[9px] font-bold text-sky-500">Weekly</span>
                    </div>
                    <!-- SVG Chart -->
                    <svg viewBox="0 0 300 80" class="w-full">
                        <path d="M 10 60 Q 70 30 130 50 T 250 20 T 290 30" fill="none" stroke="#0ea5e9" stroke-width="3" stroke-linecap="round"></path>
                        <circle cx="130" cy="50" r="4" fill="#0d9488" stroke="white" stroke-width="1.5"></circle>
                        <circle cx="250" cy="20" r="4" fill="#0ea5e9" stroke="white" stroke-width="1.5"></circle>
                        <text x="130" y="70" font-family="Plus Jakarta Sans" font-size="8" fill="#94a3b8" text-anchor="middle">May 28</text>
                        <text x="250" y="38" font-family="Plus Jakarta Sans" font-size="8" fill="#94a3b8" text-anchor="middle">Today</text>
                    </svg>
                </div>

                <!-- Latest Article Snippet -->
                <div class="bg-white rounded-3xl p-3 border border-slate-100 shadow-sm flex gap-3 items-center cursor-pointer hover:bg-slate-50" onclick="openArticleDetail(1)">
                    <img src="${ARTICLES[0].image}" class="w-16 h-16 rounded-2xl object-cover bg-slate-100 flex-shrink-0">
                    <div class="flex-1 flex flex-col gap-0.5">
                        <span class="text-[8px] font-bold text-teal-600 uppercase tracking-widest">${ARTICLES[0].category}</span>
                        <h4 class="text-xs font-bold text-slate-800 leading-snug">${ARTICLES[0].title}</h4>
                        <p class="text-[10px] text-slate-400 font-semibold mt-0.5">${ARTICLES[0].readTime}</p>
                    </div>
                </div>
            </div>`;
        }

        // --- 6. EYE TEST SELECTION ---
        function renderEyeTestSelection() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div>
                    <h2 class="text-base font-extrabold text-slate-800 leading-tight">Visual Screening</h2>
                    <p class="text-[10px] text-slate-400 font-semibold mt-0.5">Clinical standard self-examinations</p>
                </div>

                <div class="flex flex-col gap-3">
                    <!-- Colorblind Card -->
                    <div onclick="selectTest('colorblind')" class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex items-center justify-between hover:border-sky-300 hover:bg-sky-50/25 cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500 flex-shrink-0">
                                <i data-lucide="palette" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800">Color Blindness Test</h4>
                                <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Ishihara Plate sequence testing</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>

                    <!-- Acuity Card -->
                    <div onclick="selectTest('acuity')" class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex items-center justify-between hover:border-sky-300 hover:bg-sky-50/25 cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-sky-50 rounded-2xl flex items-center justify-center text-sky-500 flex-shrink-0">
                                <i data-lucide="type" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800">Visual Acuity Test</h4>
                                <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Standard Snellen Chart screening</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>

                    <!-- Astigmatism Card -->
                    <div onclick="selectTest('astigmatism')" class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex items-center justify-between hover:border-sky-300 hover:bg-sky-50/25 cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 flex-shrink-0">
                                <i data-lucide="radial-gradient" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800">Astigmatism Test</h4>
                                <p class="text-[9px] text-slate-400 font-medium leading-relaxed mt-0.5">Radial line contrast wheel chart</p>
                            </div>
                        </div>
                        <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-50 to-sky-50 rounded-3xl p-4 border border-indigo-100/50 mt-auto">
                    <span class="text-[8px] font-extrabold text-indigo-500 uppercase tracking-widest">Medical Disclaimer</span>
                    <p class="text-[9px] text-indigo-800/80 leading-relaxed mt-1">This tool provides screening metrics only. Please consult a qualified ophthalmic doctor for official glasses prescriptions.</p>
                </div>
            </div>`;
        }

        // --- 7. DIFFICULTY SELECTION ---
        function renderDifficultySelection() {
            const testTitle = STATE.currentTest.type === 'colorblind' ? 'Color Blindness' : STATE.currentTest.type === 'acuity' ? 'Visual Acuity' : 'Astigmatism';
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <button onclick="navigateTo('test_selection')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-800">${testTitle}</h2>
                            <p class="text-[10px] text-slate-400 font-semibold">Select test difficulty level</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div onclick="startTest('Easy')" class="bg-white rounded-3xl p-4 border border-slate-100 hover:border-teal-500 cursor-pointer shadow-sm">
                            <span class="text-xs font-bold text-teal-600 block">Easy (Student / Child Mode)</span>
                            <p class="text-[9px] text-slate-400 leading-relaxed mt-1">Slightly larger optical targets. Perfect for children or nearby screening setups (approx. 1 meter distance).</p>
                        </div>
                        <div onclick="startTest('Medium')" class="bg-white rounded-3xl p-4 border border-teal-500 cursor-pointer shadow-sm relative">
                            <span class="absolute top-3 right-3 text-[8px] font-bold bg-teal-100 text-teal-700 px-2 py-0.5 rounded-full">Recommended</span>
                            <span class="text-xs font-bold text-slate-800 block">Medium (Standard Adult)</span>
                            <p class="text-[9px] text-slate-400 leading-relaxed mt-1">Standard clinical test sizing. Requires a flat surface and screen placement at 3 meters distance.</p>
                        </div>
                        <div onclick="startTest('Hard')" class="bg-white rounded-3xl p-4 border border-slate-100 hover:border-teal-500 cursor-pointer shadow-sm">
                            <span class="text-xs font-bold text-indigo-600 block">Hard (Elderly / Advanced)</span>
                            <p class="text-[9px] text-slate-400 leading-relaxed mt-1">Higher-frequency contrast shapes. Scaled for long-distance testing or high acuity analysis (5 meters distance).</p>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        // --- 8. COLOR BLINDNESS TEST ---
        function renderColorblindTest() {
            // plates coordinates: plate index
            const step = STATE.currentTest.currentStep;
            
            // Mock Ishihara plates
            const plates = [
                { number: 12, bg: 'radial-gradient(circle, #f9a8d4 10%, #86efac 90%)', choices: [12, 15, 8, 'I see nothing'] },
                { number: 74, bg: 'radial-gradient(circle, #fbcfe8 20%, #a7f3d0 80%)', choices: [21, 74, 18, 'I see nothing'] },
                { number: 6, bg: 'radial-gradient(circle, #fed7aa 15%, #93c5fd 85%)', choices: [8, 9, 6, 'I see nothing'] }
            ];

            const currentPlate = plates[step];

            return `
            <div class="phone-screen-view p-4 bg-slate-50 justify-between flex-1">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-bold text-slate-400 uppercase">Ishihara Plate ${step + 1}/3</span>
                    <span class="text-xs font-black text-rose-500 bg-rose-50 px-2.5 py-0.5 rounded-full border border-rose-100 flex items-center gap-1">
                        <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                        ${STATE.currentTest.timerSeconds}s
                    </span>
                </div>

                <div class="my-auto py-4">
                    <!-- Ishihara Plate visual mock -->
                    <div class="ishihara-plate" style="background: ${currentPlate.bg}">
                        <!-- Internal dots details mimicking number -->
                        <span class="text-4xl font-extrabold tracking-widest text-slate-800/80 drop-shadow-md select-none">${currentPlate.number}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2.5 pb-2">
                    <span class="text-[9px] font-bold text-slate-400 text-center uppercase tracking-wider">What number do you see in the circle?</span>
                    <div class="grid grid-cols-2 gap-2">
                        ${currentPlate.choices.map(choice => `
                            <button onclick="submitTestAnswer('${choice}', ${currentPlate.number})" class="bg-white border border-slate-200 hover:border-sky-500 hover:bg-sky-50 font-extrabold text-slate-700 py-3 rounded-2xl text-xs transition-all active:scale-[0.98]">
                                ${choice}
                            </button>
                        `).join('')}
                    </div>
                </div>
            </div>`;
        }

        // --- 9. VISUAL ACUITY TEST ---
        function renderAcuityTest() {
            const step = STATE.currentTest.currentStep;
            
            // Mock Snellen lines details
            const lines = [
                { letters: 'E', fontClass: 'text-5xl' },
                { letters: 'F P', fontClass: 'text-3xl' },
                { letters: 'T O Z', fontClass: 'text-2xl' },
                { letters: 'L P E D', fontClass: 'text-xl' },
                { letters: 'P E C F D', fontClass: 'text-xs font-bold' }
            ];

            const currentLine = lines[step];

            return `
            <div class="phone-screen-view p-4 bg-slate-50 justify-between flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[9px] font-bold text-slate-400 uppercase">Snellen Test — Line ${step + 1}/5</span>
                        <p class="text-[9px] font-semibold text-slate-400">Cover your Left eye</p>
                    </div>
                    <span class="text-[10px] font-bold bg-teal-50 text-teal-700 px-2 py-0.5 rounded-full border border-teal-100">Step ${step + 1}</span>
                </div>

                <div class="my-auto py-6 flex flex-col items-center gap-6">
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm w-full flex items-center justify-center h-44 relative">
                        <span class="snellen-letter ${currentLine.fontClass} text-slate-900 tracking-wider">${currentLine.letters}</span>
                    </div>

                    <!-- Zoom control simulator -->
                    <div class="w-full flex items-center gap-3 bg-white px-4 py-2 border border-slate-200 rounded-2xl">
                        <i data-lucide="zoom-out" class="w-4 h-4 text-slate-400"></i>
                        <input type="range" min="1" max="3" value="2" class="w-full h-1 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-sky-500">
                        <i data-lucide="zoom-in" class="w-4 h-4 text-slate-400"></i>
                    </div>
                </div>

                <div class="flex flex-col gap-2 pb-2">
                    <span class="text-[9px] font-bold text-slate-400 text-center uppercase">Confirm the letters you see on screen:</span>
                    <div class="grid grid-cols-2 gap-2">
                        <button onclick="submitAcuity(true)" class="bg-white border border-slate-200 hover:border-sky-500 hover:bg-sky-50 font-bold text-slate-700 py-3 rounded-2xl text-xs">
                            Clearly Visible
                        </button>
                        <button onclick="submitAcuity(false)" class="bg-white border border-slate-200 hover:border-sky-500 hover:bg-sky-50 font-bold text-slate-700 py-3 rounded-2xl text-xs">
                            Blurry / Unclear
                        </button>
                    </div>
                </div>
            </div>`;
        }

        // --- 10. ASTIGMATISM TEST ---
        function renderAstigmatismTest() {
            const step = STATE.currentTest.currentStep;

            return `
            <div class="phone-screen-view p-4 bg-slate-50 justify-between flex-1">
                <div>
                    <span class="text-[9px] font-bold text-slate-400 uppercase">Astigmatism Test — Step ${step + 1}/2</span>
                    <p class="text-[10px] text-slate-500 font-semibold leading-relaxed mt-0.5">Cover one eye, gaze at the center, and inspect the wheel.</p>
                </div>

                <div class="my-auto py-4 flex flex-col items-center">
                    <div class="astigmatism-wheel-container">
                        <!-- Simulated Astigmatism Wheel Chart using SVG -->
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <circle cx="50" cy="50" r="46" fill="none" stroke="#e2e8f0" stroke-width="2"></circle>
                            <!-- Lines radiating every 30 degrees -->
                            <line x1="50" y1="4" x2="50" y2="96" stroke="#1e293b" stroke-width="1.5"></line>
                            <line x1="4" y1="50" x2="96" y2="50" stroke="#1e293b" stroke-width="1.5"></line>
                            
                            <line x1="16.5" y1="16.5" x2="83.5" y2="83.5" stroke="#1e293b" stroke-width="1.5"></line>
                            <line x1="83.5" y1="16.5" x2="16.5" y2="83.5" stroke="#1e293b" stroke-width="1.5"></line>
                            
                            <line x1="27" y1="8" x2="73" y2="92" stroke="#1e293b" stroke-width="1"></line>
                            <line x1="8" y1="27" x2="92" y2="73" stroke="#1e293b" stroke-width="1"></line>
                            <line x1="73" y1="8" x2="27" y2="92" stroke="#1e293b" stroke-width="1"></line>
                            <line x1="92" y1="27" x2="8" y2="73" stroke="#1e293b" stroke-width="1"></line>
                            
                            <!-- Center bullseye -->
                            <circle cx="50" cy="50" r="8" fill="white" stroke="#0ea5e9" stroke-width="2"></circle>
                            <circle cx="50" cy="50" r="3" fill="#1e293b"></circle>
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col gap-2 pb-2">
                    <span class="text-[9px] font-bold text-slate-400 text-center uppercase tracking-wide">Do some lines appear darker or more blurry?</span>
                    <div class="grid grid-cols-2 gap-2">
                        <button onclick="submitAstigmatism(false)" class="bg-white border border-slate-200 hover:border-teal-500 font-bold text-slate-700 py-3 rounded-2xl text-xs">
                            No, All Uniform
                        </button>
                        <button onclick="submitAstigmatism(true)" class="bg-white border border-slate-200 hover:border-teal-500 font-bold text-slate-700 py-3 rounded-2xl text-xs">
                            Yes, Some Darker
                        </button>
                    </div>
                </div>
            </div>`;
        }

        // --- 11. TEST RESULT SCREEN ---
        function renderTestResult() {
            let title = 'Screening Result';
            let summary = 'Your eyes seem normal and healthy.';
            let score = 95;
            let condition = 'Excellent';
            let recommendation = 'Keep up the healthy eye care routines! Limit continuous screen time to 45 minutes.';
            
            // Adjust based on the test that was run
            if (STATE.currentTest.type === 'colorblind') {
                const correct = STATE.currentTest.score;
                title = 'Color Blindness Report';
                score = Math.round((correct / 3) * 100);
                if (correct === 3) {
                    summary = 'Normal Trichromacy';
                    recommendation = 'You answered all Ishihara plates correctly. No red-green color blindness detected.';
                } else {
                    summary = 'Protanopia / Deuteranopia Indication';
                    recommendation = 'Some plates were misidentified. Consider visiting an eye physician for a formal color perception checkup.';
                    condition = 'Deficit Warning';
                }
            } else if (STATE.currentTest.type === 'acuity') {
                const acuityLines = STATE.currentTest.score;
                title = 'Visual Acuity Report';
                if (acuityLines >= 4) {
                    summary = 'Perfect Acuity (20/20)';
                    score = 98;
                } else if (acuityLines >= 2) {
                    summary = 'Mild Myopia (20/40)';
                    score = 75;
                    recommendation = 'Slight blurriness detected at standard scales. Consider eye supplements and resting periodically.';
                    condition = 'Mild Strain';
                } else {
                    summary = 'Moderate Myopia (20/70)';
                    score = 45;
                    recommendation = 'High blurriness. Prescription reading glasses recommended. Schedule a specialist examination.';
                    condition = 'Refractive Issue';
                }
            } else if (STATE.currentTest.type === 'astigmatism') {
                const isAstigmatic = STATE.currentTest.score > 0;
                title = 'Astigmatism Report';
                if (!isAstigmatic) {
                    summary = 'No Astigmatism Detected';
                    score = 96;
                } else {
                    summary = 'Astigmatism Indication';
                    score = 65;
                    recommendation = 'Radial lines appeared uneven. An ocular axis distortion might be present. Please check with an optician.';
                    condition = 'Axis Distortion';
                }
            }

            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <h2 class="text-base font-extrabold text-slate-800">${title}</h2>
                    
                    <!-- Circular Score Gauge -->
                    <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col items-center gap-3">
                        <div class="score-circle">
                            <svg class="w-full h-full" viewBox="0 0 36 36">
                                <path class="stroke-slate-100" stroke-width="3" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                                <path class="stroke-sky-500" stroke-dasharray="${score}, 100" stroke-width="3" stroke-linecap="round" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                            </svg>
                            <div class="score-value">
                                ${score}
                                <span>Index</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="text-xs font-black text-slate-800 block">${summary}</span>
                            <span class="text-[10px] text-slate-400 font-semibold block uppercase tracking-widest mt-0.5">Condition: ${condition}</span>
                        </div>
                    </div>

                    <!-- Recommendations -->
                    <div class="bg-teal-50 border border-teal-100 rounded-3xl p-4 flex gap-3">
                        <i data-lucide="shield-alert" class="w-5 h-5 text-teal-600 flex-shrink-0 mt-0.5"></i>
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-bold text-teal-700 uppercase tracking-widest">Medical Recommendations</span>
                            <p class="text-[10px] text-teal-800 leading-relaxed">${recommendation}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 pb-2">
                    <button onclick="downloadPdfReport()" class="w-full bg-slate-900 text-white font-bold py-3.5 rounded-full text-xs flex items-center justify-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        Download PDF Report
                    </button>
                    <button onclick="shareTestResults()" class="w-full bg-slate-200 text-slate-700 font-bold py-3 rounded-full text-xs flex items-center justify-center gap-2">
                        <i data-lucide="share-2" class="w-4 h-4"></i>
                        Share Results
                    </button>
                    <button onclick="navigateTo('dashboard')" class="w-full bg-sky-500 text-white font-bold py-3 rounded-full text-xs">
                        Return to Dashboard
                    </button>
                </div>
            </div>`;
        }

        // --- 12. EYE HEALTH PERFORMANCE SCREEN ---
        function renderPerformanceScreen() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex items-center gap-2">
                    <button onclick="navigateTo('dashboard')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                    <div>
                        <h2 class="text-sm font-extrabold text-slate-800">Eye Health Analytics</h2>
                        <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Historical Diagnostics</p>
                    </div>
                </div>

                <!-- Stats circles -->
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-1">
                        <span class="text-[9px] font-bold text-slate-400 uppercase">Screen Time</span>
                        <span class="text-base font-black text-sky-500">4.8 Hrs/day</span>
                        <span class="text-[9px] text-emerald-600 font-bold flex items-center gap-0.5"><i data-lucide="trending-down" class="w-3 h-3"></i> Down 12%</span>
                    </div>
                    <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-1">
                        <span class="text-[9px] font-bold text-slate-400 uppercase">Acuity Index</span>
                        <span class="text-base font-black text-teal-600">92 / 100</span>
                        <span class="text-[9px] text-slate-400 font-medium">Last check: 2d ago</span>
                    </div>
                </div>

                <!-- Weekly trends SVG bar chart -->
                <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-3">
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block">Weekly Strain Trends</span>
                    <div class="flex items-end justify-between h-28 pt-2">
                        <!-- SVG chart -->
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-sky-200 rounded-t-md h-12"></div>
                            <span class="text-[8px] font-bold text-slate-400">Mon</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-sky-200 rounded-t-md h-16"></div>
                            <span class="text-[8px] font-bold text-slate-400">Tue</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-teal-500 rounded-t-md h-24"></div>
                            <span class="text-[8px] font-bold text-slate-400">Wed</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-sky-200 rounded-t-md h-10"></div>
                            <span class="text-[8px] font-bold text-slate-400">Thu</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-sky-200 rounded-t-md h-8"></div>
                            <span class="text-[8px] font-bold text-slate-400">Fri</span>
                        </div>
                        <div class="flex flex-col items-center gap-1.5 flex-1">
                            <div class="w-4 bg-sky-300 rounded-t-md h-20"></div>
                            <span class="text-[8px] font-bold text-slate-400">Sat</span>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        // --- 13. ARTICLES SCREEN ---
        function renderArticlesScreen() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div>
                    <h2 class="text-base font-extrabold text-slate-800">Eye Academy</h2>
                    <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Journals and advice by doctors</p>
                </div>

                <!-- Search box -->
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3.5 top-3.5 w-4 h-4 text-slate-400"></i>
                    <input type="text" placeholder="Search eye conditions, drops..." class="w-full bg-white border border-slate-200 rounded-full pl-10 pr-4 py-3 text-xs focus:outline-none">
                </div>

                <!-- Articles Categories pills -->
                <div class="flex gap-2 pb-1 overflow-x-auto">
                    <span class="bg-teal-600 text-white text-[10px] font-bold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer">All Posts</span>
                    <span class="bg-white border border-slate-200 text-slate-600 text-[10px] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer hover:bg-slate-50">Tips</span>
                    <span class="bg-white border border-slate-200 text-slate-600 text-[10px] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer hover:bg-slate-50">Ophthalmology</span>
                    <span class="bg-white border border-slate-200 text-slate-600 text-[10px] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer hover:bg-slate-50">Nutrition</span>
                </div>

                <!-- Articles List -->
                <div class="flex flex-col gap-3">
                    ${ARTICLES.map(art => `
                        <div onclick="openArticleDetail(${art.id})" class="bg-white border border-slate-100 rounded-3xl p-3 shadow-sm flex gap-3 items-center cursor-pointer hover:border-teal-200 hover:bg-teal-50/10">
                            <img src="${art.image}" class="w-16 h-16 rounded-2xl object-cover bg-slate-100 flex-shrink-0">
                            <div class="flex-1 flex flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <span class="text-[8px] font-bold text-teal-600 uppercase tracking-widest">${art.category}</span>
                                    <span class="text-[8px] text-slate-400 font-medium">${art.date}</span>
                                </div>
                                <h4 class="text-xs font-bold text-slate-800 leading-snug">${art.title}</h4>
                                <span class="text-[9px] text-slate-400 mt-1">${art.author} • ${art.readTime}</span>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>`;
        }

        // --- 14. ARTICLE DETAIL SCREEN ---
        function renderArticleDetail() {
            const art = ARTICLES.find(a => a.id === STATE.selectedArticleId) || ARTICLES[0];
            const isBookmarked = STATE.bookmarkedArticles.has(art.id);
            
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex items-center justify-between">
                    <button onclick="navigateTo('articles')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                    <div class="flex gap-2">
                        <button onclick="toggleBookmark(${art.id})" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center">
                            <i data-lucide="bookmark" class="w-4 h-4 ${isBookmarked ? 'fill-sky-500 text-sky-500' : 'text-slate-600'}"></i>
                        </button>
                        <button onclick="shareArticle()" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="share-2" class="w-4 h-4 text-slate-600"></i></button>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <img src="${art.image}" class="w-full h-36 rounded-3xl object-cover shadow-sm bg-slate-100">
                    
                    <div class="flex flex-col gap-1.5">
                        <span class="text-[9px] font-bold text-teal-600 uppercase tracking-widest">${art.category}</span>
                        <h2 class="text-base font-extrabold text-slate-800 leading-snug">${art.title}</h2>
                        
                        <div class="flex items-center gap-2 border-y border-slate-200/50 py-2 mt-1">
                            <div class="h-6 w-6 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 text-[10px] font-black">
                                ${art.author.substring(4,6).toUpperCase()}
                            </div>
                            <div class="flex-1">
                                <span class="text-[9px] font-bold text-slate-800 block">${art.author}</span>
                                <span class="text-[8px] text-slate-400 block">${art.date} • ${art.readTime}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Article Body text -->
                    <p class="text-xs text-slate-600 leading-relaxed font-medium mt-1">
                        ${art.content}
                    </p>
                </div>
            </div>`;
        }

        // --- 15. PHARMACY SCREEN ---
        function renderPharmacyScreen() {
            // Count total items in cart
            const cartCount = STATE.cart.reduce((sum, item) => sum + item.qty, 0);
            
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-slate-800">Apothecary Shop</h2>
                        <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Verified medical eye products</p>
                    </div>
                    <button onclick="navigateTo('cart')" class="h-9 w-9 rounded-full bg-white border border-slate-200 flex items-center justify-center relative shadow-sm">
                        <i data-lucide="shopping-cart" class="w-4 h-4 text-slate-600"></i>
                        ${cartCount > 0 ? `<span class="absolute -top-1 -right-1 bg-rose-500 text-white font-black text-[8px] h-4 w-4 rounded-full flex items-center justify-center shadow-sm animate-pulse">${cartCount}</span>` : ''}
                    </button>
                </div>

                <!-- Product search & category -->
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3.5 top-3.5 w-4 h-4 text-slate-400"></i>
                    <input type="text" placeholder="Search eye drops, vitamin A..." class="w-full bg-white border border-slate-200 rounded-full pl-10 pr-4 py-3 text-xs focus:outline-none">
                </div>

                <div class="flex gap-2 overflow-x-auto pb-1">
                    <span class="bg-teal-600 text-white text-[10px] font-bold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer">Eye Drops</span>
                    <span class="bg-white border border-slate-200 text-slate-600 text-[10px] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer hover:bg-slate-50">Vitamins</span>
                    <span class="bg-white border border-slate-200 text-slate-600 text-[10px] font-semibold px-3 py-1.5 rounded-full whitespace-nowrap cursor-pointer hover:bg-slate-50">Supplements</span>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-2 gap-3">
                    ${window.VISIONME_PRODUCTS.map(prod => `
                        <div class="bg-white border border-slate-100 rounded-3xl p-3 shadow-sm flex flex-col justify-between hover:border-teal-200 hover:shadow-md transition-all cursor-pointer" onclick="openProductDetail(${prod.id})">
                            <div class="flex flex-col gap-2">
                                <div class="bg-slate-50 rounded-2xl h-24 flex items-center justify-center p-2 relative overflow-hidden">
                                    <i data-lucide="pill" class="w-10 h-10 text-teal-600"></i>
                                    <span class="absolute top-2 right-2 text-[8px] bg-emerald-50 text-emerald-700 px-1.5 py-0.5 rounded-full font-bold">In Stock</span>
                                </div>
                                <div class="flex flex-col gap-0.5">
                                    <h4 class="text-xs font-bold text-slate-800 line-clamp-1">${prod.nama}</h4>
                                    <p class="text-[10px] text-slate-400 font-semibold line-clamp-1">${prod.deskripsi || ''}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-3 pt-2 border-t border-slate-100">
                                <span class="text-xs font-black text-slate-800">Rp ${Number(prod.harga).toLocaleString('id-ID')}</span>
                                <button onclick="event.stopPropagation(); addToCart(${prod.id})" class="h-7 w-7 rounded-full bg-teal-600 hover:bg-teal-700 text-white flex items-center justify-center shadow-sm"><i data-lucide="plus" class="w-4 h-4"></i></button>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>`;
        }

        // --- 16. PRODUCT DETAIL SCREEN ---
        function renderProductDetail() {
            const prod = window.VISIONME_PRODUCTS.find(p => p.id === STATE.selectedProductId) || window.VISIONME_PRODUCTS[0];
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <button onclick="navigateTo('pharmacy')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                        <button onclick="navigateTo('cart')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="shopping-cart" class="w-4 h-4 text-slate-600"></i></button>
                    </div>

                    <div class="bg-white rounded-3xl p-6 border border-slate-100 flex items-center justify-center h-44 shadow-sm">
                        <i data-lucide="pill" class="w-20 h-20 text-teal-600"></i>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-black text-slate-800">Rp ${Number(prod.harga).toLocaleString('id-ID')}</span>
                            <span class="text-[8px] font-bold bg-teal-50 text-teal-700 px-2 py-0.5 rounded-full border border-teal-100">Stock: ${prod.stok} items</span>
                        </div>
                        <h2 class="text-base font-extrabold text-slate-800 leading-snug">${prod.nama}</h2>
                        
                        <!-- Description -->
                        <div class="flex flex-col gap-1 mt-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase">Product Description</span>
                            <p class="text-[10px] text-slate-600 leading-relaxed">${prod.deskripsi || 'Premium pharmaceutical-grade eye-care products.'}</p>
                        </div>

                        <!-- Usage Instructions -->
                        <div class="flex flex-col gap-1 mt-2">
                            <span class="text-[9px] font-bold text-slate-400 uppercase">Usage Instruction</span>
                            <p class="text-[10px] text-slate-600 leading-relaxed">Instill 1-2 drops into each eye, 3-4 times daily or as prescribed by a clinical doctor.</p>
                        </div>
                    </div>
                </div>

                <button onclick="addToCart(${prod.id}); navigateTo('cart')" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 rounded-full text-xs shadow-md mt-4">
                    Add to Cart & Checkout
                </button>
            </div>`;
        }

        // --- 17. SHOPPING CART SCREEN ---
        function renderCartScreen() {
            const items = STATE.cart;
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const shipping = subtotal > 0 ? 15000 : 0;
            const total = subtotal + shipping;

            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <button onclick="navigateTo('pharmacy')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-800">Shopping Cart</h2>
                            <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Your selected products</p>
                        </div>
                    </div>

                    <!-- Cart List -->
                    <div class="flex flex-col gap-3">
                        ${items.length === 0 ? `
                            <div class="text-center py-12 flex flex-col items-center gap-2">
                                <i data-lucide="shopping-cart" class="w-8 h-8 text-slate-300"></i>
                                <span class="text-xs font-semibold text-slate-400">Your shopping cart is empty.</span>
                            </div>
                        ` : items.map(item => `
                            <div class="bg-white rounded-3xl p-3 border border-slate-100 shadow-sm flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 bg-slate-50 rounded-2xl flex items-center justify-center text-teal-600"><i data-lucide="pill" class="w-5 h-5"></i></div>
                                    <div>
                                        <h4 class="text-xs font-bold text-slate-800 line-clamp-1">${item.name}</h4>
                                        <span class="text-[10px] font-black text-slate-800 mt-1 block">Rp ${Number(item.price).toLocaleString('id-ID')}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 bg-slate-100 rounded-full px-2 py-1">
                                    <button onclick="changeQty(${item.product_id}, -1)" class="h-5 w-5 bg-white rounded-full flex items-center justify-center font-bold text-xs shadow-sm">-</button>
                                    <span class="text-xs font-bold px-1">${item.qty}</span>
                                    <button onclick="changeQty(${item.product_id}, 1)" class="h-5 w-5 bg-white rounded-full flex items-center justify-center font-bold text-xs shadow-sm">+</button>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <!-- Pricing Summary & Checkout -->
                ${items.length > 0 ? `
                    <div class="flex flex-col gap-3 border-t border-slate-200/50 pt-4 pb-2">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between text-[11px] font-medium text-slate-500">
                                <span>Subtotal</span>
                                <span>Rp ${subtotal.toLocaleString('id-ID')}</span>
                            </div>
                            <div class="flex justify-between text-[11px] font-medium text-slate-500">
                                <span>Shipping Fees</span>
                                <span>Rp ${shipping.toLocaleString('id-ID')}</span>
                            </div>
                            <div class="flex justify-between text-xs font-extrabold text-slate-800 pt-1.5 border-t border-slate-100">
                                <span>Total Payment</span>
                                <span>Rp ${total.toLocaleString('id-ID')}</span>
                            </div>
                        </div>
                        <button onclick="navigateTo('checkout')" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 rounded-full text-xs shadow-md mt-1">
                            Proceed to Checkout
                        </button>
                    </div>
                ` : ''}
            </div>`;
        }

        // --- 18. CHECKOUT SCREEN ---
        function renderCheckoutScreen() {
            const items = STATE.cart;
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const shipping = 15000;
            const total = subtotal + shipping - STATE.checkoutDiscount;

            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <button onclick="navigateTo('cart')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-800">Checkout</h2>
                            <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Confirm order details</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3.5">
                        <!-- Address -->
                        <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-1.5">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block">Shipping Address</span>
                            <span class="text-xs font-bold text-slate-800 block">${STATE.user ? STATE.user.name : 'Recipient'}</span>
                            <p class="text-[10px] text-slate-500 leading-relaxed font-semibold">${STATE.checkoutAddress}</p>
                        </div>

                        <!-- Logistics -->
                        <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-1.5">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block">Logistics Partner</span>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="h-6 w-6 rounded-full bg-teal-50 flex items-center justify-center text-teal-600"><i data-lucide="truck" class="w-4.5 h-4.5"></i></div>
                                    <span class="text-xs font-bold text-slate-800">${STATE.checkoutCourier}</span>
                                </div>
                                <span class="text-[10px] text-slate-400 font-semibold">Rp 15.000</span>
                            </div>
                        </div>

                        <!-- Promo Code input -->
                        <div class="bg-white rounded-3xl p-3 border border-slate-100 shadow-sm flex gap-2">
                            <input type="text" id="promo-code-input" placeholder="Enter Promo Code" value="${STATE.checkoutPromo}" class="flex-1 bg-slate-50 rounded-xl px-3 text-xs focus:outline-none font-bold">
                            <button onclick="applyPromo()" class="bg-slate-900 text-white font-bold py-1.5 px-3.5 rounded-xl text-xs">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 border-t border-slate-200/50 pt-4 pb-2">
                    <div class="flex flex-col gap-1.5">
                        <div class="flex justify-between text-[11px] font-medium text-slate-500">
                            <span>Subtotal</span>
                            <span>Rp ${subtotal.toLocaleString('id-ID')}</span>
                        </div>
                        <div class="flex justify-between text-[11px] font-medium text-slate-500">
                            <span>Shipping Costs</span>
                            <span>Rp ${shipping.toLocaleString('id-ID')}</span>
                        </div>
                        ${STATE.checkoutDiscount > 0 ? `
                            <div class="flex justify-between text-[11px] font-medium text-emerald-600">
                                <span>Discount</span>
                                <span>-Rp ${STATE.checkoutDiscount.toLocaleString('id-ID')}</span>
                            </div>
                        ` : ''}
                        <div class="flex justify-between text-xs font-extrabold text-slate-800 pt-1.5 border-t border-slate-100">
                            <span>Total payment</span>
                            <span>Rp ${total.toLocaleString('id-ID')}</span>
                        </div>
                    </div>
                    <button onclick="startPayment()" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 rounded-full text-xs shadow-md mt-1">
                        Select Payment Method
                    </button>
                </div>
            </div>`;
        }

        // --- 19. PAYMENT SCREEN ---
        function renderPaymentScreen() {
            const items = STATE.cart;
            const subtotal = items.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const total = subtotal + 15000 - STATE.checkoutDiscount;
            
            const minutes = Math.floor(STATE.paymentTimerSeconds / 60);
            const seconds = STATE.paymentTimerSeconds % 60;
            const timerFormatted = `${String(minutes).padStart(2,'0')}:${String(seconds).padStart(2,'0')}`;

            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <button onclick="navigateTo('checkout')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                            <div>
                                <h2 class="text-sm font-extrabold text-slate-800">Secure Payment</h2>
                                <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Select method</p>
                            </div>
                        </div>
                        <span class="text-xs font-black text-rose-500 bg-rose-50 border border-rose-100 px-2 py-0.5 rounded-full">${timerFormatted}</span>
                    </div>

                    <!-- Selected payment method visual -->
                    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col items-center gap-4">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Amount Due</span>
                        <h3 class="text-xl font-black text-slate-800">Rp ${total.toLocaleString('id-ID')}</h3>

                        ${STATE.activePaymentMethod === 'QRIS' ? `
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex flex-col items-center gap-2 w-44">
                                <span class="text-[8px] font-extrabold text-slate-400 tracking-wider">QRIS INTERACTIVE</span>
                                <!-- QRIS mock visual -->
                                <svg class="w-24 h-24" viewBox="0 0 100 100">
                                    <rect width="10" height="10" x="5" y="5" fill="#0f172a"></rect>
                                    <rect width="10" height="10" x="85" y="5" fill="#0f172a"></rect>
                                    <rect width="10" height="10" x="5" y="85" fill="#0f172a"></rect>
                                    <rect width="10" height="10" x="85" y="85" fill="#0f172a"></rect>
                                    
                                    <rect width="6" height="6" x="25" y="15" fill="#0f172a"></rect>
                                    <rect width="6" height="6" x="15" y="45" fill="#0f172a"></rect>
                                    <rect width="6" height="6" x="45" y="25" fill="#0f172a"></rect>
                                    <rect width="6" height="6" x="65" y="55" fill="#0f172a"></rect>
                                    <rect width="6" height="6" x="55" y="75" fill="#0f172a"></rect>
                                    <rect width="6" height="6" x="75" y="45" fill="#0f172a"></rect>
                                </svg>
                                <span class="text-[7px] text-slate-400 font-bold">SCAN WITH DANA, OVO, GOPAY</span>
                            </div>
                        ` : `
                            <div class="bg-teal-50 border border-teal-100 rounded-2xl p-4 text-center w-full">
                                <span class="text-[9px] font-bold text-teal-800 block">Mobile Wallet selected</span>
                                <span class="text-xs font-black text-teal-900 block mt-1">${STATE.activePaymentMethod}</span>
                                <p class="text-[9px] text-teal-700/80 mt-1">Make sure you have active balance. Push notifications will trigger automatically.</p>
                            </div>
                        `}
                    </div>

                    <!-- Payment selections -->
                    <div class="flex flex-col gap-2">
                        <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Payment Methods</span>
                        <div class="grid grid-cols-3 gap-2">
                            <button onclick="setPaymentMethod('QRIS')" class="border ${STATE.activePaymentMethod === 'QRIS' ? 'border-sky-500 bg-sky-50 text-sky-700' : 'border-slate-200 bg-white text-slate-600'} text-[10px] font-bold py-2 rounded-xl">QRIS</button>
                            <button onclick="setPaymentMethod('GoPay')" class="border ${STATE.activePaymentMethod === 'GoPay' ? 'border-sky-500 bg-sky-50 text-sky-700' : 'border-slate-200 bg-white text-slate-600'} text-[10px] font-bold py-2 rounded-xl">GoPay</button>
                            <button onclick="setPaymentMethod('DANA')" class="border ${STATE.activePaymentMethod === 'DANA' ? 'border-sky-500 bg-sky-50 text-sky-700' : 'border-slate-200 bg-white text-slate-600'} text-[10px] font-bold py-2 rounded-xl">DANA</button>
                        </div>
                    </div>
                </div>

                <button onclick="completePayment()" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 rounded-full text-xs shadow-md mt-4">
                    Confirm Secure Payment
                </button>
            </div>`;
        }

        // --- 20. PAYMENT SUCCESS SCREEN ---
        function renderPaymentSuccess() {
            return `
            <div class="phone-screen-view p-6 bg-slate-50 justify-between items-center flex-1">
                <div class="my-auto flex flex-col items-center gap-6">
                    <div class="success-checkmark">
                        <div class="check-icon">
                            <span class="icon-line line-tip"></span>
                            <span class="icon-line line-long"></span>
                        </div>
                    </div>
                    
                    <div class="text-center flex flex-col gap-1.5">
                        <h2 class="text-lg font-black text-slate-800">Payment Completed!</h2>
                        <p class="text-[10px] text-slate-400 font-semibold px-4">Transaction is authenticated. Your order will be prepared by our pharmacist.</p>
                    </div>

                    <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm w-full flex flex-col gap-2">
                        <div class="flex justify-between text-[9px] font-semibold text-slate-400">
                            <span>Transaction ID</span>
                            <span class="font-mono text-slate-800 font-bold">TX-9842-ME</span>
                        </div>
                        <div class="flex justify-between text-[9px] font-semibold text-slate-400">
                            <span>Payment Date</span>
                            <span class="text-slate-800 font-bold">June 8, 2026</span>
                        </div>
                        <div class="flex justify-between text-[9px] font-semibold text-slate-400">
                            <span>Subtotal</span>
                            <span class="text-slate-800 font-bold">Rp 64.500</span>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-col gap-2 pb-2">
                    <button onclick="downloadInvoice()" class="w-full bg-slate-200 text-slate-700 font-bold py-3.5 rounded-full text-xs flex items-center justify-center gap-2">
                        <i data-lucide="file-down" class="w-4 h-4"></i>
                        Download Invoice PDF
                    </button>
                    <button onclick="navigateTo('order_tracking')" class="w-full bg-teal-600 text-white font-bold py-3.5 rounded-full text-xs flex items-center justify-center gap-2">
                        <i data-lucide="truck" class="w-4 h-4"></i>
                        Track Delivery Status
                    </button>
                </div>
            </div>`;
        }

        // --- 21. ORDER TRACKING SCREEN ---
        function renderOrderTracking() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex items-center gap-2">
                    <button onclick="navigateTo('dashboard')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                    <div>
                        <h2 class="text-sm font-extrabold text-slate-800">Track Logistics</h2>
                        <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Order TX-9842-ME</p>
                    </div>
                </div>

                <!-- Vertical timeline representation -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col gap-6 relative">
                    
                    <!-- Timeline vertical line -->
                    <div class="absolute left-[35px] top-[40px] bottom-[40px] w-0.5 bg-slate-200"></div>

                    <!-- Step 1: Confirmed -->
                    <div class="flex gap-4 items-start relative z-10">
                        <div class="h-8 w-8 rounded-full bg-teal-600 text-white flex items-center justify-center border-4 border-white shadow-sm flex-shrink-0">
                            <i data-lucide="check" class="w-4.5 h-4.5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-800">Payment Confirmed</span>
                            <p class="text-[9px] text-slate-400 font-semibold mt-0.5">June 8, 2026 - 17:49</p>
                        </div>
                    </div>

                    <!-- Step 2: Processing -->
                    <div class="flex gap-4 items-start relative z-10">
                        <div class="h-8 w-8 rounded-full bg-sky-500 text-white flex items-center justify-center border-4 border-white shadow-sm flex-shrink-0 animate-pulse">
                            <i data-lucide="loader" class="w-4.5 h-4.5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-800">Processing by Apothecary</span>
                            <p class="text-[9px] text-slate-400 font-semibold mt-0.5">Pharmacist verifying prescriptions</p>
                        </div>
                    </div>

                    <!-- Step 3: Shipped -->
                    <div class="flex gap-4 items-start relative z-10 opacity-50">
                        <div class="h-8 w-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center border-4 border-white shadow-sm flex-shrink-0">
                            <i data-lucide="truck" class="w-4.5 h-4.5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-800">Shipped Out</span>
                            <p class="text-[9px] text-slate-400 font-semibold mt-0.5">Waiting for courier dispatch</p>
                        </div>
                    </div>

                    <!-- Step 4: Delivered -->
                    <div class="flex gap-4 items-start relative z-10 opacity-50">
                        <div class="h-8 w-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center border-4 border-white shadow-sm flex-shrink-0">
                            <i data-lucide="package" class="w-4.5 h-4.5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-800">Delivered</span>
                            <p class="text-[9px] text-slate-400 font-semibold mt-0.5">Package arrived at drop zone</p>
                        </div>
                    </div>
                </div>
            </div>`;
        }

        // --- 22. PURCHASE HISTORY SCREEN ---
        function renderPurchaseHistory() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex gap-4 border-b border-slate-200 pb-2">
                    <span onclick="navigateTo('test_history')" class="text-xs font-semibold text-slate-400 hover:text-slate-800 cursor-pointer">Eye Exams</span>
                    <span class="text-xs font-bold text-sky-600 border-b-2 border-sky-500 pb-2 cursor-pointer">Purchases</span>
                </div>

                <div class="flex flex-col gap-3">
                    ${STATE.purchaseHistory.map(order => `
                        <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex flex-col gap-2.5">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                                <div>
                                    <span class="text-xs font-bold text-slate-800 block">${order.id}</span>
                                    <span class="text-[9px] text-slate-400 font-semibold block">${order.tanggal}</span>
                                </div>
                                <span class="text-[8px] font-bold bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full border border-emerald-100">${order.status}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block">Items</span>
                                    <span class="text-xs text-slate-700 font-semibold">${order.produk}</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest block">Total</span>
                                    <span class="text-xs font-black text-slate-800">Rp ${order.total.toLocaleString('id-ID')}</span>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-1">
                                <button onclick="reorderProducts('${order.produk}')" class="flex-1 bg-sky-50 hover:bg-sky-100 text-sky-700 font-bold py-1.5 rounded-xl text-[10px]">Reorder</button>
                                <button onclick="downloadInvoice()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-1.5 rounded-xl text-[10px]">Invoice</button>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>`;
        }

        // --- 23. TEST HISTORY SCREEN ---
        function renderTestHistory() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1">
                <div class="flex gap-4 border-b border-slate-200 pb-2">
                    <span class="text-xs font-bold text-sky-600 border-b-2 border-sky-500 pb-2 cursor-pointer">Eye Exams</span>
                    <span onclick="navigateTo('purchase_history')" class="text-xs font-semibold text-slate-400 hover:text-slate-800 cursor-pointer">Purchases</span>
                </div>

                <div class="flex flex-col gap-3">
                    ${STATE.testHistory.map(test => `
                        <div class="bg-white rounded-3xl p-4 border border-slate-100 shadow-sm flex items-center justify-between hover:border-teal-200 cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 bg-teal-50 rounded-2xl flex items-center justify-center text-teal-600 flex-shrink-0">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h4 class="text-xs font-bold text-slate-800">${test.kategori_uji}</h4>
                                        <span class="text-[9px] text-slate-400 font-semibold">${test.tanggal}</span>
                                    </div>
                                    <span class="text-[10px] text-teal-600 font-semibold block mt-0.5">Result: ${test.hasil_pengukuran}</span>
                                </div>
                            </div>
                            <span class="text-[9px] font-bold bg-teal-50 text-teal-700 border border-teal-100 px-2.5 py-0.5 rounded-full">${test.status_medis}</span>
                        </div>
                    `).join('')}
                </div>
            </div>`;
        }

        // --- 24. PROFILE SCREEN ---
        function renderProfileScreen() {
            const userName = STATE.user ? STATE.user.name : 'Guest Account';
            const userEmail = STATE.user ? STATE.user.email : 'guest@visionme.com';
            const userRole = STATE.user ? STATE.user.role : 'Standard Guest';

            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="h-12 w-12 rounded-2xl bg-gradient-to-tr from-sky-400 to-teal-400 flex items-center justify-center text-white font-black text-base shadow-sm">
                            ${userName.substring(0,2).toUpperCase()}
                        </div>
                        <div>
                            <h3 class="text-xs font-extrabold text-slate-800">${userName}</h3>
                            <span class="text-[10px] text-slate-400 font-medium block">${userEmail}</span>
                            <span class="text-[8px] bg-sky-100 text-sky-800 border border-sky-200 px-2 py-0.2 rounded-full font-bold inline-block mt-0.5">${userRole}</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2.5">
                        <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Settings</span>
                        
                        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                            <div onclick="alert('Profile editor is simulated! Changes apply dynamically in session.');" class="p-3.5 flex items-center justify-between hover:bg-slate-50 cursor-pointer border-b border-slate-100">
                                <span class="text-xs font-bold text-slate-700">Edit Profile</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                            </div>
                            <div onclick="alert('Password verification checks are operational.');" class="p-3.5 flex items-center justify-between hover:bg-slate-50 cursor-pointer border-b border-slate-100">
                                <span class="text-xs font-bold text-slate-700">Change Password</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                            </div>
                            <div onclick="navigateTo('about')" class="p-3.5 flex items-center justify-between hover:bg-slate-50 cursor-pointer">
                                <span class="text-xs font-bold text-slate-700">About VisionMe</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <button onclick="handleLogoutAction()" class="w-full bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold py-3.5 rounded-full text-xs border border-rose-100 pb-2">
                    Sign Out Account
                </button>
            </div>`;
        }

        // --- 25. ABOUT VISIONME SCREEN ---
        function renderAboutScreen() {
            return `
            <div class="phone-screen-view p-4 bg-slate-50 gap-4 flex-1 justify-between">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <button onclick="navigateTo('profile')" class="h-8 w-8 rounded-full bg-white border border-slate-200 flex items-center justify-center"><i data-lucide="arrow-left" class="w-4 h-4 text-slate-600"></i></button>
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-800">About VisionMe</h2>
                            <p class="text-[9px] text-slate-400 font-semibold uppercase tracking-wider">Corporate specs</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col gap-3">
                        <h4 class="text-xs font-bold text-slate-800">Vision & Mission</h4>
                        <p class="text-[10px] text-slate-500 leading-relaxed font-semibold">VisionMe aims to provide accessible, affordable, and high-quality ophthalmological self-examination tools to everyone, everywhere. We seek to bridge the gap between initial symptom observation and formal medical consultation.</p>
                        
                        <div class="border-t border-slate-100 pt-3 mt-1 flex flex-col gap-1.5">
                            <div class="flex justify-between text-[9px] font-semibold text-slate-400">
                                <span>Version</span>
                                <span class="text-slate-800 font-bold">1.2.0 (Build 902)</span>
                            </div>
                            <div class="flex justify-between text-[9px] font-semibold text-slate-400">
                                <span>Developer Team</span>
                                <span class="text-slate-800 font-bold">VisionMe Startup Lab</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        }
    </script>

    <!-- Interactive JS Actions Engine -->
    <script>
        // Triggered when clicking Article from feed
        function openArticleDetail(id) {
            STATE.selectedArticleId = id;
            navigateTo('article_detail');
        }

        function toggleBookmark(id) {
            if (STATE.bookmarkedArticles.has(id)) {
                STATE.bookmarkedArticles.delete(id);
            } else {
                STATE.bookmarkedArticles.add(id);
            }
            renderActiveScreen();
        }

        function shareArticle() {
            alert('Article share link copied to clipboard!');
        }

        // Triggered when clicking Product from shop
        function openProductDetail(id) {
            STATE.selectedProductId = id;
            navigateTo('product_detail');
        }

        // Add to shopping cart math
        function addToCart(productId) {
            const product = window.VISIONME_PRODUCTS.find(p => p.id === productId);
            if (!product) return;

            const existing = STATE.cart.find(item => item.product_id === productId);
            if (existing) {
                existing.qty++;
            } else {
                STATE.cart.push({
                    product_id: productId,
                    name: product.nama,
                    price: Number(product.harga),
                    qty: 1
                });
            }
            alert(`${product.nama} added to apothecary cart!`);
            renderActiveScreen();
        }

        function changeQty(productId, delta) {
            const item = STATE.cart.find(i => i.product_id === productId);
            if (!item) return;

            item.qty += delta;
            if (item.qty <= 0) {
                STATE.cart = STATE.cart.filter(i => i.product_id !== productId);
            }
            renderActiveScreen();
        }

        // Checkout promo code codes
        function applyPromo() {
            const code = document.getElementById('promo-code-input').value.toUpperCase().trim();
            if (code === 'VISIONME10') {
                const subtotal = STATE.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
                STATE.checkoutDiscount = Math.round(subtotal * 0.1);
                STATE.checkoutPromo = 'VISIONME10';
                alert('Promo applied! 10% discount subtracted.');
            } else {
                alert('Invalid Promo Code. Try "VISIONME10".');
            }
            renderActiveScreen();
        }

        function startPayment() {
            STATE.activeScreen = 'payment';
            STATE.paymentTimerSeconds = 600;
            renderActiveScreen();
            
            // Payment countdown ticker
            if (STATE.paymentTimer) clearInterval(STATE.paymentTimer);
            STATE.paymentTimer = setInterval(() => {
                STATE.paymentTimerSeconds--;
                if (STATE.paymentTimerSeconds <= 0) {
                    clearInterval(STATE.paymentTimer);
                    alert('Payment timer expired. Redirecting to cart.');
                    navigateTo('cart');
                } else {
                    // Quick partial update to timer element without full redraw
                    const timerElem = document.querySelector('.phone-screen-view span.text-rose-500');
                    if (timerElem) {
                        const minutes = Math.floor(STATE.paymentTimerSeconds / 60);
                        const seconds = STATE.paymentTimerSeconds % 60;
                        timerElem.innerText = `${String(minutes).padStart(2,'0')}:${String(seconds).padStart(2,'0')}`;
                    }
                }
            }, 1000);
        }

        function setPaymentMethod(method) {
            STATE.activePaymentMethod = method;
            renderActiveScreen();
        }

        function completePayment() {
            if (STATE.paymentTimer) {
                clearInterval(STATE.paymentTimer);
                STATE.paymentTimer = null;
            }
            
            // Add order transaction to local purchase history database
            const itemsName = STATE.cart.map(item => item.name).join(' + ');
            const subtotal = STATE.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const total = subtotal + 15000 - STATE.checkoutDiscount;
            
            const newOrder = {
                id: 'TX-' + Math.floor(1000 + Math.random() * 9000),
                tanggal: '2026-06-08',
                total: total,
                status: 'Processing',
                produk: itemsName
            };
            STATE.purchaseHistory.unshift(newOrder);

            // Empty cart
            STATE.cart = [];
            STATE.checkoutPromo = '';
            STATE.checkoutDiscount = 0;

            navigateTo('payment_success');
        }

        function downloadInvoice() {
            alert('Downloading tax invoice PDF to system folder.');
        }

        function reorderProducts(itemsString) {
            alert(`Re-adding "${itemsString}" products to apothecary cart.`);
            navigateTo('pharmacy');
        }

        function handleLogoutAction() {
            alert('Signing out from VisionMe secure mobile token.');
            setMockRole('guest');
            navigateTo('login');
        }

        // --- EYE TESTING FLOW ACTIONS ---
        function selectTest(type) {
            STATE.currentTest.type = type;
            navigateTo('difficulty_selection');
        }

        function startTest(difficulty) {
            STATE.currentTest.difficulty = difficulty;
            STATE.currentTest.currentStep = 0;
            STATE.currentTest.score = 0;
            STATE.currentTest.answers = [];
            
            if (STATE.currentTest.type === 'colorblind') {
                STATE.currentTest.timerSeconds = 15;
                navigateTo('colorblind_test');
                startColorblindTimer();
            } else if (STATE.currentTest.type === 'acuity') {
                navigateTo('acuity_test');
            } else if (STATE.currentTest.type === 'astigmatism') {
                navigateTo('astigmatism_test');
            }
        }

        // Colorblind plates timer
        function startColorblindTimer() {
            if (STATE.currentTest.timer) clearInterval(STATE.currentTest.timer);
            STATE.currentTest.timer = setInterval(() => {
                STATE.currentTest.timerSeconds--;
                if (STATE.currentTest.timerSeconds <= 0) {
                    // Auto submit incorrect answer on timeout
                    submitTestAnswer('timeout', 999);
                } else {
                    const timerElem = document.querySelector('.phone-screen-view span.text-rose-500');
                    if (timerElem) {
                        timerElem.innerHTML = `<i data-lucide="clock" class="w-3.5 h-3.5"></i>${STATE.currentTest.timerSeconds}s`;
                        lucide.createIcons();
                    }
                }
            }, 1000);
        }

        function submitTestAnswer(choice, correctNum) {
            if (STATE.currentTest.timer) clearInterval(STATE.currentTest.timer);
            
            // Score tracking
            if (Number(choice) === correctNum) {
                STATE.currentTest.score++;
            }

            STATE.currentTest.currentStep++;
            if (STATE.currentTest.currentStep >= 3) {
                // Done with test, sync to database & navigate
                syncScreeningResults('Buta Warna', `Normal (${STATE.currentTest.score}/3)`);
                navigateTo('test_result');
            } else {
                // Next plate
                STATE.currentTest.timerSeconds = 15;
                renderActiveScreen();
                startColorblindTimer();
            }
        }

        function submitAcuity(visible) {
            if (visible) {
                STATE.currentTest.score++;
            }
            
            STATE.currentTest.currentStep++;
            if (STATE.currentTest.currentStep >= 5) {
                const fraction = STATE.currentTest.score >= 4 ? '20/20' : STATE.currentTest.score >= 2 ? '20/40' : '20/70';
                syncScreeningResults('Snellen Chart', `${fraction} OD/OS`);
                navigateTo('test_result');
            } else {
                renderActiveScreen();
            }
        }

        function submitAstigmatism(isDarker) {
            if (isDarker) {
                STATE.currentTest.score++;
            }

            STATE.currentTest.currentStep++;
            if (STATE.currentTest.currentStep >= 2) {
                const status = STATE.currentTest.score > 0 ? 'Indikasi Astigmatisme' : 'Normal';
                syncScreeningResults('Astigmatisme', status);
                navigateTo('test_result');
            } else {
                renderActiveScreen();
            }
        }

        // Sync test screening results to local state and Laravel backend if user is registered!
        function syncScreeningResults(kategori, hasil) {
            const today = new Date().toISOString().split('T')[0];
            const isPos = hasil.indexOf('Indikasi') !== -1 || hasil.indexOf('Deficit') !== -1 || hasil.indexOf('20/70') !== -1;
            const statusMedis = isPos ? 'Positif' : 'Normal';
            
            const newExam = {
                id: Math.floor(200 + Math.random() * 800),
                user_id: STATE.user ? STATE.user.id : 'guest',
                kategori_uji: kategori,
                hasil_pengukuran: hasil,
                status_medis: statusMedis,
                tanggal: today
            };
            STATE.testHistory.unshift(newExam);

            // POST to backend API in background if logged in
            if (!STATE.isGuest && STATE.user) {
                fetch('/api/pemeriksaan/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({
                        user_id: STATE.user.id,
                        kategori_uji: kategori === 'Buta Warna' ? 'Buta Warna' : (kategori === 'Astigmatisme' || kategori === 'Astigmatism' ? 'Astigmatisme' : 'Snellen Chart'),
                        hasil_pengukuran: hasil,
                        status_medis: statusMedis
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log('Background Sync Completed:', data);
                })
                .catch(err => {
                    console.warn('Backend sync deferred (Local persistence active).', err);
                });
            }
        }

        function downloadPdfReport() {
            alert('Generating clinical report PDF... Download will start automatically.');
        }

        function shareTestResults() {
            alert('Shareable link of eye health index copied to clipboard.');
        }
    </script>
</body>
</html>
