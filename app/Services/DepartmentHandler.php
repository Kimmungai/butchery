<?php

namespace App\Services;
use App\Department;

class DepartmentHandler
{

  /*
  *Function to update department
  */
  public static function updatedDepartment($department_id,$departmentData)
  {
    $updatedDepartment = Department::where('id',$department_id)->update($departmentData);
    return $updatedDepartment;
  }

  /*
  *Function to create department
  */
  public static function createDepartment($departmentData)
  {

    $updatedDepartment = Department::create($departmentData);
    return $updatedDepartment;

  }

}
