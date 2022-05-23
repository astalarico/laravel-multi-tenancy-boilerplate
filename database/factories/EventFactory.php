<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Organization;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'users' => null,
            'slug' => $this->faker->slug,
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'twitter' => $this->faker->url(),
            'tiktok' => $this->faker->url(),
            'youtube' => $this->faker->url(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'website' => $this->faker->url(),
            'profile_image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'active' => $this->faker->boolean(),
            'featured' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'excerpt' => $this->faker->text,
            'organization_id' => Organization::factory(),
        ];
    }
}
