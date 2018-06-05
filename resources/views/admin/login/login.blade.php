<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<title>登陆</title>
<link href="/static/admin/login/css/bootstrap.min.css" title="" rel="stylesheet" />

<link title="orange" href="/static/admin/login/css/login.css" rel="stylesheet" type="text/css"/>


</head>

<body>
  <div style="height:1px;"></div>
  <div class="login">
     <header>
	    <h1>登陆</h1>
	 </header>
	 <!--显示错误信息-->
	 @if (count($errors) > 0 )
	 	<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
	 	</div>
	 @endif
	  @if(session('error'))
		<div><p style="color: red;">{{session('error')}}</p></div>
 	  @endif
	 <div class="sr">
	    <form action="{{url('/admin/login')}}" method="post">
	    {{csrf_field()}}
		    <div class="name">
				<label>
				<i class="sublist-icon glyphicon glyphicon-user"></i>
				</label>
				<input type="text"  placeholder="这里输入登录名" name="name" class="name_inp">
			</div>
			 <div class="name">
				<label>
				<i class="sublist-icon glyphicon glyphicon-pencil"></i>
				</label>
				<input type="password"  placeholder="这里输入登录密码" name="password" class="name_inp">
			</div>
			
			<div >
				<input type="text" name="captcha" style="height:50px;border: 1px solid #0072e3" >
				<img src="/index/captcha/{tmp}" title="点击换图" style="width: 105px;height:50px"  id="img"
				  onclick="fun()">
			</div>
			<br>
			<button class="dl">登陆</button>
		</form>
	 </div>
  </div>
  <script language="javascript" type="text/javascript">
        function fun()
        {
            var el =document.getElementById("img");
            el.src=el.src+'?';//这个特别重要
        }

</script>

</body>
</html>
