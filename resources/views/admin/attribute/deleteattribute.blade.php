@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/attribute/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء خاصة</a>

    <div class="card card-primary text-center">
        <div class="card-header">الخصائص</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الخاصة</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attributes as $k=> $attribute)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$attribute->name}}</td>
                        <td>
                            <a href="/admin/attribute/forcedelete/{{$attribute->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/attribute/restore/{{$attribute->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
