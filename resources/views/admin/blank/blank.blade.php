@extends('default')
@section('content')
	<h1 class="text-info text-center">{{$title}}</h1>
	<form action="/admin/blank" method="get">
		<label class="mws-form-label">显示:</label>
		<select size="1" name="count" aria-controls="editable-sample" class="form-control xsmall" style="width:60px;display: inline;">
			<option value="1" @if(isset($params) && !empty($params['count']) && $params['count'] == 1) selected @endif>1</option>
			<option value="3" @if(isset($params) && !empty($params['count']) && $params['count'] == 3) selected @endif>3</option>
			<option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
		</select><label class="mws-form-label">条</label>
		<label class="mws-form-label">关键字:</label>
		<input type="text" name="btitlename" aria-controls="editable-sample" class="form-control medium" value="{{$params['btitlename'] or ''}}" style="width:150px;display: inline;">
		<input type="submit" value="搜索" class="btn btn-success">
	</form><br>
    <table class="table table-striped" border="1">
    	<tr>
			<td>ID</td>
			<td>栏目名</td>
			<td>创建时间</td>
			<td>操作</td>
    	</tr>
    	@foreach ($data as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->btitle }}</td>
			<td>{{ $v->created_at }}</td>
			<td>
				<a href="/admin/blank/{{$v->id}}/edit" class="btn btn-warning">修改</a>
				<form action="{{ url('/admin/blank',[$v->id]) }}" method="post" style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
					<input type="submit" value="删除" class="btn btn-danger">
				</form>
			</td>
		</tr>
		@endforeach
    </table>
    <div class="page">
		{!! $data->appends($params)->render() !!}
    </div>
@endsection