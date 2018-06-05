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
        添加标签
    </h3>
    <ul class="breadcrumb">
        <li>
            <a href="#">标签管理</a>
        </li>
        <li class="active"> 添加标签 </li>
    </ul>
</div>

<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    添加标签
                </header>
                <div class="panel-body">
                    <form action="/admin/taginfo" class="form-horizontal adminex-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group has-success">
                            <label class="col-lg-2 control-label">标签名称</label>
                            <div class="col-lg-10">
                                <input type="text" name="title" placeholder="" id="f-name" class="form-control"  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
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

@endsection

