<html>
<head>
<link rel="stylesheet" href="CSS/forms.css">
<link rel="stylesheet" href="CSS/addStudent.css">
<style>#subtable{margin-left: 18%;}</style>
</head>
<body><?php
    copy("images/dp.jpg","temp.bin");
?>

<h1>Student Registration Form</h1>
<div id='div'><form action='' enctype='multipart/form-data' method='post' autocomplete='off'>
<div class="section1"> <table> <tr>
<!-- Name Roll Reg -->
<td><label for='name'>Name : </label></td>
<td ><input type='text' id='name' placeholder='Name'  name='name' value="<?php echo isset($_POST['name'])  ? $_POST['name'] : '' ?>"  required></td>
<td ><label for='roll'>Roll Number : </label></td>
<td ><input type='number' id='roll' placeholder='Roll'  name='roll' value="<?php echo isset($_POST['roll']) ? $_POST['roll'] : '' ?>"  required>
<td ><label for='reg'>Registration : </label></td>
<td><input type='text' id='reg' placeholder='Registration Number' name='reg' value="<?php echo isset($_POST['reg']) ? $_POST['reg'] : '' ?>"  required></td>
</tr> 
<!-- Gender, DOB, Password -->
<tr>
<td ><label>Gender : </label></td>
<td><select id="s1" name="gender" style='height:auto;width:170px;' required>
<option value="" disabled selected hidden>Select</option>
<option value="Male" <?php echo (isset($_POST['gender']) And $_POST['gender'] === 'Male') ? 'selected' : ''; ?> >Male</option>
<option value="Female" <?php echo (isset($_POST['gender']) And $_POST['gender'] === 'Female') ? 'selected' : ''; ?> >Female</option>
<option value="Others" <?php echo (isset($_POST['gender']) And $_POST['gender'] === 'Others') ? 'selected' : ''; ?> >Others</option></select></td>
<td ><label> Date of birth : </label></td>
<td ><input type='date' id='dob' name='date' placeholder='Date of birth' style='height:auto;width:170px;'  value='<?php echo isset($_POST['date'])  ? $_POST['date'] : '' ?>' required></td>
<td><label for='password'>Password : </label></td>
<td  ><input type='password' id='password' placeholder='Password' name='pass' value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : '' ?>"  required></td>
</tr> </table> </div>

