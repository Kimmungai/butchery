@extends('layouts.admin')

@section('content')

Supermarkets:{{Auth::id()}}
<select name="">
    @foreach($userSupermarkets as $supermarket)
      <option>{{$supermarket->name}}</option>
    @endforeach
</select>

<section>
  <h2>Categories</h2>


</section>

<section>
  <h2>Orders</h2>


</section>
<section>
  <h2>Departments</h2>
  <a href="{{url('/register-department')}}" class="btn btn-secondary btn-dark-outline mb-3">New Department</a>

  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=1;?>
      @foreach($userSupermarkets as $supermarket)
        @foreach ($supermarket->department as $department)
          <tr>
            <th scope="row">{{$count}}</th>
            <td>{{$department->name}}</td>
            <td>Type {{$department->type}}</td>
            <td><a href="{{url('/department/'.$department->id)}}" class="btn btn-outline-dark">open</a></td>
          </tr>
          <?php $count++;?>
         @endforeach
      @endforeach

  </tbody>
  </table>


</section>
<section>
  <h2>Products</h2>
  <a href="{{url('/register-product')}}" class="btn btn-secondary btn-dark-outline mb-3">New Product</a>

  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Stock</th>
      <th scope="col">SKU</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=1;?>
      @foreach($userSupermarkets as $supermarket)
        @foreach ($supermarket->product as $product)
          <tr>
            <th scope="row">{{$count}}</th>
            <td><img src="{{$product->img1}}" alt="{{$product->name}}" height="50" width="50"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->inventory->quantity}}</td>
            <td>{{$product->sku}}</td>
            <td><a href="{{url('/product/'.$product->id)}}" class="btn btn-outline-dark">open</a></td>
          </tr>
          <?php $count++;?>
         @endforeach
      @endforeach

  </tbody>
</table>


</section>

<section>
  <h2>Users</h2>
  <a href="{{url('/register-user')}}" class="btn btn-secondary btn-dark-outline mb-3">New user</a>

  <article>
    <h3>Customers</h3>
      @foreach($userSupermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        @foreach ($supermarket->department as $department)
          <!--Department {{$department->category}}-->
        @endforeach
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          <!--{{$user->customer}}
          {{$user->feedback}}
          @if($user->customer)
            <br>Customer Order: {{$user->customer->order}}<br>
          @endif-->
        @endforeach
        <?php break;?>
      @endforeach

  <table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Shopped</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=1;?>
      @foreach($userSupermarkets as $supermarket)
        @foreach ($supermarket->user as $user)
          @if($user->customer)
          <tr>
            <th scope="row">{{$count}}</th>
            <td>{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{count($user->customer->order)}} times</td>
            <td>{{$user->email}}</td>
            <td><a href="{{url('/customer/'.$user->id)}}" class="btn btn-outline-dark">open</a></td>
          </tr>
          <?php $count++;?>
          @endif
         @endforeach
      @endforeach

  </tbody>
</table>

  </article>

  <article>
    <h3>Staff</h3>
      @foreach($userSupermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        <!--@foreach ($supermarket->department as $department)
          Department {{$department->category}}
        @endforeach-->
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          <!--{{$user->staff}}-->
          <!--{{$user->feedback}}-->

        @endforeach
        <?php break;?>
      @endforeach
  <table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Phone</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=1;?>
      @foreach($userSupermarkets as $supermarket)
          @foreach ($supermarket->user as $user)
            @if($user->staff)
            <tr>
              <th scope="row">{{$count}}</th>
              <td>{{$user->firstName}}</td>
              <td>{{$user->lastName}}</td>
              <td>{{$user->phoneNumber}} </td>
              <td>{{$user->email}}</td>
              <td><a href="{{url('/staff/'.$user->id)}}" class="btn btn-outline-dark">open</a></td>
            </tr>
            <?php $count++;?>
            @endif

          @endforeach
        @endforeach


  </tbody>
</table>
  </article>

  <article>
    <h3>Admin</h3>
      @foreach($userSupermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        <!--@foreach ($supermarket->department as $department)
          Department {{$department->category}}
        @endforeach-->
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          <!--{{$user->admin}}-->
          <!--{{$user->feedback}}-->

        @endforeach
        <?php break;?>
      @endforeach
  <table class="table table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Phone</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count=1;?>
      @foreach($userSupermarkets as $supermarket)
          @foreach ($supermarket->user as $user)
            @if($user->admin)
            <tr>
              <th scope="row">{{$count}}</th>
              <td>{{$user->firstName}}</td>
              <td>{{$user->lastName}}</td>
              <td>{{$user->phoneNumber}} </td>
              <td>{{$user->email}}</td>
              <td><a href="{{url('/admin/'.$user->id)}}" class="btn btn-outline-dark">open</a></td>
            </tr>
            <?php $count++;?>
            @endif

          @endforeach
        @endforeach


  </tbody>
</table>
  </article>
  <a href="{{url('/register-user')}}" class="btn btn-secondary btn-dark-outline mb-3">New user</a>
</section>



@endsection
