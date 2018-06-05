@extends('default')
@section('content')

<form action="{{url('/admin/preson')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
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
    <label for="name">用户名</label>
    <input type="text" class="form-control" id="name" name='name' 
   placeholder="请输入首字母开头的字母数字下划线组成的5-12位" value="{{$data->name}}">
  </div>
  性别：<tr><td>
		            <input type="radio" name="sex" value="男" @if($data->sex=='男') checked @endif >男
		            <input type="radio" name="sex" value="女" @if($data->sex=='女') checked @endif >女
		                    </td></tr><br><br>
  <div class="form-group">
    <label for="email">邮箱</label>
    <input type="text" class="form-control" id="email" placeholder="请输入正确的邮箱格式" value="{{$data->email}}" name='email'>
  </div>
  <div class="form-group">
    <label for="phone">手机号</label>
    <input type="text" class="form-control" id="phone" placeholder="请输入正确的手机格式" value="{{$data->phone}}" name='phone'>
  </div>
  <div class="form-group">
    <label for="myfile">头像上传</label>
    <input type="file" id="myfile" name="myfile">
  </div>
  <button type="submit" class="btn btn-success form-control">修改</button>
</form>


@endsection