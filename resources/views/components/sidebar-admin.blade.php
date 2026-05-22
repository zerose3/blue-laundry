<!-- Admin Sidebar -->
<aside class="w-64 bg-slate-900 border-r border-slate-800 hidden lg:flex flex-col h-screen sticky top-0">
    <!-- Logo -->
    <div class="p-6 border-b border-slate-800">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                <i class="fas fa-water text-white text-lg"></i>
            </div>
            <div>
                <p class="font-bold text-white text-lg">Blue Laundry</p>
                <p class="text-xs text-slate-500">Admin Panel</p>
            </div>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-chart-line w-5"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Orders -->
        <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.orders.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-shopping-bag w-5"></i>
            <span class="font-medium">Pesanan</span>
        </a>

        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-list w-5"></i>
            <span class="font-medium">Layanan</span>
        </a>

        <!-- Customers -->
        <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.customers.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-users w-5"></i>
            <span class="font-medium">Pelanggan</span>
        </a>

        <!-- Payments -->
        <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.payments.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-credit-card w-5"></i>
            <span class="font-medium">Pembayaran</span>
        </a>

        <!-- Reports -->
        <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.reports.*') ? 'bg-primary-600/20 text-primary-400' : 'text-slate-400 hover:bg-slate-800/50' }} transition-colors">
            <i class="fas fa-file-chart-line w-5"></i>
            <span class="font-medium">Laporan</span>
        </a>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t border-slate-800">
        <button onclick="document.getElementById('logout-form').submit()" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-slate-800/50 hover:text-red-400 transition-colors">
            <i class="fas fa-sign-out-alt w-5"></i>
            <span class="font-medium">Logout</span>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>
