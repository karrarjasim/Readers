<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Readers</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="{{ asset('css/fonts/sky.ttf') }}">
    <!-- Styles -->


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    

</head>

<body>
<div class="hero-image">
<div class="overly">

</div>
  <div class="hero-text">
    <h1 class="wow fadeInUp">قراء</h1>
    <p class="lead wow fadeInDown">شارك وتصفح المئات من الكتب المجانية</p>
  </div>
</div>
<div id="app">


<nav class="navbar navbar-expand-md ">
            <div class="container">
                <a class="navbar-brand" href="/">الصفحة الرئيسية <i class="fa fa-home"></i>  </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/search/book">
                                <i class="fa fa-search"></i>  بحث عن كتاب
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-sign-in"></i> {{ __('تسجيل دخول') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> <i class="fa fa-user-circle"></i> {{ __('تسجيل حساب جديد') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link " href="/profile">
                                    <i class="fa fa-user"></i>   {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/upload">
                                    <i class="fa fa-cloud-upload"></i> رفع كتاب
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>  تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main >
        @yield('content')

        </main>
    </div>
<footer >
<div class="container">
<div class="row">
<div class="col-12 col-sm-6">
<p class="lead">منصة قراء للكتب لتحميل الكتب المجانية , تضم العديد من الكتب والاقسام المتنوعة </p>
</div>
<div class="col-12 col-sm-6">
<p class="lead">ن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص</p>
</div>

</div>
</div>
<div class="copy">
<p class="lead">Copyright©2018 Quraa.com All rights reserved.</p>
</div>
</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/slick.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}" defer></script>
<script src="{{ asset('js/wow.min.js') }}" defer></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
              <script>
              new WOW().init();
              </script>
</body>
</html>

