@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">القيم</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>القيمة</th>
                        <th>عدد الخصائص</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($values as $k=> $value)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->valueable->count()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
