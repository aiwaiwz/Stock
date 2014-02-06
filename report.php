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
	require "config.php";
?> 


<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">


    <script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/knockout-3.0.0.js"></script>
	<script src="js/globalize.min.js"></script>
	<script src="js/dx.chartjs.js"></script>

  
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
	 
	  
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).ready(function () {
	$("#menu-user a:eq(3)").addClass("active");
	$("#report" ).hide();
	

	$("#back").click(function () {
		$("#tracking" ).show();
	    $("#report" ).hide();
		
    });	


 var dataSource = [
	 
	 <?
	 $queryPrototype = 'SELECT SUM( widenmaterial.number ) AS \'sum\', COUNT( widenmaterial.`w_id` ) AS \'counts\' '
        . ' FROM widenid'
        . ' INNER JOIN widenmaterial ON widenid.w_id = widenmaterial.w_id'
        . " AND widenmaterial.u_name = '" . $_SESSION[user][username]."'"
        . ' AND MONTH( widenid.date_widen ) = ';
	 
		function checkNull($value){
			if($value != NULL){
				return $value;
			}
			else{
				return 0;
			}
		}
		
		$mouthsThai = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		
		$months = array();
		for($i = 11; $i > -1; $i--){
		  $timestamp = strtotime("-$i month");
		  $value =  date('n', strtotime("-$i month"));
		  //$text  =  date('F', strtotime("-$i month"));  
		  $text  =  $mouthsThai[ $value +0];
		  $months[$value] =  $text;
		}

		foreach($months as $value => $text){
			print '{ country: "' .$text. '", hydro: '; 
			$query = $queryPrototype . $value;
			$qry_result = mysql_query($query) or die(mysql_error());			
			while($row = mysql_fetch_array($qry_result)){
				print checkNull($row[sum]).' , oil: '.checkNull($row[counts]);
			}
			print '},
			';
		}

	 
	 ?>

];


 var dataSourceDonut = [
	 
	 <?
	 
	$query = 'SELECT category.c_name AS Category , SUM(widenmaterial.number) AS Total'
        . ' FROM widenid'
        . ' INNER JOIN widenmaterial'
        . ' INNER JOIN category ON widenid.w_id = widenmaterial.w_id'
        . " AND widenmaterial.u_name = '" . $_SESSION[user][username]."'"
        . ' AND category.c_materialid = widenmaterial.id'
        . ' GROUP BY category.c_name';
	
	$qry_result = mysql_query($query) or die(mysql_error());			
	while($row = mysql_fetch_array($qry_result)){
		print '{region: "'.$row[Category].'", val: '.$row[Total].'},
		';
	}

	 ?>
	 
];

var dataSourceSum = [
	 
	 <?
	 
	$query =  'SELECT category.c_materialname AS Name , SUM(widenmaterial.number) AS Total'
        . ' FROM widenid'
        . ' INNER JOIN widenmaterial'
        . ' INNER JOIN category ON widenid.w_id = widenmaterial.w_id'
        . " AND widenmaterial.u_name = '" . $_SESSION[user][username]."'"
        . ' AND category.c_materialid = widenmaterial.id'
        . ' GROUP BY category.c_materialname';
	
	$qry_result = mysql_query($query) or die(mysql_error());			
	while($row = mysql_fetch_array($qry_result)){
		print '{region: "'.$row[Name].'", val: '.$row[Total].'},
		';
	}

	 ?>
	 
];

$("#chartContainerSummary").dxPieChart({
    dataSource: dataSourceSum,
    title: "วัสดุที่เบิกมากที่สุด",
	tooltip: {
		enabled: true,
		format:"millions",
		percentPrecision: 2,
		customizeText: function() { 
			return this.percentText;
		}
	},
	legend: {
		horizontalAlignment: "right",
		verticalAlignment: "top",
		margin: 0
	},
	series: [{
		type: "doughnut",
		argumentField: "region",
		label: {
			visible: true,
			//format: "millions",
			connector: {
				visible: true
			}
		}
	}]
});


$("#chartContainerDonut").dxPieChart({
    dataSource: dataSourceDonut,
    title: "ประเภทวัสดุที่เบิกมากที่สุด",
	tooltip: {
		enabled: true,
		format:"millions",
		percentPrecision: 2,
		customizeText: function() { 
			return this.percentText;
		}
	},
	legend: {
		horizontalAlignment: "right",
		verticalAlignment: "top",
		margin: 0
	},
	series: [{
		type: "doughnut",
		argumentField: "region",
		label: {
			visible: true,
			//format: "millions",
			connector: {
				visible: true
			}
		}
	}]
});


$("#chartContainer").dxChart({
    dataSource: dataSource,
    commonSeriesSettings: {
        argumentField: "country",
        type: "spline",
        point: {
            hoverMode: 'allArgumentPoints'
        }
    },
    crosshair: {
        enabled: true
    },
    series: [
        { valueField: "hydro", name: "จำนวนวัสดุทั้งหมดที่เบิก" },
		{ valueField: "oil", name: "จำนวนครั้งที่เบิกทั้งหมด" }
    ],
    legend: {
        verticalAlignment: "bottom",
        horizontalAlignment: "center",
        itemTextPosition: "bottom",
        equalColumnWidth:true
    },
    title: "รายงานการเบิกย้อนหลัง",
    tooltip: {
        enabled: true,
        shared: true
    }
});

	
}); // close the ready listener

});//]]>  
</script>
	  
<script>

	function showorder(w_id,no,year){
		$("#tracking" ).hide();
	    $("#report" ).show();
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
				$('#ajaxDivClone').html(ajaxRequest.responseText);
				var line1 = '<h5 style="padding-left: 150px">เลขที่<a style="padding-left: 40px">' + no + '/' + year +'</a></h5>';
				$("#no_report" ).html(line1);
			}
		}
		// Now get the value from user and pass it to
		// server script.
		ajaxRequest.open("GET", "ajax/tracking.php?w_id="+w_id , true);
		ajaxRequest.send(null);
		
		//$("#objective" ).html();
	}
	


</script>	  


</head>

<body>
    

<div class="container">    
    

    
</div>
<br>
<div class="container">  
    
<? require "menu.php"; ?>	
    
        
        <div class="col-xs-11 col-sm-9" >

            <div id="tracking" class="panel panel-carot">

              <div class="panel-body">
                  <h3>ตรวจสอบสถานะการทำรายการขอเบิก</h3>
                   <hr>

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
				
					//build query
					$query = "SELECT * FROM  `widenid` WHERE  `u_id` = ( SELECT id FROM users WHERE username =  '".$_SESSION['user']['username']."' ) ";

					$qry_result = mysql_query($query) or die(mysql_error());
				
					$display_string = '<table class="table">';
					$display_string .= '<tr class="active">';
					$display_string .= "<th>วันที่ทำรายการ	</th>";
					$display_string .= "<th>เลขที่ใบเบิก</th>";
					$display_string .= "<th>วันที่ดำเนินการเสร็จสิ้น</th>";
					$display_string .= "<th>สถานะ</th>";
					$display_string .= "<th>รายละเอียด</th>";
					$display_string .= "</tr>";
					
					while($row = mysql_fetch_array($qry_result)){
						$newD = DateThai($row[date_widen]);
						$dateend = DateThai($row[end_order]);
						$strYear = date("Y",strtotime($row[date_widen]))+543;
						$no_order = $row[id_widen].'/'.$strYear ;
						$thisyear = date("Y",strtotime($row[end_order]))+543;
						$display_string .= "<tr>";
						$display_string .= "<td>$newD</td>";
						$display_string .= "<td>$no_order</td>";
						if($thisyear >= $strYear){
							$display_string .= "<td>$dateend</td>";
						}
						else{
							$display_string .= "<td>รอดำเนินการ</td>";
						}
						if($row[status] == 'อนุมัติ'){
							$display_string .= '<td><button type="button"class="btn btn-success btn-xs mybtn">
                                <span class="glyphicon glyphicon-ok-sign"></span> '.$row[status].'
                        </button></td>';

						}
						elseif ($row[status] == 'รออนุมัติ'){
							$display_string .= '<td><button type="button"class="btn btn-warning btn-xs mybtn">
                                <span class="glyphicon glyphicon-time"></span> '.$row[status].'
                        </button></td>';
						}else{
							$display_string .= '<td><button type="button"class="btn btn-danger btn-xs mybtn">
                                <span class="glyphicon glyphicon-remove-sign"></span> '.$row[status].'
                        </button></td>';

						}

						//$display_string .= "<td>$row[status]</td>";
						$display_string .= '<td>
							<div class="myclass" id="'.$row[w_id].'">
                            <button type="button" onclick="showorder('.$row[w_id].','.$row[id_widen].','.$strYear.')" class="btn btn-info btn-xs mybtn">
                                <span class="glyphicon glyphicon-list"></span> ใบเบิก
                            </button>
							</div>
                        </td>';
						$display_string .= "</tr>";
					}
					$display_string .= "</table>";
					//echo $display_string;
				   ?>

				   <div class="row">
				   	<!--
					  <div class="col-md-12">
					  	<canvas id="canvas" height="480" width="830"></canvas>
					  </div>
-->
					<div class="col-md-12">
					  <div id="chartContainer" style="width: 100%; height: 440px;">
						</div>
					</div>

              </div>
			  
			  <hr>
			  
			  <div class="row">

					<div class="col-md-12">
					  <div id="chartContainerDonut" style="width: 100%; height: 440px;">
						</div>
					</div>
				   
              </div>
			  
			  <hr>
			  
			  <div class="row">

					<div class="col-md-12">
					  <div id="chartContainerSummary" style="width: 100%; height: 440px;">
						</div>
					</div>
				   
              </div>
			  
			  
            </div>


			
			 <div id="report" class="panel panel-carot">

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
					  
					 <div class="col-md-6">
						<div id='no_report'>
							<h5 style="padding-left: 150px">เลขที่<a style="padding-left: 40px"><?php  echo $no.'/'.(date("Y")+543); ?></a></h5>
						</div>
					</div>
					 
					</div>
				</div>
				   
				  <br>
				  <div id='ajaxDivClone'></div>
				  
				  <div id='objective'></div>
				  
                  <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
						<input id="back" type='button' class="btn btn-block btn btn-danger" value='กลับ'/>
                    </div>
					<div class="col-md-4">
                    </div>
                  </div>
              </div>
            </div>
			
        </div>        
      </div><!--/row-->
</div>

<? require "footer.php"; ?>	
    
	<script>


		var lineChartData = {
			labels : ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน ","พฤษภาคม ","มิถุนายน ","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],
	
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [28,18,43,19,96,27,74,60,81,96,65,156]
				}
			],

			scaleShowGridLines : true
			
		};

		var options = {
		    scaleFontColor: "#f00",
		    datasetStrokeWidth: 5,
		    scaleOverride : true,
		    scaleOverlay : true,
		   	animation : true,
		    animationSteps : 60,
		    scaleSteps : 10,
			scaleStepWidth : 10,
			scaleStartValue : 0

		};








	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData,options);
	
	</script>

  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage('resize', "*");
    }
  </script>

</body>

</html>