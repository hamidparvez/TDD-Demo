<?php

namespace Tests\Feature;

use App\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Default Listing Test
     *
     * @test
     * @return void
     */
    public function defaultListing()
    {
        $attributes = factory(Restaurant::class,3)->create();
        foreach ($attributes as $attribute) {
            $this->assertDatabaseHas('restaurants', $attribute->toArray());
        }
        $response = $this->get('/api/restaurants');

        $response->assertStatus(200);
    }

    /**
     * Checking opening to closed
     *
     * Assuming 2 is open 1 is yet to ready for serving 0 is closed
     * @test
     */
    public function sortedByOpeningState()
    {
        $open = [1,2,0];
        $attributes = factory(Restaurant::class,3)->make()->each(function ($restaurant,$key) use ($open){
            $restaurant->open = $open[$key];
            $restaurant->save();
        });

        $response = $this->get('/api/restaurants');
        $response->assertStatus(200);

        $sorted = $attributes->sortByDesc('open');
        $response->assertJson([
            'status' => 200,
            'message' => ['Success'],
            'data' => ['data' => $sorted->values()->toArray()],
        ]);
    }

    /**
     * Sort by best match
     *
     * @test
     */
    public function sortByBestMatch()
    {
        $option = [250,100,300];
        $column = 'bestMatch';
        $sort = 'best-match';
        $attributes = $this->insertIntoDB($option,$column);

        $response = $this->get("/api/restaurants?sort={$sort}");
        $response->assertStatus(200);

        $sorted = $attributes->sortByDesc($column);

        $response->assertJson([
            'status' => 200,
            'message' => ['Success'],
            'data' => ['data' => $sorted->values()->toArray()],
        ]);
    }

    /**
     * Sort by column
     *
     * @test
     */
    public function sortByNewest()
    {
        $option = [2500,1000,3000];
        $column = 'newestScore';
        $sort = 'newest';
        $attributes = $this->insertIntoDB($option,$column);

        $response = $this->get("/api/restaurants?sort={$sort}");
        $response->assertStatus(200);

        $sorted = $attributes->sortByDesc($column);

        $response->assertJson([
            'status' => 200,
            'message' => ['Success'],
            'data' => ['data' => $sorted->values()->toArray()],
        ]);
    }

    /**
     * Sort by column
     *
     * @test
     */
    public function sortByRatingAverage()
    {
        $option = [4,9,1];
        $column = 'ratingAverage';
        $sort = 'rating-average';
        $attributes = $this->insertIntoDB($option,$column);

        $response = $this->get("/api/restaurants?sort={$sort}");
        $response->assertStatus(200);

        $sorted = $attributes->sortByDesc($column);

        $response->assertJson([
            'status' => 200,
            'message' => ['Success'],
            'data' => ['data' => $sorted->values()->toArray()],
        ]);
    }

    /**
     * Sort by column
     *
     * @test
     */
    public function sortByPopularity()
    {
        $option = [91,133,50];
        $column = 'popularity';
        $sort = 'popularity';
        $attributes = $this->insertIntoDB($option,$column);

        $response = $this->get("/api/restaurants?sort={$sort}");
        $response->assertStatus(200);

        $sorted = $attributes->sortByDesc($column);

        $response->assertJson([
            'status' => 200,
            'message' => ['Success'],
            'data' => ['data' => $sorted->values()->toArray()],
        ]);
    }

    /**
     * Mocking db insert
     *
     * @param $option
     * @param $column
     * @return mixed
     */
    public function insertIntoDB($option,$column)
    {
        return factory(Restaurant::class,3)->make()->each(function ($restaurant,$key) use ($option,$column){
            $restaurant->$column = $option[$key];
            $restaurant->save();
        });
    }

    /**
     * Testing Search
     *
     * @test
     */
    public function searchingUsingName()
    {
        $names = ['First','Second','Third'];
        $attributes = factory(Restaurant::class,3)->make()->each(function ($restaurant,$key) use ($names){
            $restaurant->name = $names[$key];
            $restaurant->save();
        });
        $response = $this->get('/api/restaurants?search=First');

        $response->assertStatus(200);
        $response->assertJsonFragment([
           'name' => 'First'
        ]);
        $response->assertJsonMissing([
           'name' => 'Second'
        ]);
        $response->assertJsonMissing([
            'name' => 'Third'
        ]);

    }
}
