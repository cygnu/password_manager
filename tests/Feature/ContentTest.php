<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function get_all_contents()
    {
        $response = $this->get('/api/contents');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function get_content()
    {
        $response = $this->get('/api/content/1');

        $response->assertStatus(200);
    }
}
