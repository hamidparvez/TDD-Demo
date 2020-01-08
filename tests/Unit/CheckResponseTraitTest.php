<?php

namespace Tests\Unit;

use App\Http\Traits\ResponseTrait;
use PHPUnit\Framework\TestCase;


class CheckResponseTraitTest extends TestCase
{
    use ResponseTrait;

    /**
     * Check Response Trait Has Success Method
     *
     * @test
     * @return void
     */
    public function checkSuccessMethod()
    {
        $exists = method_exists($this, 'successResponse');
        $this->assertTrue($exists);
    }
    /**
     * Check Response Trait Has Success Method
     *
     * @test
     * @return void
     */
    public function checkFailMethod()
    {
        $exists = method_exists($this, 'failResponse');
        $this->assertTrue($exists);
    }

}
