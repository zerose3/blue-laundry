

<?php $__env->startSection('title', 'Lupa Password'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-2 text-center">Lupa Password?</h2>
    <p class="text-sm text-slate-500 dark:text-slate-400 text-center mb-6">Masukkan email Anda dan kami akan kirimkan link reset password.</p>

    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="space-y-5">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                    class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all dark:text-white"
                    placeholder="nama@email.com">
            </div>
        </div>

        <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:-translate-y-0.5 transition-all">
            Kirim Link Reset
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-600 dark:text-slate-400">
        <a href="<?php echo e(route('login')); ?>" class="text-primary-600 font-semibold hover:underline"><i class="fas fa-arrow-left mr-1"></i>Kembali ke login</a>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>