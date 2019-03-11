@extends('layouts.admin')

@section('content')

{{$user->customer->order}}
<h1>personal info</h1>

  @component( 'components.user-edit-form', [

  'userType' => $userType,
  'name' => $user->name,
  'firstName' => $user->firstName,
  'middleName' => $user->middleName,
  'lastName' => $user->lastName

  ] )

  @endcomponent
<h1>shopping info</h1>


@endsection
