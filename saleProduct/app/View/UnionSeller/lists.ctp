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
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->script('grid/query');
	?>
  
   <script type="text/javascript">

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


var accountId = '<?php echo $accountId;?>' ;

	$(function(){
			$(".action").live("click",function(){
				var id = $(this).attr("val") ;
				if( $(this).hasClass("update") ){
					openCenterWindow("/saleProduct/index.php/unionSeller/add/"+accountId+"/"+id,600,400) ;
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
					openCenterWindow("/saleProduct/index.php/unionSeller/add/"+accountId,600,400) ;
				} 
				return false ;
			})

			$(".grid-content").llygrid({
				columns:[
		           	{align:"center",key:"ID",label:"编号", width:"5%",forzen:true},
					{align:"center",key:"ID",label:"Actions", width:"10%",format:function(val,record){
							var html = [] ;
							html.push("<a href='#' class='action update' val='"+val+"'>修改</a>&nbsp;") ;
							//html.push("<a href='#' class='action del' val='"+val+"'>删除</a>") ;
	
							return html.join("") ;
					}},
		           	{align:"center",key:"NAME",label:"卖家名称",width:"20%",forzen:false,align:"left"},
		           	{align:"center",key:"MEMO",label:"备注",width:"20%"},
		           	{align:"center",key:"URL",label:"卖家地址",width:"20%"}
		         ],
		         ds:{type:"url",content:"/saleProduct/index.php/grid/query"},
				 limit:20,
				 pageSizes:[10,20,30,40],
				 height:400,
				 title:"用户列表",
				 indexColumn:false,
				  querys:{sqlId:"sql_union_seller",accountId:accountId},
				 loadMsg:"数据加载中，请稍候......"
			}) ;
   	 });
   </script>
   
   <style>
   		*{
   			font:12px "微软雅黑";
   		}
   </style>

</head>
<body>

	<div class="grid-query-button">
		<button class="action add btn btn-primary">添加联盟卖家</button>
	</div>
	

	<div class="grid-content">
	
	</div>
</body>
</html>
