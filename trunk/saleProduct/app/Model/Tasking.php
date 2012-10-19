<?php

/**
 * 正在执行任务管理
 */
class Tasking extends AppModel {
	var $useTable = "sc_tasking" ;
	
	/**
	 * 开始执行任务
	 * 
	 * 通过插入数据库标记任务开始
	 */
	public function start( $type , $asin , $accountId){
		$sql = "insert sc_tasking(task_type,asin,account_id,start_time,executor,message)
			values('$type','$asin','$accountId',NOW(),'','开始执行...')" ;
			
		$this->query($sql) ;
	}
	
	public function setStep($type , $asin , $accountId , $message){
		$sql = "update sc_tasking set message = '$message' 
				where task_type ='$type' and asin='$asin' and account_id = $accountId " ;
		$this->query($sql) ;
	}
	
	public function isStop($type , $asin , $accountId){
		$sql = "select * from sc_tasking 
			 		where task_type ='$type' and asin='$asin' and account_id = $accountId " ;
		
		$db =& ConnectionManager::getDataSource($this->useDbConfig);
		$db->_queryCache[$sql] = null ;
		$s = $this->query($sql) ;
		if( count($s) >= 1 ){
			$stopFlag = $s[0]['sc_tasking']['FORCE_STOP'] ;
			return $stopFlag === 1 || $stopFlag === '1' ;
		}
		return false ;
	}
	
	/**
	 * 判断当前任务状态
	 */
	public function status($type , $asin , $accountId){
		$sql = "select * from sc_tasking 
			 		where task_type ='$type' and asin='$asin' and account_id = '$accountId'" ;
		$s = $this->query($sql) ;
		if(count($s) >= 1){
			return true ;
		}
		return false ;
	}
	
	public function getTasking($type , $asin , $accountId){
		$sql = "select * from sc_tasking 
			 		where task_type ='$type' and asin='$asin' and account_id = '$accountId'" ;
		$s = $this->query($sql) ;
		if(count($s) >= 1){
			return $s[0]['sc_tasking'] ;
		}
		return null ;
	}
	
	public function getLastGatherTask($type, $asin , $accountId){
		$sql = "select * from sc_tasked where
				 task_type ='$type' and asin='$asin' and account_id = '$accountId' order by id desc  LIMIT 0,1" ;
		$last = $this->query($sql) ;
		if(count($last) > 0 ){
			return $last[0]['sc_tasked'] ;
		}
		return null ;
	}
	
	/**
	 * 停止执行任务
	 */
	public function stop($type , $asin , $accountId){
		$sql = "insert into sc_tasked select sc_tasking.* , NOW() as end_time from sc_tasking
					where task_type ='$type' and asin='$asin' and account_id = '$accountId'" ;
	 	$this->query($sql) ;
		
		$sql = "delete from sc_tasking
				where task_type ='$type' and asin='$asin' and account_id = '$accountId'" ;
		$this->query($sql) ;
	}
	
	public function stopByFront($id){
		$sql = "update sc_tasking set force_stop = '1'
				where id = '$id'" ;
		$this->query($sql) ;
	}
	
	/**
	 * 列出所有的任务
	 */
	public function listAll($accountId = null){
		$condition = "" ;
		if(empty($accountId)){
			
		}else{
			$condition = " and  account_id = '$accountId' " ;
		}
		
		$sql = "select * from sc_tasking,sc_tasking_type where sc_tasking.task_type = sc_tasking_type.code $condition" ;
		return $this->query($sql) ;
	}
	
	//////////////////
	function getTaskingRecords($query=null){
		$domain =  $_SERVER['SERVER_NAME'] ;
		
		$limit =  $query["limit"] ;
		$curPage =  $query["curPage"] ;
		$start =  $query["start"] ;
		$end =  $query["end"] ;
		
		$sql = "SELECT sc_tasking.* , sc_tasking_type.name
		FROM sc_tasking,sc_tasking_type where sc_tasking.task_type = sc_tasking_type.code
		limit ".$start.",".$limit;
		$array = $this->query($sql);
		return $array ;
	}

	function getTaskingCount($query=null){
		$domain =  $_SERVER['SERVER_NAME'] ;
		$sql = "SELECT count(*) FROM sc_tasking,sc_tasking_type where sc_tasking.task_type = sc_tasking_type.code";
		$array = $this->query($sql);
		return $array ;
	}
	
	function getTaskedRecords($query=null){
		$limit =  $query["limit"] ;
		$curPage =  $query["curPage"] ;
		$start =  $query["start"] ;
		$end =  $query["end"] ;
		
		$sql = "SELECT sc_tasked.* , sc_tasking_type.NAME
		FROM sc_tasked,sc_tasking_type where sc_tasked.task_type = sc_tasking_type.code
		limit ".$start.",".$limit;
		$array = $this->query($sql);
		return $array ;
	}

	function getTaskedCount($query=null){
		$sql = "SELECT count(*) FROM sc_tasked,sc_tasking_type where sc_tasked.task_type = sc_tasking_type.code";
		$array = $this->query($sql);
		return $array ;
	}
}