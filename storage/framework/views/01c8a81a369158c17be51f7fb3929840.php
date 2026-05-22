

<?php $__env->startSection('title', 'Tentang Kami'); ?>

<?php $__env->startSection('content'); ?>
<section class="pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary-50 via-white to-blue-50 dark:from-slate-900 dark:via-slate-900 dark:to-primary-900/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Tentang <span class="gradient-text">Blue-Laundry</span></h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Solusi laundry modern untuk gaya hidup urban yang praktis dan berkualitas.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
            <div class="animate-on-scroll">
                <img src="https://images.unsplash.com/photo-1604335399105-a0c585fd81a1?w=600&h=400&fit=crop" alt="About" class="rounded-3xl shadow-2xl w-full">
            </div>
            <div class="space-y-6 animate-on-scroll">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Misi Kami</h2>
                <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Blue-Laundry lahir dari kebutuhan akan layanan laundry yang tidak hanya bersih, tetapi juga transparan dan terjangkau. Kami memadukan teknologi modern dengan pelayanan tradisional yang ramah.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-white dark:bg-slate-800 rounded-2xl shadow-lg">
                        <p class="text-2xl font-bold text-primary-600">2019</p>
                        <p class="text-sm text-slate-500">Tahun Berdiri</p>
                    </div>
                    <div class="p-4 bg-white dark:bg-slate-800 rounded-2xl shadow-lg">
                        <p class="text-2xl font-bold text-primary-600">50+</p>
                        <p class="text-sm text-slate-500">Mitra Driver</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/about.blade.php ENDPATH**/ ?>