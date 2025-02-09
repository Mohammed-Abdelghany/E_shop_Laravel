<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

  protected $fillable = [
    'name',
    'category_id',
    'size', 
  ];
  public function sizes()
  {
    return $this->belongsToMany(Size::class);
  }
  public function images()
  {
    return $this->hasMany(ProductImage::class, 'product_id');
  }
}
