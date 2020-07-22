@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/category/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء قسم</a>
    <a href="/admin/category/deletecategories" class="btn btn-danger shadow-sm m-2 btn-sm">الاقسام المحذوفة</a>
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
                    @forelse ($categories as $k=> $category)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <img src="{{asset('/storage/category')}}/{{$category->image}}" height="70px" width="70px" alt="">
                        </td>
                        <td>{{active($category->active)}}</td>
                        <td>
                            <a href="/admin/category/{{$category->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-category-{{$category->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-category-{{$category->id}}" action="/admin/category/{{$category->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
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
