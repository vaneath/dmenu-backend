<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:50'],
            'last_name' => ['string', 'max:50'],
            'profile_img_path' => ['string'],
            'email' => ['string', 'max:50', 'unique:owners'],
            'password' => ['string', 'max:255'],
            'phone_number' => ['string', 'max:20', 'unique:owners'],
        ];
    }
}
