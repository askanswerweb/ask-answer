<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Answer::CONTENT => $this->faker->paragraphs(6, true),
            Answer::USER_ID => User::inRandomOrder()->value('id'),
            Answer::QUESTION_ID => Question::inRandomOrder()->value('id'),
            Answer::CREATED_AT => $this->faker->dateTimeThisYear
        ];
    }
}
