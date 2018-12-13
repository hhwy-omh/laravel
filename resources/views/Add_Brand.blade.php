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
            // console.log(pic);
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
        .ble{
            border:1px solid red;
        }
    </style>
</head>

<body>
<div class="clearfix">
    <div class="admin_info_style">
        <div class="admin_modify_style" style="border-left: 1px solid #ccc;margin-left: 529px;height: 602px;">
            <div class="type_title">增加品牌 </div>
            <form action="Add_Brand_insert" method="post" id="Filemole" enctype="multipart/form-data">
                <fieldset>
                    {{ csrf_field() }}
                        <div class="xinxi">
                            <div class="form-group">
                                <label class="col-sm-3 no-padding-right" for="form-field-1" style="padding-top:40px;">品牌LOGO： </label>
                                <label for="pic"><img src="upload/timg.gif" alt="" style="height: 75px;width: 100px;margin-left: 10px;" id="imgs"></label>
                                <label for="pic"><span style="display:none;color:red;" id="spans">请选择图片</span></label>
                                <input type="file" name="file" id="pic" onchange="showpic()" style="display: none;">
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">品牌名称： </label>
                                <div class="col-sm-9">
                                    <input type="text" name="user" value="" style="margin-right:100px;">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属地区： </label>
                                <div class="col-sm-9"><input type="text" name="mobile" id="mobile" value="" style="margin-right:100px;"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">品牌描述： </label><br>
                                <div class="col-sm-9"><textarea name="area" style="width:300px;height:150px"></textarea></div>
                            </div>
                                <button class="btn btn-danger radius" id="sut" type="submit">添加</button>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $('#pic').bind('change', function() {
        var str = $(this).val();
        if(str!=""){
            $("#sut").attr('disabled',false);
            $("#imgs").removeClass("ble");
            $("#spans").hide();
        }else{
            $("#sut").attr('disabled',true);
            $("#imgs").addClass("ble");
            $("#spans").show();
        }
    });
    $(document).ready(function(){
        $("#sut").click(function(){
            var str = $("#pic").val();
            if(str!=""){
                $(this).attr('disabled',false);
                $("#imgs").removeClass("ble");
                $("#spans").hide();
            }else{
                $(this).attr('disabled',true);
                $("#imgs").addClass("ble");
                $("#spans").show();
            }
        });
    });
    $().ready(function() {
        $("#Filemole").validate({
            rules: {
                user: {
                    required: true
                },
                mobile: {
                    required: true
                },
                area: {
                    required: true
                }
            }
        })
    });

    $(".admin_modify_style").height($(window).height());
    $(".recording_style").width($(window).width()-400);
    //当文档窗口发生改变时 触发
    $(window).resize(function(){
        $(".admin_modify_style").height($(window).height());
        $(".recording_style").width($(window).width()-400);
    });
</script>
