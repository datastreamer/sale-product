<?php
class NewProductDev extends AppModel {
	var $useTable = 'sc_election_rule';
	
	function addNewAsinDev($params){
		$params['FLOW_STATUS'] = 10 ;//默认状态
		$asins = $params['asins'] ;
	
		$return = array() ;
		foreach ( explode(",", $asins) as $asin ){
				
			if( !empty( $asin ) ){
				//format asin
				preg_match_all("/[A-Za-z0-9-_]/i",$asin,$result);
				$asin=implode('',$result[0]);
	
				$params['ASIN'] = trim($asin);
	
				//判断ASIN是否正在开发中 结束标志：80（结束） 和 （15废弃）
				$p = $this->getObject("sql_productDev_new_IsDeving", array("asin"=>trim($asin) )) ;
				if( !empty($p) ){
					$return[] = $p['DEV_ID']."||".$p['ASIN'];
				}else{
					$p = array(
								'devId'=>$this->create_guid(),
								'asin'=>$params['ASIN'] ,
								'loginId'=>$params['loginId']
							) ;
					
					$this->exeSql("sql_pdev_new_insert", $p) ;
				}
	
			}
		}
	
		return $return ;
	}
	
	function doFlow( $params ){
		ini_set('date.timezone','Asia/Shanghai');
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		
		$isGlobal = $params['isGlobal'] ;
		if( !empty($isGlobal) && $isGlobal == 1){
			$sql = "update sc_amazon_config set current_value = '{@#currentValue#}'  WHERE  name = 'DEFAULT_INQUIRY_CHARGER'" ;
			$this->exeSql($sql, array("currentValue"=>$params['INQUIRY_CHARGER'])) ;
		}
		//return ;
		try{
			$this->exeSql("sql_pdev_new_update", $params) ;
			
			if( $params['FLOW_STATUS'] == 72 ){ //审批通过，生成采购单
				/*$PurchaseService  = ClassRegistry::init("PurchaseService") ;
				
				$p = array('realId'=>$params['REAL_PRODUCT_ID'],
						'planNum'=>$params['TRY_PURCHASE_NUM'],
						'loginId'=>$params['loginId'],
						'devId'=>$params['ASIN'].'_'.$params['TASK_ID']
				) ;
				$PurchaseService->createItemForProductDev($p) ;*/
				$realId = $params['REAL_PRODUCT_ID'] ;
				$NewPurchaseService  = ClassRegistry::init("NewPurchaseService") ;
				
				$limitPrice = $NewPurchaseService->getDefaultLimitPrice( $realId ) ;
				$execut 	= $NewPurchaseService->getDefaultCharger( $realId ) ;
				
				$startTime = date('Y-m-d');
				$endTime  = date('Y-m-d',strtotime('+3 day'));
				$executor 			= $execut['charger'] ;
				//$purchaseQuantity = $params['purchaseQuantity'] ;
				//$params['status'] 加入采购计划
				$params = array(
						'realId'=>$realId,
						'planNum'=>$params['TRY_PURCHASE_NUM'] ,
						'limitPrice'=>$limitPrice ,
						'executor'=>$executor,
						'startTime'=>$startTime,
						'endTime'=>$endTime,
						'reqProductId'=>'',
						'devId'=>$params['ASIN'].'_'.$params['TASK_ID'],
						'loginId'=>'auto'
				);
				$NewPurchaseService->createNewPurchaseProduct($params) ;

			}
			//保存轨迹
			
			$this->exeSql("sql_pdev_track_insert", $params) ;
			$dataSource->commit() ;
		}catch(Exception $e){
			$dataSource->rollback() ;
			print_r($e) ;
		}
	}
}