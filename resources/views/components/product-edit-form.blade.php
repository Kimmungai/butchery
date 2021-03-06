<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Image</label>
  <div class="col-sm-8">
    <img src="@if (isset($product)) {{$product->img1}} @endif" alt="@if (isset($product)) {{$product->name}} @endif" width="50" height="50" > <input type="file" id="img1" name="img1">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('img1'))
        <span  role="alert">
            <strong>{{ $errors->first('img1') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-8">
      <input class="form-control1" name="name" id="name" type="text"  value="@if( old('name') ) {{old('name')}} @elseif (isset($product)) {{$product->name}} @endif" >
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('name'))
        <span  role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Organisation</label>
  <div class="col-sm-8">
    <select class="form-control1" name="supermarket_id" id="supermarket_id">
      @if( isset($allSupermarket) )
          @foreach ( $allSupermarket as $supermarket )
            <option value="{{$supermarket->id}}" @if( old('supermarket_id') == $supermarket->id ) selected @elseif (isset($product) && $product->supermarket_id == $supermarket->id && old('supermarket_id') == null ) selected @endif>{{$supermarket->name}} </option>
          @endforeach
      @endif
    </select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('supermarket_id'))
        <span  role="alert">
            <strong>{{ $errors->first('supermarket_id') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Featured</label>
  <div class="col-sm-8">
      <select class="form-control1" name="specialFeatured">
        <option value="0" @if (old('specialFeatured') == 0) selected @elseif( isset($product) && $product->specialFeatured== 0 && old('specialFeatured') == null ) selected @endif>No</option>
        <option value="1" @if (old('specialFeatured') == 1) selected @elseif( isset($product) && $product->specialFeatured== 1 && old('specialFeatured') == null ) selected @endif>Yes</option>
      <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('specialFeatured'))
        <span  role="alert">
            <strong>{{ $errors->first('specialFeatured') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Inventory</label>
  <div class="col-sm-8">
    <input class="form-control1" type="text" name="quantity" value="@if (old('quantity')) {{old('quantity')}} @elseif (isset($product)) {{$product->inventory->quantity}} @endif">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('quantity'))
        <span  role="alert">
            <strong>{{ $errors->first('quantity') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Low stock alert</label>
  <div class="col-sm-8">
    <input class="form-control1" type="text" name="lowStockAlert" value="@if (old('lowStockAlert')) {{old('lowStockAlert')}} @elseif (isset($product)) {{$product->inventory->lowStockAlert}} @endif">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('lowStockAlert'))
        <span  role="alert">
            <strong>{{ $errors->first('lowStockAlert') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Sku</label>
  <div class="col-sm-8">
    <tr>
     <input class="form-control1" type="text" name="sku" value="@if (old('sku')) {{old('sku')}} @elseif (isset($product)) {{$product->sku}} @endif">

  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('sku'))
        <span  role="alert">
            <strong>{{ $errors->first('sku') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
	<label for="checkbox" class="col-sm-2 control-label">Category</label>
	<div class="col-sm-8">
    @if (isset( $allCategories ))
      @foreach ($allCategories as $category)
       <div class="checkbox-inline1"><input type="checkbox" name="category_id[]" value="{{$category->id}}" @if (old('category_id') == $category->id) checked @elseif( isset($product) &&  in_array($category->id, $productCategoriesIds) ) checked @endif> {{$category->name}} </div>
      @endforeach
    @endif
    <input name="new_category" id="new_category" type="text" id="" placeholder="Type category"><!--create new category-->
    in
    <select  name="department_id">
      @if( isset($allSupermarket) )
        @foreach ( $allSupermarket as $supermarket )
          @foreach ($supermarket->department as $department)
            <option value="{{$department->id}}"> {{$department->name}} </option>
          @endforeach
        @endforeach
      @endif
    </select>
	</div>
  <div class="col-sm-2">
    @if ($errors->has('new_category'))
      <span  role="alert">
          <strong>{{ $errors->first('new_category') }}</strong>
      </span>
    @endif
    @if ($errors->has('category_id'))
      <span  role="alert">
          <strong>{{ $errors->first('category_id') }}</strong>
      </span>
    @endif
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Regular Price</label>
  <div class="col-sm-8">
       <input class="form-control1" type="text" name="regularPrice" value="@if (old('regularPrice')) {{old('regularPrice')}} @elseif (isset($product)) {{$product->regularPrice}} @endif">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('regularPrice'))
        <span  role="alert">
            <strong>{{ $errors->first('regularPrice') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Sale Price</label>
  <div class="col-sm-8">
      <input class="form-control1" type="text" name="salePrice" value="@if (old('salePrice')) {{old('salePrice')}} @elseif (isset($product)) {{$product->salePrice}} @endif">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('salePrice'))
        <span  role="alert">
            <strong>{{ $errors->first('salePrice') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>



<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Gallery</label>
  <div class="col-sm-8">

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

  </div>

</div>

<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Height</label>
  <div class="col-sm-8">
    <input type="text"  name="height" value="@if (old('height')) {{old('height')}} @elseif (isset($product)) {{$product->variation->height}} @endif" >@if (isset($product) && $product->variation->measurement_system ==1) cm @else cm @endif
      @if ($errors->has('height'))
        <span  role="alert">
            <strong>{{ $errors->first('height') }}</strong>
        </span>
      @endif
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('height'))
        <span  role="alert">
            <strong>{{ $errors->first('height') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Width</label>
  <div class="col-sm-8">
      <input type="text"  name="width" value="@if (old('width')) {{old('width')}} @elseif (isset($product)) {{$product->variation->width}} @endif" >@if (isset($product) && $product->variation->measurement_system ==1) cm @else cm @endif

  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('width'))
        <span  role="alert">
            <strong>{{ $errors->first('width') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Color</label>
  <div class="col-sm-8">
      <input type="text" class="form-control1" name="color" value="@if (old('color')) {{old('color')}} @elseif (isset($product)) {{$product->variation->color}} @endif" >
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('color'))
        <span  role="alert">
            <strong>{{ $errors->first('color') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Size</label>
  <div class="col-sm-8">
    <select class="form-control1" name="size">
      <option value="1" @if (old('size')==1) selected @elseif (isset($product) && $product->variation->size == 1 ) selected @endif >Small</option>
      <option value="2" @if (old('size')==2) selected @elseif (isset($product) && $product->variation->size == 2 ) selected @endif>Medium</option>
      <option value="3" @if (old('size')==3) selected @elseif (isset($product) && $product->variation->size == 3 ) selected @endif>Large</option>
    </select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('size'))
        <span  role="alert">
            <strong>{{ $errors->first('size') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Weight</label>
  <div class="col-sm-8">
     <input type="text"  name="weight" value="@if (old('weight')) {{old('weight')}} @elseif (isset($product)) {{$product->variation->weight}} @endif" > @if (isset($product) && $product->variation->measurement_system ==1) kg @else kg @endif
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('weight'))
        <span  role="alert">
            <strong>{{ $errors->first('weight') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Summary</label>
  <div class="col-sm-8">
      <textarea class="form-control" name="excerpt" rows="4" cols="10">@if (old('excerpt')) {{old('excerpt')}} @elseif (isset($product)) {{$product->excerpt}} @endif</textarea>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('excerpt'))
        <span  role="alert">
            <strong>{{ $errors->first('excerpt') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-8">
      <textarea class="form-control" name="description" rows="8" cols="10">@if (old('description')) {{old('description')}} @elseif (isset($product)) {{$product->description}} @endif</textarea>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('description'))
        <span  role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Purchase Note</label>
  <div class="col-sm-8">
      <input class="form-control1" type="text" name="purchaseNote" value="@if (old('purchaseNote')) {{old('purchaseNote')}} @elseif (isset($product)) {{$product->purchaseNote}} @endif">
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('purchaseNote'))
        <span  role="alert">
            <strong>{{ $errors->first('purchaseNote') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Type</label>
  <div class="col-sm-8">
    <select class="form-control1" name="type">
      <option value="1" @if (old('type') == 1) selected @elseif( isset($product) && $product->type== 1 && old('type') == null ) selected @endif>Type 1</option>
      <option value="2" @if (old('type') == 2) selected @elseif( isset($product) && $product->type== 2 && old('type') == null ) selected @endif>Type 2</option>
      <option value="3" @if (old('type') == 3) selected @elseif( isset($product) && $product->type== 3 && old('type') == null ) selected @endif>Type 3</option>
      <option value="4" @if (old('type') == 4) selected @elseif( isset($product) && $product->type== 4 && old('type') == null ) selected @endif>Type 4</option>
    <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('type'))
        <span  role="alert">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Virtual?</label>
  <div class="col-sm-8">
    <select class="form-control1" name="virtualProduct">
      <option value="1" @if (old('virtualProduct') == 1) selected @elseif( isset($product) && $product->virtualProduct== 1 && old('virtualProduct') == null ) selected @endif>No</option>
      <option value="-1" @if (old('virtualProduct') == -1) selected @elseif( isset($product) && $product->virtualProduct== -1 && old('virtualProduct') == null ) selected @endif>Yes</option>
    <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('virtualProduct'))
        <span  role="alert">
            <strong>{{ $errors->first('virtualProduct') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Units of measure</label>
  <div class="col-sm-8">
    <select class="form-control1" name="units_of_measure">
      <option value="1" @if (old('units_of_measure') == 1) selected @elseif( isset($product) && $product->variation->units_of_measure== 1 && old('units_of_measure') == null ) selected @endif>Units</option>
      <option value="2" @if (old('units_of_measure') == 2) selected @elseif( isset($product) && $product->variation->units_of_measure== 2 && old('units_of_measure') == null ) selected @endif>Litres</option>
    <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('units_of_measure'))
        <span  role="alert">
            <strong>{{ $errors->first('units_of_measure') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>


<div class="form-group">
  <label for="focusedinput" class="col-sm-2 control-label">Measurement system</label>
  <div class="col-sm-8">
      <select class="form-control1" name="measurement_system">
        <option value="1" @if (old('measurement_system') == 1) selected @elseif( isset($product) && $product->measurement_system== 1 && old('measurement_system') == null ) selected @endif>Metric</option>
      <select>
  </div>
  <div class="col-sm-2">
    <p class="help-block">
      @if ($errors->has('measurement_system'))
        <span  role="alert">
            <strong>{{ $errors->first('measurement_system') }}</strong>
        </span>
      @endif
  </p>
  </div>
</div>
