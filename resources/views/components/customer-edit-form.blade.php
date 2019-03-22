<!--customer data starts here-->

  <h3 class="inner-tittle two">Customer </h3>
  <div class="form-group">
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


<!--customer data ends here-->
