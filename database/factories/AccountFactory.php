<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'account_id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'account_name' => $this->faker->company(),
            'content_id' => Content::factory(),
            'email_address' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->name(),
            'is_multi_factor_authentication' => $this->faker->boolean(10),
            'is_use_oauth2' => $this->faker->boolean(15),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
