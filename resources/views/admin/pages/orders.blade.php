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
                        <th>صورة العميل</th>
                        <th>اسم العميل</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>وقت التسليم</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $k=> $order)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/order')}}/{{$order->user->image}}" height="70px" width="70px" alt="">
                        </td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->state}}</td>
                        <td>{{$order->delivery_time}}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
