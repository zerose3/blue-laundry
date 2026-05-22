@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="p-6 lg:p-8 max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-slate-400 hover:text-white text-sm flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <h1 class="text-2xl font-bold text-white mb-6">Tambah Layanan Baru</h1>

    <div class="glass-card rounded-2xl p-8">
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Nama Layanan</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none text-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none text-white"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Harga per Kg</label>
                    <input type="number" name="price_per_kg" step="0.01" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Harga per Unit</label>
                    <input type="number" name="price_per_unit" step="0.01" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 outline-none text-white">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Unit Type</label>
                    <select name="unit_type" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                        <option value="kg">Kg</option>
                        <option value="pcs">Pcs</option>
                        <option value="item">Item</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Estimasi (jam)</label>
                    <input type="number" name="estimation_hours" required value="24" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" checked class="rounded border-slate-700 bg-slate-800 text-primary-600">
                <label class="text-sm text-slate-300">Aktifkan layanan</label>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-500 transition-all">Simpan</button>
                <a href="{{ route('admin.services.index') }}" class="px-6 py-3 rounded-xl border border-slate-600 text-slate-300 hover:border-slate-400 transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
