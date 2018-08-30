
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Readers</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Default functionality</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchpage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">


</head>
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
<div class="hero-image2">
    <div class="overly">

    </div>
    <div class="hero-text">
        <form  class=" my-2 my-lg-0 bsearch" action="{{route('searchresult')}}" method="POST">
            @csrf
            <input id="search" name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button style="margin-top: 10px" class="btn btn-info btn-lg" type="submit">بحث</button>
        </form>
    </div>
</div>

<main >
    <div class="container text-center">
        @if(count($results)>0)
        <h1 style="padding:10px 10px;">نتيجة البحث</h1>
        @else
        <h1 style="padding:100px 10px">لم يتم العثور على الكتاب </h1>
        @endif
    <hr>
    
        <div class="row">
            <div class="col-md-9">

                <div class="row">

                        @foreach($results as $book)
                            @if($book->book_status == 1)
                                <div class="col-md-4">
                                    <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="75%">
                                </div>


                                <div class="col-md-8">
                                    <p class="lead">{{$book->title}}</p>
                                    <p class="lead">{{$book->info}}</p>
                                    <hr>
                                    <h3>معلومات الكتاب</h3>
                                    <ul class="book-info">
                                        <li>حجم الكتاب : {{$book->book_size}}</li>
                                        <li>نوع الكتاب : {{$book->book_type}}</li>
                                        <li>تاريخ الرفع : {{$book->created_at}}</li>
                                        @foreach($publishers as $publisher)
                                            @if($publisher->id == $book->user_id)
                                                <li>مرفوع من قبل : <a href="/info/{{$publisher->username}}">{{$publisher->name}}</a></li>
                                            @endif
                                        @endforeach
                                        <li><a href="../books/{{$book->book}}"><button type="button" name="uplaod" class="btn btn-danger" style="margin-top:10px;">تحميل الكتاب </button></a></li>

                                    </ul>

                                </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
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
    } );</script>
</html>
