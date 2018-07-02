@extends('layouts.main')

@section('title','个人空间')

@section('content')

    <div class="container">
		<h1>设置新密码</h1>
		<form action="{{ route('dopass') }}">
			<div class="form-div"><input type="password" name="password" placeholder="密码（不少于6位）"></div>
			<div class="form-div"><input type="password" name="password_confirm" placeholder="再次输入密码"></div>
			<div class="form-div"><input type="submit" value="确认"></div>
		</form>
	</div>








@endsection
