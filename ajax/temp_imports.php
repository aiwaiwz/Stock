<script>

$(function(){
   $(".myclass").click(function(){
	if (confirm("Do you want to delete")){
		
		var del_id = $(this).attr('id');
		var rowElement = $(this).parent().parent(); //grab the row
		$.ajax({
		type: "post",
		url: "order/deleteimport.php",
		data : {'delete_id': del_id},
		success: function(){
			rowElement.slideUp('slow', function() {$(this).remove();});
		}
		});
		
      return false;
    }   
	   
	});
 });  
	   
</script>


<?php

require "../config.php";

$c_materialid = $_GET['materialid'];
$s_number = $_GET['number'];
$u_name = $_GET['username'];

if($c_materialid != null and $s_number != null and $u_name != null){
	
	//add data
	$query = "INSERT INTO  `supplies` (`c_materialid` ,`s_number` ,`u_name` )
			VALUES ( '$c_materialid',  '$s_number',  '$u_name' );";
	$qry_result = mysql_query($query) or die(mysql_error());
}

//build query
$query = "SELECT supplies.`no` ,supplies.`c_materialid` , category.`c_materialname` , supplies.`s_number`  
FROM  `supplies` 
INNER JOIN category ON supplies.c_materialid = category.c_materialid
WHERE supplies.`u_name` = '$u_name' order by c_materialid";

$qry_result = mysql_query($query) or die(mysql_error());
	

//Build Result String
$display_string = '<table class="table">';
$display_string .= '<tr class="active">';
$display_string .= "<th>ลำดับที่	</th>";
$display_string .= "<th>รหัสวัสดุ</th>";
$display_string .= "<th>ชื่อวัสดุ</th>";
$display_string .= "<th>จำนวนที่นำเข้า</th>";
$display_string .= "<th>เลือก</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
$tmpCount = 1 ;
$sumamount= 0 ;
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	//$display_string .= "<td>$row[no]</td>";
	$display_string .= "<td>$tmpCount</td>";
	$display_string .= "<td>$row[c_materialid]</td>";
	$display_string .= "<td>$row[c_materialname]</td>";
	$display_string .= "<td>$row[s_number]</td>";
	$display_string .= '<td>
							<div class="myclass" id="'.$row[no].'">
                            <button type="button" class="btn btn-danger btn-xs mybtn">
                                <span class="glyphicon glyphicon-remove"></span> ลบออก
                            </button>
							</div>
                        </td>';
	$display_string .= "</tr>";
	$tmpCount ++;
	$sumamount = $sumamount + $row[s_number];
	
}

$display_string .= "<tr>";
$display_string .= "<td></td>";
$display_string .= "<td>รวมทั้งสิ้น</td>";
$display_string .= "<td></td>";
$display_string .= "<td>$sumamount</td>";
$display_string .= '<td></td>';
$display_string .= "</tr>";

//echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;
?>