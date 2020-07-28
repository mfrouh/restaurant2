@extends('layouts.admin')
@section('title')
    الاقسام
@endsection
@section('content')
<div class="container-fuild">
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $k=> $category)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <img src="{{asset($category->image->url)}}" height="70px" width="70px" alt="">
                        </td>
                        <td>{{active($category->active)}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">
                        <h3> لا يوجد اقسام</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
