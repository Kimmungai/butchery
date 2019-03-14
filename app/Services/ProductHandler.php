<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\ProductCategories;

class ProductHandler
{
  /*
  *Function to create product
  */
  public static function createProduct($productData=[],$inventoryData=[],$variationData=[])
  {
    $product = Product::create($productData);
    $product->inventory()->create($inventoryData);
    $product->variation()->create($variationData);
    return $product;
  }

  /*
  *Function to update product
  */
  public static function updateProduct($product_id,$productData=[],$inventoryData=[],$variationData=[])
  {
    $product = Product::find($product_id);
    $product->update($productData);
    $product->inventory->update($inventoryData);
    $product->variation->update($variationData);
    return $product;
  }


  /*
  *Function to create new category
  */
  public static function createCategory($categoryData)
  {
    //check if category already exists
    if( Category::where('name',$categoryData['name'])->first() )
    {
      return self::updateCategory($categoryData);
    }

    $new_category = Category::create($categoryData);

    return $new_category;
  }

  /*
  *Function to update category
  */
  public static function updateCategory($category_id='', $categoryData)
  {
    if( $category_id )
    {
      $category = Category::find($category_id);
      $category->update( $categoryData );
      return $category;
    }

    $category = Category::where('name',$categoryData['name'])->first();
    $category->update( $categoryData );
    return $category;
  }

  /*
  *Function to create product category
  */
  public static function createProductCategory( $product_id, $category_id )
  {
    //check if product category exists
    if( $productCategory = ProductCategories::where('product_id',$product_id)->where( 'category_id',$category_id ) ->first() )
    {
      return $productCategory;
    }

    $productCategory = ProductCategories::create([
      'product_id' => $product_id,
      'category_id' => $category_id,
    ]);

    return $productCategory;

  }

  /*
  *Function to permanently delete product categories
  */
  public static function removeProductCategories($product_id)
  {
    ProductCategories::where('product_id',$product_id)->forceDelete();
  }

}
