<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OllamaService
{
    private string $baseUrl = 'http://localhost:11434/api/generate';
    private string $model = 'gemma3:1b'; // Versi 1B (ringan)

    public function chat(string $message, int $userId): string
    {
        $context = $this->buildContext($message, $userId);
        $prompt = $this->buildPrompt($message, $context);

        try {
            $response = Http::timeout(30)->post($this->baseUrl, [
                'model' => $this->model,
                'prompt' => $prompt,
                'stream' => false,
                'options' => [
                    'temperature' => 0.5, // Lebih deterministik
                    'top_p' => 0.8,
                    'num_predict' => 200, // Batasi token output
                ],
            ]);

            if ($response->successful()) {
                $result = $response->json();
                return $result['response'] ?? 'Maaf, saya tidak dapat menjawab.';
            }

            Log::error('Ollama API error', ['status' => $response->status()]);
            return 'Maaf, layanan AI sedang sibuk. Silakan coba lagi.';

        } catch (\Exception $e) {
            Log::error('Ollama error', ['error' => $e->getMessage()]);
            return 'Maaf, AI tidak tersedia. Pastikan Ollama berjalan.';
        }
    }

    private function buildContext(string $message, int $userId): array
    {
        $context = [
            'user_name' => auth()->user()->name ?? 'Pelanggan',
            'services' => [],
            'orders' => [],
        ];

        // Ambil layanan (maks 3)
        $context['services'] = Service::where('is_active', true)
            ->select('name', 'price_per_kg', 'unit_type', 'estimation_hours')
            ->take(3)
            ->get()
            ->toArray();

        // Cek order hanya jika pertanyaan terkait
        if ($this->isOrderRelated($message)) {
            $context['orders'] = Order::where('user_id', $userId)
                ->with('service')
                ->latest()
                ->take(2)
                ->get()
                ->map(fn($order) => [
                    'order_code' => $order->order_code,
                    'status' => $order->status,
                    'service' => $order->service->name ?? '-',
                    'total_price' => $order->total_price,
                ])
                ->toArray();
        }

        return $context;
    }

    private function buildPrompt(string $message, array $context): string
    {
        $services = json_encode($context['services'], JSON_UNESCAPED_UNICODE);
        $orders = json_encode($context['orders'], JSON_UNESCAPED_UNICODE);
        $userName = $context['user_name'];

        return <<<PROMPT
Kamu adalah CS Blue Laundry. Nama pelanggan: {$userName}.
LAYANAN: {$services}
PESANAN: {$orders}
Jawab singkat (maks 2 kalimat) dalam Bahasa Indonesia.
Pertanyaan: {$message}
Jawaban:
PROMPT;
    }

    private function isOrderRelated(string $message): bool
    {
        $keywords = ['order', 'pesanan', 'status', 'laundry saya', 'tracking', 'kode', 'sampai mana', 'selesai'];
        $messageLower = strtolower($message);
        return collect($keywords)->contains(fn($k) => str_contains($messageLower, $k));
    }
}