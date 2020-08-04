@extends('layouts.admin')
@section('title')
   المفضلة 
@endsection
@section('content')
    <div class="container">
        <table class="table table-striped table-inverse shadow-sm text-center">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>اسم المنتج</th>
                    <th>صورة المنتج</th>
                    <th>السعر</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($wishlist as $k=> $item)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$item->product->image->url}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->price}}</td>
                        <td>
                            <a href="/wishlist/{{$item->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @empty
                      <tr>
                          <td colspan="5" class="text-center">
                            المفضلة فارغة
                          </td>
                      </tr>  
                    @endforelse
                </tbody>
        </table>
    </div>
@endsection