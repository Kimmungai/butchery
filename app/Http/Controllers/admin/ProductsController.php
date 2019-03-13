<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\Supermarket;
use App\Services\ProductHandler;

class ProductsController extends Controller
{
  /*
  *Function to get product
  */
  public function get_product($id)
  {
    $product = Product::find($id);
    $productCategory = Category::find($product->category_id);
    $allCategories = Category::all();
    $productSupermarket = Supermarket::find($product->supermarket_id);
    return view('admin.products.product',compact('product','productCategory','allCategories','productSupermarket'));
  }

  /*
  *Function to update product
  */
  public function update_product( Request $request )
  {
    $validatedProduct = $this->validate_product($request);
    $updatedProduct = $this->handleProduct($request);
    Session::flash('message', "Details saved succesfully!");
    return back();
  }

  /*
  *Function to validate product data
  */
  private function validate_product($request,$product_id='')
  {
    $product=[
      'name' => 'required|nullable',
      'product_id' => 'required|numeric',
      'category_id' => 'required',
      'new_category' => 'nullable|max:255',
      'img1' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'img2' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'img3' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'img4' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'img5' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'quantity' => 'required|numeric',
      'sku' => 'required|max:255',
      'regularPrice' => 'required|numeric',
      'salePrice' => 'required|numeric',
      'excerpt' => 'nullable',
      'description' => 'nullable',
      'purchaseNote' => 'nullable',
      'type' => 'required|numeric',
      'virtualProduct' => 'required|numeric',
    ];

    $validatedProduct = $request->validate($product);

    return $validatedProduct;

  }

  /*
  *Function to preprocess product data before persisting on DB
  */
  protected function handleProduct($validatedProduct,$action='update')
  {
    switch ($action) {

      case 'update':
          //extract data for specific tables
          $productTableData = $validatedProduct->except(['new_category','quantity','height','width','color','size','weight','units_of_measure','measurement_system','_token','submit','product_id','category_id']);
          $inventoryTable = $validatedProduct->only(['product_id','quantity']);
          $variationTable = $validatedProduct->only(['product_id','units_of_measure','measurement_system','height','width','color','size','weight']);
          $product_id = $validatedProduct->input('product_id');

          //create new category if new category field is non null
          if( $validatedProduct->input('new_category') != '' )
          {
            $new_category_data = [
              'name' => $validatedProduct->input('new_category'),
              'department_id' => $validatedProduct->input('department_id')
            ];
            $new_category = ProductHandler::createCategory($new_category_data);
            //assign ne category to this product id
            ProductHandler::createProductCategory($product_id,$new_category->id);
          }

          //assign chosen categories to product
          ProductHandler::removeProductCategories($product_id);//first remove all categories
          foreach ($validatedProduct->input('category_id') as $category_id)
          {
            $new_category = ProductHandler::createProductCategory($product_id,$category_id);
          }
            $updatedProduct = ProductHandler::updateProduct($product_id,$productTableData,$inventoryTable,$variationTable);
            return $updatedProduct;
        break;

      case 'create':
        // code...
        break;

      default:
        // code...
        break;
    }

    return $validatedProduct;
  }

}
