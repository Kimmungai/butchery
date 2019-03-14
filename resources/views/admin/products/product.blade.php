@extends('layouts.admin')

@section('content')
<form  action="/update-product" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    <!--get product categories IDs-->
    @if (isset( $product ))
      @foreach ($product->productCategories as $category)
      <?php $productCategoriesIds [] = $category->category_id; ?>
      @endforeach
    @endif
    <!--end get product categories IDs -->
    <input type="hidden" name="product_id" value="@if (old('product_id')) {{old('product_id')}} @elseif (isset($product)) {{$product->id}} @endif">

    <a class="btn btn-success" href="/receive-stock/{{$product->id}}" name="button">Receive stock</a>

    @component( 'components.product-edit-form', ["product" => $product,"productCategory"=>$productCategory,"allSupermarket"=>$allSupermarket,"allCategories"=>$allCategories,"productCategoriesIds"=>$productCategoriesIds] )

    @endcomponent

    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-product/{{$product->id}}" name="button">Soft delete</a>
</form>


@endsection
