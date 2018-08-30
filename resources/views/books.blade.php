@extends('layouts.app')
@section('content')
<div class="container text-center">
<div class="d-block d-sm-none">
<form action="" method="post" >
    {{csrf_field()}}

    <div class="form-group">
        <select class="form-control" name="category"  onchange="location = this.value;">
        <option  class="btn btn-dark" >اختر القسم</option>
            @if (count($categories) > 0)
                @foreach($categories as $category)
                
                <option value="/category/{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
        </select>
    </div>

</form>
</div>
<div class="row">
<div class="col-sm-9">
<h3 style="text-align:right">  كل الكتب <span class="title-line">|</span></h3>
    <hr>
                  
<div class="row">
@foreach($all_books as $book)
        @if($book->book_status == 1)
<div class="col-6 col-sm-3">
    <div class="book-face">     
        <img class="img-thumbnail book-img img-responsive" src="../thumbnalis/{{$book->image}}" width="90%">
                <div class="middle">
                  <a href="/book/{{$book->id}}" class="btn btn-danger"><i class="fa fa-eye"></i> عرض</a>
                </div>
            </div>
    <p class="lead">{{$book->title}}</p>
</div>
@endif
@endforeach

</div>

</div>

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
<hr>
<h2 style="padding: 10px 10px">كتب مميزة</h2>
<hr>
<div class="d-block d-sm-none slider-w">
<div class="smart">
@foreach($books as $book)
        @if($book->book_status == 1)
<a href="/book/{{$book->id}}"> <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="90%" alt="image-book"></a>
@endif
            @endforeach


</div>     
</div>
<div class="d-none d-sm-block">
<div class="lab">
@foreach($slider_books as $book)
        @if($book->book_status == 1)
<a href="/book/{{$book->id}}"> <img class="img-thumbnail" src="../thumbnalis/{{$book->image}}"  width="60%" alt="image-book"></a>
@endif
    @endforeach
</div>
</div>





</div>

@endsection
