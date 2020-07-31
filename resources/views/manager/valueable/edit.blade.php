@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل خاصة</div>
     <div class="card-body">
       <form action="/manager/valueable/{{$valueable->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group text-center col-12  ">
          @if ($valueable->product->image)
          <img src="{{asset($valueable->product->image->url)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
          @endif
          <br>
           <span class="badge-danger p-1 shadow-sm">{{$valueable->product->name}}</span>
        </div>
        <div class="form-group ">
          <label for="">اسم الخاصة</label>
          <input type="hidden" name="product_id" value="{{$valueable->product->id}}">
          <select name="attribute_id" class="form-control" >
            @php
                $attributes=App\attribute::all();
            @endphp
            @foreach ($attributes as $attribute)
            <option value="{{$attribute->id}}" {{$valueable->attribute_id==$attribute->id?'selected':''}} >{{$attribute->name}}</option>
            @endforeach
          </select>
        </div>
         <div class="form-group ">
           <label for="">القيمة</label>
           <input type="text" name="value" class="form-control" value="{{$valueable->value->name}}" placeholder="القيمة">
         </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
