@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">الانواع</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($variants as $k=> $variant)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/product/'.$variant->product->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$variant->product->name}}</td>
                        <td>{{$variant->price}}</td>
                        <td>{{$variant->qty}}</td>
                        <td>
                            <a href="/admin/variant/{{$variant->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-variant-{{$variant->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-variant-{{$variant->id}}" action="/admin/variant/{{$variant->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">
                        <h3> لا يوجد خصائص</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
