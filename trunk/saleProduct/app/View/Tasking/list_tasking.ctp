<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>营销产品列表</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>
    <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('grid/jquery.llygrid');
		echo $this->Html->css('../js/grid/jquery.llygrid');
		
		$userId  = $_COOKIE["userId"] ; 
		App::import('Model', 'User') ;
		$u = new User() ;
		$user1 = $u->queryUserByUserName($userId) ;
		$user = $user1[0]['sc_user'] ;
		$group=  $user["GROUP_CODE"] ;
	?>
	
    <script type="text/javascript">

   var accountId = '<?php echo $accountId ;?>' ;
   
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
	var currentAccountId = accountId ;
	var currentCategoryId = "" ;
	var currentCategoryText = "" ;
	$(function(){
	       
	       var gridConfig = {
					columns:[
			           	{align:"center",key:"TASK_TYPE",label:"任务类型",width:"8%" },
			           	{align:"center",key:"ASIN",label:"任务标识",width:"5%"},
			           	{align:"center",key:"ACCOUNT_ID",label:"账号ID",width:"5%"},
			           	{align:"center",key:"START_TIME",label:"开始时间",width:"6%"},
			           	{align:"center",key:"MESSAGE",label:'进度',width:"6%"},
			            {align:"center",key:"FORCE_STOP",label:"状态",width:"6%",format:function(val , record){
			            	if(val == 1) return "等待中止..." ;
			            	return "运行中..." ;
			            }},
			            {align:"center",key:"FEED_PRICE",label:'操作',width:"6%",format:function(val , record){
			            	if(record.FORCE_STOP == 1){
			            		return "" ;
			            	}
			            	return "<button taskingId='"+record.ID+"' class='btn btn-mini'>中止</button>" ;
			            }}
			         ],
			         ds:{type:"url",content:"/saleProduct/index.php/tasking/taskingGrid/"+accountId},
					 limit:15,
					 pageSizes:[15,20,30,40],
					 height:420,
					 title:"",
					 autoWidth:true,
					 indexColumn:false,
					 querys:{accountId:accountId},
					 loadMsg:"数据加载中，请稍候......",
					 loadAfter:function(){
						$(".country-area-flag").parents("tr").css("background","#EEE") ;
					 }
				} ;
	     
			$(".grid-content").llygrid(gridConfig) ;
			
			$("[taskingId]").live('click',function(){
	 			$taskId = $(this).attr("taskingId") ;
	 			$.ajax({
					type:"post",
					url:"/saleProduct/index.php/tasking/stop/"+ $taskId,
					data:{},
					cache:false,
					dataType:"text",
					success:function(result,status,xhr){
						window.location.reload() ;
					}
				}); 
	 		}) ;	
			
   	 });
   </script>

</head>
<body style="magin:5px;padding:10px;">

			<div class="grid-content" style="width:99%;">
			</div>
	
</body>
</html>
