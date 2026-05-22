<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Cuci Kering Reguler',
                'slug' => 'cuci-kering-reguler',
                'description' => 'Layanan cuci kering standar dengan estimasi 24 jam',
                'price_per_kg' => 8000,
                'unit_type' => 'kg',
                'icon' => 'fa-soap',
                'estimation_hours' => 24,
            ],
            [
                'name' => 'Cuci Kering Express',
                'slug' => 'cuci-kering-express',
                'description' => 'Layanan cuci kering kilat 6 jam',
                'price_per_kg' => 15000,
                'unit_type' => 'kg',
                'icon' => 'fa-bolt',
                'estimation_hours' => 6,
            ],
            [
                'name' => 'Cuci Setrika',
                'slug' => 'cuci-setrika',
                'description' => 'Cuci bersih + setrika rapi',
                'price_per_kg' => 12000,
                'unit_type' => 'kg',
                'icon' => 'fa-shirt',
                'estimation_hours' => 48,
            ],
            [
                'name' => 'Setrika Saja',
                'slug' => 'setrika-saja',
                'description' => 'Setrika pakaian yang sudah dicuci',
                'price_per_kg' => 6000,
                'unit_type' => 'kg',
                'icon' => 'fa-iron',
                'estimation_hours' => 24,
            ],
            [
                'name' => 'Dry Cleaning',
                'slug' => 'dry-cleaning',
                'description' => 'Dry cleaning untuk pakaian premium',
                'price_per_kg' => 25000,
                'unit_type' => 'kg',
                'icon' => 'fa-star',
                'estimation_hours' => 72,
            ],
            [
                'name' => 'Cuci Sepatu',
                'slug' => 'cuci-sepatu',
                'description' => 'Pembersihan sepatu profesional',
                'price_per_unit' => 35000,
                'unit_type' => 'pcs',
                'icon' => 'fa-shoe-prints',
                'estimation_hours' => 48,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}