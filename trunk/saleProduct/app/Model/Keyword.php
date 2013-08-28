<?php
ignore_user_abort(1);
set_time_limit(0);

ini_set("memory_limit", "62M");
ini_set("post_max_size", "24M");

class Keyword extends AppModel {
	var $useTable = "sc_keyword_plan" ;
	 
	public function saveNiceDev($params){
		$this->exeSql("sql_keyword_update", $params) ;
		
		if( isset( $params['memo'] ) ){
			$this->exeSql("INSERT INTO sc_keyword_track 
					(
					keyword_id, 
					description,
					creator, 
					create_date
					)
					VALUES
					(
					'{@#keyword_id#}', 
					'{@#memo#}', 
					'{@#loginId#}', 
					NOW()
					)", $params) ;
		}
	}
	
	public function savePlan( $params ){
		
		if( isset( $params['id'] ) && !empty($params['id'] ) ){//update
			$this->exeSql("sql_keyword_plan_update", $params) ;
		}else{//insert
			$params['guid'] = $this->create_guid() ;
			$this->exeSql("sql_keyword_plan_insert", $params) ;
		}
	}
	
	public function saveTask( $params ){
	
		if( isset( $params['id'] ) && !empty($params['id'] ) ){//update
			$this->exeSql("sql_keyword_task_update", $params) ;
		}else{//insert
			$params['guid'] = $this->create_guid() ;
			$this->exeSql("sql_keyword_task_insert", $params) ;
		}
	}
	
	public function fetchSearchData($url , $limit , $offset ,$params ,$mainGuid , $count,$keywordType){
		$_url = str_replace("{limit}", $limit, $url ) ;
		$_url = str_replace("{offset}", $offset, $_url ) ;
		
		$content = file_get_contents($_url) ;
		
		$content = split("\n", $content) ;
		$index =0 ;
		//display_limit
		//display_offset
		foreach($content as $c){
			if($index > 0){
				$array = split(";",$c ) ;
				$record = array() ;
				$record['guid'] = $this->create_guid() ;
				$record['taskId'] = $params['taskId'] ;
				$record['loginId'] = $params['loginId'] ;
				$record['is_main_keyword'] = '0' ;
				$record['keyword_type'] =$keywordType;
		
				$record['keyword'] = $array[0] ;
				$record['search_volume'] = $array[1] ;
				$record['cpc'] = $array[2] ;
				$record['competition'] = $array[3] ;
				$record['result_num'] = $array[4] ;
				$record['trends'] = $array[5] ;
				$record['parent_id'] = $mainGuid ;
				$record['site'] = $params['site'] ;
		
				//判断keyword是否存在，如果存在则不考虑
				//$result = $this->getObject("select * from sc_keyword where task_id = '{@#taskId#}' and keyword = '{@#keyword#}' ", $record) ;
				//if(empty($result)){
					try{
						//debug($record) ;
						$this->exeSql("sql_keyword_insert", $record) ;
						$count++ ;
					}catch(Exception $e){}
				//}
			}
			$index++;
		}
		
		if( $index > 100 ){
			$this->fetchSearchData($url , 100+$limit , $limit ,$params ,$mainGuid , $count,$keywordType) ;
		}
	}
	
	/**
	 * 通过主关键字获取对应的子关键字
	 * 
	 * @param unknown_type $params
	 */
	public function fetchChildKeyWords($params){
		$count = 0 ;
		ob_start() ;
		$keywordId = null ;
		if( isset($params['keywordId']) ){
			$keywordId = $params['keywordId'] ;
		}
		
		$site = $params['site'] ;
		
		$mainKeyword = $params['mainKeyword'] ;
		$mainKeyword = urlencode($mainKeyword) ;
		$parseMatchUrl = "http://$site.fullsearch-api.semrush.com/?action=report&type=phrase_fullsearch&phrase=$mainKeyword&key=240ada68082b9ad767ef984a0cfde07c&display_limit={limit}&display_offset={offset}&export=api&export_columns=Ph,Nq,Cp,Co,Nr,Td" ;
		$relationUrl = "http://$site.api.semrush.com/?action=report&type=phrase_related&key=240ada68082b9ad767ef984a0cfde07c&display_limit={limit}&display_offset={offset}&export=api&export_columns=Ph,Nq,Cp,Co,Nr,Td&phrase=$mainKeyword" ;
		$orgUrl = "http://$site.api.semrush.com/?action=report&type=phrase_organic&key=240ada68082b9ad767ef984a0cfde07c&display_limit=100&export=api&export_columns=Dn,Ur&phrase=$mainKeyword" ;
		
		//保存主关键字
		$mainGuid = null ;
		if( empty($keywordId) ){
			$mainGuid = $this->create_guid() ;
			
			$record = array() ;
			$record['guid'] = $mainGuid ;
			$record['taskId'] = $params['taskId'] ;
			$record['loginId'] = $params['loginId'] ;
			$record['is_main_keyword'] = '1' ;
			$record['keyword'] = $mainKeyword ;
			$record['site'] = $site ;
			
			$this->exeSql("INSERT INTO sc_keyword 
				(keyword_id, 
				task_id, 
				keyword, 
				is_main_keyword, 
				parent_id, 
				STATUS, 
				create_date, 
				creator,
				site
				)
				VALUES
				('{@#guid#}', 
				'{@#taskId#}', 
				'{@#keyword#}', 
				'{@#is_main_keyword#}', 
				'{@#parent_id#}', 
				'10', 
				NOW(), 
				'{@#loginId#}',
				'{@#site#}'
				)", $record) ;
		}else{
			$mainGuid = $keywordId ;
			//更新设置当前关键字为主关键字
			$this->exeSql("update sc_keyword set is_main_keyword = '1' where keyword_id = '{@#keywordId#}'", array('keywordId'=>$mainGuid));
		}
		
		$this->fetchSearchData($parseMatchUrl , 100 , 0 ,$params ,$mainGuid , $count , "Pharse") ;
		//保存词组匹配
		$this->fetchSearchData($relationUrl , 100 , 0 ,$params ,$mainGuid , $count , "Relation" ) ;
	
		//保存关联网站，关联到主关键字
		$content3 = file_get_contents($orgUrl) ;
		$content3 = split("\n", $content3) ;
		$index =0 ;
		foreach($content3 as $c){
			if($index > 0){
				$array = split(";",$c ) ;
				$record = array() ;
				$record['guid'] = $this->create_guid() ;
				
				$record['domain1'] = $array[0] ;
				$record['url'] = $array[1] ;
				$record['mainGuid'] = $mainGuid ;
				$this->exeSql("sql_keyword_website_insert", $record) ;
			}
			$index++;
		}
		ob_clean() ;
		return $count ;
	}
	
	public function loadMainKeywords( $params ){
		$sql = "select t.* ,
						(select count(1) from sc_keyword sk where sk.parent_id = t.keyword_id ) as c
					from sc_keyword t 
					where t.task_id='{@#taskId#}' and t.is_main_keyword = 1 order by t.keyword_no" ;
		
		return $this->exeSqlWithFormat( $sql , array('taskId'=>$params['taskId'])) ;
	}
	
	public function loadChildKeywords( $params ){
		$sql = "select t.* ,
						(select count(1) from sc_keyword sk where sk.parent_id = t.keyword_id ) as c
					from sc_keyword t
					where t.parent_id='{@#parentId#}'  order by t.keyword_no" ;
	
		return $this->exeSqlWithFormat( $sql , array('parentId'=>$params['parentId'])) ;
	}
	
	public function filterKeyword($params){
		$taskId = $params['taskId'] ;
		
		$searchContent = $params['search_content'] ;//search_content
		
		$array = explode("|", $searchContent) ;
		$qc = "" ;
		if( count($array) > 1 ){
			foreach($array as $a){
				if( !empty($a) ){
					$a = mysql_escape_string($a) ;
					if( $qc == "" ){
						$qc = " keyword not like '%$a%' " ;
					}else{
						$qc .= " and keyword not like '%$a%' " ;
					}
				}
			}
		}else{
			$array = explode(",", $searchContent) ;
			foreach($array as $a){
				if( !empty($a) ){
					$a = mysql_escape_string($a) ;
					if( $qc == "" ){
						$qc = " keyword not like '%$a%' " ;
					}else{
						$qc .= " or keyword not like '%$a%' " ;
					}
				}
			}
		}
		
		$isNull = true ;
		if( !empty( $params['search_volume'] ) ){
			$isNull = false ;
		}else if( !empty( $params['cpc'] ) ){
			$isNull = false ;
		}else if( !empty( $params['competition'] ) ){
			$isNull = false ;
		}else if( !empty( $params['result_num'] ) ){
			$isNull = false ;
		}else if( !empty( $qc ) ){
			$isNull = false ;
		}
		
		$params['searchContent'] = $qc ;
		
		if(!$isNull)$this->exeSql("sql_filter_keywords_15", $params) ;
	}
	
	public function setToNiche($params){
		$sql = "update sc_keyword set is_niche = '1' where keyword_id = '".$params['keywordId']."'" ;
		$this->exeSql($sql, array()) ;		
	}
	
	public function getWebSite($params){
		$keywordId = $params['keywordId'] ;
		$sql = "SELECT DISTINCT domain,url FROM sc_keyword_website 
				WHERE keyword_id = '{@#keywordId#}'
				OR keyword_id IN (
				  SELECT parent_id FROM sc_keyword WHERE keyword_id = '{@#keywordId#}'
				)" ;
		return $this->exeSqlWithFormat($sql, $params) ;
	}
}