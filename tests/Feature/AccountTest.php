<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * @test
     */
    public function get_all_accounts()
    {
        $content = Content::factory()->create();

        $accounts = Account::factory()
                        ->count(5)
                        ->create([
                            'content_id' => $content->content_id
                        ]);

        // dd($accounts->toArray());

        $response = $this->getJson('/api/accounts');

        $response
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_account()
    {
        $content = Content::factory()->create();

        $accounts = Account::factory()
                        ->count(5)
                        ->create([
                            'content_id' => $content->content_id
                        ]);

        $first_account_id = $accounts->toArray()[0]["account_id"];
        dump($first_account_id);

        $response = $this->getJson("/api/account/$first_account_id");
        // dd($response->json());

        $response->assertStatus(200);
    }
}
