@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">العملاء</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة العميل</th>
                        <th>اسم العميل</th>
                        <th>البريد الالكتروني</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $k=> $user)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/user')}}/{{$user->image}}" class="img-circle" height="70px" width="70px" alt="">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
