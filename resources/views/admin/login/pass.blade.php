@extends('default')
@section('content')

<form action="{{url('/admin/preson',[$data->id])}}" method="post" enctype="multipart/form-data">
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
    <label for="id">编号</label>
    <input type="text" class="form-control" id="id" name='id' value="{{$data->id}}" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="password">旧密码</label>
    <input type="password" class="form-control" id="name" name='password2'>
  </div>
  <div class="form-group">
    <label for="password">新密码</label>
    <input type="password" class="form-control" id="pass1" name='password' placeholder="密码不得少于6位">
  </div>
  <div class="form-group">
    <label for="pass">确认密码</label>
    <input type="password" class="form-control" id="pass2" name='password3' placeholder="请保持两次密码一致">
  </div>
  <button type="submit" class="btn btn-success form-control">修改</button>
</form>


@endsection