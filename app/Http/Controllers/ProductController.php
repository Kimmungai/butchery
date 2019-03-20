<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supermarket;
use App\Category;

class ProductController extends Controller
{
  /*
  * function to get single product
  */
  public function get_product( $id )
  {
    $product = Product::find($id);
    $currentSupermarket = Supermarket::where('id',session('selectedSupermarket'))->get();
    $allSupermarkets = Supermarket::get();
    return view('single',compact('product','currentSupermarket','allSupermarkets'));
  }

  /*
  * function to show products page
  */
  public function get_products(  )
  {
    $currentSupermarket = Supermarket::where('id',session('selectedSupermarket'))->get();
    $allSupermarkets = Supermarket::get();
    return view('products',compact('currentSupermarket','allSupermarkets'));
  }

  /*
  * function to return products in a given category
  */
  public function get_products_in_category( $id )
  {
    $productCategory = Category::find($id);
    $product = Product::where('category_id',$id)->get();
    $currentSupermarket = Supermarket::where('id',session('selectedSupermarket'))->get();
    $allSupermarkets = Supermarket::get();
    return view('products',compact('product','currentSupermarket','allSupermarkets','productCategory'));
  }
}
