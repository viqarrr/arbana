<?php

namespace App\Http\Requests;

use App\Models\Equipment;
use Illuminate\Foundation\Http\FormRequest;

class RentalBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'equipment_id' => 'required|exists:equipment,id',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'quantity' => 'required|integer|min:1',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'notes' => 'nullable|string'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $equipment = Equipment::find($this->equipment_id);
            
            if ($equipment && !$equipment->isAvailable(
                $this->start_date,
                $this->end_date,
                $this->quantity
            )) {
                $validator->errors()->add('quantity', 'Insufficient stock available for the selected dates.');
            }
        });
    }
}