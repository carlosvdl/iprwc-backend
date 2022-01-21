<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Pearl\RequestValidate\RequestAbstract;

class DeleteFromShoppingCartRequest extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|numeric|exists:products,id',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator) : void
    {
        $validator->after(function ($validator) {
            if ($this->productIsNotInShoppingCart()) {
                $validator->errors()->add('message', 'Product is not in shopping cart');
            }
        });
    }

    protected function productIsNotInShoppingCart() : bool
    {
        $user = $this->user();
        $shoppingCartProducts = $user->shoppingCart->products;
        $productId = $this->input('product_id');

        return !$shoppingCartProducts->contains('id', $productId);
    }
}
