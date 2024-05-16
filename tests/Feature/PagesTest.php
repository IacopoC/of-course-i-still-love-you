<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_homepage_is_accessible()
    {
        $response = $this->get('/');

        $this->assertEquals(200, $response->status());
    }
}
