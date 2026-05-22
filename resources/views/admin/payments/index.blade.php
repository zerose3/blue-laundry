@extends('layouts.admin')

@section('title', 'Kelola Pembayaran')

@section('content')
<div class="p-6 lg:p-8 space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Pembayaran</h1>
            <p class="text-slate-400 mt-1">Verifikasi bukti pembayaran customer</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.payments.index') }}" class="px-4 py-2 rounded-xl {{ !request('status') ? 'bg-primary-600 text-white' : 'bg-slate-800 text-slate-300' }} text-sm font-medium transition-all">Semua</a>
            <a href="{{ route('admin.payments.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-xl {{ request('status') == 'pending' ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-300' }} text-sm font-medium transition-all">Pending</a>
            <a href="{{ route('admin.payments.index', ['status' => 'verified']) }}" class="px-4 py-2 rounded-xl {{ request('status') == 'verified' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300' }} text-sm font-medium transition-all">Terverifikasi</a>
        </div>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-800/50 border-b border-slate-700/50">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Order</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Customer</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Jumlah</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Metode</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300">Status</th>
                    <th class="px-6 py-4 text-sm font-semibold text-slate-300 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                @foreach($payments as $payment)
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <p class="font-mono text-white">{{ $payment->order->order_code }}</p>
                        <p class="text-xs text-slate-400">{{ $payment->created_at->format('d M Y') }}</p>
                    </td>
                    <td class="px-6 py-4 text-slate-300">{{ $payment->user->name }}</td>
                    <td class="px-6 py-4 font-medium text-white">Rp {{ number_format($payment->amount) }}</td>
                    <td class="px-6 py-4 text-slate-300 capitalize">{{ $payment->payment_method }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-lg text-xs font-medium 
                            {{ $payment->status == 'verified' ? 'bg-emerald-500/10 text-emerald-400' : 
                               ($payment->status == 'rejected' ? 'bg-red-500/10 text-red-400' : 'bg-amber-500/10 text-amber-400') }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if($payment->status == 'pending')
                        <div class="flex items-center justify-end gap-2">
                            <form action="{{ route('admin.payments.verify', $payment) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="px-3 py-2 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 transition-colors text-sm">
                                    <i class="fas fa-check mr-1"></i>Verifikasi
                                </button>
                            </form>
                            <form action="{{ route('admin.payments.reject', $payment) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" class="px-3 py-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-colors text-sm">
                                    <i class="fas fa-times mr-1"></i>Tolak
                                </button>
                            </form>
                        </div>
                        @endif
                        @if($payment->proof_image)
                        <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank" class="text-xs text-primary-400 hover:underline mt-2 inline-block">Lihat Bukti</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-slate-700/50">
            {{ $payments->links() }}
        </div>
    </div>
</div>
@endsection
