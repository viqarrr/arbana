<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Trip;
use Carbon\Carbon;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $trip = Trip::find($this->input('trip_id'));

        $rules = [
            'trip_id' => 'required|exists:trips,id',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
            'equipment' => 'nullable|array',
            'equipment.*.id' => 'required|exists:equipment,id',
            'equipment.*.quantity' => 'required|integer|min:1',
            'services' => 'nullable|array',
            'services.*.id' => 'required|exists:services,id',
            'services.*.quantity' => 'required|integer|min:1'
        ];

        if ($trip) {
            // Pax count rules
            if ($trip->type === 'open_trip') {
                $rules['pax_count'] = 'required|integer|min:5|max:' . $trip->capacity;
            } else {
                $rules['pax_count'] = 'required|integer|min:1';
            }

            // Departure date rules
            if ($trip->type === 'open_trip' && $trip->departure_date) {
                $rules['departure_date'] = 'required|date|in:' . Carbon::parse($trip->departure_date)->format('Y-m-d');
            } elseif (in_array($trip->type, ['private_trip', 'campground', 'family_gathering'])) {
                $rules['departure_date'] = [
                    'required',
                    'date',
                    'after:today',
                    function ($attribute, $value, $fail) {
                        if (!Trip::isWeekend($value)) {
                            $fail('Departure date must be on a weekend.');
                        }
                        if (!Trip::isWeekAvailable($value)) {
                            $fail('This week is already booked. Please select another date.');
                        }
                    }
                ];
            }

            // Trip package rule (only for non-open trips)
            if ($trip->type !== 'open_trip') {
                $rules['trip_package_id'] = [
                    'required',
                    'integer',
                    function ($attribute, $value, $fail) use ($trip) {
                        $exists = $trip->packages()->where('id', $value)->exists();
                        if (!$exists) {
                            $fail('Invalid trip package selected for this trip.');
                        }
                    }
                ];
            }
        }

        return $rules;
    }
}
