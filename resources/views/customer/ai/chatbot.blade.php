@extends('layouts.customer')

@section('title', 'AI Assistant')

@section('content')
<div class="max-w-3xl mx-auto h-[calc(100vh-6rem)] flex flex-col">
    <!-- Header -->
    <div class="glass-card rounded-t-2xl p-4 border-b border-slate-700/50 flex items-center gap-3">
        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
            <i class="fas fa-robot text-white text-sm"></i>
        </div>
        <div>
            <h2 class="font-bold text-white text-sm">Blue Laundry AI</h2>
            <p class="text-xs text-emerald-400">Online</p>
        </div>
        <button onclick="clearChat()" class="ml-auto text-slate-400 hover:text-red-400 text-xs">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </div>

    <!-- Messages -->
    <div id="chat-messages" class="flex-1 overflow-y-auto bg-slate-900/50 p-4 space-y-3">
        <!-- Welcome -->
        <div class="flex gap-2">
            <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <i class="fas fa-robot text-white text-xs"></i>
            </div>
            <div class="bg-slate-700/50 rounded-xl rounded-tl-none p-3 max-w-[85%]">
                <p class="text-white text-sm">Halo {{ auth()->user()->name }}! 👋 Saya bisa bantu cek status laundry, harga, dan tips perawatan.</p>
            </div>
        </div>

        @foreach($messages as $msg)
        <div class="flex gap-2 {{ $msg->role === 'user' ? 'flex-row-reverse' : '' }}">
            @if($msg->role === 'assistant')
            <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <i class="fas fa-robot text-white text-xs"></i>
            </div>
            @else
            <div class="w-6 h-6 bg-slate-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <span class="text-white text-xs font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
            @endif
            <div class="{{ $msg->role === 'user' ? 'bg-blue-600/20 rounded-tr-none' : 'bg-slate-700/50 rounded-tl-none' }} rounded-xl p-3 max-w-[85%]">
                <p class="text-white text-sm">{{ $msg->message }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Input -->
    <div class="glass-card rounded-b-2xl p-3 border-t border-slate-700/50">
        <form id="chat-form" class="flex gap-2" onsubmit="sendMessage(event)">
            @csrf
            <input type="text" id="message-input" 
                class="flex-1 bg-slate-800/50 border border-slate-700/50 rounded-lg px-3 py-2 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-blue-500"
                placeholder="Ketik pesan..." autocomplete="off">
            <button type="submit" class="px-4 py-2 bg-blue-600 rounded-lg text-white text-sm hover:bg-blue-700 transition">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<style>
    #chat-messages::-webkit-scrollbar { width: 4px; }
    #chat-messages::-webkit-scrollbar-thumb { background: rgba(100,116,139,0.3); border-radius: 2px; }
</style>
@endsection

@push('scripts')
<script>
const chatMessages = document.getElementById('chat-messages');
const messageInput = document.getElementById('message-input');

function scrollBottom() {
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function addMessage(text, role) {
    const isUser = role === 'user';
    const html = `
        <div class="flex gap-2 ${isUser ? 'flex-row-reverse' : ''}">
            ${isUser ? `
                <div class="w-6 h-6 bg-slate-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="text-white text-xs font-bold">${'{{ substr(auth()->user()->name, 0, 1) }}'}</span>
                </div>
            ` : `
                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
            `}
            <div class="${isUser ? 'bg-blue-600/20 rounded-tr-none' : 'bg-slate-700/50 rounded-tl-none'} rounded-xl p-3 max-w-[85%]">
                <p class="text-white text-sm">${escapeHtml(text)}</p>
            </div>
        </div>
    `;
    chatMessages.insertAdjacentHTML('beforeend', html);
    scrollBottom();
}

async function sendMessage(e) {
    e.preventDefault();
    const msg = messageInput.value.trim();
    if (!msg) return;

    addMessage(msg, 'user');
    messageInput.value = '';

    // Loading
    const loadingId = 'loading-' + Date.now();
    chatMessages.insertAdjacentHTML('beforeend', `
        <div id="${loadingId}" class="flex gap-2">
            <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <i class="fas fa-robot text-white text-xs"></i>
            </div>
            <div class="bg-slate-700/50 rounded-xl rounded-tl-none p-3">
                <div class="flex gap-1">
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce"></span>
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce" style="animation-delay:0.1s"></span>
                    <span class="w-1.5 h-1.5 bg-slate-400 rounded-full animate-bounce" style="animation-delay:0.2s"></span>
                </div>
            </div>
        </div>
    `);
    scrollBottom();

    try {
        const res = await fetch('{{ route("customer.ai.chat") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: msg })
        });
        
        const data = await res.json();
        document.getElementById(loadingId).remove();
        
        if (data.success) {
            addMessage(data.message, 'assistant');
        } else {
            addMessage('Maaf: ' + (data.message || 'Terjadi kesalahan'), 'assistant');
        }
    } catch (err) {
        console.error('Fetch error:', err);
        document.getElementById(loadingId).remove();
        addMessage('Error: ' + err.message, 'assistant');
    }
}

async function clearChat() {
    if (!confirm('Hapus chat?')) return;
    await fetch('{{ route("customer.ai.clear") }}', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
    location.reload();
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

messageInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') sendMessage(e);
});

scrollBottom();
</script>
@endpush