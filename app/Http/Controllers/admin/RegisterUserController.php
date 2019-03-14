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

      $userData = $request->only(['name','firstName','middleName','lastName','DOB','email','password','phoneNumber','gender','supermarket_id','address','idNo','idImage','passport','passportImage']);//colect data for user table

      if( $request->hasFile('avatar') )
      {
        $storageLoc = env('AVATAR_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['avatar'] = $this->handleFileUpload($storageLoc,$request);
      }
      if( $request->hasFile('idImage') )
      {
        $storageLoc = env('ID_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['idImage'] = $this->handleFileUpload($storageLoc,$request,'idImage');
      }
      if( $request->hasFile('passportImage') )
      {
        $storageLoc = env('PASSPORT_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['passportImage'] = $this->handleFileUpload($storageLoc,$request,'passportImage');
      }

      //add otehr file uploads
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

      $user_id = $request->input('user_id');


      $userTypeData = $this->preProcessUserTypeData($userType,$request,$user_id);

      $userData = $request->only(['name','firstName','middleName','lastName','DOB','email','password','phoneNumber','gender','supermarket_id','address','idNo','idImage','passport','passportImage']);//colect data for user table

      if( $request->hasFile('avatar') )
      {
        $storageLoc = env('AVATAR_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['avatar'] = $this->handleFileUpload($storageLoc,$request);
      }
      if( $request->hasFile('idImage') )
      {
        $storageLoc = env('ID_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['idImage'] = $this->handleFileUpload($storageLoc,$request,'idImage');
      }
      if( $request->hasFile('passportImage') )
      {
        $storageLoc = env('PASSPORT_STORAGE_LOC','/public/users/'.$userType.'/avatars');
        $userData['passportImage'] = $this->handleFileUpload($storageLoc,$request,'passportImage');
      }
      //add otehr file uploads
      $savedUserData = $this->updateUser($user_id,$userData,$userType,$userTypeData);
      //assign new user a supermarket
      $savedUserDataSupermarket = UserHandler::createUserSupermarket($savedUserData['id'],$request->input('supermarket_id'));


      Session::flash('message', "Details saved succesfully!");

      return back();
    }


    /*
    *Function to get user supermarkets
    */
    private function get_user_supermarkets($user_id)
    {
      $userSupermarkets = UserHandler::UserSupermarket( $user_id );
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
    *Function to update user
    */
    private function updateUser($user_id,$userData,$userType,$userTypeData)
    {
      if( $userData['password'] == '' )
      {
        unset($userData['password']);
      }
      else
      {
        $userData['password'] = Hash::make($userData['password']);
      }

      $savedUserData = UserHandler::updateUser($user_id,$userData,$userType,$userTypeData);

      return $savedUserData;
    }



    /*
    *Function to validate user data
    */
    private function validateUser($request,$userType=[],$user_id='')
    {
      $user=[
        'user_type' => 'required|max:255',
        'type' => 'numeric',
        'name' => 'max:255|unique:users,name,'.$user_id.'',
        'email' => 'required|email|unique:users,email,'.$user_id.'',
        'firstName' => 'required|max:255',
        'middleName' => 'max:255',
        'lastName' => 'required|max:255',
        'DOB' => 'required|date|max:255',
        'phoneNumber' => 'required|numeric|digits_between:9,12',
        'gender' => 'required|numeric',
        'supermarket_id' => 'required|numeric',
        'idNo' => 'required|numeric|digits_between:5,10',
        'passport' => 'max:255',
        'avatar' => 'nullable|max:10000|mimes:jpeg,bmp,png',
        'idImage' => 'nullable|max:10000|mimes:jpeg,bmp,png',
        'passportImage' => 'nullable|max:10000|mimes:jpeg,bmp,png',
        'password' => 'required|min:8',
      ];

      //skip password during update if not filled
      if( $user_id != '' && $request->input('password')=='' ){
        unset($user['password']);
      }

      $allDataToBeValidated = array_merge($user,$userType);
      //data validation
      $validatedData = $request->validate($allDataToBeValidated);

      return $validatedData;
    }

    /*
    *Function to prepare user type data
    */
    protected function preProcessUserTypeData($userType,$request,$user_id='')
    {
      if( $userType === 'customer' ){
        $validatedCustomer =[
          'type' => 'required|numeric',
        ];

        $this->validateUser($request,$validatedCustomer,$user_id);

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

        $this->validateUser($request,$validatedstaff,$user_id);

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

        $this->validateUser($request,$validatedAdmin,$user_id);

        $adminData = [
          'jobId' => $request->input('adminJobId'),
          'departmentId' => $request->input('adminDepartmentId'),
        ];//colect data for admin table
        $userTypeData = $adminData;
      }

      return $userTypeData;
    }

    /*
    *Function to upload files
    */
    private function handleFileUpload($storageLoc,$request,$value='avatar')
    {
      if(!Storage::exists($storageLoc)) {

        Storage::makeDirectory($storageLoc, 0775, true); //creates directory

      }
      $path = Storage::url($request->file($value)->store($storageLoc));

      return asset($path);
    }
}
