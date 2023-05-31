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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_date' => $this->faker->dateTime(),
            'phone' => $this->faker->phoneNumber,
            'sex' => $this->faker->word,
            'nationality' => $this->faker->word,
            'address' => $this->faker->text,
            'socail_status' => $this->faker->word,
            'certificate_type' => $this->faker->word,
            'registered_before' => $this->faker->boolean,
            'approved' => $this->faker->boolean,
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
        ];
    }
}
