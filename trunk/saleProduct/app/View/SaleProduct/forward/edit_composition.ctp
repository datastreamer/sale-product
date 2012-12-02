<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>组合产品编辑</title>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>
    <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/validator/jquery.validation');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('validator/jquery.validation');
	?>
  
   <style>
   		*{
   			font:12px "微软雅黑";
   		}

		.rule-content-item{
			clear:both;
		}

		.item-label,.item-relation,.item-value,.item-value{
			float:left;
		}
   </style>

   <script>
		$(function(){
			
			$(".select-p").click(function(){
				openCenterWindow("/saleProduct/index.php/saleProduct/forward/select/<?php echo $id;?>",750,500) ;
			});
			
			$(".save-btn").click(function(){
				if( !$.validation.validate('#personForm').errorInfo ) {
					var json = $("#personForm").toJson() ;
					json.sqlId = "sql_saleproduct_composition_save" ;
					$.ajax({
						type:"post",
						url:"/saleProduct/index.php/form/ajaxSave",
						data:json,
						cache:false,
						dataType:"text",
						success:function(result,status,xhr){
							window.opener.location.reload() ;
							window.close() ;
						}
					}); 
				};
			}) ;
		}) ;
		
		
   	 function setSelectedValue(record){
   	 	$("#refSku").val(record.REAL_SKU) ;
   	 	$("#refId").val(record.ID) ;
   	 	$("#name").val(record.NAME) ;
   	 }
   </script>

</head>

<body class="container-popup">
	<!-- apply 主场景 -->
	<div class="apply-page">
		<!-- 页面标题 -->
		<div class="page-title">
			<h2>组合产品编辑</h2>
		</div>
		<div class="container-fluid">

	        <form id="personForm" action="#" data-widget="validator" class="form-horizontal" >
	        	<input type="hidden" id="comId" value="<?php echo $id;?>"/>
	        	<input type="hidden" id="comSku" value="<?php echo $item['REAL_SKU'];?>"/>
	        	<input type="hidden" id="refSku" value=""/>
	        	<input type="hidden" id="refId" value=""/>
				<!-- panel 头部内容  此场景下是隐藏的-->
				<div class="panel apply-panel">
					<!-- panel 中间内容-->
					<div class="panel-content">
						<!-- 数据列表样式 -->
						<table class="form-table col2" >
							<caption>基本信息</caption>
							<tbody>
								<tr>
									<th>货品：</th><td><input type="text" data-validator="required" id="name" readonly/>
										<button class="btn select-p">选择</button>
									</td>
								</tr>
								<tr>
									<th>数量：</th><td><input type="text" id="quantity" value="" data-validator="required"/></td>
								</tr>
								<tr>
									<th>备注：</th><td>
										<textarea id="memo" style="width:90%"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<!-- panel脚部内容-->
                    <div class="panel-foot">
						<div class="form-actions col2">
							<button type="button" class="btn btn-primary save-btn">提&nbsp;交</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>