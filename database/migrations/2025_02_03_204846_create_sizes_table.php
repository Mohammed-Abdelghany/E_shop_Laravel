<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('sizes', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->enum('size', ['S', 'M', 'L', 'XL', 'XXL']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sizes');
  }
};
