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

    public function test_list_messages_is_accessible()
    {
        $response = $this->get('/messages-list');

        $this->assertEquals(200, $response->status());
    }
}
