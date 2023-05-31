<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Institute;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SuggestionController
 */
class SuggestionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SuggestionController::class,
            'store',
            \App\Http\Requests\SuggestionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $content = $this->faker->paragraphs(3, true);
        $user = User::factory()->create();
        $institute = Institute::factory()->create();

        $response = $this->post(route('suggestion.store'), [
            'content' => $content,
            'user_id' => $user->id,
            'institute_id' => $institute->id,
        ]);

        $suggestions = Suggestion::query()
            ->where('content', $content)
            ->where('user_id', $user->id)
            ->where('institute_id', $institute->id)
            ->get();
        $this->assertCount(1, $suggestions);
        $suggestion = $suggestions->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }
}
