<?php

namespace Database\Factories;

use App\Http\Enums\ActiveStatus;
use App\Http\Enums\UserRole;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
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
            User::NAME => $this->faker->name(),
            User::USERNAME => $this->faker->unique()->userName(),
            User::PASSWORD => bcrypt('password'),
            User::ROLE => $this->faker->randomElement([UserRole::CONSULTANT->value, UserRole::WORKER->value]),
            User::STATUS => $this->faker->randomElement(ActiveStatus::values()),
            User::CREATED_AT => $this->faker->dateTimeThisYear,
        ];
    }

    public function abd(): static
    {
        return $this->state(fn(array $attributes) => [
            User::NAME => 'Abdalrahman Alshantawi',
            User::USERNAME => 'abood',
            User::ROLE => UserRole::ADMIN->value,
            User::STATUS => ActiveStatus::ACTIVE->value,
            User::PASSWORD => bcrypt('12345678'),
        ]);
    }

    public function musab(): static
    {
        return $this->state(fn(array $attributes) => [
            User::NAME => 'Musab Naeem',
            User::USERNAME => 'musab_naeem',
            User::ROLE => UserRole::ADMIN->value,
            User::STATUS => ActiveStatus::ACTIVE->value,
            User::PASSWORD => bcrypt('12345678'),
        ]);
    }
}
