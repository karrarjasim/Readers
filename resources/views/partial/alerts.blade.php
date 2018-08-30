@if(session('msg'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p>{{session('msg')}}</p>
</div>

@endif
@if(count($errors) > 0)
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong> يوجد خطأ</strong>
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif