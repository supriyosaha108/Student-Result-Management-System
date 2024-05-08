<?php if(isset($_COOKIE['SRM14S'])==false){ header("Location:loginStudent.php"); }
include("connection.php"); $reg = $_COOKIE['SRM14S'];
$result = mysqli_query($con, "select * from student where reg='$reg'");
$result_arr = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="css/career.css">
<link rel="stylesheet" href="css/transition.css">
<html style='background-color:rgb(32,33,36);'><head></head><body><div class='transition transition-1 is-active'></div><pre>
<!-- Header -->
<div class="topnav">
<ul><li id='li15'><div style='margin-top:-2px;margin-left:-70px;'><a href="Tel:0000000000"> <img class='what' style="height: 20px; width: 20px; margin-right:5px;position:relative; top:-2px " src="raniphotos/whatsapp.png"> <font style="position:relative;  top:-7.5px; font-weight:bold;">+91 0000 0000 00</font></a></div></li>
<li id='li15'><div style='margin-top:-10px;'><a href="mailto:helpdesk@srms.com"><font style='color:white;'>helpdesk@srms.com</font></a></div></li>
<li ><div id='dd2' style='margin-left:520px;margin-top:-20px;'><a href="logout.php" class="split"> <font style="position:relative; top:-24px; font-weight:bold" >Logout </font><img class="logout56" src="images/logout1.jpg" alt=""></a></div></li></ul>
</div>
<!-- Navbar -->
<div class="d1"><div><a href="homestudent.php"><img id='l13' src='images/home1.jpg' style='height:100px; width:100px;border-radius:10px;margin-top:-15px;' ></div>
<div><ul><li ><a href="viewresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:60px; width:60px;border-radius:10px;' ><br><div style='height:6px;'></div><font style='font-family:Calibri;margin-left:-25px;'>Result Classwise</font></div></a></li>
<li ><a href="secondaryresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Secondary/HS Result</font></div></a></li>
<li ><a href="career.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/car.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Career road map</font></div></a></li>
<li ><a href="graph.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/static.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>View Statistics</font></div></a></li>
<li ><a href="yearwise.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/yrwise.jpg' style='height:60px; width:60px;'><br><div style='height:6px;'></div><font style='font-family:calibri;margin-left:-25px;'>Year wise score</font></div></a></li></ul></div>
</div>
<!-- Banner -->
<div id='div59'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<?php
$class = $result_arr['class'];
$lowest = 9999; $highest = 0; $avg11 = 0; $currentclass=0; $countersuper = 0; $sumsuper=0; $avgsuper = 0; $grade = "NA";
for($j=1; $j<=12; $j++){
$counter1 = 0; $sum=0;
$res1 = mysqli_fetch_array(mysqli_query($con, "select * from result where reg='$reg' and class='$j'"));
if($res1 !== null){
for($i=19; $i<=32; $i++){
if($res1[$i]!=='' and $res1[$i-14]!=='SUPW & Community Services' and $res1[$i-14]!=='Value ED') {
$sc = explode("/",$res1[$i]);
$sum = $sum + $sc[count($sc)-1]; $counter1 = $counter1 + 1;
}}
$avg = $sum/$counter1; $countersuper = $countersuper + 1; $sumsuper = $sumsuper + $avg;
if($lowest>$avg) { $lowest=$avg; }
if($highest<$avg){ $highest=$avg; } 
if($j==$class) {$currentclass=$avg;}
}}
$avgsuper = ($sumsuper/$countersuper);
?>
<div id='div25' style='background-color:rgb(30,34,39);margin-top:-5px;'><div id='div25i' style='height:150px;width:280px; background-color:rgb(60,64,67);'><div style='color:white;width:1px;color:lightgray;font-size:15px;margin-left:40px;margin-top:30px;'><?php echo "Lowest Score<br><font style='font-size:30px;'>".round($lowest)."%</font>";?></div><div style='body-align:right;'><?php echo"<canvas id='myChart1' style='width:200%;max-width:600px;font-color:black;'></canvas><script src='css/lowpi.js'></script><script>im1($lowest)</script>";?></div></div>
<div id='div25ii' style='height:150px;width:280px; background-color:rgb(60,64,67);'><div style='color:white;width:1px;color:lightgray;font-size:15px;margin-left:40px;margin-top:30px;'><?php echo "Highest Score<br><font style='font-size:30px;'>".round($highest)."%</font>";?></div><div><?php echo"<canvas id='myChart2' style='width:200%;max-width:600px;font-color:black;'></canvas><script src='css/highpi.js'></script><script>im2($highest)</script>";?></div></div>
<div id='div25iii' style='height:150px;width:280px; background-color:rgb(60,64,67);'><div style='color:white;width:1px;color:lightgray;font-size:15px;margin-left:40px;margin-top:30px;'><?php echo "Average Score<br><font style='font-size:30px;'>".round($avgsuper)."%</font>";?></div><div><?php echo"<canvas id='myChart3' style='width:200%;max-width:600px;font-color:black;'></canvas><script src='css/avgpi.js'></script><script>im3($avgsuper)</script>";?></div></div> 
<div id='div25iv' style='height:150px;width:280px; background-color:rgb(60,64,67);'><div style='color:white;width:1px;color:lightgray;font-size:15px;margin-left:40px;margin-top:30px;'><?php echo "Current Score<br><font style='font-size:30px;'>".round($currentclass)."%</font>";?></div><div><?php echo"<canvas id='myChart4' style='width:150%;max-width:600px;font-color:black;'></canvas><script src='css/curpi.js'></script><script>im4($currentclass)</script>";?></div></div>
<div id='div25v' style='height:150px;width:280px;background-color:rgb(60,64,67);'><div style='color:lightgray;font-size:25px;margin-top:60px;'>&nbsp&nbspGrade:&nbsp</div><div><?php
if($avgsuper < 40){ $grade = "Low";echo"<script>document.getElementById('div25v').style.color='#8B0000';</script>"; } 
elseif($avgsuper >= 40 && $avgsuper < 60){ $grade = "Average"; echo"<script>document.getElementById('div25v').style.color='yellow';</script>"; }
elseif($avgsuper >= 60 && $avgsuper < 80){ $grade = "Good"; echo"<script>document.getElementById('div25v').style.color='green';</script>"; }
elseif($avgsuper >= 80){ $grade = "Excelent"; echo"<script>document.getElementById('div25v').style.color='greenyellow';</script>";}
echo"<div style='height:60px;'></div><label style='font-size:200%;margin-left:30px;'><center>".$grade."</center></label>"; ?></div></div></div>
<div style='background-image:linear-gradient(to right,black,darkgrey);height:97%;align-items:center;border:3px solid white;'>
<div class="fade-in-text"><p>According to your results you can take this suggestion for your career</p></div>
<div class="oval-image">
<p>
<?php include('connection.php');  
$sql="select * from result where reg='$reg' and class=6 ";
$data=mysqli_query($con,$sql)or die ("will not work");
$res=mysqli_fetch_array($data);
echo "<br>";
$cb=[];
$cb1=[];
if($res!==null){
    for($i=19;$i<=32;$i++)
{
if($res[$i]!=='' and $res[$i-14]!=='SUPW & Community Services' and $res[$i-14]!=='Value ED')
{
$sc=explode("/",$res[$i]);
$num[$i-19]=$sc[3]; // stores the  average number of a particular subject.
}}
 for($i=19;$i<=32;$i++)
{
    $name[$i-19]=$res[$i-14]; // store the  subject name.
}
// bubble sort for printing the subject name and  number  in descending order.
for($i=0;$i<sizeof($num);$i++)
{
  for($j=0;$j<sizeof($num)-$i-1;$j++){
  $s1=array($name[$j]=>$num[$j]); // here  key is subject name($name[$j]) and value is number ($num[$j]).
  $s11=array_values($s1);
  if($num[$j]<$num[$j+1])
  {
    $n=$num[$j];
    $n1=$name[$j];
    $num[$j]=$num[$j+1];
    $num[$j+1]=$n;
    $name[$j]=$name[$j+1];
    $name[$j+1]=$n1;
  } 
}}
// print  the top most four values with their corresponding subject name.
$e=0;
for($i=0;$i<=3;$i++)
{
  // echo ($i+1)."th highest subject:".$name[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$num[$i] ."<br>";
  $cb[$e]=$num[$i]; // it 
  $cb1[$e]=$name[$i];
  $e++;
}
}
else{
  echo"<script>alert(' The student has no result of class six');</script>";die();
}
//this is for class 7
$sql="select * from result where reg='$reg' and class=7 ";
$data=mysqli_query($con,$sql)or die ("will not work");
$res=mysqli_fetch_array($data);
//echo "<br>";
if($res!==null){
    for($i=19;$i<=32;$i++)
{
if($res[$i]!=='' and $res[$i-14]!=='SUPW & Community Services' and $res[$i-14]!=='Value ED')
{
$sc=explode("/",$res[$i]);
$num[$i-19]=$sc[3];
}}
for($i=19;$i<=32;$i++)
{
    $name[$i-19]=$res[$i-14];
}
for($i=0;$i<sizeof($num);$i++)
{
  for($j=0;$j<sizeof($num)-$i-1;$j++){
  $s1=array($name[$j]=>$num[$j]);
  $s11=array_values($s1);
  if($num[$j]<$num[$j+1])
  {
    $n=$num[$j];
    $n1=$name[$j];
    $num[$j]=$num[$j+1];
    $num[$j+1]=$n;
    $name[$j]=$name[$j+1];
    $name[$j+1]=$n1;
  } 
}}
for($i=0;$i<=3;$i++)
{
  //  echo ($i+1)."th highest subject:".$name[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$num[$i] ."<br>";
  $cb[$e]=$num[$i];
  $cb1[$e]=$name[$i];
  $e++;
}
}
else{
  echo"<script>alert(' The student has no result of class seven');</script>";die();
}
//this is for class 8
$sql="select * from result where reg='$reg' and class=8 ";
$data=mysqli_query($con,$sql)or die ("will not work");
$res=mysqli_fetch_array($data);
//echo "<br>";
if($res!==null){
    for($i=19;$i<=32;$i++)
{
if($res[$i]!=='' and $res[$i-14]!=='SUPW & Community Services' and $res[$i-14]!=='Value ED')
{
$sc=explode("/",$res[$i]);
$num[$i-19]=$sc[3];
}}
echo "<br>";
for($i=19;$i<=32;$i++)
{
    $name[$i-19]=$res[$i-14];
}
for($i=0;$i<sizeof($num);$i++)
{
  for($j=0;$j<sizeof($num)-$i-1;$j++){
  $s1=array($name[$j]=>$num[$j]);
  $s11=array_values($s1);
  if($num[$j]<$num[$j+1])
  {
    $n=$num[$j];
    $n1=$name[$j];
    $num[$j]=$num[$j+1];
    $num[$j+1]=$n;
    $name[$j]=$name[$j+1];
    $name[$j+1]=$n1;
  } 
}}
for($i=0;$i<=3;$i++)
{
  // echo ($i+1)."th highest subject:".$name[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$num[$i] ."<br>";
  $cb[$e]=$num[$i];
  $cb1[$e]=$name[$i];
  $e++;
}
}
else{
  echo"<script>alert(' The student has no result of class eight');</script>";die();
}
//this is for class 9
$sql="select * from result where reg='$reg' and class=9 ";
$data=mysqli_query($con,$sql)or die ("will not work");
$res=mysqli_fetch_array($data);
//echo "<br>";
if($res!==null){
    for($i=19;$i<=32;$i++)
{
if($res[$i]!=='' and $res[$i-14]!=='SUPW & Community Services' and $res[$i-14]!=='Value ED')
{
$sc=explode("/",$res[$i]);
$num[$i-19]=$sc[3];
}}
echo "<br>";
for($i=19;$i<=32;$i++)
{
    $name[$i-19]=$res[$i-14];
}
for($i=0;$i<sizeof($num);$i++)
{
  for($j=0;$j<sizeof($num)-$i-1;$j++){
  $s1=array($name[$j]=>$num[$j]);
  $s11=array_values($s1);
  if($num[$j]<$num[$j+1])
  {
    $n=$num[$j];
    $n1=$name[$j];
    $num[$j]=$num[$j+1];
    $num[$j+1]=$n;
    $name[$j]=$name[$j+1];
    $name[$j+1]=$n1;
  } 
}}
for($i=0;$i<=3;$i++)
{
  // echo ($i+1)."th highest subject:".$name[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$num[$i] ."<br>";
  $cb[$e]=$num[$i];
  $cb1[$e]=$name[$i];
  $e++;
}
}
else{
  echo"<script>alert(' The student has no result of class nine');</script>";die();
}
//this is for class 10
$sql="select * from result where reg='$reg' and class=10 ";
$data=mysqli_query($con,$sql)or die ("will not work");
$res=mysqli_fetch_array($data);
if($res!==null){
    for($i=19;$i<=32;$i++)
{
if($res[$i]!=='' and $res[$i-14]!=='SUPW & Community Services' and $res[$i-14]!=='Value ED')
{
$sc=explode("/",$res[$i]);
$num[$i-19]=$sc[3];
}}
 for($i=19;$i<=32;$i++)
{
    $name[$i-19]=$res[$i-14];
}
for($i=0;$i<sizeof($num);$i++)
{
  for($j=0;$j<sizeof($num)-$i-1;$j++){
  $s1=array($name[$j]=>$num[$j]);
  $s11=array_values($s1);
  if($num[$j]<$num[$j+1])
  {
    $n=$num[$j];
    $n1=$name[$j];
    $num[$j]=$num[$j+1];
    $num[$j+1]=$n;
    $name[$j]=$name[$j+1];
    $name[$j+1]=$n1;
  } 
}}
echo "<br>";
for($i=0;$i<=3;$i++)
{
  // echo ($i+1)."th highest subject:".$name[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$num[$i] ."<br>";
  $cb[$e]=$num[$i];
  $cb1[$e]=$name[$i];
  $e++;
}
$e--;
}
else{
  echo"<script>alert(' The student has no result of class ten'); </script> "; die();
}
for($i=0;$i<sizeof($cb);$i++)
{
  for($j=0;$j<sizeof($cb)-$i-1;$j++){
    if($cb[$j]<$cb[$j+1])
    {
      $n=$cb[$j];
      $n1=$cb1[$j];
      $cb[$j]=$cb[$j+1];
      $cb[$j+1]=$n;
      $cb1[$j]=$cb1[$j+1];
      $cb1[$j+1]=$n1;
    } }
  }
