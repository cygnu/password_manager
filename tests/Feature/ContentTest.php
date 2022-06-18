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

    /**
     * @return void
     * @test
     */
    public function create_content()
    {
        $response = $this->post('/api/contents', [
            "content_name" => "foo",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => true,
            "is_paid_subscription" => false
        ]);

        $response->assertStatus(201)->assertJson([
            'create' => true
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function update_content()
    {
        $response = $this->put('/api/contents/1', [
            "content_name" => "bar",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => false,
            "is_paid_subscription" => true
        ]);

        $response->assertStatus(201)->assertJson([
            'create' => true
        ]);;
    }
}
