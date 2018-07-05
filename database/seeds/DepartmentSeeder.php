<?php

use Illuminate\Database\Seeder;
use App\Models\Department;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        factory(Department::class, 5)->create();
    }
}
