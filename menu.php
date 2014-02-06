<?php
echo'
<a href="main.php" title=""><img src="pic/Untitled-1.png" alt="Logo"></a>

<br />
<br />
<div class="carrot-nav">
    <ul>
        <li><a href="#">คู่มือการใช้งาน</a>
        </li>
        <li><a href="edit_account.php">บัญชีผู้ใช้งาน</a>
        </li>
        <li><a href="#">ติดต่อ</a>
        </li>
        <li><a href="member/logout.php">ออกจากระบบ</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
<br>
<div class="row">
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="panel panel-carot">
            <div class="panel-heading">
                 <h3 class="panel-title">เมนู</h3>

            </div>
            <div id="menu-user" class="list-group"> <a href="widenmaterial.php" class="list-group-item">เบิกวัสดุ</a>
 <a href="remaining.php" class="list-group-item">ดูจำนวนวัสดุคงเหลือ</a>
 <a href="track.php" class="list-group-item">ตรวจสอบสถานะ</a>
 <a href="report.php" class="list-group-item">ดูรายงานการเบิก</a>

            </div>
        </div>
        <div class="panel panel-carot">
            <div class="panel-heading">
                 <h3 class="panel-title">สำหรับเจ้าหน้าที่พัสดุ</h3>

            </div>
            <div id="menu-admin" class="list-group"> <a href="imports.php" class="list-group-item">นำเข้าวัสดุ</a>
 <a href="closeout.php" class="list-group-item">ดูวัสดุใกล้หมด</a>
 <a href="approve.php" class="list-group-item">อนุมัติการเบิก</a>
 <a href="print.php" class="list-group-item">พิมพ์ใบเบิกจ่าย</a>
 <a href="register.php" class="list-group-item">เพิ่มผู้ใช้งาน</a>
 <a href="reports.php" class="list-group-item">ดูรายงาน</a>

            </div>
        </div>
    </div>';
?>