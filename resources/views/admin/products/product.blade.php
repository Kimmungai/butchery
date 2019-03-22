@extends('layouts.admin')

@section('content')
<div class="outter-wp">
  <!--sub-heard-part-->
    <div class="sub-heard-part">
     <ol class="breadcrumb m-b-0">
      <li><a href="{{url('/admin')}}">Home</a></li>
      <li><a href="{{url('/products')}}">All items</a></li>
      <li class="active">Item</li>
    </ol>
     </div>
  <!--//sub-heard-part-->
  <div class="set-1">
  <div class="graph-2 general">
  <div class="form-body">
<form class="form-horizontal" action="/update-product" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    <!--get product categories IDs-->
    @if (isset( $product ))
      @foreach ($product->productCategories as $category)
      <?php $productCategoriesIds [] = $category->category_id; ?>
      @endforeach
    @endif
    <!--end get product categories IDs -->
    <input type="hidden" name="product_id" value="@if (old('product_id')) {{old('product_id')}} @elseif (isset($product)) {{$product->id}} @endif">


    @component( 'components.product-edit-form', ["product" => $product,"productCategory"=>$productCategory,"allSupermarket"=>$allSupermarket,"allCategories"=>$allCategories,"productCategoriesIds"=>$productCategoriesIds] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-product/{{$product->id}}" name="button">Delete</a>
</form>
</div>

</div>
</div>
</div>

@endsection
