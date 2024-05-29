<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'type_id' => 'required|exists:types,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|max:255',
            'ticket_price' => 'nullable|numeric',
            'ticket_url' => 'nullable|url',
            'from' => 'required|date|after_or_equal:today',
            'to' => 'required|date|after:from',
            'image_url' => 'required|url',
            'comment' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'from.after_or_equal' => 'The event start date must be today or later.',
            'to.after' => 'The event end date must be after the start date.',
        ];
    }
}
