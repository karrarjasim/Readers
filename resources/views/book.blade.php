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

    <!-- Styles -->
        

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
</head>

<body>
<div class="hero-image">
<div class="overly">

</div>
  <div class="hero-text">
  <h1>معلومات الكتاب</h1>
  </div>
</div>
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
                        <li class="nav-item">
                            <a class="nav-link" href="/search/book">
                                <i class="fa fa-search"></i>  بحث عن كتاب
                            </a>
                        </li>
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
        <main >
        <div class="container text-center">
         <div class="row">
         <div class="col-md-9">

        <div class="row">
        @foreach($one_books as $book)
                @if($book->book_status == 1)
      <div class="col-md-4">
          <h3>  <i class="fa fa-book"></i> {{$book->title}}</h3>

 <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="75%">
      </div>


      <div class="col-md-8">

      <h3><i class="fa fa-pencil"></i>وصف الكتاب</h3>
      <hr>
      <p class="lead">{{$book->info}}</p>

          <hr>
      <h3>معلومات الكتاب</h3>
      <ul class="book-info">
      <li>حجم الكتاب : {{$book->book_size}}</li>
      <li> مؤلف الكتاب : {{$book->author}}</li>
      <li>نوع الكتاب : {{$book->book_type}}</li>
      <li>تاريخ الرفع : {{$book->created_at}}</li>
      @foreach($publishers as $publisher)
      @if($publisher->id == $book->user_id)
      <li >مرفوع من قبل : <a style="text-decoration: underline" href="/info/{{$publisher->username}}">{{$publisher->name}}</a> <i class="fa fa-user"></i> </li>
      @endif
      @endforeach
      <li><a href="../books/{{$book->book}}"><button type="button" name="uplaod" class="btn btn-danger" style="margin-top:10px;">تحميل الكتاب </button></a></li>

      </ul>

      </div> 
        </div>
         </div>
             @endif
         @endforeach
         <div class="col-md-3 d-none d-sm-block">
            <ul class="list-group">
                <li class="list-group-item">
            الاقسام
                </li>
                @foreach($categories as $category)
                <a href="/category/{{$category->id}}"><li class="cat-hover list-group-item d-flex justify-content-between align-items-center">
            <span class="badge badge-dark  badge-pill">{{App\Book::where('category_id',$category->id)->count()}}</span> {{$category->name}}
            </li>
                </a>
            @endforeach
            
              </ul>
              
            </div>
        
         </div>
        
         <h2 class="slider-title">كتب قد تعجبك</h2>
<div class="d-block d-sm-none slider-w">
<div class="smart">
@foreach($rand_book as $book)
        @if($book->book_status == 1)
<a href="/book/{{$book->id}}"> <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="90%"></a>
@endif
            @endforeach


</div>     
</div>
<div class="d-none d-sm-block ">
<div class="lab">
@foreach($rand_book as $book)
        @if($book->book_status == 1)
<a href="/book/{{$book->id}}"> <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="60%"></a>
@endif
            @endforeach
</div>
</div>
         </div>


        </main>
    </div>
    <footer >
    <div class="copy">
    <p class="lead">Copyright©2018 Quraa.com All rights reserved.</p>
</div>
</footer>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/slick.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}" defer></script>
</html>

