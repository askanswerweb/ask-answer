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
            User::ROLE => $this->faker->randomElement(array_filter(UserRole::values(), fn($role) => $role != UserRole::ADMIN->value)),
            User::STATUS => $this->faker->randomElement(ActiveStatus::values()),
            User::CREATED_AT => $this->faker->dateTimeThisYear,
        ];
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            User::NAME => 'Osama Sadah',
            User::USERNAME => 'osama',
            User::ROLE => UserRole::ADMIN->value,
            User::STATUS => ActiveStatus::ACTIVE->value,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->branches()->sync(Branch::inRandomOrder()
                ->take($this->faker->numberBetween(1, 5))
                ->pluck('id')
                ->toArray());
        });
    }
}
