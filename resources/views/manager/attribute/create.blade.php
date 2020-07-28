@extends('layouts.admin')
@section('title')
    الخصائص
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">انشاء خاصة</div>
     <div class="card-body">
       <form action="/manager/attribute" method="post">
        @csrf
         <div class="form-group ">
           <label for="">اسم الخاصة</label>
           <input type="text" name="name" class="form-control" placeholder="اسم الخاصة">
         </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
         </div>
       </form>
     </div>
   </div>
</div>
@endsection
