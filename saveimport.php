<?php

require "config.php";


function getValueLast($c_id){
	$temp = 0;
	$sql_articles = "SELECT c_number FROM `category` WHERE `c_materialid` = '$c_id'";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){
		$temp = $row[c_number];
	}
	return $temp ;
}


$name = $_GET['name'];


if($name != null ){

	$sql_articles = "SELECT * FROM  `supplies`  WHERE `u_name` = '$name'";	
	$qry_result = mysql_query($sql_articles) or die(mysql_error());
	while($row = mysql_fetch_array($qry_result)){


		$newValue = getValueLast($row[c_materialid]) + $row[s_number];

		$query = "UPDATE `category` SET c_number = '$newValue' WHERE c_materialid = '$row[c_materialid]' ";

		if(mysql_query($query)) {
		echo "YES";
		}
		else {
			echo "NO";
		}
	}
}	
	
?>