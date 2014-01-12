<?php

require "config.php";

$w_id = $_GET['w_id'];

if($w_id != null ){

	//build query
	$query = "SELECT * FROM `widenmaterial` WHERE `w_id`= '$w_id' order by no";

	$qry_result = mysql_query($query) or die(mysql_error());
		
	//Build Result String
	$display_string = '<table class="table">';
	$display_string .= '<tr class="active">';
	$display_string .= "<th>ลำดับที่	</th>";
	$display_string .= "<th>รหัสวัสดุ</th>";
	$display_string .= "<th>ชื่อวัสดุ</th>";
	$display_string .= "<th>จำนวน</th>";
	$display_string .= "<th>ราคาต่อหน่วย</th>";
	$display_string .= "<th>รวมเป็นเงิน</th>";
	$display_string .= "</tr>";

	// Insert a new row in the table for each person returned
	$tmpCount = 1 ;
	$sumamount= 0 ;
	while($row = mysql_fetch_array($qry_result)){
		$display_string .= "<tr>";
		//$display_string .= "<td>$row[no]</td>";
		$display_string .= "<td>$tmpCount</td>";
		$display_string .= "<td>$row[id]</td>";
		$display_string .= "<td>$row[name]</td>";
		$display_string .= "<td>$row[number]</td>";
		$display_string .= "<td>$row[price]</td>";
		$display_string .= "<td>$row[amount]</td>";
		$display_string .= "</tr>";
		$tmpCount ++;
		$sumamount = $sumamount + $row[amount];
	}

	$display_string .= "<tr>";
	$display_string .= "<td></td>";
	$display_string .= "<td></td>";
	$display_string .= "<td>รวมเป็นเงินทั้งสิ้น</td>";
	$display_string .= "<td></td>";
	$display_string .= "<td></td>";
	$display_string .= "<td>$sumamount</td>";
	$display_string .= '<td></td>';
	$display_string .= "</tr>";

	//echo "Query: " . $query . "<br />";
	$display_string .= "</table>";
	echo $display_string;	
	
}
?>