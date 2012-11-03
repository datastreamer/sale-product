<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>订单列表</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

	<script type="text/javascript">
     var accountId = "<?php echo $accountId;?>" ;
     var status = "<?php echo $status;?>"
    </script>
   <?php
			echo $this->Html->meta('icon');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		echo $this->Html->css('default/style');
		echo $this->Html->css('../js/tab/jquery.ui.tabs');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('grid/query');
		echo $this->Html->script('modules/order/done_lists');
		echo $this->Html->script('calendar/WdatePicker');
		echo $this->Html->script('tab/jquery.ui.tabs');
		
	?>
</head>
<!--
风险客户<input type="radio" name="status" value="2">
										待退单<input type="radio" name="status" value="3">
										外购订单<input type="radio" name="status" value="4">
										合格订单<input type="radio" name="status" value="5">
										加急单<input type="radio" name="status" value="6">
										特殊单
-->
<body>
	<div class="toolbar toolbar-auto">
		
		<table style="width:100%;" class="query-table">	
			<tr>
				<th>订单号：</th>
				<td>
					<input type="text" name="orderId"/>
				</td>
				<th>人名：</th>
				<td>
					<input type="text" name="userName"/>
				</td>
				<th>邮件：</th>
				<td>
					<input type="text" name="email"/>
				</td>
			</tr>
			<tr>
				<th>日期：</th>
				<td>
					<input type="text" name="dateTime" data-widget="calendar"/>
				</td>
				<th>SKU：</th>
				<td>
					<input type="text" name="sku"/>
				</td>
				<th></th>
				<td>
					<button class="btn btn-primary query" >查询</button>
				</td>
			</tr>						
		</table>	
		<hr style="margin:2px;"/>
		<table style="width:100%;">
			<tr><th style="width:100px">操作：</th>
				<td>
				</td>
			</tr>	
			<tr>
				<th>备注：</th>
				<td>
					<textarea id="memo" style="width:100%;height:50px;"></textarea>
				</td>
			</tr>					
		</table>	
	</div>	
	
	<div id="details_tab">
	</div>
	<div class="grid-content" id="tab-content">
	
	</div>
</body>
</html>
