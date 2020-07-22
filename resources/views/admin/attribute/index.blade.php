@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/attribute/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء خاصة</a>
    <a href="/admin/attribute/deleteattributes" class="btn btn-danger shadow-sm m-2 btn-sm">الخصائص المحذوفة</a>
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
                    @forelse ($attributes as $k=> $attribute)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$attribute->name}}</td>
                        <td>
                            <a href="/admin/attribute/{{$attribute->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-attribute-{{$attribute->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-attribute-{{$attribute->id}}" action="/admin/attribute/{{$attribute->id}}" method="post" style="display: none;">
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
