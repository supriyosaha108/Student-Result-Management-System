<html>
    <head>
    <link rel="stylesheet" href="CSS/addResult.css">
     </head>
    <body>

    <h1>Result Insertion Form</h1>
        
        <div id='div'><form action='' method='post' autocomplete='off'>
             <div class="section1">
              <center>
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
             <input type='submit' value='Create result' name='FR'>
             </center>
         </div>  
                   
        </form>
        </div>   
</body>
</html>
 <?php
             include('connection.php');
             if(mysqli_query($con,'select 1 from result')==False){
             $a="create table result(reg varchar(20),class varchar(20),roll varchar(20),section varchar(2),stream varchar(20),first_s varchar(30),second_s varchar(30),third_s varchar(30),fourth_s varchar(30),fifth_s varchar(30),sixth_s varchar(30),seventh_s varchar(30),eight_s varchar(30),ninth_s varchar(30),tenth_s varchar(30),eleventh_s varchar(30),twelveth_s varchar(30),thirteen_s varchar(30),fourteen_s varchar(30),first varchar(30),second varchar(30),third varchar(30),fourth varchar(30),fifth varchar(30),sixth varchar(30),seventh varchar(30),eight varchar(30),ninth varchar(30),tenth varchar(30),eleventh varchar(30),twelveth varchar(30),thirteen varchar(30),fourteen varchar(30),PRIMARY KEY(reg,class),FOREIGN KEY (reg) REFERENCES student(reg) ON DELETE CASCADE)";
             $a1=mysqli_query($con,$a);}
             $reg=NULL;
             $cls=NULL;
           if(isset($_POST["FR"])) {
            $reg = $_POST['reg'];
            $cls=$_POST['class'];
            $sql="select * from student where reg='$reg'";
            $data=mysqli_query($con,$sql);
            $d=mysqli_fetch_assoc($data);
            if($d==NULL){
            echo "<script>alert('not present in student list ')</script>";
            }
            else{ 
            $w=$d['class'];
            $a=$cls;
            if($cls=='secondary result'){
            $a=10;}
            if($cls=='Higher secondary result'){
            $a=12;}
            if($a==$d['class']){
            $sql1="select * from result where reg='$reg' and class='$cls'";
            $data1=mysqli_query($con,$sql1);
            $d1=mysqli_fetch_assoc($data1);
            if($d1!=NULL){
            echo "<script>alert('already has a result ')</script>";
            }
            else{
            echo "<form action='' method='post' autocomplete='off' ><div class='section1'>";
           
            if($cls==1  or $cls==3 or $cls==4 or $cls==5){   
                echo "<div><table class='resulttable'><tr><th colspan=1 rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit</th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>
                      <tr><td>1st Subject &nbsp &nbsp</td><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1iii'   ></td><td>100</td></tr>
                      <tr><td>2nd Subject</td><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2iii'   ></td><td>100</td></tr>
                      <tr><td>3rd Subject</td><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3iii'   ></td><td>100</td></tr>
                      <tr><td>4th Subject</td><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4iii'   ></td><td>100</td></tr>
                      <tr><td>5th Subject</td><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5iii'   ></td><td>100</td></tr>
                      <tr><td>6th Subject</td><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6iii'   ></td><td>100</td></tr>
                      <tr><td>7th Subject</td><td>".$d['seventh']."</td><td><input id='hh' style='width:70px' disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f7i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f7ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr>
                      <tr><td>8th Subject</td><td>".$d['eight']."</td><td><input id='hh' style='width:70px'  disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f8i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f8ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' >
                      <br><br>
                      <center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form></div> ";
                      }if($cls==2 ){
                     echo "<div><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit</th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>
                      <tr><td>1st Subject &nbsp &nbsp</td><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1iii'   ></td><td>100</td></tr>
                      <tr><td>2nd Subject</td><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2iii'   ></td><td>100</td></tr>
                      <tr><td>3rd Subject</td><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3iii'   ></td><td>100</td></tr>
                      <tr><td>4th Subject</td><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4iii'   ></td><td>100</td></tr>
                      <tr><td>5th Subject</td><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5iii'   ></td><td>100</td></tr>
                      <tr><td>6th Subject</td><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6iii'   ></td><td>100</td></tr>
                      <tr><td>7th Subject</td><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7iii'   ></td><td>100</td></tr>
                      <tr><td>8th Subject</td><td>".$d['eight']."</td><td><input min=1 max=100    required   type='number'    name='f8i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8iii'   ></td><td>100</td></tr>
                      <tr><td>9th Subject</td><td>".$d['ninth']."</td><td><input id='hh' style='width:70px' disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f9i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f9ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr>
                      <tr><td>10th Subject</td><td>".$d['tenth']."</td><td><input id='hh' style='width:70px'  disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f10i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f10ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>";                     
 }
          if($cls==6   or $cls==7   or $cls==8 ){
         
                   echo "<div><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit</th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>
                      <tr><td>1st Subject &nbsp &nbsp</td><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1iii'   ></td><td>100</td></tr>
                      <tr><td>2nd Subject</td><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2iii'   ></td><td>100</td></tr>
                      <tr><td>3rd Subject</td><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3iii'   ></td><td>100</td></tr>
                      <tr><td>4th Subject</td><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4iii'   ></td><td>100</td></tr>
                      <tr><td>5th Subject</td><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5iii'   ></td><td>100</td></tr>
                      <tr><td>6th Subject</td><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6iii'   ></td><td>100</td></tr>
                      <tr><td>7th Subject</td><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7iii'   ></td><td>100</td></tr>
                      <tr><td>8th Subject</td><td>".$d['eight']."</td><td><input min=1 max=100    required   type='number'    name='f8i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8iii'   ></td><td>100</td></tr>
                      <tr><td>9th Subject</td><td>".$d['ninth']."</td><td><input min=1 max=100    required   type='number'    name='f9i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f9ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f9iii'   ></td><td>100</td></tr>
                      <tr><td>10th Subject</td><td>".$d['tenth']."</td><td><input min=1 max=100    required   type='number'    name='f10i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f10ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f10iii'   ></td><td>100</td></tr>
                      <tr><td>11th Subject</td><td>".$d['eleventh']."</td><td><input min=1 max=100    required   type='number'    name='f11i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f11ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f11iii'   ></td><td>100</td></tr>
                      <tr><td>12th Subject</td><td>".$d['twelveth']."</td><td><input min=1 max=100    required   type='number'    name='f12i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f12ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f12iii'   ></td><td>100</td></tr>
                      <tr><td>13th Subject</td><td>".$d['thirteen']."</td><td><input id='hh' style='width:70px' disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f13i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f13ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr>
                      <tr><td>14th Subject</td><td>".$d['fourteen']."</td><td><input id='hh' style='width:70px'  disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f14i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f14ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                     echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>"; 
                     
 }
                      
            if($cls==9  or $cls==10){
                

                 echo "<div><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit</th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>
                      <tr><td>1st Subject &nbsp &nbsp</td><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1iii'   ></td><td>100</td></tr>
                      <tr><td>2nd Subject</td><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2iii'   ></td><td>100</td></tr>
                      <tr><td>3rd Subject</td><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3iii'   ></td><td>100</td></tr>
                      <tr><td>4th Subject</td><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4iii'   ></td><td>100</td></tr>
                      <tr><td>5th Subject</td><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5iii'   ></td><td>100</td></tr>
                      <tr><td>6th Subject</td><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6iii'   ></td><td>100</td></tr>
                      <tr><td>7th Subject</td><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7iii'   ></td><td>100</td></tr>
                      <tr><td>8th Subject</td><td>".$d['eight']."</td><td><input min=1 max=100    required   type='number'    name='f8i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f8iii'   ></td><td>100</td></tr>
                      <tr><td>9th Subject</td><td>".$d['ninth']."</td><td><input min=1 max=100    required   type='number'    name='f9i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f9ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f9iii'   ></td><td>100</td></tr>
                      <tr><td>10th Subject</td><td>".$d['tenth']."</td><td><input min=1 max=100    required   type='number'    name='f10i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f10ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f10iii'   ></td><td>100</td></tr>
                      <tr><td>11th Subject</td><td>".$d['eleventh']."</td><td><input id='hh' style='width:70px'  disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f11i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f11ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>";
 }
    if($cls=='secondary result'){
                echo "<div><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>
                      <tr><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td></tr>
                      <tr><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td></tr>
                      <tr><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td></tr>
                      <tr><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td></tr>
                      <tr><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td></tr>
                      <tr><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td></tr>
                      <tr><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td></tr>
                      <tr><td>".$d['eight']."</td><td><input min=1 max=100    required   type='number'    name='f8i'></td><td>100</td></tr>
                      <tr><td>".$d['ninth']."</td><td><input min=1 max=100    required   type='number'    name='f9i'></td><td>100</td></tr>
                      <tr><td>".$d['tenth']."</td><td><input min=1 max=100    required   type='number'    name='f10i'></td><td>100</td></tr>
                      <tr><td>".$d['eleventh']."</td><td><select style='width:70px;height:19px;' name='f11i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>";  
             }
      if($cls==11  or $cls==12){
         
                  echo "<div><table class='resulttable'><tr><th rowspan=2>S.No</th><th rowspan=2>Subject</th><th colspan=2>Unit</th><th colspan=2>Half Yearly</th><th colspan=2>Selection</th></tr>
                      <tr><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td><td id='sh1'>Obtained</td><td id='sh1'>Total</td></tr>
                      <tr><td>1st Subject &nbsp &nbsp</td><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f1iii'   ></td><td>100</td></tr>
                      <tr><td>2nd Subject</td><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f2iii'   ></td><td>100</td></tr>
                      <tr><td>3rd Subject</td><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f3iii'   ></td><td>100</td></tr>
                      <tr><td>4th Subject</td><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f4iii'   ></td><td>100</td></tr>
                      <tr><td>5th Subject</td><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f5iii'   ></td><td>100</td></tr>
                      <tr><td>6th Subject</td><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f6iii'   ></td><td>100</td></tr>
                      <tr><td>7th Subject</td><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7ii'></td><td>100</td><td><input min=1 max=100    required   type='number'    name='f7iii'   ></td><td>100</td></tr>
                      <tr><td>8th Subject</td><td>".$d['eight']."</td><td><input id='hh' style='width:70px'  disabled></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f8i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td><td><select style='width:70px;height:19px;' name='f8ii'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>";
         }
                   if($cls=='Higher secondary result'){
                   echo "<div><table class='resulttable'><tr><th>Subject</th><th>Obtained</th><th>Total</th></tr>
                      <tr><td>".$d['first']."</td><td><input min=1 max=100    required   type='number'    name='f1i'></td><td>100</td></tr>
                      <tr><td>".$d['second']."</td><td><input min=1 max=100    required   type='number'    name='f2i'></td><td>100</td></tr>
                      <tr><td>".$d['third']."</td><td><input min=1 max=100    required   type='number'    name='f3i'></td><td>100</td></tr>
                      <tr><td>".$d['fourth']."</td><td><input min=1 max=100    required   type='number'    name='f4i'></td><td>100</td></tr>
                      <tr><td>".$d['fifth']."</td><td><input min=1 max=100    required   type='number'    name='f5i'></td><td>100</td></tr>
                      <tr><td>".$d['sixth']."</td><td><input min=1 max=100    required   type='number'    name='f6i'></td><td>100</td></tr>
                      <tr><td>".$d['seventh']."</td><td><input min=1 max=100    required   type='number'    name='f7i'></td><td>100</td></tr>
                      <tr><td>".$d['eight']."</td><td><select style='width:70px;height:19px;' name='f8i'><option>A</option><option>B</option><option>C</option></select></td><td><input id='hh' style='width:80px' disabled></td></tr></table></div>";
                      echo"<input   type='hidden'    name='Reg' value='$reg' ><input   type='hidden'    name='Cls' value='$cls' ><br><center><input type='submit' name='Setr' value='Set result'> <button onclick=location.href='result.php';>Clear fields </button></center>
          </form> </center></div>";
}}}else{
      echo "<script>alert('student reads in class {$w}')</script>";
    }   } }   
