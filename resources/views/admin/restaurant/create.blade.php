@extends('layouts.admin')
@section('title')
    المطاعم
@endsection
@section('content')
<div class="container-fuild">
    <div class="card card-primary">
        <div class="card-header ">انشاء مطعم</div>
        <div class="card-body">
          <form action="/admin/restaurant" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-group">
             <label for="">اسم المطعم</label>
             <input type="text" name="name" id="" class="form-control" placeholder="اسم المطعم">
           </div>
           <div class="form-group">
            <label for="">صورة المطعم</label>
            <input type="file" name="image" id="" class="form-control" placeholder="صورة المطعم">
          </div>
          <div class="form-group">
            <label for="">عنوان المطعم</label>
            <input type="text" name="address" id="" class="form-control" placeholder="عنوان المطعم">
          </div>
          <div class="form-group">
            <label for="">هاتف المطعم</label>
            <input type="text" name="phone" id="" class="form-control" placeholder="هاتف المطعم">
          </div>
          <div class="form-group">
            <label for="">حالة المطعم</label>
            <select name="state" class="form-control">
                <option value="open">مفتوح</option>
                <option value="close">مغلق</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">خدمة توصيل الطعام متاحة</label>
            <select name="delivery" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
          </div>
          </form>   
    </div>
</div> 
@endsection