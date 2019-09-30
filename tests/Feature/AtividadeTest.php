<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AtividadeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/user?api_token=79MSdwvQRI5tMrhdyvE8zAgyHZl9wGWpESRtFGbNYjo3uns7PLysW1fbxpLT');

        $response->assertStatus(200);
    }
}
