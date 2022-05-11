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
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'contact_name' => $this->faker->word,
            'contact_email' => $this->faker->word,
            'facebook' => $this->faker->word,
            'instagram' => $this->faker->word,
            'twitter' => $this->faker->word,
            'tiktok' => $this->faker->word,
            'youtube' => $this->faker->word,
            'contact_phone' => $this->faker->word,
            'website' => $this->faker->word,
            'description' => $this->faker->text,
        ];
    }
}
