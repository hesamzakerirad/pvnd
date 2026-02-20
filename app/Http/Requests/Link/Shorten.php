<?php

namespace App\Http\Requests\Link;

use App\Rules\NotAlreadyShortened;
use Illuminate\Foundation\Http\FormRequest;

class Shorten extends FormRequest
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
            'link' => ['required', 'url', new NotAlreadyShortened],
        ];
    }
}
