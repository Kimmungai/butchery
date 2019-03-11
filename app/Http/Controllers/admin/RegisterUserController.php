<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supermarket;
use App\Services\UserHandler;

class RegisterUserController extends Controller
{
    /*
    *Function to display all users
    */
    public function index()
    {
      $userSupermarkets  = $this->get_user_supermarkets(Auth::id());

      return view('admin.index',compact('userSupermarkets'));
    }


    /*
    *Function to display registration form for admin to register users
    */
    public function register_user()
    {
      $userSupermarkets  = $this->get_user_supermarkets(Auth::id());

      return view('admin.register-user',compact('userSupermarkets'));
    }



    /*
    *Function to create user in database
    */
    public function create_user( Request $request )
    {

      $userType = $request->input('user_type');
      Session::flash('userBeingRegistered', $userType);

      $userTypeData = $this->preProcessUserTypeData($userType,$request);

      $userData = $request->except(['type','user_type']);//colect data for user table

      if( $request->hasFile('avatar') )
      {
        $storageLoc = env('AVATAR_STORAGE_LOC','/public/users/customers/avatars');
        $userData['avatar'] = $this->handleFileUpload($storageLoc,$request);
      }

      $savedUserData = $this->handleUser($userData,$userType,$userTypeData);

      //assign new user a supermarket
      $savedUserDataSupermarket = UserHandler::createUserSupermarket($savedUserData['id'],$request->input('supermarket_id'));

      Session::flash('message', "Details saved succesfully!");

      return redirect('/admin');

    }

    /*
    *Function to update user in database
    */
    public function update_user( Request $request )
    {
      $userType = $request->input('user_type');

      $userTypeData = $this->preProcessUserTypeData($userType,$request);

      return $request->all();
    }



    /*
    *Function to get user supermarkets
    */
    private function get_user_supermarkets($user_id)
    {
      //get user supermarkets
      $user_supemarkets = UserHandler::UserSupermarkets($user_id);

      foreach ($user_supemarkets as $user_supemarket)
      {
          $userSupermarkets[] = Supermarket::where('id',$user_supemarket['supermarket_id'])->get();
      }
      $userSupermarkets  = isset($userSupermarkets) ? $userSupermarkets : [];

      return $userSupermarkets;

    }



    /*
    *Function to clean up user data before saving to database
    */
    private function handleUser($userData,$userType,$userTypeData)
    {
      $userData['password'] = Hash::make($userData['password']);

      $savedUserData = UserHandler::createUser($userData,$userType,$userTypeData);

      return $savedUserData;
    }



    /*
    *Function to validate user data
    */
    private function validateUser($request,$userType=[])
    {
      $user=[
        'user_type' => 'required|max:255',
        'type' => 'numeric',
        'name' => 'max:255|unique:users',
        'email' => 'required|email|unique:users',
        'firstName' => 'required|max:255',
        'middleName' => 'max:255',
        'lastName' => 'required|max:255',
        'DOB' => 'required|date|max:255',
        'phoneNumber' => 'required|numeric|digits_between:9,12',
        'gender' => 'required|numeric',
        'supermarket_id' => 'required|numeric',
        'idNo' => 'required|numeric|digits_between:5,10',
        'passport' => 'max:255',
        'avatar' => 'max:10000|mimes:jpeg,bmp,png',
        'idImage' => 'max:10000|mimes:jpeg,bmp,png',
        'passportImage' => 'max:10000|mimes:jpeg,bmp,png',
        'password' => 'required|min:8',
      ];

      $allDataToBeValidated = array_merge($user,$userType);
      //data validation
      $validatedData = $request->validate($allDataToBeValidated);

      return $validatedData;
    }

    /*
    *Function to prepare user type data
    */
    protected function preProcessUserTypeData($userType,$request)
    {
      if( $userType === 'customer' ){
        $validatedCustomer =[
          'type' => 'required|numeric',
        ];

        $this->validateUser($request,$validatedCustomer);

        $customerData = [
          'type' => $request->input('type'),
        ];//colect data for customer table

        $userTypeData = $customerData;

      }elseif ( $userType === 'staff' ) {

        $validatedstaff =[
          'type'  => 'required|numeric',
          'staffJobId' => 'required|max:255',
          'staffDepartmentId' => 'required|numeric',
          'availability' => 'required|numeric'
        ];

        $this->validateUser($request,$validatedstaff);

        $staffData = [
          'type' => $request->input('type'),
          'jobId' => $request->input('staffJobId'),
          'departmentId' => $request->input('staffDepartmentId'),
          'availability' => $request->input('availability'),
        ];//colect data for staff table

        $userTypeData =  $staffData;

      }elseif ( $userType === 'admin' ) {

        $validatedAdmin = [
          'adminJobId' => 'max:255',
          'adminDepartmentId' => 'required|numeric',
        ];

        $this->validateUser($request,$validatedAdmin);

        $adminData = [
          'jobId' => $request->input('adminJobId'),
          'departmentId' => $request->input('adminDepartmentId'),
        ];//colect data for admin table
        $userTypeData = $adminData;
      }

      return $userTypeData;
    }

    private function handleFileUpload($storageLoc,$request)
    {
      if(!Storage::exists($storageLoc)) {

        Storage::makeDirectory($storageLoc, 0775, true); //creates directory

      }
      $path = Storage::url($request->file('avatar')->store($storageLoc));

      return asset($path);
    }
}
