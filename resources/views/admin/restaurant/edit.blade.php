@extends('layouts.admin')
@section('title')
    المطاعم
@endsection
@section('content')
<div class="container-fuild">
    <div class="card card-primary">
        <div class="card-header ">تعديل مطعم</div>
        <div class="card-body">
          <form action="/admin/restaurant/{{$restaurant->id}}/edit" method="post" enctype="multipart/form-data">
           @csrf
           @method('put')
           <div class="form-group">
            <label for="">اسم المطعم</label>
            <input type="text" name="name" id="" class="form-control" value="{{$restaurant->name}}" placeholder="اسم المطعم">
          </div>
          <div class="form-group">
           <label for="">صورة المطعم</label>
           <input type="file" name="image" id="" class="form-control" placeholder="صورة المطعم">
         </div>
         <div class="form-group">
           <label for="">عنوان المطعم</label>
           <input type="text" name="address" id="" class="form-control" value="{{$restaurant->address}}" placeholder="عنوان المطعم">
         </div>
         <div class="form-group">
           <label for="">هاتف المطعم</label>
           <input type="text" name="phone" id="" class="form-control" value="{{$restaurant->phone}}" placeholder="هاتف المطعم">
         </div>
         <div class="form-group">
           <label for="">حالة المطعم</label>
           <select name="state" class="form-control">
               <option value="open"  {{$restaurant->state=='open'?'selected':''}}>مفتوح</option>
               <option value="close" {{$restaurant->state=='close'?'selected':''}}>مغلق</option>
           </select>
         </div>
         <div class="form-group">
           <label for="">خدمة توصيل الطعام متاحة</label>
           <select name="delivery" class="form-control">
               <option value="1" {{$restaurant->delivery==1?'selected':''}}>نعم</option>
               <option value="0" {{$restaurant->delivery==0?'selected':''}}>لا</option>
           </select>
         </div>
          </form>  

        </div> 
    </div>
</div> 
@endsection