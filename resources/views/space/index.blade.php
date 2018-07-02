@extends('layouts.main')

@section('title','个人空间')

@section('content')

    <div class="container clearfix">
		<div class="left">
			<div class="art-list">
				<h2>好友动态</h2>
				<ul class="friends-act">

					<li><a href="" class="people">123456</a> 在 <strong>[2017-10-10 10:10]</strong> 发表了: <a href="">《发表日志》</a></li>
					<li><a href="" class="people">123456</a> 在 <strong>[2017-10-10 10:10]</strong> 发表了: <a href="">《发表日志》</a></li>
				</ul>
				<ul class="page clearfix">
					<li><a href="">1</a></li>
					<li>...</li>
					<li><a href="">8</a></li>
					<li><a href="">9</a></li>
					<li class="active">10</li>
					<li><a href="">11</a></li>
					<li><a href="">12</a></li>
					<li>...</li>
					<li><a href="">36</a></li>
				</ul>
			</div>
		</div>
		<div class="right">
			<div class="side user-info">
				<img src="/images/face.jpg" alt="">
				<p>12345678</p>
				<p>
					<a href="">加好友</a>
					<a href="">发消息</a>
					<a href="">已关注</a>
					<a href="">取消关注</a>
				</p>
			</div>
			<div class="side">
				<h3>我的好友（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
			<div class="side">
				<h3>我的关注（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
			<div class="side">
				<h3>我的粉丝（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="个人主页.html"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
		</div>
	</div>

@endsection
