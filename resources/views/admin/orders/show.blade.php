@extends('layouts.admin')

@section('title', 'Detail Order ' . $order->order_code)

@section('content')
<div class="p-6 lg:p-8 space-y-6">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.orders.index') }}" class="text-slate-400 hover:text-white">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-2xl font-bold text-white">Order {{ $order->order_code }}</h1>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-sm text-slate-400">Status Laundry</p>
                        <span class="inline-flex mt-1 px-4 py-2 rounded-xl text-sm font-bold bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-400">Pembayaran</p>
                        <span class="inline-flex mt-1 px-4 py-2 rounded-xl text-sm font-bold {{ $order->payment_status == 'paid' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-amber-500/10 text-amber-400' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>

                <!-- Progress -->
                <div class="mb-8">
                    <div class="h-3 bg-slate-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-primary-500 to-primary-400 rounded-full transition-all" style="width: {{ $order->status_progress }}%"></div>
                    </div>
                    <div class="flex justify-between mt-2 text-xs text-slate-500">
                        @foreach(['menunggu','dipickup','dicuci','dikeringkan','disetrika','diantar','selesai'] as $step)
                        <span class="{{ $order->status == $step ? 'text-primary-400 font-bold' : '' }}">{{ ucfirst($step) }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Update Status -->
                <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="flex gap-3 items-end">
                    @csrf @method('PATCH')
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-slate-300 mb-2">Update Status</label>
                        <select name="status" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white focus:border-primary-500 outline-none">
                            @foreach(['menunggu','dipickup','dicuci','dikeringkan','disetrika','diantar','selesai'] as $status)
                            <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-500 transition-all">
                        Update
                    </button>
                </form>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4">Detail Item</h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl bg-slate-800/30">
                        <p class="text-sm text-slate-400 mb-1">Layanan</p>
                        <p class="font-semibold text-white">{{ $order->service->name }}</p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/30">
                        <p class="text-sm text-slate-400 mb-1">Berat</p>
                        <p class="font-semibold text-white">{{ $order->weight }} kg</p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/30">
                        <p class="text-sm text-slate-400 mb-1">Jumlah</p>
                        <p class="font-semibold text-white">{{ $order->quantity }}</p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/30">
                        <p class="text-sm text-slate-400 mb-1">Total</p>
                        <p class="font-semibold text-primary-400">Rp {{ number_format($order->total_price) }}</p>
                    </div>
                </div>
                @if($order->notes)
                <div class="mt-4 p-4 rounded-xl bg-slate-800/30">
                    <p class="text-sm text-slate-400 mb-1">Catatan</p>
                    <p class="text-white">{{ $order->notes }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4">Pelanggan</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-primary-900/30 flex items-center justify-center text-primary-400 font-bold text-lg">
                        {{ substr($order->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-white">{{ $order->user->name }}</p>
                        <p class="text-sm text-slate-400">{{ $order->user->email }}</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <p class="text-slate-400"><i class="fas fa-phone mr-2 text-primary-500"></i>{{ $order->user->phone ?? '-' }}</p>
                    <p class="text-slate-400"><i class="fas fa-map-marker-alt mr-2 text-primary-500"></i>{{ $order->pickup_address }}</p>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4">Aksi</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.orders.invoice', $order) }}" target="_blank" class="block w-full py-3 rounded-xl bg-slate-800 text-white text-center hover:bg-slate-700 transition-all">
                        <i class="fas fa-eye mr-2"></i>Lihat Invoice
                    </a>
                    <a href="{{ route('admin.orders.invoice.pdf', $order) }}" class="block w-full py-3 rounded-xl bg-primary-600 text-white text-center hover:bg-primary-500 transition-all">
                        <i class="fas fa-download mr-2"></i>Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
