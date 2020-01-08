<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Bootstraping intial settings
     */
    public function tearUp()
    {
        parent::tearUp();
        $this->withoutExceptionHandling();
    }
}
