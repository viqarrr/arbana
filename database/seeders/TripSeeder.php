<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\TripPackage;
use App\Models\Mountain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        $mountains = Mountain::all();

        // === SAMPLE OPEN TRIP (beberapa gunung aja) ===
        $openTripMountains = ['Mt. Semeru', 'Mt. Lawu', 'Mt. Ijen'];
        foreach ($mountains->whereIn('name', $openTripMountains) as $mountain) {
            Trip::create([
                'mountain_id'    => $mountain->id,
                'type'           => 'open_trip',
                'title'          => $mountain->name . ' Open Trip Adventure',
                'slug'           => Str::slug($mountain->name . ' Open Trip Adventure'),
                'duration'       => 3,
                'capacity'       => 20,
                'status'         => 'published',
                'departure_date' => now()->addDays(rand(15, 45)),
                'price'          => rand(500000, 900000),
                'includes'       => '<ul><li>Professional guide</li><li>Meals</li></ul>',
                'excludes'       => '<ul><li>Personal equipment</li></ul>',
            ]);
        }

        // === SAMPLE CAMPGROUND (beberapa gunung aja) ===
        $campgroundMountains = ['Mt. Butak', 'Mt. Argopuro', 'Mt. Kawi'];
        foreach ($mountains->whereIn('name', $campgroundMountains) as $mountain) {
            $campgroundTrip = Trip::create([
                'mountain_id' => $mountain->id,
                'type'        => 'campground',
                'title'       => $mountain->name . ' Campground',
                'slug'        => Str::slug($mountain->name . ' Campground'),
                'duration'    => 2,
                'capacity'    => 30,
                'status'      => 'published',
            ]);

            $this->createPackages($campgroundTrip);
        }

        // === PRIVATE TRIP & FAMILY GATHERING untuk semua gunung ===
        foreach ($mountains as $mountain) {
            // Private Trip
            $privateTrip = Trip::create([
                'mountain_id' => $mountain->id,
                'type'        => 'private_trip',
                'title'       => $mountain->name . ' Private Expedition',
                'slug'        => Str::slug($mountain->name . ' Private Expedition'),
                'duration'    => 4,
                'capacity'    => 12,
                'status'      => 'published',
            ]);
            $this->createPackages($privateTrip);

            // Family Gathering
            $familyTrip = Trip::create([
                'mountain_id' => $mountain->id,
                'type'        => 'family_gathering',
                'title'       => $mountain->name . ' Family Gathering',
                'slug'        => Str::slug($mountain->name . ' Family Gathering'),
                'duration'    => 2,
                'capacity'    => 25,
                'status'      => 'published',
            ]);
            $this->createPackages($familyTrip);
        }
    }

    /**
     * Helper: create default packages for a trip
     */
    private function createPackages(Trip $trip): void
    {
        $packages = [
            [
                'name'     => 'Hemat',
                'price'    => rand(800000, 1000000),
                'includes' => '<ul><li>Guide</li><li>Meals</li></ul>',
                'excludes' => '<ul><li>Transport</li></ul>',
            ],
            [
                'name'     => 'Reguler',
                'price'    => rand(1100000, 1400000),
                'includes' => '<ul><li>Guide</li><li>Meals</li><li>Camping Gear</li></ul>',
                'excludes' => '<ul><li>Insurance</li></ul>',
            ],
            [
                'name'     => 'Combo',
                'price'    => rand(1500000, 1800000),
                'includes' => '<ul><li>All of Reguler</li><li>Transport</li></ul>',
                'excludes' => '<ul><li>Personal gear</li></ul>',
            ],
        ];

        foreach ($packages as $pkg) {
            $trip->packages()->create($pkg);
        }
    }
}
