@extends('layouts.customer')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="max-w-7xl mx-auto w-full p-2 sm:p-4 lg:p-6 space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Pesanan Saya</h1>
        <a href="{{ route('customer.orders.create') }}" class="px-4 py-2 rounded-xl bg-primary-600 text-white text-sm font-medium hover:bg-primary-500 transition-all">
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
                    @forelse($orders as $order)
                    <tr class="hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-mono text-white">{{ $order->order_code }}</td>
                        <td class="px-6 py-4 text-slate-300">{{ $order->service->name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-lg text-xs font-medium bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-white">Rp {{ number_format($order->total_price) }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('customer.orders.show', $order) }}" class="text-primary-400 hover:text-primary-300 text-sm font-medium">Detail</a>
                            @if($order->payment_status == 'pending')
                            <a href="{{ route('customer.payments.upload', $order) }}" class="ml-3 text-amber-400 hover:text-amber-300 text-sm font-medium">Bayar</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                            Belum ada pesanan. <a href="{{ route('customer.orders.create') }}" class="text-primary-400 hover:underline">Buat sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-slate-700/50">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
