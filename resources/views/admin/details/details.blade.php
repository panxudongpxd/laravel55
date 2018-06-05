@extends('default')
@section('content')
    <!-- 配置文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>


<form action="{{url('/admin/articles')}}" method="get" >
	<div class="form-group" style="width: 750px">
    <label for="id">标题</label>
    <input type="text" class="form-control" id="id" name='id' value="{{$data->title}}" readonly="readonly">
  </div>
  
  <div class="form-group" style="width: 150px">
    <label for="aname">作者</label>
    <input type="text" class="form-control" id="aname" name='aname' value="{{$data->content->aname}}" readonly="readonly">
  </div>

  <div class="form-group" style="width: 750px">
    <label for="content">内容</label>
    <!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        {!!$data->content->content!!}
    </script>
  </div>

  <button type="submit" class="btn btn-success form-control" style="width: 750px">返回</button>
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