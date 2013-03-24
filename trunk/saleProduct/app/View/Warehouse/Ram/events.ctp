<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RAM选项配置</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
   include_once ('config/config.php');
   
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		echo $this->Html->css('default/style');
		echo $this->Html->css('../js/tab/jquery.ui.tabs');

		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery.ui');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('tab/jquery.ui.tabs');
		echo $this->Html->script('modules/warehouse/ram/events');
	?>
	
  <script>
  </script>
</head>
<body>
<div class="toolbar toolbar-auto">
		<table>
			<tr>
				<th>
					RMA编号:
				</th>
				<td>
					<input type="text" name="rmaId" class="span2"/>
				</td>
				<th>
					Order编号:
				</th>
				<td>
					<input type="text" name="orderId" class="span2"/>
				</td>								
				<td class="toolbar-btns">
					<button class="query-btn btn ">查询</button>
					<button class="add-btn btn btn-primary">添加RAM事件</button>
				</td>
			</tr>						
		</table>
	</div>
	
	<div id="tabs-default" class="view-source">
	</div>
	
	<div class="grid-content" id="tab-container" style="margin-top:5px;"></div>
</body>
</html>
