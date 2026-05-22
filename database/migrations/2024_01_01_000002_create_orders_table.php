<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique(); // BL-20240521-001
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 8, 2)->default(0);
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 12, 2);
            $table->text('notes')->nullable();
            $table->enum('status', [
                'menunggu',
                'dipickup',
                'dicuci',
                'dikeringkan',
                'disetrika',
                'diantar',
                'selesai'
            ])->default('menunggu');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('pickup_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->timestamp('pickup_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
