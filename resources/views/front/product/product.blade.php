@extends('layouts.admin')
@section('title')
   {{$product->name}}
@endsection
@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-6">
               <img src="{{asset($product->image->url)}}" height="100px" width="100px" alt="">
           </div>
           <div class="col-md-6">
               {{$product->name}}
               {{$product->description}}
               @if ($product->variant)
                {{$product->variant->price}}
               @else
                 {{$product->price}}
               @endif
           </div>
       </div>
    </div>
@endsection