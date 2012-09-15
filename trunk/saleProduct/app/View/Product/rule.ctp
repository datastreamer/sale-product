<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>llygrid demo</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('../grid/redmond/ui');
		echo $this->Html->css('../grid/grid');

		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('../grid/grid');
		echo $this->Html->script('../grid/query');
	?>
  
   <script type="text/javascript">
	var ruleScripts = <?php echo $rule['Product']['SCRIPTS']; ?>

	$(function(){
		var query = new Query(ruleScripts, $(".grid-query")).render() ;
		var querys = {querys:query.fetch()||{},scope:"---"} ;
		$(".grid-query-button .query-action").click(function(){
			querys = query.fetch()||{} ;
			//alert( $.json.encode(querys) );
			$(".grid-content").llygrid("reload",{querys:querys,scope:$(".select-scope-input").val() }) ;
			return false ;
		}) ;
		
		$(".select-scope").click(function(){
			openCenterWindow("/saleProduct/index.php/product/filterScope",800,600) ;
		}) ;
		
		$(".grid-query-button .save-result").click(function(){
			var val = window.prompt("请输入筛选名称（最好有意义名字）");
			if(val && $.trim(val)){
				querys = query.fetch() ;
				//querys.filterName = val ;
				//alert( $.json.encode(querys) );
				//return ;
				var params = {querys:querys,filterName:val,scope:$(".select-scope-input").val()} ;
				//alert( $.json.encode(params) );
				//return ;
				$.ajax({
					type:"post",
					url:"/saleProduct/index.php/grid/saveFilterResult",
					data:params ,
					cache:false,
					dataType:"text",
					success:function(result,status,xhr){
						alert("筛选结果保存成功！");
					}
				}); 
				
			}else{
				//alert("名称不能为空！");
			}
			return false ;
		}) ;
		
		$(".grid-content").llygrid({
			columns:[
	           	{align:"center",key:"ASIN",label:"ASIN", width:"10%",format:function(val,record){
		           		return "<a href='#' class='product-detail' asin='"+val+"'>"+val+"</a>" ;
		           	}},
		        {align:"center",key:"LOCAL_URL",label:"Image",width:"6%",forzen:false,align:"left",format:function(val,record){
		           		if(val){
		           			val = val.replace(/%/g,'%25') ;
		           		}else{
		           			return "" ;
		           		}
		           		return "<img src='/saleProduct/"+val+"' onclick='showImg(this)' style='width:50px;height:50px;'>" ;
		           	}},
	           	{align:"center",key:"TITLE",label:"TITLE",width:"20%",forzen:false,align:"left",format:function(val,record){
		           		return "<a target='_blank' href='http://www.amazon.com/gp/offer-listing/"+record.ASIN+"'>"+val+"</a>" ;
		           	}},
	           	{align:"center",key:"DAY_PAGEVIEWS",label:"每日PV",width:"7%"},
	           	{align:"center",key:"FM_NUM",label:"FM数量",width:"7%"},
	           	{align:"center",key:"NM_NUM",label:"NM数量",width:"7%"},
	           	{align:"center",key:"UM_NUM",label:"UM数量",width:"7%"},
	           	{align:"center",key:"FBA_NUM",label:"FBA数量",width:"7%"},
	           	{align:"center",key:"REVIEWS_NUM",label:"Reviews数量",width:"8%"},
	           	{align:"center",key:"QUALITY_POINTS",label:"质量分",width:"7%"}
	         ],
	         ds:{type:"url",content:"/saleProduct/index.php/grid/rule"},
			 limit:20,
			 pageSizes:[10,20,30,40],
			 height:400,
			 title:"规则列表",
			 indexColumn:true,
			 querys:querys,
			 loadMsg:"数据加载中，请稍候......"
		}) ;
	}) ;
	
	function refreshGrid(){
		$(".grid-query-button .query-action").click() ;
	}
	
	$(".product-detail").live("click",function(){
				var asin = $(this).attr("asin") ;
				openCenterWindow("/saleProduct/index.php/product/details/"+asin,950,650) ;
			})

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
			
   	 });
   </script>
   
   <style>
   		*{
   			font:12px "微软雅黑";
   		}

		.query-item{
			float:left;
		}

		.query-label,.relation-label,.query-content{
			float:left;
		}
		.query-label {
			margin:3px 5px;
		}

		.query-label label{
			font-weight:bolder;
		}

		.relation-label{
			margin:3px 5px;
		}
		.select-scope-input{
			width:300px;
		}
   </style>

</head>
<body>
	<div class="grid-query">
	</div>
	
	<div class="grid-query-button">
		<button class="query-action">查询</button>
		<button class="save-result">保存筛选结果</button>
		&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="select-scope-input" /><button class="select-scope">选择筛选范围</button>
	</div>
	
	<div class="grid-content">
	</div>
</body>
</html>
