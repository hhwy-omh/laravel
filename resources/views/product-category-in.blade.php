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
<title>添加产品分类</title>
    <style>
        .blue{
            background-color: #e5e65996;
            border: 1px solid #af9f7654;
        }
    </style>
</head>
<body>
<div class="type_style">
 <div class="type_title"><a href="Category_Manage_in">新增分类</a></div>
  <div class="type_content">
  <div class="Operate_btn">
          <table class="search-tab">
              <tr>
                  <td  style="padding:0;width: 85px;">一级分类ID:</td>
                  <td>
                      <select name="cat1_id" style="width: 85px;" class="blue">
                            @foreach($data as $v)
                          <option value="{{$v->id}}">{{$v->name}}</option>
                          @endforeach
                      </select>
                      <font color="red">*</font>
                  </td>
              </tr>
              <tr>
                  <td  style="padding:0px;">二级分类ID:</td>
                  <td>
                      <select name="cat2_id" style="width: 85px;">
                      </select>
                      <font color="red">*</font>
                  </td>
              </tr>
              <tr>
                  <td  style="padding:0px;">三级分类ID:</td>
                  <td>
                      <select name="cat3_id" style="width: 85px;">
                      </select>
                      <font color="red">*</font>
                  </td>
              </tr>
          </table>
  </div>
      <form action="Category_Manage_insert" method="post">
          {{ csrf_field() }}
    <div class="Operate_cont clearfix">
        新增分类：
        <select name="one_id">
            <option value='id_1'>一级分类</option>
            <option value='id_2'>二级分类</option>
            <option value='id_3'>三级分类</option>
        </select><br>
        <input type="hidden" name="id" value="0" id="option_id">
        <input type="text" class="input-text" id="user_name" value="默认" style="width: 108px;margin: 4px 6px 0 -53px;" disabled>>
        <input type="hidden" id="user_name2" name="prod" value="">
        <input type="text" class="input-text" value="" placeholder="" name="prod_name" style="width: 83px;margin: -4px;"><br>
        <input class="btn btn-primary radius" type="submit" value="提交" id="submit" style="margin: 10px 0 0 41px;">
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
    $(function () {
        var addr = $("select[name=cat1_id]").val();
        if(addr!=""){
            $("select[name=cat1_id]").change();
        }
    })
$(document).ready(function(){
    $("#submit").click(function(){
        var str = $("input[name=prod_name]").val();
        if(str!=""){
            $(this).attr('disabled',false);
        }else{
            $(this).attr('disabled',true);
        }
    });
});
$("input[name=prod_name]").bind('input propertychange', function() {
    var id = $(this).val();
    if($.trim(id)!="") {
           $("#submit").attr('disabled',false);
        }else{
           $("#submit").attr('disabled',true);
        }
});

    $("select[name=one_id]").change(function(){
        var id = $(this).val();
        if(id == "id_1"){
            $("#user_name").val("默认");
            $("#user_name2").val("默认");
            $("#option_id").val("0");
            $("select[name=cat1_id]").addClass("blue");
            $("select[name=cat2_id]").removeClass("blue");
            $("select[name=cat3_id]").removeClass("blue");
        }
        if(id == "id_2"){
            var name = $("select[name=cat1_id]  option:selected").text();
            $("#user_name").val('>'+name);
            $("#user_name2").val('>'+name);
            $("#option_id").val($("select[name=cat1_id]").val());
            $("select[name=cat2_id]").addClass("blue");
            $("select[name=cat3_id]").removeClass("blue");
            $("select[name=cat1_id]").removeClass("blue");
        }
        if(id == "id_3"){
            var name = $("select[name=cat1_id]  option:selected").text();
            var name1 = $("select[name=cat2_id]  option:selected").text();
            var name2 = name+'>'+name1;
            $("#user_name").val(name2);
            $("#user_name2").val(name2);
            $("#option_id").val($("select[name=cat2_id]").val());
            $("select[name=cat3_id]").addClass("blue");
            $("select[name=cat1_id]").removeClass("blue");
            $("select[name=cat2_id]").removeClass("blue");
        }
    });

    $("select[name=cat1_id]").change(function(){
        var id = $(this).val();
        if(id!=""){
            $.ajax({
                type:"GET",
                url:"ajax_index_cat?id="+id,
                dataType:"json",
                success:function($data){
                    var data=$data;
                    var str="<potion value=''>选择二级分类</potion>";
                    for(var i=0;i<data.length;i++){
                        str+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $("select[name=cat2_id]").html(str)
                    $("select[name=cat2_id]").trigger('change');
                    var val = $("select[name=one_id]").val();
                        if(val == "id_1"){
                            $("#option_id").val("0");
                            $("#user_name").val("默认");
                            $("#user_name2").val("默认");
                        }
                        if(val == "id_2"){
                            var name = $("select[name=cat1_id]  option:selected").text();
                            $("#user_name").val('>'+name);
                            $("#user_name2").val('>'+name);
                            $("#option_id").val($("select[name=cat1_id]").val());
                        }
                        if(val == "id_3"){
                            var name = $("select[name=cat1_id]  option:selected").text();
                            var name1 = $("select[name=cat2_id]  option:selected").text();
                            var name2 = name+'>'+name1;
                            $("#user_name").val(name2);
                            $("#user_name2").val(name2);
                            $("#option_id").val($("select[name=cat2_id]").val());
                        }
                }
            });
        }
    });
    $("select[name=cat2_id]").change(function(){
        var id = $(this).val();
        if(id!=""){
            $.ajax({
                type:"GET",
                url:"/ajax_index_cat?id="+id,
                dataType:"json",
                success:function($data){
                    var data=$data;
                    var str="<potion value=''>选择三级分类</potion>";
                    for(var i=0;i<data.length;i++){
                        str+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $("select[name=cat3_id]").html(str)
                    $("select[name=cat3_id]").trigger('change');
                    var val = $("select[name=one_id]").val();
                    if(val == "id_1"){
                        $("#option_id").val("0");
                        $("#user_name").val("默认");
                        $("#user_name2").val("默认");
                    }
                    if(val == "id_2"){
                        var name = $("select[name=cat1_id]  option:selected").text();
                        $("#user_name").val('>'+name);
                        $("#user_name2").val('>'+name);
                        $("#option_id").val($("select[name=cat1_id]").val());
                    }
                    if(val == "id_3"){
                        var name = $("select[name=cat1_id]  option:selected").text();
                        var name1 = $("select[name=cat2_id]  option:selected").text();
                        var name2 = name+'>'+name1;
                        $("#user_name").val(name2);
                        $("#user_name2").val(name2);
                        $("#option_id").val($("select[name=cat2_id]").val());
                    }
                }
            });
        }
    });
    $("select[name=cat1_id]").change(function(){
        var id = $(this).val();
        if(id==""){
            var str="";
            $("select[name=cat2_id]").html(str)
            $("select[name=cat3_id]").html(str)
        }
    });
</script>
</body>
</html>