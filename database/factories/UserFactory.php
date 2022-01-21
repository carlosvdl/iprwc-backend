<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$SPGirhL/vQzvng6aSV1RNubkPFjAmcNUHlJ0y1x7tab84JeAQTjxa', // Wachtwoord, case-sensitive
            'full_name' => $this->faker->firstName()
        ];
    }
}
