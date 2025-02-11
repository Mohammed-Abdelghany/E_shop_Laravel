<?php

use Database\Seeders\ProductSeeder;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::factory(10)->create();
    Category::factory(10)->create();
    Product::factory(10)->create();

    // إضافة السطر التالي لاستدعاء ProductSeeder
    $this->call(ProductSeeder::class);
  }
}
