@extends('layouts.admin')
@section('title')
    المطعم
@endsection
@section('content')
<div class="container-fuild">
    <div class="card card-primary">
        <div class="card-header ">تعديل مطعم</div>
        <div class="card-body">
          <form action="/manager/restaurant/{{$restaurant->id}}" method="post" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="row"> 
            <div class="form-group col-12 text-center">
                @if($restaurant->image)
                <img src="{{asset($restaurant->image->url)}}" class="shadow-sm" height="100px" width="100px" alt=""> 
                @endif
            </div>
           <div class="form-group col-4">
            <label for="">اسم المطعم</label>
            <input type="text" name="name" id="" class="form-control" value="{{$restaurant->name}}" placeholder="اسم المطعم">
          </div>
          <div class="form-group col-4">
           <label for="">صورة المطعم</label>
           <input type="file" name="image" class="form-control" >
         </div>
         <div class="form-group col-4">
           <label for="">عنوان المطعم</label>
           <input type="text" name="address" id="" class="form-control" value="{{$restaurant->address}}" placeholder="عنوان المطعم">
         </div>
         <div class="form-group col-4">
           <label for="">هاتف المطعم</label>
           <input type="text" name="phone" id="" class="form-control" value="{{$restaurant->phone}}" placeholder="هاتف المطعم">
         </div>
         <div class="form-group col-4">
           <label for="">حالة المطعم</label>
           <select name="state" class="form-control">
               <option value="open"  {{$restaurant->state=='open'?'selected':''}}>مفتوح</option>
               <option value="close" {{$restaurant->state=='close'?'selected':''}}>مغلق</option>
           </select>
         </div>
         <div class="form-group col-4">
           <label for="">خدمة توصيل الطعام متاحة</label>
           <select name="delivery" class="form-control">
               <option value="1" {{$restaurant->delivery==1?'selected':''}}>نعم</option>
               <option value="0" {{$restaurant->delivery==0?'selected':''}}>لا</option>
           </select>
         </div>
            <div class="form-group col-12">
             <label for="">وصف المطعم</label>
             <textarea class="form-control" rows="3" placeholder="وصف المطعم" name="description">{{$restaurant->description}}</textarea>
           </div>
           <div class="form-group col-6">
            <label for="">قيمة التوصيل للمنازل</label>
            <input type="number" name="price_delivery" class="form-control" placeholder="قيمة التوصيل للمنازل" value="{{$restaurant->price_delivery}}">
           </div>
           <div class="form-group col-6">
            <label for="">وقت التوصيل للمنازل</label>
            <input type="number" name="time_delivery" class="form-control" placeholder="وقت التوصيل للمنازل" value="{{$restaurant->time_delivery}}">
           </div>
           <div class="form-group text-center col-12">
            <input type="submit" class="btn btn-primary btn-sm" value="حفظ">
          </div>
         </div>
          </form>  

        </div> 
    </div>
</div> 
@endsection