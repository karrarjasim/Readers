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
       <div class="container"> 
      <div class="info">
     
      @foreach($users as $user)
@if($user->id == auth()->user()->id)
<div class="user-img">
<img src="/avatars/{{$user->avatar}}" width="200px" height="200px" ><br>
        <form method="POST" action="/change/pic/{{auth()->user()->username}}" enctype="multipart/form-data">
            @csrf

                <input   type="file" name="avatar" id="avatar" style="display:none;"/>
                <label class="btn btn-danger up-btn" for="avatar">اختيار صورة جديدة</label>
            @if ($errors->has('avatar'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
            @endif
<br>
                <button type="submit" class="btn btn-success up-btn" style="margin-bottom:5px;">رفع الصورة</button>
        </form>

    </div>
<table class="table table-bordered ">
</tr>
<tr>
<td>{{$user->name}}</td>
<td >الاسم</td>
</tr>
<tr>
<td>{{$user->email}}</td>
<td >البريد الالكتروني</td>
</tr>
<tr>
<td>{{$user->bio}}</td>
<td >نبذة تعريفيةعنك</td>
</tr>
<tr>
<td>{{$user->created_at}}</td>
<td >تاريخ التسجيل</td>
</tr>

    </table>
<a class="btn btn-info" href="/editinformation/{{$user->username}}"> <i class="fa fa-pencil-square-o"></i> تعديل المعلومات الشخصية </a>

        @endif
        @endforeach
             </div>
             <hr>
             <h2>الكتب التي قمت بنشرها</h2>
<div class="row">
<table class="table table-bordered">
<thead>
<td>صورة الكتاب</td>
<td>اسم الكتاب</td>
<td>تاريخ الرفع</td>
<td></td>
</thead>
@foreach($books as $book)
@if($book->user_id == auth()->user()->id && $book->book_status == 1)
<tr>
 <td><img src="../thumbnalis/{{$book->image}}" height="80px"></td>
<td>{{$book->title}}</td>
<td>{{$book->created_at}}</td>
<td><a class="btn btn-danger" href="delete/{{$book->id}}">حذف الكتاب</a>
</td>
@endif
@endforeach
<tr>
</table>
</div>
       </div>

       </div>
    </body>
</html>
