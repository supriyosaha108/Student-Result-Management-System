<?php if(isset($_COOKIE['SRM14S'])==false){ header("Location:loginStudent.php"); }
include("connection.php"); $reg = $_COOKIE['SRM14S'];
$result = mysqli_query($con, "select * from student where reg='$reg'");
$result_arr = mysqli_fetch_assoc($result);
?>
<link rel= "stylesheet" href="css/viewresult.css">
<html id='html1' style='background-color:rgb(32,33,36);'><head>
</head><body><pre>
<!-- Header -->
<div class="topnav">
<ul><li id='li15'><div style='margin-top:-2px;margin-left:-69.74px;'><a href="Tel:0000000000"> <img class='what' style="height: 22px; width: 22px; margin-right:5px;position:relative; top:-2px " src="raniphotos/whatsapp.png"> <font style="position:relative;  top:-7.5px; font-weight:bold;">+91 0000 0000 00</font></a></div></li>
<li id='li15'><div style='margin-top:-10px;'><a href="mailto:helpdesk@srms.com"><font style='color:white;'>helpdesk@srms.com</font></a></div></li>
<li ><div id='dd2' style='margin-left:519.9px;margin-top:-20px;'><a href="logout.php" class="split"> <font style="position:relative; top:-24px; font-weight:bold" >Logout </font><img class="logout56" src="images/logout1.jpg" alt=""></a></div></li></ul>
</div>
<!-- Navbar -->
<div class="d1"><div><a href="homestudent.php"><img id='l13' src='images/home1.jpg' style='height:102.5px; width:102.5px;border-radius:10px;margin-top:-15px;' ></div>
<div><ul><li ><a href="viewresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:62px; width:62px;border-radius:10px;' ><br><div style='height:6px;'></div><font style='font-family:Calibri;margin-left:-25px;'>Result Classwise</font></div></a></li>
<li ><a href="secondaryresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:62px; width:62px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Secondary/HS Result</font></div></a></li>
<li ><a href="career.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/car.jpg' style='height:62px; width:62px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Career road map</font></div></a></li>
<li ><a href="graph.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/static.jpg' style='height:62px; width:62px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>View Statistics</font></div></a></li>
<li ><a href="yearwise.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/yrwise.jpg' style='height:62px; width:62px;'><br><div style='height:6px;'></div><font style='font-family:calibri;margin-left:-25px;'>Year wise score</font></div></a></li></ul></div>
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
if($avgsuper < 40){ $grade = "Low";echo"<script>document.getElementById('div25v').style.color='red';</script>"; } 
elseif($avgsuper >= 40 && $avgsuper < 60){ $grade = "Average";echo"<script>document.getElementById('div25v').style.color='yellow';</script>"; }
elseif($avgsuper >= 60 && $avgsuper < 80){ $grade = "Good";echo"<script>document.getElementById('div25v').style.color='green';</script>"; }
elseif($avgsuper >= 80){ $grade = "Excelent"; echo"<script>document.getElementById('div25v').style.color='greenyellow';</script>";}
echo"<div style='height:60px;'></div><label style='font-size:200%;margin-left:30px;'><center>".$grade."</center></label>"; ?></div></div></div>
<!-- Body -->
<body id='bod' style='background-color:rgb(32,33,36);'>
<?php include("connection.php"); $reg = $_COOKIE['SRM14S'];
echo"<div style='background-image:linear-gradient(to right,black,darkgrey);margin-top:1px;border:3px solid black;height:auto;min-height:30%;width:auto;'>";
// FETCHING TABLES FOR CLASSES 1 TO 12 color:#717171
for($j=1; $j<=12; $j++) {echo"<div class='mySlides fade'>";
$counter1 = 0; $sum=0; $remarks = "NA";
$res1 = mysqli_fetch_array(mysqli_query($con, "select * from result where reg='$reg' and class='$j'"));
if($res1 !== NULL) {
echo "<h3 align='center' style='margin-bottom:70px;'><u> Result for class $j </u></h3> <table style='margin-top:-5%;' class='content'> 
<tr> <th rowspan='2'>S.No</th> <th rowspan='2'>Subject Name</th> <th colspan='2'>Unit</th> <th colspan='2'>Half yearly</th> <th colspan='2'>Selection</th> <th rowspan='2'>Average</th> </tr>
<tr> <td>Obtained</td><td>Total</td> <td>Obtained</td><td>Total</td> <td>Obtained</td><td>Total</td> </tr>";
for($i=19; $i<=32; $i++) {
if($res1[$i]!=='') { $sc = explode("/",$res1[$i]);
if(count($sc)>2){ echo "<tr><td>".($i-18)."</td><td>".$res1[$i-14]."</td><td>".$sc[0]."</td><td>100</td><td>".$sc[1]."</td><td>100</td><td>".$sc[2]."</td><td>100</td><td>".$sc[3]."%</td></tr>"; $counter1++; $sum=$sum+$sc[3]; }
else { echo "<tr><td>".($i-18)."</td><td>".$res1[$i-14]."</td><td colspan='2'></td><td>".$sc[0]."</td><td></td><td>".$sc[1]."</td><td colspan='2'></td></tr>"; }
}}
echo "</table><br>";
if( ($sum/$counter1) > 40 ) { $remarks = "Pass";echo "<div id='div22' style='background-color:green;'> Remarks: $remarks </div>"; } else { $remarks = "Fail";echo "<div id='div22' style='background-color:red;'> Remarks: $remarks </div>";}
}echo" <div class='text'></div></div>";}
echo"</div><ul style='margin-right:-77px;vartical-align:center;margin-top:114px;'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  for($j=1; $j<=12; $j++){
 $res1 = mysqli_fetch_array(mysqli_query($con, "select * from result where reg='$reg' and class='$j'"));
 if($res1!==NULL){
  echo"<li class='dott' style='height:35px;width:35px;margin-bottom:70px;align-items:center;' onclick='currentSlide(".$j.")'>&nbsp<img class='ew' src='images/class".$j.".jpg' style='margin-left:-34px;margin-top:-25px;border-radius:7px;' height='50' width='53'></li>";
  }else{}}
echo"</div>  
</ul><script src='css/slid1.js'>
</script>";
?><br><br><br><br><br><br></body>
<!-- <div id='div30e' style='margin-top:-15px;'> -->
<!-- Footer -->
<footer class='foot'>
        <p class="text-footer">The software exhibits some effortlessness in solving, adjusting and eradicating the problems <br> in traditional result and examination management with automation system. One of the <br>principal purposes of the system is to give the test results to the students in the as fundamental and exact way<br> as possible. The administrator, teacher, professors, and staff can likewise modify and assess marks for the<br> students whenever needed.<br>
            Copyright &copy; 2023 - All right reserved.
        </p>
    </footer>
</html>