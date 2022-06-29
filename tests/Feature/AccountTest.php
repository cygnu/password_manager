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
}
