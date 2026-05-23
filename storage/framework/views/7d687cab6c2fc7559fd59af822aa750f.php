

<?php $__env->startSection('title', 'Blue Laundry - Layanan Laundry Modern'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary-50 via-white to-blue-50 dark:from-slate-900 dark:via-slate-900 dark:to-primary-900/20"></div>
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary-400/20 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 left-0 w-72 h-72 bg-blue-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 animate-on-scroll transition-all duration-700">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 text-sm font-medium">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                    </span>
                    Layanan Laundry #1 di Indonesia
                </div>
                
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight text-slate-900 dark:text-white">
                    Laundry Cepat & <br>
                    <span class="gradient-text">Berkualitas</span>
                </h1>
                
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-lg leading-relaxed">
                    Nikmati layanan laundry modern dengan tracking real-time, notifikasi WhatsApp, dan garansi kebersihan. Pesan sekarang, kami jemput & antar!
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo e(route('customer.orders.create')); ?>" class="group px-8 py-4 rounded-2xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-xl shadow-primary-500/30 hover:shadow-2xl hover:shadow-primary-500/40 hover:-translate-y-1 transition-all duration-300 flex items-center gap-3">
                        <span>Pesan Laundry</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="<?php echo e(route('tracking')); ?>" class="px-8 py-4 rounded-2xl border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:border-primary-500 hover:text-primary-600 dark:hover:text-primary-400 transition-all duration-300 flex items-center gap-3">
                        <i class="fas fa-search"></i>
                        <span>Tracking Order</span>
                    </a>
                </div>
                
                <div class="flex items-center gap-6 pt-4">
                    <div class="flex -space-x-3">
                        <img src="https://i.pravatar.cc/150?img=1" class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800" alt="User">
                        <img src="https://i.pravatar.cc/150?img=2" class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800" alt="User">
                        <img src="https://i.pravatar.cc/150?img=3" class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800" alt="User">
                        <div class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800 bg-primary-100 dark:bg-primary-900 flex items-center justify-center text-xs font-bold text-primary-700 dark:text-primary-300">+2k</div>
                    </div>
                    <div class="text-sm">
                        <div class="flex items-center gap-1 text-amber-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-slate-600 dark:text-slate-400 ml-1 font-medium">4.9/5</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-500">Dari 2,000+ pelanggan puas</p>
                    </div>
                </div>
            </div>
            
            <div class="relative lg:h-[600px] flex items-center justify-center animate-on-scroll transition-all duration-700 delay-200">
                <div class="relative w-full max-w-md">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-500 to-blue-500 rounded-3xl blur-2xl opacity-20 transform rotate-6"></div>
                    <img src="https://plus.unsplash.com/premium_photo-1761262862870-fbce5a0a945d?mark=https:%2F%2Fimages.unsplash.com%2Fopengraph%2Flogo.png&mark-w=64&mark-align=top%2Cleft&mark-pad=50&h=630&w=1200&crop=faces%2Cedges&blend-w=1&blend=000000&blend-mode=normal&blend-alpha=10&auto=format&fit=crop&q=60&ixid=M3wxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNzY3OTQxODIyfA&ixlib=rb-4.1.0" alt="Laundry Service" class="relative rounded-3xl shadow-2xl w-full object-cover h-[500px]">
                    
                    <!-- Floating Card -->
                    <div class="absolute -bottom-6 -left-6 glass-card rounded-2xl p-4 shadow-xl animate-float">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Pesanan Selesai</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">BL-20240521-001</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Card -->
                    <div class="absolute -top-6 -right-6 glass-card rounded-2xl p-4 shadow-xl animate-float" style="animation-delay: 1s;">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-truck text-primary-600 dark:text-primary-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 dark:text-white">Dalam Pengantaran</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Estimasi 15 menit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-white dark:bg-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php $__currentLoopData = [
                ['number' => '10K+', 'label' => 'Pesanan Selesai', 'icon' => 'fa-check-circle'],
                ['number' => '50+', 'label' => 'Mitra Driver', 'icon' => 'fa-motorcycle'],
                ['number' => '24/7', 'label' => 'Layanan Aktif', 'icon' => 'fa-clock'],
                ['number' => '4.9', 'label' => 'Rating Pelanggan', 'icon' => 'fa-star'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center p-6 rounded-2xl hover:bg-primary-50 dark:hover:bg-slate-700/50 transition-colors duration-300 animate-on-scroll ">
                <div class="w-14 h-14 mx-auto mb-4 bg-primary-100 dark:bg-primary-900/30 rounded-2xl flex items-center justify-center">
                    <i class="fas <?php echo e($stat['icon']); ?> text-primary-600 dark:text-primary-400 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1"><?php echo e($stat['number']); ?></div>
                <div class="text-sm text-slate-500 dark:text-slate-400"><?php echo e($stat['label']); ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-slate-900"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Layanan Kami</h2>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Pilih layanan laundry sesuai kebutuhan Anda dengan harga terjangkau dan kualitas terbaik</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $services = [
                ['name' => 'Cuci Kering Reguler', 'price' => '8.000', 'unit' => 'kg', 'desc' => 'Layanan standar 24 jam', 'icon' => 'fa-soap', 'color' => 'blue', 'img' => 'icon-cuci-reguler.svg'],
                ['name' => 'Cuci Kering Express', 'price' => '15.000', 'unit' => 'kg', 'desc' => 'Kilat 6 jam selesai', 'icon' => 'fa-bolt', 'color' => 'amber', 'img' => 'icon-cuci-express.svg'],
                ['name' => 'Cuci Setrika', 'price' => '12.000', 'unit' => 'kg', 'desc' => 'Bersih + Rapi', 'icon' => 'fa-shirt', 'color' => 'emerald', 'img' => 'icon-cuci-setrika.svg'],
                ['name' => 'Setrika Saja', 'price' => '6.000', 'unit' => 'kg', 'desc' => 'Setrika pakaian', 'icon' => 'fa-fire', 'color' => 'purple', 'img' => 'icon-setrika.svg'],
                ['name' => 'Dry Cleaning', 'price' => '25.000', 'unit' => 'kg', 'desc' => 'Untuk pakaian premium', 'icon' => 'fa-star', 'color' => 'rose', 'img' => 'icon-dry-cleaning.svg'],
                ['name' => 'Cuci Sepatu', 'price' => '35.000', 'unit' => 'pcs', 'desc' => 'Bersih seperti baru', 'icon' => 'fa-shoe-prints', 'color' => 'orange', 'img' => 'icon-cuci-sepatu.svg'],


            ];


            ?>
            
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group glass-card rounded-3xl p-8 hover:scale-[1.02] hover:shadow-2xl transition-all duration-300 animate-on-scroll">
                <div class="w-16 h-16 mb-6 bg-<?php echo e($service['color']); ?>-100 dark:bg-<?php echo e($service['color']); ?>-900/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <?php if(!empty($service['img'])): ?>
                        <img src="<?php echo e(asset('images/' . $service['img'])); ?>" class="w-10 h-10" alt="<?php echo e($service['name']); ?>">
                    <?php else: ?>
                        <i class="fas <?php echo e($service['icon']); ?> text-<?php echo e($service['color']); ?>-600 dark:text-<?php echo e($service['color']); ?>-400 text-2xl"></i>
                    <?php endif; ?>



                </div>


                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2"><?php echo e($service['name']); ?></h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4"><?php echo e($service['desc']); ?></p>
                <div class="flex items-baseline gap-1 mb-6">
                    <span class="text-2xl font-bold text-primary-600 dark:text-primary-400">Rp <?php echo e($service['price']); ?></span>
                    <span class="text-slate-400 text-sm">/<?php echo e($service['unit']); ?></span>
                </div>
                <a href="<?php echo e(route('customer.orders.create')); ?>" class="block w-full py-3 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium text-center group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                    Pesan Sekarang
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Tracking CTA -->
<section class="py-24 relative">
    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-primary-800"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center animate-on-scroll">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Tracking Laundry Real-Time</h2>
        <p class="text-primary-100 text-lg mb-10 max-w-2xl mx-auto">Masukkan kode order Anda untuk melihat status laundry terkini. Dari proses pickup hingga pengantaran.</p>
        
        <form action="<?php echo e(route('tracking.search')); ?>" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
            <?php echo csrf_field(); ?>
            <div class="flex-1 relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" name="order_code" placeholder="Masukkan kode order (contoh: BL-20240521-001)" 
                    class="w-full pl-12 pr-4 py-4 rounded-2xl bg-white/20 backdrop-blur border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white/30 transition-all">
            </div>
            <button type="submit" class="px-8 py-4 rounded-2xl bg-white text-primary-700 font-bold hover:bg-primary-50 transition-colors shadow-xl">
                Cek Status
            </button>
        </form>
    </div>
</section>

<!-- How It Works -->
<section class="py-24 bg-white dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Cara Kerja</h2>
            <p class="text-slate-600 dark:text-slate-400">4 langkah mudah menggunakan layanan Blue Laundry</p>
        </div>
        
        <div class="grid md:grid-cols-4 gap-8">
            <?php $__currentLoopData = [
                ['step' => '01', 'title' => 'Pesan Online', 'desc' => 'Pilih layanan dan jadwal pickup', 'icon' => 'fa-mobile-alt'],
                ['step' => '02', 'title' => 'Driver Pickup', 'desc' => 'Kami jemput laundry Anda', 'icon' => 'fa-motorcycle'],
                ['step' => '03', 'title' => 'Proses Cuci', 'desc' => 'Laundry dicuci profesional', 'icon' => 'fa-soap'],
                ['step' => '04', 'title' => 'Diantar', 'desc' => 'Laundry rapi diantar ke rumah', 'icon' => 'fa-home'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative text-center animate-on-scroll">
                <?php if(!$loop->last): ?>
                <div class="hidden md:block absolute top-12 left-[60%] w-full h-0.5 bg-gradient-to-r from-primary-300 to-transparent"></div>
                <?php endif; ?>
                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-primary-500 to-primary-700 rounded-3xl flex items-center justify-center shadow-xl shadow-primary-500/30 relative z-10">
                    <i class="fas <?php echo e($step['icon']); ?> text-white text-3xl"></i>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center text-xs font-bold text-primary-600 shadow-md">
                        <?php echo e($step['step']); ?>

                    </div>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2"><?php echo e($step['title']); ?></h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm"><?php echo e($step['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-slate-50 dark:bg-slate-800/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Apa Kata Pelanggan?</h2>
            <p class="text-slate-600 dark:text-slate-400">Testimoni dari pelanggan setia Blue Laundry</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <?php $__currentLoopData = [
                ['name' => 'Wirangga Bintang', 'role' => 'Mahasiswa', 'text' => 'Pelayanan sangat cepat! Laundry saya selesai dalam 6 jam seperti yang dijanjikan. Driver juga ramah.', 'rating' => 5],
                ['name' => 'Joko Widodo', 'role' => 'Mantan Presiden', 'text' => 'Suka banget sama fitur tracking-nya. Bisa tahu status laundry real-time. Recommended!', 'rating' => 5],
                ['name' => 'Emma Zalikhah', 'role' => 'Mahasiswa', 'text' => 'Harga terjangkau, kualitas premium. Pakaian di dry cleaning selalu seperti baru.', 'rating' => 5],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="glass-card rounded-3xl p-8 animate-on-scroll">
                <div class="flex items-center gap-1 text-amber-400 mb-4">
                    <?php for($i = 0; $i < $testi['rating']; $i++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">"<?php echo e($testi['text']); ?>"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900/50 flex items-center justify-center text-primary-600 dark:text-primary-400 font-bold">
                        <?php echo e(substr($testi['name'], 0, 1)); ?>

                    </div>
                    <div>
                        <p class="font-semibold text-slate-900 dark:text-white"><?php echo e($testi['name']); ?></p>
                        <p class="text-sm text-slate-500 dark:text-slate-400"><?php echo e($testi['role']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-white dark:bg-slate-900">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-4">Pertanyaan Umum</h2>
            <p class="text-slate-600 dark:text-slate-400">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
        </div>
        
        <div class="space-y-4">
            <?php $__currentLoopData = [
                ['q' => 'Berapa lama proses laundry?', 'a' => 'Layanan reguler membutuhkan waktu 24 jam. Untuk express, laundry selesai dalam 6 jam. Dry cleaning membutuhkan waktu 72 jam untuk hasil maksimal.'],
                ['q' => 'Apakah ada layanan pickup dan delivery?', 'a' => 'Ya! Kami menyediakan layanan pickup dan delivery gratis untuk area Jakarta dan sekitarnya dengan minimal order tertentu.'],
                ['q' => 'Bagaimana cara pembayaran?', 'a' => 'Kami menerima pembayaran transfer bank, e-wallet (OVO, GoPay, DANA), dan tunai saat pickup/delivery.'],
                ['q' => 'Apakah ada garansi?', 'a' => 'Kami memberikan garansi kebersihan dan kerapian. Jika ada masalah, silakan hubungi kami dalam 24 jam setelah delivery.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="glass-card rounded-2xl overflow-hidden animate-on-scroll">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('i').classList.toggle('rotate-180')" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                    <span class="font-semibold text-slate-900 dark:text-white"><?php echo e($faq['q']); ?></span>
                    <i class="fas fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="hidden px-6 pb-5 text-slate-600 dark:text-slate-400 leading-relaxed">
                    <?php echo e($faq['a']); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-navy-800 to-navy-900"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center animate-on-scroll">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Siap Mencoba Blue Laundry?</h2>
        <p class="text-slate-300 text-lg mb-10 max-w-2xl mx-auto">Daftar sekarang dan dapatkan diskon 20% untuk pesanan pertama Anda. Gratis pickup untuk 3x pertama!</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('register')); ?>" class="px-8 py-4 rounded-2xl bg-primary-500 text-white font-bold hover:bg-primary-400 transition-colors shadow-xl shadow-primary-500/30">
                Daftar Gratis Sekarang
            </a>
            <a href="<?php echo e(route('services')); ?>" class="px-8 py-4 rounded-2xl border border-slate-600 text-slate-300 font-bold hover:border-slate-400 hover:text-white transition-colors">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>

<!-- Chatbot Widget (Home Page) -->
<?php ($isAuthed = auth()->check()); ?>
<div id="chat-widget" class="fixed z-50 cursor-grab" style="right: 1.5rem; bottom: 1.5rem; touch-action: none;" data-authed="<?php echo e($isAuthed ? '1' : '0'); ?>">
    <!-- Tombol Chat -->
    <button
        id="chat-btn"
        type="button"
        class="w-14 h-14 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-2xl hover:scale-110 transition-transform duration-300 flex items-center justify-center relative"
        aria-label="Open chat"
    >
        <i class="fas fa-comment-dots text-xl"></i>
        <span id="chat-badge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full text-xs flex items-center justify-center hidden">1</span>
    </button>

    <!-- Chat Box -->
    <div
        id="chat-box"
        class="hidden absolute bottom-16 right-0 w-[360px] max-h-[500px] bg-slate-900 rounded-2xl shadow-2xl border border-slate-700/50 flex flex-col overflow-hidden"
        aria-live="polite"
    >
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-robot text-white"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm">Blue Laundry AI</h4>
                    <p class="text-blue-200 text-xs">● Online</p>
                </div>
            </div>
            <button onclick="toggleChat()" type="button" class="text-white/70 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Messages -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 min-h-[300px] max-h-[350px]">
            <div class="flex gap-2">
                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-slate-800 rounded-xl rounded-tl-none p-3 max-w-[85%]">
                    <p class="text-white text-sm">Halo! 👋 Saya AI Assistant Blue Laundry. Mau tanya apa?</p>
                </div>
            </div>
        </div>

        <!-- Input -->
        <div class="p-3 bg-slate-800 border-t border-slate-700">
            <form onsubmit="sendChatMessage(event)" class="flex gap-2">
                <input
                    type="text"
                    id="chat-input"
                    class="flex-1 bg-slate-700 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm placeholder-slate-400 focus:outline-none focus:border-blue-500"
                    placeholder="Ketik pesan..."
                    autocomplete="off"
                >
                <button type="submit" class="px-3 py-2 bg-blue-600 rounded-lg text-white hover:bg-blue-700">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function isAuthed() {
        const el = document.getElementById('chat-widget');
        return el && el.getAttribute('data-authed') === '1';
    }

    function toggleChat() {
        const box = document.getElementById('chat-box');
        const btn = document.getElementById('chat-btn');

        if (!box || !btn) return;

        if (box.classList.contains('hidden')) {
            box.classList.remove('hidden');
            box.classList.add('animate-slide-up');
            btn.classList.add('hidden');
        } else {
            box.classList.add('hidden');
            box.classList.remove('animate-slide-up');
            btn.classList.remove('hidden');
        }
    }

    function addChatMessage(text, role) {
        const container = document.getElementById('chat-messages');
        if (!container) return;

        const isUser = role === 'user';

        const html = `
            <div class="flex gap-2 ${isUser ? 'flex-row-reverse' : ''}">
                ${isUser ? `
                    <div class="w-6 h-6 bg-slate-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white text-xs font-bold">${'U'}</span>
                    </div>
                ` : `
                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-white text-xs"></i>
                    </div>
                `}
                <div class="${isUser ? 'bg-blue-600/20 rounded-tr-none' : 'bg-slate-800 rounded-tl-none'} rounded-xl p-3 max-w-[85%]">
                    <p class="text-white text-sm">${escapeHtml(text)}</p>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        container.scrollTop = container.scrollHeight;
    }

    function addChatLoading(id) {
        const container = document.getElementById('chat-messages');
        if (!container) return;

        container.insertAdjacentHTML('beforeend', `
            <div id="${id}" class="flex gap-2">
                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-slate-800 rounded-xl rounded-tl-none p-3">
                    <div class="flex gap-1">
                        <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce"></span>
                        <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce" style="animation-delay:0.1s"></span>
                        <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce" style="animation-delay:0.2s"></span>
                    </div>
                </div>
            </div>
        `);
        container.scrollTop = container.scrollHeight;
    }

    async function sendChatMessage(e) {
        e.preventDefault();
        if (!isAuthed()) {
            addChatMessage('Silakan login terlebih dahulu untuk menggunakan AI Assistant.', 'assistant');
            toggleChat();
            return;
        }

        const input = document.getElementById('chat-input');
        if (!input) return;

        const msg = input.value.trim();
        if (!msg) return;

        addChatMessage(msg, 'user');
        input.value = '';

        const loadingId = 'load-' + Date.now();
        addChatLoading(loadingId);

        try {
            const res = await fetch('<?php echo e(route("customer.ai.chat")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ message: msg })
            });

            const data = await res.json();
            const el = document.getElementById(loadingId);
            if (el) el.remove();

            if (data.success && data.message) {
                addChatMessage(data.message, 'assistant');
            } else {
                addChatMessage('Maaf, saya tidak mengerti.', 'assistant');
            }
        } catch (err) {
            const el = document.getElementById(loadingId);
            if (el) el.remove();
            addChatMessage('Error: AI tidak tersedia.', 'assistant');
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Auto show after 5 seconds (once)
    setTimeout(() => {
        if (!localStorage.getItem('chat_seen')) {
            const box = document.getElementById('chat-box');
            const btn = document.getElementById('chat-btn');
            if (box && btn && box.classList.contains('hidden')) {
                toggleChat();
            }
            localStorage.setItem('chat_seen', 'true');
        }
    }, 5000);

    // ==================== DRAGGABLE CHAT WIDGET (HORIZONTAL ONLY) ====================
    (function(){
        var w = document.getElementById('chat-widget');
        var b = document.getElementById('chat-btn');
        var box = document.getElementById('chat-box');
        if(!w || !b) return;

        var drag = false, moved = false, sx, sy, sl, st;
        var navbarHeight = 80;
        var minY = navbarHeight + 10;

        // Chat box horizontal positioning only
        function positionChatBox(){
            if(!box) return;
            var pos = w.getAttribute('data-position') || 'right';

            // bottom always aligned with button
            box.style.bottom = '0';

            // Size tweaks (fix too-wide / too-tall)
            box.style.width = '320px';
            box.style.maxHeight = '420px';

            // Clear previous positioning
            box.style.left = 'auto';
            box.style.right = 'auto';
            box.style.transform = '';

            // IMPORTANT: if button is on right, chat box must appear on LEFT (shift left)
            // If button is on left, chat box must appear on RIGHT (shift right)
            if(pos === 'right'){
                // align box to the top/left reference, then shift left by (box width + gap)
                box.style.right = '0';
                box.style.left = 'auto';
                box.style.transform = 'translateX(calc(-100% - 10px))';
            } else { // pos === 'left'
                box.style.left = '0';
                box.style.right = 'auto';
                box.style.transform = 'translateX(calc(100% + 10px))';
            }

            // Prevent overflow on small screens
            var vw = window.innerWidth;
            var maxBox = vw - 48; // 24px padding each side approx
            if(maxBox < 320){
                box.style.width = maxBox + 'px';
            }
        }



        function setDefaultPosition(){
            w.style.right = '24px';
            w.style.left = 'auto';
            w.style.bottom = '24px';
            w.style.top = 'auto';
            w.setAttribute('data-position', 'right');
            positionChatBox();
        }

        function snapToEdge(){
            var rect = w.getBoundingClientRect();
            var vw = window.innerWidth;

            var distLeft = rect.left;
            var distRight = vw - rect.right;
            var minDist = Math.min(distLeft, distRight);

            w.style.transition = 'all 0.3s ease-out';

            // keep Y within boundary
            var currentTop = rect.top;
            var maxY = window.innerHeight - w.offsetHeight;
            var snappedTop = Math.max(minY, Math.min(currentTop, maxY));

            if(minDist === distLeft){
                w.style.left = '24px';
                w.style.right = 'auto';
                w.style.top = snappedTop + 'px';
                w.style.bottom = 'auto';
                w.setAttribute('data-position','left');
            } else {
                w.style.right = '24px';
                w.style.left = 'auto';
                w.style.top = snappedTop + 'px';
                w.style.bottom = 'auto';
                w.setAttribute('data-position','right');
            }

            setTimeout(function(){
                w.style.transition = '';
                positionChatBox();
            }, 300);

            localStorage.setItem('chat_pos', JSON.stringify({
                left: w.style.left,
                right: w.style.right,
                top: w.style.top,
                bottom: w.style.bottom,
                position: w.getAttribute('data-position')
            }));
        }

        // Load posisi tersimpan (reset jika top/bottom mode lama)
        var saved = localStorage.getItem('chat_pos');
        if(saved){
            try {
                var p = JSON.parse(saved);
                if(p.position === 'top' || p.position === 'bottom'){
                    setDefaultPosition();
                } else {
                    w.style.left = p.left || 'auto';
                    w.style.right = p.right || '24px';
                    w.style.top = p.top || (minY + 'px');
                    w.style.bottom = 'auto';
                    w.setAttribute('data-position', p.position || 'right');
                    positionChatBox();
                }
            } catch(e){
                setDefaultPosition();
            }
        } else {
            setDefaultPosition();
        }

        function startDrag(e){
            if(box && !box.classList.contains('hidden')) return;

            drag = true;
            moved = false;

            var cx = e.touches ? e.touches[0].clientX : e.clientX;
            var cy = e.touches ? e.touches[0].clientY : e.clientY;

            sx = cx;
            sy = cy;
            sl = w.offsetLeft;
            st = w.offsetTop;

            w.classList.add('dragging');

            e.preventDefault();
            e.stopPropagation();
        }

        function doDrag(e){
            if(!drag) return;

            var cx = e.touches ? e.touches[0].clientX : e.clientX;
            var cy = e.touches ? e.touches[0].clientY : e.clientY;

            var dx = cx - sx;
            var dy = cy - sy;

            if(Math.abs(dx) > 3 || Math.abs(dy) > 3) moved = true;

            var nl = sl + dx;
            var nt = st + dy;

            var maxX = window.innerWidth - w.offsetWidth;
            var maxY = window.innerHeight - w.offsetHeight;

            // X free
            w.style.left = Math.max(0, Math.min(nl, maxX)) + 'px';
            w.style.right = 'auto';

            // Y boundary: not above navbar area
            w.style.top = Math.max(minY, Math.min(nt, maxY)) + 'px';
            w.style.bottom = 'auto';

            // update immediate horizontal chat positioning based on side
            var rect = w.getBoundingClientRect();
            var distLeft = rect.left;
            var distRight = window.innerWidth - rect.right;
            w.setAttribute('data-position', (distLeft <= distRight) ? 'left' : 'right');
            positionChatBox();

            e.preventDefault();
        }

        function endDrag(){
            if(!drag) return;
            drag = false;
            w.classList.remove('dragging');

            snapToEdge();
        }

        b.addEventListener('mousedown', startDrag);
        document.addEventListener('mousemove', doDrag);
        document.addEventListener('mouseup', endDrag);

        b.addEventListener('touchstart', startDrag, {passive: false});
        document.addEventListener('touchmove', doDrag, {passive: false});
        document.addEventListener('touchend', endDrag);

        b.addEventListener('click', function(e){
            if(moved) {
                moved = false;
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            toggleChat();
        });

    })();
    // ==================== END DRAGGABLE ====================
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\blue-laundry\resources\views/home.blade.php ENDPATH**/ ?>