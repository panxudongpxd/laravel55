@extends('default')
@section('content')
    <!-- 配置文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
   

    <form action="{{url('/admin/articles')}}" method="post" enctype="multipart/form-data">
    <h1 class="text-info ">文章添加</h1>
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
  <div class="form-group" style="width: 500px">
    <label for="title" >标题</label>
    <input type="text" class="form-control" id="title" name='title' 
  >
  </div>

  
  <div class="form-group" style="width: 250px">
    <label for="title" >分类</label>
    <select class="form-control" name="cname">
		<option value="">--请选择--</option>
		@foreach($data as $k=>$vv)
		<option value="{{$vv->id}}">{{$vv->cname}}</option>
		@endforeach
    </select>
  </div>

	<div class="form-group" style="width: 250px">
    <label for="title" >标签</label><br>
    @foreach($da as $k=>$v)
    <input type="checkbox" name="abc[]" value="{{$v->id}}">{{$v->title}}
    @endforeach
  </div>

  <div class="form-group" style="width: 500px">
    <label for="jianjie">简介</label>
    	<textarea rows="7" cols="5" class="form-control" name="jianjie"></textarea>
  </div>
  <div class="form-group" style="width: 500px">
    <label for="content">内容</label>
    	<!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        
    </script>
  </div>
  <div class="form-group">
    <label for="mytou">图片</label>
    <input type="file" id="mytou" name="mytou">
  </div>
  <button type="submit" class="btn btn-success form-control" style="width: 500px">添加</button>
</form>
 <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
        	toolbars: [
			    ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload','insertimage']
			]
        });
    </script>
@endsection