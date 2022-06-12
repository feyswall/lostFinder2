<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LostCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LostCategory>
 */
class LostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            LostCategory::create([
                'name' => $this->faker->text($maxNbChars = 50),
            ])
        ];
    }
}
