<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content_name' => $this->facker->company(),
            'content_image' => $this->facker->imageUrl(),
            'content_url' => $this->facker->url(),
            'is_one_account' => $this->facker->boolean(15),
            'is_paid_subscription' => $this->facker->boolean(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
