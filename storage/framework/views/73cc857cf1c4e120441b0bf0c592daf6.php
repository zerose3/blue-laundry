<nav class="fixed w-full z-50 glass transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <img src="<?php echo e(asset('images/blue_laundry_logo.svg')); ?>"
                     alt="Blue Laundry Logo"
                     width="40" height="40">
                <span class="font-bold text-xl tracking-tight text-slate-800 dark:text-white">
                    Blue <span class="text-primary-600 dark:text-primary-400">Laundry</span>
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="<?php echo e(route('home')); ?>" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-slate-800 transition-all duration-200">Beranda</a>
                <a href="<?php echo e(route('services')); ?>" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-slate-800 transition-all duration-200">Layanan</a>
                <a href="<?php echo e(route('tracking')); ?>" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-slate-800 transition-all duration-200">Tracking</a>
                <a href="<?php echo e(route('about')); ?>" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-slate-800 transition-all duration-200">Tentang</a>
                <a href="<?php echo e(route('contact')); ?>" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-slate-800 transition-all duration-200">Kontak</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-3">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white text-sm font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 hover:-translate-y-0.5 transition-all duration-200">
                            <i class="fas fa-th-large mr-2"></i>Dashboard
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('customer.dashboard')); ?>" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white text-sm font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 hover:-translate-y-0.5 transition-all duration-200">
                            <i class="fas fa-user mr-2"></i>Akun Saya
                        </a>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-slate-100 dark:hover:bg-slate-800 transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="px-5 py-2.5 rounded-xl text-slate-600 dark:text-slate-300 text-sm font-medium hover:text-primary-600 dark:hover:text-primary-400 transition-all duration-200">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white text-sm font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 hover:-translate-y-0.5 transition-all duration-200">
                        Daftar Sekarang
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden glass border-t border-slate-200 dark:border-slate-700">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="<?php echo e(route('home')); ?>" class="block px-4 py-3 rounded-lg text-base font-medium text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-slate-800">Beranda</a>
            <a href="<?php echo e(route('services')); ?>" class="block px-4 py-3 rounded-lg text-base font-medium text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-slate-800">Layanan</a>
            <a href="<?php echo e(route('tracking')); ?>" class="block px-4 py-3 rounded-lg text-base font-medium text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-slate-800">Tracking</a>
            <a href="<?php echo e(route('about')); ?>" class="block px-4 py-3 rounded-lg text-base font-medium text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-slate-800">Tentang</a>
            <a href="<?php echo e(route('contact')); ?>" class="block px-4 py-3 rounded-lg text-base font-medium text-slate-600 dark:text-slate-300 hover:bg-primary-50 dark:hover:bg-slate-800">Kontak</a>
            <div class="pt-4 border-t border-slate-200 dark:border-slate-700 space-y-2">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(auth()->user()->isAdmin() ? route('admin.dashboard') : route('customer.dashboard')); ?>" class="block px-4 py-3 rounded-lg bg-primary-600 text-white text-center font-medium">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="block px-4 py-3 rounded-lg border border-slate-200 dark:border-slate-700 text-center font-medium">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="block px-4 py-3 rounded-lg bg-primary-600 text-white text-center font-medium">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-lg');
        } else {
            navbar.classList.remove('shadow-lg');
        }
    });
</script><?php /**PATH C:\laragon\www\blue-laundry\resources\views/components/navbar.blade.php ENDPATH**/ ?>