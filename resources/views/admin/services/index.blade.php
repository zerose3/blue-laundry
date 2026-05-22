@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
<div class="p-6 lg:p-8 space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-white">Laporan Keuangan</h1>
        <p class="text-slate-400 mt-1">Ringkasan pendapatan dan performa bisnis</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid md:grid-cols-3 gap-6">
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-wallet text-emerald-400"></i>
                </div>
                <p class="text-slate-400 text-sm">Total Pendapatan</p>
            </div>
            <p class="text-2xl font-bold text-white">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-blue-400"></i>
                </div>
                <p class="text-slate-400 text-sm">Total Pesanan</p>
            </div>
            <p class="text-2xl font-bold text-white">{{ $totalOrders ?? 0 }}</p>
        </div>
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-purple-400"></i>
                </div>
                <p class="text-slate-400 text-sm">Pelanggan Aktif</p>
            </div>
            <p class="text-2xl font-bold text-white">{{ $totalCustomers ?? 0 }}</p>
        </div>
    </div>

    <!-- Monthly Revenue Table -->
    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-700/50">
            <h2 class="text-lg font-semibold text-white">Pendapatan Bulanan</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-800/50 border-b border-slate-700/50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Bulan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Total Pendapatan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Jumlah Transaksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    @forelse($monthlyRevenue ?? [] as $revenue)
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 text-white font-medium">
                            {{ $revenue->month ?? $revenue['month'] ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-emerald-400 font-medium">
                            Rp {{ number_format($revenue->total ?? $revenue['total'] ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-slate-300 text-right">
                            {{ $revenue->count ?? $revenue['count'] ?? 0 }} transaksi
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-slate-500">
                            Belum ada data pendapatan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-slate-700/50">
            <h2 class="text-lg font-semibold text-white">Pesanan Terbaru</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-800/50 border-b border-slate-700/50">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Kode</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Pelanggan</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Total</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-300">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    @forelse($recentOrders ?? [] as $order)
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 text-white font-medium">{{ $order->order_code }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $order->user->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-lg text-xs font-medium 
                                {{ $order->status === 'completed' ? 'bg-emerald-500/10 text-emerald-400' : 
                                   ($order->status === 'pending' ? 'bg-amber-500/10 text-amber-400' : 
                                   ($order->status === 'cancelled' ? 'bg-red-500/10 text-red-400' : 'bg-blue-500/10 text-blue-400')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection