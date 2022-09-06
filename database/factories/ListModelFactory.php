<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => null,
            "name" => fake()->regexify("^[a-zA-Z0-9]{32}$"),
            "description" => fake()->regexify("^[a-zA-Z0-9]{32}$")
        ];
    }

    public function with_random_user()
    {
        $user = User::factory()->create();
        return $this->with_user($user);
    }

    public function with_user($user)
    {
        return $this->state(function (array $attributes) use ($user) {
            return ["user_id" => $user->id];
        });
    }
}
