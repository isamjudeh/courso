<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Institute;

class InstituteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Institute::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'image' => fake()->imageUrl(),
            'description' => $this->faker->text,
            'address' => $this->faker->text,
            'website' => fake()->url(),
            'phone' => $this->faker->phoneNumber,
            'facebook' => fake()->url(),
        ];
    }
}