$bn1=[]; //name
$bn=[];//num
for($i=0;$i<=3;$i++)
{
  // echo ($i+1)."th highest subject:".$cb[$i]."&nbsp&nbsp&nbsp&nbsp marks:" .$cb1[$i] ."<br>"; // prints the top most 4numbers with their subject name.
$bn1[$i]=$cb1[$i]; //name
$bn[$i]=$cb[$i];//value
  }
$sc=array('Mathematics'=>'85','Physics'=>'80','Biology'=>'80','Chemistry'=>'80','Computer'=>'75','Economics'=>'70');
$ar=array('English'=>'85','Geography'=>'80','Bengali'=>'85','Hindi'=>'70','History & civics'=>'80','General Knowledge'=>'75');
$flags=0;
$flaga=0;
$flagc=0;
for($i=0;$i<sizeof($bn);$i++){
  if(array_key_exists($bn1[$i],$sc) && ($sc[$bn1[$i]]<=$bn[$i]))
  {
        $flags++;
  }
  else{
    $flagc++;
  }
  if(array_key_exists($bn1[$i],$ar)  && ($ar[$bn1[$i]]<=$bn[$i]))
  {
       $flaga++;
  }
  else{
    $flagc++;
  }
}
if ($flags>$flaga && $flags>$flagc)
{
  echo "<img src=images/b.jpg><br><br><label style='margin-left:20px;border:3px solid white;border-radius:15px;background-image:linear-gradient(to right,midnightblue,black,darkgrey);'> According to the statictics You are eligble for &nbsp&nbsp Science Stream";
}
if ($flagc>$flaga && $flagc>$flags)
{
  echo "<img src=images/commm.jpg ><br><br><label style='margin-left:20px;border:3px solid white;border-radius:15px;background-image:linear-gradient(to right,midnightblue,black,darkgrey);'> According to the statictics You are eligble for Commerce Stream</label>";
}
if ($flaga>$flags && $flaga>$flagc)
{
  echo "<img src=images/cm.jpg><br><br><label style='margin-left:20px;border:3px solid white;border-radius:15px;background-image:linear-gradient(to right,midnightblue,black,darkgrey);'>According to the statictics  You are eligble for Arts Stream";
}
?>
</p>
</div>
</div>
</form><!-- Body -->
<body style='background-color:rgb(32,33,36);'><!---->
<script src='css/slid1.js'>
</script>
</body>
<!-- Footer -->
<footer id='ft'>
        <b class="text-footer">
The software exhibits some effortlessness in solving, adjusting and eradicating the problems <br> in traditional result and examination management with automation system. One of the <br>principal purposes of the system is to give the test results to the students in the as fundamental and exact way<br> as possible. The administrator, teacher, professors, and staff can likewise modify and assess marks for the<br> students whenever needed.
          <br>  Copyright &copy; 2023 - All right reserved.
</b>
    </footer>
</html>
