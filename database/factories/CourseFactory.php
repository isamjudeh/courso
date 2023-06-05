<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Course;
use App\Models\Institute;
use App\Models\Teacher;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'image' => fake()->imageUrl(),
            'description' => $this->faker->text,
            'institute_id' => Institute::factory(),
            'category_id' => Category::factory(),
            'regular_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sale_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sunday_start_time' => $this->faker->dateTime(),
            'sunday_end_time' => $this->faker->dateTime(),
            'monday_start_time' => $this->faker->dateTime(),
            'monday_end_time' => $this->faker->dateTime(),
            'tuesday_start_time' => $this->faker->dateTime(),
            'tuesday_end_time' => $this->faker->dateTime(),
            'wednesday_start_time' => $this->faker->dateTime(),
            'wednesday_end_time' => $this->faker->dateTime(),
            'thursday_start_time' => $this->faker->dateTime(),
            'thursday_end_time' => $this->faker->dateTime(),
            'friday_start_time' => $this->faker->dateTime(),
            'friday_end_time' => $this->faker->dateTime(),
            'saturday_start_time' => $this->faker->dateTime(),
            'saturday_end_time' => $this->faker->dateTime(),
            'address' => $this->faker->text,
            'main_points' => $this->faker->text,
            'register_open' => $this->faker->dateTime(),
            'register_close' => $this->faker->dateTime(),
            'hours' => $this->faker->numberBetween(-10000, 10000),
            'start_at' => $this->faker->dateTime(),
        ];
    }
}
