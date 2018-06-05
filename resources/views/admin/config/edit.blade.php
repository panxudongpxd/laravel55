@extends('default')
@section('content')
    <form action="/admin/config/{{$data->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="col-lg-10">
            <label class="mws-form-label">版本</label>
                <div class="mes-form-item">
                    <input type="text" class="form-control" name="copy" value="{{$data->copy}}" style="width:200px;">
                </div><br>
            <label class="mws-form-label">备案信息</label>
                <div class="mes-form-item">
                    <input type="text" class="form-control" name="bah" value="{{$data->bah}}" style="width:200px;">
                </div><br>
            <label class="mws-form-label">LOGO</label>
                <div class="mes-form-item">
                    <input type="file" name="logo" value="{{$data->logo}}" style="width:200px;">
                </div><br>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection