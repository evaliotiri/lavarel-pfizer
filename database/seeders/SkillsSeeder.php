<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::factory()
            ->times(50)
            ->hasRoles(1)
            ->create();
    }
}
