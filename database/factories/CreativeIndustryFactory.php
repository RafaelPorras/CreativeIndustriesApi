<?php

namespace Database\Factories;

use App\Models\CreativeIndustry;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreativeIndustryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreativeIndustry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'founded_at' => $this->faker->date(),
            'country_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
