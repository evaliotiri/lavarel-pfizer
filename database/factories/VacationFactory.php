<?php

namespace Database\Factories;

use App\Models\Vacation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'to' => $this->faker->dateTime,
            'from' => $this->faker->dateTime,
            'user_id' => $this->faker->randomElement(User::all()),
        ];
    }
}
