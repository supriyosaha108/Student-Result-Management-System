<?php if(isset($_COOKIE['SRM14A'])){ header("Location:loginAdmin.php"); } ?>
<html>
<head>
<link rel="stylesheet" href="CSS/loginAdmin.css">
<script src="CSS/Dialog.js"></script>
<link rel="stylesheet" href="CSS/Dialog.css">
</head>

<body>
<div class="bg"></div>
<div id="home">
<div class="headingparent">
<div class="heading"><h1>Student Result <br> Management System</h1></div>
<div class="subheading">We not only show results, we build future...</div>
</div>
<div class="maindiv" style="height: 382px;">
<div class="mainheader">
<h1>Hi there...</h1><font style="color:grey; position: relative; top: -15px;">Please sign in to continue.</font>
</div>
<div class="mainform" style="margin-top: 20px;">
<form action="" method="POST" autocomplete="off">
<input class="frm-textbox" type="text" name="username" placeholder="Mobile number or username" required><br>
<input class="frm-textbox" type="password" name="password" placeholder="New Password" required><br>
<input class="frm-textbox" type="password" name="Sec" placeholder="Security Key" required><br><br>
<input type="submit" class="subbut" name="submit" value="Set Password">
<span style="font-family: helvetica; position: relative; font-size: small;"><br><br><br>
If you are an administrator, please <a href="loginAdmin.php" style="text-decoration: none;"><b>click here</b></a> to login.</span>
</form></div></div></div></div>

 <!-- Dialog box -->
<div class='dialogbackground' id='dialogbackground'></div> 
<div class='dialogbox' id='dialogbox'>
<div class='dialogtitlebar' id='dialogtitlebar'>Sample Dialogbox</div>
<center><p id='dialogcontent' >Sample text</p></center>
<center><button class='dialogbtn' onclick='hidedialogbox();''>OKAY</button></center>
</div>

<?php include("connection.php");
if(isset($_POST['submit'])) {
$res = mysqli_query($con, "select * from Admin_login where username='".$_POST['username']."'");
$res1 = mysqli_fetch_assoc($res);  
if($_POST['Sec']=='123') {      
if($res1 !== null) { 
$s = "update Admin_login set password='".$_POST['password']."' where username='".$_POST['username']."'";
$s1=mysqli_query($con,$s);
if(!$s1){echo'<script>setdialogbox("password updation failure","Password Updation");</script>';}
else{echo'<script>setdialogbox("Password is updated Successfully","Password Updation");</script>'; }
}}
else {echo '<script>setdialogbox("Invalid Security key","Security Key");</script>';}} ?>
<a href="../index.html"><img src="images/home.png" alt="" style="position: absolute;left:10px; top:10px; height:50px; width:50px;"></a>
</body>
</html>