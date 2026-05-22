

<?php $__env->startSection('title', 'Riwayat Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto w-full p-2 sm:p-4 lg:p-6 space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Pesanan Saya</h1>
        <a href="<?php echo e(route('customer.orders.create')); ?>" class="px-4 py-2 rounded-xl bg-primary-600 text-white text-sm font-medium hover:bg-primary-500 transition-all">
            <i class="fas fa-plus mr-2"></i>Pesan Baru
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-800/50 border-b border-slate-700/50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Kode</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Layanan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Status</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Total</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-mono text-white"><?php echo e($order->order_code); ?></td>
                        <td class="px-6 py-4 text-slate-300"><?php echo e($order->service->name); ?></td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-lg text-xs font-medium bg-<?php echo e($order->status_color); ?>-500/10 text-<?php echo e($order->status_color); ?>-400">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-white">Rp <?php echo e(number_format($order->total_price)); ?></td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?php echo e(route('customer.orders.show', $order)); ?>" class="text-primary-400 hover:text-primary-300 text-sm font-medium">Detail</a>
                            <?php if($order->payment_status == 'pending'): ?>
                            <a href="<?php echo e(route('customer.payments.upload', $order)); ?>" class="ml-3 text-amber-400 hover:text-amber-300 text-sm font-medium">Bayar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                            Belum ada pesanan. <a href="<?php echo e(route('customer.orders.create')); ?>" class="text-primary-400 hover:underline">Buat sekarang</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-slate-700/50">
            <?php echo e($orders->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/customer/orders/index.blade.php ENDPATH**/ ?>