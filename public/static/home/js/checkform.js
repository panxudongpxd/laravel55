function checkform(){  // 关闭游客留言功能  // layer.msg('游客留言通道已关闭！', {icon: 2});  // return false;  //  //    if($("#u_name").val()=="" || $("#u_name").val().length<2){  //             layer.msg('用户名不能为空或者昵称太短了喔', {icon: 2});  //              return false;  //         }  //  //   if($("#u_mail").val()==""){
  //       layer.msg('邮箱不能为空喔', {icon: 2});
  //        return false;
  //   }else{
  //     var reg=/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
  //     var email=$("#u_mail").val();
  //     if(!reg.test(email) ){
  //       layer.msg('邮箱格式错误喔', {icon: 2});
  //       return false;
  //     }
  //   }

    if($("#u_url").val()!=""){
      var reg=/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
      var url=$("#u_url").val();
      if(!reg.test(url) ){
        layer.msg('网站格式错误喔，请输入带http格式的网址', {icon: 2});
        return false;
      }
    }

    if($("#txaArticle").val()=="" || $("#txaArticle").val().length<2){        layer.msg('亲啥都没写喔，或者内容太少啦！', {icon: 2});         return false;    }    if($("#verify").val()==""){             layer.msg('验证码不能为空喔', {icon: 2});              return false;     }    if($("#txaArticle").val()!="" && $("#verify").val()!=""){
      var verify=$("#verify").val();
      var name=$("#u_name").val();
      var mail=$("#u_mail").val();
      var url=$("#u_url").val();
      var type=$("#type").val();
      var txaArticle=$("#txaArticle").val();
      if(type=='2'){
        var mid=$("#mid").val();
        var cid=0;
      }else if (type=='3') {
        var mid=0;
        var cid=$("#cid").val();
      }else {
        var mid=0;
        var cid=0;
      }
      $.ajax({
        type:"POST",
        // url:"ajax_feedback",
        url:"http://www.100txy.com/Home/Index/ajax_feedback",
        // data:{'verify':verify,'name':name},
        data:"verify="+verify+"&name="+name+"&mail="+mail+"&url="+url+"&content="+txaArticle+"&type="+type+"&mid="+mid+"&cid="+cid,
        dataType:"json",

        success:function(data){
          if(data.status=='no'){
            if(data.login=='no'){
              layer.msg('请先登录再留言！', {icon: 2});
              return false;
            }
            if(data.email=='no'){
              layer.msg('请先认证邮箱再留言！', {icon: 2});
              return false;
            }
            layer.msg(data.msg, {icon: 2});
            setTimeout(function(){
              var verify=document.getElementById('safecode');
              verify.setAttribute('src','http://www.100txy.com/Admin/Login/showVerify.html');
            },500);//这代表2秒后跳转
            return false;
          }else{
            var date=data.date;
            var ip=data.ip;
            var city=data.city;
            var src=data.src;
            //  layer.msg('恭喜提交成功！待管理员审核通过后显示!', {icon: 1});
             layer.msg('恭喜您，留言成功！', {icon: 1});
            var str='<li class="bg-color"><div class="comment-ava"><img class="img-circle" src="'+src+'" alt="'+name+'" title="'+name+'"/></div><div class="comment-info "><div class="comment-line "><ul><li><a ><i class="el-user"></i>'+name+'</a></li><li><a title="发表于'+date+'"><i class="el-time"></i>'+date+'</a></li><li><a title="'+name+' 当前位于：'+city+'"><i class="el-map-marker"></i>'+city+'</a></li><li><a title="'+name+' 当前IP:'+ip+'"><i class="el-network"></i>'+ip+'</a></li></ul></div><div class="comment-content">'+txaArticle+'</div><ul class="re-comment"></ul></div></li>';
            $('.feedback-comment').prepend(str);
            setTimeout(function(){
              var verify=document.getElementById('safecode');
              verify.setAttribute('src','http://www.100txy.com/Admin/Login/showVerify.html');
            },500);//这代表2秒后跳转
             $("html, body").animate({              scrollTop: $("#location").offset().top }, {duration: 500,easing: "swing"});            	return false;          }
          // alert(data.status);
        },
        error:function(jqXHR){
          layer.msg('发送错误：'+jqXHR.status, {icon: 2});
        },
      });
      // layer.alert('恭喜提交成功！待管理员审核通过后显示!', {icon: 1});      return false;    }else{    return true;     }
}
// 回复评论区域
function replyfeedback(id){
    var boxTextarea=$('.re-comment').find('.c-textarea');
    if(boxTextarea.length==1){
        boxTextarea.remove();
    }
  str='<div class="c-textarea"><textarea name="u_content"  id="ctxaArticle" placeholder="说点什么吧..."  ></textarea><input type="submit" class="btn btn-inverse"  onclick="return doreply('+id+')" value="确定" /></div>';
  $('#'+id).prepend(str);
}
//确定回复评论
function doreply(id){
    var ctxaArticle=$("#ctxaArticle").val();
    var asrc="/Template/xiao/Home/Public/images/icon/ava.jpg";
    var bsrc="/Template/xiao/Home/Public/images/icon/ok.png";
    $.ajax({
      type:"POST",
      // url:"ajax_reply",
      url:"http://www.100txy.com/Home/Index/ajax_reply",
      // get 方式data:{'verify':verify,'name':name},
      data:"id="+id+"&recontent="+ctxaArticle,
      dataType:"json",
      success:function(data){
        var boxTextarea=$('.re-comment').find('.c-textarea');
        if(boxTextarea.length==1){
            boxTextarea.remove();
        }
          var redate=data.redate;
          var name=data.name;
          var str='<li style="border-left:none;"><div class="admin-ava"><img src="'+asrc+'" alt="雷小天" title="雷小天" class="img-circle"/></div><div class="re-info"><span><img src="'+bsrc+'"/><a href="http://www.100txy.com" target="_blank">雷小天</a><time>'+redate+'</time> 回复 <a href="#Comment-113">@'+name+'</a></span><div class=" re-content">'+ctxaArticle+'</div></div></li>';
          $('#'+id).prepend(str);
      },
      error:function(jqXHR){
        layer.msg('发送错误：'+jqXHR.status, {icon: 2});
      },
    });
}
