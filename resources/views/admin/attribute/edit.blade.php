@extends('layouts.admin')
@section('title')
    الخصائص
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل خاصة</div>
     <div class="card-body">
       <form action="/admin/attribute/{{$attribute->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
         <div class="form-group">
           <label for="">اسم الخاصة</label>
           <input type="text" name="name" class="form-control" value="{{$attribute->name}}" placeholder="اسم الخاصة">
         </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
