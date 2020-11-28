<?php

namespace Database\Seeders;


use App\Models\Vacation;
use Illuminate\Database\Seeder;

class VacationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacation::factory()->times(30)->create();
    }
}
