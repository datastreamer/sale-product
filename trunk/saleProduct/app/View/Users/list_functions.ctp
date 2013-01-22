<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>llygrid demo</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		echo $this->Html->css('../js/tree/jquery.tree');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('grid/query');
		echo $this->Html->script('tree/jquery.tree');
		
		//test tree
		$Utils  = ClassRegistry::init("Utils") ;
		$result = $Utils->formatTree("sql_security_listAllFUnctions",array()) ;
		//debug($result) ;
	?>
  
   <script type="text/javascript">

	$(function(){
		
		$('#default-tree').tree({//tree为容器ID
				source:'array',
				data:<?php echo $result;?> ,
				isRootExpand:true,
				onNodeClick:function(id, text, record,node){
					$(".grid-content").llygrid("reload",{id:id}) ;
				}
           }) ;
           
			$(".action").live("click",function(){
				var id = $(this).attr("val") ;
				if( $(this).hasClass("update") ){
					openCenterWindow("/saleProduct/index.php/users/editFunction/"+id,600,400) ;
				}else if( $(this).hasClass("del") ){
					if(window.confirm("确认删除吗")){
						$.ajax({
							type:"post",
							url:"/saleProduct/index.php/product/deleteScript/"+id,
							data:{id:id},
							cache:false,
							dataType:"text",
							success:function(result,status,xhr){
								$(".grid-content").llygrid("reload") ;
							}
						}); 
					}
				}else if( $(this).hasClass("add") ){
					openCenterWindow("/saleProduct/index.php/users/editFunction",600,400) ;
				} 
				return false ;
			})

			$(".grid-content").llygrid({
				columns:[
		           	{align:"center",key:"ID",label:"编号", width:"5%",forzen:true},
		           	{align:"center",key:"PARENT_ID",label:"父编号", width:"5%",forzen:true},
					{align:"center",key:"ID",label:"Actions", width:"10%",format:function(val,record){
							var html = [] ;
							html.push("<a href='#' class='action update' val='"+val+"'>修改</a>&nbsp;") ;
							//html.push("<a href='#' class='action del' val='"+val+"'>删除</a>") ;
	
							return html.join("") ;
					}},
		           	{align:"center",key:"NAME",label:"功能名称",width:"20%",forzen:false,align:"left"},
		           	{align:"center",key:"URL",label:"URL地址",width:"20%"},
		           	{align:"center",key:"CODE",label:"功能编码",width:"20%"},
		           		{align:"center",key:"TYPE",label:"类别",width:"6%"}
		         ],
		         ds:{type:"url",content:"/saleProduct/index.php/grid/query"},
				 limit:20,
				 pageSizes:[10,20,30,40],
				 height:400,
				 title:"用户列表",
				 indexColumn:false,
				 querys:{sqlId:"sql_functions_list"},
				 loadMsg:"数据加载中，请稍候......"
			}) ;
   	 });
   	 
   	 window.openCallback = function(){
   	 	$(".grid-content").llygrid("reload",{},true) ;
   	 }
   </script>
   
   <style>
   		*{
   			font:12px "微软雅黑";
   		}
   </style>

</head>
<body>

	<div class="grid-query-button" style="padding:5px;">
		
	</div>
	
	<div class="row-fluid">
		<div class="span2">
			<div id="default-tree" class="tree" style="padding: 5px; "></div>
		</div>
		<div class="span10">
			<button class="action add btn btn-primary">添加功能</button>
			<div class="grid-content"></div>
		</div>
	</div>
	
	
</body>
</html>