@extends('default')
@section('content')
<!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            用户详情
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <button id="editable-sample_new" class="btn btn-primary">
                                        添加一个新的用户 <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            &nbsp;
                            <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <tr>
                                        <th>账号</th>
                                        <td>{{$data['account']}}</td>
                                    </tr>
                                    <tr>
                                        <th>姓名</th>
                                        <td>{{$data['name']}}</td>
                                    </tr>
                                    <tr>
                                        <th>性别</th>
                                        <td>{{$userinfo['sex']}}</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>手机号</th>
                                        <th>{{$userinfo['phone']}}</th>
                                    </tr>
                                    <tr>
                                        <th>邮箱</th>
                                        <th>{{$userinfo['email']}}</th>
                                    </tr>
                                    <tr>
                                        <th>QQ号</th>
                                        <th>{{$userinfo['qq']}}</th>
                                    </tr>
                                    <tr>
                                        <th>最后修改时间</th>
                                        <th>{{$userinfo['updated_at']}}</th>
                                    </tr>
                                    <!-- <td><a class="edit" href="javascript:;">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td> -->
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->
@endsection