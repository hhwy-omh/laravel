@extends('layouts.main')

@section('title','发表日志')

@section('content')

<div class="container">

    <h1>写日志</h1>

    <form action="{{ route('blog.doadd') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div>
            图片：<input type="file" name="logo">
        </div>

        <div>
            标题：<input type="text" name="title">
        </div>

        <div>
            内容：<textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <div>
            访问权限：
            <input type="radio" name="accessable" value="public" checked> 公开
            <input type="radio" name="accessable" value="protected"> 好友可见
            <input type="radio" name="accessable" value="private"> 私有
        </div>

        <div>
            <input type="submit" value="提交">
        </div>

    </form>
</div>

<link href="/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<script>
UM.getEditor('content', {
	initialFrameWidth:"100%",
	initialFrameHeight:"500"
});
</script>

@endsection
