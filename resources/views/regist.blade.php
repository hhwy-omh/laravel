@extends('layouts.main')
@section('title','注册')
@section('content')

    <div class="container">
		<h1>用户注册</h1>
        <form action="{{ route('doregist') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-div">头像：<input type="file" name="face"></div>
			<div class="form-div"><input type="text" name="mobile" placeholder="手机号码"></div>

			<div class="form-div"><input type="password" name="password" placeholder="请输入6到18位密码"></div>
			<div class="form-div"><input type="password" name="password_confirmation" placeholder="再次输入密码"></div>
			<div class="form-div"><input type="checkbox" name="protocol"> 《同意注册协议》</div>
			<div class="form-div"><input type="submit" value="注册"></div>
		</form>
	</div>


    <script src="/ueditor/third-party/jquery.min.js"></script>
    {{--<script>--}}

    {{--var seconds=60;--}}
    {{--var si;  // 保存定时器--}}

    {{--$("#btn-send").click(function(){--}}

        {{--// 获取手机号码--}}
        {{--var mobile = $("input[name=mobile]").val();--}}

        {{--// 执行AJAX发到服务器--}}
        {{--$.ajax({--}}
            {{--type:"GET",     // GET方式--}}
            {{--url:"{{ route('ajax-send-modbile-code') }}",    // AJAX提交的地址--}}
            {{--data:{mobile:mobile},                           // 提交的参数（手机号码）--}}
            {{--success:function(data) {                        // AJAX成功之后执行的代码--}}

                {{--// 设置按钮失效--}}
                {{--$("#btn-send").attr('disabled',true);--}}

                {{--// 每1秒执行一次--}}
                {{--si = setInterval(function(){--}}
                    {{--seconds--;--}}
                    {{--if(seconds==0)--}}
                    {{--{--}}
                        {{--// 生效--}}
                        {{--$("#btn-send").attr('disabled',false);--}}
                        {{--seconds=60;--}}
                        {{--$("#btn-send").val("发送验证码");--}}
                        {{--// 关闭定时器--}}
                        {{--clearInterval( si );--}}
                    {{--}--}}
                    {{--else{--}}
                        {{--$("#btn-send").val("还剩："+(seconds));--}}
                    {{--}--}}
                {{--}, 1000);--}}


            {{--}--}}
        {{--});--}}

    {{--});--}}

    {{--</script>--}}

@endsection
