@extends('layouts.app')

@section('title', 'Blue Laundry - Layanan Laundry Modern')

@section('content')
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
                    <a href="{{ route('customer.orders.create') }}" class="group px-8 py-4 rounded-2xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-xl shadow-primary-500/30 hover:shadow-2xl hover:shadow-primary-500/40 hover:-translate-y-1 transition-all duration-300 flex items-center gap-3">
                        <span>Pesan Laundry</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="{{ route('tracking') }}" class="px-8 py-4 rounded-2xl border-2 border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:border-primary-500 hover:text-primary-600 dark:hover:text-primary-400 transition-all duration-300 flex items-center gap-3">
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
            @foreach([
                ['number' => '10K+', 'label' => 'Pesanan Selesai', 'icon' => 'fa-check-circle'],
                ['number' => '50+', 'label' => 'Mitra Driver', 'icon' => 'fa-motorcycle'],
                ['number' => '24/7', 'label' => 'Layanan Aktif', 'icon' => 'fa-clock'],
                ['number' => '4.9', 'label' => 'Rating Pelanggan', 'icon' => 'fa-star'],
            ] as $stat)
            <div class="text-center p-6 rounded-2xl hover:bg-primary-50 dark:hover:bg-slate-700/50 transition-colors duration-300 animate-on-scroll ">
                <div class="w-14 h-14 mx-auto mb-4 bg-primary-100 dark:bg-primary-900/30 rounded-2xl flex items-center justify-center">
                    <i class="fas {{ $stat['icon'] }} text-primary-600 dark:text-primary-400 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-slate-900 dark:text-white mb-1">{{ $stat['number'] }}</div>
                <div class="text-sm text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</div>
            </div>
            @endforeach
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
            @php
            $services = [
                ['name' => 'Cuci Kering Reguler', 'price' => '8.000', 'unit' => 'kg', 'desc' => 'Layanan standar 24 jam', 'icon' => 'fa-soap', 'color' => 'blue'],
                ['name' => 'Cuci Kering Express', 'price' => '15.000', 'unit' => 'kg', 'desc' => 'Kilat 6 jam selesai', 'icon' => 'fa-bolt', 'color' => 'amber'],
                ['name' => 'Cuci Setrika', 'price' => '12.000', 'unit' => 'kg', 'desc' => 'Bersih + Rapi', 'icon' => 'fa-shirt', 'color' => 'emerald'],
                ['name' => 'Setrika Saja', 'price' => '6.000', 'unit' => 'kg', 'desc' => 'Setrika pakaian', 'icon' => 'fa-fire', 'color' => 'purple'],
                ['name' => 'Dry Cleaning', 'price' => '25.000', 'unit' => 'kg', 'desc' => 'Untuk pakaian premium', 'icon' => 'fa-star', 'color' => 'rose'],
                ['name' => 'Cuci Sepatu', 'price' => '35.000', 'unit' => 'pcs', 'desc' => 'Bersih seperti baru', 'icon' => 'fa-shoe-prints', 'color' => 'orange'],
            ];
            @endphp
            
            @foreach($services as $service)
            <div class="group glass-card rounded-3xl p-8 hover:scale-[1.02] hover:shadow-2xl transition-all duration-300 animate-on-scroll">
                <div class="w-16 h-16 mb-6 bg-{{ $service['color'] }}-100 dark:bg-{{ $service['color'] }}-900/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    @if($service['name'] === 'Cuci Sepatu')
    <img src="{{ asset('images/icon-shoe.svg') }}" class="w-8 h-8 dark:invert" alt="Sepatu">
@else
    <i class="fas {{ $service['icon'] }} text-{{ $service['color'] }}-600 dark:text-{{ $service['color'] }}-400 text-2xl"></i>
