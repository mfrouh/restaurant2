@extends('layouts.admin')
@section('title')
    العروض
@endsection
@section('content')
<div class="container-fuild">
   <div class="card card-primary">
     <div class="card-header ">تعديل عرض</div>
     <div class="card-body">
       <form action="/admin/offer/{{$offer->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group text-center col-12  ">
            <img src="{{asset($offer->product->image)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
            <br>
             <span class="badge-danger p-1 shadow-sm">{{$offer->product->name}}</span>
         </div>
        <div class="row">
            <div class="form-group col-6 ">
              <input type="hidden" name="product_id" value="{{$offer->product->id}}">
              <label for="">نوع العرض</label>
              <select name="type"  class="form-control">
                  <option value="fixed"    {{$offer->type=='fixed'?'selected':''}}>ثابت</option>
                  <option value="variable" {{$offer->type=='variable'?'selected':''}}>متغير</option>
              </select>
            </div>
            <div class="form-group col-6 ">
               <label for="">قيمة العرض</label>
               <input type="number" min="1" name="value" value="{{$offer->value}}"  class="form-control">
             </div>
           </div>
           <div class="row">
             <div class="form-group col-6 ">
               <label for="">بدايةالعرض</label>
               <input type="datetime-local" name="start_offer" value="{{$offer->start_offer}}" class="form-control" >
             </div>
             <div class="form-group col-6 ">
                <label for="">نهاية العرض</label>
                <input type="datetime-local" name="end_offer" value="{{$offer->end_offer}}" class="form-control">
              </div>
           </div>
           <div class="form-group">
             <label for="">الرسالة</label>
             <textarea name="message" class="form-control"  cols="30" rows="3">{{$offer->message}}</textarea>
           </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
