@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">الاضافات</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                        <th>اسم الاضافة</th>
                        <th>نوع الاضافة</th>
                        <th>السعر</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($additions as $k=> $addition)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$addition->product->name}}</td>
                        <td>{{$addition->name}}</td>
                        <td>{{$addition->type}}</td>
                        <td>{{$addition->price}}</td>
                        <td>
                            <a href="/admin/addition/{{$addition->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-addition-{{$addition->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-addition-{{$addition->id}}" action="/admin/addition/{{$addition->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7">
                        <h3> لا يوجد اضافات</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
