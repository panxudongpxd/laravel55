@extends('default')
@section('content')
    <!-- <img src="\static\admin\logo\1.jpg" style="width: 1090px"> -->
    <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" type="text/css" href="\static\admin\lunbo\css/style.css">

<script type="text/javascript" src="\static\admin\lunbo\js/koala.min.1.5.js"></script>
<script type="text/javascript">
Qfast.add('widgets', { path: "/static/admin/lunbo/js/terminator2.2.min.js", type: "js", requires: ['fx'] });  
Qfast(false, 'widgets', function () {
	K.tabs({
		id: 'decoroll2',//焦点图包裹id  
		conId: "decoimg_a2",//大图域包裹id  
		tabId:"deconum2",//小圆点数字提示id
		tabTn:"a",
		conCn: '.decoimg_b2',//大图域配置class       
		auto: 1,//自动播放 1或0
		effect: 'fade',//效果配置
		eType: 'mouseover',// 鼠标事件
		pageBt:true,//是否有按钮切换页码
		bns: ['.prev', '.next'],//前后按钮配置class                          
		interval: 3000// 停顿时间  
	}) 
}) 
</script>
</head>

<body>

<div id="decoroll2" class="imgfocus">

	<div id="decoimg_a2" class="imgbox">
		<div class="decoimg_b2"><img src="\static\admin\lunbo\img/1.jpg" style="height: 500px"></a></div>
		<div class="decoimg_b2"><img src="\static\admin\lunbo\img/2.jpg" style="height: 500px"></a></div>
		<div class="decoimg_b2"><img src="\static\admin\lunbo\img/3.jpg" style="height: 500px"></a></div>
		<div class="decoimg_b2"><img src="\static\admin\lunbo\img/4.jpg" style="height: 500px"></a></div>
	</div>
	
	<ul id="deconum2" class="num_a2">
		<li><a href="javascript:void(0)" hidefocus="true" target="_self"></a></li>
		<li><a href="javascript:void(0)" hidefocus="true" target="_self"></a></li>
		<li><a href="javascript:void(0)" hidefocus="true" target="_self"></a></li>
		<li><a href="javascript:void(0)" hidefocus="true" target="_self"></a></li>
	</ul>
	
</div>
</body>
</html>

@endsection