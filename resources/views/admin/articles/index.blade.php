@extends('default')
@section('content')
	<div class="content">

		<h1 class="text-info text-center">列表页面</h1>
		<form action="/admin/articles" method="get ">
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
				<td>图片</td>
				<td>标题</td>	
				<td>分类</td>
				<td>简介</td>
				<td>创建时间</td>
				<td>操作</td>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td ><img src="{{$v->content->mytou}}" style="width: 50px;height: 50px"></td>
				<td style="width: 150px">{{$v->title}}</td>
				<td>{{$v->Cate->cname}}</td>
				<td style="width: 250px">{{$v->jianjie}}</td>
				<td>{{$v->content->created_at}}</td>
				<td>
				<form action="/admin/articles/{{$v->id}}" method="post" style="display: inline;">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
					<input type="submit" class="btn btn-danger" value="删除">
				</form>
					<a href="/admin/article/{{$v->id}}/edit" class="btn btn-warning">修改</a>
					<a href="/admin/article/{{$v->id}}" class="btn btn-warning">显示详情</a>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="page">
			{!! $data->appends($params)->render() !!}
		</div>
	</div>
@endsection