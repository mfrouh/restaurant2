@extends('layouts.admin')
@section('title')
الموظفين 
@endsection
@section('content')
<div class="container-fuild">
    <a href="/manager/employee/create" class="btn btn-success btn-sm"> انشاء موظف</a>
    <div class="card card-primary text-center">
        <div class="card-header">الموظفين</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة </th>
                        <th>اسم </th>
                        <th>الوظيفة</th>
                        <th>البريد الالكتروني</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $k=> $user)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset($user->image->url)}}" class="img-circle" height="70px" width="70px" alt="">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                           <a href="/manager/employee/{{$user->id}}/edit" class="btn btn-outline-primary btn-sm"> <i class="fas fa-user-edit"></i></a>
                           <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                           document.getElementById('delete-user-{{$user->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                           <form id="delete-user-{{$user->id}}" action="/manager/employee/{{$user->id}}" method="post" style="display: none;">
                             @csrf
                             @method("DELETE")
                           </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
