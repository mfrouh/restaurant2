<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>انشاء حساب</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="/css/custom.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>المطعم </b>2</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">انشاء حساب</p>

      <form action="{{route('register')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="الاسم" style="border-left: 0;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" style="border-left: 0;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="كلمة المرور" style="border-left: 0;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control " name="password_confirmation" placeholder="اعادة كلمة المرور" style="border-left: 0;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">انشاء حساب</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- او -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          تسجيل دخول عن طريق Facebook
        </a>
      </div>

      <a href="/login" class="text-center">تسجيل دخول</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>

<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
