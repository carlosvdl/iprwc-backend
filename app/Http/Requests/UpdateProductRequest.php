<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UpdateProductRequest extends RequestAbstract
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
            'id' => 'required|numeric|exists:products,id',
            'title' => 'string|min:3',
            'description' => 'string|min:4',
            'image_url' => 'string|url',
            'price' => 'numeric|min:1'
        ];
    }
}
