
             <!doctype html>
             <html lang="{{ app()->getLocale() }}">
                 <head>
                     <meta charset="utf-8">
                     <meta http-equiv="X-UA-Compatible" content="IE=edge">
                     <meta name="viewport" content="width=device-width, initial-scale=1">
             
                     <title>Readers</title>
             
                     <!-- Fonts -->
                     <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
                     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
             
                     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
                     <script src="{{ asset('js/app.js') }}" defer></script>
             
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
                 <body>
                 
                     <div class="profile text-center">
                    <div class="container "> 
                   <div class="info">
                  
                   @foreach($users_info as $user)
                   <ul>
                   <div class="user-img">
                   <li><img src="/avatars/{{$user->avatar}}" width="200px" height="200px" >
                   </div>
                  
             </li>
             <li><h4>{{$user->name}}</h4></li>
             <li>http://127.0.0.1:8000/{{$user->username}}</li>
             <li><p class="lead">{{$user->bio}}</p></li>
             
             
                   </ul>
                     @endforeach
                          </div>
             <div class="row">
                     <div class="col-sm-10">
                             <h3 style="text-align:right"> المشاركات  <span class="title-line">|</span></h3>
                                 <hr>
                                               
                             <div class="row wow fadeIn">
                                    @foreach($books as $book)
                                    @foreach($users_info as $user)
                                    @if($book->user_id == $user->id && $book->book_status == 1)
                             <div class="col-6 col-sm-3">
                                 <div class="book-face">     
                             <img class="img-thumbnail book-img img-responsive" src="../thumbnalis/{{$book->image}}" width="90%">
                                     <div class="middle">
                                       <a title="{{$book->title}}" href="/book/{{$book->id}}" class="btn btn-danger"><i class="fa fa-eye"></i> عرض</a>
                                     </div>
                                 </div>
                                 <p class="lead">{{$book->title}}</p>
                             </div>
                            
@endif
@endforeach
@endforeach
                             
                             </div>
                     </div>
             </div>
             
             </div>
             </div>
             </div>
             <footer >
                     <div class="copy">
                     <p class="lead">Copyright©2018 Quraa.com All rights reserved.</p>
                 </div>
                 </footer>
             </body>
             </html>
             
