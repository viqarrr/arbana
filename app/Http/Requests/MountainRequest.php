<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MountainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'mdpl' => 'required|integer|min:0',
            'meeting_point' => 'required|string',
            'description' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}