<html>
    <head>
    <link rel="stylesheet" href="CSS/addResult.css">
    </head>
    <body>
    <h1>Result Updation Form</h1>
       <form action='' method='post' autocomplete='off'> 
        <center> <div class='Section1'> 
            <label for='reg'>Registration Number&nbsp;:&nbsp;</label>
            <input   required   type='text'  onchange='this.form.submit();'   id='reg' placeholder='Enter here to search' name='reg' value="<?php echo isset($_POST['reg']) ? $_POST['reg'] : '' ?>" required>
            &nbsp; &nbsp;
            <label for='class'>Class&nbsp;:&nbsp;</label>
            <select id="class" name="class" onchange="this.form.submit();" required >
                <option value="" disabled selected hidden>Select</option>
                <?php for ($i=1; $i<=12; $i++) { echo "<option value=$i "; if(isset($_POST['class']) && $_POST['class'] == $i) { echo 'selected'; } echo " >$i</option>"; } ?>
                <option value='secondary result' <?php echo (isset($_POST['class']) && $_POST['class'] ==='secondary result') ? 'selected' : ''; ?> >Secondary</option>
                <option value='Higher secondary result' <?php echo (isset($_POST['class']) && $_POST['class'] ==='Higher secondary result') ? 'selected' : ''; ?> >Higher Secondary</option>
                </select> &nbsp; &nbsp; &nbsp; &nbsp;
            <input type='submit' value='Fetch Result' name='FR'>  
             </div> 
          </center> 
            </form>         
                      
        
