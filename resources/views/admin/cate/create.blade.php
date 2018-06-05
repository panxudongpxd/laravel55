@extends('default')
@section('content')
@if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
<section class="panel">
<header class="panel-heading">
    顶级类类添加
</header>
<div class="panel-body">
    <div class=" form">
        <form class="cmxform form-horizontal adminex-form" id="commentForm" method="post" action="{{url('admin/cate')}}" novalidate="novalidate">
        	{{csrf_field()}}
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-2">分类名(required)</label>
                <div class="col-lg-10">
                    <input class=" form-control" id="cname" name="cname" minlength="2" type="text" required="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-primary" type="submit">添加</button>
                    <button class="btn btn-default" type="reset">重置</button>
                </div>
            </div>
        </form>
    </div>

	</div>
</section>
@endsection