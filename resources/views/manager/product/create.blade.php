@extends('layouts.admin')
@section('title')
    المنتجات
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">

     <div class="card-header ">انشاء منتج</div>
     <div class="card-body">
       <form action="/manager/product" method="post" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
           <label for="">اسم المنتج</label>
           <input type="text" name="name" class="form-control" placeholder="اسم المنتج" >
         </div>
         <div class="form-group">
            <label for="">وصف المنتج</label>
           <textarea name="description" class="form-control" id="" cols="30" rows="4"></textarea>
         </div>
         <div class="row">
           <div class="form-group col-4">
              <label for="">صور المنتج</label>
              <input type="file" name="images[]" class="form-control" multiple>
           </div>
           <div class="form-group col-4">
              <label for=""> هل المنتج متاح</label><br>
              <input type="radio" name="active" value="0"> لا
              <input type="radio" name="active" value="1"> نعم
            </div>
            <div class="form-group col-4">
              <label for="">قسم</label>
              <select  class="form-control" name="category_id" id="">
                  @php
                      $categories=App\category::all();
                      $attributes=App\attribute::all();
                  @endphp
                 @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
              </select>
            </div>
         </div>
         <div class="row">
            <div class="form-group col-12">
              <label for="">السعر</label>
              <input type="number" min="1"  class="form-control"  name="price">
            </div>
         </div>
         <div class="form-group">
            <label>كلمات لها علاقة</label>
            <input  name="tags" class="form-control" data-role="tagsinput" value="">
         </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
