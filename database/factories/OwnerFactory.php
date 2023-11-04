<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'profile_img_path' => fake()->imageUrl(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'password_confirmation' => fake()->password(),
            'phone_number' => fake()->phoneNumber(),
        ];
    }
}
