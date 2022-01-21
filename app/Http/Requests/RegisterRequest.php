<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class RegisterRequest extends RequestAbstract
{
    protected function prepareForValidation()
    {
        $this->merge(['full_name' => 'fullName']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|min:5'
        ];
    }
}
