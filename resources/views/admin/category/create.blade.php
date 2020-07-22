@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary">

     <div class="card-header ">انشاء قسم</div>
     <div class="card-body">
       <form action="/admin/category" method="post" enctype="multipart/form-data">
        @csrf
         <div class="form-group ">
           <label for="">اسم القسم</label>
           <input type="text" name="name" class="form-control" placeholder="اسم القسم">
         </div>
         <div class="form-group ">
          <label for="">القسم الرئيسي</label>
          <select name="parent_id" id=""  class="form-control">
            @php
                $categories=App\Category::all();
            @endphp
            <option></option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
         </div>
         <div class="form-group ">
            <label for="">صورة القسم</label>
            <input type="file" name="image" class="form-control">
         </div>
         <div class="form-group ">
            <label for="">الحالة</label><br>
            <input type="radio" name="active" value="0"> لا
            <input type="radio" name="active" value="1"> نعم
          </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
