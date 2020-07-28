@extends('layouts.admin')
@section('title')
    الانواع
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">انشاء قيمة</div>
     <div class="card-body">
       <form action="/manager/variant" method="post">
        @csrf
        <div class="form-group text-center col-12  ">
          <img src="{{asset($product->image->url)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
          <br>
           <span class="badge-danger p-1 shadow-sm">{{$product->name}}</span>
        </div>
        <input type="hidden" name="product_id" value="{{$product->id}}">
          @foreach ($product->attributes->unique() as $key=> $attribute)
            <label for="">{{$attribute->name}}</label>
            <select name="{{$attribute->id}}" class="form-control" required>
              @foreach ($attribute->values as $value)
                @foreach ($product->valueable as $valueable)
                  @if($valueable->value_id==$value->id)
                  <option value="{{$valueable->id}}">{{$value->name}}</option> 
                  @endif
                @endforeach
              @endforeach
            </select>
          @endforeach
         <div class="form-group ">
           <label for="">السعر</label>
           <input type="number" name="price" class="form-control" placeholder="السعر">
         </div>

         <div class="form-group ">
          <label for="">الكمية</label>
          <input type="number" name="qty" class="form-control" placeholder="الكمية">
         </div>

         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
         </div>
       </form>
     </div>
   </div>
</div>
@endsection
