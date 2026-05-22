@extends('layouts.customer')

@section('title', 'Upload Pembayaran')

@section('content')
<div class="max-w-7xl mx-auto w-full">
    <div class="max-w-xl mx-auto p-2 sm:p-4 lg:p-6">
        <div class="mb-6">
            <a href="{{ route('customer.orders.show', $order) }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    <h1 class="text-2xl font-bold text-white mb-6">Upload Bukti Pembayaran</h1>

    <div class="glass-card rounded-2xl p-8">
        <div class="mb-6 p-4 rounded-xl bg-primary-500/10 border border-primary-500/20">
            <p class="text-sm text-slate-400 mb-1">Total yang harus dibayar</p>
            <p class="text-2xl font-bold text-primary-400">Rp {{ number_format($order->total_price) }}</p>
        </div>

        <form action="{{ route('customer.payments.store', $order) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Jumlah Transfer</label>
                <input type="number" name="amount" required value="{{ $order->total_price }}" readonly
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 text-white cursor-not-allowed">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Metode Pembayaran</label>
                <select name="payment_method" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                    <option value="transfer">Transfer Bank</option>
                    <option value="e-wallet">E-Wallet</option>
                    <option value="cash">Tunai</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Bukti Transfer</label>
                <div class="relative border-2 border-dashed border-slate-600 rounded-xl p-6 text-center hover:border-primary-500 transition-colors">
                    <input type="file" name="proof_image" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <i class="fas fa-cloud-upload-alt text-3xl text-slate-500 mb-2"></i>
                    <p class="text-sm text-slate-400">Klik atau drag file ke sini</p>
                    <p class="text-xs text-slate-500 mt-1">PNG, JPG (Max 2MB)</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Catatan (opsional)</label>
                <textarea name="notes" rows="2" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white"></textarea>
            </div>

            <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold shadow-lg hover:shadow-xl transition-all">
                Konfirmasi Pembayaran
            </button>
        </form>
    </div>
</div>
@endsection
