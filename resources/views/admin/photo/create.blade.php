@extends('default')
@section('content')
    <form action="/admin/photo" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="col-lg-10">
                <label class="mws-form-label">logo添加</label>
                    <div class="mes-form-item">
                        <input type="file" name="logo" style="width:200px;">
                    </div><br>
                <label class="mws-form-label">相册名添加</label>
                    <div class="mes-form-item">
                        <input type="text" class="form-control" name="ptitle" style="width:200px;">
                    </div><br>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                </div>
            </div>
        </form>
@endsection