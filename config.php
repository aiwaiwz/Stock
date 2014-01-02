<?php
	
//Setting database host
$dbhost = "localhost";
//Setting database user name
$dbuser = "root";
//Setting database password
$dbpass = "1234";
//Setting database name
$dbname = "ajax";

//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass) or die("Error Connect to Database");
//Select Database
mysql_select_db($dbname) or die(mysql_error());
//Setting query with UTF-8
mysql_query("SET NAMES UTF8");

?>