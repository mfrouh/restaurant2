@extends('layouts.app')
@section('title')
   {{$restaurant->name}}
@endsection
@section('content')
<div class="container-fluid">
   {{-- {{$restaurant->image->url}} --}}
</div>
<div class="container mt-2">
   <div class="row">
      <div class="col-xl-3 text-center p-1">
         <div class="card text-white  p-0">
            <div class="card-header bg-gradient-green p-1">
               <h6> الاصناف </h6> 
            </div>
         </div>
      </div>
      <div class="col-xl-6 p-1">
         <div class="card">
           <div class="card-header  bg-gradient-indigo text-center">
              القائمة
           </div>
         </div>
         @foreach ($restaurant->products as $product)
             <product :product = "{{$product}}" ></product>
         @endforeach
      </div>
      <div class="col-xl-3 text-center p-1">
         <div class="card text-white  p-0">
            <div class="card-header bg-danger p-1">
               <h6><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> طلبك </h6> 
            </div>
         </div>
         @forelse (Cart::content() as $cart)
            <div class="card text-right p-0">
              <div class="card-body p-1">
                <div class="row">
                   <div class="col-2">
                     <img  class="float-right"  src="/storage/product/1596679574f5.jpg" height="33px" width="40px">
                   </div>
                   <div class="col-3 p-0 text-center">               
                      <span class="float-right" style="font-size: small;">{{ $cart['product']->name}} </span> 
                   </div>
                   <div class="col-2 p-0 ">               
                     <span class=" pl-2 pr-2">{{ $cart['quantity']}}</span>
                  </div>
                  <div class="col-3 p-0 text-center">               
                     <span class=" pl-2">{{ $cart['price']}} </span>
                  </div>
                  <div class="col-2">               
                     <a href="/cart/{{$cart['id']}}" class="btn btn-danger btn-sm float-left"><i class="fas fa-trash"></i></a>
                  </div>
                </div> 
              </div>
            </div>
         @empty
           <i class="fas fa-shopping-cart "></i><br>
             السلة فارغة
         @endforelse
         @empty(! Cart::content())
         <div class="card-header text-center bg-dark">
            المجموع :  {{Cart::total()}}  جنية <br><br>
           <a href="/checkout" class=" btn btn-primary btn-sm" >اطلب الان</a>
         </div>
         @endempty
      </div>
   </div>
</div>
@endsection