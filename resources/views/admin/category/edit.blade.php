@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل قسم</div>
     <div class="card-body">
       <form action="/admin/category/{{$category->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
         <div class="form-group ">
           <label for="">اسم القسم</label>
           <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="اسم القسم">
         </div>
         <div class="form-group ">
            <label for="">صورة القسم</label>
            <input type="file" name="image" class="form-control">
         </div>
         <div class="form-group ">
          <label for="">القسم الرئيسي</label>
          <select name="parent_id" id=""  class="form-control">
            @php
                $categories=App\Category::all();
            @endphp
            <option></option>
            @foreach ($categories as $category1)
              <option value="{{$category1->id}}"{{$category1->id==$category->id?'selected':''}}>{{$category1->name}}</option>
            @endforeach
          </select>
         </div>
         <div class="form-group ">
            <label for="">الحالة</label><br>
            <input type="radio" name="active" {{$category->active==0?'checked':''}}  value="0"> لا
            <input type="radio" name="active" {{$category->active==1?'checked':''}} value="1"> نعم
          </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
