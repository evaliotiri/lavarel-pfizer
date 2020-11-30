<?php

namespace Database\Seeders;

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
        $this->call([DepartmentsSeeder::class, UsersSeeder::class, SkillsSeeder::class, VacationsSeeder::class, ]);

    }
}
