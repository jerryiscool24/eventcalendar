<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->sentence(4),
            'from' => Carbon::now()->startOfMonth()->format('Y-m-d'),
            'to' => Carbon::now()->endOfMonth()->format('Y-m-d'),
            'days' => Arr::random(daysOfTheWeek(), rand(1, 6))
        ];
    }
}
