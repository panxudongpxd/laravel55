@extends('default')
@section('content')
	<h1 class="text-info text-center">{{$title}}</h1>
    	<table class="table table-striped" border="1">
         	<tr>
     			<td>ID</td>
     			<td>LOGO</td>
     			<td>版权</td>
     			<td>备案信息</td>
     			<td>操作</td>
         	</tr>
         	@foreach ($data as $v)
     		<tr>
     			<td>{{ $v->id }}</td>
     			<td><img src="{{ $v->logo}}" style="width:30px;height:20px;"</td>
     			<td>{{ $v->copy }}</td>
     			<td>{{ $v->bah }}</td>
     			<td>
     				<a href="/admin/config/{{$v->id}}/edit" class="btn btn-warning">编辑</a>
     			</td>
     		</tr>
     		@endforeach
        </table>
@endsection