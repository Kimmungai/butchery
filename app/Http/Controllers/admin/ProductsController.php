<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Inventory;
use App\Variation;
use App\Category;
use App\Supermarket;
use App\Services\ProductHandler;
use App\Services\UserHandler;

class ProductsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  /*
  *Function to get product
  */
  public function get_product($id)
  {
    $product = Product::find($id);
    $productCategory = Category::find($product->category_id);
    $allCategories = UserHandler::UserSupermarketCategories( Auth::id() );
    $allSupermarket = UserHandler::UserSupermarket( Auth::id() );
    //$productSupermarket = Supermarket::find($product->supermarket_id);
    return view('admin.products.product',compact('product','productCategory','allSupermarket','allCategories'));
  }

  /*
  *Function to display product registration form
  */
  public function register_product( )
  {
    $allCategories = UserHandler::UserSupermarketCategories( Auth::id() );
    $allSupermarket = UserHandler::UserSupermarket( Auth::id() );
    return view('admin.products.register',compact('allCategories','allSupermarket'));
  }

  /*
  *Function to create new product
  */
  public function create_product( Request $request )
  {
    $validatedProduct = $this->validate_product($request);
    $saveProduct = $this->handleProduct($request,'create');
    Session::flash('message', "Details saved succesfully!");
    return redirect('/admin');
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
  *Function to delete product
  */
  public function delete_product( $id )
  {
    if($this->executeDelition( $id ))
    {
      Session::flash('message', "User deleted!");
    }
    else
    {
      Session::flash('error', "invalid!");
    }

    return redirect('/admin');

  }

  /*
  *Function to get trashed product
  */
  public function get_trashed_product( $id )
  {
    $product = Product::where('id',$id)->onlyTrashed()->first();
    $productInventory = Inventory::where('product_id',$id)->onlyTrashed()->first();
    $productVariation = Variation::where('product_id',$id)->onlyTrashed()->first();

    return view('admin.products.trashed-product',compact('product','productInventory','productVariation'));
  }

  /*
  *Function to get trashed products
  */
  public function get_trashed_products()
  {
    $products = Product::onlyTrashed()->get();
    return view('admin.products.trash',compact('products'));
  }

  /*
  *Function to restore trashed products
  */
  public function restore_product( $id )
  {
    if($this->executeDelition( $id, 'restore' ))
    {
      Session::flash('message', "Product restored!");
    }
    else
    {
      Session::flash('error', "invalid!");
    }

    return redirect('/trashed-products');

  }

  /*
  *Function to delete product permanently
  */
  public function remove_product( $id )
  {
    if($this->executeDelition( $id, 'permanent' ))
    {
      Session::flash('message', "Product deleted permanently!");
    }
    else
    {
      Session::flash('error', "invalid!");
    }

    return redirect('/trashed-products');

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
      'units_of_measure' => 'required|numeric',
      'measurement_system' => 'required|numeric',
      'supermarket_id' => 'required|numeric',
      'height'  => 'nullable|numeric',
      'width'   => 'nullable|numeric',
      'color'   => 'nullable',
      'size' => 'nullable|numeric',
      'weight' => 'nullable|numeric'
    ];

    if( $product_id == '' ){ unset($product['product_id']); }

    $validatedProduct = $request->validate($product);

    return $validatedProduct;

  }

  /*
  *Function to preprocess product data before persisting on DB
  */
  protected function handleProduct($validatedProduct,$action='update')
  {
    //extract data for specific tables
    $productTableData = $validatedProduct->except(['new_category','quantity','height','width','color','size','weight','units_of_measure','measurement_system','_token','submit','product_id','category_id']);
    $inventoryTable = $validatedProduct->only(['product_id','quantity']);
    $variationTable = $validatedProduct->only(['product_id','units_of_measure','measurement_system','height','width','color','size','weight']);

    switch ($action) {

      case 'update':
          $product_id = $validatedProduct->input('product_id');
          $productTableData = $this->handleProductImageUploads($validatedProduct,$productTableData,$product_id);
          //assign chosen categories to product
          ProductHandler::removeProductCategories($product_id);//first remove all categories
          foreach ($validatedProduct->input('category_id') as $category_id)
          {
            $new_category = ProductHandler::createProductCategory($product_id,$category_id);
          }
            $updatedProduct = ProductHandler::updateProduct($product_id,$productTableData,$inventoryTable,$variationTable);

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
          return $updatedProduct;
        break;

      case 'create':
      $productTableData['category_id'] = $validatedProduct->input('category_id')[0];

      $product = ProductHandler::createProduct($productTableData,$inventoryTable,$variationTable);
      $product_id = $product->id;

      //assign chosen categories to product
      ProductHandler::removeProductCategories($product_id);//first remove all categories
      foreach ($validatedProduct->input('category_id') as $category_id)
      {
        $new_category = ProductHandler::createProductCategory($product_id,$category_id);
      }

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

      $productTableData = $this->handleProductImageUploads($validatedProduct,$productTableData,$product_id);
      $productImages = [
        'img1' => isset($productTableData['img1']) ? $productTableData['img1'] : '',
        'img2' => isset($productTableData['img2']) ? $productTableData['img2'] : '',
        'img3' => isset($productTableData['img3']) ? $productTableData['img3'] : '',
        'img4' => isset($productTableData['img4']) ? $productTableData['img4'] : '',
        'img5' => isset($productTableData['img5']) ? $productTableData['img5'] : '',
      ];
      $updatedProduct = ProductHandler::updateProduct($product_id,$productImages);

        return $product;

        break;

      default:
        // code...
        break;
    }

    return $validatedProduct;
  }

  /*
  *Function to upload files
  */
  private function handleFileUpload($storageLoc,$request,$value)
  {
    if(!Storage::exists($storageLoc)) {

      Storage::makeDirectory($storageLoc, 0775, true); //creates directory

    }
    $path = Storage::url($request->file($value)->store($storageLoc));

    return asset($path);
  }

  /*
  *Function to upload image 1 image 5 of the product
  */
  protected function handleProductImageUploads($validatedProduct,$productTableData,$product_id)
  {
    if( $validatedProduct->hasFile('img1') )
    {
      $storageLoc = '/public/products/'.$product_id.'//featured/';
      $productTableData['img1'] = $this->handleFileUpload($storageLoc,$validatedProduct,'img1');
    }
    if( $validatedProduct->hasFile('img2') )
    {
      $storageLoc = '/public/products/'.$product_id.'//gallery/';
      $productTableData['img2'] = $this->handleFileUpload($storageLoc,$validatedProduct,'img2');
    }
    if( $validatedProduct->hasFile('img3') )
    {
      $storageLoc = '/public/products/'.$product_id.'//gallery/';
      $productTableData['img3'] = $this->handleFileUpload($storageLoc,$validatedProduct,'img3');
    }
    if( $validatedProduct->hasFile('img4') )
    {
      $storageLoc = '/public/products/'.$product_id.'//gallery/';
      $productTableData['img4'] = $this->handleFileUpload($storageLoc,$validatedProduct,'img4');
    }
    if( $validatedProduct->hasFile('img5') )
    {
      $storageLoc = '/public/products/'.$product_id.'//gallery/';
      $productTableData['img5'] = $this->handleFileUpload($storageLoc,$validatedProduct,'img5');
    }
    return $productTableData;
  }

  /*
  *Function to delete product
  */
  protected function executeDelition( $id, $type='soft' )
  {
    $product = Product::where('id',$id)->withTrashed()->first();
    $productInventory = Inventory::where('product_id',$id)->withTrashed()->first();
    $productVariation = Variation::where('product_id',$id)->withTrashed()->first();

    if(!$product || !$productInventory || !$productVariation){ return false; }


    switch ($type) {
      case 'soft':
        $product->delete();
        $productInventory->delete();
        $productVariation->delete();
        break;

      case 'permanent':
        $product->forceDelete();
        $productInventory->forceDelete();
        $productVariation->forceDelete();
        Storage::deleteDirectory('/public/products/'.$product->id.'');
        break;

      case 'restore':
        $product->restore();
        $productInventory->restore();
        $productVariation->restore();
        break;

      default:
        // code...
        break;
    }
    return true;
  }

}
