
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Readers</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchpage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-md ">
    <div class="container">
        <a class="navbar-brand" href="/"> <i class="fa fa-home"></i>  الصفحة الرئيسية</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
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
                        <a class="nav-link" href="/profile">
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
<body>
<div class="hero-image">
    <div class="overly">

    </div>
    <div class="hero-text">
        <h3>ابحث عن كتاب محدد</h3>
        @include('partial.alerts')
        <form  class=" my-2 my-lg-0 bsearch" action="{{route('searchresult')}}" method="POST">
@csrf
            <input id="search" name="search" class="form-control mr-sm-2" type="text" placeholder="اسم الكتاب" aria-label="Search">
        <button style="margin-top: 10px" class="btn btn-danger btn-lg" type="submit">بحث</button>
        </form>
    </div>
</div>

<main>

</main>
</div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script>
    $( function() {
        $( "#search" ).autocomplete({
            source: "http://127.0.0.1:8000/search/book/test"
        });
    } );
</script>


</html>
