<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\ProductImage;

use App\Models\Size;
use App\Models\ProductSize;

class MainController extends Controller
{


  public function detail()
  {
    $product = Product::where('id', request('id'))->with('images')->first();

    if (!$product) {
      return redirect()->back()->with('error', 'Product not found');
    }

    $reviews = Review::where('product_id', $product->id)->count();
    $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    $sizes = $product->sizes;

    return view('detail', [
      'product' => $product,
      'reviews' => $reviews,

      'related_products' => $related_products,
      'sizes' => $sizes
    ]);
  }

  public function shop()
  {
    return view('shop');
  }
  public function cart()
  {
    return view('cart');
  }

  public function products_categories()
  {
    $products = Product::with('images')->get();
    $categories = Category::all();
    $last_products = Product::orderBy('id', 'desc')->with('images')->take(10)->get();


    return view('welcome', compact('products', 'categories', 'last_products'));
  }
}
