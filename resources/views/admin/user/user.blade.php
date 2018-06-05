@extends('default')
@section('content')
<!-- 请使用editable_table模板 -->
<!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Editable Table
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <form action="/admin/user" method="get ">
        显示：<select name="count">
                <option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
                <option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] == 10) selected @endif>10</option>
                <option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] == 15) selected @endif>15</option>
                <option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] == 20) selected @endif>20</option>
                <option value="25" @if(isset($params) && !empty($params['count']) && $params['count'] == 25) selected @endif>25</option>
              </select>条
        关键字：<input type="text" name="account" value="{{$params['account'] or '' }}">
                <input type="submit" value="搜索" class="btn btn-success">
    </form><br>
                <form class="searchform" action="index.html" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
                </form>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>头像</th>
                    <th>账号</th>
                    <th>姓名</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                @foreach($data as $v)
                <tbody>
                <tr class="">
                    <td>{{ $v->id }}</td>
                    <td><img src="{{$v->userinfo->tou}}" style="width: 40px;height: 40px"></td>
                    <td>{{ $v->account }}</td>

                    <td>{{ $v->name }}</td>
                    <td>{{ $v->userinfo->created_at}}</td>
                    <td>
                        <form action="/admin/user/{{$v->id}}" method="post" style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">删除</button>
                        </form>
                            <a href="/admin/user/{{$v->id}}/edit" class="btn btn-warning btn-sm">修改</a>
                        <a href="/admin/user/{{$v->id}}" class="btn btn-info btn-sm">详情</a>
                        
                        

                     </td>
                </tr>
                </tbody>
                 @endforeach
                </table>
                <div class="page">
                        {!! $data->appends($params)->render() !!}
        </div>
                </div>
                </div>
                </section>
                </div>
                </div>
                
        </div>
        <!--body wrapper end-->
@endsection