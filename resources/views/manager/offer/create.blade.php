@extends('layouts.admin')
@section('title')
    العروض
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">

     <div class="card-header ">انشاء عرض</div>
     <div class="card-body">
       <form action="/manager/offer" method="post">
        @csrf
        <div class="form-group text-center col-12  ">
           <img src="{{asset($product->image->url)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
           <br>
            <span class="badge-danger p-1 shadow-sm">{{$product->name}}</span>
        </div>
        <div class="row">
         <div class="form-group col-6 ">
            <input type="hidden" name="product_id" value="{{$product->id}}">
           <label for="">نوع العرض</label>
           <select name="type"  class="form-control">
               <option value="fixed">ثابت</option>
               <option value="variable">متغير</option>
           </select>
         </div>
         <div class="form-group col-6 ">
            <label for="">قيمة العرض</label>
            <input type="number" min="1" name="value" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6 ">
            <label for="">بدايةالعرض</label>
            <input type="datetime-local" name="start" class="form-control" >
          </div>
          <div class="form-group col-6 ">
             <label for="">نهاية العرض</label>
             <input type="datetime-local" name="end" class="form-control">
           </div>
        </div>
        <div class="form-group">
          <label for="">الرسالة</label>
          <textarea name="message" class="form-control"  cols="30" rows="3"></textarea>
        </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
