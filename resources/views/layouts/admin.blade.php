<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: { 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' }
                    }
                }
            }
        }
    </script>
    <style>
        .glass { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.1); }
        .glass-card { background: rgba(30, 41, 59, 0.6); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.1); }
    </style>
</head>
<body class="font-sans bg-slate-900 text-slate-200">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 glass border-r border-slate-700/50 flex-shrink-0 hidden lg:flex flex-col">
            <div class="p-6 border-b border-slate-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                        <i class="fas fa-water text-white"></i>
                    </div>
                    <span class="font-bold text-lg text-white">Blue-Laundry</span>
                </div>
            </div>
            
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-th-large w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.orders.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-shopping-bag w-5"></i>
                    <span class="font-medium">Pesanan</span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.services.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-concierge-bell w-5"></i>
                    <span class="font-medium">Layanan</span>
                </a>
                <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.customers.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-users w-5"></i>
                    <span class="font-medium">Pelanggan</span>
                </a>
                <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.payments.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-wallet w-5"></i>
                    <span class="font-medium">Pembayaran</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.reports.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition-all">
                    <i class="fas fa-chart-bar w-5"></i>
                    <span class="font-medium">Laporan</span>
                </a>
            </nav>
            
            <div class="p-4 border-t border-slate-700/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition-all w-full">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="glass border-b border-slate-700/50 h-16 flex items-center justify-between px-6 lg:px-8">
                <button class="lg:hidden text-slate-400 hover:text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-slate-400 hover:text-white transition-colors">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-primary-600 flex items-center justify-center text-white font-bold text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <span class="text-sm font-medium hidden sm:block">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content -->
            <main class="flex-1 overflow-y-auto bg-gradient-to-br from-slate-900 to-slate-800">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
