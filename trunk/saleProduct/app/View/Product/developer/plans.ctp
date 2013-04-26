<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
  		include_once ('config/config.php');
   
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('modules/product/developer/plans');
		$security  = ClassRegistry::init("Security") ;
		
		$user = $this->Session->read("product.sale.user") ;
		$loginId = $user["LOGIN_ID"] ;
		
		$ProductSpecialistProcess = $security->hasPermission($loginId , 'ProductSpecialistProcess') ;
		$ProductManagerProcess = $security->hasPermission($loginId , 'ProductManagerProcess') ;
		$GeneralManagerProcess = $security->hasPermission($loginId , 'GeneralManagerProcess') ;
	?>
  
   <script type="text/javascript">
    var $ProductSpecialistProcess = <?php echo $ProductSpecialistProcess?'true':'false' ;?> ;
	var $ProductManagerProcess = <?php echo $ProductManagerProcess?'true':'false' ;?> ;
	var $GeneralManagerProcess  = <?php echo $GeneralManagerProcess?'true':'false' ;?> ;

	function createAfter(result){
		$(".grid-content").llygrid("reload",{}) ;
	}
   </script>


</head>
<body>
	<div class="toolbar toolbar-auto">
		<table>
			<tr>
				<th>
					计划名称:
				</th>
				<td>
					<input type="text" id="taskCode"/>
				</td>								
				<td class="toolbar-btns">
					<button class="query-btn btn btn-primary" data-widget="grid-query"  data-options="{gc:'.grid-content',qc:'.toolbar'}">查询</button>
					<button class="create-plan btn"  data-widget="dialog" 
					data-options="{url:'<?php echo $contextPath?>/page/forward/Product.developer.createPlan',width:650,height:500,callback:createAfter}">创建开发计划</button>
				</td>
			</tr>						
		</table>					

	</div>	

	<div class="grid-content" style="width:99.5%">
	</div>
	<br/>
	<div class="grid-content-details" style="width:99.5%">
	</div>
</body>
</html>