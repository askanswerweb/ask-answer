<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ChatMessage>
 */
class ChatMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ChatMessage::SENDER_ID => User::inRandomOrder()->value('id') ?: User::factory(),
            ChatMessage::RECEIVER_ID => User::inRandomOrder()->value('id') ?: User::factory(),
            ChatMessage::CHAT_ID => Chat::inRandomOrder()->value('id') ?: Chat::factory(),
            ChatMessage::CONTENT => $this->faker->sentences($this->faker->numberBetween(1, 3), asText: true),
            ChatMessage::SEEN => $this->faker->boolean,
            ChatMessage::CREATED_AT => $this->faker->dateTimeThisYear,
        ];
    }

    public function custom(Chat $chat)
    {
        return $this->state(fn($attributes) => [
            ChatMessage::CHAT_ID => $chat->id,
        ]);
    }
}
