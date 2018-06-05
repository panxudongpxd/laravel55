@extends('default')
@section('content')
<div>
	<h1 class="text-center" style="color: blue">影集添加</h1>
</div>
<div class="container kv-main">
    {{csrf_field()}}
    <div class="form-group">
        <input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
    </div>
<hr>
<br>
</div>
<script type="text/javascript">
    //csrf验证
    $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });
    //设置参数
    $("#file-1").fileinput({
        uploadUrl: '/admin/picture/upload/{{$uid}}',   //上传服务器路径
        ///*data:{'_token': $('input[type=hidden]').val()},*/
        allowedFileExtensions : ['jpg', 'png','gif'],  //限制文件类型
        overwriteInitial: true,
        maxFileSize: 1000,
        maxFilesNum: 10,  //最大上传文件个数
        //showBrowse:true,
        /*previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        showPreview:true,*/
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    //当没有选择文件时提示
    $('#file-1').on('fileselectnone', function() {
        alert('您还没有选择文件！!!');
    });
    //当文件上传完成后触发
    $("#file-1").on("fileuploaded", function(event, data, previewId, index) {
        //此处需要用对象响应接收服务器返回数据
        alert(data.response.msg);
    });
    /*//上传错误时触发
    $('#file-1').on('filebatchuploaderror', function(event, data, msg) {
        alert(data.msg);
    });*/
    //初始化
    $(document).ready(function() {
        $("#file-1").fileinput({
            'showPreview' : false,
            'elErrorContainer': '#errorBlock'
        });
    });
</script>
@endsection