@extends('layouts.main')

@section('title','设置头像')

@section('content')

    <div class="container">
		<h1>设置头像</h1>
		<img src="images/face.jpg" alt="">
		<form action="">
			<div class="form-div">
				<input type="file" name="face">
			</div>
			<div class="form-div">
				<input type="submit" value="确认">
			</div>
		</form>
	</div>

@endsection
