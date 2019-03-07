@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    

                </div>
                <form id="setSupermarketForm" action="{{url('/home')}}" method="POST">
                  {{csrf_field()}}
                  <select name="supermarket" onchange="submitForm('setSupermarketForm')">
                    @foreach($allSupermarkets as $supermarket)
                      <option value="{{$supermarket->id}}" @if($supermarket->id == session('selectedSupermarket') ) selected @endif>{{$supermarket->name}}</option>
                    @endforeach
                  </select>
                </form>


                @foreach( $currentSupermarket as $supermarket )<!--first supermarket-->
                  @foreach( $supermarket->product as $product )
                    <div class="product"><!--product example-->
                      <p>{{$product->name}}</p>
                      <img src="{{url('/img/1.jpg')}}" height="100" width="100" alt="">
                      <input id="product-{{$product->id}}-id" type="hidden" name="id" value="{{$product->id}}">
                      <input id="product-{{$product->id}}-quantity" type="number" name="quantity" min="1" value="1">
                      <button id="product-{{$product->id}}" type="button" class="btn btn-primary btn-sm" onclick="add_to_cart(this.id)">Add to cart</button>
                      <button class="btn btn-primary btn-sm">View cart</button>
                    </div><!--end product example-->
                  @endforeach
               @endforeach<!--end first supermarket-->

            </div>
            cart Items<br>
            {{count(session('shoppingCart'))}} items in cart<br>
            end card items<br>
            All supermarket Data<br>
            <!--foreach($supermarkets as $supermarket)
              $supermarket
              $supermarket->department[0]->category
              $supermarket->product
              $supermarket->product[0]->inventory
              $supermarket->product[0]->variation
              $supermarket->product[0]->productCategories
              $supermarket->user
              $supermarket->user[0]->customer
              $supermarket->user[0]->staff
              $supermarket->user[0]->admin
            endforeach-->
            End All supermarket Data
        </div>
    </div>
</div>
@endsection
