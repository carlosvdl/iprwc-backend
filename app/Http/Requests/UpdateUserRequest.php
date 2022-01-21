<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Pearl\RequestValidate\RequestAbstract;

class UpdateUserRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ["required", Rule::unique('users')->ignore(auth()->id())],
            'password' => 'nullable|string|min:8',
            'full_name' => 'nullable|string|min:5',
            'phone_number' => 'nullable|string|min:10|max:10',
            'country' => 'nullable|string|min:4',
            'state' => 'nullable|string|min:4',
            'zip_code' => 'nullable|string|min:6|max:6',
            'city' => 'nullable|string|min:3',
            'street' => 'nullable|string|min:6',
            'house_number' => 'nullable|min:1',
            'house_number_suffix' => 'nullable|string|min:1|max:1'
        ];
    }
}
