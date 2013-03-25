<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>llygrid demo</title>
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
		echo $this->Html->script('grid/query');
		
		$user = $this->Session->read("product.sale.user") ;
		$group=  $user["GROUP_CODE"] ;
	?>
  
   <script type="text/javascript">
   //result.records , result.totalRecord
//result.records , result.totalRecord
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

	$(function(){
		$(".message,.loading").hide() ;
		
			$(".grid-content").llygrid({
				columns:[
					{align:"center",key:"ID",label:"操作",width:"25%",format:function(val,record){
						var status = record.STATUS ;
						var html = [] ;
						html.push("<a href='#' class='edit-account' val='"+val+"'>修改</a>&nbsp;&nbsp;") ;
						return html.join("") ;
					}},
		           	{align:"center",key:"NAME",label:"账户名称",width:"35%",forzen:false,align:"left"},
		           	{align:"center",key:"CODE",label:"账户Code",width:"15%"},
		           	{align:"center",key:"USERNAME",label:"创建人",width:"8%"}
		         ],
		         ds:{type:"url",content:contextPath+"/grid/query"},
				 limit:10,
				 pageSizes:[10,20,30,40],
				 height:200,
				 title:"商家列表",
				 indexColumn:false,
				 querys:{sqlId:"sql_account_list",countSqlId:"sql_account_list_count"},
				 loadMsg:"数据加载中，请稍候......"
			}) ;
			

			$(".register").click(function(){
				openCenterWindow(contextPath+"/amazonaccount/add",650,530) ;
			}) ;
			
			$(".edit-account").live("click",function(){
				var val = $(this).attr("val") ;
				openCenterWindow(contextPath+"/amazonaccount/add/"+val,650,530) ;
			}) ;
		
   	 });


   </script>
   
   <style>
   		*{
   			font:12px "微软雅黑";
   		}
   		
   		.message{
   			width:600px;
   			border:1px solid #CCC;
   			overflow:auto;
   			margin:5px;
   			height:200px;
   			background:#000;
   			color:#FFF;
   			margin-bottom:0px;
   		}
   		
   		.loading{
   			width:600px;
   			background:#000;
   			color:#FFF;
   			margin-top:-1px;
   			display:hidden;
   			margin-left:6px;
   		}
   </style>

</head>
<body>
<?php
	if( $group == 'manage' || $group== 'general_manager'){
		echo '<button class="register">注册Amazon账户</button>' ;
	}
?>
	
	<div class="grid-content">
	
	</div>
	
	<div class="message">
	</div>
	<div class="loading">
		处理中......
	</div>
</body>
</html>