@extends('layouts.front-end')

@section('content')

  @if( count($errors) )
  <div class="alert alert-danger" role="alert">
      Correct highlighted errors in the form
  </div>
  @endif

<form class="form-horizontal" action="{{url('/update-user')}}" method="post" enctype="multipart/form-data" style="margin-bottom:20px;padding:20px;">
  {{csrf_field()}}
  <div class="form-group" style="display:none;">
    <label for="selector1" class="col-sm-2 control-label">Customer type</label>
    <div class="col-sm-8">
      <select name="type" id="customerType" class="form-control1">
      <option selected disabled>Choose one</option>
      <option value="1" @if( old('type')==1 || ( isset($user) && $user->customer->type == 1) ) selected @endif>High value</option>
      <option value="2" @if( old('type')==2 || ( isset($user) && $user->customer->type == 2) ) selected @endif>Low value</option>
    </select>
    @if ($errors->has('type'))
        <span class="alert-danger"  role="alert">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
  </div>
  </div>
  <input id="user_type" type="hidden" name="user_type" value="customer">
  <input id="user_id" type="hidden" name="user_id" value="{{$user->id}}">

    @component( 'components.user-edit-form', ['user' => $user, "userSupermarkets" => $allSupermarkets ] )

    @endcomponent
    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirmation">Delete my account</a>
</form>

@endsection
