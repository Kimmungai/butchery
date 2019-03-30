@extends('layouts.admin')

@section('content')
<!--outter-wp-->
  <div class="outter-wp">
      <!--sub-heard-part-->
        <div class="sub-heard-part">
         <ol class="breadcrumb m-b-0">
          <li><a href="{{url('/admin')}}">Home</a></li>
          <li><a href="{{url('/trashed-products')}}">trashed products</a></li>
          <li class="active">trashed product</li>
        </ol>
         </div>
      <!--//sub-heard-part-->
      <div class="graph-visual tables-main">

          <h3 class="inner-tittle two">trashed product </h3>
              <div class="graph">
              <div class="tables">
<table class="table table-dark">
  <tbody>

    <tr>
      <th scope="row">Image</th>
      <td><img src="@if (isset($product)) {{$product->img1}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" > </td>

    </tr>

    <tr>
      <th scope="row">Name</th>
      <td>@if (isset($product)) {{$product->name}} @endif</td>

    </tr>


    <tr>
      <th scope="row">Inventory</th>
      <td> @if (isset($product)) {{$productInventory->quantity}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Sku</th>
      <td> @if (isset($product)) {{$product->sku}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Regular Price</th>
      <td> @if (isset($product)) {{$product->regularPrice}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Gallery</th>
      <td>

        <img src="@if (isset($product)) {{$product->img2}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >


        <img src="@if (isset($product)) {{$product->img3}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >


        <img src="@if (isset($product)) {{$product->img4}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >


        <img src="@if (isset($product)) {{$product->img5}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >


      </td>

    </tr>

    <tr>
      <th scope="row">Sale Price</th>
      <td> @if (isset($product)) {{$product->salePrice}} @endif</td>
      <td>

    </tr>

    <tr>
      <th scope="row">Height</th>
      <td> @if (isset($product)) {{$productVariation->height}} @endif @if (isset($product) && $productVariation->measurement_system ==1) cm @else cm @endif</td>

    </tr>

    <tr>
      <th scope="row">Width</th>
      <td> @if (isset($product)) {{$productVariation->width}} @endif @if (isset($product) && $productVariation->measurement_system ==1) cm @else cm @endif</td>

    </tr>

    <tr>
      <th scope="row">Color</th>
      <td> @if (isset($product)) {{$productVariation->color}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Size</th>
      <td>
          @if (isset($product) && $productVariation->size == 1 )Small @endif
          @if (isset($product) && $productVariation->size == 2 )Medium @endif
          @if (isset($product) && $productVariation->size == 3 )Large @endif
      </td>

    </tr>

    <tr>
      <th scope="row">Weight</th>
      <td> @if (isset($product)) {{$productVariation->weight}} @endif  @if (isset($product) && $productVariation->measurement_system ==1) kg @else kg @endif </td>

    </tr>


    <tr>
      <th scope="row">Summary</th>
      <td> @if (isset($product)) {{$product->excerpt}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Description</th>
      <td> @if (isset($product)) {{$product->description}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Purchase Note</th>
      <td> @if (isset($product)) {{$product->purchaseNote}} @endif</td>

    </tr>

    <tr>
      <th scope="row">Type</th>
      <td>
          @if( isset($product) && $product->type== 1 ) Type 1 @endif
          @if( isset($product) && $product->type== 2 ) Type 2 @endif
          @if( isset($product) && $product->type== 3 ) Type 3 @endif
          @if( isset($product) && $product->type== 4 ) Type 4 @endif
      </td>

    </tr>

    <tr>
      <th scope="row">Virtual?</th>
      <td>
          @if( isset($product) && $product->virtualProduct== 1)  No @endif
          @if( isset($product) && $product->virtualProduct== -1) Yes @endif
      </td>

    </tr>

    <tr>
      <th scope="row">Units of measure </th>
      <td>
          @if( isset($product) && $productVariation->units_of_measure== 1 ) Units @endif
          @if( isset($product) && $productVariation->units_of_measure== 2  ) Litres @endif
      </td>

    </tr>

    <tr>
      <th scope="row">Measurement system</th>
      <td>
          @if( isset($product) && $product->measurement_system== 1  ) Metric @endif
      </td>

    </tr>


  </tbody>
</table>

<a class="btn btn-success" href="/restore-product/{{$product->id}}" name="button">Restore Product</a>
<a class="btn btn-danger" href="/remove-product/{{$product->id}}" name="button">Delete permanently</a>
</div>
</div>

</div>
<!--//graph-visual-->
</div>
<!--//outer-wp-->

@endsection
