@extends('layouts.admin')
@section('title')
الموظفين 
@endsection
@section('content')
<div class="container-fuild">
    <div class="card card-primary text-center">
        <div class="card-header">تعديل الموظف</div>
        <div class="card-body">
            <form action="/manager/employee/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for="">الاسم</label>
                  <input type="text" name="name"  class="form-control" placeholder="الاسم" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                  <label for="">البريد الالكتروني</label>
                  <input type="email" name="email"  class="form-control" placeholder="البريد الالكتروني" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                 <label for="">كلمة المرور</label>
                 <input type="password" name="password"  class="form-control" placeholder="كلمة المرور" >
                </div>
                <div class="form-group">
                 <label for=""> تاكيد كلمة المرور </label>
                 <input type="password" name="password_confirmation"  class="form-control" placeholder="تاكيد كلمة المرور" >
                </div>
                <div class="form-group">
                 <label for=""> نوع الوظيفة </label>
                 <select name="role" class="form-control" >
                     <option value="chef"{{$user->role=='chef'?'selected':''}}>طباخ</option>
                     <option value="delivery"{{$user->role=='delivery'?'selected':''}}>توصيل الطلابات</option>
                 </select>
                </div>
                <div class="form-group">
                 <label for=""> الصورة </label>
                 <input type="file" name="image"  class="form-control" >
                </div>
                <div class="form-group tect-center">
                    <input type="submit" class="btn btn-outline-primary btn-sm" value="حفظ">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
