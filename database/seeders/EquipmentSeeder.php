<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $equipment = [
            [
                'name' => 'Camping Tent (2-person)',
                'description' => 'Waterproof double-layer tent suitable for 2 people',
                'stock_quantity' => 20,
                'price_one_day' => 35000,
                'price_two_days' => 60000,
                'price_extra_per_day' => 25000,
            ],
            [
                'name' => 'Sleeping Bag',
                'description' => 'Warm sleeping bag suitable for mountain temperatures',
                'stock_quantity' => 40,
                'price_one_day' => 25000,
                'price_two_days' => 45000,
                'price_extra_per_day' => 18000,
            ],
            [
                'name' => 'Hiking Backpack (60L)',
                'description' => 'Large capacity hiking backpack with rain cover',
                'stock_quantity' => 30,
                'price_one_day' => 30000,
                'price_two_days' => 55000,
                'price_extra_per_day' => 22000,
            ],
            [
                'name' => 'Trekking Poles',
                'description' => 'Adjustable aluminum trekking poles (pair)',
                'stock_quantity' => 25,
                'price_one_day' => 15000,
                'price_two_days' => 28000,
                'price_extra_per_day' => 12000,
            ],
            [
                'name' => 'Headlamp',
                'description' => 'LED headlamp with batteries included',
                'stock_quantity' => 50,
                'price_one_day' => 10000,
                'price_two_days' => 18000,
                'price_extra_per_day' => 8000,
            ],
            [
                'name' => 'Camping Stove',
                'description' => 'Portable gas stove with fuel canister',
                'stock_quantity' => 15,
                'price_one_day' => 20000,
                'price_two_days' => 35000,
                'price_extra_per_day' => 15000,
            ],
            [
                'name' => 'Sleeping Mat',
                'description' => 'Foam sleeping mat for ground insulation',
                'stock_quantity' => 35,
                'price_one_day' => 12000,
                'price_two_days' => 22000,
                'price_extra_per_day' => 9000,
            ],
            [
                'name' => 'Rain Poncho',
                'description' => 'Waterproof rain poncho for hiking',
                'stock_quantity' => 30,
                'price_one_day' => 8000,
                'price_two_days' => 15000,
                'price_extra_per_day' => 6000,
            ],
        ];

        foreach ($equipment as $item) {
            Equipment::create($item);
        }
    }
}
