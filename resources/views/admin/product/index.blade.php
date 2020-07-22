@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/product/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء منتج</a>
    <a href="/admin/product/deleteproducts" class="btn btn-danger shadow-sm m-2 btn-sm">المنتجات المحذوفة</a>
    <div class="card card-primary text-center">
        <div class="card-header">المنتجات</div>
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>القسم</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $k=> $product)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/product/'.$product->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} جنية </td>
                        <td>{{active($product->active)}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="/admin/product/{{$product->id}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                            <a href="/admin/product/{{$product->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-product-{{$product->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-product-{{$product->id}}" action="/admin/product/{{$product->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="9">
                        <h3> لا يوجد منتجات</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
