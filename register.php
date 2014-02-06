<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
	
	if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: member/login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to member/login.php"); 
    } 
     
    // This if statement checks to determine whether the registration form has been submitted 
    // If it has, then the registration code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
		
		if(empty($_POST['firstname'])) 
        { 
            die("Please enter a first name."); 
        } 
		
		if(empty($_POST['lastname'])) 
        { 
            die("Please enter a last name."); 
        } 
		
		if(($_POST['gender'])== '0') 
        { 
            die("Please select gender."); 
        } 
		
		if(empty($_POST['department'])) 
        { 
            die("Please enter a department."); 
        } 
		
		if(empty($_POST['position'])) 
        { 
            die("Please enter a position."); 
        }

		if(empty($_POST['tel'])) 
        { 
            die("Please enter a telephone number."); 
        } 
		
		if(empty($_POST['email'])) 
        { 
            die("Please enter a e-mail."); 
        }	
		
		
        // Ensure that the user has entered a non-empty username 
        if(empty($_POST['username'])) 
        { 
            // Note that die() is generally a terrible way of handling user errors 
            // like this.  It is much better to display the error with the form 
            // and allow the user to correct their mistake.  However, that is an 
            // exercise for you to implement yourself. 
            die("Please enter a username."); 
        } 
         
        // Ensure that the user has entered a non-empty password 
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
		
		if(empty($_POST['repassword'])) 
        { 
            die("Please enter a re-password."); 
        }
		

		if(($_POST['password']) != ($_POST['repassword'])) 
        { 
            die("The password and confirmation password do not match."); 
        } 
		
        // Make sure the user entered a valid E-Mail address 
        // filter_var is a useful PHP function for validating form input, see: 
        // http://us.php.net/manual/en/function.filter-var.php 
        // http://us.php.net/manual/en/filter.filters.php 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        // We will use this SQL query to see whether the username entered by the 
        // user is already in use.  A SELECT query is used to retrieve data from the database. 
        // :username is a special token, we will substitute a real value in its place when 
        // we execute the query. 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        // This contains the definitions for any special tokens that we place in 
        // our SQL query.  In this case, we are defining a value for the token 
        // :username.  It is possible to insert $_POST['username'] directly into 
        // your $query string; however doing so is very insecure and opens your 
        // code up to SQL injection exploits.  Using tokens prevents this. 
        // For more information on SQL injections, see Wikipedia: 
        // http://en.wikipedia.org/wiki/SQL_Injection 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // These two statements run the query against your database table. 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // The fetch() method returns an array representing the "next" row from 
        // the selected results, or false if there are no more rows to fetch. 
        $row = $stmt->fetch(); 
         
        // If a row was returned, then we know a matching username was found in 
        // the database already and we should not allow the user to continue. 
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        // Now we perform the same type of check for the email address, in order 
        // to ensure that it is unique. 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        // An INSERT query is used to add new rows to a database table. 
        // Again, we are using special tokens (technically called parameters) to 
        // protect against SQL injection attacks. 
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email,
				firstname,
				lastname,
				gender,
				department,
				position,
				tel,
				type
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email,
				:firstname,
				:lastname,
				:gender,
				:department,
				:position,
				:tel,
				:type
            ) 
        "; 
		
       
        // A salt is randomly generated here to protect again brute force attacks 
        // and rainbow table attacks.  The following statement generates a hex 
        // representation of an 8 byte salt.  Representing this in hex provides 
        // no additional security, but makes it easier for humans to read. 
        // For more information: 
        // http://en.wikipedia.org/wiki/Salt_%28cryptography%29 
        // http://en.wikipedia.org/wiki/Brute-force_attack 
        // http://en.wikipedia.org/wiki/Rainbow_table 
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // This hashes the password with the salt so that it can be stored securely 
        // in your database.  The output of this next statement is a 64 byte hex 
        // string representing the 32 byte sha256 hash of the password.  The original 
        // password cannot be recovered from the hash.  For more information: 
        // http://en.wikipedia.org/wiki/Cryptographic_hash_function 
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        // Next we hash the hash value 65536 more times.  The purpose of this is to 
        // protect against brute force attacks.  Now an attacker must compute the hash 65537 
        // times for each guess they make against a password, whereas if the password 
        // were hashed only once the attacker would have been able to make 65537 different  
        // guesses in the same amount of time instead of only one. 
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
		        
        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it.  We do store 
        // the salt (in its plaintext form; this is not a security risk). 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] ,
            ':firstname' => $_POST['firstname'] ,
            ':lastname' => $_POST['lastname'] ,
            ':gender' => $_POST['gender'] ,
            ':department' => $_POST['department'] ,
            ':position' => $_POST['position'] ,
            ':tel' => $_POST['tel'] ,
            ':type' => $_POST['types'] 
			
        ); 
		         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This redirects the user back to the login page after they register 
        header("Location: member/login.php"); 
         
        // Calling die or exit after performing a redirect using the header function 
        // is critical.  The rest of your PHP script will continue to execute and 
        // will be sent to the user if you do not die or exit. 
        die("Redirecting to member/login.php"); 
    } 
     
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
    $("#menu-admin a:eq(4)").addClass("active");

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
                  <h3>เพิ่มผู้ใช้งาน</h3>
                   <hr>
				    <form action="register.php" method="post"> 
						<div class="row">
						
						<div class="col-md-6">
							
							<input id="text1" class="form-control " type="text" name="firstname" placeholder="ชื่อ"/><br>
							<select id="gender" class="form-control " name="gender" >
								<option value="0">-- เพศ --</option>
								<option value="male">ชาย</option>
								<option value="female">หญิง</option>
							</select><br>
							<input id="text1" class="form-control " type="text" name="position"   placeholder="ตำแหน่ง"/><br>
							<input id="text1" class="form-control " type="email" name="email" placeholder="E-mail"/><br>
							<input id="text1" class="form-control " type="password" name="password" placeholder="Create a password"/><br>
							
							<select id="type" class="form-control "  name="types">
							<option value="0">สำหรับพนักงานทั่วไป</option>
							<option value="1">สำหรับผู้บริหาร</option>
							<option value="2">สำหรับเจ้าหน้าที่พัสดุ</option>
							</select><br>
							
							
						</div>
						<div class="col-md-6">
							
							<input id="text1" class="form-control " type="text" name="lastname" placeholder="นามสกุล"/><br>
							<input id="text1" class="form-control "  type="text" name="department" placeholder="แผนก"/><br>
							<input id="text1" class="form-control "  type="text" name="tel" placeholder="เบอร์โทรศัพท์"/><br>
							<input id="text1" class="form-control " type="text" name="username" placeholder="Username"/><br>
							<input id="text1" class="form-control " type="password" name="repassword" placeholder="Re enter password"/><br>
							
						</div>
					  </div>
					  <br>
					  <div class="row">
						
						<div class="col-xs-6 col-md-4">
						</div>
						
						<div class="col-xs-6 col-md-4">
							<button id="confirm"  type="submit" class="btn btn-block btn btn-success">Register</button>
						</div>
						
						<div class="col-xs-6 col-md-4">
						</div>
						
					  </div>
					</form>
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
	