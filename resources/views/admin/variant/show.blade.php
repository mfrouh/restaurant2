@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/variant/{{$variant->id}}/edit" class="btn btn-success shadow-sm m-2 btn-sm">تعديل النوع</a>
    <div class="card card-warning text-right">
        <div class="card-header ">معلومات عن النوع</div>
        <div class="card-body">
            <div class="row mb-2">
                @foreach ($variant->valueables as $valueable)
                  <div class="col-3">{{$valueable->attribute->name}} </div> <div class="col-3"> {{$valueable->value->name}}</div>
                @endforeach
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-3">السعر </div> <div class="col-3"> {{$variant->price}} جنية</div>
                <div class="col-3">الكمية</div> <div class="col-3"> {{$variant->qty}} </div>
            </div>
        </div>
    </div>
    <div class="card card-success text-right">
        <div class="card-header ">صور المنتج</div>
        <div class="card-body">
            @foreach ($variant->gallery as $image)
                <img src="{{asset('/storage/product')}}/{{$image->url}}" class=" shadow-sm m-2" alt="" height="100px" width="100px">
            @endforeach
        </div>
    </div>
</div>
@endsection