@extends('default')
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
	<div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        添加用户
                    </header>
                    <div class="panel-body">
                        <form action="/admin/user" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="account">账号</label>
                                <input type="text" class="form-control" name="account" placeholder="请输入首字母开头6-18位字母,数字,下划线" value="{{ old('account') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密码</label>
                                <input type="password" class="form-control" name="password" placeholder="请输入至少5位密码">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">确认密码</label>
                                <input type="password" class="form-control" name="password2" placeholder="密码请保持一致">
                            </div>
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" name="name" placeholder="请输入姓名">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">邮箱</label>
                                <input type="email" class="form-control" name="email" placeholder="请输入正确的邮箱格式" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="sex">性别</label>
                                <input type="text" class="form-control" name="sex" placeholder="请输入男或女或者其他(手动滑稽)" value="{{ old('sex') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">电话</label>
                                <input type="text" class="form-control" name="phone" placeholder="请输入电话号" value="{{ old('phone') }}">
                            </div>                            
                            <div class="form-group">
                                <label for="qq">QQ号</label>
                                <input type="text" class="form-control" name="qq" placeholder="请输入您的小企鹅" value="{{ old('qq') }}">
                            </div>
                            <div class="form-group">
                                <label for="tou">头像</label>
                                <input type="file" id="tou" name="tou">
                          </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">协议条款
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">添加</button>
                        </form>
                    </div>
                </section>
            </div>
@endsection