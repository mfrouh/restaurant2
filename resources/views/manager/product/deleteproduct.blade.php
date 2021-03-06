@extends('layouts.admin')
@section('title')
    المنتجات
@endsection
@section('content')
<div class="container-fuild">
    <a href="/manager/product/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء منتج</a>
    <div class="card card-primary text-center">
        <div class="card-header">المنتجات</div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>القسم</th>
                        <th>العرض</th>
                        <th>اضافة خصائص</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $k=> $product)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            @if ($product->image)
                            <img src="{{asset($product->image->url)}}" height="50px" width="50px" alt="">
                            @endif
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} جنية </td>
                        <td>{{active($product->active)}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/manager/offer/create/{{$product->id}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-dark btn-sm" href="/manager/valueable/create/{{$product->id}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="/manager/product/forcedelete/{{$product->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/manager/product/restore/{{$product->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
