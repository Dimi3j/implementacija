<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:0',
            'ticket_url' => 'nullable|url',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'image_url' => 'nullable|url',
            'comment' => 'nullable|string',
            'contact' => 'nullable|string|email',
            'location' => 'nullable|string|max:255',
        ];
    }
}
