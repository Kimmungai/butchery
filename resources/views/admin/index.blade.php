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
