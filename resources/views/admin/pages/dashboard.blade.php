@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas  fa-th-large"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right">المنتجات</span>
              <span class="info-box-number text-right">
                10
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text  text-right">الأقسام</span>
              <span class="info-box-number text-right">41,410</span>
            </div>
          </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-right">الطلبات</span>
              <span class="info-box-number text-right">760</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text text-right">العملاء</span>
              <span class="info-box-number text-right">2,000</span>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
