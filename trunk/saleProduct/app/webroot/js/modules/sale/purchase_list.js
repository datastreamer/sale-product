 var type = '4' ;//查询已经审批通过

	 function formatMoney(val){
	 	val = $.trim(val+"") ;
	 	val = val.replace("$","") ;
	 	return $.trim(val) ;
	 }

	$(function(){

			$(".grid-content").llygrid({
				columns:[
		           	{align:"center",key:"ID",label:"",width:"5%",format:function(val,record){
						var status = record.STATUS ;
						var html = [] ;
						if( status == 1){
							html.push("<a href='#' class='edit_purchase_plan' val='"+val+"'>修改</a>&nbsp;") ;
							return html.join("") ;
						}
						return "" ;
					},permission:function(){
						return $create_pp ;
					}},
		           	{align:"center",key:"NAME",label:"采购计划名称",width:"15%",forzen:false,align:"left"},
		           	{align:"center",key:"PLAN_TIME",label:"计划采购时间",width:"9%"},
		           	{align:"center",key:"TYPE",label:"采购用途",width:"7%",format:function(val,record){
		           		if(val == 1){
		           			return "产品试销" ;
		           		}else{
		           			return "正式采购" ;
		           		}
		           	}},
		           	{align:"center",key:"STATUS1",label:img1,group:"状态",width:"4%",format:function(val,record){
		           		return "<a href='javascript:void(0)' onClick='StatusClick(this)' class='status-action' planId='"+record.ID+"' status=1>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"STATUS2",label:img2,group:"状态",width:"4%",format:function(val,record){
		           		return "<a href='javascript:void(0)' onClick='StatusClick(this)' class='status-action'  planId='"+record.ID+"' status=2>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"STATUS3",label:img3,group:"状态",width:"4%",format:function(val,record){
		           		return "<a href='javascript:void(0)' onClick='StatusClick(this)' class='status-action'  planId='"+record.ID+"' status=3>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"STATUS4",label:img4,group:"状态",width:"4%",format:function(val,record){
		           		return "<a href='javascript:void(0)' onClick='StatusClick(this)' class='status-action'  planId='"+record.ID+"' status=4>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"STATUS5",label:img5,group:"状态",width:"3%",format:function(val,record){
		           		return "<a href='javascript:void(0)' onClick='StatusClick(this)' class='status-action'  planId='"+record.ID+"' status=5>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"EXECUTOR_NAME",label:"执行人",width:"6%"},
		           	{align:"center",key:"USERNAME",label:"创建人",width:"6%"},
		           	{align:"center",key:"CREATE_TIME",label:"创建时间",width:"10%"},
					{align:"center",key:"ID",label:"操作",width:"20%",format:function(val,record){
						var status = record.STATUS ;
						var html = [] ;
						if( status == 1){
							if($add_pp_product)html.push("<a href='#' class='add-outer-product' val='"+val+"'>添加产品</a>&nbsp;") ;
							if($add_pp_audit_product)html.push("<a href='#' class='add-product' val='"+val+"'>添加审批产品</a>&nbsp;") ;
						
							if($export_pp)html.push("<a href='#' class='export-product' val='"+val+"'>导出</a>&nbsp;") ;
							if($print_pp)html.push("<a href='#' class='print-product' val='"+val+"'>打印</a>&nbsp;") ;
							return html.join("") ;
						}
						return "" ;
					}}
		         ],
		         ds:{type:"url",content:"/saleProduct/index.php/grid/query/<?php echo $flag;?>"},
				 limit:5,
				 pageSizes:[5,10,20,30,40],
				 height:130,
				 title:"筛选列表",
				 indexColumn:false,
				 querys:{loginId:loginId,sqlId:"sql_purchase_plan_list"},
				 loadMsg:"数据加载中，请稍候......",
				 rowClick:function(rowIndex , rowData){
				 	if(isLinkClick){
				 		isLinkClick = false ;
				 		 return ;
				 	}
				 	
				 	var planId = rowData.ID  ;
				 	$(".grid-content-details").llygrid("reload",{planId:planId,status:""}) ;
				 }
			}) ;
			
			var isLinkClick = false ;
			window.StatusClick = function (el){
			 	isLinkClick = true ;
				var planId = $(el).attr("planId") ;
				var status = $(el).attr("status") ;
				
				var params = {} ;
				params.planId = planId ;
				if(status == 1){
					params.status1 = 1 ;
				}else{
					params.status = status ;
				}
				$(".grid-content-details").llygrid("reload",params) ;
				return false ;
			} ;
			
			$(".print-product").live("click",function(){
				var val = $(this).attr("val") ;
				openCenterWindow("/saleProduct/index.php/sale/purchaseListPrint/"+val,1000,700) ;
			}) ;
			
			
			$(".export-product").live("click",function(){
				var val = $(this).attr("val") ;//采购计划ID
				$("#exportIframe").attr("src","/saleProduct/index.php/sale/exportForPurchasePlanDetails/"+val) ;
			}) ;
			
			
			$(".query-btn").click(function(){
				$(".grid-content").llygrid("reload",{name:$("#name").val(),type:$("#type").val()}) ;
			}) ;
			
			$(".add-outer-product").live("click",function(){
				var val = $(this).attr("val") ;
				openCenterWindow("/saleProduct/index.php/sale/addPurchasePlanOuterProduct/"+val,600,400) ;
			});
			
			
			$(".add-product").live("click",function(){
				var val = $(this).attr("val") ;//采购计划ID
				openCenterWindow("/saleProduct/index.php/sale/selectPurchaseProduct/"+val,1020,600) ;
			}) ;
			
			
			$(".edit_purchase_plan").live("click",function(){
				var val = $(this).attr("val") ;//采购计划ID
				openCenterWindow("/saleProduct/index.php/sale/createPurchasePlan/"+val,600,400) ;
				return false;
			}) ;
			
			$(".create-plan").click(function(){
				openCenterWindow("/saleProduct/index.php/sale/createPurchasePlan/",600,400) ;
			}) ;
			
			$(".grid-content-details").llygrid({
				columns:[
					//{align:"center",key:"ID",label:"编号",width:"4%"},
					{align:"left",key:"ID",label:"操作",forzen:false,width:"9%",format:function(val,record){
						var status = record.STATUS ;
						var html = [] ;
						if($edit_pp_product && (!status ||status < 2) )
							html.push('<a href="#" title="编辑" class="edit-action" val="'+val+'"><img src="/saleProduct/app/webroot/img/edit.png"/></a>&nbsp;') ;
						if($delete_pp_product && (!status ||status < 2))
							html.push('<a href="#" title="删除" class="del-action" asin="'+record.ASIN+'" planId="'+record.PLAN_ID+'"  val="'+val+'"><img src="/saleProduct/app/webroot/img/delete.gif"/></a>&nbsp;') ;
						
						if( $apply_purchase && ( !status || status == 1||status == 4 ) ){
							html.push('|<a href="#" title="申请采购" class="paction" planId="'+record.PLAN_ID+'" status="2" val="'+val+'"><img src="/saleProduct/app/webroot/img/apply.png"/></a>&nbsp;') ;
						}
						
						if( $audit_purchase && status == 2){
							html.push('|<a href="#" title="审批通过" class="paction"  planId="'+record.PLAN_ID+'" status="3" val="'+val+'"><img src="/saleProduct/app/webroot/img/success.gif"/></a>&nbsp;') ;
							html.push('<a href="#" title="审批不通过" class="paction" planId="'+record.PLAN_ID+'" status="4" val="'+val+'"><img src="/saleProduct/app/webroot/img/error.gif"/></a>&nbsp;') ;
						}
						
						if($confirm_purchase && status == 3){
							html.push('|<a href="#" title="已采购" class="paction" planId="'+record.PLAN_ID+'" status="5" val="'+val+'"><img src="/saleProduct/app/webroot/img/pkg.gif"/></a>&nbsp;') ;
						}
						return html.join("") ;
						
					}},
					{align:"left",key:"ID",label:"状态",forzen:false,width:"7%",format:function(val,record){
						var status = record.STATUS ;
						var html = [] ;
						if( !status || status == 1){
							html.push('未处理') ;
						}
						
						if(status == 2){
							html.push('申请采购');
						}
						
						if(status == 3){
							html.push('审批通过') ;
						}
						
						if(status == 4){
							return "未通过审批" ;
						}
						if(status == 5){
							return "已采购" ;
						}
						
						return html.join("") ;
					}},
		           	{align:"center",key:"ASIN",label:"ASIN", width:"8%",format:function(val,record){
		           		return "<a href='#' class='product-detail' asin='"+val+"'>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"LOCAL_URL",label:"Image",width:"6%",forzen:false,align:"left",format:function(val,record){
		           		
		           		if(val){
		           			val = val.replace(/%/g,'%25') ;
		           			return "<img src='/saleProduct/"+val+"' onclick='showImg(this)' style='width:25px;height:25px;'>" ;
		           		}
		           		return "" ;
		           		
		           	}},
		           	{align:"center",key:"TITLE",label:"TITLE",width:"10%",forzen:false,align:"left",format:function(val,record){
		           		return "<a href='http://www.amazon.com/gp/offer-listing/"+record.ASIN+"' target='_blank'>"+val+"</a>" ;
		           	}},
		           	{align:"center",key:"DAY_PAGEVIEWS",label:"每日PV",width:"6%",format:function(val,record){
		           		if(!val)return val ;
		           		return Math.round(val) ;
		           	}},
		           	{align:"center",key:"PLAN_NUM",label:"采购数量",width:"6%"},
		           	{align:"center",key:"QUOTE_PRICE",label:"采购价",width:"6%"},
		           	{align:"center",key:"AREA",label:"采购地区",width:"6%",
		           			format:{type:"json",content:{"china":"大陆","taiwan":"台湾","american":"美国"}}},
		           	
		           	{align:"center",key:"FBM_COST",label:"其他成本",group:"FBM",width:"6%",format:function(val,record){
		           		return "<a href='' class='cost' type='FBM' asin='"+record.ASIN+"'>"+(val||"")+"</a>" ;
		           	},permission:function(){ return $purchase_cost_view; } },
		           	{align:"center",key:"FBM_PRICE",label:"最低价",group:"FBM",width:"6%",permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBM_PRICE",label:"利润额",group:"FBM",width:"6%",format:function(val,record){
		           		var lye = parseFloat(formatMoney(record.FBM_PRICE)) 
		           					- parseFloat(formatMoney(record.QUOTE_PRICE||0)) -   parseFloat(formatMoney(record.FBM_COST||0)) ;
		           		
		           		if( !record.QUOTE_PRICE  || record.QUOTE_PRICE == '0' ){
		           			return "-" ;
		           		}
		           		
		           		if( !record.FBM_PRICE || record.FBM_PRICE == '0'){
		           			return "-" ;
		           		}
		           		
		           		if( !record.FBM_COST || record.FBM_COST == '0'){
		           			return "-" ;
		           		}
		           		
		           		if( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBM_COST||0)) <= 0 ){
		           			return "-" ;
		           		}
		           		lye = lye.toFixed(2) ;
		           		if( lye < 0 ){
		           			return "<font color='red'>"+lye+"</font>"
		           		}else{
		           			return lye ;
		           		}
		           	},permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBM_PRICE",label:"利润率",group:"FBM",width:"6%",format:function(val,record){
		           		var lye = parseFloat(formatMoney(record.FBM_PRICE)) 
		           					- parseFloat(formatMoney(record.QUOTE_PRICE||0)) -   parseFloat(formatMoney(record.FBM_COST||0)) ;
		           		
		           		if( !record.QUOTE_PRICE  || record.QUOTE_PRICE == '0' ){
		           			return "-" ;
		           		}
		           		
		           		if( !record.FBM_PRICE || record.FBM_PRICE == '0'){
		           			return "-" ;
		           		}
		           		
		           		
		           		if( !record.FBM_COST || record.FBM_COST == '0'){
		           			return "-" ;
		           		}
		           		
		           		if( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBM_COST||0)) <= 0 ){
		           			return "-" ;
		           		}
		           		
		           		var lyl = (lye / ( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBM_COST||0)) ))*100 ;
		           		lyl = lyl.toFixed(2) ;
		           		if( lyl < 0 ){
		           			return "<font color='red'>"+lyl+"%</font>"
		           		}else{
		           			return lyl+"%" ;
		           		}
		           	},permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBA_COST",label:"其他成本",group:"FBA",width:"6%",format:function(val,record){
		           		return "<a href='' class='cost' type='FBA' asin='"+record.ASIN+"'>"+(val||"")+"</a>" ;
		           	},permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBA_PRICE",label:"最低价",group:"FBA",width:"6%",permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBA_PRICE",label:"利润额",group:"FBA",width:"6%",format:function(val,record){
		           		var lye = parseFloat(formatMoney(record.FBA_PRICE)) 
		           					- parseFloat(formatMoney(record.QUOTE_PRICE||0)) -   parseFloat(formatMoney(record.FBA_COST||0)) ;
		           		
		           		if( !record.QUOTE_PRICE  || record.QUOTE_PRICE == '0' ){
		           			return "-" ;
		           		}
		           		
		           		if( !record.FBA_PRICE || record.FBA_PRICE == '0'){
		           			return "-" ;
		           		}
		           		
		           		
		           		if( !record.FBA_COST || record.FBA_COST == '0'){
		           			return "-" ;
		           		}
		           		
		           		if( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBA_COST||0)) <= 0 ){
		           			return "-" ;
		           		}
		           		lye = lye.toFixed(2) ;
		           		if( lye < 0 ){
		           			return "<font color='red'>"+lye+"</font>"
		           		}else{
		           			return lye ;
		           		}
		           	},permission:function(){ return $purchase_cost_view; }},
		           	{align:"center",key:"FBA_PRICE",label:"利润率",group:"FBA",width:"6%",format:function(val,record){
		           		var lye = parseFloat(formatMoney(record.FBA_PRICE)) 
		           					- parseFloat(formatMoney(record.QUOTE_PRICE||0)) -   parseFloat(formatMoney(record.FBA_COST||0)) ;
		           		
		           		if( !record.QUOTE_PRICE  || record.QUOTE_PRICE == '0' ){ return "-" ; } 
		           		if( !record.FBA_PRICE || record.FBA_PRICE == '0'){ return "-" ; } 
		           		if( !record.FBA_COST || record.FBA_COST == '0'){ return "-" ; }
		           		
		           		
		           		if( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBA_COST||0)) <= 0 ){
		           			return "-" ;
		           		}
		           		
		           		var lyl = (lye / ( parseFloat(formatMoney(record.QUOTE_PRICE||0)) +  parseFloat(formatMoney(record.FBA_COST||0)) ))*100 ;
		           		lyl = lyl.toFixed(2) ;
		           		if( lyl < 0 ){
		           			return "<font color='red'>"+lyl+"%</font>"
		           		}else{
		           			return lyl+"%" ;
		           		}
		           	},permission:function(){ return $purchase_cost_view; }},
		           	
		           	{align:"center",key:"PROVIDOR_NAME",label:"供应商信息",width:"8%",format:function(val,record){
		           		if(!val) return "";
		           		return "<a href='#' supplier-id='"+record.PROVIDOR+"'>"+val+"</a>" ;
		           	}} ,
		           	{align:"center",key:"XJ",label:"询价状态",width:"8%",format:function(val,record){
		           		if(val >0 )return "Y" ;
		           		return "N" ;
		           	}} ,
		           	{align:"center",key:"SAMPLE",label:"样品",format:{type:"json",content:{'0':'无','1':'准备中','2':'有'}},width:"6%"},
		            {align:"center",key:"SAMPLE_CODE",label:"样品编码",width:"8%"}
		           	
		         ],
		         ds:{type:"url",content:"/saleProduct/index.php/grid/query"},
				 limit:30,
				 pageSizes:[10,20,30,40],
				 height:function(){
				 	return $(window).height() - 370 ;
				 },
				 title:"",
				 indexColumn:false,
				 querys:{planId:'-----',status:"",sqlId:"sql_purchase_plan_details_list"},
				 loadMsg:"数据加载中，请稍候......",
				 loadAfter:function(){
				 	$(".grid-checkbox").each(function(){
						var val = $(this).attr("value") ;
						if( $(".product-list ul li[asin='"+val+"']").length ){
							$(this).attr("checked",true) ;
						}
					}) ;
				 }
			}) ;
			
			$(".cost").live("click",function(){
				var asin = $(this).attr("asin") ;
				var type = $(this).attr("type") ;
				openCenterWindow("/saleProduct/index.php/cost/view/"+asin+"/"+type,600,600) ;
				return false ;
			}) ;
			
			$(".edit-action").live("click",function(){
				var val = $(this).attr("val") ;//采购计划ID
				openCenterWindow("/saleProduct/index.php/sale/editPurchasePlanProduct/"+val,750,580) ;
			}) ;
			
			$(".paction").live("click",function(){
				
				var val = $(this).attr("val") ;//采购计划ID
				var status =  $(this).attr("status") ;
				var planId =  $(this).attr("planId") ;
				
				var opName = status == '2'?"申请采购":(status=='3'?"审批通过":(status=="4"?"审批不通过":"确认采购"))
				
				if(window.confirm("确认执行该操作【"+opName+"】吗？")){
					$.ajax({
						type:"post",
						url:"/saleProduct/index.php/sale/updatePurchasePlanProductStatus",
						data:{
							id:val,
							status:status
						},
						cache:false,
						dataType:"text",
						success:function(result,status,xhr){
							$(".grid-content-details").llygrid("reload",{planId:planId}) ;
						}
					}); 
				}
			}) ;
			
			$("[supplier-id]").live("click",function(){
				var id = $(this).attr("supplier-id") ;
				viewSupplier(id) ;
				return false ;
			}) ;
			

			$(".del-action").live("click",function(){
				var val = $(this).attr("val") ;//采购计划ID
				var planId = $(this).attr("planId") ;
				var asin = $(this).attr("asin") ;
				if(window.confirm("确认删除该采购产品["+asin+"]吗？")){
					$.ajax({
						type:"post",
						url:"/saleProduct/index.php/sale/deletePurchasePlanProduct",
						data:{
							id:val
						},
						cache:false,
						dataType:"text",
						success:function(result,status,xhr){
							$(".grid-content-details").llygrid("reload",{planId:planId}) ;
						}
					}); 
					
				}
			}) ;
			
			
			$(".product-detail").live("click",function(){
				var asin = $(this).attr("asin") ;
				openCenterWindow("/saleProduct/index.php/product/details/"+asin,950,650) ;
			})
			
			$(".process-action").live("click",function(){
				var val = $(this).attr("val") ;
				openCenterWindow("/saleProduct/index.php/sale/productFilter/"+val+"/"+type,900,600) ;
			}) ;
			
   	 });
   	 