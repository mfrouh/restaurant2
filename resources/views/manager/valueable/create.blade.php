@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">انشاء قيمة</div>
     <div class="card-body">
       <form action="/manager/valueable" method="post">
        @csrf
        <div class="form-group text-center col-12  ">
          <img src="{{asset($product->image->url)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
          <br>
           <span class="badge-danger p-1 shadow-sm">{{$product->name}}</span>
        </div>
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group ">
          <label for="">اسم الخاصة</label>
          <select name="attribute_id" class="form-control" >
            @php
                $attributes=App\attribute::all();
            @endphp
            @foreach ($attributes as $attribute)
            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
            @endforeach
          </select>
        </div>
         <div class="form-group ">
           <label for="">القيمة</label>
           <input type="text" name="value" class="form-control" placeholder="القيمة">
         </div>

         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
         </div>
       </form>
     </div>
   </div>
</div>
@endsection
