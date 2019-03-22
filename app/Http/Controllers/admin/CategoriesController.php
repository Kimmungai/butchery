<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Services\UserHandler;
use App\Services\CategoryHandler;
use App\Supermarket;

class CategoriesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /*
  *Function to display category registration form
  */
  public function register_category(  )
  {
    $allDepartments = UserHandler::userSupermarketDepartments( Auth::id() );
    return view('admin.category.register',compact('allDepartments'));
  }

  /*
  *Function to get create new category
  */
  public function create_category( Request $request )
  {
    $validatedCategory = $this->validateCategory($request);

    $newCategory = CategoryHandler::createCategory([
      'name' => $request->input('name'),
      'department_id' => $request->input('department_id'),
    ]);

    $validatedCategory = $this->handleFileUpload($request, $validatedCategory, $newCategory->id);
    $updatedCategory = CategoryHandler::updateCategory( $newCategory->id, $validatedCategory );
    Session::flash('message', "Details saved succesfully!");
    return redirect('admin');
  }

  /*
  *Function to get category
  */
  public function get_category( $id )
  {
    $category = Category::find($id);
    $allDepartments = UserHandler::userSupermarketDepartments( Auth::id() );
    return view('admin.category.category',compact('category','allDepartments'));
  }

  /*
  *Function to get categories
  */
  public function get_categories( )
  {
    $userSupermarkets  = UserHandler::UserSupermarket(Auth::id());

    $categories = Category::orderBy('id','Desc')->paginate(env('NUMBER_OF_ITEMS_IN_TABLE',1));
    return view('admin.category.index',compact('categories','userSupermarkets'));
  }

  /*
  *Function to get trashed categories
  */
  public function trashed_categories( )
  {
    $categories = Category::onlyTrashed()->get();
    return view('admin.category.trash',compact('categories'));
  }

  /*
  *Function to get trashed category
  */
  public function trashed_category( $id )
  {
    $category = Category::where('id',$id)->withTrashed()->first();
    $allDepartments = UserHandler::userSupermarketDepartments( Auth::id() );
    return view('admin.category.trashed-category',compact('category','allDepartments'));
  }

  /*
  *Function to restore trashed category
  */
  public function restore_category( $id )
  {
    if( $this->excuteDelition($id, 'restore') )
    {
      Session::flash('message', "Category Restored!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('trashed-categories');
  }

  /*
  *Function to delete category permanently
  */
  public function remove_category( $id )
  {
    if( $this->excuteDelition($id, 'permanent') )
    {
      Session::flash('message', "Category Deleted permanently!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('trashed-categories');
  }



  /*
  *Function to get update category
  */
  public function update_category( Request $request )
  {
    $category_id = $request->input('category_id');

    $validatedCategory = $this->validateCategory($request,$category_id);
    $validatedCategory = $this->handleFileUpload($request, $validatedCategory, $category_id);
    $updatedCategory = CategoryHandler::updateCategory( $category_id, $validatedCategory );
    Session::flash('message', "Details saved succesfully!");
    return back();
  }

  /*
  *Function to delete category
  */
  public function delete_category( $id )
  {
    if( $this->excuteDelition($id) )
    {
      Session::flash('message', "Category Deleted!");
    }
    else
    {
      Session::flash('error', "Invalid!");
    }

    return redirect('admin');
  }



  /*
  *Function to upload image
  */
  private function handleFileUpload($request, $validatedCategory, $category_id)
  {
    if( $request->hasFile('img') )
    {
      $storageLoc = env('CATEGORY_IMAGES_STORAGE_LOC','/public/categories/'.$category_id.'');

      $validatedCategory['img'] = $this->excuteFileUpload($storageLoc,$request,'img');
    }
    return $validatedCategory;
  }

  /*
  *Function to excute file upload
  */
  private function excuteFileUpload($storageLoc,$request,$value)
  {
    if(!Storage::exists($storageLoc)) {

      Storage::makeDirectory($storageLoc, 0775, true); //creates directory

    }
    $path = Storage::url($request->file($value)->store($storageLoc));

    return asset($path);
  }

  /*
  *Function to validate category
  */
  protected function validateCategory( $request, $category_id='' )
  {
    $data=[
      'name' => 'required|unique:categories,name,'.$category_id.'',
      'department_id' => 'required|numeric',
      'img' => 'nullable|max:10000|mimes:jpeg,bmp,png',
      'description' => 'nullable'
    ];

    $validatedCategory = $request->validate($data);

    return $validatedCategory;
  }

  /*
  *Function to execute delitions and restorations
  */
  protected function excuteDelition($id, $action='soft')
  {
    $category = Category::where('id',$id)->withTrashed()->first();

    if( !$category ){ return false; }

    switch ($action)
    {
      case 'soft':
        $category->delete();
        break;

      case 'permanent':
        $category->forceDelete();
        break;

      case 'restore':
        $category->restore();
        break;

      default:
        // code...
        break;
    }
    return true;
  }


}
