<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/sku_style.css" />
<title>动态生成SKU表格</title>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/createSkuTable.js"></script>
<script type="text/javascript" src="js/customSku.js"></script>
<script type="text/javascript" src="plugins/layer/layer.js"></script>

</head>
<body>
<ul class="SKU_TYPE">
	<li is_required='0' propid='3' sku-type-name="例">例：颜色：</li>
</ul>
<ul>
	<li><label><input type="checkbox" disabled="disabled" class="sku_value" propvalid='31' value="1红色" />例：红色</label></li>
	<li><label><input type="checkbox" disabled="disabled" class="sku_value" propvalid='32' value="1蓝色" />例：蓝色</label></li>
	<li><label><input type="checkbox" disabled="disabled" class="sku_value" propvalid='33' value="1黄色" />例：黄色</label></li>
	<li><label><span>(示例不可选，请自行添加)</span></li>
</ul>
<div class="clear"></div>
<button type="button" class="cloneSku" id="cloneSku">添加自定义sku属性</button>

<!--sku模板,用于克隆,生成自定义sku-->
<div id="skuCloneModel" style="display: none;" class="intro">
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
		<button type="button" class="cloneSkuVal">添加自定义属性值</button>
	</ul>
	<div class="clear"></div>
</div>
<!--单个sku值克隆模板-->
<li style="display: none;" id="onlySkuValCloneModel">
	<input type="checkbox" class="model_sku_val" propvalid='' value="" />
	<input type="text" class="cusSkuValInput" />
	<a href="javascript:void(0);" class="delCusSkuVal">删除</a>
</li>
	<div class="clear"></div>
	<div id="skuTable"></div>
<script type="text/javascript" src="js/getSetSkuVals.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
	$("#cloneSku").click(function(){
    var id=$(".intro").length*1;
    if(id>2){
    	$(this).hide();
    }
});
});
</script>

