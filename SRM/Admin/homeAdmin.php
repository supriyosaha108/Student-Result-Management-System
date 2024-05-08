<?php 
if(isset($_COOKIE['SRM14A'])==false){ header("Location:loginAdmin.php"); }
include("connection.php");
$res = mysqli_query($con, "select * from Admin_login where username='".$_COOKIE['SRM14A']."'"); $result_array = mysqli_fetch_assoc($res);
file_put_contents("images/temp.bin",hex2bin($result_array['pic']));
?>

<html>
<head> <link rel="stylesheet" href="CSS/homeAdmin.css"> </head>
<body> <div id="outer"><div id="top"><div id="search">
<img src="images/search.png" alt="" id="sicon">
<input type="text" id="stext" placeholder="Student Result Management System" spellcheck="false" readonly>
</div>
<img src="images/mail.png" alt="" id="mail" onclick="location.href = 'mailto:helpdesk@srms.com';"> <img src="images/noti.png" alt="" id="noti" onclick="location.href = 'Tel:0000000000';"> <img src="images/help.png" alt="" id="help" onclick="window.open('https://wa.me/0000000000', '', 'width=600,height=300');">
</div>

<div id="side"><center> <img src="images/temp.bin" alt="" id="dp"> <br><br><br> <div id="n1"><?php echo $result_array['name']; ?> <br> 
<span style="font-size: 14px; color: rgb(135,171,211); position: relative; top: 3px;">Senior Administrator</span>
</div></center> <br><br><br>
<div id="menu1" class="menu"><img src="images/dash.png" alt="" class="menuimg"><span class="menuitems" onclick="javascript:ldpage('dashboard.php');"> Dashboard</span></div>
<div id="menu1" class="menu"><img src="images/Student.PNG" alt="" class="menuimg"><span class="menuitems" onclick="javascript:showStudent()"> Student </span></div>
<div id="menu1" class="menu"><img src="images/result.png" alt="" class="menuimg"><span class="menuitems" onclick="javascript:showResult()"> Class Results&nbsp;</span></div>
<div id="menu1" class="menu"><img src="images/subject.png" alt="" class="menuimg"><span class="menuitems" onclick="javascript:ldpage('modifySubject.php');"> Modify Subjects </span></div>
<div id="menu1" class="menu"><img src="images/settings.png" alt="" class="menuimg"><span class="menuitems" onclick="javascript:ldpage('settings.php');"> Settings &nbsp;&nbsp;</span></div>
<div id="menu1" class="menu"><img src="images/logout.png" alt="" class="menuimg"><span class="menuitems" onclick="location.href='logout.php'"> Logout &nbsp; &nbsp; &nbsp;</span></div></div>

<div id="content">
<div id="welcome"> Welcome back, <?php echo explode(" ",$result_array['name'])[0]; ?>!</div>
<div id="wdesc">Here's your complete summary</div>
<br>
<iframe id="frm1" src="dashboard.php" frameborder="0"></iframe>
</div>

<div id="studentsubtab">
<div id="tab2">
<img src="images/plus.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('addStudent.php');">Add Student</a> <br>
<img src="images/add.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('updateStudent.php');">Update Student</a><br>
<img src="images/view.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('viewStudent.php');">View Student</a><br>
<img src="images/remove.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('deleteStudent.php');">Delete Student</a>
</div></div>

<div id="resultsubtab">
<div id="tab2">
<img src="images/plus.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('addResult.php');">Add Result</a> <br>
<img src="images/add.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('updateResult.php');">Update Result</a><br>
<img src="images/view.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('displayResult.php');">View Result</a><br>
<img src="images/remove.png" alt="" height="20px"; width="20px";> &nbsp; <a href="javascript:ldpage('deleteResult.php');">Remove Result</a>
</div></div>
<script src="css/homeAdmin.js"></script>
</div>
</body>
</html>