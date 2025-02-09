<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Size;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
      'img' => 'cat-6',
      'price' => fake()->numberBetween(100, 1000),
      'category_id' => fake()->numberBetween(1, 20),
      'user_id' => fake()->numberBetween(1, 20),

      //
    ];
  }

  public function configure()
  {
      return $this->afterCreating(function (Product $product) {
          // اربط المنتج مع أحجام عشوائية
          $sizes = Size::inRandomOrder()->take(2)->get(); // مثلاً هياخد 2 أحجام عشوائية
          $product->sizes()->attach($sizes);
      });
}};
