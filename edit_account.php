<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
     
    // This if statement checks to determine whether the edit form has been submitted 
    // If it has, then the account updating code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // Make sure the user entered a valid E-Mail address 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        // If the user is changing their E-Mail address, we need to make sure that 
        // the new value does not conflict with a value that is already in the system. 
        // If the user is not changing their E-Mail address this check is not needed. 
        if($_POST['email'] != $_SESSION['user']['email']) 
        { 
            // Define our SQL query 
            $query = " 
                SELECT 
                    1 
                FROM users 
                WHERE 
                    email = :email 
            "; 
             
            // Define our query parameter values 
            $query_params = array( 
                ':email' => $_POST['email'] 
            ); 
             
            try 
            { 
                // Execute the query 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) 
            { 
                // Note: On a production website, you should not output $ex->getMessage(). 
                // It may provide an attacker with helpful information about your code.  
                die("Failed to run query: " . $ex->getMessage()); 
            } 
             
            // Retrieve results (if any) 
            $row = $stmt->fetch(); 
            if($row) 
            { 
                die("This E-Mail address is already in use"); 
            } 
        } 
         
        // If the user entered a new password, we need to hash it and generate a fresh salt 
        // for good measure. 
        if(!empty($_POST['password'])) 
        { 
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $_POST['password'] . $salt); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $password = hash('sha256', $password . $salt); 
            } 
        } 
        else 
        { 
            // If the user did not enter a new password we will not update their old one. 
            $password = null; 
            $salt = null; 
        } 
         
        // Initial query parameter values 
        $query_params = array( 
            ':email' => $_POST['email'], 
            ':user_id' => $_SESSION['user']['id'], 
        ); 
         
        // If the user is changing their password, then we need parameter values 
        // for the new password hash and salt too. 
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            $query_params[':salt'] = $salt; 
        } 
         
        // Note how this is only first half of the necessary update query.  We will dynamically 
        // construct the rest of it depending on whether or not the user is changing 
        // their password. 
        $query = " 
            UPDATE users 
            SET 
                email = :email 
        "; 
         
        // If the user is changing their password, then we extend the SQL query 
        // to include the password and salt columns and parameter tokens too. 
        if($password !== null) 
        { 
            $query .= " 
                , password = :password 
                , salt = :salt 
            "; 
        } 
         
        // Finally we finish the update query by specifying that we only wish 
        // to update the one record with for the current user. 
        $query .= " 
            WHERE 
                id = :user_id 
        "; 
         
        try 
        { 
            // Execute the query 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // Now that the user's E-Mail address has changed, the data stored in the $_SESSION 
        // array is stale; we need to update it so that it is accurate. 
        $_SESSION['user']['email'] = $_POST['email']; 
         
        // This redirects the user back to the members-only page after they register 
        header("Location: main.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to main.php"); 
    } 
     
?> 
	

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
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
			<h3>บัญชีผู้ใช้</h3> 
			<hr>
			<form action="edit_account.php" method="post" role="form"> 
				
				<div class="form-group">
					<label for="exampleInputEmail1">ชื่อผู้ใช้ :</label><br /> 
					<b><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></b> 
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">E-Mail Address:</label><br /> 
					<input type="text" class="form-control" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" /> 
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Password:</label><br /> 
					<input type="password" class="form-control" name="password" value="" /><br /> 
					<i>(leave blank if you do not want to change your password)</i> 
					<br /><br /> 
					<input type="submit" class="btn btn-block btn-lg btn-success" value="Update Account" /> 
				</div>
				  
			</form>
			</div>
		</div>
	</div>




</div>


</body>