@extends('layouts.app')
@section('title')
   {{$product->name}}
@endsection
@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-6">
               <div class="card">
                 <div class="card-body">
                    @if ($product->image)
                    <img src="{{asset($product->image->url)}}" height="300px" width="100%" alt="">
                    @endif
                 </div>
               </div>
           </div>
           <div class="col-md-6 text-right">
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