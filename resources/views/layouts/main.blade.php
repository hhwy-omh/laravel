<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/common.css">
    <style>
    .pagination{display:-ms-flexbox;display:flex;padding-left:0;list-style:none;border-radius:.25rem}.page-link{position:relative;display:block;padding:.5rem .75rem;margin-left:-1px;line-height:1.25;color:#007bff;background-color:#fff;border:1px solid #dee2e6}.page-link:hover{z-index:2;color:#0056b3;text-decoration:none;background-color:#e9ecef;border-color:#dee2e6}.page-link:focus{z-index:2;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.page-link:not(:disabled):not(.disabled){cursor:pointer}.page-item:first-child .page-link{margin-left:0;border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}.page-item:last-child .page-link{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}.page-item.active .page-link{z-index:1;color:#fff;background-color:#007bff;border-color:#007bff}.page-item.disabled .page-link{color:#6c757d;pointer-events:none;cursor:auto;background-color:#fff;border-color:#dee2e6}.pagination-lg .page-link{padding:.75rem 1.5rem;font-size:1.25rem;line-height:1.5}.pagination-lg .page-item:first-child .page-link{border-top-left-radius:.3rem;border-bottom-left-radius:.3rem}.pagination-lg .page-item:last-child .page-link{border-top-right-radius:.3rem;border-bottom-right-radius:.3rem}.pagination-sm .page-link{padding:.25rem .5rem;font-size:.875rem;line-height:1.5}.pagination-sm .page-item:first-child .page-link{border-top-left-radius:.2rem;border-bottom-left-radius:.2rem}.pagination-sm .page-item:last-child .page-link{border-top-right-radius:.2rem;border-bottom-right-radius:.2rem}
    .active {
        background-color: #F00;
    }
    </style>
</head>
<body>

    <!-- 导航 -->
    <div class="header">
		<div class="container">
            @if(session('id'))
                @if(session('face'))
                    <img id="face" src="{{  Storage::url(session('face'))    }}" width="50">
                @endif
                <span id="username">{{ session('mobile') }}</span>
                <a @if(Route::currentRouteName() == 'space') class="active" @endif href="{{ route('space') }}">个人主页</a>
                <a @if(Route::currentRouteName() == 'password') class="active" @endif href="{{ route('password') }}">修改密码</a>
                <a @if(Route::currentRouteName() == 'face') class="active" @endif href="{{ route('face') }}">设置头像</a>
                <a @if(Route::currentRouteName() == 'blog.list') class="active" @endif href="{{ route('blog.list') }}">我的日志</a>
                <a @if(Route::currentRouteName() == 'space.messages') class="active" @endif href="{{ route('blog.list') }}">我的消息 <span class="num-tip">20</span></a>
                <a href="{{ route('logout') }}">退出</a>
            @else
                <a @if(Route::currentRouteName() == 'regist') class="active" @endif href="{{ route('regist') }}">注册</a>
                <a @if(Route::currentRouteName() == 'login') class="active" @endif href="{{ route('login') }}">登录</a>
            @endif
			<div class="fr">
				<a @if(Route::currentRouteName() == 'index') class="active" @endif href="{{ route('index') }}">广场</a>
			</div>
		</div>
	</div>

    <div class="container">
    @if($errors->any())
    <ul class="error">
        @foreach($errors->all() as $e)
        <li>{{$e}}</li>
        @endforeach
    </ul>
    @endif
    </div>

@yield('content')

<div class="container">
    <p>技术支持：全栈1班</p>
</div>

</body>
</html>
