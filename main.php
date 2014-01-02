<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  
  
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

</head>

<body>
    

<div class="container">    
    

    
</div>
<br>
<div class="container">  
    
    
    <a href="#" title=""><img src="pic/Untitled-1.png" alt="Logo"></a>
    <br /><br />
    <div class="carrot-nav">
    <ul>
       <li><a href="#">คู่มือการใช้งาน</a></li>
       <li><a href="#">บัญชีผู้ใช้งาน</a></li>
       <li><a href="#">ติดต่อ</a></li>
       <li><a href="#">ออกจากระบบ</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->  
    <br>
    
    <div class="row">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="panel panel-carot">
            <div class="panel-heading">
              <h3 class="panel-title">เมนู</h3>
            </div>
              
            <div class="list-group">
            <a href="widenmaterial.php" class="list-group-item">เบิกวัสดุ</a>
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
        
        <div class="col-xs-11 col-sm-9" >

            <div class="panel panel-carot">

              <div class="panel-body">
                  <h3>Welcome to Stock</h3>
                   <hr>
                   Hello
                   <br>
                   <!-- Standard button -->
                    <button type="button" class="btn btn-default">Default</button>

                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary">Primary</button>

                    <!-- Indicates a successful or positive action -->
                    <button type="button" class="btn btn-success">Success</button>

                    <!-- Contextual button for informational alert messages -->
                    <button type="button" class="btn btn-info">Info</button>

                    <!-- Indicates caution should be taken with this action -->
                    <button type="button" class="btn btn-warning">Warning</button>

                    <!-- Indicates a dangerous or potentially negative action -->
                    <button type="button" class="btn btn-danger">Danger</button>

                    <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
                    <button type="button" class="btn btn-link">Link</button>
                   
              </div>
            </div>
        </div>
        
        
      </div><!--/row-->
</div>


<div class="container">
    <!-- Site footer -->
    <div class="footer">
        <p>&copy; Company 2013</p>
    </div>
</div>
    
<script>

</script>

  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage('resize', "*");
    }
  </script>

</body>

</html>