<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: member/login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to member/login.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 
	
?> 


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <script type='text/javascript' src='src/js/jquery-1.9.1.js'></script>
	<script type='text/javascript' src='src/js/additem.js'></script>
    <link href="src/css/main.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="src/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="src/signin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="src/justified-nav.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  <title>Flat UI Navigation - CodePen</title>

  <script>
    window.open    = function(){};
    window.print   = function(){};
    // Support hover state for mobile.
    if (false) {
      window.ontouchstart = function(){};
    }
  </script>
	  

<script type='text/javascript'>

<!-- 
//Browser Support Code
function ajaxFunction(select) {
    var ajaxRequest; // The variable that makes Ajax possible!

    try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer Browsers
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data 
    // sent from the server and will update
    // div section in the same page.
    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            $('#ajaxDiv').html(ajaxRequest.responseText);
            // var ajaxDisplay = document.getElementById('ajaxDiv');
            // ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    // Now get the value from user and pass it to
    // server script.
    var type = document.getElementById('class').value;
    var i = document.getElementById("class").selectedIndex;
    var wpm = document.getElementById('class').options[i].text;
    var sex = document.getElementById('value').value;
    var queryString = "?id=" + type;
	var username = "<?php echo $_SESSION['user']['username']; ?>";
    queryString += "&name=" + wpm + "&namber=" + sex + "&username=" + username;
	
    if (select == true) {
        ajaxRequest.open("GET", "ajax/Ajax.php?username="+ username , true);
    } else {
        ajaxRequest.open("GET", "ajax/Ajax.php" + queryString, true);
    }
    ajaxRequest.send(null);

}

function saveorder(value) {
    var ajaxRequest; // The variable that makes Ajax possible!
    try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer Browsers
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
	var type = 0;
	var project = document.getElementById('project').value;
	var activity = document.getElementById('activity').value;
	var date_start = document.getElementById('date-start').value;
	var date_end = document.getElementById('date-end').value;
	var username = "<?php echo $_SESSION['user']['username']; ?>";
	if(value == 'activity' ){
		type = 1 ;
		var urlpar = "saveorder.php?name="+username+"&type="+type+"&project="+project+"&activity="+activity+"&date_st="+date_start+"&date_nd="+date_end;
		ajaxRequest.open("GET", urlpar , true);
		ajaxRequest.send(null);
	}
	else{
		ajaxRequest.open("GET", "saveorder.php?name="+username+"&type="+type , true);
		ajaxRequest.send(null);
	} 
}

//-->

</script>
	 
	  
 <script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).ready(function () { // ran when the document is fully loaded
    var sel = $('#type');

	var username = "<?php echo $_SESSION['user']['username']; ?>";
	
	ajaxFunction(false);
	
	$("#summary-material" ).hide();
	$("#activitymore" ).hide();
	$("#save-material" ).hide();
	
	
	setInterval(function() {
		ajaxFunction(true);  
	}, 1000);
	
	var tmpop ;
	
    sel.change(function () { //inside the listener
        var value = $(this).val();
	    var text = $("#type :selected").text();
        // print it in the logs
		var a = text;
		
        if (value == 0) {
            var newOptions = {
                '00000': '--เลือกชนิดของวัสดุ--'
            };
        } else if (value == 1)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุสำนักงาน'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 2)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุคอมพิวเตอร์'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 3)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุงานบ้านงานครัว'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 4)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุโฆษณาและเผยแพร่'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 5)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุการเกษตร'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 6)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุก่อสร้าง'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 7)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุไฟฟ้าและวิทยุ'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        } else if (value == 8)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุเชื้อเพลิงและหล่อลื่น'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        }else if (value == 9)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุพาหนะและขนส่ง'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        }else if (value == 10)  {
            var newOptions = {
				<?php
				require "config.php";	
				$query = "SELECT  `c_materialid` ,  `c_materialname` FROM category WHERE  `c_name` =  'วัสดุวิทยาศาสตร์และการแพทย์'  ORDER BY  `c_materialid` ";
				$qry_result = mysql_query($query) or die(mysql_error());
				$tmp = "";
				while($row = mysql_fetch_array($qry_result)){
					$tmp .= "'".$row[c_materialid]."':'".$row[c_materialname]."',";
				}
				echo substr($tmp, 0, -1);
				?>
            };
        }
		
        var select = $('#class');
        if (select.prop) {
            var options = select.prop('options');
        } else {
            var options = select.attr('options');
        }
        $('option', select).remove();

        $.each(newOptions, function (val, text) {
            options[options.length] = new Option(text, val);
        });
        //select.val(selectedOption);

        //console.log($('#class').val());

        // crashes in IE, if console not open
        // make the text of all label elements be the value 

    }); // close the change listener

    $("#add").click(function () {
		//$("html, body").animate({ scrollTop: $("#ajaxDiv").offset().top }, 1000);
        //alert("คุณเพิ่ม " + $('#class').val() + "จำนวน " + $('#value').val());
    });

    $("#reset").click(function () {
        var newOptions = {
            '00000': '--เลือกชนิดของวัสดุ--'
        };
        var select = $('#class');
        if (select.prop) {
            var options = select.prop('options');
        } else {
            var options = select.attr('options');
        }
        $('option', select).remove();

        $.each(newOptions, function (val, text) {
            options[options.length] = new Option(text, val);
        });

    });
	
	function convertDate(inputFormat) {
	  var d = new Date(inputFormat);
	  return [d.getDate(), d.getMonth()+1, d.getFullYear()].join('/');
	}
	
	var objective = "กรณีใช้ภายในสำนักงาน" ;
	var valueType ;
	$("#objective" ).html('<h5>วัตถุประสงค์ในการเบิก<a style="padding-left: 50px"></a>'+objective+'</h5><br>');
		
	
	$("#confirm").click(function () {
		$("#select-material" ).hide();
		$("#selected-material" ).hide();
		$("#summary-material" ).show();
		$("#ajaxDivClone" ).html( $("#ajaxDiv").clone() );
		var project = $("#project" ).val();
		var activity = $("#activity" ).val();
		var datestart =  convertDate($("#date-start" ).val());
		var dateend = convertDate($("#date-end" ).val());
		
		$("html, body").animate({ scrollTop: $("#summary-material").offset().top }, 0);
		
		if(valueType == 'activity'){
			objective = $("input:radio[name=gender]:checked + label").text();
			var line1 = '<h5>วัตถุประสงค์ในการเบิก<a style="padding-left: 50px"></a>'+objective+project+'</h5><br>';
		    var line2 = '<h5>ภายใต้กิจกรรม<a style="padding-left: 90px"></a>'+activity+' ระหว่างวันที่  '+datestart+' ถึง '+dateend+'</h5><br>';
			$("#objective" ).html(line1+line2);
		}
		else{
			$("#activitymore" ).hide();
			objective = "กรณีใช้ภายในสำนักงาน";
			$("#objective" ).html('<h5>วัตถุประสงค์ในการเบิก<a style="padding-left: 50px"></a>'+objective+'</h5><br>');
		}
		$("#ajaxDivClone th:last-child, #ajaxDivClone td:last-child").remove();
    });
	
	function deleteItembyUser(){
		var theUrl ="order/deleteorder.php?type=ALL&name="+username;
		console.log(theUrl);
		var xmlHttp = null;
		xmlHttp = new XMLHttpRequest();
		xmlHttp.open( "GET", theUrl, false );
		xmlHttp.send( null );
		return xmlHttp.responseText;
	}
	
	
	$("#save").click(function () {
		if (confirm("Do you want to save order ?")){
			saveorder(valueType);
			$("#select-material" ).hide();
			$("#selected-material" ).hide();
			$("#summary-material" ).hide();
			$("#save-material" ).show();
			deleteItembyUser();
		}
	});
	
	$("#back-edit").click(function () {
		$("#select-material" ).show();
		$("#selected-material" ).show();
		$("#summary-material" ).hide();
    });
	
	$("#deleteall").click(function () {
		
		if (confirm("Do you want to delete all ?")){
			deleteItembyUser();
		}
    });
	
	$("input:radio[name=gender]").click(function() {
		valueType = $(this).val();
		if(valueType == 'activity'){
			$("#activitymore" ).show();	
			objective = $("input:radio[name=gender]:checked + label").text();
		}
		else{
			$("#activitymore" ).hide();
			objective = "กรณีใช้ภายในสำนักงาน";
		}
	});
	
	
}); // close the ready listener
});//]]>  


</script>
	  
	  
</head>

<body>

<?php

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
?>

<div class="container">    
        
</div>
<br>
<div class="container">  
    
    
<? require "menu.php"; ?>	
    
    <div class="row">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="panel panel-carot">
            <div class="panel-heading">
              <h3 class="panel-title">เมนู</h3>
            </div>
              
            <div class="list-group">
            <a href="widenmaterial.php" class="list-group-item active">เบิกวัสดุ</a>
            <a href="#" class="list-group-item">ดูจำนวนวัสดุคงเหลือ</a>
            <a href="track.php" class="list-group-item">ตรวจสอบสถานะ</a>
            <a href="#" class="list-group-item">ดูรายงานการเบิก</a>
           </div>  
              
          </div>
            
          <div class="panel panel-carot">
            <div class="panel-heading">
              <h3 class="panel-title">สำหรับเจ้าหน้าที่พัสดุ</h3>
            </div>
              
            <div class="list-group">
            <a href="#" class="list-group-item">นำเข้าวัสดุ</a>
            <a href="#" class="list-group-item">ดูวัสดุใกล้หมด</a>
            <a href="#" class="list-group-item">อนุมัติการเบิก</a>
            <a href="#" class="list-group-item">พิมพ์ใบเบิกจ่าย</a>
            <a href="#" class="list-group-item">เพิ่มผู้ใช้งาน</a>
            <a href="#" class="list-group-item">ดูรายงาน</a>
           </div>  
              
          </div>
            
        </div><!--/span-->
        
        <div id="content" class="col-xs-11 col-sm-9" >

            <div id="select-material" class="panel panel-carot">

              <div class="panel-body">

                  <h3>เลือกรายการวัสดุ</h3>
                   <hr>
                   <form class="form-horizontal" role="form">
                       <center>   
                       <div class="col-xs-6 col-md-4">
                           <div class="form-group">
                            <label class="right" >เลือกประเภทวัสดุ</label><br>
							
							<select id="type" class="form-control">
							
							<?php
							$query = "SELECT DISTINCT c_name FROM category ORDER BY  `c_materialid` ";
							$qry_result = mysql_query($query) or die(mysql_error());
							$tmp = 1 ;
							echo '<option value="0">--เลือกประเภทวัสดุ--</option>';
							while($row = mysql_fetch_array($qry_result)){
								echo '<option value="'.$tmp.'">'.$row[c_name].'</option>';
								$tmp++;
							}
							?>
							</select>

                          </div>
                       </div>
                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                      <label class="right" >เลือกรายการวัสดุ</label><br>
						<select id="class" class="form-control">
						<option value="101046/05">--เลือกชนิดของวัสดุ--</option>
						</select>
                    </div></div>
                           
                           
                  <div class="col-xs-6 col-md-4">
                       <div class="form-group">
                       <label class="right">เลือกรายการวัสดุ</label>
                            <input id="value" type="number" class="form-control" max="100" min="1"> 
                       </div>
                  </div>
                        
                  <br><br> <br> <br> 
                  
                  <div class="row">

                    <div class="col-xs-6 col-md-3">
                    </div> 
                    <div class="col-xs-6 col-md-3">
						<input id="add" type='button' onclick='ajaxFunction(false)' class="btn btn-block btn btn-success" value='เพิ่ม'/>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <button id="reset" type="reset" class="btn btn-block btn btn-danger">ยกเลิก</button>
                    </div>
                    <div class="col-xs-6 col-md-3">
                    </div>   
                  </div>
                  </center>
                  </form>

              </div>
            </div>
            
            
           <div id="selected-material" class="panel panel-carot">

              <div class="panel-body">
                  <h3>รายการวัสดุที่เลือก</h3>
                   <hr>
				   
				  <div id='ajaxDiv'></div>
				  <hr>
				  <h3>วัตถุประสงค์ในการเบิก</h3>
				  <hr>  

				  <div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form action="r" method="post" accept-charset="utf-8" class="form" role="form"> 
								
								<label class="radio-inline">
									<input type="radio" name="gender" value="office" id="radio1" checked="checked" />  <label for="radio1">กรณีใช้ภายในสำนักงาน</label> 
								</label>
								<label class="radio-inline">
									<input type="radio" name="gender" value="activity" id="radio2" /><label for="radio2">กรณีเบิกใช้ภายในโครงการ</label> 
								</label>
								<br />
								<br />
								<div  id="activitymore">
									<input type="text" id="project" value="" class="form-control " placeholder="โครงการ"  />
									<br />
									<input type="text" id="activity" value="" class="form-control " placeholder="ภายใต้กิจกกรม"  />
									<br />
									<input type="date" id="date-start" value="" class="form-control " />
									<br />
									<input type="date" id="date-end" value="" class="form-control "/>
									<br />
								</div>
						</form>          
					  </div>
					</div>            

                  <div class="row">

                    <div class="col-xs-6 col-md-3">
                    </div> 
                    <div class="col-xs-6 col-md-3">
                        <button id="confirm" type="submit" class="btn btn-block btn btn-success">ยืนยัน</button>
                    </div>
                    <div class="col-xs-6 col-md-3">
						<input id="deleteall" type='button' class="btn btn-block btn btn-danger" value='ยกเลิก'/>
                    </div>
                    <div class="col-xs-6 col-md-3">
                    </div>   
                  </div>
              </div>
            </div>
			
			
			<div id="summary-material" class="panel panel-carot">

              <div class="panel-body">
                  <h3>รายการขอเบิกวัสดุ</h3>
                   <hr>
				   
				   <div id='content-head'>
				   
					<div class="row">
					  <div class="col-md-6">
					      <h5> ปีงบประมาณ <a style="padding-left: 43px"><?php echo (date("Y")+543); ?></a></h5>
					      <h5> วัน/เดือน/ปี <a style="padding-left: 50px"><?php $datenow = date("Y-m-d H:i:s"); echo  DateThai($datenow) ?></a></h5>
					      <h5> ชื่อผู้ขอเบิก <a style="padding-left: 50px"><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'];?></a></h5>
					      <h5> ตำแหน่ง <a style="padding-left: 67px"><?php echo $_SESSION['user']['position']; ?></a></h5>	
						  <h5> สังกัดงาน <a style="padding-left: 60px"><?php  echo  $_SESSION['user']['department']; ?></a></h5>
					  </div>
					  
					  <?php
						$query = "SELECT `id_widen` FROM `widenid` WHERE  `id_widen` = (SELECT max(`id_widen`) FROM `widenid`)";
						$qry_result = mysql_query($query) or die(mysql_error());
						$no = 1 ; 
						while($row = mysql_fetch_array($qry_result)){
							$no =  $row[id_widen]+ $no;
						}
					  ?>
					  
					  <div class="col-md-6">
						<h5 style="padding-left: 150px">เลขที่<a style="padding-left: 40px"><?php  echo $no.'/'.(date("Y")+543); ?></a></h5>
					  
					  </div>
					</div>

				   
				   </div>
				   
				  <br>
				  <div id='ajaxDivClone'></div>
				  
				  <div id='objective'></div>
				  
				  
                  <div class="row">

                    <div class="col-xs-6 col-md-3">
                    </div> 
                    <div class="col-xs-6 col-md-3">
                        <button id="save" type="submit" class="btn btn-block btn btn-success">ยืนยัน</button>
                    </div>
                    <div class="col-xs-6 col-md-3">
						<input id="back-edit" type='button' class="btn btn-block btn btn-danger" value='กลับ'/>
                    </div>
                    <div class="col-xs-6 col-md-3">
                    </div>   
                  </div>
              </div>
            </div>
			
			
			<div id="save-material" class="panel panel-carot">

              <div class="panel-body">
				<h3>บันทึกการเบิกสำเร็จ</h3>
                <hr>
				<h4>Order number :
				 <?php echo $no; ?> 
                <h4> 
				สามารถตรวจสอบ รายการเบิกวัสดุย้อนหลังได้ที่เมนู...
              </div>
            </div>
			
			
        </div>
      </div><!--/row-->
</div>

<? require "footer.php"; ?>	

<script>

</script>

  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage('resize', "*");
    }
  </script>

</body>

</html>