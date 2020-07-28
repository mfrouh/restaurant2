@extends('layouts.admin')
@section('title')
    المنتجات
@endsection
@section('content')
<div class="container-fuild">
    <a href="/manager/product/{{$product->id}}/edit" class="btn btn-success shadow-sm m-2 btn-sm">تعديل منتج</a>
    <a class="btn btn-info btn-sm" href="/manager/offer/create/{{$product->id}}"><i class="fa fa-plus" aria-hidden="true"></i> اضافة عرض</a>
    <a class="btn btn-dark btn-sm" href="/manager/valueable/create/{{$product->id}}"><i class="fa fa-plus" aria-hidden="true"></i> اضافة خصائص</a>
    <a class="btn btn-secondary btn-sm" href="/manager/variant/create/{{$product->id}}"><i class="fa fa-plus" aria-hidden="true"></i> اضافة نوع</a>
    <div class="card card-warning ">
        <div class="card-header ">معلومات عن المنتج</div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-3">اسم المنتج </div> <div class="col-3"> {{$product->name}}</div>
                <div class="col-3">اسم القسم</div> <div class="col-3"> <a  class="btn btn-sm btn-primary">{{$product->category->name}}</a></div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-3">السعر </div> <div class="col-3"> {{$product->price}} جنية</div>
                <div class="col-3">الحالة</div> <div class="col-3"> <a  class="btn btn-sm {{$product->active==0?'btn-danger':'btn-success'}} ">{{active($product->active)}}</a></div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-12 mb-2">الوصف</div>
                <div class="col-12">{{$product->description}}</div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-12 mb-2">كلمات لها علاقة</div>
                <div class="col-12">
                    @foreach ($product->tags as $tag)
                      <a class="btn btn-outline-primary btn-sm">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card card-success">
        <div class="card-header ">صور المنتج</div>
        <div class="card-body">
            @foreach ($product->gallery as $image)
                <img src="{{asset('/storage/product')}}/{{$image->url}}" class=" shadow-sm m-2" alt="" height="100px" width="100px">
            @endforeach
        </div>
    </div>
    <div class="card card-primary text-center">
        <div class="card-header">الانواع</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>التفاصيل</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->variants as $k=> $variant)
                    <tr>
                        <td>{{$variant->sku}}</td>
                        @foreach ($variant->valueables as $valueable)
                        <td>{{$valueable->attribute->name}} >> {{$valueable->value->name}}</td>
                        @endforeach
                        <td>{{$variant->price}} جنية</td>
                        <td>{{$variant->qty}}</td>
                        <td>
                            <a href="/manager/variant/{{$variant->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-variant-{{$variant->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-variant-{{$variant->id}}" action="/manager/variant/{{$variant->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">
                        <h6> لا يوجد انواع</h6>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card card-danger text-center">
        <div class="card-header">العروض</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                        <th>نوع العرض</th>
                        <th>قيمة العرض</th>
                        <th>بداية العرض</th>
                        <th>نهاية العرض</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       @if ($product->offer)
                        <td>#</td>
                        <td>{{$product->name}}</td>
                        <td>{{typeoffer($product->offer->type)}}</td>
                        <td>{{$product->offer->value}}</td>
                        <td>{{$product->offer->start_offer}}</td>
                        <td>{{$product->offer->end_offer}}</td>
                        <td>
                            <a href="/manager/offer/{{$product->offer->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-offer-{{$product->offer->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-offer-{{$product->offer->id}}" action="/manager/offer/{{$product->offer->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                        @else 
                        <td colspan="7">لا يوجد  عرض</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection