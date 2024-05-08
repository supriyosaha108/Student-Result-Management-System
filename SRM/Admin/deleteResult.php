<html>
    <head>
    <link rel="stylesheet" href="CSS/addResult.css">
    </head>
    <body>
    <h1>Result Removal Form</h1>
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
            $sql1="select * from student where reg='$reg'";
            $data=mysqli_query($con,$sql1);
            $d=mysqli_fetch_assoc($data);
            if($d==NULL){
            echo "<script>alert('not present in the student list ')</script>";
            }
            else{
            $sql="select * from result where reg='$reg' and class='$cls' ";
            $data=mysqli_query($con,$sql);
            $d1=mysqli_fetch_assoc($data);
            if($d1==NULL){
            echo "<script>alert('student has no result')</script>";
            }else{
                echo "<form action='' method='post' autocomplete='off'>";
                if($cls==1  or $cls==3 or $cls==4 or $cls==5){  
                echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th><th rowspan=2>Percentage</th></tr>
                      <tr><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      $s1=explode('/',$d1['second']);
                      echo"<tr><td>English</td><td>".intval(intval($s[0])*(1/2)+intval($s1[0])*(1/2))."</td><td>100</td><td>".intval(intval($s[1])*(1/2)+intval($s1[1])*(1/2))."</td><td>100</td><td>".intval(intval($s[2])*(1/2)+intval($s1[2])*(1/2))."</td><td>100</td><td>".intval(intval($s[3])*(1/2)+intval($s1[3])*(1/2))." %</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>".$d1['third_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])."%</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>".$d1['fourth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])."%</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>".$d1['fifth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])."%</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>".$d1['sixth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])."%</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>".$d1['seventh_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>".$d1['eight_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                    echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
                 
  }if($cls==2 ){
                     echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th><th rowspan=2>Percentage</th></tr>
                      <tr><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      $s1=explode('/',$d1['second']);
                      echo"<tr><td>English</td><td>".intval(intval($s[0])*(1/2)+intval($s1[0])*(1/2))."</td><td>100</td><td>".intval(intval($s[1])*(1/2)+intval($s1[1])*(1/2))."</td><td>100</td><td>".intval(intval($s[2])*(1/2)+intval($s1[2])*(1/2))."</td><td>100</td><td>".intval(intval($s[3])*(1/2)+intval($s1[3])*(1/2))." %</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>".$d1['third_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>".$d1['fourth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>".$d1['fifth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>".$d1['sixth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>".$d1['seventh_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>".$d1['eight_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>".$d1['ninth_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>".$d1['tenth_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                     echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
 }
          if($cls==6   or $cls==7   or $cls==8 ){
         
                   echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th><th rowspan=2>Percentage</th></tr>
                      <tr><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      $s1=explode('/',$d1['second']);
                      echo"<tr><td>English</td><td>".intval(intval($s[0])*(1/2)+intval($s1[0])*(1/2))."</td><td>100</td><td>".intval(intval($s[1])*(1/2)+intval($s1[1])*(1/2))."</td><td>100</td><td>".intval(intval($s[2])*(1/2)+intval($s1[2])*(1/2))."</td><td>100</td><td>".intval(intval($s[3])*(1/2)+intval($s1[3])*(1/2))." %</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>".$d1['third_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>".$d1['fourth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>".$d1['fifth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>".$d1['sixth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>".$d1['seventh_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>".$d1['eight_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>".$d1['ninth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>".$d1['tenth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['eleventh']);
                      echo"<tr><td>".$d1['eleventh_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['twelveth']);
                      echo"<tr><td>".$d1['twelveth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['thirteen']);
                      echo"<tr><td>".$d1['thirteen_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr>";
                      $s=explode('/',$d1['fourteen']);
                      echo"<tr><td>".$d1['fourteen_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                 echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
     
}
                      
            if($cls==9  or $cls==10){
                

                 echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th><th rowspan=2>Percentage</th></tr>
                      <tr><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      $s1=explode('/',$d1['second']);
                      echo"<tr><td>English</td><td>".intval(intval($s[0])*(1/2)+intval($s1[0])*(1/2))."</td><td>100</td><td>".intval(intval($s[1])*(1/2)+intval($s1[1])*(1/2))."</td><td>100</td><td>".intval(intval($s[2])*(1/2)+intval($s1[2])*(1/2))."</td><td>100</td><td>".intval(intval($s[3])*(1/2)+intval($s1[3])*(1/2))." %</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>".$d1['third_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>".$d1['fourth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>".$d1['fifth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>".$d1['sixth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>".$d1['seventh_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>".$d1['eight_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['ninth']);
                      echo"<tr><td>".$d1['ninth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['tenth']);
                      echo"<tr><td>".$d1['tenth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                     $s=explode('/',$d1['eleventh']);
                      echo"<tr><td>".$d1['eleventh_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                         echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       

}
      if($cls==11  or $cls==12){
         
        echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                      <div class='Section1'><table class='resulttable'><tr><th rowspan=2>Subject</th><th colspan=2>Unit </th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th><th rowspan=2>Percentage</th></tr>
                      <tr><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td><td  id='sh1'>Obtained</td><td  id='sh1'>Total</td></tr>";
                      $s=explode('/',$d1['first']);
                      $s1=explode('/',$d1['second']);
                      echo"<tr><td>English</td><td>".intval(intval($s[0])*(1/2)+intval($s1[0])*(1/2))."</td><td>100</td><td>".intval(intval($s[1])*(1/2)+intval($s1[1])*(1/2))."</td><td>100</td><td>".intval(intval($s[2])*(1/2)+intval($s1[2])*(1/2))."</td><td>100</td><td>".intval(intval($s[3])*(1/2)+intval($s1[3])*(1/2))." %</td></tr>";
                      $s=explode('/',$d1['third']);
                      echo"<tr><td>".$d1['third_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fourth']);
                      echo"<tr><td>".$d1['fourth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['fifth']);
                      echo"<tr><td>".$d1['fifth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['sixth']);
                      echo"<tr><td>".$d1['sixth_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['seventh']);
                      echo"<tr><td>".$d1['seventh_s']."</td><td>".intval($s[0])."</td><td>100</td><td>".intval($s[1])."</td><td>100</td><td>".intval($s[2])."</td><td>100</td><td>".intval($s[3])." %</td></tr>";
                      $s=explode('/',$d1['eight']);
                      echo"<tr><td>".$d1['eight_s']."</td><td><input id='hh'  style='width:70px' disabled></td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[0]."</td><td><input id='hh'  style='width:80px' disabled></td><td>".$s[1]."</td><td><input id='hh'  style='width:80px' disabled></td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                  echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
 
        }
              if($cls=='secondary result'){
                echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                  <div><div class='Section1'><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>
                      <tr><td>English</td><td>".intval($d1['first']*(1/2)+$d1['second']*(1/2))."</td><td>100</td></tr>
                      <tr><td>".$d1['third_s']."</td><td>".$d1['third']."</td><td>100</td></tr>
                      <tr><td>".$d1['fourth_s'].", ".$d1['fifth_s']."</td><td>".intval($d1['fourth']*(1/2)+$d1['fifth']*(1/2))."</td><td>100</td></tr>
                      <tr><td>".$d1['sixth_s']."</td><td>".$d1['sixth']."</td><td>100</td></tr>
                      <tr><td>Science (".$d1['seventh_s'].", ".$d1['eight_s'].", ".$d1['ninth_s'].")</td><td>".intval($d1['seventh']*(1/3)+$d1['eight']*(1/3)+$d1['ninth']*(1/3))."</td><td>100</td></tr>
                      <tr><td>".$d1['tenth_s']."</td><td>".$d1['tenth']."</td><td>100</td></tr>
                      <tr><td>".$d1['eleventh_s']."</td><td>".$d1['eleventh']."</td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                     echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
             
  }
                  if($cls=='Higher secondary result'){
                    echo "<div class='Section1'><center><label>Name&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d[name]'><label>&nbsp &nbsp Roll No&nbsp&nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[roll]'><label>&nbsp &nbsp Registration &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[reg]'><br><br><label>Class &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[class]'><label>&nbsp &nbsp Section &nbsp:&nbsp </label><input type='text' id='reg' disabled value='$d1[section]'><label>&nbsp &nbsp  Stream &nbsp:&nbsp &nbsp &nbsp &nbsp &nbsp </label><input type='text' id='reg' disabled value='$d1[stream]'><label></center></div>
                  <div><div class='Section1'><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>
                      <tr><td>English</td><td>".intval($d1['first']*(1/2)+$d1['second']*(1/2))."</td><td>100</td></tr>
                      <tr><td>".$d1['third_s']."</td><td>".$d1['third']."</td><td>100</td></tr>
                      <tr><td>".$d1['fourth_s']."</td><td>".$d1['fourth']."</td><td>100</td></tr>
                      <tr><td>".$d1['fifth_s']."</td><td>".$d1['fifth']."</td><td>100</td></tr>
                      <tr><td>".$d1['sixth_s']."</td><td>".$d1['sixth']."</td><td>100</td></tr>
                      <tr><td>".$d1['seventh_s']."</td><td>".$d1['seventh']."</td><td>100</td></tr>
                      <tr><td>".$d1['eight_s']."</td><td>".$d1['eight']."</td><td><input id='hh'  style='width:80px' disabled></td></tr></table>";
                      echo"<input type='text' name='Reg' value='$reg' hidden><input type='text' name='Cls' value='$cls' hidden><br><input type='submit' name='Del' value='Delete Result' >&nbsp &nbsp<button onclick=location.href='displayresult.php';>Reset Fields </button><br></div>
          </form></center> ";       
   
                  }
         }}
}
?>
<?php
include('connection.php');
  $reg=NULL;
  $cls=NULL;
if(isset($_POST['Del'])){
   $reg = $_POST['Reg'];
   $cls=$_POST['Cls'];
   $d="delete from result where reg='$reg' and class='$cls'";
   $d1=mysqli_query($con,$d) or die('deletion not successfully');
   echo "<script>alert('Deletion successfully....')</script>";
}
?>