</body>
</html>
 <?php
             include('connection.php');
             echo"<center>";
             $reg=NULL;
             $cls=NULL;
           if(isset($_POST["FR"])) {
            $reg = $_POST['reg'];
             $cls=$_POST['class'];
            $sql1="select * from student where reg='$reg' ";
            $data=mysqli_query($con,$sql1);
            $d=mysqli_fetch_assoc($data);
            if($d==NULL){
            echo "<script>alert('not present in student list')</script>";
            }
            else{
            $sql2="select * from result where reg='$reg' and class='$cls'";
            $data1=mysqli_query($con,$sql2);
            $d1=mysqli_fetch_assoc($data1);
            if($d1==NULL){
            echo "<script>alert('student has no result')</script>";
            }else{
            echo "<form action='' method='post' autocomplete='off'>";
            if($d1['class']==1  or $d1['class']==3 or $d1['class']==4 or $d1['class']==5){  
                      echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      echo"<tr><td>1st Subject</td><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F1i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F1ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F1iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['second']);
                      echo"<tr><td>2nd Subject</td><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F2i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F2ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F2iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>3rd Subject</td><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F3i' ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F3ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F3iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>4th Subject</td><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F4i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F4ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F4iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>5th Subject</td><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F5i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F5ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F5iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>6th Subject</td><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F6i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F6ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F6iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>7th Subject</td><td>".$d1['seventh_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F7i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F7ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>8th Subject</td><td>".$d1['eight_s']."</td><td><input id='hh'  style='width:70px'  disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F8i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F8ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
                   }if($d1['class']==2 ){
                      echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      echo"<tr><td>1st Subject</td><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F1i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F1ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F1iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['second']);
                      echo"<tr><td>2nd Subject</td><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F2i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F2ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F2iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>3rd Subject</td><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F3i' ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F3ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F3iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>4th Subject</td><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F4i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F4ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F4iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>5th Subject</td><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F5i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F5ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F5iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>6th Subject</td><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F6i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F6ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F6iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>7th Subject</td><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F7i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F7ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F7iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>8th Subject</td><td>".$d1['eight_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F8i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F8ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F8iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>9th Subject</td><td>".$d1['ninth_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F9i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F9ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>10th Subject</td><td>".$d1['tenth_s']."</td><td><input id='hh'  style='width:70px'  disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F10i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F10ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
                      }
          if($d1['class']==6   or $d1['class']==7   or $d1['class']==8 ){
         
                      echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      echo"<tr><td>1st Subject</td><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F1i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F1ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F1iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['second']);
                      echo"<tr><td>2nd Subject</td><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F2i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F2ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F2iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>3rd Subject</td><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F3i' ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F3ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F3iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>4th Subject</td><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F4i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F4ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F4iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>5th Subject</td><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F5i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F5ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F5iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>6th Subject</td><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F6i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F6ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F6iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>7th Subject</td><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F7i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F7ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F7iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>8th Subject</td><td>".$d1['eight_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F8i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F8ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F8iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>9th Subject</td><td>".$d1['ninth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F9i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F9ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F9iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>10th Subject</td><td>".$d1['tenth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F10i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F10ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F10iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eleventh']);
                      echo"<tr><td>11th Subject</td><td>".$d1['eleventh_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F11i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F11ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F11iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['twelveth']);
                      echo"<tr><td>12th Subject</td><td>". $d1['twelveth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F12i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F12ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F12iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['thirteen']);
                      echo"<tr><td>13th Subject</td><td>".$d1['thirteen_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F13i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F13ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['fourteen']);
                      echo"<tr><td>14th Subject</td><td>".$d1['fourteen_s']."</td><td><input id='hh'  style='width:70px'  disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F14i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F14ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
                      
}
                      
            if($d1['class']==9  or $d1['class']==10){
                

                      echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      echo"<tr><td>1st Subject</td><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F1i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F1ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F1iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['second']);
                      echo"<tr><td>2nd Subject</td><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F2i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F2ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F2iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>3rd Subject</td><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F3i' ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F3ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F3iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>4th Subject</td><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F4i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F4ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F4iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>5th Subject</td><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F5i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F5ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F5iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>6th Subject</td><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F6i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F6ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F6iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>7th Subject</td><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F7i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F7ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F7iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>8th Subject</td><td>".$d1['eight_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F8i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F8ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F8iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>9th Subject</td><td>".$d1['ninth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F9i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F9ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F9iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>10th Subject</td><td>".$d1['tenth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F10i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F10ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F10iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eleventh']);
                      echo"<tr><td>11th Subject</td><td>".$d1['eleventh_s']."</td><td><input id='hh'  style='width:70px'  disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F11i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required  name='F11ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
}
      if($d1['class']==11  or $d1['class']==12){
         
                      echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      echo"<tr><td>1st Subject</td><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F1i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F1ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F1iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['second']);
                      echo"<tr><td>2nd Subject</td><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F2i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F2ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F2iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>3rd Subject</td><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F3i' ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F3ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F3iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>4th Subject</td><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F4i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F4ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F4iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>5th Subject</td><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F5i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F5ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F5iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>6th Subject</td><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F6i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F6ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F6iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>7th Subject</td><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$s[0]' name='F7i'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[1]' name='F7ii'  ></td><td>100</td><td><input min=1 max=100  required type='number' value='$s[2]' name='F7iii'  ></td><td>100</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>8th Subject</td><td>".$d1['eight_s']."</td><td><input id='hh'  style='width:70px'  disabled></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F8i'><option value='$s[0]'  selected hidden>".$s[0]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td><td><select style='width:70px;height:19px;'  required name='F8ii'><option value='$s[1]'  selected hidden>".$s[1]."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
         }
              if($d1['class']=='secondary result'){
                 echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>";
                      echo"<tr><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$d1[first]' name='F1i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$d1[second]' name='F2i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$d1[third]' name='F3i' ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[fourth]' name='F4i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[fifth]' name='F5i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[sixth]' name='F6i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$d1[seventh]' name='F7i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['eight_s']."</td><td><input min=1 max=100  required type='number' value='$d1[eight]' name='F8i'  ></td><td>100</td></tr>";                  
                      echo"<tr><td>".$d1['ninth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[ninth]' name='F9i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['tenth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[tenth]' name='F10i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['eleventh_s']."</td><td><select style='width:70px;height:19px;'   name='F11i'><option value='$d1[eleventh]'  selected hidden>".$d1['eleventh']."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";
               }
                  if($d1['class']=='Higher secondary result'){
                  echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'></center></div>
                     <div class='Section1'><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>";
                      echo"<tr><td>".$d1['first_s']."</td><td><input min=1 max=100  required type='number' value='$d1[first]' name='F1i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['second_s']."</td><td><input min=1 max=100  required type='number' value='$d1[second]' name='F2i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['third_s']."</td><td><input min=1 max=100  required type='number' value='$d1[third]' name='F3i' ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['fourth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[fourth]' name='F4i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['fifth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[fifth]' name='F5i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['sixth_s']."</td><td><input min=1 max=100  required type='number' value='$d1[sixth]' name='F6i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['seventh_s']."</td><td><input min=1 max=100  required type='number' value='$d1[seventh]' name='F7i'  ></td><td>100</td></tr>";
                      echo"<tr><td>".$d1['eight_s']."</td><td><select style='width:70px;height:19px;'   name='F8i'><option value='$d1[eight]'  selected hidden>".$d1['eight']."</option><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh'  style='width:80px' disabled></td></tr></table><br>";

                     }echo"<input   type='text'    name='Reg' value='$reg' hidden><input   type='text'    name='Cls' value='$cls' hidden><input type='submit' name='Setr' value='Update Result'>
                     &nbsp &nbsp
                     <button onclick=location.href='updateresult.php';>Reset Fields </button></form> 
         </center></div> ";
}
}}
?>
<?php
  include('connection.php');
    $reg=NULL;
    $cls=NULL;
  if(isset($_POST['Setr'])){
    $reg = $_POST['Reg'];
    $cls=$_POST['Cls'];
    if($cls==1 or $cls==3 or $cls==4 or $cls==5){
    $s1=array($_POST['F1i'],$_POST['F1ii'],$_POST['F1iii'],intval(intval($_POST['F1i'])*(100/300)+intval($_POST['F1ii'])*(100/300)+intval($_POST['F1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['F2i'],$_POST['F2ii'],$_POST['F2iii'],intval(intval($_POST['F2i'])*(100/300)+intval($_POST['F2ii'])*(100/300)+intval($_POST['F2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['F3i'],$_POST['F3ii'],$_POST['F3iii'],intval(intval($_POST['F3i'])*(100/300)+intval($_POST['F3ii'])*(100/300)+intval($_POST['F3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['F4i'],$_POST['F4ii'],$_POST['F4iii'],intval(intval($_POST['F4i'])*(100/300)+intval($_POST['F4ii'])*(100/300)+intval($_POST['F4iii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['F5i'],$_POST['F5ii'],$_POST['F5iii'],intval(intval($_POST['F5i'])*(100/300)+intval($_POST['F5ii'])*(100/300)+intval($_POST['F5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['F6i'],$_POST['F6ii'],$_POST['F6iii'],intval(intval($_POST['F6i'])*(100/300)+intval($_POST['F6ii'])*(100/300)+intval($_POST['F6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['F7i'],$_POST['F7ii']);
    $s17=implode('/',$s7);
    $s8=array($_POST['F8i'],$_POST['F8ii']);
    $s18=implode('/',$s8);
    $s="update result set  first='$s11',second='$s12',third='$s13',fourth='$s14',fifth='$s15',sixth='$s16',seventh='$s17',eight='$s18' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";    
    }
    if($cls==2){
    $s1=array($_POST['F1i'],$_POST['F1ii'],$_POST['F1iii'],intval(intval($_POST['F1i'])*(100/300)+intval($_POST['F1ii'])*(100/300)+intval($_POST['F1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['F2i'],$_POST['F2ii'],$_POST['F2iii'],intval(intval($_POST['F2i'])*(100/300)+intval($_POST['F2ii'])*(100/300)+intval($_POST['F2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['F3i'],$_POST['F3ii'],$_POST['F3iii'],intval(intval($_POST['F3i'])*(100/300)+intval($_POST['F3ii'])*(100/300)+intval($_POST['F3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['F4i'],$_POST['F4ii'],$_POST['F4iii'],intval(intval($_POST['F4i'])*(100/300)+intval($_POST['F4ii'])*(100/300)+intval($_POST['F4iii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['F5i'],$_POST['F5ii'],$_POST['F5iii'],intval(intval($_POST['F5i'])*(100/300)+intval($_POST['F5ii'])*(100/300)+intval($_POST['F5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['F6i'],$_POST['F6ii'],$_POST['F6iii'],intval(intval($_POST['F6i'])*(100/300)+intval($_POST['F6ii'])*(100/300)+intval($_POST['F6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['F7i'],$_POST['F7ii'],$_POST['F7iii'],intval(intval($_POST['F7i'])*(100/300)+intval($_POST['F7ii'])*(100/300)+intval($_POST['F7iii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['F8i'],$_POST['F8ii'],$_POST['F8iii'],intval(intval($_POST['F8i'])*(100/300)+intval($_POST['F8ii'])*(100/300)+intval($_POST['F8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['F9i'],$_POST['F9ii']);
    $s19=implode('/',$s9);
    $s10=array($_POST['F10i'],$_POST['F10ii']);
    $s110=implode('/',$s10);
    $s="update result set  first='$s11',second='$s12',third='$s13',fourth='$s14',fifth='$s15',sixth='$s16',seventh='$s17',eight='$s18',ninth='$s19',tenth='$s110' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";    
    }
    if($cls==6 or $cls==7 or $cls==8){
    $s1=array($_POST['F1i'],$_POST['F1ii'],$_POST['F1iii'],intval(intval($_POST['F1i'])*(100/300)+intval($_POST['F1ii'])*(100/300)+intval($_POST['F1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['F2i'],$_POST['F2ii'],$_POST['F2iii'],intval(intval($_POST['F2i'])*(100/300)+intval($_POST['F2ii'])*(100/300)+intval($_POST['F2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['F3i'],$_POST['F3ii'],$_POST['F3iii'],intval(intval($_POST['F3i'])*(100/300)+intval($_POST['F3ii'])*(100/300)+intval($_POST['F3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['F4i'],$_POST['F4ii'],$_POST['F4iii'],intval(intval($_POST['F4i'])*(100/300)+intval($_POST['F4ii'])*(100/300)+intval($_POST['F4iii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['F5i'],$_POST['F5ii'],$_POST['F5iii'],intval(intval($_POST['F5i'])*(100/300)+intval($_POST['F5ii'])*(100/300)+intval($_POST['F5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['F6i'],$_POST['F6ii'],$_POST['F6iii'],intval(intval($_POST['F6i'])*(100/300)+intval($_POST['F6ii'])*(100/300)+intval($_POST['F6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['F7i'],$_POST['F7ii'],$_POST['F7iii'],intval(intval($_POST['F7i'])*(100/300)+intval($_POST['F7ii'])*(100/300)+intval($_POST['F7iii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['F8i'],$_POST['F8ii'],$_POST['F8iii'],intval(intval($_POST['F8i'])*(100/300)+intval($_POST['F8ii'])*(100/300)+intval($_POST['F8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['F9i'],$_POST['F9ii'],$_POST['F9iii'],intval(intval($_POST['F9i'])*(100/300)+intval($_POST['F9ii'])*(100/300)+intval($_POST['F9iii'])*(100/300)));
    $s19=implode('/',$s9);
    $s10=array($_POST['F10i'],$_POST['F10ii'],$_POST['F10iii'],intval(intval($_POST['F10i'])*(100/300)+intval($_POST['F10ii'])*(100/300)+intval($_POST['F10iii'])*(100/300)));
    $s110=implode('/',$s10);
    $s11a=array($_POST['F11i'],$_POST['F11ii'],$_POST['F11iii'],intval(intval($_POST['F11i'])*(100/300)+intval($_POST['F11ii'])*(100/300)+intval($_POST['F11iii'])*(100/300)));
    $s111=implode('/',$s11a);
    $s12a=array($_POST['F12i'],$_POST['F12ii'],$_POST['F12iii'],intval(intval($_POST['F12i'])*(100/300)+intval($_POST['F12ii'])*(100/300)+intval($_POST['F12iii'])*(100/300)));
    $s112=implode('/',$s12a);
    $s13a=array($_POST['F13i'],$_POST['F13ii']);
    $s113=implode('/',$s13a);
    $s14a=array($_POST['F14i'],$_POST['F14ii']);
    $s114=implode('/',$s14a);
    $s="update result set  first='$s11',second='$s12',third='$s13',fourth='$s14',fifth='$s15',sixth='$s16',seventh='$s17',eight='$s18',ninth='$s19',tenth='$s110',eleventh='$s111',twelveth='$s112',thirteen='$s113',fourteen='$s114' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";    
    }
    if($cls==9 or $cls==10){
    $s1=array($_POST['F1i'],$_POST['F1ii'],$_POST['F1iii'],intval(intval($_POST['F1i'])*(100/300)+intval($_POST['F1ii'])*(100/300)+intval($_POST['F1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['F2i'],$_POST['F2ii'],$_POST['F2iii'],intval(intval($_POST['F2i'])*(100/300)+intval($_POST['F2ii'])*(100/300)+intval($_POST['F2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['F3i'],$_POST['F3ii'],$_POST['F3iii'],intval(intval($_POST['F3i'])*(100/300)+intval($_POST['F3ii'])*(100/300)+intval($_POST['F3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['F4i'],$_POST['F4ii'],$_POST['F4iii'],intval(intval($_POST['F4i'])*(100/300)+intval($_POST['F4ii'])*(100/300)+intval($_POST['F4iii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['F5i'],$_POST['F5ii'],$_POST['F5iii'],intval(intval($_POST['F5i'])*(100/300)+intval($_POST['F5ii'])*(100/300)+intval($_POST['F5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['F6i'],$_POST['F6ii'],$_POST['F6iii'],intval(intval($_POST['F6i'])*(100/300)+intval($_POST['F6ii'])*(100/300)+intval($_POST['F6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['F7i'],$_POST['F7ii'],$_POST['F7iii'],intval(intval($_POST['F7i'])*(100/300)+intval($_POST['F7ii'])*(100/300)+intval($_POST['F7iii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['F8i'],$_POST['F8ii'],$_POST['F8iii'],intval(intval($_POST['F8i'])*(100/300)+intval($_POST['F8ii'])*(100/300)+intval($_POST['F8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['F9i'],$_POST['F9ii'],$_POST['F9iii'],intval(intval($_POST['F9i'])*(100/300)+intval($_POST['F9ii'])*(100/300)+intval($_POST['F9iii'])*(100/300)));
    $s19=implode('/',$s9);
    $s10=array($_POST['F10i'],$_POST['F10ii'],$_POST['F10iii'],intval(intval($_POST['F10i'])*(100/300)+intval($_POST['F10ii'])*(100/300)+intval($_POST['F10iii'])*(100/300)));
    $s110=implode('/',$s10);
    $s11a=array($_POST['F11i'],$_POST['F11ii']);
    $s111=implode('/',$s11a);
    $s="update result set  first='$s11',second='$s12',third='$s13',fourth='$s14',fifth='$s15',sixth='$s16',seventh='$s17',eight='$s18',ninth='$s19',tenth='$s110',eleventh='$s111' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";        }
    if($cls==11 or $cls==12){
    $s1=array($_POST['F1i'],$_POST['F1ii'],$_POST['F1iii'],intval(intval($_POST['F1i'])*(100/300)+intval($_POST['F1ii'])*(100/300)+intval($_POST['F1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['F2i'],$_POST['F2ii'],$_POST['F2iii'],intval(intval($_POST['F2i'])*(100/300)+intval($_POST['F2ii'])*(100/300)+intval($_POST['F2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['F3i'],$_POST['F3ii'],$_POST['F3iii'],intval(intval($_POST['F3i'])*(100/300)+intval($_POST['F3ii'])*(100/300)+intval($_POST['F3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['F4i'],$_POST['F4ii'],$_POST['F4iii'],intval(intval($_POST['F4i'])*(100/300)+intval($_POST['F4ii'])*(100/300)+intval($_POST['F4iii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['F5i'],$_POST['F5ii'],$_POST['F5iii'],intval(intval($_POST['F5i'])*(100/300)+intval($_POST['F5ii'])*(100/300)+intval($_POST['F5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['F6i'],$_POST['F6ii'],$_POST['F6iii'],intval(intval($_POST['F6i'])*(100/300)+intval($_POST['F6ii'])*(100/300)+intval($_POST['F6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['F7i'],$_POST['F7ii'],$_POST['F7iii'],intval(intval($_POST['F7i'])*(100/300)+intval($_POST['F7ii'])*(100/300)+intval($_POST['F7iii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['F8i'],$_POST['F8ii']);
    $s18=implode('/',$s8);
    $s="update result set  first='$s11',second='$s12',third='$s13',fourth='$s14',fifth='$s15',sixth='$s16',seventh='$s17',eight='$s18' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";    
    }
    if($cls=='secondary result'){
    $s="update result set  first='$_POST[F1i]',second='$_POST[F2i]',third='$_POST[F3i]',fourth='$_POST[F4i]',fifth='$_POST[F5i]',sixth='$_POST[F6i]',seventh='$_POST[F7i]',eight='$_POST[F8i]',ninth='$_POST[F9i]',tenth='$_POST[F10i]',eleventh='$_POST[F11i]' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";        }
    if($cls=='Higher secondary result'){
    $s="update result set  first='$_POST[F1i]',second='$_POST[F2i]',third='$_POST[F3i]',fourth='$_POST[F4i]',fifth='$_POST[F5i]',sixth='$_POST[F6i]',seventh='$_POST[F7i]',eight='$_POST[F8i]' where reg='$reg' and class='$cls'";
    $q=mysqli_query($con,$s) or die('Updation failed');
    echo "<script>alert('Updation successFully...')</script>";        }
}
?>