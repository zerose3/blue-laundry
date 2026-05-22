

<?php $__env->startSection('title', 'Kelola Pembayaran'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 lg:p-8 space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Pembayaran</h1>
            <p class="text-slate-400 mt-1">Verifikasi bukti pembayaran customer</p>
        </div>
        <div class="flex gap-2">
            <a href="<?php echo e(route('admin.payments.index')); ?>" class="px-4 py-2 rounded-xl <?php echo e(!request('status') ? 'bg-primary-600 text-white' : 'bg-slate-800 text-slate-300'); ?> text-sm font-medium transition-all">Semua</a>
            <a href="<?php echo e(route('admin.payments.index', ['status' => 'pending'])); ?>" class="px-4 py-2 rounded-xl <?php echo e(request('status') == 'pending' ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-300'); ?> text-sm font-medium transition-all">Pending</a>
            <a href="<?php echo e(route('admin.payments.index', ['status' => 'verified'])); ?>" class="px-4 py-2 rounded-xl <?php echo e(request('status') == 'verified' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300'); ?> text-sm font-medium transition-all">Terverifikasi</a>
        </div>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-800/50 border-b border-slate-700/50">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Order</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Customer</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Jumlah</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Metode</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Status</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <p class="font-mono text-white"><?php echo e($payment->order->order_code); ?></p>
                        <p class="text-xs text-slate-400"><?php echo e($payment->created_at->format('d M Y')); ?></p>
                    </td>
                    <td class="px-6 py-4 text-slate-300"><?php echo e($payment->user->name); ?></td>
                    <td class="px-6 py-4 font-medium text-white">Rp <?php echo e(number_format($payment->amount)); ?></td>
                    <td class="px-6 py-4 text-slate-300 capitalize"><?php echo e($payment->payment_method); ?></td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-lg text-xs font-medium 
                            <?php echo e($payment->status == 'verified' ? 'bg-emerald-500/10 text-emerald-400' : 
                               ($payment->status == 'rejected' ? 'bg-red-500/10 text-red-400' : 'bg-amber-500/10 text-amber-400')); ?>">
                            <?php echo e(ucfirst($payment->status)); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <?php if($payment->status == 'pending'): ?>
                        <div class="flex items-center justify-end gap-2">
                            <form action="<?php echo e(route('admin.payments.verify', $payment)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="px-3 py-2 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 transition-colors text-sm">
                                    <i class="fas fa-check mr-1"></i>Verifikasi
                                </button>
                            </form>
                            <form action="<?php echo e(route('admin.payments.reject', $payment)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="px-3 py-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-colors text-sm">
                                    <i class="fas fa-times mr-1"></i>Tolak
                                </button>
                            </form>
                        </div>
                        <?php endif; ?>
                        <?php if($payment->proof_image): ?>
                        <a href="<?php echo e(asset('storage/' . $payment->proof_image)); ?>" target="_blank" class="text-xs text-primary-400 hover:underline mt-2 inline-block">Lihat Bukti</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-slate-700/50">
            <?php echo e($payments->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>