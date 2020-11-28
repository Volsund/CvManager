<?php

namespace Database\Factories;

use App\Models\EducationalInstitution;
use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalInstitutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationalInstitution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cv_id' => CV::factory(),
            'institution_name' => $this->faker->word,
            'faculty' => $this->faker->word,
            'study_program' => $this->faker->word,
            'degree' => $this->faker->randomElement(["Master's", "Bachelor's",]),
            'years_studied' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->randomElement(['Finished', 'Dropped out', 'In progress']),
        ];
    }
}
