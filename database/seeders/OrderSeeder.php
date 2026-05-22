<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('email', 'budi@gmail.com')->first();
        $service = Service::first();

        if (!$customer || !$service) return;

        $order = Order::create([
            'order_code' => 'BL-' . now()->format('Ymd') . '-DEMO',
            'user_id' => $customer->id,
            'service_id' => $service->id,
            'weight' => 3.5,
            'quantity' => 1,
            'total_price' => $service->price_per_kg * 3.5,
            'pickup_address' => $customer->address,
            'delivery_address' => $customer->address,
            'status' => 'dicuci',
            'payment_status' => 'paid',
            'notes' => 'Tolong hati-hati, ada kemeja putih.',
        ]);

        Payment::create([
            'order_id' => $order->id,
            'user_id' => $customer->id,
            'amount' => $order->total_price,
            'payment_method' => 'transfer',
            'status' => 'verified',
            'verified_at' => now(),
            'verified_by' => User::where('role', 'admin')->first()->id,
        ]);
    }
}