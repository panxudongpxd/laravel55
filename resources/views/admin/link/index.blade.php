@extends('default')
@section('content')
	<div class="content">

		<h1 class="text-info text-center">列表页面</h1>
		<form action="/admin/link" method="get ">
		显示：<select name="count">
				<option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
				<option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] == 10) selected @endif>10</option>
				<option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] == 15) selected @endif>15</option>
				<option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] == 20) selected @endif>20</option>
				<option value="25" @if(isset($params) && !empty($params['count']) && $params['count'] == 25) selected @endif>25</option>
			  </select>条
		关键字：<input type="text" name="title" value="{{$params['title'] or '' }}">
				<input type="submit" value="搜索" class="btn btn-success">
	</form>
	<br>
		<table class="table table-bordered table-hover">
			<tr>
				<td>编号</td>
				<td>图标</td>
				<td>名称</td>
				<td>路径</td>
				<td>创建时间</td>
				<td>操作</td>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td ><img src="{{$v->logo}}" style="width: 30px;height: 30px"></td>
				<td>{{$v->title}}</td>
				<td>{{$v->link}}</td>
				<td>{{$v->created_at}}</td>
				<td>
				<form action="/admin/link/{{$v->id}}" method="post" style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
					<input type="submit" class="btn btn-danger" value="删除">
				</form>
					<a href="/admin/link/{{$v->id}}/edit" class="btn btn-warning">修改</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="page">
			{!! $data->appends($params)->render() !!}
		</div>
	</div>
@endsection