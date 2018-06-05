@extends('default')
@section('content')
    <h1 class="text-info text-center">{{$title}}</h1>
    @if ($errors->any())
     <div class="alert alert-danger">
        <ul>
     @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
     @endforeach
        </ul>
     </div>
    @endif
    <form action="/admin/blank" method="post">
    {{ csrf_field() }}
        <div class="col-lg-10">
            <label class="mws-form-label">栏目名添加</label>
                <div class="mes-form-item">
                    <input type="text" class="form-control" name="btitle" value="{{old('btitle')}}" style="width:200px;">
                </div><br>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection