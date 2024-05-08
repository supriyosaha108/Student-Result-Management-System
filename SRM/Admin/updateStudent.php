<html><body>
<head>
<link rel="stylesheet" href="CSS/forms.css">
<link rel="stylesheet" href="CSS/addStudent.css">
<style>
#subtable{margin-left: 18%;}
#subtable input[type='text']:read-only{border: none; background-color: transparent; outline: none; cursor:default; margin: -5px;}
</style>
</head>
<script> function loadFile(event) { var image = document.getElementById('dp');
if(event.target.files[0]!=null){ image.src = URL.createObjectURL(event.target.files[0]); }
else{image.src='images/dp.jpg'}}</script>
<h1>Student Updation Form</h2>
<form action='' enctype='multipart/form-data' method='POST'>
<div class="section1"><center>
<label for=reg>Registration Number : </label>&nbsp
<input type='text' name='reg' placeholder='Enter here to search' id='reg' value="<?php echo isset($_POST['reg'])?$_POST['reg']:''?>" autocomplete="off" required>&nbsp &nbsp
<input type='submit' value='Fetch Details' name='sub' id='subbb'></center></div>
<?php
include("connection.php");
function study($n,$ps,$rl,$sc,$rg,$dobs,$cl,$em,$gn,$st,$hs,$add,$ph){
echo "
<div class='section1'> <table> <tr> 
<!-- Name Roll Password -->
<td><label for='name'>Name : </label></td>
<td><input required type='text' name='name' placeholder='Name' value='$n'></td>

<td ><label for='roll'>Roll Number : </label></td>
<td><input  required type='number' name='roll' placeholder='Roll' value='$rl'></td>
<td><label for='password'>Password : </label></td>
<td><input  required type='password'name='pass'placeholder='Password' value='$ps'></td>
</tr> 
<!-- Gender, DOB -->
<tr>
<td ><label>Gender : </label></td>
<td><select name='gender' style='height:auto;width:170px;' required>
<option value='$gn' hidden selected>$gn</option>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
<option value='Others'>Others</option> </select></td>
<td ><label> Date of birth : </label></td>
<td ><input  required type='date'name='DOB' placeholder='Date of birth' value='$dobs' style='height:auto;width:170px;'><br> 
</tr> </table> </div>

<div class='section1'> <table> <tr>
<!-- Email, phoneno, house -->
<tr>
<td><label>Email address : </label></td>
<td><input  required type='text'name='email'placeholder='Enter Your Emailid' value='$em'></td>
<td ><label>Phone : </label></td>
<td ><input required  type='tel' pattern='[0-9]{10}' name='phone' placeholder='Phone Number' value='$ph'><td >
<td ><label for='house' name='hou'>House : </label></td>
<td><select name='house' style='height:auto;width:170px;' required>
<option value='$hs' hidden selected>$hs</option>
<option value='Red'>Red</option>
<option value='Green'>Green</option>
<option value='Blue'>Blue</option>
<option value='Yellow'>Yellow</option> </select> </td></tr></table> 
<!-- Address and DP -->
<table><tr>
<td><label id='l1'>Enter Address : </label></td>
<td><textarea class='textarea' name='address' placeholder='Permanent Address' spellcheck='false' required>$add </textarea></td>
<td rowspan=2><img src='temp.bin' alt='' id='dp'>
<label class='file1' >Upload Image<input class='file1' type='file' name='pic' value='pic' accept=image/*' onchange='loadFile(event)'></label> </td> </tr>
</table></div>
<!-- Class Sec Stream -->
<div class='section1'> <table> <tr>
<tr>
<td><label for='class'>Class : </label></td>
<td><select onchange='this.form.submit()' name='class' id='class' style='height:auto;width:170px;' required ><option value='$cl' selected hidden>$cl</option>  <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option><option value='4'>4</option> <option value='5'>5</option> <option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option> <option value='11'>11</option><option value='12'>12</option> </select></td>
<td>
<select name='section' style='height:auto;width:170px;' required>
<option value='$sc' hidden selected >$sc</option>
<option value='A'>A</option>
<option value='B'>B</option>
<option value='C'>C</option> </select>
</td>
<td><label for='stream' style='margin-left: 20px;'>Stream : </label></td>
<td>
<select onchange='this.form.submit()' name='stream' id='stream' style='height:auto;width:170px;' required>
<option value='$st' hidden selected>$st</option>
<option value='None'>None</option>
<option value='Science'>Science</option>
<option value='Commerce'>Commerce</option> 
<option value='Arts'>Arts</option></select>
</td></tr></table> <br>"; 
}
function project($f5,$se5,$th5,$fou5,$fif5,$six,$sev5,$ei,$nin5,$ten5,$ele5,$twe5,$thir5,$four5,$cl,$st,$res2,$h2){
echo "<table id='subtable'><tr><th>Subject Number</th><th>Subject Name</th></tr>";
if($cl==6 or $cl==7 or $cl==8){
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first' readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5' name='second' readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><select name='fourth'required>";
if($h2==1){echo"<option value='$fou5' hidden selected>$fou5</option>";}
$x5=explode('/',$res2['fourth']);
for($i=0;$i<sizeof($x5);$i++){
echo"<option value='".$x5[$i]."' > ".$x5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth' readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth'  readonly></td></tr>
<tr><td>7th Subject</td><td><input type='text'value='$sev5' name='seventh'  readonly></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight'  readonly></td></tr>
<tr><td>9th Subject</td><td><input type='text'value='$nin5' name='ninth'  readonly></td></tr>
<tr><td>10th Subject</td><td><input type='text'value='$ten5' name='tenth'  readonly></td></tr>
<tr><td>11th Subject</td><td><input type='text'value='$ele5' name='eleventh'  readonly></td></tr>
<tr><td>12th Subject</td><td><input type='text'value='$twe5' name='twelveth'  readonly></td></tr>
<tr><td>13th Subject</td><td><input type='text'value='$thir5' name='thirteen'  readonly></td></tr>
<tr><td>14th Subject</td><td><input type='text'value='$four5' name='fourteen'  readonly></td></tr>";}
if($cl==1 or $cl==3 or $cl==4 or $cl==5){
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first' readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5' name='second' readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><input type='text'value='$fou5' name='fourth'  readonly></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth' readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth' readonly></td></tr>
<tr><td>7th Subject</td><td><input type='text'value='$sev5' name='seventh' readonly></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight' readonly></td></tr>";}
if($cl==2){
echo"<tr><td>1st Subject</td><td><input type='text' value='$f5' name='first' readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5'name='second' readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><input type='text'value='$fou5' name='fourth'  readonly></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth'  readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth'  readonly></td></tr>
<tr><td>7th Subject</td><td><input type='text'value='$sev5' name='seventh'  readonly></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight'  readonly></td></tr>
<tr><td>9th Subject</td><td><input type='text'value='$nin5' name='ninth'  readonly></td></tr>
<tr><td>10th Subject</td><td><input type='text'value='$ten5' name='tenth'  readonly></td></tr>";}
if($cl==9 or $cl==10){
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first' readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5' name='second' readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><input type='text'value='$fou5' name='fourth' readonly></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth' readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth' readonly></td></tr>
<tr><td>7th Subject</td><td><input type='text'value='$sev5' name='seventh' readonly></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight' readonly></td></tr>
<tr><td>9th Subject</td><td><input type='text'value='$nin5' name='ninth' readonly></td></tr>
<tr><td>10th Subject</td><td><select name='tenth'required>";
if($h2==1){echo"<option value='$ten5' hidden selected>$ten5</option>";}
$y1=explode('/',$res2['tenth']);
for($i=0;$i<sizeof($y1);$i++){
echo" <option value='".$y1[$i]."'> ".$y1[$i]. "</option>";}
echo"</select></td></tr>
<tr><td>11th Subject</td><td><input type='text'value='$ele5' name='eleventh' readonly></td></tr>";
}
if($cl==11 or $cl==12){
if($st=='Arts'){
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first'  readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5'name='second'  readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><select name='fourth'required>";
if($h2==1){echo"<option value='$fou5' hidden selected>$fou5</option>";}
$z9=explode('/',$res2['fourth']);
for($i=0;$i<sizeof($z9);$i++){
echo"<option value=' ".$z9[$i]."' >" .$z9[$i]. "</option>";}
echo"</select></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth'  readonly></td></tr>
<tr><td>6th Subject</td><td><select name='sixth'required>";
if($h2==1){echo"<option value='$six' hidden selected>$six</option>";}
$z3=explode('/',$res2['sixth']);
for($i=0;$i<sizeof($z3);$i++){
echo"<option value='".$z3[$i]."' > ".$z3[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>7th Subject</td><td><select name='seventh'required>";
if($h2==1){echo"<option value='$sev5' hidden selected>$sev5</option>";}
$u5=explode('/',$res2['seventh']);
for($i=0;$i<sizeof($u5);$i++){
echo"<option value='".$u5[$i]."' > ".$u5[$i]."</option> ";} 
echo"</select></td></tr></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight'  readonly></td></tr> ";} }
if($cl==11 or $cl==12){
if($st=='Commerce') {
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first'  readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5' name='second'  readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z6=explode('/',$res2['third']);
for($i=0;$i<sizeof($z6);$i++){
echo"<option value='".$z6[$i]."' > ".$z6[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><select name='fourth' required>";
if($h2==1){echo"<option value='$fou5' hidden selected>$fou5</option>";}
$k4=explode('/',$res2['fourth']);
for($i=0;$i<sizeof($k4);$i++){
echo"<option value=' ".$k4[$i]."'>".$k4[$i]. "</option> ";} 
echo"</select></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth'  readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth'  readonly></td></tr>
<tr><td>7th Subject</td><td><input type='text'value='$sev5' name='seventh'  readonly></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight'  readonly></td></tr> "; 
} 
} 
if($cl==11 or $cl==12){
if($st=='Science'){
echo"<tr><td>1st Subject</td><td><input type='text'value='$f5' name='first' readonly></td></tr>
<tr><td>2nd Subject</td><td><input type='text'value='$se5' name='second' readonly></td></tr>
<tr><td>3rd Subject</td><td><select name='third'required>";
if($h2==1){echo"<option value='$th5' hidden selected>$th5</option>";}
$z5=explode('/',$res2['third']);
for($i=0;$i<sizeof($z5);$i++){
echo"<option value='".$z5[$i]."' > ".$z5[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>4th Subject</td><td><input type='text'value='$fou5' name='fourth' readonly></td></tr>
<tr><td>5th Subject</td><td><input type='text'value='$fif5' name='fifth' readonly></td></tr>
<tr><td>6th Subject</td><td><input type='text'value='$six' name='sixth' readonly></td></tr>
<tr><td>7th Subject</td><td><select name='seventh' required>";
if($h2==1){echo"<option value='$sev5' hidden selected>$sev5</option>";}
$z7=explode('/',$res2['seventh']);
for($i=0;$i<sizeof($z7);$i++){
echo"<option value='".$z7[$i]."' > ".$z7[$i]."</option> ";} 
echo"</select></td></tr>
<tr><td>8th Subject</td><td><input type='text'value='$ei' name='eight' readonly></td></tr>"; }
}
echo"</table><center><br><br>
<input type='submit' name='sub9' value='Update Details'>  &nbsp&nbsp
<input type='submit' value='Reset Fields' name='rs' id='res'></center></div></form>";}    

if(isset($_POST['sub'])){
$id=$_POST['reg'];
$sql1="select * from student where reg='$id' ";
$data1=mysqli_query($con,$sql1) or die("will not work");
$res1=mysqli_fetch_assoc($data1);
if($res1==NULL) {
echo "<script>alert('not present in database')</script>"; }
else{  
$sql="select * from student where reg='$id' ";
$data=mysqli_query($con,$sql) or die("will not work");
$res=mysqli_fetch_assoc($data);
file_put_contents("temp.bin",hex2bin($res['image']));
$n= $res['name']; $ps=$res['pass']; $rl=$res['roll']; $sc=$res['section']; $rg=$res['reg']; $dobs=$res['DOB']; $cl=$res['class']; $em=$res['email']; $gn=$res['gender']; $st=$res['stream']; $hs=$res['house']; $add=$res['address']; $ph=$res['phone']; 

$f5=$res['first']; $se5=$res['second']; $th5=$res['third']; $fou5=$res['fourth']; $fif5=$res['fifth']; $six=$res['sixth']; $sev5=$res['seventh']; $ei=$res['eight']; $nin5=$res['ninth']; $ten5=$res['tenth']; $ele5=$res['eleventh']; $twe5=$res['twelveth']; $thir5=$res['thirteen']; $four5=$res['fourteen'];
$sql2="select * from sub6 where class='$cl' and stream='$st' ";
$data2=mysqli_query($con,$sql2) or die (" not work ");
$res2=mysqli_fetch_assoc($data2);

study($n,$ps,$rl,$sc,$rg,$dobs,$cl,$em,$gn,$st,$hs,$add,$ph);

project($f5,$se5,$th5,$fou5,$fif5,$six,$sev5,$ei,$nin5,$ten5,$ele5,$twe5,$thir5,$four5,$cl,$st,$res2,1);

echo"<script> document.getElementById('reg').readOnly=true; document.getElementById('subbb').disabled=true; </script>";
}}
if(isset($_POST['class']) and isset($_POST['stream'])) {   
echo"<script> document.getElementById('reg').readOnly=true; document.getElementById('subbb').disabled=true; </script>";
study($_POST['name'],$_POST['pass'],$_POST['roll'],$_POST['section'],$_POST['reg'],$_POST['DOB'],$_POST['class'],$_POST['email'],$_POST['gender'],$_POST['stream'],$_POST['house'],$_POST['address'],$_POST['phone']);
$dv=$_POST['reg']; $d8=$_POST['class'];  $d7=$_POST['stream'];
if($d8<=10 and $d7=='None'){ }
else if($d8>10 and $d7=='Science' or $d8>10 and $d7=='Arts' or $d8>10 and $d7=='Commerce'){}
else { echo"<script>alert ('Stream Selection is Invalid.'); </script>";  die( '');}
$sql3="select * from sub6 where class='$d8' and stream='$d7' ";
$data3=mysqli_query($con, $sql3) or die ("not work");
$res3=mysqli_fetch_assoc($data3);
project($res3['first'],$res3['second'],$res3['third'],$res3['fourth'],$res3['fifth'],$res3['sixth'],$res3['seventh'],$res3['eight'],$res3['ninth'],$res3['tenth'],$res3['eleventh'],$res3['twelveth'],$res3['thirteen'],$res3['fourteen'],$d8,$d7, $res3, 0);
}
if(isset($_POST['sub9'])){
echo"<script> document.getElementById('reg').readOnly=true; document.getElementById('subbb').disabled=true; </script>";
$id=$_POST["reg"];
$d8=$_POST["class"];
$lola="select * from student where reg='$id'";
$dx=mysqli_query($con,$lola) or die ("will not work");
$res77=mysqli_fetch_assoc($dx);
$cl=$res77['class'];
$checkpost=0;
if($cl==$d8){$checkpost=1;}
if($checkpost==0){
$pp=($d8-1);
$sq="select * from result where reg='$id' and class=$pp ";
$dn=mysqli_query($con,$sq) or die ("will not work");
$res24=mysqli_fetch_array($dn);
if($res24==NUll)
{
   { echo"<script>alert('Student result is not present in database.')</script>"; die(); }
} 
$counter1=0; $sum=0;
for($i=19;$i<=32;$i++)
{
if($res24[$i]!=='' and $res24[$i-14]!=='SUPW & Community Services' and $res24[$i-14]!=='Value ED')
{
$sc3=explode("/",$res24[$i]);
$sum=$sum+$sc3[count($sc3)-1]; 
 $counter1=$counter1+1;}}
 $avg=$sum/$counter1;
if($avg>40){$checkpost=1;}}
if($checkpost==1){
if($_FILES['pic']['size']==0){$a1=bin2hex(file_get_contents('temp.bin'));}
else if ($_FILES['pic']['size']>512000){echo "<script>alert('Maximum allowed image size is 500 KB....')</script>";die('');}
else{ $a1=bin2hex(file_get_contents($_FILES['pic']['tmp_name'])); }
$nm= $_POST['name']; $ps=$_POST['pass']; $rl=$_POST['roll']; $sc=$_POST['section']; $rg=$_POST['reg']; $dobs=$_POST['DOB']; $d8=$_POST['class']; $em=$_POST['email']; $gn=$_POST['gender']; $d7=$_POST['stream']; $hs=$_POST['house']; $add=$_POST['address']; $ph=$_POST['phone'];
if($d8==6 or $d8==7 or $d8==8 ){
$q="update student set house='$hs',name='$nm',class=$d8,section='$sc',stream='$d7',roll='$rl',DOB='$dobs',email='$em',address='$add',phone='$ph',gender='$gn',pass='$ps',image='$a1',first='".$_POST['first']."', second='".$_POST['second']."',third='".$_POST['third']."',fourth='".$_POST['fourth']."',fifth='".$_POST['fifth']."',sixth='".$_POST['sixth']."',seventh='".$_POST['seventh']."',eight='".$_POST['eight']."',ninth='".$_POST['ninth']."',tenth='".$_POST['tenth']."',eleventh='".$_POST['eleventh']."',twelveth='".$_POST['twelveth']."',thirteen='".$_POST['thirteen']."',fourteen='".$_POST['fourteen']."' where reg='$id'";      
}
else if($d8==1 or $d8==3 or $d8==4 or $d8==5){
$q="update student set house='$hs',name='$nm',class=$d8,section='$sc',stream='$d7',roll='$rl',DOB='$dobs',email='$em',address='$add',phone='$ph',gender='$gn',pass='$ps',image='$a1',first='".$_POST['first']."', second='".$_POST['second']."',third='".$_POST['third']."',fourth='".$_POST['fourth']."',fifth='".$_POST['fifth']."',sixth='".$_POST['sixth']."',seventh='".$_POST['seventh']."',eight='".$_POST['eight']."',ninth='',tenth='',eleventh='',twelveth='',thirteen='',fourteen='' where reg='$id'";
}
else if ($d8==2){
$q="update student set house='$hs',name='$nm',class=$d8,section='$sc',stream='$d7',roll='$rl',DOB='$dobs',email='$em',address='$add',phone='$ph',gender='$gn',pass='$ps',image='$a1',first='".$_POST['first']."', second='".$_POST['second']."',third='".$_POST['third']."',fourth='".$_POST['fourth']."',fifth='".$_POST['fifth']."',sixth='".$_POST['sixth']."',seventh='".$_POST['seventh']."',eight='".$_POST['eight']."',ninth='".$_POST['ninth']."',tenth='".$_POST['tenth']."',eleventh='',twelveth='',thirteen='',fourteen='' where reg='$id'";
}
else if($d8==9 or $d8==10){
$q="update student set house='$hs',name='$nm',class=$d8,section='$sc',stream='$d7',roll='$rl',DOB='$dobs',email='$em',address='$add',phone='$ph',gender='$gn',pass='$ps',image='$a1',first='".$_POST['first']."', second='".$_POST['second']."',third='".$_POST['third']."',fourth='".$_POST['fourth']."',fifth='".$_POST['fifth']."',sixth='".$_POST['sixth']."',seventh='".$_POST['seventh']."',eight='".$_POST['eight']."',ninth='".$_POST['ninth']."',tenth='".$_POST['tenth']."',eleventh='".$_POST['eleventh']."',twelveth='',thirteen='',fourteen='' where reg='$id'";
}
else if($d8==11 or $d8==12){
$q="update student set house='$hs',name='$nm',class=$d8,section='$sc',stream='$d7',roll='$rl',DOB='$dobs',email='$em',address='$add',phone='$ph',gender='$gn',pass='$ps',image='$a1',first='".$_POST['first']."', second='".$_POST['second']."',third='".$_POST['third']."',fourth='".$_POST['fourth']."',fifth='".$_POST['fifth']."',sixth='".$_POST['sixth']."',seventh='".$_POST['seventh']."',eight='".$_POST['eight']."',ninth='',tenth='',eleventh='',twelveth='',thirteen='',fourteen='' where reg='$id'";
}
$u=mysqli_query($con,$q) or die('Updation Failure.') ;
echo "<script>alert('Successfully Updated.')</script>";
echo "<script>location.href = 'updateStudent.php';</script>";}
else {echo "<script>alert('Student did not passed in the previous standard.'); </script>";}   
} 
if(isset($_POST["rs"])){
echo '<script>window.location.href = "updateStudent.php";</script>';
}
?> </body></html>