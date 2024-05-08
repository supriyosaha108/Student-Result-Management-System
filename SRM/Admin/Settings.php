<html>
<head><link rel="stylesheet" href="CSS/forms.css">
<style>.resulttable{ cursor:default; }</style>
    <center> 
</head>
<body>
<h1>Admin Updation Form</h1>   
<?php
include("connection.php");
$user=$_COOKIE['SRM14A'];
    $sql="select * from admin_login where username='$user' ";
    $data=mysqli_query($con,$sql) or die("will not work");
    $res=mysqli_fetch_assoc($data);
$n=$res['name'];$ps=$res['password'];  $gn=$res['gender'];
?>
<div> <form action='' method='POST'>
<div class='section1'><table id='subtable'><tr>
<label> Name: </label>
<input type='text' id='FName' name='name' placeholder='First name' value='<?php echo $n; ?>' required>&nbsp &nbsp
<label> Password: </label>
<input  type='password'id='Pass' name='password' placeholder='New password' value='<?php  echo $ps; ?>' required>&nbsp &nbsp
<label>Gender : </label>
<select name='gender' required>
<option value=<?php echo $gn;?> hidden selected><?php echo $gn; ?></option>
<option value='male'>male</option>
<option value='female'>female</option></select><br><br>
<input type='submit' name='update' value='Update Details'></center></tr></table></div></form>
<?php
if(isset($_POST['update']))
 { 
 $a1=$_POST['name'];
 $a3=$_POST['password'];
 $a5 = $_POST['gender'];
 $sql="update  admin_login set name='$a1',password='$a3', gender='$a5' where username='$user'";
$result=mysqli_query($con,$sql) or die('Updation Failed');
echo "<script> alert('Update Successful');  window.location.href='Settings.php'; </script>";
 }
 ?>
 </center>
 </body>
 </html>
 