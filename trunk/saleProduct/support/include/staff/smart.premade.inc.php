<?php
if(!defined('OSTSCPINC') or !is_object($thisuser) or !$thisuser->canManageKb()) die('Access Denied');

//List premade answers.
$select='SELECT premade.*,dept_name ';
$from='FROM '.KB_PREMADE_TABLE.' premade LEFT JOIN '.DEPT_TABLE.' USING(dept_id) ';

//make sure the search query is 3 chars min...defaults to no query with warning message
$hasWhere = false ;
if($_REQUEST['a']=='search') {
    if(!$_REQUEST['query'] || strlen($_REQUEST['query'])<3) {
        $errors['err']='Search term must be more than 3 chars';
    }else{
        //fulltext search.
        $search=true;
        $qstr.='&a='.urlencode($_REQUEST['a']);
        $qstr.='&query='.urlencode($_REQUEST['query']);
        $where=' WHERE ( MATCH(title,answer,description) AGAINST ('.db_input($_REQUEST['query']).') or description like \'%'.$_REQUEST['query'].'%\')';
        if($_REQUEST['dept'])
            $where.=' AND dept_id='.db_input($_REQUEST['dept']);
        $hasWhere = true ;
    }
}
if( $_REQUEST['categoryId'] ){
	$wprefix = $hasWhere?" and ":" where " ;
	$categoryId = $_REQUEST['categoryId']  ;
	$where .= $wprefix."premade.premade_id IN (
			SELECT opc.premade_id FROM ost_premade_category opc WHERE opc.category_id = '$categoryId'
		) " ;
}
/**
  premade.premade_id IN (
	SELECT opc.premade_id FROM ost_premade_category opc WHERE opc.category_id = '47'
) 
 */

//I admit this crap sucks...but who cares??
$sortOptions=array('createdate'=>'premade.created','updatedate'=>'premade.updated','title'=>'premade.title');
$orderWays=array('DESC'=>'DESC','ASC'=>'ASC');
//Sorting options...
if($_REQUEST['sort']) {
    $order_column =$sortOptions[$_REQUEST['sort']];
}

if($_REQUEST['order']) {
    $order=$orderWays[$_REQUEST['order']];
}


$order_column=$order_column?$order_column:'premade.title';
$order=$order?$order:'DESC';

$order_by=$search?'':" ORDER BY $order_column $order ";
$order_by=' order by no';

$total=db_count('SELECT count(*) '.$from.' '.$where);
$pagelimit= 200 ;//$thisuser->getPageLimit(); //硬编码
$pagelimit=$pagelimit?$pagelimit:PAGE_LIMIT; //true default...if all fails.
$page=($_GET['p'] && is_numeric($_GET['p']))?$_GET['p']:1;
$pageNav=new Pagenate($total,$page,$pagelimit);
$pageNav->setURL('smart.kb.php',$qstr.'&sort='.urlencode($_REQUEST['sort']).'&order='.urlencode($_REQUEST['order']));
//Ok..lets roll...create the actual query
$query="$select $from $where $order_by LIMIT ".$pageNav->getStart().",".$pageNav->getLimit();
//echo $query;

$replies = db_query($query);

