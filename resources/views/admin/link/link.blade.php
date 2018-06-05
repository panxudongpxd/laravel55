@extends('default')
@section('content')
    <form action="{{url('/admin/link')}}" method="post" enctype="multipart/form-data">
    <h1 class="text-info text-center">{{$title}}</h1>
    {{csrf_field()}}
	@if (count($errors) > 0 )
	 	<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
	 	</div>
	 @endif
  <div class="form-group">
    <label for="title">名称</label>
    <input type="text" class="form-control" id="title" name='title' 
  >
  </div>
  <div class="form-group">
    <label for="link">路径</label>
    <input type="text" class="form-control" id="link"   name='link'>
  </div>
  <div class="form-group">
    <label for="logo">logo</label>
    <input type="file" id="logo" name="logo">
  </div>
  <button type="submit" class="btn btn-success form-control">添加</button>
</form>
@endsection