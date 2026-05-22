@extends('layouts.customer')

@section('title', 'Detail Order ' . $order->order_code)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('customer.orders.index') }}" class="text-slate-400 hover:text-white">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-2xl font-bold text-white">Detail Order</h1>
    </div>

    <!-- Tracking Card -->
    <div class="glass-card rounded-2xl p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="text-sm text-slate-400 mb-1">Kode Order</p>
                <p class="text-xl font-mono font-bold text-white">{{ $order->order_code }}</p>
            </div>
            <span class="px-4 py-2 rounded-xl text-sm font-bold bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <!-- Progress Timeline -->
        <div class="relative">
            <div class="h-2 bg-slate-700 rounded-full mb-6">
                <div class="h-full bg-gradient-to-r from-primary-500 to-primary-400 rounded-full transition-all" style="width: {{ $order->status_progress }}%"></div>
            </div>
            <div class="grid grid-cols-7 gap-1 text-center">
                @foreach(['menunggu','dipickup','dicuci','dikeringkan','disetrika','diantar','selesai'] as $step)
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold 
                        {{ array_search($order->status, ['menunggu','dipickup','dicuci','dikeringkan','disetrika','diantar','selesai']) >= array_search($step, ['menunggu','dipickup','dicuci','dikeringkan','disetrika','diantar','selesai']) ? 'bg-primary-600 text-white' : 'bg-slate-700 text-slate-500' }}">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="text-[10px] text-slate-400 hidden sm:block">{{ ucfirst($step) }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Detail -->
    <div class="glass-card rounded-2xl p-6">
        <h3 class="text-lg font-bold text-white mb-4">Informasi Pesanan</h3>
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="p-4 rounded-xl bg-slate-800/30">
                <p class="text-sm text-slate-400 mb-1">Layanan</p>
                <p class="font-medium text-white">{{ $order->service->name }}</p>
            </div>
            <div class="p-4 rounded-xl bg-slate-800/30">
                <p class="text-sm text-slate-400 mb-1">Berat</p>
                <p class="font-medium text-white">{{ $order->weight }} kg x {{ $order->quantity }}</p>
            </div>
            <div class="p-4 rounded-xl bg-slate-800/30">
                <p class="text-sm text-slate-400 mb-1">Total</p>
                <p class="font-medium text-primary-400 text-lg">Rp {{ number_format($order->total_price) }}</p>
            </div>
            <div class="p-4 rounded-xl bg-slate-800/30">
                <p class="text-sm text-slate-400 mb-1">Pembayaran</p>
                <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $order->payment_status == 'paid' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-amber-500/10 text-amber-400' }}">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>
        </div>
        @if($order->payment_status == 'pending')
        <div class="mt-6">
            <a href="{{ route('customer.payments.upload', $order) }}" class="block w-full py-3 rounded-xl bg-amber-600 text-white text-center font-medium hover:bg-amber-500 transition-all">
                <i class="fas fa-upload mr-2"></i>Upload Bukti Pembayaran
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
