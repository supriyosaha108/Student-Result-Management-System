<?php if(isset($_COOKIE['SRM14S'])){ header("Location:homeStudent.php"); } ?>

<html>
<head>
<link rel="stylesheet" href="CSS/loginStudent.css">
<script src="CSS/Dialog.js"></script>
<link rel="stylesheet" href="CSS/Dialog.css">
</head>

<body>
<div class="bg"></div>
<div id="home">
<div class="headingparent">
<div class="heading"><h1 style="font-family: cursive;">Student Result <br> Management System</h1></div>
<div class="subheading">We not only show results, we build future...</div>
</div>
<div class="maindiv">
<div class="mainheader">
<h1>Hi there...</h1>
<font style="color:lightgrey; position: relative; font-family: cursive; top: -15px;">Please sign in to continue.</font>
</div>
<div class="mainform" style="margin-top: 20px;">
<form action="" method="POST" autocomplete="off">
<input class="frm-textbox" type="text" name="reg" placeholder="Registration Number" required><br>
<input class="frm-textbox" type="password" name="pass" placeholder="Password" required><br>
<br><input type="submit" class="subbut" name="submit" value="Login">
</form>
</div>
</div>
</div>
</div>

<!-- Dialog box -->
<div class='dialogbackground' id='dialogbackground'></div> 
<div class='dialogbox' id='dialogbox'>
<div class='dialogtitlebar' id='dialogtitlebar'>Sample Dialogbox</div>
<center><p id='dialogcontent' >Sample text</p></center>
<center><button class='dialogbtn' onclick='hidedialogbox();''>OKAY</button></center>
</div>

<?php
include("connection.php");
if(isset($_POST['submit'])) {
$res = mysqli_query($con, "select * from student where reg='".$_POST['reg']."' and pass='".$_POST['pass']."'");
$res1 = mysqli_fetch_assoc($res);            
if($res1 !== null){ 
setcookie('SRM14S',$_POST['reg'],time() + (86400 * 30), "/"); 
header("Location:homeStudent.php");
}
else {
echo '<script>setdialogbox("Invalid Registration Number or Password", "Login Failure");</script>';
}
}
?>
<a href="../index.html"><img src="images/home.png" alt="" style="position: absolute;left:10px; top:10px; height:50px; width:50px;"></a>
</body>
</html>