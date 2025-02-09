<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [

      'name' => fake()->name(),
      'description' => fake()->sentence(3),
      'created_at' => now(),
      'updated_at' => now(),
      'img' => 'cat-1',
      'no_of_products' => fake()->numberBetween(1, 10),
    ];
  }
}
