@extends('layouts.app')
@section('title')
   السلة
@endsection
@section('content')
    <div class="container">
        <table class="table table-striped table-inverse shadow-sm text-center">
            <thead class="thead-inverse bg-primary">
                <tr>
                    <th>#</th>
                    <th>اسم المنتج</th>
                    <th>صورة المنتج</th>
                    <th>نوع المنتج</th>
                    <th>اضافات المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $k=> $item)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$item->product->image->url}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->varaint->name}}</td>
                        <td>{{$item->addition->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                            <a href="/cart/{{$item->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                السلة فارغة
                            </td>
                        </tr>
                    @endforelse
                </tbody>
        </table>
    </div>
@endsection
