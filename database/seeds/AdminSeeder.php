<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        factory(Admin::class, 1)->create();
    }
}
