@extends('layouts.admin')
@section('content')
<div class="container-fuild">

    <div class="card card-primary text-center">
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
                    @foreach ($offers as $k=> $offer)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$offer->product->name}}</td>
                        <td>{{typeoffer($offer->type)}}</td>
                        <td>{{$offer->value}}</td>
                        <td>{{$offer->start_offer}}</td>
                        <td>{{$offer->end_offer}}</td>
                        <td>
                            <a href="/admin/offer/forcedelete/{{$offer->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/offer/restore/{{$offer->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
