@extends('default')
@section('content')
<style type="text/css">
	#lunbo ul{
		list-style: none;
		width: 100%;
	}
	#lunbo ul li{
		width: 320px;
		height: 200px;
		border: 2px  solid rgba(0,0,0,0.1);
		float: left;
		border-radius: 3px;
		margin: 20px 30px;
	}
	#lunbo ul li:hover{
		border:1px  solid red;
		box-shadow: 0px 0 0px rgba(0, 0, 0, 0.05)
	}
	#img2{
		width: 30px;
		height:20px;
		margin-bottom:-150px;
		margin-left: -40px;
		opacity: 0.2;
	}
</style>
<div class="container">
  <div class="row">
	<div id='lunbo' class="col-md-12">
		<ul>
			@foreach($data as $v)
			<li><img src="{{$v->url}}"><a href="{{url('/admin/lunbo/delete',[$v->id])}}"><img id='img2' src="/static/admin/images/delete.jpg"></a></li>
			@endforeach
		</ul>
	</div>
  </div>
</div>
<script type="text/javascript">
	$('img').mouseenter(function(){
		//$(this).css('display','block');
	}).mouseleave(function(){
		//$(this).('img:nth-child(2)').css('display','none');
	});
</script>
@endsection