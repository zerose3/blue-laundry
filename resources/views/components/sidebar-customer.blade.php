<!-- Customer Sidebar -->
<aside class="w-64 bg-slate-900 border-r border-slate-800 hidden lg:flex flex-col h-screen sticky top-0">
    <!-- Logo -->
    <div class="p-6 border-b border-slate-800">
        <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                <i class="fas fa-water text-white text-lg"></i>
            </div>
            <div>
                <p class="font-bold text-white text-lg">Blue Laundry</p>
                <p class="text-xs text-slate-500">Pelanggan</p>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.dashboard') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-home w-5"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Orders -->
        <a href="{{ route('customer.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.orders.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-shopping-bag w-5"></i>
            <span class="font-medium">Pesanan Saya</span>
        </a>

        <!-- New Order -->
        <a href="{{ route('customer.orders.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.orders.create') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-plus w-5"></i>
            <span class="font-medium">Pesan Baru</span>
        </a>

        <!-- Payments -->
        <a href="{{ route('customer.payments.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.payments.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-credit-card w-5"></i>
            <span class="font-medium">Pembayaran</span>
        </a>

        <!-- Profile -->
        <a href="{{ route('customer.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('customer.profile.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-user w-5"></i>
            <span class="font-medium">Profil</span>
        </a>

        <!-- Tracking -->
        <a href="{{ route('tracking') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-slate-800/50 transition-colors">
            <i class="fas fa-map-marker-alt w-5"></i>
            <span class="font-medium">Tracking</span>
        </a>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t border-slate-800">
        <div class="mb-4 px-4 py-3 rounded-lg bg-slate-800/50">
            <p class="text-xs text-slate-500">Logged in as</p>
            <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
        </div>
        <button onclick="document.getElementById('logout-form').submit()" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-slate-800/50 hover:text-red-400 transition-colors">
            <i class="fas fa-sign-out-alt w-5"></i>
            <span class="font-medium">Logout</span>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>
