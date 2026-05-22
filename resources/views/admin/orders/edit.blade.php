@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6">Edit Order {{ $order->order_code }}</h1>
    
    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="bg-slate-800 rounded-2xl p-8 space-y-6">
        @csrf
        @method('PATCH')
        
        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Layanan</label>
            <select name="service_id" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">
                @foreach($services as $service)
                <option value="{{ $service->id }}" {{ $order->service_id == $service->id ? 'selected' : '' }}>
                    {{ $service->name }} - Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}/kg
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Jumlah (kg)</label>
            <input type="number" name="quantity" step="0.1" value="{{ $order->quantity }}" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Pickup</label>
            <textarea name="pickup_address" rows="3" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">{{ $order->pickup_address }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Delivery</label>
            <textarea name="delivery_address" rows="3" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">{{ $order->delivery_address }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-300 mb-2">Catatan</label>
            <textarea name="notes" rows="2" class="w-full bg-slate-700 border border-slate-600 rounded-xl px-4 py-3 text-white">{{ $order->notes }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 bg-blue-600 rounded-xl text-white font-semibold hover:bg-blue-700">Simpan Perubahan</button>
            <a href="{{ route('admin.orders.index') }}" class="px-6 py-3 bg-slate-700 rounded-xl text-slate-300 hover:bg-slate-600">Batal</a>
        </div>
    </form>
</div>
@endsection