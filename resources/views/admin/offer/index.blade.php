@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/offer/deleteoffers" class="btn btn-danger shadow-sm m-2 btn-sm">العروض المحذوفة</a>
    <div class="card card-primary text-center">
        <div class="card-header">العروض</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                        <th>نوع العرض</th>
                        <th>قيمة العرض</th>
                        <th>بداية العرض</th>
                        <th>نهاية العرض</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($offers as $k=> $offer)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$offer->product->name}}</td>
                        <td>{{typeoffer($offer->type)}}</td>
                        <td>{{$offer->value}}</td>
                        <td>{{$offer->start_offer}}</td>
                        <td>{{$offer->end_offer}}</td>
                        <td>
                            <a href="/admin/offer/{{$offer->id}}/edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-outline-danger brdrd btn-sm" onclick="event.preventDefault();
                              document.getElementById('delete-offer-{{$offer->id}}').submit();" href="#"><i class="fas fa-trash"></i></a>
                              <form id="delete-offer-{{$offer->id}}" action="/admin/offer/{{$offer->id}}" method="post" style="display: none;">
                                @csrf
                                @method("DELETE")
                              </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7">
                        <h3> لا يوجد عروض</h3>
                      </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
