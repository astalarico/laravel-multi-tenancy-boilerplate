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
            'slug' => $this->faker->slug,
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'facebook' => $this->faker->word,
            'instagram' => $this->faker->word,
            'twitter' => $this->faker->word,
            'tiktok' => $this->faker->word,
            'youtube' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'website' => $this->faker->word,
            'profile_image' => $this->faker->word,
            'active' => $this->faker->boolean,
            'featured' => $this->faker->boolean,
            'description' => $this->faker->text,
            'excerpt' => $this->faker->word,
            'organization_id' => Organization::factory(),
        ];
    }
}
