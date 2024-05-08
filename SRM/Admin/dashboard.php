<html>
<head>
<script src="css/homeAdmin.js"></script>
<style>
.tab1{ width: 100.5% ;overflow: hidden; background-color: rgba(239,246,254,1.0);  border-radius: 6px;height: 200px; color: rgba(43,74,123); font-family: 'Segoe UI'; font-weight: 600; font-size: 21px; box-shadow: 1px 2px 1px rgb(188,210,223);}
#c2{ background-color: transparent; box-shadow: none; height: 210px;font-size: 21px; position: relative; top:5px;}
.subtab1 { width:200px; background-color: rgba(255,255,255,1.0); border-radius: 8px; border: 2px solid rgb(134, 179, 209); padding-top: 20px; padding-left: 20px; padding-right: 20px;  color: rgb(72, 107, 148); font-family: 'Segoe UI'; font-weight: 500; font-size: 15px; position: relative; left: 20px; top:0px; display: inline-block;  height: 100px; zoom: 0.8 ;}
canvas{position: absolute;  right: -30px; top:10px; }
.det{ position: relative; top: -8px; }
.ccounter { font-size: 36px; font-weight: 500; color: rgb(69, 74, 104); }
#ting{height: 70px; position:absolute; left:60%; top:20%;}
body{ overflow:hidden;} body:hover{ overflow-y:visible;}
body::-webkit-scrollbar {width: 3px;}
body::-webkit-scrollbar-track {box-shadow: inset 1px 1px 10px transparent;border-radius: 15px;}
body::-webkit-scrollbar-thumb {background: rgba(124, 124, 124, 0.2); border-radius: 15px;}
</style>
</head>
<body>

<div class="tab1">
<span style="position: relative; top: 6px; left: 19px;">Overview</span>
<br>
<span style="position: relative; top: 10px; left: 22px; font-size: small; color: grey;">Since - June 2021</span>
<br><br>
<div class="subtab1">Child Registered <br> <span id="ccounter1" class="ccounter">0</span>
<img src="images/Student.PNG" alt="" id='ting'></div>&nbsp;
<div class="subtab1">Results Recorded <br> <span id="ccounter2" class="ccounter">0</span>
<img src="images/result.PNG" alt="" id='ting' style="left: 65%;"></div>&nbsp;
<div class="subtab1">Subjects Present <br> <span id="ccounter3" class="ccounter">0</span>
<img src="images/subject.PNG" alt="" id='ting'></div>&nbsp;
<div class="subtab1">Active Classes <br> <span id="ccounter4" class="ccounter">0</span>
<img src="images/class1.PNG" alt="" id='ting'></div>&nbsp;
</div>
<?php
include("connection.php");
$res = mysqli_query($con, "select * from Admin_login where username='".$_COOKIE['SRM14A']."'"); $result_array = mysqli_fetch_assoc($res);
$res11 = mysqli_query($con, "select count(reg) from student;");
$res11_array = mysqli_fetch_assoc($res11); $st1 = $res11_array['count(reg)'];
$res11 = mysqli_query($con, "select count(reg) from result;");
$res11_array = mysqli_fetch_assoc($res11); $st2 = $res11_array['count(reg)'];
echo "<script> loadstatistics($st1, $st2); chart($st1, $st2); </script>";
mysqli_close($con);
?>
<div class="tab1" id="c2" style="height: 56%;">
<span style="position: relative; top:14px; left: 5px;">Administrator Details</span>
<br>
<span style="position: relative; top: 17px; left: 5px; font-size: 13px; color: rgb(72, 107, 148);">Check on your schedule today!</span>
<br> <br>
<div class="tab1" style="width: 64%; height: 53%; display: inline-block; padding: 20px; color: rgba(43,74,123); font-size: 15px; font-weight: 500; line-height: 30px;">
<img src="images/name.png" alt="" style="display: inline; height: 30px; width: 30px;"> &nbsp;
<span class="det">Name of Admin &nbsp;:&nbsp; <?php echo $result_array['name']; ?></span><br>
<img src="images/class.png" alt="" style="display: inline; height: 30px; width: 30px;"> &nbsp;
<span class="det">Login ID : +91 <?php echo $result_array['username']; ?></span><br>
<img src="images/roll.png" alt="" style="display: inline; height: 30px; width: 30px;"> &nbsp;
<span class="det">Gender : <?php echo $result_array['gender']; ?></span><br>
<img src="images/house.png" alt="" style="display: inline; height: 25px; width: 25px;"> &nbsp;
<span class="det">&nbsp;Password : <?php echo $result_array['password']; ?></span>
</div> &nbsp; 
<div class="tab1" style="width: 24%; height: 53%; display: inline-block; padding: 20px; ">
 Notice
 <span style="font-size: 14px;">
  <ul>
   <li>This is notice #1</li>
   <li>This is notice #2</li>
   <li>This is notice #3</li>
   <li>This is notice #4</li>
  </ul>
 </span>
</div>
</div>
</body>
</html>