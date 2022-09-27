<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'actorName' => $this->faker->unique()->name(),
            'actorLink' => $this->faker->url(),
            'characterID' => $this->faker->randomNumber(),
        ];
    }
}
