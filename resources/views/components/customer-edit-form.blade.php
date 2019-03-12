<!--customer data starts here-->
  <h1>Register Customer</h1>

  <div class="form-group col-md-4">
    <label for="type">Customer type</label>
    <select name="type" id="customerType" class="form-control">
      <option selected disabled>Choose one</option>
      <option value="1" @if( old('type')==1 || ( isset($user) && $user->customer->type == 1) ) selected @endif>High value</option>
      <option value="2" @if( old('type')==2 || ( isset($user) && $user->customer->type == 2) ) selected @endif>Low value</option>
    </select>
    @if ($errors->has('type'))
        <span  role="alert">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
    @endif
  </div>
<!--customer data ends here-->
