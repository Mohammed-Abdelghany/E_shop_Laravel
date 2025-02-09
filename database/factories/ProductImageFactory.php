<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $images = ['cat-6', 'cat-3', 'cat-4', 'cat-5', 'cat-2', 'cat-1'];

    return [
      'product_id' => fake()->numberBetween(3, 10),
      'image_path' => $images[array_rand(array: $images)],
      'created_at' => now(),
      'updated_at' => now(),

      //
    ];
  }
}
