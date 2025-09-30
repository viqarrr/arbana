<?php
// database/seeders/ServiceSeeder.php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'porter',
                'description' => 'Professional porter to carry your equipment and supplies during the trek',
                'price' => 150000,
            ],
            [
                'name' => 'guide',
                'description' => 'Experienced local guide familiar with mountain routes and safety procedures',
                'price' => 200000,
            ],
            [
                'name' => 'documentation',
                'description' => 'Professional photography and videography service for your adventure',
                'price' => 300000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}