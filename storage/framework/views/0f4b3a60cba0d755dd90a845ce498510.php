

<?php $__env->startSection('title', 'Edit Order'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6">Edit Order <?php echo e($order->order_code); ?></h1>
    
    <form action="<?php echo e(route('admin.orders.update', $order)); ?>" method="POST" class="bg-slate-800 rounded-2xl p-8 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Layanan</label>
            <select name="service_id" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($service->id); ?>" <?php echo e($order->service_id == $service->id ? 'selected' : ''); ?>>
                    <?php echo e($service->name); ?> - Rp <?php echo e(number_format($service->price_per_kg, 0, ',', '.')); ?>/kg
                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Jumlah (kg)</label>
            <input type="number" name="quantity" step="0.1" value="<?php echo e($order->quantity); ?>" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Pickup</label>
            <textarea name="pickup_address" rows="3" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white"><?php echo e($order->pickup_address); ?></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Delivery</label>
            <textarea name="delivery_address" rows="3" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white"><?php echo e($order->delivery_address); ?></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Catatan</label>
            <textarea name="notes" rows="2" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white"><?php echo e($order->notes); ?></textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 rounded-xl text-white font-semibold hover:bg-blue-700">Simpan Perubahan</button>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="px-6 py-3 bg-slate-700 rounded-xl text-slate-300 hover:bg-slate-600">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>