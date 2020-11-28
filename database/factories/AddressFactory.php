<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'cv_id' => CV::factory(),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'address' => $this->faker->streetAddress,
            'apartment' => $this->faker->numberBetween(1, 999),
            'postal_code' => $this->faker->postcode
        ];
    }
}
