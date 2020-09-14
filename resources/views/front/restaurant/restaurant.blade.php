@extends('layouts.app')
@section('title')
   {{$restaurant->name}}
@endsection
@section('content')
{{-- <div class="container-fluid">
   <img  src="/storage/product/1596679574f5.jpg" height="300px"  width="100%">
</div>
<div class="container-fluid ">
   <div class="row">
      <div class="col-xl-3 text-center p-1">
         <div class="card text-white  p-0">
            <div class="card-header bg-gradient-green p-1">
               <h6> الاصناف </h6>
            </div>
         </div>
      @foreach ($restaurant->categories() as $category)
        <div class="card text-white  p-0">
           <div class="card-header bg-gradient-maroon text-right small p-1">
              <a href="#{{$category->name}}" class="btn btn-link" > {{$category->name}}  </a>
           </div>
        </div>
      @endforeach
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
</div> --}}
<div class="container-fluid">
    <restaurantdetails :restaurant="{{$restaurant}}"></restaurantdetails>
</div>
@endsection
