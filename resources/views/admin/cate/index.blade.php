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

    <div class="adv-table editable-table ">
  <div class="space15"></div>
  <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <div class="row">
    <form action="{{url('admin/cate')}}" method="get">
      <div class="col-lg-6">
        <div id="editable-sample_length" class="dataTables_length">
            <select size="1" aria-controls="editable-sample" class="form-control xsmall" name="count">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="dataTables_filter" id="editable-sample_filter">
          
            <input type="text" aria-controls="editable-sample" name='keywords' placeholder="请输入关键字..." class="form-control medium" style="margin-left: 50px;margin-right: 20px" ><button type="submit" class="btn btn-success">查询</button>
        </div>
      </div>
      </form>
    </div>
    <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
      <thead>
        <tr role="row" align="center">
          <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="ID" >ID编号</th>
          <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name" >类别名称</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" >PID</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" >PATH</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" >
          	操作
          </th>
      </thead>
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach($data as $v)
        <tr class="odd">
          <td class="  sorting_1">{{$v->id}}</td>
          <?php $n=substr_count($v->path,',')-1;?>
          <td class=" "><?=str_repeat('|---',$n)?>{{$v->cname}}</td>
          <td class=" ">{{$v->pid}}</td>
          <td class="center ">{{$v->path}}</td>
          <td class=" ">
            {{--<a href="" style="display:inline;float: left;margin:0px 10px" class="btn btn-success">编辑</a> --}}
            <a href="{{url('/admin/cate/addson',[$v->id])}}" style="display:inline;float: left;margin:0px 10px" class="btn btn-info">添加子类</a>
          	<form style="display:inline;float: left;" action="{{url('/admin/cate',[$v->id])}}" method="post">
          		{{csrf_field()}}
          		{{method_field('delete')}}
          		<button type="submit" class="btn btn-danger">删除</button>
          	</form>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-lg-12">
        <div class="dataTables_paginate paging_bootstrap pagination" style="margin-right:300px">
          {{ $data->appends($params)->render() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection