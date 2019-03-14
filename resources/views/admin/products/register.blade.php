@extends('layouts.admin')

@section('content')

<form  action="/create-product" method="post" enctype="multipart/form-data">

    {{csrf_field()}}

    @component( 'components.product-edit-form', ["allSupermarket"=>$allSupermarket,"allCategories"=>$allCategories] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Save</button>
</form>


@endsection
