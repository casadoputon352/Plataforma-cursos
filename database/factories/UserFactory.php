<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function admin(): UserFactory
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('admin');
        });
    }

    /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function ouro(): UserFactory
    {
        return $this->afterCreating(function (User $user) {
            $user->syncPermissions('ouro');
        });
    }

    /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function prata(): UserFactory
    {
        return $this->afterCreating(function (User $user) {
            $user->syncPermissions('prata');
        });
    }

    /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */
    public function basico(): UserFactory
    {
        return $this->afterCreating(function (User $user) {
            $user->syncPermissions('basico');
        });
    }
}
