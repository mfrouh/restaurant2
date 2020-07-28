@extends('layouts.admin')
@section('title')
   المطاعم
@endsection
@section('content')
<div class="container-fuild">
    <div class="card card-primary">
        <div class="card-header text-center ">انشاء مطعم</div>
        <div class="card-body">
          <form action="/admin/restaurant" method="post" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="form-group col-4">
                 <label for="">اسم المطعم</label>
                 <input type="text" name="name" id="" class="form-control" placeholder="اسم المطعم">
               </div>
               <div class="form-group col-4">
                 <label for="">صورة المطعم</label>
                 <input type="file" name="image" id="" class="form-control" placeholder="صورة المطعم">
               </div>
               <div class="form-group col-4">
                 <label for="">عنوان المطعم</label>
                 <input type="text" name="address" id="" class="form-control" placeholder="عنوان المطعم">
               </div>
               <div class="form-group col-4">
                 <label for="">هاتف المطعم</label>
                 <input type="text" name="phone" id="" class="form-control" placeholder="هاتف المطعم">
               </div>
               <div class="form-group col-4">
                 <label for="">حالة المطعم</label>
                 <select name="state" class="form-control">
                     <option value="open">مفتوح</option>
                     <option value="close">مغلق</option>
                 </select>
               </div>
               <div class="form-group col-4">
                 <label for="">خدمة توصيل الطعام متاحة</label>
                 <select name="delivery" class="form-control">
                     <option value="1">نعم</option>
                     <option value="0">لا</option>
                 </select>
               </div>
               <div class="form-group col-12">
                 <label for="">وصف المطعم</label>
                 <textarea class="form-control" rows="3" placeholder="وصف المطعم" name="description"></textarea>
               </div>
               <div class="form-group col-6">
                 <label for="">قيمة التوصيل للمنازل</label>
                 <input type="number" name="price_delivery" class="form-control" placeholder="قيمة التوصيل للمنازل">
               </div>
               <div class="form-group col-6">
                <label for="">وقت التوصيل للمنازل</label>
                <input type="number" name="time_delivery" class="form-control" placeholder="وقت التوصيل للمنازل">
              </div>
              <div class="form-group text-center col-12">
                <input type="submit" class="btn btn-primary btn-sm" value="حفظ">
              </div>
         </div>
          </form>   
    </div>
</div> 
@endsection