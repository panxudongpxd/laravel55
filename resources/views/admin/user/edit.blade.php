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
                        修改用户
                    </header>
                    <div class="panel-body">

                        <form action="/admin/user/{{$data['id']}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="account">账号</label>
                                <input type="text" class="form-control" name="account" placeholder="请输入首字母开头6-18位字母,数字,下划线" value="{{ $data['account'] }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密码</label>
                                <input type="password" class="form-control" name="password" placeholder="请输入至少5位密码" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">确认密码</label>
                                <input type="password" class="form-control" name="password2" placeholder="请保持密码一致" >
                            </div>
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" name="name" placeholder="请输入姓名" value="{{  $data['name']  }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">邮箱</label>
                                <input type="email" class="form-control" name="email" placeholder="请输入正确的邮箱格式" value="{{ $userinfo['email'] }}">
                            </div>
                            <div class="form-group">
                                <label for="sex">性别</label>
                                <input type="text" class="form-control" name="sex" placeholder="请输入男或女或者其他(手动滑稽)" value="{{ $userinfo['sex'] }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">电话</label>
                                <input type="text" class="form-control" name="phone" placeholder="请输入电话号" value="{{ $userinfo['phone'] }}">
                            </div>                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">QQ号</label>
                                <input type="text" class="form-control" name="qq" placeholder="请输入您的小企鹅" value=" {{$userinfo['qq']}} ">
                            </div>
                            <div class="form-group">
                                <label for="tou">头像</label>
                                <input type="file" id="tou" name="tou" value="{{$data->logo}}">
                          </div>
                            <button type="submit" class="btn btn-primary">修改</button>
                        </form>
                    </div>
                </section>
            </div>

@endsection