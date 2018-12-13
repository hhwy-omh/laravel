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
<title>修改分类</title>
</head>
<body>
<div class="type_style">
 <div class="type_title">修改分类</div>
    @foreach($data as $v)
  <div class="type_content">
  <div class="Operate_btn">
  <a href="Category_Manage_in" class="btn  btn-warning"><i class="icon-edit align-top bigger-125"></i>新增分类</a>
  <a href="Category_Manage_delete?id={{$v->id}}" class="btn  btn-danger"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>
  <form action="Category_Manage_update" method="post" class="form form-horizontal" id="form-user-add">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{$v->id}}">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$v->name}}" placeholder="" id="user-name" name="product">
      </div>
    </div>
        <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>排序：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$v->id}}" disabled>
      </div>
    </div>
    <div class="">
     <div class="" style=" text-align:center">
      <input class="btn btn-primary radius" type="submit" id="submit" value="提交">
      </div>
    </div>
  </form>
  </div>
    @endforeach
</div> 
</div>
<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="assets/layer/layer.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#submit").click(function(){
            var str = $("input[name=product]").val();
            if(str!=""){
                $(this).attr('disabled',false);
            }else{
                $(this).attr('disabled',true);
            }
        });
    });

    $("input[name=product]").bind('input propertychange', function() {
        var id = $(this).val();
        if($.trim(id)!="") {
            $("#submit").attr('disabled',false);
        }else{
            $("#submit").attr('disabled',true);
        }
    });

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
</script>
</body>
</html>