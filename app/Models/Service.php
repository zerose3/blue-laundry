<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_per_kg',
        'price_per_unit',
        'unit_type',
        'icon',
        'estimation_hours',
        'is_active',
    ];

    protected $casts = [
        'price_per_kg' => 'decimal:2',
        'price_per_unit' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
