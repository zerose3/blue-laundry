@extends('layouts.customer')

@section('title', 'Pesan Laundry Baru')

@section('content')
<div class="max-w-7xl mx-auto w-full">
    <div class="max-w-3xl mx-auto p-2 sm:p-4 lg:p-6">
        <div class="mb-6">
        <a href="{{ route('customer.dashboard') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <h1 class="text-2xl font-bold text-white mb-6">Pesan Laundry Baru</h1>

    <div class="glass-card rounded-2xl p-8">
        <form action="{{ route('customer.orders.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-3">Pilih Layanan</label>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach($services as $service)
                    <label class="relative cursor-pointer">
                        <input type="radio" name="service_id" value="{{ $service->id }}" class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                        <div class="p-4 rounded-xl border-2 border-slate-700 bg-slate-800/30 peer-checked:border-primary-500 peer-checked:bg-primary-500/10 transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-primary-900/30 rounded-lg flex items-center justify-center">
                                    <i class="fas {{ $service->icon ?? 'fa-soap' }} text-primary-400"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-white">{{ $service->name }}</p>
                                    <p class="text-xs text-slate-400">Rp {{ number_format($service->price_per_kg ?? $service->price_per_unit) }}/{{ $service->unit_type }}</p>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500">{{ $service->estimation_hours }} jam</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Berat (kg)</label>
                    <input type="number" name="weight" step="0.1" min="0.1" required value="1"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Jumlah Item</label>
                    <input type="number" name="quantity" min="1" required value="1"
                        class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Pickup</label>
                <textarea name="pickup_address" rows="2" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">{{ auth()->user()->address }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Delivery</label>
                <textarea name="delivery_address" rows="2" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">{{ auth()->user()->address }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Catatan (opsional)</label>
                <textarea name="notes" rows="2" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white" placeholder="Contoh: Pakaian warna jangan dicampur..."></textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 py-3 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg hover:shadow-xl transition-all">
                    Buat Pesanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
