@extends('layouts.admin')

@section('content')
<form  action="/update-product" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    <input type="hidden" name="product_id" value="@if (old('product_id')) {{old('product_id')}} @elseif (isset($product)) {{$product->id}} @endif">

    <a class="btn btn-success" href="/receive-stock/{{$product->id}}" name="button">Receive stock</a>

    <table class="table table-dark">
      <tbody>

        <tr>
          <th scope="row">Image</th>
          <td><img src="@if (isset($product)) {{$product->img1}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" > <input type="file" id="img1" name="img1"> </td>
          <td>
            @if ($errors->has('img1'))
              <span  role="alert">
                  <strong>{{ $errors->first('img1') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Name</th>
          <td><input name="name" id="name" type="text"  value="@if( old('name') ) {{old('name')}} @elseif (isset($product)) {{$product->name}} @endif" > </td>
          <td>
            @if ($errors->has('name'))
              <span  role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Category</th>
          <td>
            <!--<select class="form-control" name="category_ids">
              @foreach ($allCategories as $category)
               <option value="1" @if (old('category_id') == $category->id) selected @elseif( $product->category_id == $category->id ) selected @endif>{{$category->name}}</option>
              @endforeach
            <select>-->

            @if (isset( $allCategories ))
              @foreach ($allCategories as $category)
               <input type="checkbox" name="category_id[]" value="{{$category->id}}" @if (old('category_id') == $category->id) checked @elseif( $product->category_id == $category->id ) checked @endif> {{$category->name}} <br>
              @endforeach
            @endif

            <input name="new_category" id="new_category" type="text" id="" placeholder="Type category"><!--create new category-->
            in
            <select  name="department_id">
              @if( isset($productSupermarket) )
                @foreach ($productSupermarket->department as $department)
                  <option value="{{$department->id}}"> {{$department->name}} </option>
                @endforeach
              @endif
            </select>
          </td>
          <td>
            @if ($errors->has('new_category'))
              <span  role="alert">
                  <strong>{{ $errors->first('new_category') }}</strong>
              </span>
            @endif
          </td>

        </tr>

        <tr>
          <th scope="row">Inventory</th>
          <td> <input class="form-control" type="text" name="quantity" value="@if (old('quantity')) {{old('quantity')}} @elseif (isset($product)) {{$product->inventory->quantity}} @endif"></td>
          <td>
            @if ($errors->has('quantity'))
              <span  role="alert">
                  <strong>{{ $errors->first('quantity') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Sku</th>
          <td> <input class="form-control" type="text" name="sku" value="@if (old('sku')) {{old('sku')}} @elseif (isset($product)) {{$product->sku}} @endif"></td>
          <td>
            @if ($errors->has('sku'))
              <span  role="alert">
                  <strong>{{ $errors->first('sku') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Regular Price</th>
          <td> <input class="form-control" type="text" name="regularPrice" value="@if (old('regularPrice')) {{old('regularPrice')}} @elseif (isset($product)) {{$product->regularPrice}} @endif"></td>
          <td>
            @if ($errors->has('regularPrice'))
              <span  role="alert">
                  <strong>{{ $errors->first('regularPrice') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Gallery</th>
          <td>

            <input  type="file" name="img2">
            <img src="@if (isset($product)) {{$product->img2}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >
            @if ($errors->has('img2'))
              <span  role="alert">
                  <strong>{{ $errors->first('img2') }}</strong>
              </span>
            @endif

            <input  type="file" name="img3">
            <img src="@if (isset($product)) {{$product->img3}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >
            @if ($errors->has('img3'))
              <span  role="alert">
                  <strong>{{ $errors->first('img3') }}</strong>
              </span>
            @endif

            <input  type="file" name="img4">
            <img src="@if (isset($product)) {{$product->img4}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >
            @if ($errors->has('img4'))
              <span  role="alert">
                  <strong>{{ $errors->first('img4') }}</strong>
              </span>
            @endif

            <input  type="file" name="img5">
            <img src="@if (isset($product)) {{$product->img5}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" >
            @if ($errors->has('img5'))
              <span  role="alert">
                  <strong>{{ $errors->first('img5') }}</strong>
              </span>
            @endif

          </td>

        </tr>

        <tr>
          <th scope="row">Sale Price</th>
          <td> <input class="form-control" type="text" name="salePrice" value="@if (old('salePrice')) {{old('salePrice')}} @elseif (isset($product)) {{$product->salePrice}} @endif"></td>
          <td>
            @if ($errors->has('salePrice'))
              <span  role="alert">
                  <strong>{{ $errors->first('salePrice') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Height</th>
          <td> <input type="text"  name="height" value="@if (old('height')) {{old('height')}} @elseif (isset($product)) {{$product->variation->height}} @endif" >@if (isset($product) && $product->variation->measurement_system ==1) cm @else cm @endif</td>
          <td>
            @if ($errors->has('height'))
              <span  role="alert">
                  <strong>{{ $errors->first('height') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Width</th>
          <td> <input type="text"  name="width" value="@if (old('width')) {{old('width')}} @elseif (isset($product)) {{$product->variation->width}} @endif" >@if (isset($product) && $product->variation->measurement_system ==1) cm @else cm @endif</td>
          <td>
            @if ($errors->has('width'))
              <span  role="alert">
                  <strong>{{ $errors->first('width') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Color</th>
          <td> <input type="text" class="form-control" name="color" value="@if (old('color')) {{old('color')}} @elseif (isset($product)) {{$product->variation->color}} @endif" ></td>
          <td>
            @if ($errors->has('color'))
              <span  role="alert">
                  <strong>{{ $errors->first('color') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Size</th>
          <td>
            <select class="form-control" name="size">
              <option value="1" @if (old('size')==1) selected @elseif (isset($product) && $product->variation->size == 1 ) selected @endif >Small</option>
              <option value="2" @if (old('size')==2) selected @elseif (isset($product) && $product->variation->size == 2 ) selected @endif>Medium</option>
              <option value="3" @if (old('size')==3) selected @elseif (isset($product) && $product->variation->size == 3 ) selected @endif>Large</option>
            </select>
          </td>
          <td>
            @if ($errors->has('size'))
              <span  role="alert">
                  <strong>{{ $errors->first('size') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Weight</th>
          <td> <input type="text"  name="weight" value="@if (old('weight')) {{old('weight')}} @elseif (isset($product)) {{$product->variation->weight}} @endif" > @if (isset($product) && $product->variation->measurement_system ==1) kg @else kg @endif </td>
          <td>
            @if ($errors->has('weight'))
              <span  role="alert">
                  <strong>{{ $errors->first('weight') }}</strong>
              </span>
            @endif
         </td>
        </tr>


        <tr>
          <th scope="row">Summary</th>
          <td> <textarea class="form-control" name="excerpt" rows="4" cols="10">@if (old('excerpt')) {{old('excerpt')}} @elseif (isset($product)) {{$product->excerpt}} @endif</textarea></td>
          <td>
            @if ($errors->has('excerpt'))
              <span  role="alert">
                  <strong>{{ $errors->first('excerpt') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Description</th>
          <td> <textarea class="form-control" name="description" rows="8" cols="10">@if (old('description')) {{old('description')}} @elseif (isset($product)) {{$product->description}} @endif</textarea></td>
          <td>
            @if ($errors->has('description'))
              <span  role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Purchase Note</th>
          <td> <input class="form-control" type="text" name="purchaseNote" value="@if (old('purchaseNote')) {{old('purchaseNote')}} @elseif (isset($product)) {{$product->purchaseNote}} @endif"></td>
          <td>
            @if ($errors->has('purchaseNote'))
              <span  role="alert">
                  <strong>{{ $errors->first('purchaseNote') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Type</th>
          <td>
            <select class="form-control" name="type">
              <option value="1" @if (old('type') == 1) selected @elseif( isset($product) && $product->type== 1 ) selected @endif>Type 1</option>
              <option value="2" @if (old('type') == 2) selected @elseif( isset($product) && $product->type== 2 ) selected @endif>Type 2</option>
              <option value="3" @if (old('type') == 3) selected @elseif( isset($product) && $product->type== 3 ) selected @endif>Type 3</option>
              <option value="4" @if (old('type') == 4) selected @elseif( isset($product) && $product->type== 4 ) selected @endif>Type 4</option>
            <select>
          </td>
          <td>
            @if ($errors->has('type'))
              <span  role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Virtual?</th>
          <td>
            <select class="form-control" name="virtualProduct">
              <option value="1" @if (old('virtualProduct') == 1) selected @elseif( isset($product) && $product->virtualProduct== 1 ) selected @endif>No</option>
              <option value="-1" @if (old('virtualProduct') == -1) selected @elseif( isset($product) && $product->virtualProduct== -1 ) selected @endif>Yes</option>
            <select>
          </td>
          <td>
            @if ($errors->has('virtualProduct'))
              <span  role="alert">
                  <strong>{{ $errors->first('virtualProduct') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Units of measure</th>
          <td>
            <select class="form-control" name="units_of_measure">
              <option value="1" @if (old('units_of_measure') == 1) selected @elseif( isset($product) && $product->units_of_measure== 1 ) selected @endif>Units</option>
              <option value="2" @if (old('units_of_measure') == 2) selected @elseif( isset($product) && $product->units_of_measure== 2 ) selected @endif>Litres</option>
            <select>
          </td>
          <td>
            @if ($errors->has('units_of_measure'))
              <span  role="alert">
                  <strong>{{ $errors->first('units_of_measure') }}</strong>
              </span>
            @endif
         </td>
        </tr>

        <tr>
          <th scope="row">Measurement system</th>
          <td>
            <select class="form-control" name="measurement_system">
              <option value="1" @if (old('measurement_system') == 1) selected @elseif( isset($product) && $product->measurement_system== 1 ) selected @endif>Metric</option>
            <select>
          </td>
          <td>
            @if ($errors->has('measurement_system'))
              <span  role="alert">
                  <strong>{{ $errors->first('measurement_system') }}</strong>
              </span>
            @endif
         </td>
        </tr>


      </tbody>
    </table>

    <button class="btn btn-success" type="submit" name="submit">Update</button>
    <a class="btn btn-danger" href="/delete-product/{{$product->id}}" name="button">Soft delete</a>
</form>


@endsection
