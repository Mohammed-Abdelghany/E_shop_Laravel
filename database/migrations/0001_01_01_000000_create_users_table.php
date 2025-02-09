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

    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('phone')->unique();
      $table->enum('role', ['buyer', 'seller', 'employee', 'admin'])->default('buyer');
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->string('img')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });

    Schema::create('password_reset_tokens', function (Blueprint $table) {
      $table->string('email')->primary();
      $table->string('token');
      $table->timestamp('created_at')->nullable();
    });

    
    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary();
      $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // حذف الجلسات عند حذف المستخدم
      $table->string('ip_address', 45)->nullable();
      $table->text('user_agent')->nullable();
      $table->longText('payload');
      $table->integer('last_activity')->index();
    });

    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description')->nullable();
      $table->string('img')->nullable();
      $table->integer('no_of_products')->default(0);
      $table->timestamps();
    });

    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description')->nullable();
      $table->decimal('price', 10, 2);
      $table->string('img')->nullable();
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // حذف المنتج عند حذف المستخدم
      $table->foreignId('category_id')->constrained()->onDelete('cascade'); // حذف المنتج عند حذف التصنيف
      $table->timestamps();
    });

    Schema::create('productimages', function (Blueprint $table) {
      $table->id();
      $table->foreignId('product_id')->constrained()->onDelete('cascade'); // حذف الصور عند حذف المنتج
      $table->string('image_path');
      $table->timestamps();
    });

    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // حذف الطلبات عند حذف المستخدم
      $table->enum('status', ['pending', 'accepted', 'rejected', 'delivered'])->default('pending');
      $table->decimal('total_price', 10, 2);
      $table->timestamps();
    });

    Schema::create('carts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // حذف السلة عند حذف المستخدم
      $table->foreignId('product_id')->constrained()->onDelete('cascade'); // حذف العنصر عند حذف المنتج
      $table->integer('quantity');
      $table->decimal('total_price', 10, 2);
      $table->timestamps();
    });

    Schema::create('reviews', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // حذف المراجعات عند حذف المستخدم
      $table->foreignId('product_id')->constrained()->onDelete('cascade'); // حذف المراجعات عند حذف المنتج
      $table->text('comment')->nullable();
      $table->integer('rating');
      $table->timestamps();
    });

    Schema::create('product_user', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('product_id')->constrained()->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_user');
    Schema::dropIfExists('reviews');
    Schema::dropIfExists('carts');
    Schema::dropIfExists('orders');
    Schema::dropIfExists('product_images');
    Schema::dropIfExists('products');
    Schema::dropIfExists('categories');
    Schema::dropIfExists('sessions');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('users');
  }
};
