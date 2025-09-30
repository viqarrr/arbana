<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'mountain_id',
        'type',
        'title',
        'slug',
        'duration',
        'price',
        'package_type',
        'capacity',
        'includes',
        'excludes',
        'status',
        'featured_image',
        'departure_date'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'price' => 'decimal:2'
    ];

    public function mountain(): BelongsTo
    {
        return $this->belongsTo(Mountain::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    
    public function packages()
    {
        return $this->hasMany(TripPackage::class);
    }

    /**
     * Check if date is weekend
     */
    public static function isWeekend(string $date): bool
    {
        $dayOfWeek = Carbon::parse($date)->dayOfWeek;
        return in_array($dayOfWeek, [Carbon::FRIDAY, Carbon::SATURDAY, Carbon::SUNDAY]);
    }

    /**
     * Check if week is available for booking
     */
    public static function isWeekAvailable(string $date): bool
    {
        $startOfWeek = Carbon::parse($date)->startOfWeek();
        $endOfWeek = Carbon::parse($date)->endOfWeek();

        return !self::whereHas('bookings', function ($query) {
            $query->where('status', 'confirmed');
        })->whereBetween('departure_date', [$startOfWeek, $endOfWeek])
            ->exists();
    }

    /**
     * Get unavailable weeks
     */
    public static function getUnavailableWeeks(): array
    {
        $bookedTrips = self::whereHas('bookings', function ($query) {
            $query->where('status', 'confirmed');
        })->with('bookings')->get();

        $unavailableWeeks = [];
        foreach ($bookedTrips as $trip) {
            if ($trip->departure_date) {
                $startOfWeek = $trip->departure_date->startOfWeek();
                $endOfWeek = $trip->departure_date->endOfWeek();
                $unavailableWeeks[] = [
                    'start' => $startOfWeek->format('Y-m-d'),
                    'end' => $endOfWeek->format('Y-m-d')
                ];
            }
        }

        return $unavailableWeeks;
    }
}
