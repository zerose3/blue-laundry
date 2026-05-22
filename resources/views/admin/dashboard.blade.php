@extends('layouts.admin')

@section('title', 'Dashboard Admin - Blue-Laundry')

@section('content')
<div class="p-6 lg:p-8 space-y-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Dashboard</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Ringkasan aktivitas hari ini</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm text-slate-500 dark:text-slate-400">{{ now()->format('d F Y') }}</span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach([
            ['label' => 'Total Pesanan', 'value' => number_format($stats['total_orders']), 'icon' => 'fa-shopping-bag', 'color' => 'blue', 'trend' => '+12%'],
            ['label' => 'Pesanan Hari Ini', 'value' => number_format($stats['today_orders']), 'icon' => 'fa-calendar-day', 'color' => 'emerald', 'trend' => '+5%'],
            ['label' => 'Total Pelanggan', 'value' => number_format($stats['total_customers']), 'icon' => 'fa-users', 'color' => 'purple', 'trend' => '+8%'],
            ['label' => 'Total Pendapatan', 'value' => 'Rp ' . number_format($stats['total_revenue']), 'icon' => 'fa-wallet', 'color' => 'amber', 'trend' => '+15%'],
        ] as $stat)
        <div class="glass-card rounded-2xl p-6 hover:scale-[1.02] transition-transform duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $stat['color'] }}-100 dark:bg-{{ $stat['color'] }}-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas {{ $stat['icon'] }} text-{{ $stat['color'] }}-600 dark:text-{{ $stat['color'] }}-400 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2 py-1 rounded-lg">
                    {{ $stat['trend'] }}
                </span>
            </div>
            <p class="text-2xl font-bold text-slate-900 dark:text-white mb-1">{{ $stat['value'] }}</p>
            <p class="text-sm text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>

    <!-- Charts -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Revenue Chart -->
        <div class="lg:col-span-2 glass-card rounded-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Grafik Pendapatan 30 Hari</h3>
                <select class="text-sm border-slate-200 dark:border-slate-700 rounded-lg bg-transparent dark:text-white">
                    <option>30 Hari Terakhir</option>
                    <option>7 Hari Terakhir</option>
                </select>
            </div>
            <canvas id="revenueChart" height="30"></canvas>
        </div>

        <!-- Recent Orders -->
        <div class="glass-card rounded-2xl p-6">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Pesanan Terbaru</h3>
            <div class="space-y-4">
                @foreach($stats['recent_orders'] as $order)
                <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                    <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600 dark:text-primary-400 font-bold text-sm">
                        {{ substr($order->user->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 dark:text-white truncate">{{ $order->user->name }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $order->order_code }}</p>
                    </div>
                    <span class="text-xs font-medium px-2 py-1 rounded-lg bg-{{ $order->status_color }}-100 dark:bg-{{ $order->status_color }}-900/30 text-{{ $order->status_color }}-600 dark:text-{{ $order->status_color }}-400">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                @endforeach
            </div>
            <a href="{{ route('admin.orders.index') }}" class="block mt-4 text-center text-sm text-primary-600 dark:text-primary-400 hover:underline">
                Lihat Semua Pesanan
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const chartData = @json($chartData);

   new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartData.map(d => d.date),
        datasets: [{
            label: 'Pendapatan',
            data: chartData.map(d => d.revenue),
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            fill: true,
            tension: 0.4,
            pointRadius: 3,
            pointBackgroundColor: '#3b82f6',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 3,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: 'rgba(148, 163, 184, 0.1)' },
                ticks: { 
                    callback: value => 'Rp ' + value.toLocaleString(),
                    font: { size: 10 }
                }
            },
            x: {
                grid: { display: false },
                ticks: { font: { size: 10 } }
            }
        }
    }
});

</script>

@endpush
@endsection
