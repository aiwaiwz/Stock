<?php

require "../config.php";

$type = $_REQUEST['type'];
$w_id = $_REQUEST['w_id'];

$date = date('Y-m-d');

if($type == 'yes'){

	$sql_articles = "UPDATE `widenid` SET status = 'อนุมัติ' ,  end_order = '$date'  WHERE w_id ='$w_id'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}
else{
	$sql_articles = "UPDATE `widenid` SET status = 'ไม่อนุมัติ'  , end_order = '$date' WHERE w_id ='$w_id'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}
?>