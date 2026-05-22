

<?php $__env->startSection('title', 'Layanan - Blue Laundry'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<section class="relative min-h-[400px] flex items-center justify-center bg-gradient-to-br from-primary-50 to-blue-50 dark:from-slate-900 dark:to-primary-900/20 pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Layanan Kami</h1>
        <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Pilih layanan laundry terbaik sesuai kebutuhan Anda dengan harga terjangkau dan kualitas premium</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group glass-card rounded-3xl p-8 hover:scale-[1.02] hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 mb-6 bg-primary-100 dark:bg-primary-900/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-soap text-primary-600 dark:text-primary-400 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3"><?php echo e($service->name); ?></h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed"><?php echo e($service->description); ?></p>

                <div class="space-y-3 mb-8 pb-8 border-b border-slate-200 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-600 dark:text-slate-400 text-sm">Harga per kg</span>
                        <span class="text-2xl font-bold text-primary-600 dark:text-primary-400">Rp <?php echo e(number_format($service->price_per_kg)); ?></span>
                    </div>
                    <?php if($service->estimated_time): ?>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-primary-500"></i>
                        <span class="text-sm text-slate-600 dark:text-slate-400">Estimasi: <?php echo e($service->estimated_time); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <a href="<?php echo e(route('customer.orders.create')); ?>" class="w-full py-3 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium text-center group-hover:bg-primary-600 group-hover:text-white transition-all duration-300 flex items-center justify-center gap-2">
                    <span>Pesan Sekarang</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-12">
                <p class="text-slate-600 dark:text-slate-400">Layanan tidak tersedia saat ini</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-24 bg-white dark:bg-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-slate-900 dark:text-white mb-16">Mengapa Memilih Blue Laundry?</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $__currentLoopData = [
                ['icon' => 'fa-truck', 'title' => 'Pickup & Delivery', 'desc' => 'Gratis jemput dan antar laundry ke rumah Anda'],
                ['icon' => 'fa-tracking', 'title' => 'Tracking Real-time', 'desc' => 'Pantau status laundry Anda kapan saja'],
                ['icon' => 'fa-star', 'title' => 'Kualitas Terjamin', 'desc' => 'Tim profesional berpengalaman lebih dari 5 tahun'],
                ['icon' => 'fa-wallet', 'title' => 'Harga Kompetitif', 'desc' => 'Harga terbaik dengan kualitas premium'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-primary-100 dark:bg-primary-900/30 rounded-full flex items-center justify-center">
                    <i class="fas <?php echo e($item['icon']); ?> text-primary-600 dark:text-primary-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2"><?php echo e($item['title']); ?></h3>
                <p class="text-sm text-slate-600 dark:text-slate-400"><?php echo e($item['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Mulai Mencuci?</h2>
        <p class="text-primary-100 text-lg mb-10">Pesan sekarang dan nikmati kemudahan layanan laundry modern kami</p>
        <a href="<?php echo e(route('customer.orders.create')); ?>" class="inline-block px-10 py-4 bg-white text-primary-700 font-bold rounded-2xl hover:bg-primary-50 transition-colors shadow-xl">
            Buat Pesanan Sekarang
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/services.blade.php ENDPATH**/ ?>