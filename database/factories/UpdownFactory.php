<?php

namespace Database\Factories;

use App\Models\Updown;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Updown>
 */
class UpdownFactory extends Factory
{
    protected $model = Updown::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'updown_message' => $this->faker->sentence,
            'updown' => $this->faker->sentence,
            'user_id' => User::factory(),
        ];
    }
}
