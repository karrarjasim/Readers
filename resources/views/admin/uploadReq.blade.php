
@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a class="btn btn-primary" href="#">Add User</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                <td>صورة الكتاب</td>
                <td>اسم الكتاب</td>
                <td>وصف الكتاب</td>
                <td>اسم المؤلف</td>
                <td>اسم المستخدم</td>
                <td>تاريخ الرفع</td>
                <td></td>
                </thead>
                @foreach($books as $book)
                    @if($book->book_status == 0)
                        <tr>
                            <td><img src="../thumbnalis/{{$book->image}}" height="80px"></td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->info}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->username}}</td>
                            <td>{{$book->created_at}}</td>
                            <td><a class="btn btn-primary" href="delete/{{$book->id}}"> تجاهل وحذف</a>

                            <td><a class="btn btn-primary" href="assent/{{$book->id}}">الموافقة على الرفع</a>

                            </td>
                    @endif
                @endforeach
                <tr>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop