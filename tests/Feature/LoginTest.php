<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_login_form_is_accessible()
    {
        $response = $this->get('/login');

        $this->assertEquals(200, $response->status());
    }

    public function test_register_form_is_accessible()
    {
        $response = $this->get('/register');

        $this->assertEquals(200, $response->status());
    }

}
