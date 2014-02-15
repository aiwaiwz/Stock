<?php

require "../config.php";

$type = $_REQUEST['type'];
$w_id = $_REQUEST['w_id'];

$date = date('Y-m-d');

$op = false;

if($type == 'yes'){
	$op = true;
	$sql_articles = "UPDATE `widenid` SET status = 'อนุมัติ' ,  end_order = '$date'  WHERE w_id ='$w_id'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}
else{
	$sql_articles = "UPDATE `widenid` SET status = 'ยกเลิกรายการ'  , end_order = '$date' WHERE w_id ='$w_id'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}

$querys = "SELECT widenmaterial.id, widenmaterial.name , widenmaterial.number , category.c_number 
		FROM  `widenmaterial` 
		INNER JOIN category 
		ON widenmaterial.id = category.c_materialid
		AND widenmaterial.`w_id` = '$w_id'";
		
$qry_results = mysql_query($querys) or die(mysql_error());
		
while($rows = mysql_fetch_array($qry_results)){
	$remain = $rows[number] ;
	if($op == true && $rows[c_number] >= $rows[number] ){ // set remove remain
		$remain = $rows[c_number] - $rows[number];
	}
	elseif ($op == false) {
		$remain = $rows[c_number] + $rows[number];
	}
	
	$sql_articles = "UPDATE `category` SET c_number = '$remain' WHERE c_materialid ='$rows[id]'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}


?>