<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Course;
use App\Models\Registeration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RegisterationController
 */
class RegisterationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RegisterationController::class,
            'store',
            \App\Http\Requests\RegisterationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $birth_date = $this->faker->dateTime();
        $phone = $this->faker->phoneNumber;
        $sex = $this->faker->word;
        $nationality = $this->faker->word;
        $address = $this->faker->text;
        $socail_status = $this->faker->word;
        $certificate_type = $this->faker->word;
        $registered_before = $this->faker->boolean;
        $approved = $this->faker->boolean;
        $user = User::factory()->create();
        $course = Course::factory()->create();

        $response = $this->post(route('registeration.store'), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth_date' => $birth_date,
            'phone' => $phone,
            'sex' => $sex,
            'nationality' => $nationality,
            'address' => $address,
            'socail_status' => $socail_status,
            'certificate_type' => $certificate_type,
            'registered_before' => $registered_before,
            'approved' => $approved,
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        $registerations = Registeration::query()
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('birth_date', $birth_date)
            ->where('phone', $phone)
            ->where('sex', $sex)
            ->where('nationality', $nationality)
            ->where('address', $address)
            ->where('socail_status', $socail_status)
            ->where('certificate_type', $certificate_type)
            ->where('registered_before', $registered_before)
            ->where('approved', $approved)
            ->where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->get();
        $this->assertCount(1, $registerations);
        $registeration = $registerations->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }
}
