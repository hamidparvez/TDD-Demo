<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Default Listing Test
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertDatabaseHas('restaurants',[]);
        $response = $this->get('/api/restaurants');

        $response->assertStatus(200);
    }
}
