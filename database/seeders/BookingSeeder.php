<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingRentalItem;
use App\Models\BookingService;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $trips = Trip::all();
        $equipment = Equipment::all();
        $services = Service::all();
        $users = User::all();

        // Create 20 bookings
        foreach (range(1, 20) as $index) {
            $trip = $trips->random();
            $user = $users->random();
            $paxCount = rand(2, 10);
            
            // Base trip price
            $tripPrice = $trip->price * $paxCount;
            
            // Random departure date
            $departureDate = $trip->departure_date ?? now()->addDays(rand(10, 60));
            
            // Create booking
            $booking = Booking::create([
                'user_id' => rand(0, 1) ? $user->id : null, // 50% guest bookings
                'trip_id' => $trip->id,
                'booking_type' => $trip->type,
                'departure_date' => $departureDate,
                'total_price' => $tripPrice, // Will be updated after adding equipment & services
                'status' => ['pending', 'confirmed', 'cancelled'][rand(0, 2)],
                'contact_name' => $user->name,
                'contact_phone' => '08' . rand(1000000000, 9999999999),
                'pax_count' => $paxCount,
                'notes' => rand(0, 1) ? 'Special dietary requirements: vegetarian' : null,
            ]);

            $totalPrice = $tripPrice;

            // Add random equipment (30% chance)
            // if (rand(1, 10) <= 3 && $equipment->count() > 0) {
            //     $randomEquipment = $equipment->random(rand(1, 3));
                
            //     foreach ($randomEquipment as $item) {
            //         $quantity = rand(1, 3);
            //         $pricePerUnit = $item->price_1day; // Simplified for seeder
            //         $subtotal = $pricePerUnit * $quantity * $trip->duration;
                    
            //         BookingRentalItem::create([
            //             'booking_id' => $booking->id,
            //             'equipment_id' => $item->id,
            //             'quantity' => $quantity,
            //             'price_per_unit' => $pricePerUnit,
            //             'subtotal' => $subtotal
            //         ]);

            //         $totalPrice += $subtotal;
            //     }
            // }

            // Add random services (40% chance)
            // if (rand(1, 10) <= 4 && $services->count() > 0) {
            //     $randomServices = $services->random(rand(1, 2));
                
            //     foreach ($randomServices as $service) {
            //         $quantity = rand(1, 2);
            //         $subtotal = $service->price * $quantity;
                    
            //         BookingService::create([
            //             'booking_id' => $booking->id,
            //             'service_id' => $service->id,
            //             'quantity' => $quantity,
            //             'price' => $service->price,
            //             'subtotal' => $subtotal
            //         ]);

            //         $totalPrice += $subtotal;
            //     }
            // }

            // Update total price
            $booking->update(['total_price' => $totalPrice]);
        }
    }
}