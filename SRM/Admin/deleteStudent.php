<html>
<head><link rel="stylesheet" href="CSS/forms.css">
<style>.resulttable{ cursor:default; }</style>
</head>
<body>
<h1>Student Deletion Form</h1>
<form action=''method='POST'>
<div class="section1"><center>
<label for=reg>Registration Number : </label>&nbsp
<input type='text'name='reg'placeholder='Enter here to search' id='reg' value="<?php echo isset($_POST['reg'])  ? $_POST['reg'] : '' ?>"  required  autocomplete="off"> &nbsp &nbsp
<input type='submit' value='Fetch Details' name='submit' id='subp'>
</center></div>
<?php
include("connection.php");
if(isset($_POST['submit'])){
$a1=$_POST['reg'];
$sql1="select * from student where reg='$a1' ";
$data1=mysqli_query($con,$sql1) or die("will not work");
$res1=mysqli_fetch_assoc($data1);
if($res1==NULL){ echo "<script>alert('not present in database')</script>";}
else{
$sql="select * from student where reg='$a1'";
$data=mysqli_query($con,$sql1) or die("will not work");
$res=mysqli_fetch_assoc($data);
$d1= $res['name']; $e1=$res['pass']; $f1=$res['roll']; $g1=$res['section']; $h1=$res['reg']; $i1=$res['DOB']; $j1=$res['class']; $k1=$res['email']; $l1=$res['gender']; $m1=$res['stream']; $n1=$res['house']; $o1=$res['address']; $p1=$res['phone'];

echo "<form action='' method='POST'>
<div class='section1'><table id='subtable'>
<tr><th>Attributes</th><th>Values</th></tr>
<tr><td>Name</td>  <td>$d1</td></tr>
<tr><td>Registration</td>  <td>$h1</td></tr>
<tr><td>Roll Number</td>  <td>$f1</td></tr>
<tr><td>Class</td> <td>$j1</td></tr>
<tr><td>Section</td> <td>$g1</td></tr>
<tr><td>Stream</td> <td>$m1</td></tr>
<tr><td>Password</td> <td>$e1</td></tr>
<tr><td>Gender</td> <td>$l1</td></tr>
<tr><td>Date of Birth</td> <td>$i1</td></tr>
<tr><td>House</td>  <td>$n1</td></tr>
<tr><td>Email Id</td> <td>$k1</td></tr>
<tr><td>Phone Number</td> <td>$p1</td></tr>
<tr><td>Address</td> <td>$o1</td></tr>
</tr></table><br>
<input type='hidden' name='reg1' value='$a1'>
<center>
<input type='submit' name='Delete' value='Delete Record'> &nbsp&nbsp
<input type='submit' value='Reset Fields' name='rs' id='res'>
<script> document.getElementById('reg').disabled=true; 
document.getElementById('subp').disabled=true; </script>
</center>
</div>
</form>";

}}
if(isset($_POST["Delete"])) {
echo"<script> document.getElementById('reg').disabled=false; 
document.getElementById('subp').disabled=false; </script>"; 	
$auu=$_POST['reg1']; $sql="delete from student where reg='$auu'";
$result=mysqli_query($con,$sql) or die("Deletion Failed");
echo " <script>alert('Removed Succesfully')</script>"; }
if(isset($_POST["rs"])){header("Location: deleteStudent.php");}
?></center></body></html>