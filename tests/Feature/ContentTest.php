<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function get_all_contents()
    {
        $contents = Content::factory()->count(10)->create();

        $response = $this->get('/api/contents');

        $response
            ->assertStatus(200)
            ->assertJsonCount($contents->count());
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
            'message' => 'Content record created'
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function update_content()
    {
        $this->withoutExceptionHandling();

        $response = $this->put('/api/content/1', [
            "content_name" => "bar",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => false,
            "is_paid_subscription" => true
        ]);

        $response->assertStatus(200)->assertJson([
            'message' => 'Records updated successfully'
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function delete_content()
    {
        $contents = Content::factory()->count(10)->create();

        $response = $this->delete('/api/content/1');

        $response
            ->assertStatus(202)
            ->assertJson([
                'message' => 'Records deleted'
            ]);

        $response
            ->assertJsonCount($contents->count() - 1);
    }
}
