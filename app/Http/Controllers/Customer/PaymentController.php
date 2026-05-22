<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('customer.payments.upload', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $this->authorize('view', $order);

        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:' . $order->total_price, 'max:' . $order->total_price],
            'payment_method' => ['required', 'in:transfer,cash,e-wallet'],
            'proof_image' => ['required', 'image', 'max:2048'],
            'notes' => ['nullable', 'string'],
        ]);

        $path = $request->file('proof_image')->store('payments', 'public');

        Payment::create([
            'order_id' => $order->id,
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'proof_image' => $path,
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);

        return redirect()->route('customer.orders.show', $order)
            ->with('success', 'Bukti pembayaran berhasil diupload! Menunggu verifikasi admin.');
    }
}
