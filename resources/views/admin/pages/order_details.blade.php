@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">الطلبات</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $k=> $order)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/order')}}/{{$order->product->image}}" height="70px" width="70px" alt="">
                        </td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
