@extends('default')
@section('content')
<section class="panel">
    <header class="panel-heading">
        添加子类
    </header>
    <div class="panel-body">
        <div class=" form">
            <form class="cmxform form-horizontal adminex-form" id="commentForm" method="get" action="{{url('/admin/cate/insert',['pid'=>$data->id])}}" novalidate="novalidate">
                <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">类名称 (required)</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="cname" minlength="2" value="{{old('cname')}}" type="text" required="">
                        <input type="hidden" value="{{$data->path}}" name="path">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">所属父类</label>
                    <div class="col-lg-10">
                        <input class="form-control " disabled="disabled" id="pname" type="pname" name="pname" value="{{$data->cname}}" required="">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">提交</button>
                        <button class="btn btn-default" type="reset">撤销</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection