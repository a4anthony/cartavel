<?php

namespace A4anthony\Cartavel\Tests\Unit;

use A4anthony\Cartavel\Facades\Cartavel;
use A4anthony\Cartavel\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $cart = Cartavel::get(1);
        $this->assertTrue(true);
    }
}
