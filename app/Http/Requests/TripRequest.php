<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Trip;

class TripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'mountain_id' => 'required|exists:mountains,id',
            'type' => 'required|in:open_trip,private_trip,campground',
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Additional rules for open trips
        if ($this->input('type') === 'open_trip') {
            $rules['departure_date'] = 'required|date|after:today';
        }

        // Additional rules for private trips and campgrounds
        if (in_array($this->input('type'), ['private_trip', 'campground'])) {
            $rules['package_type'] = 'required|in:basic,regular,premium';
            $rules['departure_date'] = [
                'nullable',
                'date',
                'after:today',
                function ($attribute, $value, $fail) {
                    if ($value && !Trip::isWeekend($value)) {
                        $fail('Departure date must be on a weekend (Friday, Saturday, or Sunday).');
                    }
                }
            ];
        }

        return $rules;
    }
}