<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Teamtrack');
    }

    public function test_LoginPageTest()
    {
        $response = $this->get('/login')

        ->assertRedirect('/login');
    }
}
