@extends('layouts.main')

@section('title')
{{ $blog->title}}
@endsection

@section('content')

<style>
    .con img {
        max-width:750px;
    }
</style>

	<!-- 主体 -->
	<div class="container clearfix">
		<div class="left">
			<div class="art-con">
				<div class="head">
					<h1 class="title">{{ $blog->title }}</h1>
					<p class="author">时间：{{ $blog->created_at }} &nbsp;&nbsp; 作者：{{ $blog->user->mobile }}</p>
				</div>
				<div class="con">
					{!! clean($blog->content) !!}
				</div>
				<p class="btns">（评论：11）（阅读：{{ $blog->display }}）（<input id="ding" type="button" value="顶">：<span id="dingnum">{{ $blog->zhan }}</span>   ）</p>
			</div>
			<!-- 评论 -->
			<div class="comment">
				<p class="people-count">参与评论人数：<span>20038</span></p>
                @if(session('id'))
                <form class="comment-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
					<div class="form-div"><textarea name="content" id="" cols="30" rows="10"></textarea></div>
					<div class="form-div"><input id="btn-comment" type="button" value="发表评论"></div>
				</form>
                @else
                <p><a href="{{ route('login') }}">登录</a>之后，可以发表评论</p>
                @endif
				<div class="comment-list"></div>
			</div>
		</div>
		<div class="right">
            @include('index.top10')
		</div>
	</div>


<script src="/ueditor/third-party/jquery.min.js"></script>
<script>

// 发表评论
$("#btn-comment").click(function(){

    var content = $.trim($("textarea[name=content]").val());
    var blog_id = $("input[name=blog_id]").val();
    var _token = $("input[name=_token]").val();

    if(content == "")
    {
        alert("评论内容不能为空！");
        return ;
    }

    if(content.length < 10)
    {
        alert("评论内容至少10个字符！");
        return ;
    }


    $.ajax({
        type:"POST",
        url:"/comment",
        data:{content:content,blog_id:blog_id,_token:_token},
        dataType:"json",
        success:function(data) {
            // 清空框
            $("textarea[name=content]").val('');
        }
    });


});



// 点赞
$("#ding").click(function(){

    $.ajax({
        type:"GET",
        url:"/ding/{{$blog->id}}",
        dataType:"json",
        success:function(data) {
            if(data.errno!=0)
            {
                if(data.errno==1001)
                {
                    location.href = "/login";
                }
                // 如果已经 点过了就把按钮禁用
                if(data.errno==3)
                {
                    $("#ding").attr("disabled",true);
                }
                alert(data.errmsg);
            }
            else
            {
                $("#dingnum").html(  1*$("#dingnum").html() + 1  );
            }
        }
    });


});


/******************** 滚动加载评论  ******************/
$(window).on('scroll',function(){

    // 窗口固定的高度
    var wh = $(window).height();
    // 窗口滚动了的高度
    var sh = $(window).scrollTop();
    // 网页的高度
    var dh = $(document).height();


    if(wh+sh+1 >= dh)
    {
        load_data();
    }

});



// AJAX请求的地址
var ajax_get_url = "{{  route('comment.index', ['blog_id'=>$blog->id]) }}";
var allow=true; // 防止重复载
// 编写一个加载数据的函数
function load_data() {
    if(!allow)
        return ;
    // 正在加载中，所以设置不允许再加载
    allow=false;

    // 创建一个自动行车的图片对象
    var img = $("<img src='/images/loading.gif'>");

    // 添加在页面中
    $(".comment-list").append( img );

    // 加载数据加个0.5秒的延迟
    setTimeout(function(){

        // ajax 加载数据
        $.ajax({
            type :"GET",
            url:ajax_get_url,
            dataType:"json",
            success:function(data){

                if(data.next_page_url == null)
                {
                    // 关闭滚动事件
                    $(window).off('scroll');
                }
                else
                {
                    // 设置下一次请求的地址
                    ajax_get_url = data.next_page_url;
                }

                // 把JSON转成HTML显示在页面上
                var html="";
                $(data.data).each(function(k,v){
                    html += '<div class="comment-item clearfix"> \
                            <div class="left"> \
                                <img src="/uploads/'+v.user.face+'" alt=""><br> \
                                '+v.user.mobile+' \
                            </div> \
                            <div class="right"> \
                                <p class="date">'+v.created_at+' 发表：</p> \
                                <p class="con">'+htmlspecialchars(v.content)+'</p> \
                            </div> \
                        </div>';
                });

                // 显示到页面中
                $(".comment-list").append(html);

                // 允许继续加载
                allow=true;

                // AJAX结束删除自行车
                img.remove();

            }
        });

    },500);

}

// 前端防XSS攻击
function htmlspecialchars(str) {
              var s = "";
              if (str.length == 0) return "";
              for   (var i=0; i<str.length; i++)
              {
                  switch (str.substr(i,1))
                  {
                      case "<": s += "&lt;"; break;
                      case ">": s += "&gt;"; break;
                      case "&": s += "&amp;"; break;
                      case " ":
                          if(str.substr(i + 1, 1) == " "){
                              s += " &nbsp;";
                              i++;
                          } else s += " ";
                          break;
                      case "\"": s += "&quot;"; break;
                      case "\n": s += "<br>"; break;
                      default: s += str.substr(i,1); break;
                  }
              }
              return s;
          }
</script>

@endsection

