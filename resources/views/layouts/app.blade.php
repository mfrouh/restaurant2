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
    <link href="{{ asset('/fontawesome-free-5.7.2-web/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
      box-sizing: border-box;

      height: 40px;

      padding: 10px 12px;

      border: 1px solid transparent;
      border-radius: 4px;
      background-color: rgb(80, 79, 79)0, 79, 79);

      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
      box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
      border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
    }

    </style>
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
<style>
    .modal-backdrop {
position: fixed;
top: 0;
left: 0;
z-index: 1040;
width: 100vw;
height: 100vh;
background-color: #00000061;
}
</style>
</head>
<body style="background: #f5f5f5">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white bg-white shadow-sm fixed-top">
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

        <main class="pt-5 mt-3" >
            <x-alert></x-alert>
            @yield('content')
        </main>
    </div>
</body>
@stack('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery.js') }}" defer></script>
<script src="{{ asset('js/popper.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

</html>
