<?php

require "../config.php";

$c_id = $_REQUEST['c_id'];

if($c_id != null){
	$sql_articles = "SELECT c_number FROM  `category` WHERE  `c_materialid` =  '$c_id'";
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	if($qry_result) {
		while($row = mysql_fetch_array($qry_result)){
			echo $row[c_number];
		}
	}
	else {
		echo -1;
	}
}
else {
	echo -1;
}
?>