?>
</div>
<?php
  include('connection.php');
    $reg=NULL;
    $cls=NULL;
  if(isset($_POST['Setr'])){
    $reg=$_POST['Reg'];
    $cls=$_POST['Cls'];
    $sql2="select * from student where reg='$reg' ";
    $data2=mysqli_query($con,$sql2);
    $d2=mysqli_fetch_assoc($data2);
    $w=$d2['class'];
    if($cls==1 or $cls==3 or $cls==4 or $cls==5){
    $s1=array($_POST['f1i'],$_POST['f1ii'],$_POST['f1iii'],intval(intval($_POST['f1i'])*(100/300)+intval($_POST['f1ii'])*(100/300)+intval($_POST['f1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['f2i'],$_POST['f2ii'],$_POST['f2iii'],intval(intval($_POST['f2i'])*(100/300)+intval($_POST['f2ii'])*(100/300)+intval($_POST['f2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['f3i'],$_POST['f3ii'],$_POST['f3iii'],intval(intval($_POST['f3i'])*(100/300)+intval($_POST['f3ii'])*(100/300)+intval($_POST['f3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['f4i'],$_POST['f4ii'],$_POST['f4iii'],intval(intval($_POST['f4i'])*(100/300)+intval($_POST['f4ii'])*(100/300)+intval($_POST['f4ii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['f5i'],$_POST['f5ii'],$_POST['f5iii'],intval(intval($_POST['f5i'])*(100/300)+intval($_POST['f5ii'])*(100/300)+intval($_POST['f5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['f6i'],$_POST['f6ii'],$_POST['f6iii'],intval(intval($_POST['f6i'])*(100/300)+intval($_POST['f6ii'])*(100/300)+intval($_POST['f6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['f7i'],$_POST['f7ii']);
    $s17=implode('/',$s7);
    $s8=array($_POST['f8i'],$_POST['f8ii']);
    $s18=implode('/',$s8);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','','','','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";    
    }
    if($cls==2){
    $s1=array($_POST['f1i'],$_POST['f1ii'],$_POST['f1iii'],intval(intval($_POST['f1i'])*(100/300)+intval($_POST['f1ii'])*(100/300)+intval($_POST['f1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['f2i'],$_POST['f2ii'],$_POST['f2iii'],intval(intval($_POST['f2i'])*(100/300)+intval($_POST['f2ii'])*(100/300)+intval($_POST['f2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['f3i'],$_POST['f3ii'],$_POST['f3iii'],intval(intval($_POST['f3i'])*(100/300)+intval($_POST['f3ii'])*(100/300)+intval($_POST['f3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['f4i'],$_POST['f4ii'],$_POST['f4iii'],intval(intval($_POST['f4i'])*(100/300)+intval($_POST['f4ii'])*(100/300)+intval($_POST['f4ii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['f5i'],$_POST['f5ii'],$_POST['f5iii'],intval(intval($_POST['f5i'])*(100/300)+intval($_POST['f5ii'])*(100/300)+intval($_POST['f5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['f6i'],$_POST['f6ii'],$_POST['f6iii'],intval(intval($_POST['f6i'])*(100/300)+intval($_POST['f6ii'])*(100/300)+intval($_POST['f6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['f7i'],$_POST['f7ii'],$_POST['f7iii'],intval(intval($_POST['f7i'])*(100/300)+intval($_POST['f7ii'])*(100/300)+intval($_POST['f7ii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['f8i'],$_POST['f8ii'],$_POST['f8iii'],intval(intval($_POST['f8i'])*(100/300)+intval($_POST['f8ii'])*(100/300)+intval($_POST['f8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['f9i'],$_POST['f9ii']);
    $s19=implode('/',$s9);
    $s10=array($_POST['f10i'],$_POST['f10ii']);
    $s110=implode('/',$s10);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s110','','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>"; }   
    if($cls==6 or $cls==7 or $cls==8){
    $s1=array($_POST['f1i'],$_POST['f1ii'],$_POST['f1iii'],intval(intval($_POST['f1i'])*(100/300)+intval($_POST['f1ii'])*(100/300)+intval($_POST['f1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['f2i'],$_POST['f2ii'],$_POST['f2iii'],intval(intval($_POST['f2i'])*(100/300)+intval($_POST['f2ii'])*(100/300)+intval($_POST['f2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['f3i'],$_POST['f3ii'],$_POST['f3iii'],intval(intval($_POST['f3i'])*(100/300)+intval($_POST['f3ii'])*(100/300)+intval($_POST['f3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['f4i'],$_POST['f4ii'],$_POST['f4iii'],intval(intval($_POST['f4i'])*(100/300)+intval($_POST['f4ii'])*(100/300)+intval($_POST['f4ii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['f5i'],$_POST['f5ii'],$_POST['f5iii'],intval(intval($_POST['f5i'])*(100/300)+intval($_POST['f5ii'])*(100/300)+intval($_POST['f5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['f6i'],$_POST['f6ii'],$_POST['f6iii'],intval(intval($_POST['f6i'])*(100/300)+intval($_POST['f6ii'])*(100/300)+intval($_POST['f6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['f7i'],$_POST['f7ii'],$_POST['f7iii'],intval(intval($_POST['f7i'])*(100/300)+intval($_POST['f7ii'])*(100/300)+intval($_POST['f7ii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['f8i'],$_POST['f8ii'],$_POST['f8iii'],intval(intval($_POST['f8i'])*(100/300)+intval($_POST['f8ii'])*(100/300)+intval($_POST['f8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['f9i'],$_POST['f9ii'],$_POST['f9iii'],intval(intval($_POST['f9i'])*(100/300)+intval($_POST['f9ii'])*(100/300)+intval($_POST['f9iii'])*(100/300)));
    $s19=implode('/',$s9);
    $s10=array($_POST['f10i'],$_POST['f10ii'],$_POST['f10iii'],intval(intval($_POST['f10i'])*(100/300)+intval($_POST['f10ii'])*(100/300)+intval($_POST['f10iii'])*(100/300)));
    $s110=implode('/',$s10);
    $s11a=array($_POST['f11i'],$_POST['f11ii'],$_POST['f11iii'],intval(intval($_POST['f11i'])*(100/300)+intval($_POST['f11ii'])*(100/300)+intval($_POST['f11iii'])*(100/300)));
    $s111=implode('/',$s11a);
    $s12a=array($_POST['f12i'],$_POST['f12ii'],$_POST['f12iii'],intval(intval($_POST['f12i'])*(100/300)+intval($_POST['f12ii'])*(100/300)+intval($_POST['f12iii'])*(100/300)));
    $s112=implode('/',$s12a);
    $s13a=array($_POST['f13i'],$_POST['f13ii']);
    $s113=implode('/',$s13a);
    $s14a=array($_POST['f14i'],$_POST['f14ii']);
    $s114=implode('/',$s14a);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s110','$s111','$s112','$s113','$s114')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";    
    }
    if($cls==9 or $cls==10){
    $s1=array($_POST['f1i'],$_POST['f1ii'],$_POST['f1iii'],intval(intval($_POST['f1i'])*(100/300)+intval($_POST['f1ii'])*(100/300)+intval($_POST['f1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['f2i'],$_POST['f2ii'],$_POST['f2iii'],intval(intval($_POST['f2i'])*(100/300)+intval($_POST['f2ii'])*(100/300)+intval($_POST['f2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['f3i'],$_POST['f3ii'],$_POST['f3iii'],intval(intval($_POST['f3i'])*(100/300)+intval($_POST['f3ii'])*(100/300)+intval($_POST['f3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['f4i'],$_POST['f4ii'],$_POST['f4iii'],intval(intval($_POST['f4i'])*(100/300)+intval($_POST['f4ii'])*(100/300)+intval($_POST['f4ii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['f5i'],$_POST['f5ii'],$_POST['f5iii'],intval(intval($_POST['f5i'])*(100/300)+intval($_POST['f5ii'])*(100/300)+intval($_POST['f5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['f6i'],$_POST['f6ii'],$_POST['f6iii'],intval(intval($_POST['f6i'])*(100/300)+intval($_POST['f6ii'])*(100/300)+intval($_POST['f6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['f7i'],$_POST['f7ii'],$_POST['f7iii'],intval(intval($_POST['f7i'])*(100/300)+intval($_POST['f7ii'])*(100/300)+intval($_POST['f7ii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['f8i'],$_POST['f8ii'],$_POST['f8iii'],intval(intval($_POST['f8i'])*(100/300)+intval($_POST['f8ii'])*(100/300)+intval($_POST['f8iii'])*(100/300)));
    $s18=implode('/',$s8);
    $s9=array($_POST['f9i'],$_POST['f9ii'],$_POST['f9iii'],intval(intval($_POST['f9i'])*(100/300)+intval($_POST['f9ii'])*(100/300)+intval($_POST['f9iii'])*(100/300)));
    $s19=implode('/',$s9);
    $s10=array($_POST['f10i'],$_POST['f10ii'],$_POST['f10iii'],intval(intval($_POST['f10i'])*(100/300)+intval($_POST['f10ii'])*(100/300)+intval($_POST['f10iii'])*(100/300)));
    $s110=implode('/',$s10);
    $s11a=array($_POST['f11i'],$_POST['f11ii']);
    $s111=implode('/',$s11a);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s110','$s111','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";    
    }
    if($cls==11 or $cls==12){
    $s1=array($_POST['f1i'],$_POST['f1ii'],$_POST['f1iii'],intval(intval($_POST['f1i'])*(100/300)+intval($_POST['f1ii'])*(100/300)+intval($_POST['f1iii'])*(100/300)));
    $s11=implode('/',$s1);
    $s2=array($_POST['f2i'],$_POST['f2ii'],$_POST['f2iii'],intval(intval($_POST['f2i'])*(100/300)+intval($_POST['f2ii'])*(100/300)+intval($_POST['f2iii'])*(100/300)));
    $s12=implode('/',$s2);
    $s3=array($_POST['f3i'],$_POST['f3ii'],$_POST['f3iii'],intval(intval($_POST['f3i'])*(100/300)+intval($_POST['f3ii'])*(100/300)+intval($_POST['f3iii'])*(100/300)));
    $s13=implode('/',$s3);
    $s4=array($_POST['f4i'],$_POST['f4ii'],$_POST['f4iii'],intval(intval($_POST['f4i'])*(100/300)+intval($_POST['f4ii'])*(100/300)+intval($_POST['f4ii'])*(100/300)));
    $s14=implode('/',$s4);
    $s5=array($_POST['f5i'],$_POST['f5ii'],$_POST['f5iii'],intval(intval($_POST['f5i'])*(100/300)+intval($_POST['f5ii'])*(100/300)+intval($_POST['f5iii'])*(100/300)));
    $s15=implode('/',$s5);
    $s6=array($_POST['f6i'],$_POST['f6ii'],$_POST['f6iii'],intval(intval($_POST['f6i'])*(100/300)+intval($_POST['f6ii'])*(100/300)+intval($_POST['f6iii'])*(100/300)));
    $s16=implode('/',$s6);
    $s7=array($_POST['f7i'],$_POST['f7ii'],$_POST['f7iii'],intval(intval($_POST['f7i'])*(100/300)+intval($_POST['f7ii'])*(100/300)+intval($_POST['f7ii'])*(100/300)));
    $s17=implode('/',$s7);
    $s8=array($_POST['f8i'],$_POST['f8ii']);
    $s18=implode('/',$s8);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','','','','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";    
    }if($cls=='secondary result'){
    $sql2="select * from student where reg='$reg' and class='10'";
    $data2=mysqli_query($con,$sql2);
    $d2=mysqli_fetch_assoc($data2);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$_POST[f1i]','$_POST[f2i]','$_POST[f3i]','$_POST[f4i]','$_POST[f5i]','$_POST[f6i]','$_POST[f7i]','$_POST[f8i]','$_POST[f9i]','$_POST[f10i]','$_POST[f11i]','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";
    }if($cls=='Higher secondary result'){
    $sql2="select * from student where reg='$reg' and class='12'";
    $data2=mysqli_query($con,$sql2);
    $d2=mysqli_fetch_assoc($data2);
    $s="insert into result values('$reg','$cls','$d2[roll]','$d2[section]','$d2[stream]','$d2[first]','$d2[second]','$d2[third]','$d2[fourth]','$d2[fifth]','$d2[sixth]','$d2[seventh]','$d2[eight]','$d2[ninth]','$d2[tenth]','$d2[eleventh]','$d2[twelveth]','$d2[thirteen]','$d2[fourteen]','$_POST[f1i]','$_POST[f2i]','$_POST[f3i]','$_POST[f4i]','$_POST[f5i]','$_POST[f6i]','$_POST[f7i]','$_POST[f8i]','','','','','','')";
    $q=mysqli_query($con,$s) or die('insertion failed');
    echo "<script>alert('insertion successfully...')</script>";
    }}
?>