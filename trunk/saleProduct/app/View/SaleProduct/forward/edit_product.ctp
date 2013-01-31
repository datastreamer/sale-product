<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php echo $this->Html->charset(); ?>
    <title>货品编辑</title>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/validator/jquery.validation');
		echo $this->Html->css('default/style');
		echo $this->Html->css('../js/listselectdialog/jquery.listselectdialog');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('validator/jquery.validation');
		echo $this->Html->script('listselectdialog/jquery.listselectdialog');
		echo $this->Html->script('modules/saleproduct/edit_product');

		$SqlUtils  = ClassRegistry::init("SqlUtils") ;
		$security  = ClassRegistry::init("Security") ;
		
		$groups = $SqlUtils->exeSql("sql_package_group_list",array() ) ;
		
	?>

</head>

<body class="container-popup">
	<!-- apply 主场景 -->
	<div class="apply-page">
		<!-- 页面标题 -->
		<div class="container-fluid">

	        <form id="personForm" action="/saleProduct/index.php/saleProduct/saveProduct"
	          method="post" target="form-target" data-widget="validator"
	         enctype="multipart/form-data" class="form-horizontal" >
	        	<input type="hidden" id="id" name="id" value="<?php echo $item['ID']?>"/>
				<!-- panel 头部内容  此场景下是隐藏的-->
				<div class="panel apply-panel">
					<!-- panel 中间内容-->
					<div class="panel-content">
						<!-- 数据列表样式 -->
						<table class="form-table" >
							<caption>基本属性</caption>
							<tbody>
								<tr>
									<th>类型：</th>
									<td colspan=3>
										<input type="radio" <?php if($item['TYPE']=='base')echo 'checked';?> 
												<?php if($item['TYPE'])echo 'disabled';?> 
											data-validator="required" name="type" value="base" />基本货品
										<input type="radio" <?php if($item['TYPE']=='package')echo 'checked';?>
										<?php if($item['TYPE'])echo 'disabled';?>  
											data-validator="required" name="type" value="package"/>打包货品
									</td>
								</tr>
								<tr>
									<th>选择产品分类：</th>
									<td colspan=3>
										<input type="hidden"  id="categoryId" name="categoryId" value="<?php echo $item['CATEGORY_ID']?>"/>
										<input type="text" id="categoryName" name="categoryName" value="<?php echo $item['CATEGORY_NAME']?>"/>
										<button class="btn select-category">选择</button>
									</td>
								</tr>
								<tr>
									<th>SKU：</th><td colspan=3><input type="text"
										 	data-validator="required" name="sku" 
										 	value="<?php if(isset($item['REAL_SKU']))echo $item['REAL_SKU']; else echo $realSku;?>"/></td>
								</tr>									   
								<tr>
									<th>名称：</th>
									<td colspan=3><input type="text" data-validator="required" name="name" value="<?php echo $item['NAME']?>"/></td>
								</tr>
								<tr>
									<th>预警库存：</th>
									<td><input type="text" data-validator="required" class="alert-danger"
										name="warningQuantity" value="<?php echo $item['WARNING_QUANTITY']?>"/></td>
									<th>安全库存：</th>
									<td><input type="text" data-validator="required"  class="alert-danger"
										name="securityQuantity" value="<?php echo $item['SECURITY_QUANTITY']?>"/></td>
								</tr>
								<tr>
									<th>产品图片：</th>
									<td colspan=3><input type="file" name="imageUrl"/>
									<?php
									if( $item['IMAGE_URL'] ){
										echo "<img src='/saleProduct/".$item['IMAGE_URL']."' style='width:50px;height:40px;'>" ;
									}?>
									</td>
								</tr>
								<tr>
									<th>备注：</th>
									<td colspan=3>
									<textarea name="memo" style="width:98%;height:50px;"><?php echo $item['MEMO']?></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						
						<table class="form-table" >
							<caption>物流属性</caption>
							<tbody>
								<tr>
									<th>重量：</th>
									<td><input type="text" name="weight" style="width:50px;" value="<?php echo $item['WEIGHT']?>"/>
									<select name="weightUnit" style="width:150px;">
										<option value="lb" <?php if($item['WEIGHT_UNIT']=='lb')echo 'selected';?>  >pound</option>
										<option value="oz" <?php if($item['WEIGHT_UNIT']=='oz')echo 'selected';?> >ounce</option>
									</select>
									</td>
									<th>长X宽X高(cm)：</th>
									<td><input type="text" name="length" style="width:50px;" value="<?php echo $item['LENGTH']?>"/>
									X<input type="text" name="width" style="width:50px;" value="<?php echo $item['WIDTH']?>"/>
									X<input type="text" name="height" style="width:50px;" value="<?php echo $item['HEIGHT']?>"/>
									
									</td>
								</tr>
								<tr>
									<th>默认物流服务：</th>
									<td colspan=3>
										<input type="hidden"  id="postageServiceId" name="postageServiceId" value="<?php echo $item['POSTAGE_SERVICE_ID']?>"/>
										<input type="text" id="postageServiceName" name="postageServiceName" value="<?php echo $item['POSTAGE_SERVICE_NAME']?>"/>
										<button class="btn select-postage">选择</button>
									</td>
								</tr>
								<tr>
									<th>包装类型：</th>
									<td colspan=3>
										<select id="packageGroupId" name="packageGroupId">
											<option value="">--请选择--</option>
											<?php
												$defGroupId = $item['PACKAGE_GROUP_ID'] ;
												
												foreach( $groups as $group ){
													$group = $SqlUtils->formatObject($group) ;
													$val = $group['ID'] ;
													$label = $group['NAME'] ;
													$isSelected = $defGroupId == $val?"selected":"" ;
													echo "<option $isSelected value='$val'>$label</option>" ;
												}
											?>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<!-- panel脚部内容-->
                    <div class="panel-foot">
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">提&nbsp;交</button>
						</div>
					</div>
				</div>
			</form>
			 <iframe style="width:0; height:0; border:0;display:none;" name="form-target"></iframe>
		</div>
	</div>
</body>
</html>