<?php

namespace Database\Factories;

use App\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'description' => $this->faker->sentence,
            'code' => $this->faker->username,
            'semester_id' => rand(1,8),
            'program_id' => rand(1,5)
            
        ];
    }
}
