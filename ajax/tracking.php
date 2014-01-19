<?php

require "../config.php";

function DateThai($strDate)
{
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
	
	//build query
	$query = "SELECT * FROM `objective` WHERE `o_id` = (SELECT `o_id` FROM  widenid WHERE w_id = '$w_id' )";
	//"SELECT * FROM `widenmaterial` WHERE `w_id`= '$w_id' order by no";
	$qry_result = mysql_query($query) or die(mysql_error());
	
		
	echo '<br>';
	
	while($row = mysql_fetch_array($qry_result)){
		$display = $row[o_type];
		
		$objective = "";
		if($row[o_type] == 0){
			$objective = "กรณีใช้ภายในสำนักงาน";
			echo '<h5>วัตถุประสงค์ในการเบิก<a style="padding-left: 50px"></a>'.$objective.'</h5><br>' ;
		}
		else{
			$objective = "กรณีเบิกใช้ภายในโครงการ".$row[o_project];
			echo '<h5>วัตถุประสงค์ในการเบิก<a style="padding-left: 45px"></a>'.$objective.'</h5>' ;
			echo '<h5>ภายใต้กิจกรรม<a style="padding-left: 90px"></a>'.$row[o_activity].'</h5>';
			echo '<h5>ระหว่างวันที่<a style="padding-left: 105px"></a>ระหว่างวันที่ '.DateThai($row[o_date_st]).' ถึง '.DateThai($row[o_date_nd]).'</h5><br>';
		}
	}	
}
?>