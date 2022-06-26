<?php

namespace Tests\Feature;

use App\Models\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function get_all_contents()
    {
        $contents = Content::factory()->count(5)->create();
        // dump($contents->toArray());

        $response = $this->getJson('/api/contents?page=1');

        // $result = $response->json()["data"];
        // echo count($response->json());
        // echo count($result);

        $response
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_content()
    {
        $contents = Content::factory()->count(5)->create();

        $first_content_id= $contents->toArray()[0]["content_id"];
        dump($first_content_id);

        $response = $this->getJson("/api/content/$first_content_id");
        // dd($response);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function create_content()
    {
        $data = [
            "content_name" => "foo",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => true,
            "is_paid_subscription" => false
        ];

        $response = $this->postJson('/api/contents', $data);

        $response
            ->assertStatus(201)
            ->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_cannot_be_created_if_content_name_or_content_url_are_empty()
    {
        $data = [
            "content_name" => "",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => true,
            "is_paid_subscription" => false
        ];

        $response = $this->postJson('/api/contents', $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                "content_name" => "The content name field is required."
            ]);
    }

    /**
     * @test
     */
    public function update_content()
    {
        $content = Content::factory()->create();

        $data = [
            "content_name" => "bar",
            "content_image" => "https://via.placeholder.com/640x480.png/004400?text=perspiciatis",
            "content_url" => "http://www.denesik.net/aut-ut-blanditiis-occaecati-et.html",
            "is_one_account" => false,
            "is_paid_subscription" => true
        ];

        $this->withoutExceptionHandling();

        $response = $this->putJson("api/content/{$content->content_id}", $data);

        $response
            ->assertStatus(200)
            ->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function delete_content()
    {
        $contents = Content::factory()->count(5)->create();
        $first_content_id= $contents->toArray()[0]["content_id"];
        dump($first_content_id);

        $response = $this->deleteJson("/api/content/$first_content_id");

        $response
            ->assertStatus(202)
            ->assertJson([
                'message' => 'Records deleted'
            ]);

        // $result = $this->get('/api/contents?page=1');
    }
}
