// js动态加载表情
tuzkiNumber=1;
function getTuzki(obj){
    var tuzkiObj=$(obj).siblings('.b-tuzki');
    if(tuzkiNumber){
        tuzkiObj.show();
        var alt=['Kiss', 'Love', 'Yeah', '啊！', '背扭', '顶', '抖胸', '88', '汗', '瞌睡', '鲁拉', '拍砖', '揉脸', '生日快乐', '摊手', '睡觉', '瘫坐', '无聊', '星星闪', '旋转', '也不行', '郁闷', '正Music', '抓墙', '撞墙至死', '歪头', '戳眼', '飘过', '互相拍砖', '砍死你', '扔桌子', '少林寺', '什么？', '转头', '我爱牛奶', '我踢', '摇晃', '晕厥', '在笼子里', '震荡'];
        var str='';
        for (var i = 1; i < 41; i++) {
            var number=formatNum(i,4);
            str+='<img src="http://'+window.location.host+'/Public/emote/tuzki/t_'+number+'.gif" title="'+alt[i-1]+'" alt="雷小天博客">';
        };
        tuzkiObj.html(str);
        tuzkiNumber=0;
    }else{
        tuzkiObj.hide();
        tuzkiNumber=1;
    }
}

/**
 * 格式化数字为一个定长的字符串，前面补0
 * @param  int Source 待格式化的字符串
 * @param  int Length 需要得到的字符串的长度
 * @return int        处理后得到的数据
 */
function formatNum(Source,Length){
    var strTemp="";
    for(i=1;i<=Length-Source.toString().length;i++){
        strTemp+="0";
    }
    return strTemp+Source;
}

// 点击添加表情
$('html').on('click','.b-tuzki img', function(event) {
    var str=$(this).prop("outerHTML");
    $(this).parents('.b-box-textarea').eq(0).find('.b-box-content').focus();
    insertHtmlAtCaret(str);
    $(this).parents('.b-tuzki').hide();
    tuzkiNumber=1;
});

/**
 * 在textarea光标后插入内容
 * @param  string  str 需要插入的内容
 */
function insertHtmlAtCaret(str) {
    var sel, range;
    if(window.getSelection){
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            var el = document.createElement("div");
            el.innerHTML = str;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
                range.insertNode(frag);
            if(lastNode){
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        document.selection.createRange().pasteHTML(str);
    }
}

// 发布评论
function comment(obj){
    $.post(check_login, function(data) {
      data = $.parseJSON(data);
        if(data.status==1){
            var content=$(obj).parents('.b-box-textarea').eq(0).find('.b-box-content').html();
            if(content!='' && content!='请先登陆后发表评论'){
                var aid=$(obj).attr('aid'),
                    pid=$(obj).attr('pid'),
                    email=$(obj).parents('.b-box-textarea').eq(0).find("input[name='email']").val(),
                    postData={
                    "aid":aid,
                    "pid":pid,
                    'content':content,
                    'email':email
                };

            if(data.email==0){
              layer.msg('邮箱为空，请到会员中心认证邮箱！', {icon: 2});
              return false;
            }
                  // 显示loading
                  layer.load(1);
                  // ajax评论
                  $.post(ajaxCommentUrl, postData, function(data) {
                      var newPid=data;
                      var replyName=$(obj).attr('username');
                      var now = new Date();
                      // 获取当前时间
                      var date=now.getFullYear()+"-"+((now.getMonth()+1)<10?"0":"")+(now.getMonth()+1)+"-"+(now.getDate()<10?"0":"")+now.getDate()+'&emsp;'+(now.getHours()<10?"0":"")+now.getHours()+':'+(now.getMinutes()<10?"0":"")+now.getMinutes()+':'+(now.getSeconds()<10?"0":"")+now.getSeconds();
                      var headImg=$('#vipsignin .img-circle').attr('src');
                      var nickName=$('#vipsignin .img-circle').attr('alt');

                      if(pid==0){
                          // pid为0表示新增评论
                          var str='<li class="bg-color"><div class="comment-ava"><img class="img-circle" src="'+headImg+'" alt="'+nickName+'"/></div><div class="comment-info "><div class="comment-line "><ul><li><a ><i class="el-user"></i>'+nickName+'</a></li><li><a title="发表于'+date+'"><i class="el-time"></i>'+date+'</a></li><li><a title="'+nickName+' 当前位于：'+data.city+'"><i class="el-map-marker"></i>'+data.city+'</a></li></ul></div><div class="comment-content">'+content+'&nbsp;<a href="javascript:;" aid="'+aid+'" pid="'+newPid+'" username="'+nickName+'" onclick="reply(this)"><button style="background:#da1a8d;color:#f3efef;">回复</button></a></div><ul class="re-comment"></ul></div></li>';
                          $('.b-user-comment').prepend(str);
                      }else{
                        if(data.type=='yes'){
                          // pid不为0表示是回复评论
                          var str='<li style="border-left:none;"><div class="admin-ava"><img src="'+headImg+'" alt="'+nickName+'" title="'+nickName+'" class="img-circle"></div><div class="re-info"><span><img src="/Template/xiao/Home/Public/images/icon/ok.png"><a href="#" target="_blank">'+nickName+'</a><time>'+date+'</time> 回复 <a href="#Comment-1">'+replyName+'</a></span><div class=" re-content">'+content+'&nbsp;<a href="javascript:;" aid="'+aid+'" pid="'+newPid+'" username="'+replyName+'" childname="'+nickName+'" onclick="reply(this)"><button style="background:#da1a8d;color:#f3efef;">回复</button></a></div></div></li>';
                            $(obj).parents('.comment-info').eq(0).append(str);
                          $(obj).parents('.b-box-textarea').eq(0).remove();
                        }else{
                          layer.closeAll();
                          layer.msg('不能自己评论自己！', {icon: 2});
                          return false;
                        }
                      }
                      $(obj).parents('.b-box-textarea').eq(0).find('.b-box-content').html('');
                      // 关闭loading
                      layer.closeAll();
                  },"json");

            }else{
              layer.msg('请填写评论内容！', {icon: 2});
              return false;
            }
        }else{
          $(".hide_box2").fadeToggle();
            $(".shang_box2").fadeToggle();
        }
    });
}

// 回复评论
function reply(obj){
    var boxTextarea=$('.b-user-comment').find('.b-box-textarea');
    if(boxTextarea.length==1){
        boxTextarea.remove();
    }
    var aid=$(obj).attr('aid');
    var pid=$(obj).attr('pid');
    // var username=$(obj).attr('username');
    var check=$(obj).attr('childname');
    if(check==undefined){
      var username=$(obj).attr('username');
    }else{
      var username=check;
    }

    var str='<div class="b-box-textarea"><div class="b-box-content" contenteditable="true" onfocus="delete_hint(this)">请先登陆后回复评论</div><ul class="b-emote-submit"><li class="b-emote"><i class="fa fa-smile-o" onclick="getTuzki(this)"></i><input style="height:30px;margin-left:-4px;" class="form-control b-email" type="text" name="email" placeholder="接收回复的email地址" value="'+userEmail+'"><div class="b-tuzki"></div></li><li class="b-submit-button"><input type="button" value="评 论" aid="'+aid+'" pid="'+pid+'" username="'+username+'" onclick="comment(this)"></li><li class="b-clear-float"></li></ul></div>';
    var parentObj=$(obj).parents('.comment-info').eq(0).append(str);
}

// 删除提示和样式
function delete_hint(obj){
    var word=$(obj).text();
    if(word=='请先登陆后发表评论' || word=='请先登陆后回复评论'){
        $(obj).text('');
        $(obj).css('color', '#333');
    }
}
// 检查是不是自己评论自己,没用
function checkouid(pid){
  $.ajax({
    type:"POST",
    url:"http://www.100txy.com/Home/Index/checkouid",
    data:"pid="+pid,
    dataType:"json",
    success:function(data){
      return data.type;
    },
  });
}
