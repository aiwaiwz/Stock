<script>

$(function(){
   $(".myclass").click(function(){
	if (confirm("Do you want to delete")){
		
		var del_id = $(this).attr('id');
		var rowElement = $(this).parent().parent(); //grab the row
		$.ajax({
		type: "post",
		url: "deleteorder.php",
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

require "config.php";

$id = $_GET['id'];
$name = $_GET['name'];
$namber = $_GET['namber'];

if($id != null and $name != null and $namber != null){
	
	$query = "SELECT c_price FROM category WHERE c_materialid = $id";
	$qry_result = mysql_query($query) or die(mysql_error());
	$price = 1 ; 
	while($row = mysql_fetch_array($qry_result)){
		$price = $row[c_price] ;
	}
	echo '<h5>Hello';
	$amount = $price * $namber ;
	echo '</h5>';
	//add data
	$query = "INSERT INTO  `test` (`no` ,`id` ,`name` ,`number` ,`price` ,`amount`)
			VALUES (   NULL ,  '$id',  '$name',  '$namber',  '$price',  '$amount' );";
	$qry_result = mysql_query($query) or die(mysql_error());
}

//build query
$query = "SELECT * FROM test order by no";

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
$display_string .= "<th>เลือก</th>";
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
	$display_string .= '<td>
							<div class="myclass" id="'.$row[no].'">
                            <button type="button" class="btn btn-danger btn-xs mybtn">
                                <span class="glyphicon glyphicon-remove"></span> ลบออก
                            </button>
							</div>
                        </td>';
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
?>