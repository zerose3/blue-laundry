<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'service_id',
        'weight',
        'quantity',
        'total_price',
        'notes',
        'status',
        'payment_status',
        'pickup_address',
        'delivery_address',
        'pickup_date',
        'delivery_date',
        'qr_code',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'total_price' => 'decimal:2',
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'menunggu' => 'yellow',
            'dipickup' => 'blue',
            'dicuci' => 'indigo',
            'dikeringkan' => 'cyan',
            'disetrika' => 'orange',
            'diantar' => 'purple',
            'selesai' => 'green',
            default => 'gray'
        };
    }

    public function getStatusProgressAttribute(): int
    {
        $steps = ['menunggu', 'dipickup', 'dicuci', 'dikeringkan', 'disetrika', 'diantar', 'selesai'];
        return (array_search($this->status, $steps) + 1) * 14;
    }
}
