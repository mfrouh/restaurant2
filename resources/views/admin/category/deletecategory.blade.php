@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/category/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء قسم</a>

    <div class="card card-primary text-center">
        <div class="card-header">الاقسام</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم القسم</th>
                        <th>صورة القسم</th>
                        <th>حالة القسم</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $k=> $category)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <img src="{{asset('/storage/category')}}/{{$category->image}}" height="70px" width="70px" alt="">
                        </td>
                        <td>{{active($category->active)}}</td>
                        <td>
                            <a href="/admin/category/forcedelete/{{$category->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/category/restore/{{$category->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
