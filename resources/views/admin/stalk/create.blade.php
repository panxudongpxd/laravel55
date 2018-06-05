@extends('.default')
@section('content')

<!-- 显示错误的信息 -->
@if (count($errors) > 0)
    <div class="mws-form-message error" style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li> ！{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>

<!-- 标签添加开始 -->
<div class="page-heading">
    <h3>
        添加说说
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="#">说说管理</a>
        </li>
        <li class="active"> 添加说说 </li>
    </ul>
</div>

<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    添加说说
                </header>
                <div class="panel-body">
                    <form action="/admin/stalk" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <div class="col-lg-10">
                                <b>说说标题：</b><input type="text" name="sstitle" placeholder="" id="f-name" class="form-control" value="{{ old('sstitle') }}">
                            </div>
                        </div>
                        <br/><br/><br/>
                        <br/>
                        <div class="form-group has-success">
                            <div class="col-lg-10">
                                说说内容：<script id="container" name="ssinfo" type="text/plain" value="{{ old('ssinfo') }}"></script>
                            </div>
                        </div>
                        <br /><br /><br />
                        <div class="form-group">

                            <div class="col-lg-offset-2 col-lg-10" style="text-align:left;">
                                 <input class="btn btn-primary" type="submit" value="添加">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- 标签添加结束-->

<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>

@endsection