<div class="section1"> <table> <tr>
<!-- Email, phoneno, house -->
<tr>
<td><label>Email address : </label></td>
<td><input id='email'type='text' name='email' placeholder='Email address' value='<?php echo isset($_POST['email'])  ? $_POST['email'] : '' ?>'  required><br></td>
<td ><label>Phone : </label></td>
<td ><input id='phone' type='tel' name='phone' placeholder='Phone Number' value='<?php echo isset($_POST['phone'])  ? $_POST['phone'] : '' ?>'  pattern='[0-9]{10}' required></td>
<td ><label for="hou" name='hou'>House : </label></td>
<td><select id="s2" name="hou" style='height:auto;width:170px;' required>
<option value="" disabled selected hidden>Select</option>
<option value="Red" <?php echo (isset($_POST['hou']) And $_POST['hou'] === 'Red') ? 'selected' : ''; ?> >Red</option>
<option value="Green" <?php echo (isset($_POST['hou']) And $_POST['hou'] === 'Green') ? 'selected' : ''; ?> >Green</option>
<option value="Blue" <?php echo (isset($_POST['hou']) And $_POST['hou'] === 'Blue') ? 'selected' : ''; ?> >Blue</option>
<option value="Yellow" <?php echo (isset($_POST['hou']) And $_POST['hou'] === 'Yellow') ? 'selected' : ''; ?> >Yellow</option></select></td></tr></table> 
<!-- Address and DP -->
<table><tr>
<td><label id='l1'>Enter Address : </label></td>
<td><textarea name='address' id='address' placeholder='Permanent Address' spellcheck="false" required><?php echo isset($_POST['address'])  ? $_POST['address'] : '' ?></textarea></td>
<td rowspan=2><img src='temp.bin'  name='im' id='dp' > 
<label id='lab' class='file1' >Upload Image<input type='file' id='image' accept='image/*'  name="image"  onchange="loadFile(event);"></label>
</td>
</tr>
<script> function loadFile(event) { var image = document.getElementById('dp'); 
if(event.target.files[0]!=null){
image.src = URL.createObjectURL(event.target.files[0]);
}else{image.src ='images/dp.jpg';}}</script>
</table></div>
<!-- Class Sec Stream -->
<div class="section1"> <table> <tr>
<tr>
<td><label for='class'>Class : </label></td>
<td><select id="s3" name="class" style='height:auto;width:170px;' required >
<option value="" disabled selected hidden>Select Class</option>
<?php for ($i=1; $i<=12; $i++) { echo "<option value=$i "; if(isset($_POST['class']) And $_POST['class'] == $i) { echo 'selected'; } echo " >$i</option>"; } ?>
</select></td>
<td>
<select id="s4" name="sec" style='height:auto;width:170px;' required>
<option value="" disabled selected hidden>Select Section</option>
<option value="A" <?php echo (isset($_POST['sec']) And $_POST['sec'] === 'A') ? 'selected' : ''; ?> >A</option>
<option value="B" <?php echo (isset($_POST['sec']) And $_POST['sec'] === 'B') ? 'selected' : ''; ?> >B</option>
<option value="C" <?php echo (isset($_POST['sec']) And $_POST['sec'] === 'C') ? 'selected' : ''; ?> >C</option>
</select></td>
<td><label for="stream" style="margin-left: 35px;">Stream : </label></td><td>
<select id="s5" name="stream" style='height:auto;width:170px;' required>
<option value="" disabled selected hidden>Select</option>
<option value="None" <?php echo (isset($_POST['stream']) And $_POST['stream'] === 'None') ? 'selected' : ''; ?> >None</option>
<option value="Science" <?php echo (isset($_POST['stream']) And $_POST['stream'] === 'Science') ? 'selected' : ''; ?> >Science</option>
<option value="Commerce" <?php echo (isset($_POST['stream']) And $_POST['stream'] === 'Commerce') ? 'selected' : ''; ?> >Commerce</option>
<option value="Arts" <?php echo (isset($_POST['stream']) And $_POST['stream'] === 'Arts') ? 'selected' : ''; ?> >Arts</option></select></td>
  <td colspan="1"></td>
  <td>
  <input type='submit' style="margin-left: 40px;" value='Fetch subject' id='fs' name='FS'>
  </td></tr>
</table> 
</form>


<?php
include('connection.php');echo"<form action='' enctype='multipart/form-data' method='post' autocomplete='off'>";
$name =NULL;$class =NULL;$sec =NULL;$stream =NULL;$roll =NULL;$reg =NULL;$pass =NULL;$house=NULL;$date =NULL;$email =NULL;$address=NULL;$phone=NULL;$gender=NULL;
if(isset($_POST['FS']))
{
if($_FILES['image']['size']==0){echo "<script>alert('please select an image....')</script>";die('');}
if(($_POST['class']==1 and $_POST['stream']!='None') or ($_POST['class']==2 and $_POST['stream']!='None') or ($_POST['class']==3 and $_POST['stream']!='None') or ($_POST['class']==4 and $_POST['stream']!='None') or ($_POST['class']==5 and $_POST['stream']!='None') or ($_POST['class']==6 and $_POST['stream']!='None') or ($_POST['class']==7 and $_POST['stream']!='None') or ($_POST['class']==8 and $_POST['stream']!='None') or ($_POST['class']==9 and $_POST['stream']!='None') or ($_POST['class']==10 and $_POST['stream']!='None')){echo"<script>alert('The class and stream selection is invalid');</script>";die('');}
if(($_POST['class']==11 and $_POST['stream']=='None')or($_POST['class']==12 and $_POST['stream']=='None')){echo"<script>alert('The class and stream selection is invalid');</script>";die('');}
if($_FILES['image']['size']>512000){echo "<script>alert('Maximum allowed image size is 500 KB....')</script>";die('');} 
echo"<script>var x=document.getElementById('fs');x.setAttribute('hidden',true); var x1=document.getElementById('s1');x1.setAttribute('disabled',true);var x2=document.getElementById('s2');x2.setAttribute('disabled',true);var x3=document.getElementById('s3');x3.setAttribute('disabled',true);var x4=document.getElementById('s4');x4.setAttribute('disabled',true);var x5=document.getElementById('s5');x5.setAttribute('disabled',true); var y1=document.getElementById('name');y1.setAttribute('disabled',true);var y2=document.getElementById('roll');y2.setAttribute('disabled',true);var y3=document.getElementById('reg');y3.setAttribute('disabled',true);var y4=document.getElementById('password');y4.setAttribute('disabled',true);var y5=document.getElementById('dob');y5.setAttribute('disabled',true);var z1=document.getElementById('address');z1.setAttribute('disabled',true);var z2=document.getElementById('email');z2.setAttribute('disabled',true);var z3=document.getElementById('phone');
z3.setAttribute('disabled',true); var z4=document.getElementById('image');z4.setAttribute('disabled',true);</script>";
$image = $_FILES['image']['tmp_name']; 
$Content = bin2hex(file_get_contents($image));file_put_contents("temp.bin",hex2bin($Content));
$name = $_POST['name'];$class = $_POST['class'];$sec = $_POST['sec'];$stream = $_POST['stream'];$roll = $_POST['roll'];$reg = $_POST['reg'];$pass = $_POST['pass'];$house=$_POST['hou'];$date = $_POST['date'];$email = $_POST['email'];$address=$_POST['address'];$phone=$_POST['phone'];$gender=$_POST['gender'];
echo"<script>var x=document.getElementById('fs');x.setAttribute('hidden',true);</script>";
if($class==1  or $class==3 or $class==4 or $class==5){if($stream=='None'){
echo "<table id='subtable'><tr><th id='t1' id='t1'>Subject Number</th><th id='t1' id='t1'>Subject Name</th></tr>";
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "
  <tr><td id='t1' id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1' id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr id='t1'><td id='t1'>3rd Subject</td>
  <td id='t1' id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br>
  <tr><td id='t1' id='t1'>4th Subject</td><td id='t1'>".$d['fourth']."</td></tr>
  <tr><td id='t1' id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1' id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>
  <tr><td id='t1' id='t1'>7th Subject</td><td id='t1'>".$d['seventh']."</td></tr>
  <tr><td id='t1' id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr></table>";        }}
  if($class==2){
  echo "<table id='subtable'><tr><th id='t1' id='t1'>Subject Number</th><th id='t1' id='t1'>Subject Name</th></tr>";
  $sql="select * from sub6 where class='$class' and stream='$stream'";
  $data=mysqli_query($con,$sql);
  $d=mysqli_fetch_assoc($data);
  echo "
  <tr><td id='t1' id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1' id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr id='t1'><td id='t1'>3rd Subject</td>
  <td id='t1' id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br>
  <tr><td id='t1' id='t1'>4th Subject</td><td id='t1'>".$d['fourth']."</td></tr>
  <tr><td id='t1' id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1' id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>
  <tr><td id='t1' id='t1'>7th Subject</td><td id='t1'>".$d['seventh']."</td></tr>
  <tr><td id='t1' id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr>
  <tr><td id='t1' id='t1'>9th Subject</td><td id='t1'>".$d['ninth']."</td></tr>
  <tr><td id='t1' id='t1'>10th Subject</td><td id='t1'>".$d['tenth']."</td></tr></table>     ";        }
if($class==6 or $class==7 or $class==8){if($stream=='None'){

echo "<table id='subtable'><tr><th id='t1' id='t1'>Subject Number</th><th id='t1'>Subject Name</th></tr>";
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "<tr><td id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr><td id='t1'>3rd Subject</td>
  <td id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br>
  ";
  $ip=explode('/',$d['fourth']);
  echo"<tr><td id='t1'>4th Subject</td>
  <td id='t1'><select name='sele4'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br> 
  <tr><td id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>
  <tr><td id='t1'>7th Subject</td><td id='t1'>".$d['seventh']."</td></tr>
  <tr><td id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr>
  <tr><td id='t1'>9th Subject</td><td id='t1'>".$d['ninth']."</td></tr>
  <tr><td id='t1'>10th Subject</td><td id='t1'>".$d['tenth']."</td></tr>
  <tr><td id='t1'>11th Subject</td><td id='t1'>".$d['eleventh']."</td></tr>
  <tr><td id='t1'>12th Subject</td><td id='t1'>".$d['twelveth']."</td></tr>
  <tr><td id='t1'>13th Subject</td><td id='t1'>".$d['thirteen']."</td></tr>
  <tr><td id='t1'>14th Subject</td><td id='t1'>".$d['fourteen']."</td></tr></table>";}}
if($class==9 or $class==10){if($stream=='None'){
echo "<table id='subtable'><tr><th id='t1'>Subject Number</th><th id='t1'>Subject Name</th></tr>";
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "<tr><td id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr><td id='t1'>3rd Subject</td>
  <td id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br><tr><td id='t1'>4th Subject</td><td id='t1'>".$d['fourth']."</td></tr>
  <tr><td id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>
  <tr><td id='t1'>7th Subject</td><td id='t1'>".$d['seventh']."</td></tr>
  <tr><td id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr>
  <tr><td id='t1'>9th Subject</td><td id='t1'>".$d['ninth']."</td></tr>";
  $ip=explode('/',$d['tenth']);
  echo"<tr><td id='t1'>10th Subject</td>
  <td id='t1'><select name='sele4'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select><br>  
  <tr><td id='t1'>11th Subject</td><td id='t1'>".$d['eleventh']."</td></tr></table>";} }
if($class==11 or $class==12) {if( $stream=='Arts'){
echo "<br><table id='subtable'><tr><th id='t1'>Subject Number</th><th id='t1'>Subject Name</th></tr>";
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "<input type='hidden' name='CLS' value=$class>
  <tr><td id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr><td id='t1'>3rd Subject</td>
  <td id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>";                      
  $ip=explode('/',$d['fourth']);
  echo"<tr><td id='t1'>4th Subject</td>
  <td id='t1'><select name='sele4'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>
  <tr><td id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td>";
  $ip=explode('/',$d['sixth']);
  echo"<tr><td id='t1'>6th Subject</td>
  <td id='t1'><select name='sele5'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>";
  $ip=explode('/',$d['seventh']);
  echo"<tr><td id='t1'>7th Subject</td>
  <td id='t1'><select name='sele6'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>
  <tr><td id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr></table>";}
if($stream=='Commerce'){             
echo "<table id='subtable'><tr><th id='t1'>Subject Number</th><th id='t1'>Subject Name</th></tr> ";              
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "
  <tr><td id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr><td id='t1'>3rd Subject</td>
  <td id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>";
  $ip=explode('/',$d['fourth']);
  echo"<tr><td id='t1'>4th Subject</td>
  <td id='t1'><select name='sele4'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>
  <tr><td id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>
  <tr><td id='t1'>7th Subject</td><td id='t1'>".$d['seventh']."</td></tr>
  <tr><td id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr></table>";}
if($stream=='Science'){
echo "<table id='subtable'><tr><th id='t1'>Subject Number</th><th id='t1'>Subject Name</th></tr> "; 
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
echo "
  <tr><td id='t1'>1st Subject</td><td id='t1'>".$d['first']."</td></tr>
  <tr><td id='t1'>2nd Subject</td><td id='t1'>".$d['second']."</td></tr>";
  $ip=explode('/',$d['third']);
  echo"<tr><td id='t1'>3rd Subject</td>
  <td id='t1'><select name='sele3'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>
  <tr><td id='t1'>4th Subject</td><td id='t1'>".$d['fourth']."</td></tr>
  <tr><td id='t1'>5th Subject</td><td id='t1'>".$d['fifth']."</td></tr>
  <tr><td id='t1'>6th Subject</td><td id='t1'>".$d['sixth']."</td></tr>";
  $ip=explode('/',$d['seventh']);
  echo"<tr><td id='t1'>7th Subject</td>
  <td id='t1'><select name='sele4'>";
  for($i=0;$i<sizeof($ip);$i++){
  echo"<option value='$ip[$i]'>".$ip[$i]."</option>";
  }
  echo"</td></tr></select>
  <tr><td id='t1'>8th Subject</td><td id='t1'>".$d['eight']."</td></tr></table>";
}}echo"<input type='hidden' name='Image' value=$Content>
<input type='hidden' name='CLS' value=$class >
<input type='hidden' name='REG' value='$reg' >
<input type='hidden' name='ROL' value='$roll' >
<input type='hidden' name='NME' value='$name' >
<input type='hidden' name='SEC' value='$sec' >
<input type='hidden' name='Str' value='$stream' >
<input type='hidden' name='Pss' value='$pass' >
<input type='hidden' name='Hou' value='$house' >
<input type='hidden' name='Date'  value='$date'>
<input type='hidden' name='Email'  value='$email' >
<input type='hidden' name='Address'  value='$address' >
<input type='hidden' name='Phone'  value='$phone' >
<input type='hidden' name='Gender'  value='$gender' >
<center><br><br><input type='submit' name='Add' value='Add Student'>&nbsp&nbsp&nbsp<button onclick=location.href='addStudent.php';>Clear Fields </button><center> </div>";}?></form></div></center></body></html>
<?php
include("connection.php");
if(isset($_POST['Add'])) {
$Content=$_POST['Image'];$name = $_POST['NME'];$class = $_POST['CLS'];$sec = $_POST['SEC'];$stream = $_POST['Str'];$roll = $_POST['ROL'];$reg = $_POST['REG'];$pass=$_POST['Pss'];$house=$_POST['Hou'];$date = $_POST['Date'];$email = $_POST['Email'];$address=$_POST['Address'];$phone=$_POST['Phone'];$gender=$_POST['Gender'];
if(mysqli_query($con,'select 1 from student')==False){ 
$sql = "create table student(house varchar(20),name varchar(20), class varchar(20), section varchar(2), stream varchar(20), roll varchar(20), reg varchar(20),DOB date,email varchar(50),address varchar(100),phone varchar(10),gender varchar(15), pass varchar(20),image longblob,first varchar(100),second varchar(100),third varchar(100),fourth varchar(100),fifth	varchar(100),sixth varchar(100),seventh	varchar(100),eight varchar(100),ninth varchar(100),tenth varchar(100),eleventh varchar(100),twelveth varchar(100),thirteen varchar(100),fourteen varchar(100),fifteen varchar(100),sixteen varchar(100),PRIMARY KEY (reg))";
$res2 = mysqli_query($con, $sql) or die("create table failed");
echo "<script>alert('Insertion successsfully....')</script>";
}$r="select * from student where reg='$reg'";
$r1=mysqli_query($con,$r);
$r2=mysqli_fetch_assoc($r1);
if($r2==NULL){
if($class==1 or $class==2 or $class==3 or $class==4 or $class==5 ){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$d[fourth]','$d[fifth]','$d[sixth]','$d[seventh]','$d[eight]','$d[ninth]','$d[tenth]','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}else{
echo "<script>alert('insertion failed')</script>";
}      
}
if($class==6 or $class==7 or $class==8){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$A2=$_POST['sele4'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$A2','$d[fifth]','$d[sixth]','$d[seventh]','$d[eight]','$d[ninth]','$d[tenth]','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";  
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}
else{
echo "<script>alert('insertion failed')</script>";
} 
}       
if($class==9 or $class==10){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$A2=$_POST['sele4'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$d[fourth]','$d[fifth]','$d[sixth]','$d[seventh]','$d[eight]','$d[ninth]','$A2','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";   
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}
else{
echo "<script>alert('insertion failed')</script>";
}         }
if($class==11 or $class==12) {if( $stream=='Arts'){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$A2=$_POST['sele4'];
$A3=$_POST['sele5'];
$A4=$_POST['sele6'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$A2','$d[fifth]','$A3','$A4','$d[eight]','$d[ninth]','$d[tenth]','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";   
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}
else{
echo "<script>alert('insertion failed')</script>";
} 
}
if($stream=='Commerce'){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$A2=$_POST['sele4'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$A2','$d[fifth]','$d[sixth]','$d[seventh]','$d[eight]','$d[ninth]','$d[tenth]','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}
else{
echo "<script>alert('insertion failed')</script>";
}     }
if($stream=='Science'){
$sql="select * from sub6 where class='$class' and stream='$stream'";
$data=mysqli_query($con,$sql);
$d=mysqli_fetch_assoc($data);
$A1=$_POST['sele3'];
$A2=$_POST['sele4'];
$s="insert into student values('$house','$name',$class,'$sec','$stream','$roll','$reg','$date','$email','$address','$phone','$gender','$pass','$Content','$d[first]','$d[second]','$A1','$d[fourth]','$d[fifth]','$d[sixth]','$A2','$d[eight]','$d[ninth]','$d[tenth]','$d[eleventh]','$d[twelveth]','$d[thirteen]','$d[fourteen]','$d[fifteen]','$d[sixteen]')";
$s1=mysqli_query($con,$s);
if($s1){
echo "<script>alert('Insertion successsfully....')</script>";
}
else{
echo "<script>alert('insertion failed')</script>";
}
}} if(file_exists('temp.bin')==1){
    copy("images/dp.jpg","temp.bin");}
echo"<script>var x=document.getElementById('fs');x.removeAttribute('hidden');var x1=document.getElementById('s1');x1.removeAttribute('disabled');var x2=document.getElementById('s2');x2.removeAttribute('disabled');var x3=document.getElementById('s3');x3.removeAttribute('disabled');var x4=document.getElementById('s4');x4.removeAttribute('disabled');var x5=document.getElementById('s5');x5.removeAttribute('disabled'); var y1=document.getElementById('name');y1.removeAttribute('disabled');var y2=document.getElementById('roll');y2.removeAttribute('disabled');var y3=document.getElementById('reg');y3.removeAttribute('disabled');var y4=document.getElementById('password');y4.removeAttribute('disabled');var y5=document.getElementById('dob');y5.removeAttribute('disabled');var z1=document.getElementById('address');z1.removeAttribute('disabled');var z2=document.getElementById('email');z2.removeAttribute('disabled');var z3=document.getElementById('phone');z3.removeAttribute('disabled'); var z4=document.getElementById('image');z4.removeAttribute('disabled');</script>";}else{
echo "<script>alert('already exists in student table')</script>";
   echo"<script>var x=document.getElementById('fs');x.removeAttribute('hidden');var x1=document.getElementById('s1');x1.removeAttribute('disabled');var x2=document.getElementById('s2');x2.removeAttribute('disabled');var x3=document.getElementById('s3');x3.removeAttribute('disabled');var x4=document.getElementById('s4');x4.removeAttribute('disabled');var x5=document.getElementById('s5');x5.removeAttribute('disabled'); var y1=document.getElementById('name');y1.removeAttribute('disabled');var y2=document.getElementById('roll');y2.removeAttribute('disabled');var y3=document.getElementById('reg');y3.removeAttribute('disabled');var y4=document.getElementById('password');y4.removeAttribute('disabled');var y5=document.getElementById('dob');y5.removeAttribute('disabled');var z1=document.getElementById('address');z1.removeAttribute('disabled');var z2=document.getElementById('email');z2.removeAttribute('disabled');var z3=document.getElementById('phone');z3.removeAttribute('disabled'); var z4=document.getElementById('image');z4.removeAttribute('disabled');</script>";
if(file_exists('temp.bin')==1){
    copy("images/dp.jpg","temp.bin");}
}}
?>