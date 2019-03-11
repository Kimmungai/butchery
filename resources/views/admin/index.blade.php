@extends('layouts.admin')

@section('content')

Supermarkets:{{Auth::id()}}
<select name="">
  @foreach($userSupermarkets as $supermarkets)
    @foreach($supermarkets as $supermarket)
      <option>{{$supermarket->name}}</option>
    @endforeach
  @endforeach
</select>

<section>
  <h2>Orders</h2>


</section>

<section>
  <h2>Products</h2>

</section>

<section>
  <h2>Users</h2>
  <article>
    <h3>Customers</h3>
    @foreach($userSupermarkets as $supermarkets)
      @foreach($supermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        @foreach ($supermarket->department as $department)
          Department {{$department->category}}
        @endforeach
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          {{$user->customer}}
          {{$user->feedback}}
          @if($user->customer)
            <br>Customer Order: {{$user->customer->order}}<br>
          @endif
        @endforeach
        <?php break;?>
      @endforeach
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
    <?php $count=0;?>
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
      @endif
      <?php $count++;?>
    @endforeach


  </tbody>
</table>

  </article>

  <article>
    <h3>Staff</h3>
    @foreach($userSupermarkets as $supermarkets)
      @foreach($supermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        <!--@foreach ($supermarket->department as $department)
          Department {{$department->category}}
        @endforeach-->
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          {{$user->staff}}
          <!--{{$user->feedback}}-->

        @endforeach
        <?php break;?>
      @endforeach
  @endforeach
  </article>

  <article>
    <h3>Admin</h3>
    @foreach($userSupermarkets as $supermarkets)
      @foreach($supermarkets as $supermarket)
        <!--{{$supermarket->product}}-->
        <!--{{$supermarket->department}}-->
        <!--@foreach ($supermarket->department as $department)
          Department {{$department->category}}
        @endforeach-->
        <!--{{$supermarket->user}}-->
        @foreach ($supermarket->user as $user)
          {{$user->admin}}
          <!--{{$user->feedback}}-->

        @endforeach
        <?php break;?>
      @endforeach
  @endforeach
  </article>

</section>



@endsection
