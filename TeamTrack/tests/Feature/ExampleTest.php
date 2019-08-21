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
        $response = $this->get('/')

        ->assertSee('Teamtrack');
    }

    public function test_LoginPageTest()
    {
        $response = $this->get('/login')

        ->assertSee('login');
    }


    public function test_RegisterPageTest()
    {
        $response = $this->get('/register')

        ->assertSee('/register');
    }

}
