<?php

namespace App\Services;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserHandler
{

  /*
  *Function to handle customer record from checkout form
  */
  public static function handleCustomer($userData)
  {
    //check if customer already exists
    $user = User::where('email',$userData['email'])->get();
    if( count($user) )
    {
      //update User records
      $userId = $user->first()->id;
      return self::updateUser($userId,$userData);
    }
    else
    {
      //Create User record
      return self::createUser($userData);
    }
  }

  /*
  *Function to update user table
  */
  public static function updateUser($userId,$userData,$userType='customer',$records=[])
  {
    User::where('id',$userId)->update($userData);

    $user = User::find($userId);

    switch ($userType) {
      case 'customer':
          $user->customer()->update($records);
        break;

      case 'staff':
          $user->staff()->update($records);
        break;

      case 'admin':
          $user->admin()->update($records);
        break;

      default:
        // code...
        break;
    }

    //Authenitcate user
    if( !Auth::check() )
    {
      Auth::login($user,true);
    }

    return $user;
  }

  /*
  *Function to create new user
  */
  public static function createUser($userData,$userType='customer')
  {
    $user = User::create($userData);
    switch ($userType) {
      case 'customer':
          $user->customer()->create([
            'user_id' => $user->id,
          ]);
        break;

      case 'staff':
          $user->staff()->create([
            'user_id' => $user->id,
          ]);
        break;

      case 'admin':
          $user->admin()->create([
            'user_id' => $user->id,
          ]);
        break;

      default:
        // code...
        break;
    }

    //Authenitcate user
    if( !Auth::check() )
    {
      Auth::login($user,true);
    }

    return $user;
  }

  public static function cleanupPhone($number)
  {
    //cleanup the phone number and remove unecessary symbols

    $number= str_replace("-", "", $number);
    $number = str_replace( array(' ', '<', '>', '&', '{', '}', '*', "+", '!', '@', '#', "$", '%', '^', '&'), "", $number );

    return "254".substr($number, -9);
  }

}
