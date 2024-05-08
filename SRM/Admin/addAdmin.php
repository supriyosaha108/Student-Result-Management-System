<html>
<head>
<link rel="stylesheet" href="CSS/addAdmin.css">
<link rel="stylesheet" href="CSS/Dialog.css">
<script src="CSS/Dialog.js"></script>
<script>
function loadFile(event) { 
    var image = document.getElementById('dp'); 
    if(event.target.files[0] != null) {image.src = URL.createObjectURL(event.target.files[0]);}
    else {image.src = 'images/dp.jpg'; } }
</script>
</head>
<body>
<div class="bg"></div>
<div id="home">
<div class="headingparent">
<div class="heading"><h1>Student Result <br> Management System</h1></div>
<div class="subheading">We not only show results, we build future...</div>
</div>
<div class="maindiv">
<div class="mainheader">
<h1>Hi there...</h1>
<font style="color:grey; position: relative; top: -15px;">Let us know something about you.</font>
</div>
<div class="mainform">
<img src="images/dp.jpg" alt="" class="dp" id="dp"> <br> <br>
<form action="" method="POST" autocomplete="off" enctype='multipart/form-data'>
<input class="frm-textbox" style="width: 44.5%;" type="text" id="FName" name="FName" placeholder="First name" required>
<input class="frm-textbox" style="width: 44.5%;" type="text" id="SName" name="SName" placeholder="Surname" required><br>
<input class="frm-textbox" type="text" name="User" id="User" placeholder="Mobile number or username" required><br>
<input class="frm-textbox" type="password" id="Pass" name="Pass" placeholder="New password" required><br>
<input class="frm-textbox" type="password" id="Sec" name="Sec" placeholder="Security key" required><br>
<span class="spa">
    <label class="radl" for="gender">Male</label>
    <input type="radio" class="rad" name="Gender" value="male" id="gender" required>
</span> &nbsp
<span class="spa">
    <label class="radl" for="gender1">Female</label>
    <input type="radio" class="rad" name="Gender" value="female" id="gender1" required>
</span> 
<label class="file1">Upload Image<input class="file1" type="file" name="pic" value="pic" accept="image/*" onchange="loadFile(event)"></label>
<br><br><br>
<input type="submit" class="subbut" name="Sub" value="Create account">
</form>
<span class="ifadmin">
    If you are an administrator, please <a href="loginAdmin.php" style="text-decoration: none;"><b>click here</b></a> to login.
</span>
</div>
</div>
</div>

 <!-- Dialog box -->
<div class='dialogbackground' id='dialogbackground'></div> 
<div class='dialogbox' id='dialogbox'>
<div class='dialogtitlebar' id='dialogtitlebar'>Sample Dialogbox</div>
<center><p id='dialogcontent' >Sample text</p></center>
<center><button class='dialogbtn' onclick='hidedialogbox();'>OKAY</button></center>
</div> 

<?php
include("connection.php");
if(mysqli_query($con, "select 1 from Admin_login")==false) {
$sql="create table Admin_login(name varchar(50), username varchar(50), password varchar(50), gender varchar(10), pic longblob, Primary Key(username));";
$result=mysqli_query($con,$sql)or die("not created");
}
if(isset($_POST['Sub']))
{
$a11 = $_POST['FName']; $a12 = $_POST['SName']; $a1 = $a11." ".$a12;
$a2 = $_POST['User'];
$a3=$_POST['Pass'];
$a4=$_POST['Sec'];
$a5 = $_POST['Gender'];
if ($_FILES['pic']['tmp_name'] == null or $_FILES['pic']['size']>512000) {
if($_FILES['pic']['tmp_name'] == null){echo "<script>setdialogbox('Please upload an image.', 'SRM');</script>";}
else {echo "<script>setdialogbox('Maximum allowed image size is 500 KB.', 'SRM');</script>";}
echo "<script>
document.getElementById('FName').value='$a11';
document.getElementById('SName').value='$a12';
document.getElementById('User').value='$a2';
document.getElementById('Pass').value='$a3';
document.getElementById('Sec').value='$a4';
if('$a5'=='male') { document.getElementById('gender').checked = true;  }
else { document.getElementById('gender1').checked = true;  }
</script>"; die(""); 
} 
$a6 = bin2hex(file_get_contents($_FILES['pic']['tmp_name'])); 
$sql="insert into Admin_login values('$a1','$a2','$a3','$a5','$a6');";
$sql1=mysqli_query($con,$sql);
if($sql1 and $a4=='123')
{
    echo '<script>setdialogbox("Registration successful.", "SRM");</script>';
    header( "refresh:2;url=loginAdmin.php" );
}
else { 
    if($a4 !== '123'){ echo '<script>setdialogbox("Invalid Security Code", "SRM");</script>'; }
    else { echo '<script>setdialogbox("User already exists", "SRM");</script>'; }
}
}
?>
<a href="../index.html"><img src="images/home.png" alt="" style="position: absolute;left:10px; top:10px; height:50px; width:50px;"></a>
</body>
</html>