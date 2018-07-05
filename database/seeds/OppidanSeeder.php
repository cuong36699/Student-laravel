<?php

use Illuminate\Database\Seeder;
use App\Models\Oppidan;
use App\Models\Student;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class OppidanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Oppidan::truncate();

        Student::all()->each(function ($student)
        {
        	$student->oppidans()->saveMany(factory(Oppidan::class, 2)->make());
        });
    }
}
