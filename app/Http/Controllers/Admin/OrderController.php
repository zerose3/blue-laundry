<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function edit(Order $order)
    {
        $services = Service::where('is_active', true)->get();
        return view('admin.orders.edit', compact('order', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'quantity' => ['required', 'numeric', 'min:0.1'],
            'pickup_address' => ['required', 'string'],
            'delivery_address' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $service = Service::find($validated['service_id']);
        $totalPrice = $service->price_per_kg * $validated['quantity'];

        $order->update([
            'service_id' => $validated['service_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'pickup_address' => $validated['pickup_address'],
            'delivery_address' => $validated['delivery_address'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diperbarui!');
    }
    public function index(Request $request)
    {
        $query = Order::with(['user', 'service']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('order_code', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'));
        }

        $orders = $query->latest()->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'service', 'items', 'payment']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:menunggu,dipickup,dicuci,dikeringkan,disetrika,diantar,selesai'],
        ]);

        $order->update(['status' => $validated['status']]);

        // Send WhatsApp notification
        // $this->sendWhatsAppNotification($order);

        return back()->with('success', 'Status laundry berhasil diperbarui!');
    }

    public function invoice(Order $order)
    {
        $order->load(['user', 'service', 'items']);
        return view('admin.orders.invoice', compact('order'));
    }

    public function downloadInvoice(Order $order)
    {
        $order->load(['user', 'service', 'items']);
        $pdf = Pdf::loadView('admin.orders.invoice', compact('order'));
        return $pdf->download("invoice-{$order->order_code}.pdf");
    }
}
