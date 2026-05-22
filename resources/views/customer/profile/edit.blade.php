@extends('layouts.customer')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-white mb-6">Edit Profil</h1>

    <div class="glass-card rounded-2xl p-8">
        <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PATCH')
            
            <div class="flex items-center gap-4 mb-6">
                <div class="w-20 h-20 rounded-full bg-primary-900/30 flex items-center justify-center text-3xl text-primary-400 font-bold overflow-hidden">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-full h-full object-cover">
                    @else
                        {{ substr(auth()->user()->name, 0, 1) }}
                    @endif
                </div>
                <div>
                    <input type="file" name="avatar" accept="image/*" class="text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-primary-600 file:text-white hover:file:bg-primary-500">
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Alamat</label>
                <textarea name="address" rows="3" required class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="border-t border-slate-700 pt-6">
                <h3 class="text-lg font-bold text-white mb-4">Ubah Password</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Password Saat Ini</label>
                        <input type="password" name="current_password" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                    </div>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Password Baru</label>
                            <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl bg-slate-800/50 border border-slate-700 focus:border-primary-500 outline-none text-white">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-primary-600 text-white font-semibold hover:bg-primary-500 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