$showing=db_num_rows($replies)?$pageNav->showing():'';
$results_type=($search)?'Search Results':'Premade/Canned Replies';
$negorder=$order=='DESC'?'ASC':'DESC'; //Negate the sorting..
?>
<div class="row-fluid">
		<div class="span2">
		<script>
			function treeNodeClick( $classId ){
					window.location.href = "smart.kb.php?categoryId="+$classId;
			}
		</script>
				<?
                $class_sql='SELECT * FROM ost_category order by ordernum';
                $class=db_query($class_sql);
                if($class && db_num_rows($class)) {
                    ?>
      		<?
                    $tempTreeStr="<script type=\"text/javascript\">d = new dTree('d');d.add(0,-1,'Category');";
                    if(!empty($_REQUEST['keyword'])) {
                        $tempTreeStr=$tempTreeStr.'d.closeAll();';
                    }
                    while(list($classId,$name,$parentId)=db_fetch_row($class)) {
                    	$checkbox = "" ;
                        $tempTreeStr=$tempTreeStr."d.add($classId,$parentId,'&nbsp;$checkbox $name','javascript:treeNodeClick(".$classId.")');";

//                        $tempTreeStr=$tempTreeStr."d.add($classId,$parentId,'&nbsp;$checkbox $name','javascript:dchgeaa(".$classId.")');";
                    }
                    $tempTreeStr=$tempTreeStr."document.write(d);</script>";
                    echo $tempTreeStr;
                }
                ?>
		</div>
		<div class="span10">
					
						<div>
						    <?if($errors['err']) {?>
						        <p align="center" id="errormessage"><?=$errors['err']?></p>
						    <?}elseif($msg) {?>
						        <p align="center" id="infomessage"><?=$msg?></p>
						    <?}elseif($warn) {?>
						        <p id="warnmessage"><?=$warn?></p>
						    <?}?>
						</div>
						<div align="left">
						    <form action="kb.php" method="GET" >
						    <input type='hidden' name='a' value='search'>
						    Search for:&nbsp;<input type="text" name="query" value="<?=Format::htmlchars($_REQUEST['query'])?>">
						    category
						    <select name="dept">
						            <option value=0>All Departments</option>
						            <?
						            $depts= db_query('SELECT dept_id,dept_name FROM '.DEPT_TABLE.' WHERE dept_id!='.db_input($ticket['dept_id']));
						            while (list($deptId,$deptName) = db_fetch_row($depts)){
						                $selected = ($_GET['dept']==$deptId)?'selected':''; ?>
						                <option value="<?=$deptId?>"<?=$selected?>>&nbsp;&nbsp;<?=$deptName?></option>
						           <?}?>
						    </select>
						    &nbsp;
						    <input type="submit" name="search" class="button" value="GO">
						    <?php
						    $one = db_query("select isadmin from ost_staff where username='".$_SESSION['_staff']['userID']."'");
						    $row = db_fetch_row($one);
						    if($row[0]==1) {
						        ?>
						    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="export.php?type=all" target="_blank">Export</a>
						    <?php
						    }
						    ?>
						    <!--
						    &nbsp;&nbsp;&nbsp;&nbsp;<a href="">Export Selected</a>
						    -->
						    </form>
						</div>
						<div class="msg"><?=$result_type?>&nbsp;<?=$showing?></div>
						<table width="100%" border="0" cellspacing=1 cellpadding=2>
						   <form action="kb.php" method="POST" name="premade" onSubmit="return checkbox_checker(document.forms['premade'],1,0);">
						   <input type=hidden name='a' value='process'>
						   <tr><td>
						     <table border="0" cellspacing=0 cellpadding=2 class="dtable" align="center" width="100%">
						        <tr>
							        <th width="7px">&nbsp;</th>
						                <th width=30>No</th>
							        <th width=300>Description</th>
						                <th><a href="smart.kb.php?sort=title&order=<?=$negorder?><?=$qstr?>" title="Sort By Title <?=$negorder?>">Reply Title</a></th>
						                <th width=50>Status</th>
							        <th width=100>Category/Dept</th>
							        <!--
						                <th width=150 nowrap>
						                <a href="kb.php?sort=updatedate&order=<?=$negorder?><?=$qstr?>" title="Sort By Update Date <?=$negorder?>">Last Updated</a></th>
						                -->
						        </tr>
						        <?
						        $class = 'row1';
						        $total=0;
						        $grps=($errors && is_array($_POST['grps']))?$_POST['grps']:null;
						        if($replies && db_num_rows($replies)):
						            while ($row = db_fetch_array($replies)) {
						                $sel=false;
						                if($canned && in_array($row['premade_id'],$canned)){
						                    $class="$class highlight";
						                    $sel=true;
						                }elseif($replyID && $replyID==$row['premade_id']) {
						                    $class="$class highlight";
						                }
						                ?>
						            <tr class="<?=$class?>" id="<?=$row['premade_id']?>">
						                <td width=7px>
						                  <input type="checkbox" name="canned[]" value="<?=$row['premade_id']?>" <?=$sel?'checked':''?> 
						                        onClick="highLight(this.value,this.checked);">
						                </td>
						                  <td width=50><?=$row['no']?></td>
						                  <td><a href="smart.kb.php?id=<?=$row['premade_id']?>"><?=Format::htmlchars(Format::truncate($row['description'],100))?></a></td>
						                <td><?=Format::htmlchars(Format::truncate($row['title'],50))?></td>
						                <td><b><?=$row['isenabled']?'Active':'Disabled'?></b></td>
						                <td><?=$row['dept_name']?Format::htmlchars($row['dept_name']):'All Departments'?></td>
						                <!--
						                <td><?=Format::db_datetime($row['updated'])?></td>
						                -->
						            </tr>
						            <?
						            $class = ($class =='row2') ?'row1':'row2';
						            } //end of while.
						        else: //nothin' found!! ?> 
						            <tr class="<?=$class?>"><td colspan=6><b>Query returned 0 results</b></td></tr>
						        <?
						        endif; ?>
						    </table>
						   </td></tr>
						   <?
						   if(db_num_rows($replies)>0): //Show options..
						    ?>
						   <tr><td style="padding-left:20px">
						        Select:&nbsp;
						        <a href="#" onclick="return select_all(document.forms['premade'],true)">All</a>&nbsp;
						        <a href="#" onclick="return toogle_all(document.forms['premade'],true)">Toggle</a>&nbsp;
						        <a href="#" onclick="return reset_all(document.forms['premade'])">None</a>&nbsp;
						        &nbsp;page:<?=$pageNav->getPageLinks()?>&nbsp;
						    </td></td>
						    <tr><td align="center">
						            <input class="button" type="submit" name="enable" value="Enable" 
						                onClick='return confirm("Are you sure you want to ENABLE selected entries?");'>
						            <input class="button" type="submit" name="disable" value="Disable" 
						                onClick='return confirm("Are you sure you want to DISABLE selected entries?");'>
						            <input class="button" type="submit" name="delete" value="Delete" 
						                onClick='return confirm("Are you sure you want to DELETE selected entries?");'>
						    </td></td>
						    <?
						    endif;
						    ?>
						   </form>
						 </table>
		</div>
</div>
