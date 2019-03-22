<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Department;
use App\Services\DepartmentHandler;
use App\Services\UserHandler;
use App\Supermarket;

class DepartmentsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /*
    *Function to return department registration form
    */
    public function register_department(  )
    {
      $allSupermarkets = UserHandler::UserSupermarket( Auth::id() );
      return view('admin.department.register',compact('allSupermarkets'));
    }

    /*
    *Function to get department
    */
    public function get_department( $id )
    {
      $department = Department::find( $id );
      return view('admin.department.department',compact('department'));
    }

    /*
    *Function to all get departments
    */
    public function get_departments()
    {
      $userSupermarkets  = UserHandler::UserSupermarket(Auth::id());

      $departments = Department::orderBy('id','Desc')->paginate(env('NUMBER_OF_ITEMS_IN_TABLE',1));
      return view('admin.department.index',compact('departments','userSupermarkets'));
    }

    /*
    *Function to create new department
    */
    public function create_department( Request $request )
    {
      //validate data
      $validatedDepartment = $this->validateDepartment($request);
      $savedDepartment = DepartmentHandler::createDepartment($validatedDepartment);
      Session::flash('message', "Department saved succesfully!");
      return redirect('admin');
    }

    /*
    *Function to update department
    */
    public function update_department( Request $request )
    {
      $department_id = $request->input('department_id');

      //validate data
      $validatedDepartment = $this->validateDepartment($request, $department_id);

      $updatedDepartment = DepartmentHandler::updatedDepartment($department_id,$validatedDepartment);
      Session::flash('message', "Details saved succesfully!");
      return back();
    }

    /*
    *Function to delete department
    */
    public function delete_department( $id )
    {
      $department = Department::find($id);
      if( !$department )
      {
        Session::flash('error', "invalid!");
        return redirect('admin');
      }
      $department->category()->delete();
      $department->delete();
      Session::flash('message', "Department deleted!");
      return redirect('admin');
    }

    /*
    *Function to delete department permanently
    */
    public function remove_department( $id )
    {
      $department = Department::where('id',$id)->withTrashed()->first();
      if( !$department )
      {
        Session::flash('error', "invalid!");
        return redirect('admin');
      }
      $department->category()->forceDelete();
      $department->forceDelete();
      Session::flash('message', "Department deleted permanently!");
      return redirect('admin');
    }

    /*
    *Function to restore deleted department
    */
    public function restore_department( $id )
    {
      $department = Department::where('id',$id)->withTrashed()->first();
      if( !$department )
      {
        Session::flash('error', "invalid!");
        return redirect('admin');
      }
      $department->category()->restore();
      $department->restore();
      Session::flash('message', "Department restored!");
      return redirect('admin');
    }

    /*
    *Function to get trashed departments
    */
    public function get_trashed_departments()
    {
      $trashedDepartements = Department::onlyTrashed()->get();
      return view('admin.department.trash',compact('trashedDepartements'));
    }

    /*
    *Function to get trashed department
    */
    public function get_trashed_department( $id )
    {
      $department = Department::where('id',$id)->withTrashed()->first();
      return view('admin.department.trashed-department',compact('department'));
    }

    /*
    *Function to validate department
    */
    protected function validateDepartment( $request, $department_id ='' )
    {
      $data=[
        'name' => 'required|nullable|unique:departments,name,'.$department_id.'',
        'supermarket_id' => 'required|numeric',
        'type' => 'required|numeric'
      ];

      if( $department_id == '' ){ unset($data['department_id']); }

      $validateDepartment = $request->validate($data);

      return $validateDepartment;
    }
}
