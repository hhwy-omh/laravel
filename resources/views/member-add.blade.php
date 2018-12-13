<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
<title>修改品牌</title>
    <style>
        .blue{
            background-color: #e5e65996;
            border: 1px solid #af9f7654;
        }
    </style>
</head>
<body>
<div class="type_style">
  <div class="type_content">
      <form action="Brand_Manage_update" method="post" id="Filemole" enctype="multipart/form-data">
          {{ csrf_field() }}
    <div class="Operate_cont clearfix">
        @foreach($data as $v)
            <div>
                <label class="col-sm-3 no-padding-right" for="form-field-1" style="padding-top:40px;margin-left: -38px;">品牌LOGO： </label>
                <label for="pic"><img src="{{$v->logo}}" alt="" style="height: 75px;width: 100px;margin-left: 10px;" id="imgs"></label>
                <input type="file" name="file" id="pic" onchange="showpic()" style="display: none;">
            </div>
                  <input type="hidden" name="id" value="{{$v->id}}">
        品牌名称：<input type="text" name="username" id="username" value="{{$v->name}}"><br>
        所属地区：<input type="text" name="state" id="state" value="{{$v->state}}"><br>
        描述： <textarea name="title" class="form-control" id="title" style="height: 160px;">{{$v->describe}}</textarea>
        @endforeach
        <input class="btn btn-primary radius" id="sut" type="submit" value="修改" style="margin: 10px 0 0 41px;">
            <label for="pic"><span style="display:none;color:red;" id="spans">内容不能为空</span></label>
    </div>
      </form>
  </div>
</div> 
</div>
<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="assets/layer/layer.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-user-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
    function showpic(){
        var pic =document.getElementById('pic').files[0];
        var size = 1024*1024;
        var sizes = pic.size;
        var images =pic.type;
        console.log(pic);
        if(images == 'image/jpg' || images == 'image/jpeg' || images == 'image/png' || images == 'image/bmp'){
            if(size>sizes){
                var sr  = window.URL.createObjectURL(pic);
                document.getElementsByTagName('img')[0].src=sr;
            }else{
                alert("请上传1M以内的图片")
            }
        }else{
            alert("请上传后缀为：jpg,jpeg,png,bmp格式的图片")
        }
    }

$(document).ready(function(){
    $("#sut").click(function(){
        var str = $("#state").val();
        var str2 = $("#username").val();
        var str3 = $("#title").val();
        if(str!="" && str2!="" && str3!=""){
            $(this).attr('disabled',false);
            $("#spans").hide();
        }else{
            $(this).attr('disabled',true);
            $("#spans").show();
        }
    });
});
$('#username').bind('input propertychange', function() {
    var id = $(this).val().replace(/^\s+|\s+$/g,"");
    if(id!="") {
            $("#sut").attr('disabled',false);
            $("#spans").hide();
        }else{
            $("#sut").attr('disabled',true);
            $("#spans").show();
        }
});
$('#state').bind('input propertychange', function() {
    var id = $(this).val().replace(/^\s+|\s+$/g,"");
    if(id!="") {
        $("#sut").attr('disabled',false);
        $("#spans").hide();
    }else{
        $("#sut").attr('disabled',true);
        $("#spans").show();
    }
});
$('#title').bind('input propertychange', function() {
    var id = $(this).val().replace(/^\s+|\s+$/g,"");
    if(id!="") {
        $("#sut").attr('disabled',false);
        $("#spans").hide();
    }else{
        $("#sut").attr('disabled',true);
        $("#spans").show();
    }
});
</script>
</body>
</html>