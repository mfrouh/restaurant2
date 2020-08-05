@extends('layouts.app')
@section('title')
   {{$product->name}}
@endsection
@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-6">
               <img src="{{asset($product->image->url)}}" height="300px" width="100%" alt="">
           </div>
           <div class="col-md-6">
               {{$product->name}}<br>
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