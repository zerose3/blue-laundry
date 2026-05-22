<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class TrackingApiController extends Controller
{
    public function track(string $orderCode): JsonResponse
    {
        $order = Order::with(['user', 'service'])
            ->where('order_code', $orderCode)
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'order_code' => $order->order_code,
                'customer_name' => $order->user->name,
                'service' => $order->service->name,
                'status' => $order->status,
                'status_color' => $order->status_color,
                'progress' => $order->status_progress,
                'total_price' => $order->total_price,
                'created_at' => $order->created_at->format('d M Y H:i'),
                'updated_at' => $order->updated_at->format('d M Y H:i'),
            ]
        ]);
    }
}
