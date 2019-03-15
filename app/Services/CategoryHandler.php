<?php

namespace App\Services;
use App\Category;

class CategoryHandler
{

  /*
  *Function to update category
  */
  public static function updateCategory($category_id,$categoryData)
  {
    $updatedCategory = Category::where('id',$category_id)->update($categoryData);
    return $updatedCategory;
  }

  /*
  *Function to create new category
  */
  public static function createCategory($categoryData)
  {
    $newCategory = Category::create($categoryData);
    return $newCategory;
  }


}
