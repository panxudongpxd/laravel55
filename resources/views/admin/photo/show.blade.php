@extends('default')
@section('content')
    	<table class="table table-striped" border="1">
         	<tr>
     			<td>照片</td>
                <td>操作</td>
         	</tr>
         	@foreach ($data as $k=>$v)
     		<tr>
     			<td><img src="{{ $v->plogo}}" style="width:30px;height:20px;"</td>
     			<td>
                    <form action="{{ url('/admin/photo',[$v->id]) }}" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="删除" class="btn btn-danger">
                </form>
     			</td>
     		</tr>
     		@endforeach
        </table>
@endsection