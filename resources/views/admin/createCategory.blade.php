@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Category</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              <a class="btn btn-primary" href="">Done</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="{{route('category.store')}}" method="POST" >
               {{csrf_field()}}
               <div class="form-group">
                   <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
               </div>
               <div class="form-group">
                  <button type="submit" name="add" class="btn btn-primary btn-block">Add Category</button>
               </div>
           </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop