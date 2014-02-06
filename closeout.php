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
	$("#menu-admin a:eq(1)").addClass("active");
	$("#report" ).hide();
	

	$("#back").click(function () {
		$("#tracking" ).show();
	    $("#report" ).hide();
		
    });	
	
}); // close the ready listener

});//]]>  
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
                  <h3>รายการวัสดุที่ใกล้หมด</h3>
                   <hr>

                   <center>
                   <form class="form-inline" role="form" name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">

							<div class="form-group">
							    <label class="control-label" >Keyword : </label>
							</div>

							<div class="form-group">
							    <input name="keyword" class="form-control" type="text" id="keyword" value="<?=$_GET["keyword"];?>">
	                  
							</div>

						<input type="submit" class="btn btn-info" value="Search">
				   </form>
				</center><br>
					<?


					require "config.php";

					if($_GET["keyword"] != "")
						{

						// Search By Name or Email
						$strSQL = "SELECT * FROM category WHERE (c_materialname LIKE '%".$_GET["keyword"]."%' or c_materialid LIKE '%".$_GET["keyword"]."%')";
						$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
						$Num_Rows = mysql_num_rows($objQuery);

						$Per_Page = 10;   // Per Page

						$Page = $_GET["Page"];
						if(!$_GET["Page"])
						{
							$Page=1;
						}

						$Prev_Page = $Page-1;
						$Next_Page = $Page+1;

						$Page_Start = (($Per_Page*$Page)-$Per_Page);
						if($Num_Rows<=$Per_Page)
						{
							$Num_Pages =1;
						}
						else if(($Num_Rows % $Per_Page)==0)
						{
							$Num_Pages =($Num_Rows/$Per_Page) ;
						}
						else
						{
							$Num_Pages =($Num_Rows/$Per_Page)+1;
							$Num_Pages = (int)$Num_Pages;
						}


						$strSQL .=" order  by c_name ASC LIMIT $Page_Start , $Per_Page";
						$objQuery  = mysql_query($strSQL);

						?>
						<table class="table">
						  <tr>
							<th class="active"> <div align="center">รหัสวัสดุ </div></th>
							<th class="active">ประเภทวัสดุ </div></th>
							<th class="active">ชื่อวัสดุ </div></th>
							<th class="active"> <div align="center">จำนวนคงเหลือ </div></th>
							<th class="active"> <div align="center">สถานะ </div></th>
						  </tr>
						<?
						while($objResult = mysql_fetch_array($objQuery))
						{
						?>
						  <tr>
							<td><div align="center"><?=$objResult["c_materialid"];?></div></td>
							<td><?=$objResult["c_name"];?></div></td>
							<td><?=$objResult["c_materialname"];?></td>
							<td><div align="center"><?=$objResult["c_number"];?></td>
							<td><div align="center">
							<?
							if($objResult["c_number"] < 10 and  $objResult["c_number"] > 0){
								echo '<button type="button"class="btn btn-warning btn-xs mybtn">
                                <span class="glyphicon glyphicon-warning-sign"></span> '.ใกล้จะหมด.'
                        </button>';
							}
							elseif($objResult["c_number"] == 0 ){
								echo '<button type="button"class="btn btn-danger btn-xs mybtn">
                                <span class="glyphicon glyphicon-remove-sign"></span> '.หมด.'
                        </button>';
							}
							else{
								echo '<button type="button"class="btn btn-success btn-xs mybtn">
                                <span class="glyphicon glyphicon-ok-sign"></span> '.ปกติ.'
                        </button>';
							}
							?>
							</td>
						  </tr>
						<?
						}
						?>
						</table>
						
						<center>
						<!--Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :-->
						<?

						echo '<ul class="pagination">';

						if($Prev_Page)
						{
							echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&keyword=$_GET[keyword]'>&laquo;</a></li>";
							//echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&keyword=$_GET[keyword]'><< Back</a> ";
						}

						for($i=1; $i<=$Num_Pages; $i++){
							if($i != $Page)
							{
								echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$i&keyword=$_GET[keyword]'>$i</a></li>";
								//echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&keyword=$_GET[keyword]'>$i</a> ]";
							}
							else
							{
								echo "<li class='active'><a href=''>$i</a></li>";
								//echo "<b> $i </b>";
							}
						}
						if($Page!=$Num_Pages)
						{
							echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&keyword=$_GET[keyword]'>&raquo;</a></li></ul>";
							//echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&keyword=$_GET[keyword]'>Next>></a> ";
						}
						

						}
						else{

													// Search By Name or Email
						$strSQL = "SELECT * FROM category Where c_number < '10'";
						$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
						$Num_Rows = mysql_num_rows($objQuery);

						$Per_Page = 15;   // Per Page

						$Page = $_GET["Page"];
						if(!$_GET["Page"])
						{
							$Page=1;
						}

						$Prev_Page = $Page-1;
						$Next_Page = $Page+1;

						$Page_Start = (($Per_Page*$Page)-$Per_Page);
						if($Num_Rows<=$Per_Page)
						{
							$Num_Pages =1;
						}
						else if(($Num_Rows % $Per_Page)==0)
						{
							$Num_Pages =($Num_Rows/$Per_Page) ;
						}
						else
						{
							$Num_Pages =($Num_Rows/$Per_Page)+1;
							$Num_Pages = (int)$Num_Pages;
						}


						$strSQL .=" order  by c_name ASC LIMIT $Page_Start , $Per_Page";
						$objQuery  = mysql_query($strSQL);

						?>
						<table class="table">
						  <tr>
							<th class="active"> <div align="center">รหัสวัสดุ </div></th>
							<th class="active">ประเภทวัสดุ </div></th>
							<th class="active">ชื่อวัสดุ </div></th>
							<th class="active"> <div align="center">จำนวนคงเหลือ </div></th>
							<th class="active"> <div align="center">สถานะ </div></th>
						  </tr>
						<?
						while($objResult = mysql_fetch_array($objQuery))
						{
						?>
						  <tr>
							<td><div align="center"><?=$objResult["c_materialid"];?></div></td>
							<td><?=$objResult["c_name"];?></div></td>
							<td><?=$objResult["c_materialname"];?></td>
							<td><div align="center"><?=$objResult["c_number"];?></td>
							<td><div align="center">
							<?
							if($objResult["c_number"] < 10 and  $objResult["c_number"] > 0){
								echo '<button type="button"class="btn btn-warning btn-xs mybtn">
                                <span class="glyphicon glyphicon-warning-sign"></span> '.ใกล้จะหมด.'
                        </button>';
							}
							elseif($objResult["c_number"] == 0 ){
								echo '<button type="button"class="btn btn-danger btn-xs mybtn">
                                <span class="glyphicon glyphicon-remove-sign"></span> '.หมด.'
                        </button>';
							}
							else{
								echo '<button type="button"class="btn btn-success btn-xs mybtn">
                                <span class="glyphicon glyphicon-ok-sign"></span> '.ปกติ.'
                        </button>';
							}
							?>
							</td>
						  </tr>
						<?
						}
						?>
						</table>

						<center>
						<!--Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :-->
						<?

						echo '<ul class="pagination">';

						if($Prev_Page)
						{
							echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&keyword=$_GET[keyword]'>&laquo;</a></li>";
							//echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&keyword=$_GET[keyword]'><< Back</a> ";
						}

						for($i=1; $i<=$Num_Pages; $i++){
							if($i != $Page)
							{
								echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$i&keyword=$_GET[keyword]'>$i</a></li>";
								//echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&keyword=$_GET[keyword]'>$i</a> ]";
							}
							else
							{
								echo "<li class='active'><a href=''>$i</a></li>";
								//echo "<b> $i </b>";
							}
						}
						if($Page!=$Num_Pages)
						{
							echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&keyword=$_GET[keyword]'>&raquo;</a></li></ul>";
							//echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&keyword=$_GET[keyword]'>Next>></a> ";
						}


						}	
						?>
						</center>

              </div>
          </div>

	</div>

<? require "footer.php"; ?>	

  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage('resize', "*");
    }
  </script>


</body>
</html>