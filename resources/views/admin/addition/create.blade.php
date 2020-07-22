@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary">

     <div class="card-header ">انشاء عرض</div>
     <div class="card-body">
       <form action="/admin/addition" method="post">
        @csrf
        <div class="form-group text-center col-12  ">
           <img src="{{asset($product->image)}}" height="100px" width="100px" class="img-circle shadow-sm mb-1" alt="">
           <br>
            <span class="badge-danger p-1 shadow-sm">{{$product->name}}</span>
        </div>
        <div class="row">
         <div class="form-group col-4 ">
            <label for="">الاسم </label>
            <input type="number"  name="name" class="form-control">
         </div>
         <div class="form-group col-4 ">
            <input type="hidden" name="product_id" value="{{$product->id}}">
           <label for="">النوع</label>
           <select name="type"  class="form-control">
               <option value="paid">مدفوع</option>
               <option value="free">مجاني</option>
           </select>
         </div>
         <div class="form-group col-4 ">
            <label for="">السعر </label>
            <input type="number" min="1" name="price" class="form-control">
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
