@extends('layouts.customer')

@section('title', 'Dashboard - Blue-Laundry')

@section('content')
<div class="max-w-7xl mx-auto w-full">
    <div class="space-y-8 p-2 sm:p-4 lg:p-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Selamat Datang, {{ auth()->user()->name }}!</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola pesanan laundry Anda</p>
        </div>
        <a href="{{ route('customer.orders.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg hover:shadow-xl transition-all">
            <i class="fas fa-plus mr-2"></i>Pesan Baru
        </a>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php
        $user = auth()->user();
        $activeOrders = $user->orders()->whereNotIn('status', ['selesai'])->count();
        $completedOrders = $user->orders()->where('status', 'selesai')->count();
        $pendingPayment = $user->orders()->where('payment_status', 'pending')->count();
        @endphp
        
        <div class="glass-card rounded-2xl p-5 text-center">
            <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ $activeOrders }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Aktif</p>
        </div>
        <div class="glass-card rounded-2xl p-5 text-center">
            <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ $completedOrders }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Selesai</p>
        </div>
        <div class="glass-card rounded-2xl p-5 text-center">
            <p class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ $pendingPayment }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Menunggu Bayar</p>
        </div>
        <div class="glass-card rounded-2xl p-5 text-center">
            <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $user->orders->count() }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Total</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Pesanan Terbaru</h3>
            <a href="{{ route('customer.orders.index') }}" class="text-sm text-primary-600 dark:text-primary-400 hover:underline">Lihat Semua</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider border-b border-slate-200 dark:border-slate-700">
                        <th class="pb-3 pr-4">Kode</th>
                        <th class="pb-3 pr-4">Layanan</th>
                        <th class="pb-3 pr-4">Status</th>
                        <th class="pb-3 pr-4">Total</th>
                        <th class="pb-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($user->orders()->latest()->take(5)->get() as $order)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="py-4 pr-4 font-mono text-sm text-slate-900 dark:text-white">{{ $order->order_code }}</td>
                        <td class="py-4 pr-4 text-sm text-slate-600 dark:text-slate-300">{{ $order->service->name }}</td>
                        <td class="py-4 pr-4">
                            <span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-{{ $order->status_color }}-100 dark:bg-{{ $order->status_color }}-900/30 text-{{ $order->status_color }}-600 dark:text-{{ $order->status_color }}-400">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-4 pr-4 text-sm font-medium text-slate-900 dark:text-white">Rp {{ number_format($order->total_price) }}</td>
                        <td class="py-4">
                            <a href="{{ route('customer.orders.show', $order) }}" class="text-primary-600 dark:text-primary-400 hover:text-primary-700 text-sm font-medium">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-500 dark:text-slate-400">
                            Belum ada pesanan. <a href="{{ route('customer.orders.create') }}" class="text-primary-600 hover:underline">Pesan sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
