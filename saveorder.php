<?php

require "config.php";

$name = $_GET['name'];

if($name != null){
	$w_id = 1 ;
	$sql_articles = "SELECT MAX(`w_id` ) AS w_id FROM  `widenmaterial`";	
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
	//$qry_result = mysql_query($query) or die(mysql_error());
}	
	//$query = "INSERT INTO  `widenid` (`id_widen` ,`date_widen` ,`u_id` ,`w_id`)
	//		VALUES (   NULL ,  '$id',  '$name',  '$namber' );";
	//$qry_result = mysql_query($query) or die(mysql_error());
	
?>