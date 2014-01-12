<?php

require "config.php";

$name = $_GET['name'];
$type = $_GET['type'];
$project = $_GET['project'];
$activity = $_GET['activity'];
$date_st = $_GET['date_st'];
$date_nd = $_GET['date_nd'];

if($name != null and $type != null){
	$w_id = 1 ;
	$sql_articles = "SELECT MAX(`w_id`) AS w_id FROM  `widenmaterial`";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){
		$w_id = $row[w_id] + 1;
		echo $w_id;
	}

	$sql_articles = "SELECT * FROM `test` WHERE `u_name` = '$name'";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){
		$query = "INSERT INTO  `widenmaterial` ( `w_id`, `no`        , `id`       ,`name`       ,`number`       ,`price`       ,`amount`         ,`u_name`)
										  VALUES ( '$w_id',  '$row[no]' , '$row[id]' ,'$row[name]' , '$row[number]', '$row[price]', '$row[amount]' , '$row[u_name]' );";
		if(mysql_query($query)) {
		echo "YES";
		}
		else {
			echo "NO";
		}
	}
	
	
	$u_id = 0;
	$sql_articles = "SELECT id FROM `users` WHERE `username` = '$name'";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){
		$u_id = $row[id];
	}
	
	$date = date('Y-m-d');
	
	$query = "INSERT INTO  `objective` (`o_id` ,`o_type` ,`o_project` ,`o_activity` ,`o_date_st` , `o_date_nd`)
			VALUES (   NULL ,  '$type',  '$project',  '$activity' ,  '$date_st' ,  '$date_nd' );";
	$qry_result = mysql_query($query) or die(mysql_error());
	
	$o_id = 0 ;
	
	$sql_articles = "SELECT MAX(o_id) AS id FROM `objective` ";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){
		$o_id = $row[id];
	}
	
	$query = "INSERT INTO  `widenid` (`id_widen` ,`date_widen` ,`u_id` ,`w_id` ,`o_id`)
			VALUES (   NULL ,  '$date',  '$u_id',  '$w_id' ,  '$o_id' );";
	$qry_result = mysql_query($query) or die(mysql_error());

}	
	
	
?>