<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Organization;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->email(),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'twitter' => $this->faker->url(),
            'tiktok' => $this->faker->url(),
            'youtube' => $this->faker->url(),
            'contact_phone' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
            'description' => $this->faker->text,
        ];
    }
}
