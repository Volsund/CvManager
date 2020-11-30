<?php

namespace Database\Factories;

use App\Models\Workplace;
use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkplaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workplace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cv_id' => CV::factory(),
            'company_name' => $this->faker->lexify('??????? LTD'),
            'position' => $this->faker->jobTitle,
            'schedule' => $this->faker->randomElement(["Full-time", "Part-time", "Rotating"]),
            'years_worked' => $this->faker->numberBetween(1, 50),
            'description' => $this->faker->text(200),
        ];
    }
}
