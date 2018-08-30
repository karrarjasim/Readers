<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light right">
  <a class="navbar-brand" href="/home">الصفحة الرئيسية</a>
</nav>
    <body>
    
        <div class="profile text-center">
       <div class="container"> 
      <div class="info">
     
      @foreach($users as $user)
@if($user->id == auth()->user()->id)
<div class="user-img">
<img src="/images/pic.jpg" width="200px" height="200px" align="middle">
</div>
    <table class="table table-hover ">
<tr>
<td>{{$user->name}}</td>
<td >الاسم</td>
<tr>
<tr>
<td>{{$user->email}}</td>
<td >البريد الالكتروني</td>
<tr>
<tr>
<td>{{$user->created_at}}</td>
<td >تاريخ التسجيل</td>
<tr>

    </table>
   
        @endif
        @endforeach
             </div>
             <h2>{{auth()->user()->name}} الكتب المنشورة من قبل </h2>    
<div class="row">

@foreach($books as $book)
@if($book->user_id == auth()->user()->id)
<div class="col-sm-3">
<img src="../thumbnalis/{{$book->image}}" height="300px">
<br>
<p class="lead">{{$book->title}}</p>
</div>
@endif
@endforeach

</div>
       </div>

       </div>
    </body>
</html>
