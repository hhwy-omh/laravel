@extends('layouts.main')

@section('title','广场')

@section('content')

	<!-- 主体 -->
	<div class="container clearfix">
		<div class="left"></div>
		<div class="right">
            @include('index.top10')
			<div class="side">
				<h3>活跃用户</h3>
				<ul class="user-act clearfix">
                    @foreach($acUsers as $u)
					<li><a href="{{ route('space',['id'=>$u->user_id]) }}"><img src="{{ Storage::url($u->user->face) }}" alt=""><br>{{ $u->user->mobile }}</a></li>
                    @endforeach
				</ul>
			</div>
		</div>
    </div>


<script src="/ueditor/third-party/jquery.min.js"></script>
<script>

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

var disallow_load = true;   // 是否不允许 加载
var ajax_blog_url = "{{ route('ajax.newblogs') }}"; // 取日志的地址

// 为窗口绑定滚动事件
$(window).on('scroll',function(){

    // 如果不允许加载就直接退出
    if(disallow_load)
        return ;

    // 整个页面的高度
    var dh = $(document).height();
    // 窗口的高度
    var wh = $(window).height();
    // 滚动的高度
    var sh = $(window).scrollTop();

    //console.log( dh   ,  wh    , sh );

    // 到底儿
    if(wh+sh >= dh)
    {
        // 在执行AJAX时不允许再触发这个事件
        disallow_load = true;

        // 加载
        load_data();


    }


});

// 加载数据
function load_data() {
    // 创建图片
    var img = $("<img src='/images/loading.gif'>");
    // 加到页面
    $(".left").append(img);

    setTimeout(function(){

        $.ajax({
            type:"GET",
            url:ajax_blog_url,
            dataType:"json",   // 服务器数据的格式
            success:function(data) {
                // 判断是否还有下一页数据
                if(data.next_page_url == null)
                {
                    // 如果没有数据，直接把 scroll 事件删除
                    $(window).off('scroll');
                }
                else
                {
                    // 把下一页的地址设置到AJAX的请求地址上，下次执行AJAX时，就请求下一页了
                    ajax_blog_url = data.next_page_url;
                }
                // 把JSON数据转成HTML显示在页面
                var html = "";
                // 循环JSON
                $(data.data).each(function(k,v){

                    // 1. JS里不能人换行
                    // 2. 把数据放进去
                    html += '<div class="art-list"><a target="_blank" href="/blog/'+v.id+'"><p class="title">'  +  htmlspecialchars(v.title)  +   '</p><p class="img"><img src="http://localhost:8000/uploads/'  +  v.logo +   '" alt=""></p></a><p class="btns">'  +  v.created_at  +   ' （评论：11）（阅读：'  +  v.display  +   '）（顶：'  +  v.zhan  +   '）（作者：'  +  v.user.mobile  +   '）</p></div>';
                });
                // 把HTML放到页面中
                $(".left").append( html );
                // 可以允许触发事件
                disallow_load=false;
                // 删除加载图片
                img.remove();
            }
        });

    }, 1000);
}

// 直接取数据
load_data();

</script>

@endsection
