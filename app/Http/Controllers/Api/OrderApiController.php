<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderApiController extends Controller
{
    public function services()
    {
        return response()->json([
            'success' => true,
            'data' => Service::where('is_active', true)->get()
        ]);
    }

    public function index()
    {
        $orders = auth()->user()->orders()->with('service')->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'weight' => ['required', 'numeric', 'min:0.1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'pickup_address' => ['required', 'string'],
            'delivery_address' => ['required', 'string'],
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $totalPrice = $service->price_per_kg * $validated['weight'];

        $order = Order::create([
            'order_code' => 'BL-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),
            'user_id' => auth()->id(),
            'service_id' => $validated['service_id'],
            'weight' => $validated['weight'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'pickup_address' => $validated['pickup_address'],
            'delivery_address' => $validated['delivery_address'],
            'status' => 'menunggu',
            'payment_status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order->load('service')
        ], 201);
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $order->load(['service', 'items', 'payment'])
        ]);
    }
}
