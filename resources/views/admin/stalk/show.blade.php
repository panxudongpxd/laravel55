@extends('default')
@section('content')
<!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            说说详情
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">

                            &nbsp;
                            <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <tr>
                                        <th width='8%'>作者</th>
                                        <td>{{$stalkinfo['gname']}}</td>
                                    </tr>
                                    <tr>
                                        <th>文章内容</th>
                                        <td>{!! $stalkinfo['ssinfo'] !!}</td>
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