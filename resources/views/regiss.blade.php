<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<a class="active" href="用户注册.html">注册</a>
			<a href="用户登录.html">登录</a>
			<div class="fr">
				<a href="广场.html">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>用户注册</h1>
		<form action="{{ route('doregist') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-div">头像：<input type="file" name="face"></div>
			<div class="form-div"><input type="text" name="mobile" placeholder="手机号码"> <input id="btn-send" type="button" value="发送验证码"></div>
			<div class="form-div"><input type="text" name="mobile_code" placeholder="输入6位手机验证码"></div>
			<div class="form-div"><input type="password" name="password" placeholder="请输入6到18位密码"></div>
			<div class="form-div"><input type="password" name="password_confirmation" placeholder="再次输入密码"></div>
			<div class="form-div"><input type="checkbox" name="protocol"> 《同意注册协议》</div>
			<div class="form-div"><input type="submit" value="注册"></div>
		</form>
	</div>
</body>
</html>

