@extends('.default')
@section('content')

<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
    <div class="page-heading">
        <h3>
            说说列表
        </h3>
        <ul class="breadcrumb">
            <li>
                <a href="#">说说管理</a>
            </li>
            <li class="active"> 说说列表 </li>
        </ul>
    </div>
    <br />
    <form action="{{url('/admin/stalk')}}" method="get">
    &nbsp;&nbsp;&nbsp;
        显示：
        <select size="1" name="count">
            <option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] ==5) selected @endif>5</option>
            <option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] ==10) selected @endif>10</option>
            <option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] ==15) selected @endif>15</option>
            <option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] ==20) selected @endif>20</option>
        </select>&nbsp;&nbsp;条
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        关键字：<input type="text" name="sstitle" value="{{ $params['sstitle'] or '' }}">
        <input type="submit" value="搜索" class="btn btn-success">
    </form>
    <br />
    <!-- 标题开始 -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
          <tr role="row">
              <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" >编号</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >作者头像</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >说说标题</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >发表时间</th>

              <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >操作</th>
          </tr>

        </thead>
    <!-- 标题结束 -->
        @foreach($data as $k=>$v)
    <!-- 内容开始 -->
        <tbody role="alert" aria-live="polite" aria-relevant="all">

            <tr class="odd">
                <td class=" sorting_1">{{ $v->id }}</td>
                <td class="center "><img src="{{ $v->xfile }}" style="width:50px">  </td>
                <td class="center ">{{ $v->sstitle }}</td>
                <td class="center ">{{ $v->created_at }}</td>
                <td class="center ">

                    <form style="display: inline;" action="/admin/stalk/{{ $v->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="删除" onclick="return confirm('确认删除吗？');" class="btn btn-danger" >
                    </form>

                    <form style="display: inline;" action="/admin/stalk/{{ $v->id }}" method="get">
                        <input type="submit" value="详细信息" class="btn btn-info">
                    </form>

                </td>
            </tr>

        </tbody>
        @endforeach
    </table>

    <!-- 内容结束 -->

    <!-- 分页开始 -->
        <div class="page">
            {!! $data->appends($params)->render() !!}
        </div>
    <!-- 分页结束 -->

</div>

@endsection