@extends('layouts.admin')
@section('title')
    الاضافات
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل عرض</div>
     <div class="card-body">
       <form action="/manager/addition/{{$addition->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group text-center col-12">
          @if ($addition->additionable->image)
            <img src="{{asset($addition->additionable->image->url)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
          @endif
            <br>
             <span class="badge-danger p-1 shadow-sm">{{$addition->additionable->name}}</span>
         </div>
        <div class="row">
            <div class="form-group col-4 ">
            <label for="">الاسم </label>
            <input type="text"  name="name" value="{{$addition->name}}" class="form-control">
            </div>
            <div class="form-group col-4 ">
              <input type="hidden" name="product_id" value="{{$addition->additionable->id}}">
              <label for="">نوع </label>
              <select name="type"  class="form-control">
                  <option value="paid"    {{$addition->type=='paid'?'selected':''}}>مدفوع</option>
                  <option value="free"    {{$addition->type=='free'?'selected':''}}>مجاني</option>
              </select>
            </div>
            <div class="form-group col-4 ">
               <label for="">السعر </label>
               <input type="number" min="1" name="price" value="{{$addition->price}}"  class="form-control">
             </div>
           </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
