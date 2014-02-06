<?php

require "../config.php";

$type = $_REQUEST['type'];
$name = $_REQUEST['name'];

if($type == 'ALL' and  $name != null){
	$sql_articles = "DELETE FROM supplies WHERE u_name = '$name'";
	if(mysql_query($sql_articles)) {
		echo "YES";
	}
	else {
		echo "NO";
	}
}
else{
	if(isset($_POST['delete_id'])) {
		$sql_articles = "DELETE FROM supplies WHERE no = ".$_POST['delete_id'];
		if(mysql_query($sql_articles)) {
			echo "YES";
		}
		else {
			echo "NO";
		}
	}
	else {
		echo "FAIL";
	}
}
?>