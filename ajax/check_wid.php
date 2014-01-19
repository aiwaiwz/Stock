<?php

require "../config.php";

$id_widen = $_GET['id_widen'];
$type= $_GET['type'];


function DateThai($strDate){
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}

$query = "SELECT  `date_widen` , `w_id` FROM  `widenid` WHERE  `id_widen` ='".$id_widen."'";
$qry_result = mysql_query($query) or die(mysql_error());					
$w_id = "";
$date_widen = "";

while($row = mysql_fetch_array($qry_result)){
	$w_id = $row[w_id];
	$date_widen = $row[date_widen];
}

if($type == 'date'){
	echo '<h5> วัน/เดือน/ปี <a style="padding-left: 50px">'.DateThai($date_widen).'</a></h5>';
}
elseif($type == 'year'){
	echo $strYear = date("Y",strtotime($date_widen))+543;
}
else{
	echo $w_id;
}
?>
