@extends('layouts.app')

@section('title', 'Tracking Laundry')

@section('content')
<section class="pt-32 pb-20 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white mb-4">Tracking <span class="gradient-text">Laundry</span></h1>
            <p class="text-slate-600 dark:text-slate-400">Masukkan kode order untuk melihat status terkini</p>
        </div>

        <div class="glass-card rounded-3xl p-8 mb-8 animate-on-scroll">
            <form action="{{ route('tracking.search') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                @csrf
                <div class="flex-1 relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="order_code" required placeholder="Contoh: BL-20240521-001"
                        class="w-full pl-12 pr-4 py-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none transition-all dark:text-white"
                        value="{{ request('order_code') }}">
                </div>
                <button type="submit" class="px-8 py-4 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold shadow-lg hover:shadow-xl transition-all">
                    Cek Status
                </button>
            </form>
        </div>

        @if(isset($order))
        <div class="glass-card rounded-3xl p-8 animate-on-scroll">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Kode Order</p>
                    <p class="text-xl font-mono font-bold text-slate-900 dark:text-white">{{ $order->order_code }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Status</p>
                    <span class="inline-flex px-4 py-2 rounded-xl text-sm font-bold bg-{{ $order->status_color }}-100 dark:bg-{{ $order->status_color }}-900/30 text-{{ $order->status_color }}-600 dark:text-{{ $order->status_color }}-400">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="relative mb-8">
                <div class="h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-primary-500 to-primary-600 rounded-full transition-all duration-1000" style="width: {{ $order->status_progress }}%"></div>
                </div>
                <div class="flex justify-between mt-2 text-xs text-slate-500 dark:text-slate-400">
                    <span>Order</span>
                    <span>Pickup</span>
                    <span>Cuci</span>
                    <span>Kering</span>
                    <span>Setrika</span>
                    <span>Antar</span>
                    <span>Selesai</span>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 text-sm">
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <p class="text-slate-500 dark:text-slate-400 mb-1">Pelanggan</p>
                    <p class="font-semibold text-slate-900 dark:text-white">{{ $order->user->name }}</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <p class="text-slate-500 dark:text-slate-400 mb-1">Layanan</p>
                    <p class="font-semibold text-slate-900 dark:text-white">{{ $order->service->name }}</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <p class="text-slate-500 dark:text-slate-400 mb-1">Berat</p>
                    <p class="font-semibold text-slate-900 dark:text-white">{{ $order->weight }} kg</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50">
                    <p class="text-slate-500 dark:text-slate-400 mb-1">Total</p>
                    <p class="font-semibold text-primary-600 dark:text-primary-400">Rp {{ number_format($order->total_price) }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
