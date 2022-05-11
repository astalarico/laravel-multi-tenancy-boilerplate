<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Organization;
use App\Models\Venue;

class VenueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'city' => $this->faker->city,
            'state' => $this->faker->word,
            'street' => $this->faker->streetName,
            'postal_code' => $this->faker->postcode,
            'secondary_address' => $this->faker->word,
            'facebook' => $this->faker->word,
            'instagram' => $this->faker->word,
            'twitter' => $this->faker->word,
            'tiktok' => $this->faker->word,
            'youtube' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->word,
            'profile_image' => $this->faker->word,
            'active' => $this->faker->boolean,
            'featured' => $this->faker->boolean,
            'description' => $this->faker->text,
            'excerpt' => $this->faker->word,
            'organization_id' => Organization::factory(),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
        ];
    }
}
