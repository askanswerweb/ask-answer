<?php

namespace Database\Factories;

use App\Http\Enums\ActiveStatus;
use App\Http\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'password' => bcrypt('password'),
            'role' => UserRole::WORKER->value,
            'status' => $this->faker->randomElement(ActiveStatus::values()),
            'created_at' => $this->faker->date
        ];
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Osama Sadah',
            'username' => 'osama',
            'role' => UserRole::ADMIN->value,
            'status' => ActiveStatus::ACTIVE->value,
        ]);
    }
}
