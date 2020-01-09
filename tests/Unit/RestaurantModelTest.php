<?php

namespace Tests\Unit;

use App\Restaurant;
use PHPUnit\Framework\TestCase;

class RestaurantModelTest extends TestCase
{
    /**
     * A check fillable or guarded
     *
     * @test
     * @return void
     */
    public function guardedIsNull()
    {
        $model = new Restaurant();
        $guardedExists = property_exists($model,'guarded');
        $this->assertTrue($guardedExists);
        $this->assertEmpty($model->getGuarded());
    }
}
