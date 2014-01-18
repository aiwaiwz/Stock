<?php 

    // First we execute our common code to connection to the database and start the session 
    require("../common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            *
        FROM users 
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 
?> 
	
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
	<script type='text/javascript' src='src/js/additem.js'></script>
    <link href="../src/css/main.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="../src/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../src/signin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../src/justified-nav.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<title>Flat UI Navigation - CodePen</title>	
</head>

<body>

<div class="container">    
        
</div>
<br>
<div class="container">  
    
    
<? require "../menu.php"; ?>	

    <div class="row">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="panel panel-carot">
            <div class="panel-heading">
              <h3 class="panel-title">เมนู</h3>
            </div>
              
            <div class="list-group">
            <a href="#" class="list-group-item">เบิกวัสดุ</a>
            <a href="#" class="list-group-item">ดูจำนวนวัสดุคงเหลือ</a>
            <a href="#" class="list-group-item">ตรวจสอบสถานะ</a>
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
			
			<h1>Memberlist</h1> 
				<table class="table"> 
					<tr> 
						<th>ID</th> 
						<th>Username</th> 
						<th>E-Mail Address</th> 
						<th>First name</th> 
						<th>Last name</th> 
						<th>Gender</th> 
						<th>Department</th> 
						<th>Position</th> 
						<th>Tel</th> 
						<th>Type</th> 
					</tr> 
					<?php foreach($rows as $row): ?> 
						<tr> 
							<td><?php echo $row['id']; ?></td> <!-- htmlentities is not needed here because $row['id'] is always an integer --> 
							<td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['firstname'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['lastname'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['gender'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['department'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['position'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['tel'], ENT_QUOTES, 'UTF-8'); ?></td> 
							<td><?php echo htmlentities($row['type'], ENT_QUOTES, 'UTF-8'); ?></td> 
						</tr> 
					<?php endforeach; ?> 
				</table> 
				<a href="main.php" class="btn btn btn-success">Go Back</a><br />
			</div>
		</div>
	</div>
		

	</div>	



</div>
</body>