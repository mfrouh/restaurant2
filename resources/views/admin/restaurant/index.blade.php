@extends('layouts.admin')
@section('title')
    المطاعم
@endsection
@section('content')
<div class="container-fuild">
    <a href="/admin/restaurant/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء مطعم</a>
    <div class="card card-primary text-center">
        <div class="card-header ">المطاعم</div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المطعم</th>
                        <th>اسم المطعم</th>
                        <th>العنوان</th>
                        <th>رقم الهاتف</th>
                        <th>الحالة</th>
                        <th>توصيل الي المنازل</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($restaurants as $k=> $restaurant)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset($restaurant->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$restaurant->name}}</td>
                        <td>{{$restaurant->address}}  </td>
                        <td>{{$restaurant->phone}}</td>
                        <td>{{$restaurant->state}}</td>
                        <td>{{$restaurant->delivery}}</td>
                        <td>
                            <a href="/admin/restaurant/{{$restaurant->id}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                            <a href="/admin/restaurant/{{$restaurant->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-restaurant-{{$restaurant->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-restaurant-{{$restaurant->id}}" action="/admin/restaurant/{{$restaurant->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="9">
                        <h3> لا يوجد مطاعم</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection