<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Equipment;
use App\Models\RentalBooking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RentalBookingSeeder extends Seeder
{
  public function run(): void
  {
    $faker = Faker::create('id_ID');

    $userIds = User::pluck('id')->toArray();
    $equipmentList = Equipment::all();

    if ($equipmentList->isEmpty()) {
      $this->command->warn('⚠️ Tidak ada data equipment, seeder dilewati.');
      return;
    }

    foreach (range(1, 20) as $i) {
      $equipment = $equipmentList->random();
      $startDate = $faker->dateTimeBetween('-1 month', '+1 month');
      $totalDays = $faker->numberBetween(1, 7);
      $endDate = (clone $startDate)->modify("+{$totalDays} days");

      $quantity = $faker->numberBetween(1, 3);
      $totalPrice = $this->calculatePrice($equipment, $totalDays) * $quantity;

      DB::table('rental_bookings')->insert([
        'user_id' => $faker->optional()->randomElement($userIds),
        'equipment_id' => $equipment->id,
        'start_date' => $startDate->format('Y-m-d'),
        'end_date' => $endDate->format('Y-m-d'),
        'total_days' => $totalDays,
        'quantity' => $quantity,
        'total_price' => $totalPrice,
        'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
        'contact_name' => $faker->name(),
        'contact_phone' => $faker->phoneNumber(),
        'notes' => $faker->optional()->sentence(),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }

  /**
   * 💰 Hitung total harga berdasarkan hari
   */
  private function calculatePrice(Equipment $equipment, int $days): float
  {
    if ($days == 1) {
      return $equipment->price_one_day;
    } elseif ($days == 2) {
      return $equipment->price_two_days;
    } else {
      return $equipment->price_two_days + (($days - 2) * $equipment->price_extra_per_day);
    }
  }
}
