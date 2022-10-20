<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Settings::create([
            "compagny_name" => "Direct-Vision",
            "compagny_address" => "France-Saint Denis 5858",
            "code"=>"51485151585",
            "vat"=>"contact@direct-vision.com",
            "phone"=>"+330745123698"
        ]);
    }
}
