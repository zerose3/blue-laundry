<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Services\OllamaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatbotController extends Controller
{
    public function __construct(private OllamaService $ollama) {}

    public function index(): View
    {
        $messages = ChatMessage::where('user_id', auth()->id())
            ->latest()
            ->take(20)
            ->get()
            ->reverse();

        return view('customer.ai.chatbot', compact('messages'));
    }

    public function chat(Request $request): JsonResponse
    {
        $request->validate(['message' => 'required|string|max:500']);

        $userId = auth()->id();
        $message = $request->message;

        // Simpan pesan user
        ChatMessage::create([
            'user_id' => $userId,
            'message' => $message,
            'role' => 'user',
        ]);

        // AI response (max 30 detik)
        $response = $this->ollama->chat($message, $userId);

        // Simpan response
        ChatMessage::create([
            'user_id' => $userId,
            'message' => $response,
            'role' => 'assistant',
        ]);

        return response()->json([
            'success' => true,
            'message' => $response,
            'time' => now()->format('H:i'),
        ]);
    }

    public function clear(): JsonResponse
    {
        ChatMessage::where('user_id', auth()->id())->delete();
        return response()->json(['success' => true]);
    }
}