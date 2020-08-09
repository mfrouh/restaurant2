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
         <cart :carts="{{json_encode(Cart::content())}}" :total="{{Cart::total()}}" ></cart>
      </div>
   </div>
</div>
@endsection