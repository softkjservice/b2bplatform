<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_HomePageExist()
    {
        $response = $this->get('/');
        $response->assertLocation('/');
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CorrectTextOnHomePage()
    {
        $response = $this->get('/');
        $response->assertSeeText('Plotery tnące i tnąco bigujące');
        $response->assertSeeText('B2Bshop');
    }
}
