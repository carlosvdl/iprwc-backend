<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->firstName(),
            'image_url' => "https://m.media-amazon.com/images/I/71H363udhGL._AC_SL1500_.jpg",
            'price' => $this->faker->numberBetween(2, 3),
        ];
    }
}
