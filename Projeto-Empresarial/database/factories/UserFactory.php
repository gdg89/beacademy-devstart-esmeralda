<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->cellphoneNumber(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->randomNumber(3),
            'neighbor' => $this->faker->text(10),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'complement' => $this->faker->text('40'),
            'birthday' => $this->faker->date(),
            'cpf' => $this->faker->cpf(false),
            'password' => bcrypt(now()), // password
        ];
    }
}
