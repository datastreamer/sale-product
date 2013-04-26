
 	$(function(){
 		//init input
 		$(".input").attr("disabled","disabled");
 		$("."+pdStatus+"-input").removeAttr("disabled") ;
 		
 		$(".reedit").click(function(){
 			$(this).parents("table:first").find(".input").removeAttr("disabled") ;
 		}) ;
 		
 		var productGridSelect = {
				title:'货品选择界面',
				defaults:[],//默认值
				key:{value:'ID',label:'REAL_SKU'},//对应value和label的key
				multi:false ,
				width:700,
				height:600,
				grid:{
					title:"用户选择",
					params:{
						sqlId:"sql_saleproduct_list"
					},
					ds:{type:"url",content:contextPath+"/grid/query"},
					pagesize:10,
					columns:[//显示列
						{align:"center",key:"REAL_SKU",label:"SKU",sort:true,width:"30%",query:true},
						{align:"center",key:"NAME",label:"NAME",sort:true,width:"30%",query:true},
						{align:"center",key:"IMAGE_URL",label:"",sort:true,width:"10%",format:{type:'img'}}
					]
				}
		   } ;
		   
		$(".select-real-product").listselectdialog( productGridSelect,function(){
			var args = jQuery.dialogReturnValue() ;
			var value = args.value ;
			var label = args.label ;
			var selectReocrds = args.selectReocrds ;
			
			$("#REAL_PRODUCT_ID").val(value) ;
		
			if( !$.validation.validate('#personForm').errorInfo ) {
					var json = $("#personForm").toJson() ;
					json = $.extend({},json) ;
					json.ASIN = asin ;
					$.dataservice("model:ProductDev.doFlow",json,function(result){
						window.location.reload() ;
					});
			} ;
			
			return false;
		}) ;
 		
 		//createActionbar();
 		
 		$(".action").click(function(){
 			var status = $(this).attr("status") ;
 			
 			var _ = $.trim( $(this).text() ) ;
 			var val = getDescription(_) ;
 			
 			var strategy = $("#strategy").val() ;
 			
 			if(status == 3 && !(val && $.trim(val)) ){
 				alert("必须填写废弃理由！") ;
 				return false ;
 			}
 			
			if( window.confirm("确认执行该操作吗？") ){
				$.ajax({
					type:"post",
					url:contextPath+"/sale/productFlowProcess" ,
					data:{description:val,filterId:filterId,asin:asin,status:status,strategy:strategy},
					cache:false,
					dataType:"text",
					success:function(result,status,xhr){
						//window.opener.$(".grid-content-details").llygrid("reload") ;
						window.location.reload() ;
					}
				}); 
			}
			
 			return false ;
 		}) ;
 		
 	}) ;
 	
 	
 	$(function(){
			$(".base-gather").click(function(){
				$.ajax({
					type:"post",
					url:contextPath+"/gatherProduct/execute/"+asin,
					data:{},
					cache:false,
					dataType:"text",
					success:function(result,status,xhr){
						alert("采集完成");
						window.location.reload() ;
					}
				}); 
			}) ;
			
			$(".supplier").click(function(){
				openCenterWindow(contextPath+"/supplier/listsSelect/"+asin,800,600) ;
			}) ;
			
			
			$(".category").click(function(){
				openCenterWindow(contextPath+"/product/assignCategory/"+asin,400,500) ;
			}) ;
			
			$(".update-supplier").click(function(){
				var supplierId = $(this).attr("supplierId") ;
				openCenterWindow(contextPath+"/supplier/updateProductSupplierPage/"+asin+"/"+supplierId,650,600) ;
				return false;
			}) ;
			
			$("[testStatus]").click(function(){//下架
				
				var testStatus = $(this).attr("testStatus") ;
				
				var _ = $.trim( $(this).text() )  ;
				
				var val = getDescription(_) ;
	 			
				if( window.confirm("确认执行该操作吗？") ){
					$.ajax({
						type:"post",
						url:contextPath+"/sale/productTestStatus" ,
						data:{description:val,asin:asin,testStatus:testStatus},
						cache:false,
						dataType:"text",
						success:function(result,status,xhr){
							window.location.reload() ;
						}
					}); 
				}
				
	 			return false ;
			}) ;
			
			$("[supplier-id]").click(function(){
				var id = $(this).attr("supplier-id") ;
				viewSupplier(id) ;
				return false ;
			}) ;
			
		});
		
		function getDescription(action){
			//return "" ;
			var beforeDes = $("#description_hidden").val();
			var now       = $("#description").val()||"未填写备注信息" ;
			return beforeDes+"<span>【"+username+"】"+new Date().format("yyyy-MM-dd hh:mm:ss") +"("+action+")</span><p><span>"+now+"</span></p>" ;
		}
		
		$(function(){
			var tab = $('#details_tab').tabs( {
				tabs:[
					{label:'基本信息',content:"baseinfo-tab"},
					{label:'竞争信息',content:"competetion-tab"},
					{label:'产品分类',url:contextPath+"/product/assignCategory/"+asin,iframe:true},
					{label:'产品开发',content:"dev-tab"},
					{label:'开发轨迹',content:"track-tab"}
				] ,
				height:'500px'
			} ) ;
			
			$(".grid-track").llygrid({

				columns:[
				    {align:"left",key:"MEMO",label:"内容", width:"31%"},
		           	{align:"center",key:"CREATE_TIME",label:"操作时间",width:"24%" },
		            {align:"left",key:"USERNAME",label:"操作人",width:"10%" },
		         ],
		         ds:{type:"url",content:contextPath+"/grid/query"},
				 limit:30,
				 pageSizes:[10,20,30,40],
				 height:function(){
				 	return $(window).height() - 370 ;
				 },
				 title:"",
				 indexColumn:false,
				 querys:{asin:asin,sqlId:"sql_pdev_listTracks"},//sql_purchase_plan_details_listForSKU sql_purchase_plan_details_list
				 loadMsg:"数据加载中，请稍候......"
			}) ;
		}) ;
		
		Date.prototype.format = function(format){ 
			var o = { 
				"M+" : this.getMonth()+1, //month 
				"d+" : this.getDate(), //day 
				"h+" : this.getHours(), //hour 
				"m+" : this.getMinutes(), //minute 
				"s+" : this.getSeconds(), //second 
				"q+" : Math.floor((this.getMonth()+3)/3), //quarter 
				"S" : this.getMilliseconds() //millisecond 
			} 
			
			if(/(y+)/.test(format)) { 
				format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
			} 
			
			for(var k in o) { 
				if(new RegExp("("+ k +")").test(format)) { 
					format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
				} 
			} 
			return format; 
		} 
		