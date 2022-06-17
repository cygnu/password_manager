<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function health_check()
    {
        dd(env('APP_ENV'), env('DB_DATABASE'), env('DB_CONNECTION'));
    }

    /**
     * @return void
     * @test
     */
    public function set_up()
    {
        parent::setUp();
        $this->seed('AccountSeeder');
    }
}
