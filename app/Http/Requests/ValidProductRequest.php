<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class ValidProductRequest extends RequestAbstract
{
    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric|exists:products,id'
        ];
    }
}
