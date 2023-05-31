<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Institute;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InstituteController
 */
class InstituteControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $institutes = Institute::factory()->count(3)->create();

        $response = $this->get(route('institute.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $institute = Institute::factory()->create();

        $response = $this->get(route('institute.show', $institute));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
