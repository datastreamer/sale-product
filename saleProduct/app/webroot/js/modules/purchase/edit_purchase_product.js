$(function(){
	 function formatMoney(val){
		 	val = $.trim(val+"") ;
		 	val = val.replace("$","") ;
		 	return $.trim(val) ;
	 }
	 
	 $(".reedit").click(function(){
			$(this).parents("table:first").find(".input").removeAttr("disabled") ;
		}) ;

	 //设置页面是否刻度
	 var __setStatus = currentStatus ;
	 if(actionType == 'audit'){
		 __setStatus = 70 ;
	 }

	 $("#personForm   :input").attr("disabled",'disabled') ;
	 $("."+__setStatus+"-input").removeAttr("disabled") ;
	 $(".btn.input[disabled]").hide();
	 $(".no-disabled").removeAttr("disabled") ;

	var tabs = [{label:'基本信息',content:"base-info"}] ;
	if( $("#ref-asins").length ){
		tabs.push({label:'关联ASIN',content:"ref-asins"}) ;
	}
	tabs.push( {label:'处理轨迹',content:"tracks"} ) ;
	//if( currentStatus >=45 ){
		//tabs.push( {label:'货品询价',content:"supplier-tab"} ) ;
	tabs.push( {label:'采购需求',iframe:true,url: contextPath+"/page/forward/SupplyChain.listReqDetails/"+realId+"/"+reqProductId} ) ;
	tabs.push( {label:'货品询价',iframe:true,url: contextPath+"/page/forward/SaleProduct.supplierInquiryHistory/"+sku} ) ;
	//}
	tabs.push( {label:'供应商信息',iframe:true,url: contextPath+"/page/forward/Supplier.listsBySku/"+sku} ) ;
	tabs.push( {label:'交易价格曲线',iframe:true,url: contextPath+"/page/forward/SaleProduct.priceChart/"+sku} ) ;
	tabs.push( {label:'采购记录',iframe:true,url: contextPath+"//page/forward/Supplier.purchaseProductList/"+realId+"/product"} ) ;

	///page/forward/SaleProduct.priceChart/20000021
	
	var status = [10,20,25,30,40,45,46,47,48,50,60,70] ;
	/*if( $reedit_pp_product && status <=70 ){//再编辑
		$(status).each(function(){
			if( this <= currentStatus ){
				$("."+this+"-input").removeAttr("disabled") ;
			}
		}) ;
	}*/
	
	
	/*if( $ppp_assign_executor && ( currentStatus>=40 && currentStatus <= 48) ){
		$(".btn-charger").removeAttr("disabled").show() ;
	}*/
	$(".btn-charger").show() ;
	
	//widget init
	var tab = $('#details_tab').tabs( {
		tabs:tabs ,
		height:function(){
			return $(window).height() - 135 ;
		}
	} ) ;
	
	$(".grid-track").llygrid({

		columns:[
		    {align:"left",key:"MESSAGE",label:"内容", width:"31%"},
           	{align:"center",key:"CREATE_TIME",label:"操作时间",width:"24%" },
            {align:"left",key:"CREATOR_NAME",label:"操作人",width:"10%" },
         ],
         ds:{type:"url",content:contextPath+"/grid/query"},
		 limit:30,
		 pageSizes:[10,20,30,40],
		 height:function(){
		 	return $(window).height() - 370 ;
		 },
		 title:"",
		 indexColumn:false,
		 querys:{pdId:id,sqlId:"sql_purchase_plan_product_listTracks"},//sql_purchase_plan_details_listForSKU sql_purchase_plan_details_list
		 loadMsg:"数据加载中，请稍候......"
	}) ;
	
	$purchase_cost_view = true ;
	
	if( $("#ref-asins").length ){
		$(".grid-content-details").llygrid({
			columns:[
			    {align:"center",key:"SKU",label:"Listing SKU",width:"14%",forzen:false,align:"left"},
	           	{align:"left",key:"ASIN",label:"ASIN", width:"11%",format:{type:'asin'}},
	           	{align:"center",key:"LOCAL_URL",label:"Image",width:"6%",forzen:false,align:"left",format:{type:'img'}},
	            {align:"left",key:"TITLE",label:"TITLE",width:"18%",forzen:false,align:"left",format:{type:'titleListing'}},
	            {align:"center",key:"QUANTITY",label:"账号库存",width:"6%",forzen:false,align:"left"},
	          
	           	{align:"center",key:"TOTAL_COST",label:"成本",width:"6%",format:function(val,record){
	           		return "<a href='' class='cost' type='FBA' asin='"+record.ASIN+"'>"+(val||"")+"</a>" ;
	           	},permission:function(){ return $COST_VIEW_TOTAL; }},
	           	{align:"center",key:"FBA_PRICE",label:"最低价",width:"6%",permission:function(){ return $purchase_cost_view; }},
	           	{align:"center",key:"FBA_PRICE",label:"利润额",width:"6%",format:function(val,record){
	           		var lye = parseFloat(formatMoney(record.TOTAL_PRICE))  -   parseFloat(formatMoney(record.TOTAL_COST||0)) ;
	           		
	           		if( !record.TOTAL_PRICE || record.TOTAL_PRICE == '0'){
	           			return "-" ;
	           		}
	           		
	           		
	           		if( !record.TOTAL_COST || record.TOTAL_COST == '0'){
	           			return "-" ;
	           		}
	           		
	           		if(    parseFloat(formatMoney(record.TOTAL_COST||0)) <= 0 ){
	           			return "-" ;
	           		}
	           		lye = lye.toFixed(2) ;
	           		if( lye < 0 ){
	           			return "<font color='red'>"+lye+"</font>"
	           		}else{
	           			return lye ;
	           		}
	           	},permission:function(){ return $COST_VIEW_PROFIT; }},
	           	{align:"center",key:"TOTAL_PRICE",label:"利润率",width:"6%",format:function(val,record){
	           		var lye = parseFloat(formatMoney(record.TOTAL_PRICE)) -   parseFloat(formatMoney(record.TOTAL_COST||0)) ;
	           		
	           		if( !record.TOTAL_PRICE || record.TOTAL_PRICE == '0'){ return "-" ; } 
	           		if( !record.TOTAL_COST || record.TOTAL_COST == '0'){ return "-" ; }
	           		
	           		
	           		if(    parseFloat(formatMoney(record.TOTAL_COST||0)) <= 0 ){
	           			return "-" ;
	           		}
	           		
	           		var lyl = (lye / (    parseFloat(formatMoney(record.TOTAL_COST||0)) ))*100 ;
	           		lyl = lyl.toFixed(2) ;
	           		if( lyl < 0 ){
	           			return "<font color='red'>"+lyl+"%</font>"
	           		}else{
	           			return lyl+"%" ;
	           		}
	           	},permission:function(){ return $COST_VIEW_PROFIT; }}
	           	
	         ],
	         ds:{type:"url",content:contextPath+"/grid/query"},
			 limit:30,
			 pageSizes:[10,20,30,40],
			 height:function(){
			 	return $(window).height() - 370 ;
			 },
			 title:"",
			 indexColumn:false,
			 querys:{id:id,sqlId:"sql_purchase_plan_getAsinFromSku"},//sql_purchase_plan_details_listForSKU sql_purchase_plan_details_list
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
	}
		
	
	//dom bind events
	$(".btn-save").click(function(){
		var json = $("#personForm").toJson() ;
		$.dataservice("model:Sale.savePurchasePlanProduct",json,function(){
			window.close() ;
		}) ;
	});
	
	$(".edit_supplier").click(function(){
		var sku = $(this).attr("sku");
		openCenterWindow(contextPath+"/supplier/listsSelectBySku/"+sku,800,600) ;
		return false;
	}) ;
	
	$(".ship-fee").change(function(){
		if( $(this).attr("disabled")=='disabled') return ;
		var val = $(this).val() ;
		if(val == 'hdfk' || val == 'mjds'){
			$(this).closest("tr").find("input").removeAttr("disabled") ;
		}else{
			$(this).closest("tr").find("input").attr("disabled","disabled") ;
		}
	}).trigger("change") ;
}) ;

$(function(){
	var chargeGridSelect = {
			title:'用户选择页面',
			defaults:[],//默认值
			key:{value:'LOGIN_ID',label:'NAME'},//对应value和label的key
			multi:false,
			width:600,
			height:560,
			grid:{
				title:"用户选择",
				params:{
					sqlId:"sql_user_list_forwarehouse"
				},
				ds:{type:"url",content:contextPath+"/grid/query"},
				pagesize:10,
				columns:[//显示列
					{align:"center",key:"ID",label:"编号",width:"20%"},
					{align:"center",key:"LOGIN_ID",label:"登录ID",sort:true,width:"30%"},
					{align:"center",key:"NAME",label:"用户姓名",sort:true,width:"36%"}
				]
			}
	   } ;
	   
	$(".btn-charger").listselectdialog( chargeGridSelect,function(){
		var args = jQuery.dialogReturnValue() ;
		var value = args.value ;
		var label = args.label ;
		$("#executor").val(value) ;
		$("#executorName").val(label) ;
		return false;
	}) ;
	
	$(".supplier-select").click(function(){
		openCenterWindow(contextPath+"/supplier/listsSelectBySku/"+sku,800,600,function(){
			window.location.reload();
		}) ;
	}) ;

	$(".supplier").click(function(){
		openCenterWindow(contextPath+"/supplier/addBySku/"+sku,800,600,function(){
			window.location.reload();
		}) ;
	}) ;
	
	function calcPurchaseProduct(){
		$quantity =  0 ;
		$(".purchaseQuantity").each(function(){
			$quantity += parseInt( $(this).val()||0 ) ;
		}) ;
		$("[name='planNum']").val( $quantity ) ;
	}
	
	$(".purchaseQuantity").keyup(function(){
		calcPurchaseProduct() ;
	}).blur(function(){
		calcPurchaseProduct() ;
	}) ;;
	
	$(".update-supplier").click(function(){
		var supplierId = $(this).attr("supplierId") ;
		openCenterWindow(contextPath+"/supplier/updateProductSupplierPage/"+sku+"/"+supplierId+"/"+planId,650,600) ;
		return false;
	}) ;
	
	$(".used").click(function(){
		var supplierId=$(this).attr("supplierId");
		if(window.confirm("确认采用？")){
			$.dataservice("model:Sale.setSupplierFlag",{supplierId:supplierId,sku:sku,planId:planId},function(result){
					window.location.href = "#supplier-tab" ;
					window.location.reload();
			});
		}
	});
	
	//初始化流程数据
	var flow = new Flow() ;
	flow.init(".flow-bar center",flowData) ;
	flow.draw(currentStatus) ;
	
	 
	 if( $(".btn-flow").length <=0 ){
		 $("#personForm   :input").attr("disabled",'disabled') ;
	 }
	 
	 $(".print-btn").live("click",function(){
			var tr = $(this).closest("tr") ;
			var printNum = tr.find(".print-num").val() ;//$(this).prev().val() ;
			var accountId =  tr.find(".accountId").val() ;//record.ACCOUNT_ID ;
			var listingSku =  tr.find(".listingSku").val() ;//record.SKU ;
			openCenterWindow(contextPath+"/page/forward/Barcode.barcode/"+listingSku+"/"+accountId+"/"+printNum ,850,700) ;
	 });
	
}) ;

function WarehouseInAction(status , statusLabel){
	if(window.confirm("确认【"+statusLabel+"】？")){
		//var memo = "("+statusLabel+")" + ($(".memo").val()||"");
	
			if( !$.validation.validate('#personForm').errorInfo ) {
				//var json = $("#personForm").toJson() ;
				//入库
				openCenterWindow(contextPath+"/page/forward/Inventory.in_purchase/"+id+"/"+realId+"/"+reqPlanId,800,600,function(){
					window.location.reload();
				}) ;
				/*
				$.dataservice("model:Sale.warehouseIn",json,function(result){
					//alert( $.json.encode( result ));
					//执行状态更新
				//$.dataservice("model:Sale.savePurchaseTaskProduct",json,function(){
					$.dataservice("model:Sale.doTaskProductStatus",json1,function(result){
						window.location.reload();
					});
				//}) ;
				}) ;
				*/
			}
	}
}

function AuditAction(status , statusLabel){
	
	if(window.confirm("确认【"+statusLabel+"】？")){
		var memo = "("+statusLabel+")" + ($(".memo").val()||"") ;
		var json1 = {id:id,status:status,trackMemo:memo,currentStatus:currentStatus} ;
		
			if( !$.validation.validate('#personForm').errorInfo ) {
				var json = $("#personForm").toJson() ;
				json1 = $.extend(json,json1) ;
				json1.purchaseDetails = getEditData() ;
				$.dataservice("model:NewPurchaseService.savePurchaseProduct",json,function(){
					//执行状态更新
					window.location.reload();
				}) ;
			}
	}
}

function getEditData(){
	var  result = [] ;
	$(".edit-data-row").each(function(){
		var accountId = $(this).find(".accountId").val() ;
		var listingSku  = $(this).find(".listingSku").val() ;
		var purchaseQuantity  = $(this).find(".purchaseQuantity").val() ;
		var supplyQuantity  = $(this).find(".supplyQuantity").val() ;
		var fulfillment =  $(this).find(".fulfillment").val() ;
		result.push({accountId:accountId,sku:listingSku,quantity:purchaseQuantity}) ;//,fulfillment:fulfillment,supplyQuantity:supplyQuantity
	}) ;
	return result ;
}

function ForceAuditAction(status , statusLabel,isTerminal ){
	if(window.confirm("确认【"+statusLabel+"】？")){
				var memo = "("+statusLabel+")" + ($(".memo").val()||"") ;
				var json1 = {id:id,status:status,trackMemo:memo,currentStatus:currentStatus,isTerminal:isTerminal} ;
				var json = $("#personForm").toJson() ;
				json1 = $.extend(json,json1) ;
				json1.purchaseDetails = getEditData() ;
				$.dataservice("model:NewPurchaseService.savePurchaseProduct",json1,function(){
					//执行状态更新
					window.location.reload();
				}) ;
	}
}

$(function(){
	Tags.init( $(".btn-tags") , $(".tag-container") ,$("#tags")) ;
}) ;


var Flow = function(){
	var _data = null ;
	var _selector = null ;
	var itemTemplate = '<td><div class="flow-node {statusClass}" status="{status}">{label}</div></td>' ;
	
	this.init = function(selector , d){
		_data = d ;
		_selector = selector ;
		return this ;
	}

	this.draw = function(current){
		//create container
		var html = '<table class="flow-table">\
						<tr>\
						</tr>\
					</table>\
					<div class="flow-action">\
						<div class="btn-container"></div>\
						<a href="#" class="memo-control">附加备注</a>\
					</div>\
					<textarea class="memo" placeHolder="输入附加备注信息"></textarea>' ;
		
		$(_selector).empty().html(html) ;
		
		$(".memo-control").toggle(function(){
			$(".memo").show() ;
		},function(){
			$(".memo").hide() ;
		}) ;
		
		var flowContainer = $(_selector).find(".flow-table tr")
		
		var length = _data.length ;
		var isContinue = true ;
		$(_data).each(function(index,node){
			if( node.format ) node.format(node) ;
			if(!isContinue) return ;
 			var statusClass = node.statusClass||(current == this.status ?"active":(this.status < current?"passed":"disabled")) ;
			var status = this.status ;
			var isMemo = this.memo ;
			var label = this.label ;
			html =  itemTemplate.replace(/{statusClass}/g,statusClass)
								.replace(/{status}/g,status)
								.replace(/{label}/g,label) ;
			$(html).appendTo(flowContainer) ;
			
			if(length != index+1){
				flowContainer.append("<td class='flow-split'>-</td>") ;
			}
			
			
			if( current == this.status ){
				var actions = this.actions ;
				
				if(this.memo && actions && actions.length >=1 ){
					$(".memo-control").show();
				}
				
				/*if( $reedit_pp_product ){
					$("<button class='btn btn-primary btn-flow' style='margin-right:3px;'>再编辑</button>&nbsp;&nbsp;")
					.appendTo(".btn-container").click(function(){
						//me.action() ;
						AuditAction(currentStatus,"再编辑") 
					}) ; 
				}*/
				
				$(actions||[]).each(function(){
					if(!this.label)return ;
					var clazz = this.clazz||"btn-primary" ;
					var me = this ;
					$("<button class='btn "+clazz+" btn-flow' style='margin-right:3px;'>"+this.label+"</button>&nbsp;&nbsp;")
						.appendTo(".btn-container").click(function(){
							me.action() ;
						}) ;  ;
				}) ;
			}
			if(node.isbreak){
				isContinue = false ;
				var tdlast = $(".flow-table td:last") ;
				if(tdlast.hasClass("flow-split")) tdlast.remove() ;
			}  ;
		}) ;
	}
} ;