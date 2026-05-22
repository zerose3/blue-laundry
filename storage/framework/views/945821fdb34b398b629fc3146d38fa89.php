

<?php $__env->startSection('title', 'Kelola Pelanggan'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 lg:p-8 space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Pelanggan</h1>
            <p class="text-slate-400 mt-1"><?php echo e($customers->total()); ?> terdaftar</p>
        </div>
        <form action="<?php echo e(route('admin.customers.index')); ?>" method="GET" class="flex gap-2">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama/email..." 
                class="px-4 py-2 rounded-xl bg-slate-800/50 border border-slate-700 text-white focus:border-primary-500 outline-none">
            <button type="submit" class="px-4 py-2 rounded-xl bg-primary-600 text-white hover:bg-primary-500 transition-all">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-800/50 border-b border-slate-700/50">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Pelanggan</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Telepon</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Total Order</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary-900/30 flex items-center justify-center text-primary-400 font-bold">
                                <?php echo e(substr($customer->name, 0, 1)); ?>

                            </div>
                            <div>
                                <p class="font-medium text-white"><?php echo e($customer->name); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($customer->email); ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-300"><?php echo e($customer->phone ?? '-'); ?></td>
                    <td class="px-6 py-4 text-slate-300"><?php echo e($customer->orders_count ?? $customer->orders->count()); ?></td>
                    <td class="px-6 py-4 text-right">
                        <form action="<?php echo e(route('admin.customers.destroy', $customer)); ?>" method="POST" onsubmit="return confirm('Yakin hapus customer ini? Semua order ikut terhapus.')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-slate-700/50">
            <?php echo e($customers->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>