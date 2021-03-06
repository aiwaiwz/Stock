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

var username = "<?php echo $_SESSION['user']['username']; ?>";

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
    //var wpm = document.getElementById('class').options[i].text;
    var sex = document.getElementById('value').value;
    //var queryString = "?id=" + type;
	
    var queryString  =  "?materialid=" + type + "&number=" + sex + "&username=" + username;
	console.log(queryString);
    if (select == true) {
        ajaxRequest.open("GET", "ajax/temp_imports.php?username="+ username , true);
    } else {
        ajaxRequest.open("GET", "ajax/temp_imports.php" + queryString, true);
    }
    ajaxRequest.send(null);

}


    function deleteItembyUser(){
        var theUrl ="order/deleteimport.php?type=ALL&name="+username;
        var xmlHttp = null;
        xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false );
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }

    function saveorder(){
        var theUrl ="saveimport.php?name="+username;
        var xmlHttp = null;
        xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", theUrl, false );
        xmlHttp.send( null );
        return xmlHttp.responseText;
    }


</script>


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).ready(function () { // ran when the document is fully loaded


  $("#menu-admin a:eq(0)").addClass("active");

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

    $("#deleteall").click(function () {
        
        if (confirm("Do you want to delete all ?")){
            deleteItembyUser();
        }
    });


    $("#confirm").click(function () {
        if (confirm("Do you want to save order ?")){
            saveorder();
           // $("#select-material" ).hide();
            //$("#selected-material" ).hide();
            //$("#summary-material" ).hide();
            //$("#save-material" ).show();
            deleteItembyUser();
        }
    });

 
}); // close the ready listener
});//]]>  


</script>
    

</head>

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

<body>
    

<div class="container">    
    

    
</div>
<br>
<div class="container">  
    
<? require "menu.php"; ?>	
    
    
        
        <div class="col-xs-11 col-sm-9" >

            <div class="panel panel-carot">

              <div class="panel-body">
                  <h3>เลือกรายการวัสดุที่ต้องการนำเข้า</h3>
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
            <option value="">--เลือกชนิดของวัสดุ--</option>
            </select>
                    </div></div>
                           
                           
                  <div class="col-xs-6 col-md-4">
                       <div class="form-group">
                       <label class="right">จำนวนที่ต้องการเพิ่ม</label>
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
                  <h3>รายการวัสดุที่ท่านนำเข้า</h3>
                   <hr>
           
					  <div id='ajaxDiv'></div>
					  <hr>
         

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