@extends('layouts.admin')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="p-6 lg:p-8 space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white">Pesanan</h1>
            <p class="text-slate-400 mt-1">{{ $orders->total() }} pesanan ditemukan</p>
        </div>
        <form action="{{ route('admin.orders.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari order code..."
                class="px-4 py-2 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-slate-500 focus:border-primary-500 outline-none">
            <button type="submit" class="px-4 py-2 rounded-xl bg-primary-600 text-white hover:bg-primary-500 transition-all">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Filters -->
    <div class="flex gap-2 flex-wrap">
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 rounded-xl text-sm font-medium {{ !request('status') ? 'bg-primary-600 text-white' : 'bg-slate-800/50 text-slate-300 hover:bg-slate-800' }} transition-colors">
            Semua
        </a>
        <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') == 'pending' ? 'bg-primary-600 text-white' : 'bg-slate-800/50 text-slate-300 hover:bg-slate-800' }} transition-colors">
            Pending
        </a>
        <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') == 'processing' ? 'bg-primary-600 text-white' : 'bg-slate-800/50 text-slate-300 hover:bg-slate-800' }} transition-colors">
            Diproses
        </a>
        <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="px-4 py-2 rounded-xl text-sm font-medium {{ request('status') == 'completed' ? 'bg-primary-600 text-white' : 'bg-slate-800/50 text-slate-300 hover:bg-slate-800' }} transition-colors">
            Selesai
        </a>
    </div>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-800/50 border-b border-slate-700/50">
                <tr>
                    <th class="px-6 py-4 font-semibold text-slate-300">Order Code</th>
                    <th class="px-6 py-4 font-semibold text-slate-300">Pelanggan</th>
                    <th class="px-6 py-4 font-semibold text-slate-300">Layanan</th>
                    <th class="px-6 py-4 font-semibold text-slate-300">Total</th>
                    <th class="px-6 py-4 font-semibold text-slate-300">Status</th>
                    <th class="px-6 py-4 font-semibold text-slate-300 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/30">
                @forelse($orders as $order)
                <tr class="hover:bg-slate-800/30 transition-colors">
                    <td class="px-6 py-4 font-medium text-white">{{ $order->order_code }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary-900/30 flex items-center justify-center text-primary-400 text-xs font-bold">
                                {{ substr($order->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-white">{{ $order->user->name }}</p>
                                <p class="text-xs text-slate-500">{{ $order->user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-300">{{ $order->service->name ?? '-' }}</td>
                    <td class="px-6 py-4 font-medium text-white">Rp {{ number_format($order->total_price) }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-lg text-xs font-medium
                            @if($order->status == 'pending') bg-amber-500/20 text-amber-300
                            @elseif($order->status == 'processing') bg-blue-500/20 text-blue-300
                            @elseif($order->status == 'completed') bg-emerald-500/20 text-emerald-300
                            @else bg-slate-500/20 text-slate-300
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="p-2 rounded-lg bg-primary-600/20 text-primary-300 hover:bg-primary-600/40 transition-colors">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <a href="{{ route('admin.orders.edit', $order) }}" class="p-2 rounded-lg bg-blue-600/20 text-blue-300 hover:bg-blue-600/40 transition-colors">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                        <i class="fas fa-inbox text-3xl mb-3 block opacity-50"></i>
                        Tidak ada pesanan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($orders->hasPages())
    <div class="flex justify-center">
        {{ $orders->links('pagination::tailwind') }}
    </div>
    @endif
</div>
@endsection
