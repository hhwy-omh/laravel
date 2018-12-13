<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="css/sku_style.css" />

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/createSkuTable.js"></script>
    <script type="text/javascript" src="js/customSku.js"></script>
    <script type="text/javascript" src="plugins/layer/layer.js"></script>
    <script type="text/javascript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/PIE_IE678.js"></script>
    <link rel="stylesheet" type="text/css" href="css/globle.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css"/>
    <link href="assets/css/codemirror.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
    <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
    <link href="Widget/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<title>新增图片</title>
    <style>
        .webuploader-pick{
            background: url(images/upload-bj.png) no-repeat 0 0;
        }
        .webuploader-pick-hover:hover{
            background: url(images/upload-bj.png) no-repeat 0 -90px;
        }
        body  {
            scrollbar-face-color:   #ffcc99;
            scrollbar-highthit-color:   #ff0000;
            scrollbar-shadowcolor:   #ffffff;
            scrollbar-3dlight-color:   #000000;
            scrollbar-arrow-color:   #ff0000;
            scrollbar-track-color:   #dee0ed;
            scrollbar-darkshadow-color:   #ffff00;
        }
    </style>
</head>
<body>
<div class="clearfix" id="add_picture">
<div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
  </div>
  </div>
   <div style="width:1360px;height:603px;overflow:auto">
   <div style="margin-left:10px;"><h3>添加商品</h3></div>
	<form action="picture_add_insert" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
        {{ csrf_field() }}
		<div class="clearfix cl">
         <label class="form-label col-2"><span class="c-red">*</span>产品标题：</label>
		 <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="Brand_titles"></div>
		</div>
		<div class=" clearfix cl">
         <label class="form-label col-2">简略标题：</label>
	     <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="Brand_title"></div>
		</div>
        <div style="margin-left:20px;" >
                <ul class="SKU_TYPE">
                    <li is_required='0' propid='3' sku-type-name="例">例：颜色：</li>
                </ul>
                <ul>
                    <li><label><input type="checkbox" disabled="disabled" value="1红色" checked/>红色</label></li>
                    <li><label><input type="checkbox" disabled="disabled" value="1蓝色" checked/>蓝色</label></li>
                    <li><label><input type="checkbox" disabled="disabled" value="1黄色" checked/>黄色</label></li>
                    <li><label><span>(示例不可选，请自行添加)</span></label></li>
                </ul>
                <div class="clear"></div>
                <button type="button" class="cloneSku btn btn-warning" id="cloneSku">添加sku</button>

                <!--sku模板,用于克隆,生成自定义sku-->
                <div id="skuCloneModel" style="display: none;margin-bottom: 10px;" class="intro">
                    <div class="clear"></div>
                    <ul class="SKU_TYPE">
                        <li is_required='0' propid='' sku-type-name="">
                            <a href="javascript:void(0);" class="delCusSkuType">移除</a>
                            <input type="text" name="cusSkuTypeInput[]" class="cusSkuTypeInput"/>：
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox" class="model_sku_val" propvalid='' value="" />
                            <input type="text" class="cusSkuValInput" />
                        </li>
                        <button type="button" class="cloneSkuVal btn btn-warning"  style="margin-left:10px;">添加属性值</button>
                    </ul>
                    <div class="clear"></div>
                </div>
                <!--单个sku值克隆模板-->
                <li style="display: none;margin-left: 5px;" id="onlySkuValCloneModel">
                    <input type="checkbox" class="model_sku_val" propvalid='' value="" />
                    <input type="text" class="cusSkuValInput" />
                    <a href="javascript:void(0);" class="delCusSkuVal">删除</a>
                </li>
                <div class="clear"></div>
                <div id="skuTable"></div>
            <script type="text/javascript" src="js/getSetSkuVals.js"></script>
        </div>
        <div class="clearfix cl">
			<label style="width: 300px;margin: 0 0 10px 33px;"><span style="margin-right:16px;">商品图片: </span></label>
            <div id="attr-container" style="margin-left: 112px;width: 1200px;height: 200px;border:1.5px solid #ccc;">
                <div style="padding: 60px;">
                    <ul class="upload-ul clearfix" style="max-width: 1000px;">
                        <li class="upload-pick">
                            <div class="webuploader-container clearfix" id="goodsUpload"></div>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
		<div class="clearfix cl">
			<div class="Button_operation">
				<button class="btn btn-primary radius" type="submit"><i class="icon-save "></i>提交</button>
			</div>
		</div>
	</form>
    </div>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="js/webuploader.min.js"></script>
<script src="js/diyUpload.js"></script>
<script src="assets/js/typeahead-bs2.min.js"></script>
<script src="assets/layer/layer.js" type="text/javascript" ></script>
<script src="assets/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="Widget/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="Widget/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script src="js/lrtk.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script>
    $(document).ready(function(){
        $("#cloneSku").click(function(){
            var id=$(".intro").length*1;
            if(id>2){
                $(this).hide();
            }
        });
    });

    $(function(){
        //上传图片
        var $tgaUpload = $('#goodsUpload').diyUpload({
            url:'uploadFilePath',
            success:function( data ) { },
            error:function( err ) { },
            buttonText : '',
            accept: {
                title: "Images",
                extensions: 'gif,jpg,jpeg,bmp,png'
            },
            thumb:{
                width:120,
                height:90,
                quality:100,
                allowMagnify:true,
                crop:true,
                type:"image/jpeg"
            }
        });
    });

    // // 删除父元素
    // function del_attr(Obj){
    //     Obj.parentNode.parentNode.removeChild(Obj.parentNode);
    // }
    //
    // var attrStr = `<div>
    //                 <hr>
    //                 <span class="label">属性名称:</span>
    //                 <input type='text' size="20" name='attr_name[]'>
    //                 <font color="red">*</font><span style="margin:0 10px;">|</span>
    //                 <span class="label">属性值:</span>
    //                 <input type='text' size="20" name='attr_value[]'>
    //                 <font color="red">*</font>
    //                 <button onclick="del_attr(this)" class="btn btn-danger" type="button">删除</button>
    //             </div>`;
    $("#btn-attr").click(function(){
        $("#attr-container").append(attrStr)
    });
$(function() {
	$("#add_picture").fix({
		float : 'left',
		skin : 'green',
		durationTime :false,
		stylewidth:'220',
		spacingw:0,
		spacingh:260,
	});
});
$( document).ready(function(){
//初始化宽度、高度

   $(".widget-box").height($(window).height());
   $(".page_right_style").height($(window).height());
   $(".page_right_style").width($(window).width()-220);
  //当文档窗口发生改变时 触发
    $(window).resize(function(){

	 $(".widget-box").height($(window).height());
	 $(".page_right_style").height($(window).height());
	 $(".page_right_style").width($(window).width()-220);
	});
});
$(function(){
	var ue = UE.getEditor('editor');
});

var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}
$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	//demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	//zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
</script>

</body>
</html>