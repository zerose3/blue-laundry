

<?php $__env->startSection('title', 'Hubungi Kami'); ?>

<?php $__env->startSection('content'); ?>
<section class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="animate-on-scroll">
                <h1 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Hubungi <span class="gradient-text">Kami</span></h1>
                <p class="text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">Ada pertanyaan atau butuh bantuan? Tim kami siap membantu Anda.</p>
                
                <div class="space-y-6">
                    <div class="flex items-center gap-4 p-4 glass-card rounded-2xl">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-phone text-primary-600 dark:text-primary-400"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Telepon</p>
                            <p class="font-semibold text-slate-900 dark:text-white">0851-7747-4703</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 glass-card rounded-2xl">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-envelope text-primary-600 dark:text-primary-400"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Email</p>
                            <p class="font-semibold text-slate-900 dark:text-white">halo@Blue-Laundry.id</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 glass-card rounded-2xl">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-primary-600 dark:text-primary-400"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Alamat</p>
                            <p class="font-semibold text-slate-900 dark:text-white">Jl. Gayungan VII No. 21, Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-3xl p-8 animate-on-scroll">
                <form action="<?php echo e(route('contact.send')); ?>" method="POST" class="space-y-5">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Nama</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Pesan</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all dark:text-white"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg hover:shadow-xl transition-all">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/contact.blade.php ENDPATH**/ ?>