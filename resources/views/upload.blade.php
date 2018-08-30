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

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/slick.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
        

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
<div id="app">
<nav class="navbar navbar-expand-md ">
            <div class="container">
                <a class="navbar-brand" href="/"> <i class="fa fa-home"></i>  الصفحة الرئيسية</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fa fa-bars"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                   
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/profile">
                                    {{ Auth::user()->name }} <i class="fa fa-user"></i>  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/upload">
                                   رفع كتاب <i class="fa fa-cloud-upload"></i> 
                                </a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      تسجيل الخروج <i class="fa fa-sign-out"></i> 
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
        <div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title text-center" style="padding-bottom:10px;">شارك الاخرين كتبك المفضلة</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                            </div>
            <!-- /.box-tools -->
           
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        @include('partial.alerts')
                        <form action="{{route('upload.save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                               
                                <input type="text" name="title" id="title" placeholder="اسم الكتاب" class="form-control"/>
                            </div>
                            <div class="form-group">

                                <input type="text" name="author" id="author" placeholder="اسم المؤلف" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <textarea name="info" class="form-control" id="info" placeholder="معلومات حول الكتاب"></textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    @if (count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                            <div class="form-group">
                            <label>صورة الكتاب</label>

                                <input type="file" name="image" id="image" class="form-control"/>
                            </div>

                            <label>اختر الكتاب</label>
                            <div class="form-group">
                                <input type="file" name="book" id="book" class="form-control"/>
                            </div>
                            <div class="form-group">
                               <button type="submit" name="uplaod" class="btn btn-danger btn-block">رفع الكتاب</button>
                            </div>
                        </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
        </div>
    </div>
</div>
        </main>
    </div>

</body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</html>


