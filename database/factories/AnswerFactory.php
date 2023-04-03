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
            'content' => $this->faker->paragraphs(asText: true),
            'user_id' => User::inRandomOrder()->value('id'),
            'question_id' => Question::inRandomOrder()->value('id'),
            'created_at' => $this->faker->dateTime
        ];
    }
}
