@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">المعلومات الشخصية</div>

                <div class="card-body">
                    <form action="/changeinformation" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">الاسم</label>
                          <input type="text" name="name"  class="form-control" placeholder="الاسم" required value="{{auth()->user()->name}}">
                        </div>
                        <div class="form-group">
                          <label for="">البريد الالكتروني</label>
                          <input type="email" name="email"  class="form-control" placeholder="البريد الالكتروني" required value="{{auth()->user()->email}}">
                        </div>
                        <div class="form-group">
                         <label for=""> الصورة </label>
                         @if (auth()->user()->image)
                           <img src="{{asset(auth()->user()->image->url)}}" height="70px" width="70px">
                         @endif
                         <input type="file" name="image"  class="form-control" >
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-outline-primary btn-sm" value="حفظ">
                        </div>
                    </form>        
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">تغير كلمة السر</div>
                       
                <div class="card-body">
                    <form action="/changepassword" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="">كلمة المرور الحالية</label>
                        <input type="password" name="oldpassword"  class="form-control" placeholder="كلمة المرور" required>
                    </div>
                    <div class="form-group">
                        <label for="">كلمة المرور الجديد</label>
                        <input type="password" name="password"  class="form-control" placeholder="كلمة المرور" required>
                    </div>
                    <div class="form-group">
                        <label for=""> تاكيد كلمة المرور </label>
                        <input type="password" name="password_confirmation"  class="form-control" placeholder="تاكيد كلمة المرور" required>
                    </div>
                    <div class="form-group text-center">
                        
                        <input type="submit" class="btn btn-outline-primary btn-sm" value="حفظ">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
