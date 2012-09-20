<?php
ignore_user_abort(1);
set_time_limit(0);

ini_set("memory_limit", "62M");
ini_set("post_max_size", "24M");

App :: import('Vendor', 'Snoopy');
App :: import('Vendor', 'simple_html_dom');
App :: import('Vendor', 'Amazon');

class CronController extends AppController {
	
	public $helpers = array (
		'Html',
		'Form'
	); //,'Ajax','Javascript
	
	var $uses = array('Task', 'Config','Amazonaccount');

	public function gatherCompetitions($id){
		//获取商家产品asin
		$array = $this->Task->listTaskAsins( $id ) ;
		$index = 0 ;
		$this->Task->savelog($id, "start gather competition" );
		foreach( $array as $arr ){
			$index = $index + 1 ;
			$asin = $arr['sc_gather_asin']['asin'] ;
			$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] competitions" );
			$this->fetchCompetions($asin,$id ) ;
		}
		$this->Task->savelog($id, "end!" );
	}
	
	public function gatherFba($id){
		$array = $this->Task->listTaskAsins( $id ) ;
		$index = 0 ;
		$this->Task->savelog($id, "start gather fba" );
		foreach( $array as $arr ){
			$index = $index + 1 ;
			$asin = $arr['sc_gather_asin']['asin'] ;
			$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] fba" );
			$this->fetchFba($asin,$id ) ;
		}
		$this->Task->savelog($id, "end!" );
	}
	
	public function fetchAsin($asin,$id=null,$index = null) {
		if( strlen(trim($asin)) < 9 || strlen(trim($asin)) >=11 ) {
			if($id == null ){
				$this->response->type("json");
				$this->response->body("execute complete");
				return $this->response;
			}
			return ;
		} ; 
		
		try{
			$url = "http://www.amazon.com/dp/" . $asin;
			//$url = "http://www.amazon.com/gp/offer-listing/".$asin ;
			
			$snoopy = new Snoopy;
			
			if( $snoopy->fetch($url) ){
				//http://www.amazon.com/gp/offer-listing/B00005NPOB
				$Result = $snoopy->results ;
				$html = new simple_html_dom();
				$html->load( $Result  ,true ,false );
				
				//$html = file_get_html($url); 
				try{
					//get title
					$title = $this->Task->getProp($html ,'#btAsinTitle' ) ;
					 //$html->find('#btAsinTitle',0)->innertext;
					
					//byLineReorder
					$brand = "" ;
					foreach( $html->find('.buying a') as $e ){
						$href = $e->href ;
						if( strripos( $href , "brandtextbin" )>0 ){
							$brand = trim( $e->plaintext ) ;
							break;	
						}
					}
					//$brand =$this->Task->getProp($html ,'.buying a' ) ;
					
					$technical = "" ;
					if($html->find("#technical_details",0)!=null){
						$technical = $html->find("#technical_details",0)->parent()->find(".content",0)->plaintext ;
					}
		
					$h2s = $html->find("h2") ;
					$productDetails = '' ;
					$Dimensions = '' ;
					$Weight = '' ;
					foreach(  $html->find("h2") as $e){ 
						if( $e->plaintext == 'Product Details' ) {
							$productDetails = $e->next_sibling ()->plaintext ;
							
							foreach(  $e->next_sibling()->find("b") as $f ){
								if( trim( $f->plaintext ) == "Product Dimensions:" ){
									$Dimensions = $f->parent()->plaintext ;
									$Dimensions = str_replace("Product Dimensions:" ,"",$Dimensions);
								}else if( trim( $f->plaintext ) == "Shipping Weight:" ){
									$Weight = $f->parent()->plaintext ;
									$Weight = str_replace("Shipping Weight:" ,"",$Weight);
									$Weight = str_replace("(View shipping rates and policies)" ,"",$Weight);
								}
							}
						}
			        }  
					
					$productDescription = "" ;
					if( $html->find('#productDescription',0) != null){
						$productDescription = $html->find('#productDescription',0)->find(".content",0)->plaintext ;
					}
					
					$array['asin'] = $asin ;
					$array['title'] = trim($title) ;
					$array['TECHDETAILS'] = trim($technical) ;
					$array['PRODUCTDETAILS'] = trim($productDetails) ;
					$array['DESCRIPTION'] = trim($productDescription) ;
					$array['DIMENSIONS'] = trim($Dimensions) ;
					$array['WEIGHT'] = trim($Weight) ;
					$array['BRAND'] = trim($brand) ;
					//DIMENSIONS
					//WEIGHT
					
					//更新产品基本信息
					$this->Task->updateProduct($array);
					
					///保存图片
					$images = $html->find("#prodImageCell img",0) ;
					if( $images!=null ){
						$src = $images->src ;
						$title = $images->alt ;
						try{
							$localUrl = "images/amazon/".$asin."/".basename($src) ;
							$this->Task->addImage($asin,$src,$title,$localUrl) ;
							$this->Task->downloads($src,$asin) ;
						}catch(Exception $e){}
					}
					//保存竞争信息
					$this->saveProductPotential($asin , $html) ;
				}catch(Exception $e){
					$this->Task->savelog($id,"get product[".$asin."] details failed:::: ".$e->getMessage()) ;	
				}
				$html->clear() ;
				unset($html) ;
				$this->Task->savelog($id,"get product[".$asin."] details success!") ;	
			}
			
			unset($snoopy) ;
		}catch(Exception $e){
			$this->Task->savelog($id,"get product[".$asin."] error:::".$e->getMessage()) ;	
		}
		
		if($id == null ){
			$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		}
	}
	
	public function saveProductPotential($asin ,$html=null,$url=null){
		if( $html != null ){
			//get point
			$rating = $html->find(".acrRating",0) ;
			$point = "" ;
			if($rating != null ){
				$txt = $rating->plaintext ;
				$arry = explode("out of",$txt) ;
				$point = trim( $arry[0] ) ;
			}
			//get review
			$views = $html->find(".acrCount",0) ;
			$reviews = "" ;
			if($views != null ){
				$txt = $views->plaintext ;
				$txt = str_replace( array('"',')','(',","),"",$txt ) ;
				$reviews = trim( $txt ) ;
				$reviews = str_replace( array("reviews","review"),"",$reviews ) ;
				$reviews = trim($reviews) ;
			}
			//get ranking
			$salesRank = $html->find("#SalesRank",0) ;
			$rankArray = array() ;
			if( $salesRank != null ){
				foreach( $salesRank->find(".zg_hrsr_item") as $item ){
					$rank = $item->find(".zg_hrsr_rank",0) ;
					$type = $item->find(".zg_hrsr_ladder",0) ;
					
					$rankText = str_replace("#","",$rank->plaintext) ;
					$typeText = str_replace("in&nbsp;","",$type->plaintext) ;
					
					$rankArray[] = array("rank"=>trim( $rankText ),"type"=>trim($typeText) ) ;
				}
			}
			$this->Task->saveSalePotential($asin,$reviews , $point , $rankArray ) ;
		}else {
			
		}
	}
	
	public function fetchAsins($id=null) {
		$array = $this->Task->listTaskAsins( $id ) ;
		$index = 0 ;
		$this->Task->savelog($id, "start gather details" );
		foreach( $array as $arr ){
			$index = $index + 1 ;
			$asin = $arr['sc_gather_asin']['asin'] ;
			$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] details" );
			$this->fetchAsin($asin ,$id ) ;
		}
		$this->Task->savelog($id, "end!" );
	}
	
	public function fetchFba($asin = null,$id = null ){
		//try{
		
			$d = date("U") ;
			
			$url = "http://www.amazon.com/gp/offer-listing/$asin?shipPromoFilter=1&dd=$d" ;
			
			//echo $url ;
			$snoopy = new Snoopy;
			
			$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";
			$snoopy->referer = "http://www.amazon.com/";

			if( $snoopy->fetch($url) ){
				
				$Result = $snoopy->results ;
				
				$html = new simple_html_dom();
				$html->load( $Result ,true ,false );
				try{
					//$html = file_get_html($url); 
					
					$h2s = $html->find("h2") ;
					
					$base = array() ;
					$details = array() ;
			
					foreach(  $html->find("h2") as $e){ 
						if( $e->plaintext == 'Featured Merchants' ) {//1-5 of 15 offers 
							$numberofresults =  $e->next_sibling ()->plaintext ;
							$ary = explode("of",$numberofresults) ;
							$_ = str_replace("offers","",$ary[1] ) ;
							$fmNum = trim( $_ ) ;
							$base["FBA_NUM"] = $fmNum ;
							
							$detailTables = $e->parent ;
							while(true){
								if( $detailTables->class == "resultsheader" ){
									break ;
								}
								$detailTables = $detailTables->parent ;
							}
							
							$index = 0 ;
							foreach( $detailTables->next_sibling()->find(".result") as $table ){
								$price = $table->find(".price",0)->plaintext ;
								$priceShippingEl = $table->find(".price_shipping",0) ;
								
								$priceShipping = "0.00" ;
								if( $priceShippingEl!= null ){
									$priceShipping =  $priceShippingEl->plaintext ;
								}
								
								$sellerInformation = $table->find(".sellerInformation",0)  ;
								
								$baseInfo = $sellerInformation->find(".seller a",0) ;
								$sellerUrl= '' ;
								$sellerName = '' ;
								$sellerImg = '' ;
								if($baseInfo != null){
									$sellerUrl = $baseInfo->href ;
									$sellerName = $baseInfo->plaintext ;
								}else {
									$baseInfo = $sellerInformation->first_child() ;
									if($baseInfo->href !=null){
										$sellerUrl = $baseInfo->href ;
										$baseImage = $baseInfo->find("img",0) ;
										$sellerImg = $baseImage->src ;
										$sellerName = $baseImage->alt ;
									}else if($baseInfo->src != null){
										$sellerImg = $baseInfo->src ;
										$sellerName = $baseInfo->alt ;
									}
								}
								
								if($index == 0){
									$base["TARGET_PRICE"] = $price ;
								}
								
								$index++ ;
								$details[] = array("SELLER_NAME"=>$sellerName,
									"SELLER_URL"=>$sellerUrl,
									"SELLER_PRICE"=>$price,
									"SELLER_IMG"=>$sellerImg,
									"SELLER_SHIP_PRICE"=>$priceShipping,
									"TYPE"=> "FBA".$index
								) ;
							}
						}
			        }  
			        
			        $this->Task->saveFba($asin , $base , $details) ;
				}catch(Exception $e){}
				$html->clear() ;
				unset($html) ;
			}
			unset($snoopy) ;
		if($id == null ){
			$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		}
	}	
	
	public function fetchCompetions($asin = null,$id = null ){
		//try{
		
			$d = date("U") ;
			
			//http://www.amazon.com/gp/offer-listing/B00007GQLU?shipPromoFilter=1
			$url =  "http://www.amazon.com/gp/offer-listing/".$asin."?dd=$d"  ;
			
			//echo $url ;
			$snoopy = new Snoopy;
			
			$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";
			$snoopy->referer = "http://www.amazon.com/";

			if( $snoopy->fetch($url) ){
				
				$Result = $snoopy->results ;
				
				$html = new simple_html_dom();
				$html->load( $Result ,true ,false );
				try{
					//$html = file_get_html($url); 
					
					$h2s = $html->find("h2") ;
					
					$base = array('FM_NUM'=>'0','NM_NUM'=>'0','UM_NUM'=>'0') ;
					$details = array() ;
					
					foreach(  $html->find("h2") as $e){ 
						if( $e->plaintext == 'Featured Merchants' ) {//1-5 of 15 offers 
							$numberofresults =  $e->next_sibling ()->plaintext ;
							$ary = explode("of",$numberofresults) ;
							$_ = str_replace("offers","",$ary[1] ) ;
							$fmNum = trim( $_ ) ;
							$base["FM_NUM"] = $fmNum ;
							
							$detailTables = $e->parent ;
							while(true){
								if( $detailTables->class == "resultsheader" ){
									break ;
								}
								$detailTables = $detailTables->parent ;
							}
							
							$index = 0 ;
							foreach( $detailTables->next_sibling()->find(".result") as $table ){
								$price = $table->find(".price",0)->plaintext ;
								$priceShippingEl = $table->find(".price_shipping",0) ;
								
								$priceShipping = "0.00" ;
								if( $priceShippingEl!= null ){
									$priceShipping =  $priceShippingEl->plaintext ;
								}
								
								$sellerInformation = $table->find(".sellerInformation",0)  ;
								
								$baseInfo = $sellerInformation->find(".seller a",0) ;
								$sellerUrl= '' ;
								$sellerName = '' ;
								$sellerImg = '' ;
								if($baseInfo != null){
									$sellerUrl = $baseInfo->href ;
									$sellerName = $baseInfo->plaintext ;
								}else {
									$baseInfo = $sellerInformation->first_child() ;
									if($baseInfo->href !=null){
										$sellerUrl = $baseInfo->href ;
										$baseImage = $baseInfo->find("img",0) ;
										$sellerImg = $baseImage->src ;
										$sellerName = $baseImage->alt ;
									}else if($baseInfo->src != null){
										$sellerImg = $baseInfo->src ;
										$sellerName = $baseInfo->alt ;
									}
								}
								
								if($index == 0){
									$base["TARGET_PRICE"] = $price ;
								}
								
								$index++ ;
								$details[] = array("SELLER_NAME"=>$sellerName,
									"SELLER_URL"=>$sellerUrl,
									"SELLER_PRICE"=>$price,
									"SELLER_IMG"=>$sellerImg,
									"SELLER_SHIP_PRICE"=>$priceShipping,
									"TYPE"=> "F".$index
									) ;
							}
							
						}else if( $e->plaintext == 'New' ) {
							$numberofresults =  $e->next_sibling ()->plaintext ;
							$ary = explode("of",$numberofresults) ;
							$_ = str_replace("offers","",$ary[1] ) ;
							$nmNum = trim( $_ ) ;
							$base["NM_NUM"] = $nmNum ;
							
							$detailTables = $e->parent ;
							while(true){
								if( $detailTables->class == "resultsheader" ){
									break ;
								}
								$detailTables = $detailTables->parent ;
							}
							$index = 0 ;
							foreach( $detailTables->next_sibling()->find(".result") as $table ){
								$price = $table->find(".price",0)->plaintext ;
								$priceShipping =  $table->find(".price_shipping",0)->plaintext ;
								$sellerInformation = $table->find(".sellerInformation",0)  ;
								
								$baseInfo = $sellerInformation->find(".seller a",0) ;
								$sellerUrl= '' ;
								$sellerName = '' ;
								$sellerImg = '' ;
								if($baseInfo != null){
									$sellerUrl = $baseInfo->href ;
									$sellerName = $baseInfo->plaintext ;
								}else {
									$baseInfo = $sellerInformation->find("a",0) ;
									if($baseInfo !=null){
										$sellerUrl = $baseInfo->href ;
										$baseImage = $baseInfo->find("img",0) ;
										$sellerImg = $baseImage->src ;
										$sellerName = $baseImage->alt ;
									}
								}
								
								$index++ ;
								$details[] = array("SELLER_NAME"=>$sellerName,
									"SELLER_URL"=>$sellerUrl,
									"SELLER_PRICE"=>$price,
									"SELLER_IMG"=>$sellerImg,
									"SELLER_SHIP_PRICE"=>$priceShipping,
									"TYPE"=> "N".$index
									) ;
								
							}
							
						}else if( $e->plaintext == 'Used' ) {
							$numberofresults   = $e->next_sibling ()->plaintext ;
							$ary = explode("of",$numberofresults) ;
							$_ = str_replace("offers","",$ary[1] ) ;
							$umNum = trim( $_ ) ;
							$base["UM_NUM"] = $umNum ;
							
							$detailTables = $e->parent ;
							while(true){
								if( $detailTables->class == "resultsheader" ){
									break ;
								}
								$detailTables = $detailTables->parent ;
							}
							$index = 0 ;
							foreach( $detailTables->next_sibling()->find(".result") as $table ){
								$price = $table->find(".price",0)->plaintext ;
								$priceShipping =  $table->find(".price_shipping",0)->plaintext ;
								$sellerInformation = $table->find(".sellerInformation",0)  ;
								
								$baseInfo = $sellerInformation->find(".seller a",0) ;
								$sellerUrl= '' ;
								$sellerName = '' ;
								$sellerImg = '' ;
								if($baseInfo != null){
									$sellerUrl = $baseInfo->href ;
									$sellerName = $baseInfo->plaintext ;
								}else {
									$baseInfo = $sellerInformation->find("a",0) ;
									if($baseInfo !=null){
										$sellerUrl = $baseInfo->href ;
										$baseImage = $baseInfo->find("img",0) ;
										$sellerImg = $baseImage->src ;
										$sellerName = $baseImage->alt ;
									}
								}
								
								$index++ ;
								$details[] = array("SELLER_NAME"=>$sellerName,
									"SELLER_URL"=>$sellerUrl,
									"SELLER_PRICE"=>$price,
									"SELLER_IMG"=>$sellerImg,
									"SELLER_SHIP_PRICE"=>$priceShipping,
									"TYPE"=> "U".$index
									) ;
							}
						}
			        }  
			        
			        $this->Task->saveCompetions($asin , $base , $details) ;
				}catch(Exception $e){}
				$html->clear() ;
				unset($html) ;
			}
			unset($snoopy) ;
		//}catch(Exception $e){
		//	$this->Task->savelog($id,"get product[".$asin."] error:::".$e->getMessage()) ;	
		//}
		if($id == null ){
			$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		}
	}
	
	public function gatherAmazonCompetitions($id,$level){
		
		try{
			//获取商家产品asin
			$array = $this->Amazonaccount->getAccountProductsForLevel($id,$level) ;
			$index = 0 ;
			$this->Task->savelog($id, "start gather competition" );
			foreach( $array as $arr ){
				$index = $index + 1 ;
				$asin = $arr['sc_amazon_account_product']['ASIN'] ;
				$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] competitions" );
				$this->fetchCompetions($asin,$id ) ;
			}
			$this->Task->savelog($id, "end!" );
		
		}catch(Exception $e){
			$this->Task->savelog($id, "error::::".$e->getMessage() );
		}
		
		$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		
	}
	
	public function gatherAmazonFba($id,$level){
		//更新采集状态
		try{
			$array =  $this->Amazonaccount->getAccountProductsForLevel($id,$level) ;
			$index = 0 ;
			$this->Task->savelog($id, "start gather fba" );
			foreach( $array as $arr ){
				$index = $index + 1 ;
				$asin = $arr['sc_amazon_account_product']['ASIN'] ;
				$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] fba" );
				$this->fetchFba($asin,$id ) ;
			}
			$this->Task->savelog($id, "end!" );
		}catch(Exception $e){
			$this->Task->savelog($id, "error::::".$e->getMessage() );
		}
		
		$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		
	}
	
	/**
	 * 采集amazon账户产品
	 * $id 账户系统编号
	 * $code 账户CODE
	 */
	public function amazonAsin($id ,$level ){//
		try{
		
			$asintemplate = $this->Config->getAmazonConfig("AMAZON_ACCOUNT_PRODUCT_URL") ;
			$asinArray =  $this->Amazonaccount->getAccountProductsForLevel($id,$level) ;
			
			//开始采集产品信息
			$index = 0 ;
			foreach($asinArray as $_asin){
				$asin = $_asin['sc_amazon_account_product']['ASIN'] ;
				$index = $index + 1 ;
				$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] details" );
				echo $asin.'<br>' ;
				$this->fetchAsin($asin,$id) ;
			} 
			//采集产品信息结束
			$this->Task->savelog($id,"end!" );
		}catch(Exception $e){
			try{
				$this->Task->savelog($id, "error::::".$e->getMessage() );
			}catch(Exception $e){}
		}

