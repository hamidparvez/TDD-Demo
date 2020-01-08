<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotFoundJsonTest extends TestCase
{
    /**
     * Checking API Endpoint Not Found Json
     *
     * @test
     * @return void
     */
    public function apiNotFoundCheck()
    {
        $response = $this->get('/api/');

        $response->assertStatus(404);
        $response->assertJson([
            'data' => null,
            'message' => ['Not Found'],
            'status' => 404
        ]);
    }
}
