@extends('layouts.main')
@section('title','登录')
@section('content')

    <div class="container">
		<h1>用户登录</h1>
		<form action="{{ route('dologin') }}" method="POST">
            {{ csrf_field() }}
			<div class="form-div"><input type="text" name="mobile" placeholder="输入手机号码"></div>
			<div class="form-div"><input type="password" name="password" placeholder="输入密码"></div>
			<div class="form-div">
                <img onclick="this.src='{{ route('captcha') }}?'+Math.random();" src="{{ route('captcha') }}">
				<br>
				<input type="text" name="captcha" placeholder="验证码">
			</div>
			<div class="form-div"><input type="submit" value="登录"></div>
        </form>
    </div>
@endsection
