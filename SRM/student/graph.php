<?php if(isset($_COOKIE['SRM14S'])==false){ header("Location:loginStudent.php"); }
include("connection.php"); $reg = $_COOKIE['SRM14S'];
$result = mysqli_query($con, "select * from student where reg='$reg'");
$result_arr = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="css/graph.css">
<html style='background-color:rgb(32,33,36);'><head>
</head><body><pre>
<!-- Header -->
<div class="topnav">
<ul><li id='li15'><div style='margin-top:-2px;margin-left:-45px;'><a class='split1' href="Tel:0000000000"> <img class='what' style="height: 20px; width: 20px; margin-right:5px;position:relative; top:-2px " src="raniphotos/whatsapp.png"> <font style="position:relative; top:-7px; font-weight:bold;">+91 0000 0000 00</font></a></div></li>
<li id='li15'><div style='margin-top:-10px;margin-left:50px;'><a  class='split1' href="mailto:helpdesk@srms.com"><font style='color:white;'>helpdesk@srms.com</font></a></div></li>
<li ><div id='dd2' style='margin-left:570px;margin-top:-20px;'><a href="logout.php" class="split"> <font style="position:relative; top:-24px; font-weight:bold" >Logout </font><img class="logout56" src="images/logout1.jpg" alt=""></a></div></li></ul>
</div>
<!-- Navbar -->
<div class="d1"><div><a href="homestudent.php"><img id='l13' src='images/home1.jpg' style='height:100px; width:100px;border-radius:10px;margin-top:-15px;' ></div>
<div><ul><li class='Anu'><a href="viewresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:60px; width:60px;border-radius:10px;' ><br><div style='height:6px;'></div><font style='font-family:Calibri;margin-left:-25px;'>Result Classwise</font></div></a></li>
<li class='Anu'><a href="secondaryresult.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/result.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Secondary/HS Result</font></div></a></li>
<li class='Anu'><a href="career.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/car.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>Career road map</font></div></a></li>
<li class='Anu'><a href="graph.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/static.jpg' style='height:60px; width:60px;' ><br><div style='height:6px;'></div><font style='margin-left:-25px;font-family:calibri;'>View Statistics</font></div></a></li>
<li class='Anu'><a href="yearwise.php"><div id='dd1' style='margin-top:35px;'><img id='l13' src='images/yrwise.jpg' style='height:60px; width:60px;'><br><div style='height:6px;'></div><font style='font-family:calibri;margin-left:-25px;'>Year wise score</font></div></a></li></ul></div>
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
<body style='background-color:rgb(32,33,36);'><!-- HISTOGRAM --><div id='divy'> <!--15-->
<center><div style='margin-top:20%;'><div id="graph"><ul id='graphui'><H1 style="margin-left:-250px;color:white;margin-top:300px;">AVERAGE SCORE<br><br><img id='im' src='images/upp.jpg'></H1>
<?php
include("connection.php"); $reg = $_COOKIE['SRM14S'];
for($j=1; $j<=12; $j++){
$counter1 = 0; $sum=0; $avg = 0; 
$res1 = mysqli_fetch_array(mysqli_query($con, "select * from result where reg='$reg' and class='$j'"));
if($res1 !== null){
for($i=19; $i<=32; $i++){
if($res1[$i]!=='' and $res1[$i-14]!=='SUPW & Community Services' and $res1[$i-14]!=='Value ED') {
$sc = explode("/",$res1[$i]);
$sum = $sum + $sc[count($sc)-1];
$counter1 = $counter1 + 1; } } $avg = round($sum/$counter1); }
echo " <li id='graphli'>$avg</li> "; } 
?></ul></div>

<!-- Usage: makeGraph('name of div with unordered list in it') -->
<script src="css/graph.js"></script>
<script>makeGraph('graph')</script>


<!-- LOWER BAR -->
<div id='dive'><table><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr></table><br><img id='imm' src='images/upp.jpg'><h1 style='margin-top:-70px;'>CLASS</h1></div>
</div></div></center>
<script src='slid1.js'>
</script>
</body>
<!-- Footer -->
<footer>
<p class="text-footer">
The software exhibits some effortlessness in solving, adjusting and eradicating the problems <br> in traditional result and examination management with automation system. One of the <br>principal purposes of the system is to give the test results to the students in the as fundamental and exact way<br> as possible. The administrator, teacher, professors, and staff can likewise modify and assess marks for the<br> students whenever needed.
<br>Copyright &copy; 2023 - All right reserved.
        </p>
    </footer>
</html>