<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'product_id' => fake()->numberBetween(3, 20),
      'user_id' => fake()->numberBetween(3, 20),
      'rating' => fake()->numberBetween(1, 5),
      'comment' => fake()->text(500),
      'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
      'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
      // Add more fields as needed for your review model, e.g., title, date, etc.
      //
    ];
  }
}
