<?php

namespace Database\Factories;

use App\Business\States\Question\QuestionState;
use App\Models\Branch;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Question::TITLE => $this->faker->sentence(),
            Question::DESCRIPTION => $this->faker->paragraphs(asText: true),
            Question::STATUS => $this->faker->randomElement(QuestionState::all()->toArray()),
            Question::USER_ID => User::inRandomOrder()->value('id'),
            Question::BRANCH_ID => Branch::inRandomOrder()->value('id'),
            Question::ASSIGNEE_ID => $this->faker->randomElement([User::consultant()->value('id'), null]),
            Question::CREATED_AT => $this->faker->dateTimeThisYear,
        ];
    }
}
