<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Chat::SENDER_ID => User::factory(),
            Chat::RECEIVER_ID => User::inRandomOrder()->value('id'),
            Chat::CREATED_AT => $this->faker->dateTimeThisYear
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Chat $chat) {
            ChatMessage::factory($this->faker->numberBetween(10, 20))->custom($chat)->create();
        });
    }
}
