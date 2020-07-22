@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/valueable/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء خاصة</a>

    <div class="card card-primary text-center">
        <div class="card-header">الخصائص</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>اسم الخاصة</th>
                        <th>القيمة</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($valueables as $k=> $valueable)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/product/'.$valueable->product->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$valueable->product->name}}</td>
                        <td>{{$valueable->attribute->name}}</td>
                        <td>{{$valueable->value->name}}</td>
                        <td>
                            <a href="/admin/valueable/forcedelete/{{$valueable->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/valueable/restore/{{$valueable->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
