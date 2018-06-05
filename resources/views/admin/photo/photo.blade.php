@extends('default')
@section('content')
    	<table class="table table-striped" border="1">
         	<tr>
     			<td>ID</td>
     			<td>相册封面</td>
     			<td>相册名</td>
                <td>创建时间</td>
                <td>操作</td>
         	</tr>
         	@foreach ($data as $k=>$v)
     		<tr>
     			<td>{{ $v->id }}</td>
     			<td><img src="{{ $v->logo}}" style="width:30px;height:20px;"</td>
     			<td>{{ $v->ptitle }}</td>
     			<td>{{ $v->created_at }}</td>
     			<td>
     				<a href="/admin/photo/{{$v->id}}/edit" class="btn btn-warning">编辑</a>
                    <a href="/admin/photo/delete/{{$v->id}}" class="btn btn-danger">删除</a>
                    <a href="/admin/photo/{{ $v->id }}" class="btn btn-info">查看详情</a>
                    <a href="/admin/picture/{{$v->id}}" class="btn btn-success">图片添加</a>
     			</td>
     		</tr>
     		@endforeach
        </table>
@endsection