<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
  public function run()
  {
    Product::create([
      'name' => 'T-Shirt',
      'category_id' => 1,
      'user_id' => 2,
      'size' => 'M',
      'price' => 15.99,
      'description' => 'A classic T-Shirt for the casual wearer.',

      'img' => 'cat1',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    Product::create([
      'name' => 'Hoodie',
      'user_id' => 2,
      'category_id' => 2,
      'size' => 'L',
      'price' => 29.99,
      'description' => 'A warm and cozy hoodie for the cold days.',

      'img' => 'cat-2',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
