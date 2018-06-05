@extends('default')
@section('content')

<form action="/admin/link/{{$data->id}}" method="post" enctype="multipart/form-data">
<h1 class="text-info text-center">{{$title}}</h1>
    {{ csrf_field() }}
    {{ method_field('PUT') }}
	<div class="form-group">
	@if (count($errors) > 0 )
	 	<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
	 	</div>
	 @endif
    <label for="title">名称</label>
    <input type="text" class="form-control" id="title" name='title' value="{{$data->title}}" 
  >
  </div>
  <div class="form-group">
    <label for="link">路径</label>
    <input type="text" class="form-control" id="link"   name='link' value="{{$data->link}}" >
  </div>
  <div class="form-group">
    <label for="logo">logo</label>
    <input type="file" id="logo" name="logo" value="{{$data->logo}}">
  </div>
  <button type="submit" class="btn btn-success form-control">修改</button>
</form>


@endsection