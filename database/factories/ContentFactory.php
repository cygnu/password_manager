<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'content_id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'content_name' => $this->faker->company(),
            'content_image' => $this->faker->imageUrl($width=640, $height=480),
            'content_url' => $this->faker->url(),
            'is_one_account' => $this->faker->boolean(15),
            'is_paid_subscription' => $this->faker->boolean(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
