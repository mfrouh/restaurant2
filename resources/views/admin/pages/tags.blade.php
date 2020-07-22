@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">كلمات لها علاقة</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>القيمة</th>
                        <th>عدد المنتجات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $k=> $tag)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->products->count()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
