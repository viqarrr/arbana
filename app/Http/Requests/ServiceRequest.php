<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|in:porter,guide,documentation',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ];
    }
}
