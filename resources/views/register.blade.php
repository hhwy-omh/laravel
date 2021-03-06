<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>注册</title>
<link rel="stylesheet" href="css/style2.css" />
	<style>
		#username-error{
            position: absolute;
            border-radius: 5px;
            height: 24px;
            font-size: 16px;
            line-height: 1.5;
		}
        #pas1-error{
            position: absolute;
            border-radius: 5px;
            height: 24px;
            font-size: 16px;
            line-height: 1.5;
		}
		#pas2-error{
            position: absolute;
            border-radius: 5px;
            height: 24px;
            font-size: 16px;
            line-height: 1.5;
		}
		#pas3-error{
            position: absolute;
            border-radius: 5px;
            height: 24px;
            font-size: 16px;
            line-height: 1.5;
		}
		#pas4-error{
            position: absolute;
            border-radius: 5px;
            height: 24px;
            font-size: 16px;
            line-height: 1.5;
		}

	</style>
<body>

<div class="register-container">
	<h1>注册</h1>
	<button type="button" class="btn btn-warning" id="button" style="background-color: #bcd9ddc7;position:fixed;width: 200px;height: 200px;z-index: 9999;margin:83px -102px;display: none;">注册成功，去邮箱激活即可登陆！</button>
	<form action="register_get" method="post" id="registerForm">
		{{ csrf_field() }}
		<div>
			<input type="text" name="username" id = "username" class="username" placeholder="您的用户名" autocomplete="off"/>
			<div id="user_err" style="position: absolute;border-radius: 5px;height: 24px;font-size: 16px;line-height: 1.5;background-color: rgba(245, 26, 26, 0.81);display:none;width: 99%;"><span>用户名已注册，请更换！</span></div>
		</div>
		<div>
			<input type="password" id="pas1" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" id="pas2" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="text" id="pas3" name="phone_number" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
		</div>
		<div>
			<input type="email" id="pas4" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
		</div>

		<button id="submit" type="submit" value='disabled'>注 &nbsp;&nbsp;&nbsp;册</button>
	</form>
	<a href="login">
		<button type="button" class="register-tis">已经有账号？</button>
	</a>

</div>


<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>

</body>
</html>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var but5 = $("#username").val();
            var but1 = $("#pas1").val();
            var but2 = $("#pas2").val();
            var but3 = $("#pas3").val();
            var but4 = $("#pas4").val();
            if(but5.length < 4 || but5.length > 10 || but1.length < 6 || but1.length > 12 || but2.length < 6 || but2.length > 12 || but3.length != 11 || but4.length < 7){
			}else{
                $("#button").show().delay(4000).hide(400);
			}
        });
    });

    $('#username').bind('input propertychange', function() {
            var id = $(this).val();
            if(id!="") {
            $.ajax({
                type: "get",
                url: "/register_name?username="+id,
                dataType: "json",
                success: function ($data) {
                     var data = $data;
                    if(data){
                        $("#user_err").show();
                        $("#submit").attr('disabled',true);
					}else{
                        $("#user_err").hide();
                        $("#submit").attr('disabled',false);
					}
                }
            });
        }
    });
</script>