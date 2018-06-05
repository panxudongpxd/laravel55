@extends('default')
@section('content')
    <form action="/admin/blank/{{$data->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="col-lg-10">
            <label class="mws-form-label">修改</label>
                <div class="mes-form-item">
                    <input type="text" class="form-control" name="btitle" value="{{$data->btitle}}" style="width:200px;">
                </div><br>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection