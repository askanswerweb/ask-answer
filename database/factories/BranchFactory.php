<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Branch::NAME => $this->faker->name,
            Branch::CREATED_AT => $this->faker->dateTimeThisYear,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Branch $branch) {
            $branch->users()->sync(User::notAdmin()
                ->inRandomOrder()
                ->take($this->faker->numberBetween(3, 10))
                ->pluck('id')
                ->toArray());
        });
    }
}
