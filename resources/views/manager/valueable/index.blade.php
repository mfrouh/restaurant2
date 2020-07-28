@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/valueable/deletevalueables" class="btn btn-danger shadow-sm m-2 btn-sm">الخصائص المحذوفة</a>
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
                    @forelse ($valueables as $k=> $valueable)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/product/'.$valueable->product->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$valueable->product->name}}</td>
                        <td>{{$valueable->attribute->name}}</td>
                        <td>{{$valueable->value->name}}</td>
                        <td>
                            <a href="/admin/valueable/{{$valueable->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-valueable-{{$valueable->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-valueable-{{$valueable->id}}" action="/admin/valueable/{{$valueable->id}}" method="post" style="display: none;">
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
