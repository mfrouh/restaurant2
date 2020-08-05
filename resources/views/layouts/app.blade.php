<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
      <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">  
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        @font-face {
      font-family: 'Almarai';
      src: url('/webfonts/Almarai-Bold.ttf');
      src: url('/webfonts/Almarai-ExtraBold.ttf');
      src: url('/webfonts/Almarai-Light.ttf');
      src: url('/webfonts/Almarai-Regular.ttf');
       }
      @font-face {
      font-family: 'Ubuntu';
      src: url('/webfonts/Ubuntu-Bold.ttf');
      src: url('/webfonts/Ubuntu-BoldItalic.ttf');
      src: url('/webfonts/Ubuntu-Italic.ttf');
      src: url('/webfonts/Ubuntu-Light.ttf');
      src: url('/webfonts/Ubuntu-LightItalic.ttf');
      src: url('/webfonts/Ubuntu-Medium.ttf');
      src: url('/webfonts/Ubuntu-MediumItalic.ttf');
      src: url('/webfonts/Ubuntu-Regular.ttf');
       }
        body
        {
          font-family: 'Ubuntu','Almarai';
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   المطعم 2
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/restaurants">المطاعم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">المنتجات</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">انشاء حساب</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item p-2">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i> السلة
                        </li>
                        <li class="nav-item p-2">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/adminlte.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

</html>
