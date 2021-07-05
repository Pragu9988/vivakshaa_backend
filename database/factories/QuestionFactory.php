<?php

namespace Database\Factories;

use App\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'year' => $this->faker->year($max = 'now'),
            'description' => $this->faker->text(50),
            'type' => $this->faker->randomElement(array('Spring', 'Fall')),
            'thumbnail' => $this->faker->imageUrl($width = 1600, $height = 900),
            'course_id' => rand(1, 50),
            'program_id' => rand(1,5),
            'semester_id' => rand(1,8),
            'question_file' => $this->faker->imageUrl($width = 1600, $height = 900),
            'exam' => $this->faker->randomElement(array('Terminal', 'Sent-Up', 'Board')),
            'is_active' => rand(1,0)
        ];
    }
}
