<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking');
    }

    public function search(Request $request)
    {
        $request->validate([
            'order_code' => ['required', 'string'],
        ]);

        $order = Order::with(['user', 'service'])
            ->where('order_code', $request->order_code)
            ->first();

        if (!$order) {
            return back()->with('error', 'Order tidak ditemukan.');
        }

        return view('tracking', compact('order'));
    }
}
