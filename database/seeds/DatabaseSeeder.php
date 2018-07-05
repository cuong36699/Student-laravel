<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserStudentSeeder::class,
            ViolationSeeder::class,
            OppidanSeeder::class,
            LandlordSeeder::class,
            RisidentSeeder::class,
            MemberSeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
