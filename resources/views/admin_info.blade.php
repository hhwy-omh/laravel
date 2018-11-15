<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>       
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>  
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>           	
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/messages_zh.js"></script>
        <script type="text/javascript">
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
     </script>
<title>个人信息管理</title>
    <style>
        .error{
            display:block;
            font-size: 16px;
            color:red;
        }
        .submit_s{
            border-radius: 7px;
            border: 1px solid #f1eaea;
            color: #fff;
            margin-top: 10px;
            height: 34px;
            width: 100px;
            background-color: #228f98;
        }
    </style>
</head>

<body>
<div class="clearfix">
 <div class="admin_info_style">
   <div class="admin_modify_style" id="Personal">
     <div class="type_title">管理员信息 </div>
           <form action="admin_info_post" method="post" id="Filemole" enctype="multipart/form-data">
               <fieldset>
               {{ csrf_field() }}
               @foreach($user as $v)
      <div class="xinxi">
        <div class="form-group">
            <label class="col-sm-3 no-padding-right" for="form-field-1" style="padding-top:40px;">头像： </label>
            <label for="pic"><img src="{{session('user_image')}}" alt="" style="height: 100px;width: 100px;margin-left: 10px;"></label>
            <span id="imgages" style="display:none">点击头像即可更换新头像</span>
            <input type="file" name="file" id="pic" onchange="showpic()" style="display: none;" disabled="disabled">
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名： </label>
          <div class="col-sm-9">
              <input type="text" name="user" id="user" value="{{$v->user}}" class="col-xs-7 text_info" disabled="disabled" style="margin-right:100px;">
          </div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">移动电话： </label>
          <div class="col-sm-9"><input type="text" name="mobile" id="mobile" value="{{$v->mobile}}" class="col-xs-7 text_info" disabled="disabled" style="margin-right:100px;"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">电子邮箱： </label>
          <div class="col-sm-9"><input type="text" name="email" id="email" value="{{$v->email}}" class="col-xs-7 text_info" disabled="disabled" style="margin-right:100px;"></div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限： </label>
          <div class="col-sm-9" > <span>{{$v->admin}}</span></div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">注册时间： </label>
          <div class="col-sm-9" > <span>{{$v->created_at}}</span></div>
          </div>
           <div class="Button_operation clearfix"> 
				<button onclick="modify();" class="btn btn-danger radius" id="sut" type="button">修改</button>
				<button onclick="save_info();" class="btn btn-success radius" id="but" type="submit">保存</button>
               <a href="javascript:ovid()" onclick="change_Password()" class="btn btn-warning btn-xs" style="font-size: 14px;width: 66px;height: 36px;padding: 5px 0px;">修改密码</a>
			</div>
            </div>
               @endforeach
               </fieldset>
           </form>
    </div>
    <div class="recording_style">
    <div class="type_title">管理员登陆记录 </div>
    <div class="recording_list">
     <table class="table table-border table-bordered table-bg table-hover table-sort" id="sample-table">
    <thead>
      <tr class="text-c">
        <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th width="80">ID</th>
        <th width="100">类型</th>
        <th width="17%">登陆地点</th>
        <th width="10%">用户名</th>
        <th width="120">客户端IP</th>
        <th width="150">时间</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $z)
      <tr>
        <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>{{$z->id}}</td>
          <td>{{$z->id_root}}</td>
          <td>{{$z->address}}</td>
          <td>{{$z->user}}</td>
          <td>{{$z->ip}}</td>
          <td>{{$z->ip_time}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
    </div>
    </div>
 </div>
</div>
 <!--修改密码样式-->
<form class="cmxform" id="signupForm" method="post" action="admin_info_up">
    <fieldset>
    {{ csrf_field() }}
        {{session('error_se')}}
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
             <li><label class="label_name" for="password_s">原密码:&nbsp;&nbsp;</label><input id="password_s" name="password_s" type="password"></li>
             <li><label class="label_name" for="password">密码:&nbsp;&nbsp;</label><input id="password" name="password" type="password"></li>
             <li><label class="label_name" for="confirm_password">确认密码:&nbsp;&nbsp;</label><input id="confirm_password" name="confirm_password" type="password"></li>
            </ul>
            <div class="center"> <button id="submit" type="submit" class="submit_s">确认更改</button></div>
         </div>
    </fieldset>
</form>
</body>
</html>
<script>
    $("#sut").click(function(){
        $("#imgages").fadeIn();
        $("#imgages").fadeOut(5000);
    });
    $().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
        $("#Filemole").validate({
            rules: {
                user: {
                    required: true,
                    minlength: 4,
                    maxlength:10
                },
                mobile: {
                    required: true,
                    minlength: 11,
                    maxlength:11
                },
                email: {
                    required: true,
                    email:true
                }
            },
            messages: {
                password_s: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 4 个字母",
                    maxlength: "密码长度不能大于 10 个字母"
                },
                password: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 11 个字母",
                    maxlength: "密码长度不能大于 11 个字母"
                },
                confirm_password: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 5 个字母",
                    equalTo: "两次密码输入不一致"
                }
            }
        })
    });   $().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
        $("#signupForm").validate({
            rules: {
                password_s: {
                    required: true,
                    minlength: 5,
                    maxlength:12
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength:12
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                password_s: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 6 个字母",
                    maxlength: "密码长度不能大于 12 个字母"
                },
                password: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 6 个字母",
                    maxlength: "密码长度不能大于 12 个字母"
                },
                confirm_password: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 5 个字母",
                    equalTo: "两次密码输入不一致"
                }
            }
        })
    });


function modify(){
    $('#pic').attr("disabled",false);
	 $('.text_info').attr("disabled", false);
	 $('.text_info').addClass("add");
	  $('#Personal').find('.xinxi').addClass("hover");
	  $('#Personal').find('.btn-success').css({'display':'block'});
	};
function save_info(){
	    var num=0;
		 var str="";
     $(".xinxi input[type$='text']").each(function(n){
          if($(this).val()>3)
          {
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}
          else{
			  $('#Personal').find('.xinxi').removeClass("hover");
			  $('#Personal').find('.text_info').removeClass("add").attr("disabled", false);
			  $('#Personal').find('.btn-success').css({'display':'none'});
			   layer.close(index);
			
		  }		  		
	};	
 //初始化宽度、高度    
    $(".admin_modify_style").height($(window).height()); 
	$(".recording_style").width($(window).width()-400); 
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".admin_modify_style").height($(window).height()); 
	$(".recording_style").width($(window).width()-400); 
  });
  //修改密码
  function change_Password(){
	   layer.open({
    type: 1,
	title:'修改密码',
	area: ['300px','300px'],
	shadeClose: true,
	content: $('#change_Pass'),
	yes:function(index, layero){
		   if ($("#password").val()!=""){
           }else{
               layer.alert('原密码不能为空!',{
                   title: '提示框',
                   icon:0,
               });
           }
		  if ($("#Nes_pas").val()==""){
			  layer.alert('新密码不能为空!',{
              title: '提示框',
				icon:0,

			 });
			return false;
          }

		  if ($("#c_mew_pas").val()==""){
			  layer.alert('确认新密码不能为空!',{
              title: '提示框',
				icon:0,

			 });
			return false;
          }
		    if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',
				icon:0,

			 });
			 return false;
        }
		 else{
			  layer.alert('修改成功！',{
               title: '提示框',
			icon:1,
			  });
			  layer.close(index);
		  }
	}
    });
	  }
</script>
<script>
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
});</script>
