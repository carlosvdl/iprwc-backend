<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class StoreProductRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string|url',
            'price' => 'required|numeric'
        ];
    }
}
