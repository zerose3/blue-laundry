@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Laporan Keuangan</h1>
    
    <!-- Summary Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800 rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Total Pendapatan</p>
            <p class="text-2xl font-bold text-white">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Total Pesanan</p>
            <p class="text-2xl font-bold text-white">{{ $totalOrders ?? 0 }}</p>
        </div>
        <div class="bg-slate-800 rounded-2xl p-6">
            <p class="text-slate-400 text-sm">Pelanggan Aktif</p>
            <p class="text-2xl font-bold text-white">{{ $totalCustomers ?? 0 }}</p>
        </div>
    </div>

    <!-- Monthly Revenue Table -->
<div class="glass-card rounded-2xl overflow-hidden mb-8">
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
                        {{ $revenue->month ?? '-' }}
                    </td>
                    <td class="px-6 py-4 text-emerald-400 font-medium">
                        Rp {{ number_format($revenue->total ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-slate-300 text-right">
                        {{ $revenue->count ?? 0 }} transaksi
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
    <div class="bg-slate-800 rounded-2xl p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Pesanan Terbaru</h2>
        <table class="w-full text-left">
            <thead>
                <tr class="text-slate-400 text-sm border-b border-slate-700">
                    <th class="pb-3">Kode</th>
                    <th class="pb-3">Pelanggan</th>
                    <th class="pb-3">Total</th>
                    <th class="pb-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders ?? [] as $order)
                <tr class="border-b border-slate-700/50">
                    <td class="py-3 text-white">{{ $order->order_code }}</td>
                    <td class="py-3 text-slate-300">{{ $order->user->name ?? '-' }}</td>
                    <td class="py-3 text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="py-3">
                        <span class="px-3 py-1 rounded-full text-xs 
                            {{ $order->status === 'completed' ? 'bg-emerald-500/20 text-emerald-400' : 
                               ($order->status === 'pending' ? 'bg-amber-500/20 text-amber-400' : 'bg-blue-500/20 text-blue-400') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection