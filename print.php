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
  
  
  <link href="src/css/main.css" rel="stylesheet">
  <script type='text/javascript' src='src/js/jquery-1.9.1.js'></script>
  <script type='text/javascript' src='src/js/printThis.js'></script>
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
	console.log("Hello");
	
	
	$("#print-data" ).hide();
	$("#button_print" ).hide();
	

	$("#print").click(function () {
		
		$("#print-data").printThis();

    });	
	
	
	
}); // close the ready listener

});//]]>  
</script>
	  
<script>

	function checkwid(theUrl){
		
		var xmlHttp = null;
		xmlHttp = new XMLHttpRequest();
		xmlHttp.open( "GET", theUrl, false );
		xmlHttp.send( null );
		return xmlHttp.responseText;
	}

	function showorder(){
		
	    
		var text = $('#search').val();
		
		if(text == ''){
			alert("ข้อมูลไม่ถูกต้อง กรุณาใส่อีกครั้ง");
		}
		else{
			
			var res = text.split("/");
			var no = res[0];
			var year = res[1];
			
			var theUrl ="ajax/check_wid.php?id_widen="+no;
			var w_id = checkwid(theUrl);
			
			
			var date_w = checkwid(theUrl+'&type=date');
			
			var year_w = checkwid(theUrl+'&type=year');
			
			console.log(date_w+'<br>'+year_w);
			
			
			if(w_id == '' || year_w == '' || year_w != year){
				alert("ข้อมูลไม่ถูกต้อง กรุณาใส่อีกครั้ง");
			}
			else{
				
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
					var line1 = '<h5>เลขที่<a style="padding-left: 87px">' + no + '/' + year +'</a></h5>';
					$("#no_report" ).html(line1);
					$("#date_w" ).html(date_w);
					$("#print-data" ).show();
					$("#button_print" ).show();
				}
			}
			// Now get the value from user and pass it to
			// server script.
			ajaxRequest.open("GET", "ajax/tracking.php?w_id="+w_id , false);
			ajaxRequest.send(null);
				
			}
		}
	}
	


</script>	  

</head>

<body>
    

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
            <a href="widenmaterial.php" class="list-group-item ">เบิกวัสดุ</a>
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
            <a href="#" class="list-group-item active">พิมพ์ใบเบิกจ่าย</a>
            <a href="#" class="list-group-item">เพิ่มผู้ใช้งาน</a>
            <a href="#" class="list-group-item">ดูรายงาน</a>
           </div>  
              
          </div>
            
        </div><!--/span-->
        
        <div class="col-xs-11 col-sm-9" >

			
			<div id="select" class="panel panel-carot">

              <div class="panel-body">

					<div class="row">
					  <div class="col-xs-6"><h3>พิมพ์ใบเบิกจ่าย</h3></div>
					  <div class="col-xs-6">
					  <form class="form-inline" role="form">
						<br>
						  <div class="form-group">
							<input type="text" id="search" class="form-control" id="texts" placeholder="เช่น 25/2557">
						  </div>
						  <button type="button" onclick="showorder()" class="btn btn-primary">ค้นหา</button>
					  </form></div>
					</div>
					<hr>
					
					<div id='print-data' class='print-data' >
					
					<div id='content-head'>
					
					<?php
					


					?>
				   
					<div class="row">
					  <div class="col-md-6">
					      <div id='no_report'>
						  <h5>เลขที่<a style="padding-left: 50px"><?php  echo $no.'/'.(date("Y")+543); ?></a></h5>
						 </div>
					      <h5> ปีงบประมาณ <a style="padding-left: 43px"><?php echo (date("Y")+543); ?></a></h5>
					      <div id='date_w'>
							<h5> วัน/เดือน/ปี <a style="padding-left: 50px"></a></h5>
						  </div>
					      <h5> ชื่อผู้ขอเบิก <a style="padding-left: 50px"><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'];?></a></h5>
					      <h5> ตำแหน่ง <a style="padding-left: 67px"><?php echo $_SESSION['user']['position']; ?></a></h5>	
						  <h5> สังกัดงาน <a style="padding-left: 60px"><?php  echo  $_SESSION['user']['department']; ?></a></h5>
					  </div>
					  
					 <div class="col-md-6">
					</div>
					 
					</div>
				</div>
				
				 <br>
				  <div id='ajaxDivClone'></div>
				  <div id='objective'></div>
				</div>  
                  <div id='button_print' class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
						<input id="print" type='button' class="btn btn-block btn btn-danger" value='Print'/>
                    </div>
					<div class="col-md-4">
                    </div>
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