$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
	}
	
	/**
	 * gather shipping info
	 */
	public function amazonShippingAsin($id , $level ){//
		
		$account = $this->Amazonaccount->getAccount($id) ;
		$account = $account[0]['sc_amazon_account'] ;
		
		try{
			//$this->Task->clearlog($id) ;
		
			$asintemplate = $this->Config->getAmazonConfig("AMAZON_ACCOUNT_PRODUCT_URL") ;
			$asinArray =  $this->Amazonaccount->getAccountProductsForLevel($id,$level) ;
			
			//开始采集产品信息
			$index = 0 ;
			foreach($asinArray as $_asin){
				
				$asin = $_asin['sc_amazon_account_product']['ASIN'] ;
				
				$condition = $_asin['sc_amazon_account_product']['ITEM_CONDITION'] ;
				$condition = $condition == 1?"used":"new" ;
				
				$index = $index + 1 ;
				$this->Task->savelog($id, "start get product[ index: ".$index." ][".$asin."] price" );
				$this->fetchAmazonAsin($_asin['sc_amazon_account_product']['SKU'],$asin,$account['CODE'],$condition,$asintemplate,$id ,$index) ;
				
			} 
			//采集产品信息结束
			$this->Task->savelog($id,"end!" );
		}catch(Exception $e){
			$this->Task->savelog($id, "error::::".$e->getMessage() );
		}
	$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
	}
	
	public function fetchAmazonAsin($sku,$asin,$code,$condition,$asintemplate=null,$id=null,$index = null) {
		try{
				$url = str_replace("{code}",$code,$asintemplate) ;
			    $url = str_replace("{asin}",$asin,$url) ;
			    $url = str_replace("{condition}",$condition,$url) ;

				$d = date("U") ;
				$url = $url."&dd=$d" ;
				
			$snoopy = new Snoopy;
			
			$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";
			$snoopy->referer = "http://www.amazon.com/";
			$snoopy->rawheaders['Pragma'] = 'no-cache' ;

			if( $snoopy->fetch($url) ){
			
				$Result = $snoopy->results ;

				$html = new simple_html_dom();
				$html->load( $Result  ,true ,false );
				
				try{
					$array['asin'] = $asin ;
					$array['sku'] = $sku ;
			
					$isFM = "" ;
					if($condition == "new"){
						if( $html->find(".buckettitle h2",0) != null ){
							$isFM = trim($html->find(".buckettitle h2",0)->plaintext) ;
							if( $isFM == "Featured Merchants" ){
								$isFM = "FM" ;
							}else{
								$isFM = "NEW" ;
							}
						}
					}
	
					$plusShippingText = "" ;
					if( $html->find(".result .price_shipping",0) != null ){
						$plusShippingText = trim($html->find(".result .price_shipping",0)->plaintext) ;
					}
					
					$priceText = "" ;
					if( $html->find(".result .price",0) != null ){
						$priceText = trim($html->find(".result .price",0)->plaintext) ;
					}
					
					$priceText = trim( str_replace(array("&nbsp;","+","Shipping","Free","shipping",'$'),"",$priceText) ) ;
					
					
					$plusShippingText = trim( str_replace(array("&nbsp;","+","Shipping","Free","shipping",'$'),"",$plusShippingText) ) ;
					
					$array['plusShippingText'] = $plusShippingText ;
					$array['priceText'] = $priceText ;
					$array['isFM'] = $isFM ;
		
					$this->Task->savelog($id," $isFM [$asin:$url]>>>>>"." $plusShippingText") ;	
					//更新产品基本信息
					$this->Task->updateAmazonProductShipping($array,$code,$id);
				}catch(Exception $e){
					pirnt_r($e) ;
					$this->Task->savelog($id,"get product[".$asin."] price failed:::: ".$e->getMessage()) ;	
				}
				$html->clear() ;
				unset($html) ;
				$this->Task->savelog($id,"get product[".$asin."] price success!") ;	
			}else{
				echo '<br>--------error----------<br>' ;
			}
			unset($snoopy) ;
		}catch( Exception $e){
			pirnt_r($e) ;
			$this->Task->savelog($id,"get product[".$asin."] price error:::".$e->getMessage()) ;	
		}
		
		/*if($id == null ){
			$this->response->type("json");
			$this->response->body("execute complete");
			return $this->response;
		}*/
	}
	
	/////////////////////////////////////////////////////
	function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }
	
	    return (substr($haystack, -$length) === $needle);
	}
}