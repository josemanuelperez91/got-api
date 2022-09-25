<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'characterName' => $this->faker->unique()->name(),
            'characterLink' => $this->faker->url(),
            'characterImageThumb'  => $this->faker->imageUrl(),
            'royal' => $this->faker->boolean(),
            'allies' => json_encode([$this->faker->name(), $this->faker->name()]),
        ];
    }
}
