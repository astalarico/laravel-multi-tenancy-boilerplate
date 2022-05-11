<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create(
            [
                'email'      => 'talarico@michigandigital.com', 
                'name' => 'Anthony Talarico', 
                'password'   => bcrypt('password'),
                'organization_id' => null
        ]);
        \App\Models\Organization::factory(30)->create();
        for( $i = 1 ; $i <= 30; $i++ ){
            // \App\Models\User::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Member::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Event::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Venue::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Amenity::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Category::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
            // \App\Models\Region::factory()->create(['organization_id' => \App\Models\Organization::all()->random()->id]);
        }
    }
}
