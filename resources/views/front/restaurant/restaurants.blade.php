@extends('layouts.app')
@section('title')
   المطاعم
@endsection
@section('content')
<div class="container-fluid">
    {{-- <div class="row">
        <div class="col-md-3 text-center">
            <div class="card border">
              <div class="card-body text-right card-border-right"> فلتر <i class="fa fa-filter float-left p-1" aria-hidden="true"></i> </div>
            </div>
            <div class="card border">
                <div class="card-body text-right"> <input type="text" class="form-control border" placeholder="اسم المطعم"> </div>
            </div>
            <div class="card border">
                <div class="card-body text-right"> <input type="text" class="form-control border" placeholder=" العنوان"> </div>
            </div>
            <div class="card border">
                <div class="card-body text-right">خدمة توصيل للمنازل : <input type="checkbox" class="float-left m-1"> </div>
            </div>
            <div class="card border">
                <div class="card-body text-right">   متاح الان : <input type="checkbox" class="float-left m-1"> </div>
            </div>
             <input type="button" class="btn btn-outline-primary" value="بحث">
        </div>
        <div class="col-md-9">
         <div class="row">
            @foreach ($restaurants as $restaurant)
            <div class="col-md-4">
                <restaurant :restaurant="{{$restaurant}}"></restaurant>
            </div>
            @endforeach
          </div>
        </div>
    </div> --}}
    <restaurants></restaurants>
</div>
@endsection