@endif
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">{{ $service['name'] }}</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">{{ $service['desc'] }}</p>
                <div class="flex items-baseline gap-1 mb-6">
                    <span class="text-2xl font-bold text-primary-600 dark:text-primary-400">Rp {{ $service['price'] }}</span>
                    <span class="text-slate-400 text-sm">/{{ $service['unit'] }}</span>
                </div>
                <a href="{{ route('customer.orders.create') }}" class="block w-full py-3 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium text-center group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                    Pesan Sekarang
                </a>
            </div>
            @endforeach
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
        
        <form action="{{ route('tracking.search') }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
            @csrf
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
            @foreach([
                ['step' => '01', 'title' => 'Pesan Online', 'desc' => 'Pilih layanan dan jadwal pickup', 'icon' => 'fa-mobile-alt'],
                ['step' => '02', 'title' => 'Driver Pickup', 'desc' => 'Kami jemput laundry Anda', 'icon' => 'fa-motorcycle'],
                ['step' => '03', 'title' => 'Proses Cuci', 'desc' => 'Laundry dicuci profesional', 'icon' => 'fa-soap'],
                ['step' => '04', 'title' => 'Diantar', 'desc' => 'Laundry rapi diantar ke rumah', 'icon' => 'fa-home'],
            ] as $step)
            <div class="relative text-center animate-on-scroll">
                @if(!$loop->last)
                <div class="hidden md:block absolute top-12 left-[60%] w-full h-0.5 bg-gradient-to-r from-primary-300 to-transparent"></div>
                @endif
                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-primary-500 to-primary-700 rounded-3xl flex items-center justify-center shadow-xl shadow-primary-500/30 relative z-10">
                    <i class="fas {{ $step['icon'] }} text-white text-3xl"></i>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center text-xs font-bold text-primary-600 shadow-md">
                        {{ $step['step'] }}
                    </div>
                </div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">{{ $step['title'] }}</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm">{{ $step['desc'] }}</p>
            </div>
            @endforeach
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
            @foreach([
                ['name' => 'Wirangga Bintang', 'role' => 'Mahasiswa', 'text' => 'Pelayanan sangat cepat! Laundry saya selesai dalam 6 jam seperti yang dijanjikan. Driver juga ramah.', 'rating' => 5],
                ['name' => 'Joko Widodo', 'role' => 'Mantan Presiden', 'text' => 'Suka banget sama fitur tracking-nya. Bisa tahu status laundry real-time. Recommended!', 'rating' => 5],
                ['name' => 'Emma Zalikhah', 'role' => 'Mahasiswa', 'text' => 'Harga terjangkau, kualitas premium. Pakaian di dry cleaning selalu seperti baru.', 'rating' => 5],
            ] as $testi)
            <div class="glass-card rounded-3xl p-8 animate-on-scroll">
                <div class="flex items-center gap-1 text-amber-400 mb-4">
                    @for($i = 0; $i < $testi['rating']; $i++)
                    <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">"{{ $testi['text'] }}"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900/50 flex items-center justify-center text-primary-600 dark:text-primary-400 font-bold">
                        {{ substr($testi['name'], 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold text-slate-900 dark:text-white">{{ $testi['name'] }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $testi['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
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
            @foreach([
                ['q' => 'Berapa lama proses laundry?', 'a' => 'Layanan reguler membutuhkan waktu 24 jam. Untuk express, laundry selesai dalam 6 jam. Dry cleaning membutuhkan waktu 72 jam untuk hasil maksimal.'],
                ['q' => 'Apakah ada layanan pickup dan delivery?', 'a' => 'Ya! Kami menyediakan layanan pickup dan delivery gratis untuk area Jakarta dan sekitarnya dengan minimal order tertentu.'],
                ['q' => 'Bagaimana cara pembayaran?', 'a' => 'Kami menerima pembayaran transfer bank, e-wallet (OVO, GoPay, DANA), dan tunai saat pickup/delivery.'],
                ['q' => 'Apakah ada garansi?', 'a' => 'Kami memberikan garansi kebersihan dan kerapian. Jika ada masalah, silakan hubungi kami dalam 24 jam setelah delivery.'],
            ] as $faq)
            <div class="glass-card rounded-2xl overflow-hidden animate-on-scroll">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('i').classList.toggle('rotate-180')" class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                    <span class="font-semibold text-slate-900 dark:text-white">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="hidden px-6 pb-5 text-slate-600 dark:text-slate-400 leading-relaxed">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
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
            <a href="{{ route('register') }}" class="px-8 py-4 rounded-2xl bg-primary-500 text-white font-bold hover:bg-primary-400 transition-colors shadow-xl shadow-primary-500/30">
                Daftar Gratis Sekarang
            </a>
            <a href="{{ route('services') }}" class="px-8 py-4 rounded-2xl border border-slate-600 text-slate-300 font-bold hover:border-slate-400 hover:text-white transition-colors">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>

<!-- Chatbot Widget (Home Page) -->
@php($isAuthed = auth()->check())
<div id="chat-widget" class="fixed bottom-6 right-6 z-50" data-authed="{{ $isAuthed ? '1' : '0' }}">
    <!-- Tombol Chat -->
    <button
        id="chat-btn"
        type="button"
        onclick="toggleChat()"
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

@push('scripts')
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
            const res = await fetch('{{ route("customer.ai.chat") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
</script>
@endpush
@endsection
