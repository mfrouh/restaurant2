@extends('layouts.admin')
@section('title')
    الانواع
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل نوع</div>
     <div class="card-body">
       <form action="/admin/variant/{{$variant->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group text-center col-12  ">
          <img src="{{asset('/storage/product')}}/{{$variant->product->image->url}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
          <br>
           <span class="badge-danger p-1 shadow-sm">{{$variant->product->name}}</span>
        </div>
        <input type="hidden" name="product_id" value="{{$variant->product->id}}">
          @foreach ($variant->valueables as $key=> $valueable)
             {{$valueable->attribute->name}}
             {{$valueable->value->name}}
          @endforeach
         <div class="form-group ">
           <label for="">السعر</label>
           <input type="number" name="price" class="form-control" placeholder="السعر" value="{{$variant->price}}">
         </div>

         <div class="form-group ">
          <label for="">الكمية</label>
          <input type="number" name="qty" class="form-control" placeholder="الكمية" value="{{$variant->qty}}">
         </div>
  
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
