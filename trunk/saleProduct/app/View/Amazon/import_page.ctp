<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php echo $this->Html->charset(); ?>
    <title>产品采集操作</title>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
        include_once ('config/config.php');
        
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		echo $this->Html->css('../js/validator/jquery.validation');
		echo $this->Html->css('../js/tree/jquery.tree');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('grid/query');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('validator/jquery.validation');
		echo $this->Html->script('tree/jquery.tree');
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
		
		input{
			width:300px;
		}
   </style>

   <script>
    function formatGridData(data){
		var records = data.record ;
 		var count   = data.count ;
 		
 		count = count[0][0]["count(*)"] ;
 		
		var array = [] ;
		$(records).each(function(){
			var row = {} ;
			for(var o in this){
				var _ = this[o] ;
				for(var o1 in _){
					row[o1] = _[o1] ;
				}
			}
			array.push(row) ;
		}) ;
	
		var ret = {records: array,totalRecord:count } ;
			
		return ret ;
	   }
   
   		var accountId = '<?php echo $accountId;?>' ;
		$(function(){
			
		}) ;
		
   </script>

</head>
<body>
<form id="personForm" action="#" data-widget="validator,ajaxform">

	<form action="<?php echo $contextPath;?>/task/doUploadAmazonQuantity" method="post" target="form-target" enctype="multipart/form-data">
	<table class="table table-bordered">
		<caption>库存更新</caption>
		<tr>
			
			  	<input name="accountId" value='<?php echo $accountId ;?>' type="hidden"/>
			    <td style="width:150px;">库存文件导入</td>
				<td>
					<input name="quantityFile" type="file"/>
					<input type="submit" class="btn btn-primary" value="导入">
			 	</td>
		</tr>
	</table>
	</form>
	
	<form action="<?php echo $contextPath;?>/task/doUploadAmazonPrice" method="post" target="form-target" enctype="multipart/form-data">
	<table class="table table-bordered">
		<caption>价格更新</caption>
		<tr>
			
			  	<input name="accountId" value='<?php echo $accountId ;?>' type="hidden"/>
			    <td style="width:150px;">价格文件导入</td>
				<td>
					<input name="priceFile" type="file"/>
					<input type="submit" class="btn btn-primary" value="导入">
			 	</td>
		</tr>
	</table>
	 </form>
	 <iframe style="width:0; height:0; border:0;display:none;" name="form-target"></iframe>
	<div class="grid-content" style="width:98%;">
	
	</div>
</form>
</html>