<<footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                        <i class="fas fa-water text-white"></i>
                    </div>
                    <span class="font-bold text-xl text-slate-900 dark:text-white">Blue<span class="text-primary-600 dark:text-primary-400">Laundry</span></span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 max-w-sm leading-relaxed">
                    Layanan laundry modern dengan teknologi tracking real-time. Bersih, rapi, dan tepat waktu.
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-slate-900 dark:text-white mb-4">Layanan</h4>
                <ul class="space-y-2 text-sm text-slate-500 dark:text-slate-400">
                    <li><a href="<?php echo e(route('services')); ?>" class="hover:text-primary-600 transition-colors">Cuci Kering</a></li>
                    <li><a href="<?php echo e(route('services')); ?>" class="hover:text-primary-600 transition-colors">Cuci Setrika</a></li>
                    <li><a href="<?php echo e(route('services')); ?>" class="hover:text-primary-600 transition-colors">Dry Cleaning</a></li>
                    <li><a href="<?php echo e(route('services')); ?>" class="hover:text-primary-600 transition-colors">Cuci Sepatu</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-slate-900 dark:text-white mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm text-slate-500 dark:text-slate-400">
                    <li class="flex items-center gap-2"><i class="fas fa-phone text-primary-500"></i> 0851-7747-4703</li>
                    <li class="flex items-center gap-2"><i class="fas fa-envelope text-primary-500"></i> halo@blue-laundry.id</li>
                    <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-primary-500"></i> Surabaya, Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-200 dark:border-slate-800 mt-12 pt-8 text-center text-sm text-slate-500 dark:text-slate-400">
            &copy; <?php echo e(date('Y')); ?> Blue Laundry. All rights reserved.
        </div>
    </div>
</footer>
<?php /**PATH C:\laragon\www\blue-laundry\resources\views/components/footer.blade.php ENDPATH**/ ?>