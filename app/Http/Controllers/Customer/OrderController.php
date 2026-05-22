<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('service')->latest()->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)->get();
        return view('customer.orders.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'weight' => ['required', 'numeric', 'min:0.1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'pickup_address' => ['required', 'string'],
            'delivery_address' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
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
            'notes' => $validated['notes'],
            'status' => 'menunggu',
            'payment_status' => 'pending',
        ]);

        return redirect()->route('customer.orders.show', $order)
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function show(Order $order)
    {
if ($order->user_id !== auth()->id()) {
    abort(403);
}        $order->load(['service', 'items', 'payment']);
        return view('customer.orders.show', compact('order'));
    }
}
