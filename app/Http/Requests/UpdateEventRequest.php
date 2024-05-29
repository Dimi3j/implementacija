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
            'ticket_price' => 'nullable|numeric|min:0',
            'ticket_url' => 'nullable|url',
            'from' => 'required|date|after_or_equal:today',
            'to' => 'required|date|after_or_equal:from',
            'image_url' => 'nullable|url',
            'comment' => 'nullable|string',
            'contact' => 'nullable|string|email',
            'location' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'from.after_or_equal' => 'The event start date must be today or later.',
            'to.after_or_equal' => 'The event end date must be after or equal to the start date.',
        ];
    }
}
