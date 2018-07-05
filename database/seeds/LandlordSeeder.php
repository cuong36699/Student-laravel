<?php

use Illuminate\Database\Seeder;
use App\Models\Landlord;
use App\Models\Oppidan;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Landlord::truncate();
   
        Oppidan::all()->each(function ($oppidan)
        {
        	$oppidan->landlord()->save(factory(Landlord::class)->make());
        });
    }
}
