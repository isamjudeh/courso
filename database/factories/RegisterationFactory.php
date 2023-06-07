<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Registeration;
use App\Models\User;

class RegisterationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registeration::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admin_approved' => $this->faker->boolean,
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
        ];
    }
}
