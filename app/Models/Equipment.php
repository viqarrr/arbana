<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock_quantity',
        'price_one_day',
        'price_two_days', 
        'price_extra_per_day',
        'image_path'
    ];

    protected $casts = [
        'price_one_day' => 'float:2',
        'price_two_days' => 'float:2',
        'price_extra_per_day' => 'float:2'
    ];

    public function bookingRentalItems(): HasMany
    {
        return $this->hasMany(BookingRentalItem::class);
    }

    public function rentalBookings(): HasMany
    {
        return $this->hasMany(RentalBooking::class);
    }

    /**
     * Calculate rental price based on days
     */
    public function calculatePrice(int $days): float
    {
        if ($days == 1) {
            return $this->price_one_day;
        } elseif ($days == 2) {
            return $this->price_two_days;
        } else {
            return $this->price_two_days + (($days - 2) * $this->price_extra_per_day);
        }
    }

    /**
     * Check availability for date range
     */
    public function isAvailable(string $startDate, string $endDate, int $requestedQuantity): bool
    {
        $conflictingBookings = $this->rentalBookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($q) use ($startDate, $endDate) {
                          $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                      });
            })
            ->sum('quantity');

        return ($this->stock_quantity - $conflictingBookings) >= $requestedQuantity;
    }
}