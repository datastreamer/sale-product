<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php echo $this->Html->charset(); ?>
    <title>供应商</title>
    <meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>

   <?php
   include_once ('config/config.php');
   
		echo $this->Html->meta('icon');
		echo $this->Html->css('../js/validator/jquery.validation');
		echo $this->Html->css('../js/tree/jquery.tree');
		echo $this->Html->css('default/style');

		echo $this->Html->script('jquery');
		echo $this->Html->script('common');
		echo $this->Html->script('../grid/query');
		echo $this->Html->script('jquery.json');
		echo $this->Html->script('validator/jquery.validation');
		echo $this->Html->script('tree/jquery.tree');
		
		$id = "" ;
		$name = '' ;
		$address = '' ;
		$contactor  ="" ;
		$phone = '' ;
		$mobile = '' ;
		$fax = '' ;
		$zip_code = '' ;
		$url = "" ;
		$email ="" ;
		$qq ="" ;
		$products = "" ;
		$memo = '' ;
		
		 if( $supplier !=null){
		 	$id =$supplier[0]['sc_supplier']["ID"] ;
			$name =$supplier[0]['sc_supplier']["NAME"] ;
			$address =$supplier[0]['sc_supplier']["ADDRESS"] ;
			$contactor =$supplier[0]['sc_supplier']["CONTACTOR"] ;
			$phone =$supplier[0]['sc_supplier']["PHONE"] ;
			$mobile =$supplier[0]['sc_supplier']["MOBILE"] ;
			$fax =$supplier[0]['sc_supplier']["FAX"] ;
			$zip_code =$supplier[0]['sc_supplier']["ZIP_CODE"] ;
			$url =$supplier[0]['sc_supplier']["URL"] ;
			$email  =$supplier[0]['sc_supplier']["EMAIL"] ;
			$qq  =$supplier[0]['sc_supplier']["QQ"] ;
			$products  =$supplier[0]['sc_supplier']["PRODUCTS"] ;
			$memo = $supplier[0]['sc_supplier']["MEMO"]; 
		 }
	?>
	
	
  
   <style>
   		*{
   			font:12px "微软雅黑";
   		}

		.rule-content-item{
			clear:both;
		}

		.item-label,.item-relation,.item-value,.item-value{
			float:left;
		}
   </style>

   <script>
		var asin = '<?php echo $asin;?>' ;
   
   	    var treeData = {id:"root",text:"产品分类",isExpand:true,childNodes:[]} ;
	    var treeMap  = {} ;
	  
	    <?php
	    	$ss = explode(",",$products) ;
	    
	    	$index = 0 ;
			foreach( $categorys as $Record ){
				$sfs = $Record['sc_product_category']  ;
				$id1   = $sfs['ID'] ;
				$name1 = $sfs['NAME'] ;
				$pid  = $sfs['PARENT_ID'] ;
				echo " var item$index = {id:'$id1',text:'$name1',memo:'".$sfs['MEMO']."',isExpand:true} ;" ;
				
				foreach($ss as $s){
					if( $s  == $id1 ){
						echo " item$index ['checkstate'] = 1 ;" ;
					}
				}
				
			
				echo " treeMap['id_$id1'] = item$index  ;" ;
				if(empty($pid)){
					echo " item$index ['childNodes'] = item$index ['childNodes']||[] ;" ;
					echo "treeData.childNodes.push( item$index ) ;" ;
				}else{
					echo " treeMap['id_$pid'].childNodes.push( item$index ) ;" ;
				}
				$index++ ;
			} ;
		?>
   
   
		$(function(){
			$('#default-tree').tree({//tree为容器ID
				source:'array',
				data:treeData ,
				showCheck:true,
				cascadeCheck:false
           }) ;
			

			$("button").click(function(){
				
				if( !$.validation.validate('#personForm').errorInfo ) {
					var json = $("#personForm").toJson() ;
					var vals = $('#default-tree').tree().getSelectedIds()  ;
					
					json.products = vals.join(",") ;
				
					$.ajax({
						type:"post",
						url:contextPath+"/supplier/saveSupplier/"+asin,
						data:json,
						cache:false,
						dataType:"text",
						success:function(result,status,xhr){
							window.opener.location.reload() ;
							window.close() ;
						}
					}); 
				};
			})
		})
   </script>

</head>
<body>
<form id="personForm" action="#" data-widget="validator,ajaxform">
<input type="hidden" id="id" value="<?php echo $id;?>"/>
	<table>
		<tr>
			<td>供应商名称：</td><td><input  data-validator="required" type="text" id="name" value="<?php echo $name;?>"/></td>
			<td rowspan=11 style="width:100px;vertical-align:top;">
				<div id="default-tree" class="tree" style="padding: 5px; "></div>
			</td>
		</tr>
		<tr>
			<td>供应商地址：</td><td><input  data-validator="required" type="text" id="address" value="<?php echo $address;?>"/></td>
		</tr>
		<tr>
			<td>联系人：</td><td><input type="text" id="contactor" value="<?php echo $contactor;?>"/></td>
		</tr>
		<tr>
			<td>联系电话：</td><td><input type="text" id="phone" value="<?php echo $phone;?>"/></td>
		</tr>
		<tr>
			<td>手机：</td><td><input type="text" id="mobile" value="<?php echo $mobile;?>"/></td>
		</tr>
		<tr>
			<td>传真：</td><td><input type="text" id="fax" value="<?php echo $fax;?>"/></td>
		</tr>
		<tr>
			<td>QQ/MSN/Skype：</td><td><input type="text" id="qq" value="<?php echo $qq;?>"/></td>
		</tr>
		<tr>
			<td>Email：</td><td><input type="text" id="email" value="<?php echo $email;?>"/></td>
		</tr>
		<tr>
			<td>邮编：</td><td><input type="text" id="zip_code" value="<?php echo $zip_code;?>"/></td>
		</tr>
		<tr>
			<td>网址：</td><td><input type="text" id="url" value="<?php echo $url;?>"/></td>
		</tr>
		<tr>
			<td>备注：</td><td><textarea id="memo" style="width:300px;height:100px;"><?php echo $memo;?></textarea></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn btn-primary">保存</button></td>
		</tr>
	</table>
</form>
</html>