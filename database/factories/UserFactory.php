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
            'isAdmin' => 0,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => $this->faker->imageUrl(100, 100),
            'phone' => $this->faker->cellphoneNumber(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->randomNumber(3),
            'district' => $this->faker->text(10),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'complement' => $this->faker->text(10),
            'birthday' => $this->faker->date(),
            'cpf' => $this->faker->cpf(false),
            'cep' => $this->faker->numerify('#####-###'),
            'password' => bcrypt(now()),
        ];
    }
}
