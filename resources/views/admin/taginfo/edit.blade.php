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

<!-- 标签添加开始 -->
<div class="page-heading">
    <h3>
        修改标签
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="#">标签列表</a>
        </li>
        <li class="#"> 修改标签 </li>
    </ul>
</div>

<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    修改标签
                </header>
                <div class="panel-body">
                    <form action="/admin/taginfo/{{ $data->id }}" class="form-horizontal adminex-form" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group has-success">
                            <label class="col-lg-2 control-label">标签名称</label>
                            <div class="col-lg-10">
                                <input type="text" name="title" placeholder="" id="f-name" class="form-control" value=" {{ $data->title }} ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                 <input class="btn btn-primary" type="submit" value="提交">
                                 <input class="btn btn-primary" id="sec" type="button" value="返回" style="float:right">
                               <script type="text/javascript">
                                    $("#sec").click(function(event) {
                                       window.location.href="/admin/taginfo";
                                    });
                               </script>
                            </div>

                        </div>



                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- 标签添加结束-->

@endsection

