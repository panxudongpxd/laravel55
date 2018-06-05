@extends('default')
@section('content')
    <form action="/admin/photo/{{$data->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
            <div class="col-lg-10">
                <label class="mws-form-label">logo修改</label>
                    <div class="mes-form-item">
                        <input type="file" name="logo" value="{{ $data->logo }}" style="width:200px;">
                    </div><br>
                <label class="mws-form-label">相册名修改</label>
                    <div class="mes-form-item">
                        <input type="text" class="form-control" name="ptitle" value="{{ $data->ptitle }}" style="width:200px;">
                    </div><br>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                </div>
            </div>
    </form>
@endsection