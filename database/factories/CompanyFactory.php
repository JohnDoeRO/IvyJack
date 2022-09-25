<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->email,
            'telephone' => $this->faker->phoneNumber,
            'logo' => $this->faker->imageUrl(350, 350, 'animals', true),
        ];
    }

}
