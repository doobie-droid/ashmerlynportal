<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'username' => fake()->userName(),
            'firstname' => fake()->firstName(),
            'middlename' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'year_id' => fake()->numberBetween(1, 6),
            'arm_id' => fake()->numberBetween(1, 6),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'date_of_birth' => fake()->dateTimeThisCentury(),
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' =>  Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
