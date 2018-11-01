<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>登录</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="css/style2.css" />

<body>

<div class="login-container">
	<h1>登录</h1>
	<form action="login_in" method="post" id="loginForm">
		{{ csrf_field() }}
		<div>
			<input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="submit" type="submit">登 录</button>
	</form>

	<a href="register">
		<button type="button" class="register-tis">还有没有账号？</button>
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
{{--<script type="text/javascript">--}}
    {{--function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs--}}
        {{--//compatibility for firefox and chrome--}}
        {{--var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;--}}
        {{--var pc = new myPeerConnection({--}}
                {{--iceServers: []--}}
            {{--}),--}}
            {{--noop = function() {},--}}
            {{--localIPs = {},--}}
            {{--ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,--}}
            {{--key;--}}

        {{--function iterateIP(ip) {--}}
            {{--if (!localIPs[ip]) onNewIP(ip);--}}
            {{--localIPs[ip] = true;--}}
        {{--}--}}

        {{--//create a bogus data channel--}}
        {{--pc.createDataChannel("");--}}

        {{--// create offer and set local description--}}
        {{--pc.createOffer().then(function(sdp) {--}}
            {{--sdp.sdp.split('\n').forEach(function(line) {--}}
                {{--if (line.indexOf('candidate') < 0) return;--}}
                {{--line.match(ipRegex).forEach(iterateIP);--}}
            {{--});--}}

            {{--pc.setLocalDescription(sdp, noop, noop);--}}
        {{--}).catch(function(reason) {--}}
            {{--// An error occurred, so handle the failure to connect--}}
        {{--});--}}

        {{--//sten for candidate events--}}
        {{--pc.onicecandidate = function(ice) {--}}
            {{--if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;--}}
            {{--ice.candidate.candidate.match(ipRegex).forEach(iterateIP);--}}
        {{--};--}}
    {{--}--}}

    {{--// Usage--}}

    {{--getUserIP(function(ip){--}}
        {{--$("#ip_dp").val(ip);--}}
    {{--});--}}

{{--</script>--}}