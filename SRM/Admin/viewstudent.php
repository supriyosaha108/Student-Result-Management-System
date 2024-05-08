<html>
<head> <link rel="stylesheet" href="CSS/forms.css"> <style> td {word-break: break-all;} </style></head>
<body>
<h1>Student Display Form</h1>
<div class="section1">
<form action="" method="POST" autocomplete="off">
&nbsp; &nbsp; <label for="name">Name&nbsp:&nbsp </label>
<input type="text" name="name" placeholder="NA" id="name">
&nbsp; &nbsp; <label for="reg">Registration&nbsp:&nbsp </label>
<input type="text" name="reg"  placeholder="NA" id="reg">
&nbsp; &nbsp; <label for="roll">Roll&nbsp:&nbsp </label>
<input type="number" name="roll" placeholder="NA" min=1 id="roll" style="width:100px"> 
&nbsp; &nbsp; <label for="gender">Gender&nbsp:&nbsp </label>
<select name="gender" id="gender" style="width:120px">
<option value="NA">NA</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
</select>
<br><br>
&nbsp; &nbsp; <label for="class">Class&nbsp:&nbsp </label>
<select name="class" id="class" style="width:100px">
<option value="NA">NA</option>
<?php for($i=1; $i<=12;  $i++) { echo "<option value='$i'>$i</option>"; }?>
</select>
<select name="sec" id="sec" style="width:100px">
<option value="NA">NA</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
</select>
&nbsp; &nbsp; <label for="stream">Stream&nbsp:&nbsp </label>
<select name="stream" id="stream" style="width:120px">
<option value="NA">NA</option>
<option value="None">None</option>
<option value="Science">Science</option>
<option value="Commerce">Commerce</option>
<option value="Arts">Arts</option>
</select>
&nbsp; &nbsp; <label for="house">House&nbsp:&nbsp </label>
<select name="house" id="house" style="width:120px">
<option value="NA">NA</option>
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
<option value="Yellow">Yellow</option>
</select>
&nbsp; &nbsp; &nbsp;
<input type="submit" name="sub1" value="Search">
<input type="submit" name="reset1" value="Clear Fields" >
</form>
</div>
  <?php
  if(isset($_POST['reset1'])) { header("Location: viewstudent.php"); }
  elseif(isset($_POST['sub1'])) {
   echo "<style>body{ overflow-x:visible;}</style>";
   echo " 
   <script> 
   function setSelectedValue(selectObj, valueToSet) {
     for (var i = 0; i < selectObj.options.length; i++) {
     if (selectObj.options[i].text== valueToSet) {selectObj.options[i].selected = true; }}}
   document.getElementById('name').value = '".$_POST['name']."'; 
   document.getElementById('reg').value = '".$_POST['reg']."'; 
   document.getElementById('roll').value = '".$_POST['roll']."'; 
   setSelectedValue(document.getElementById('class'), '".$_POST['class']."' );
   setSelectedValue(document.getElementById('sec'), '".$_POST['sec']."' );
   setSelectedValue(document.getElementById('stream'), '".$_POST['stream']."' );
   setSelectedValue(document.getElementById('house'), '".$_POST['house']."' );
   setSelectedValue(document.getElementById('gender'), '".$_POST['gender']."' );
   </script> ";

   $s = "SELECT * FROM STUDENT WHERE";
   if($_POST['name'] !== '') { $s = $s." name like '".$_POST['name']."%'"; }
   if($_POST['reg'] !== '') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." reg like '".$_POST['reg']."%'"; 
   }
   if($_POST['roll'] !== '') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." roll = '".$_POST['roll']."'"; 
   }
   if($_POST['class'] !== 'NA') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." class = '".$_POST['class']."'"; 
   }
   if($_POST['sec'] !== 'NA') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." section = '".$_POST['sec']."'"; 
   }
   if($_POST['stream'] !== 'NA') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." stream = '".$_POST['stream']."'"; 
   }
   if($_POST['house'] !== 'NA') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." house = '".$_POST['house']."'"; 
   }
   if($_POST['gender'] !== 'NA') { 
    if($s !== "SELECT * FROM STUDENT WHERE") { $s = $s." and"; }
    $s = $s." gender = '".$_POST['gender']."'"; 
   }
   if($s == "SELECT * FROM STUDENT WHERE") { $s = "SELECT * FROM STUDENT"; }
   
   include("connection.php");
   $re = mysqli_query($con, $s); 
   $re1 = mysqli_query($con, $s); $retemp = mysqli_fetch_assoc($re1); 
   if($retemp==null) { die("<script>alert('No student exists for the specified criteria.');</script>");}
   echo "<div class='section1' style='width:fit-content; padding:10px;'><table id='subtable' style='zoom:0.8'>";
   echo "<tr><th>S.No</th><th>Reg_no</th><th>Name_of_student</th><th>Class</th><th>Section</th><th>Stream</th><th>Roll</th><th>Date_of_birth</th><th>House</th><th>Email_address</th><th>Present_address</th><th>Phone_number</th><th>Gender</th><th>Password</th>
   <th>Subject_#1</th><th>Subject_#2</th><th>Subject_#3</th><th>Subject_#4</th><th>Subject_#5</th><th>Subject_#6</th><th>Subject_#7</th><th>Subject_#8</th><th>Subject_#9</th><th>Subject_#10</th><th>Subject_#11</th><th>Subject_#12</th><th>Subject_#13</th><th>Subject_#14</th>
   </tr>";
   $counter = 0;
   while($res = mysqli_fetch_assoc($re)) {
    $counter++;
    echo "<tr><td>$counter</td><td>".$res['reg']."</td><td>".$res['name']."</td><td>".$res['class']."</td><td>".$res['section']."</td><td>".$res['stream']."</td><td>".$res['roll']."</td><td>".$res['DOB']."</td><td>".$res['house']."</td><td>".$res['email']."</td><td>".$res['address']."</td><td>".$res['phone']."</td><td>".$res['gender']."</td><td>".$res['pass']."</td>
    <td>".$res['first']."</td><td>".$res['second']."</td><td>".$res['third']."</td><td>".$res['fourth']."</td><td>".$res['fifth']."</td><td>".$res['sixth']."</td><td>".$res['seventh']."</td><td>".$res['eight']."</td><td>".$res['ninth']."</td><td>".$res['tenth']."</td><td>".$res['eleventh']."</td><td>".$res['twelveth']."</td><td>".$res['thirteen']."</td><td>".$res['fourteen']."</td></tr>";
   }
   echo "</table></div>";
  }
  ?>
 </body>
</html>