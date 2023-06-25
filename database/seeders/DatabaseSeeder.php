<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        for ($i = 0; $i < 20; $i++) {
           
            DB::table('real_estate')->insert([
                // 'name' => Str::random(10),
                // 'email' => Str::random(10) . '@gmail.com',
                'category_id' => 4,
                'sub_category_id' => 4,
                'title'=> 'The '.Str::random(10),
                'type' =>Arr::random(['offer','want']),
                'youtube'=>Str::random(50) ,
                'address'=>Str::random(100) ,
                'name' =>Str::random(10),
                'email' =>Str::random(10) . '@gmail.com',
                'phone'=>7908400485,
                'price' => rand(100, 1000),
                'negotiable' => Arr::random(['true','false']),
                'posted_by' =>Arr::random(['owner','broker','builder']),
                'furnish_type' => Arr::random(['unfurnished','semi furnished','fully furnished']),
                'property_type' => Arr::random(['duplex','flat','house','loft','condo','appartment','cabin/cottage']),
                'area' =>  rand(800, 3000),
                'unit' =>    Arr::random(['sq ft','sq m']),
                'no_of_rooms'=>Arr::random(['1 BHK','2 BHK','3 BHK','4 BHK']),
                'parking' => Arr::random(['no parking','attached parking','deattached parking']),
                'avilable_on' => Carbon::today()->subDays(rand(0, 365)),
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
// DatabaseSeeder.php
// Displaying DatabaseSeeder.php.

