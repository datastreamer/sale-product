

var currentId = '' ;
$(function(){
		$(".btn-danger").toggle(function(){
			$(".exception-form").show() ;
		},function(){
			$(".exception-form").hide() ;
		}) ;
	
		$(".btn-confirm").click(function(){
			$.dataservice("model:Warehouse.In.doStatus",{inId:inId,status:2},function(result){//确认收货
				window.opener.openCallback('edit') ;
				window.close();
			});
			return false ;
		}) ;
		
		$(".btn-storage-save").live("click",function(){
			var record = $.llygrid.getRecord(this) ;
			var bpId = record['ID'] ;
			var genQuantity = $(this).parents("tr:first").find("input[key='GEN_QUANTITY']").val() ;
			var wasteQuantity = $(this).parents("tr:first").find("input[key='WASTE_QUANTITY']").val() ;
			
			$.dataservice("model:Warehouse.In.doSave4Quantity",{bpId:bpId,genQuantity:genQuantity,wasteQuantity:wasteQuantity},function(result){//确认收货
				window.opener.openCallback('edit') ;
				window.close();
			});
			return false ;
		}) ;

		$(".grid-content").llygrid({
			columns:[
	           	{align:"center",key:"ID",label:"编号", width:"9%"},
	           	{align:"center",key:"BOX_NUMBER",label:"包装箱编号",width:"20%",forzen:false,align:"left"},
	           	{align:"center",key:"SHIP_FEE",label:"运输费用",width:"13%"},
	           	{align:"center",key:"WEIGHT",label:"重量",width:"8%"},
	           	{align:"center",key:"TOTAL",label:"尺寸(长X宽X高)",width:"15%",format:function(val,record){
	           		return (record['LENGTH']||'-') +'X'+ (record['WIDGH']||'-') +"X"+(record['HEIGHT']||'-') ;
	           	}},
	           	{align:"center",key:"STATUS12",label:"备注",width:"7%"}
	         ],
	         ds:{type:"url",content:"/saleProduct/index.php/grid/query"},
			 limit:20,
			 pageSizes:[10,20,30,40],
			 height:120,
			 title:"",
			 autoWidth:true,
			 querys:{sqlId:"sql_warehouse_box_lists",inId:inId},
			 loadMsg:"数据加载中，请稍候......",
			 rowClick:function(rowIndex , rowData){
			 	var id = rowData.ID  ;
			 	currentId = id ;
			 	$(".grid-content-details").llygrid("reload",{boxId:currentId}) ;
			 	$(".add-box-product").removeAttr("disabled");
			 },
			 loadAfter:function(){
			 
			 }
		}) ;

		$(".grid-content-details").llygrid({
			columns:[
			    {align:"center",key:"BOX_NUMBER",label:"包装箱",width:"5%"},
	           	{align:"center",key:"NAME",label:"货品名称",width:"10%"},
           		{align:"center",key:"SKU",label:"SKU",width:"5%"},
           		{align:"center",key:"QUANTITY",label:"数量",width:"6%"},
           		{align:"center",key:"GEN_QUANTITY",label:"合格数量",width:"6%",format:{type:"editor",clazz:""}},
           		{align:"center",key:"WASTE_QUANTITY",label:"残品数量",width:"6%",format:{type:"editor",clazz:"danger-input"}},
           		{align:"center",key:"_",label:"",width:"6%",format:function(val,record){
           			return "<button class='btn btn-success btn-storage-save' style='padding:0px 5px;'>保存</button>" ;
           		}},
           		{align:"center",key:"DELIVERY_TIME",label:"供货时间",width:"6%"},
           		{align:"center",key:"PRODUCT_TRACKCODE",label:"产品跟踪码",width:"6%"},
           		{align:"center",key:"MEMO",label:"备注",width:"6%"}
	         ],
	         ds:{type:"url",content:"/saleProduct/index.php/grid/query"},
			 limit:100,
			 pageSizes:[100],
			 height:function(){
			 	return $(window).height() - 320 ;
			 },
			 title:"货品列表",
			 autoWidth:true,
			 querys:{sqlId:"sql_warehouse_box_products",boxId:''},
			 loadMsg:"数据加载中，请稍候......"
		}) ;
		
		
 });