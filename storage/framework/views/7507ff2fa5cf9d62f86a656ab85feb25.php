<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - Blue Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { primary: { 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' } }
                }
            }
        }
    </script>
    <style>
        .glass { 
            background: rgba(30,41,59,0.7); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255,255,255,0.1); 
        }
        .sidebar-link { 
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            color: #94a3b8;
            transition: all 0.2s;
            margin-bottom: 0.5rem;
        }
        .sidebar-link:hover {
            background: rgba(51,65,85,0.8);
            color: white;
        }
        .sidebar-link.active {
            background: rgba(37,99,235,0.2);
            color: #60a5fa;
            border: 1px solid rgba(37,99,235,0.3);
        }
    </style>
</head>
<meta name="user-initial" content="<?php echo e(substr(auth()->user()->name, 0, 1)); ?>">
<body class="font-sans bg-slate-900 text-slate-200">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 glass border-r border-slate-700/50 flex-shrink-0 hidden lg:flex flex-col h-screen">
            <!-- Logo -->
            <div class="p-5 border-b border-slate-700/50">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/30">
                        <i class="fas fa-water text-white"></i>
                    </div>
                    <div>
                        <span class="font-bold text-lg text-white block leading-tight">Blue Laundry</span>
                    </div>
                </a>
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <a href="<?php echo e(route('customer.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('customer.dashboard') ? 'active' : ''); ?>">
                    <i class="fas fa-th-large w-5 text-center"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="<?php echo e(route('customer.orders.create')); ?>" class="sidebar-link <?php echo e(request()->routeIs('customer.orders.create') ? 'active' : ''); ?>">
                    <i class="fas fa-plus-circle w-5 text-center"></i>
                    <span class="font-medium">Pesan Baru</span>
                </a>
                <a href="<?php echo e(route('customer.orders.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('customer.orders.index') ? 'active' : ''); ?>">
                    <i class="fas fa-shopping-bag w-5 text-center"></i>
                    <span class="font-medium">Pesanan Saya</span>
                </a>
                <a href="<?php echo e(route('customer.ai.chatbot')); ?>" class="sidebar-link <?php echo e(request()->routeIs('customer.ai.*') ? 'active' : ''); ?>">
                    <i class="fas fa-robot w-5 text-center"></i>
                    <span class="font-medium">AI Assistant</span>
                </a>
                <a href="<?php echo e(route('customer.profile.edit')); ?>" class="sidebar-link <?php echo e(request()->routeIs('customer.profile.*') ? 'active' : ''); ?>">
                    <i class="fas fa-user w-5 text-center"></i>
                    <span class="font-medium">Profil</span>
                </a>
            </nav>

            <!-- Footer Sidebar -->
            <div class="p-4 border-t border-slate-700/50">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="sidebar-link w-full justify-center hover:bg-red-500/10 hover:text-red-400" style="margin-bottom: 0;">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span class="font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden bg-gradient-to-br from-slate-900 to-slate-800">
            <!-- Header -->
            <header class="glass border-b border-slate-700/50 h-16 flex items-center justify-between px-6 flex-shrink-0">
                <button class="lg:hidden p-2 text-slate-400 hover:text-white transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center gap-4 ml-auto">
                    <span class="text-sm text-slate-400 hidden sm:block"><?php echo e(auth()->user()->name); ?></span>
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                        <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
                <?php if(session('success')): ?>
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
                        <i class="fas fa-check-circle"></i>
                        <span><?php echo e(session('success')); ?></span>
                    </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-center gap-3">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?php echo e(session('error')); ?></span>
                    </div>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
</div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\blue-laundry\resources\views/layouts/customer.blade.php ENDPATH**/ ?>