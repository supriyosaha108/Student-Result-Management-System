<html>
<head>
<link rel="stylesheet" href="CSS/forms.css">
</head>
  <body>
    <div>
        <h1 align="center">Subject Modification Form</h1>
        <form action="" method="POST" autocomplete="off">
            <div class="section1"><center>
            <label for="class">Class &nbsp;: &nbsp;</label>
             <select id="class" name="class"required >
                <option value="" disabled selected hidden>Select</option>
                <?php for ($i=1; $i<=12; $i++) { echo "<option value=$i "; if(isset($_POST['class']) && $_POST['class'] == $i) { echo 'selected'; } echo " >$i</option>"; } ?>
            </select> &nbsp;  &nbsp;
            <label for="stream">Stream &nbsp;: &nbsp;</label>
            <select id="stream" name="stream"  required>
                <option value="" disabled selected hidden>Select</option>
                <option value="None" <?php echo (isset($_POST['stream']) && $_POST['stream'] === 'None') ? 'selected' : ''; ?> >None</option>
                <option value="Science" <?php echo (isset($_POST['stream']) && $_POST['stream'] === 'Science') ? 'selected' : ''; ?> >Science</option>
                <option value="Commerce" <?php echo (isset($_POST['stream']) && $_POST['stream'] === 'Commerce') ? 'selected' : ''; ?> >Commerce</option>
                <option value="Arts" <?php echo (isset($_POST['stream']) && $_POST['stream'] === 'Arts') ? 'selected' : ''; ?> >Arts</option>
            </select> &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Fetch Subject" name='submit'>
            </center></div>
        </form>
        </div>
 <?php
include("connection.php");
$b=NULL;
$s=NULL;
 if(isset($_POST['submit']))
 { 
$b=$_POST['class'];
$s=$_POST['stream'];
$sql="select * from sub6 where class=$b and stream='$s'  ";
$result1=mysqli_query($con,$sql);
$res=mysqli_fetch_array($result1);
if($b<=10 and $s=='None'){ }
else if($b>10 and $s=='Science' or $b>10 and $s=='Arts' or $b>10 and $s=='Commerce'){ }
else{echo "<script> alert('Please select valid class and stream'); </script>";die('');}
$f=$res['first']; $s1=$res['second']; $td=$res['third']; $fr=$res['fourth']; $fi=$res['fifth']; $sx=$res['sixth']; $se=$res['seventh']; $e=$res['eight']; $n1=$res['ninth']; $t1=$res['tenth']; $el=$res['eleventh']; $tw=$res['twelveth']; $th=$res['thirteen']; $fo=$res['fourteen']; 
if($b==1 or $b==3 or $b==4 or $b==5) {  
   echo"<div class='section1' > <form action='' method='POST'>
            <table id='subtable'><tr><th>S.No</th><th>Subject Name</th></tr>
            <tr><td><label>1st Subject</label></td>
        <td><input type='text' name='first' placeholder='Enter Your 1st subject' value='$f'required>
    </td></tr></div>
        <div >
            <tr><td><label>2nd Subject</label></td>
      <td><input type='text' name='second' placeholder='Enter Your 2nd subject' value='$s1'required>
         </td></tr></div>
    <div >
             <tr><td><label>3rd Subject</label></td>
       <td><input type='text' name='third' placeholder='Enter Your 3rd subject' value='$td'required>
         </td></tr></div>
    <div >
             <tr><td><label>4th Subject</label></td>
        <td><input type='text' name='fourth' placeholder='Enter Your 4th subject' value='$fr'required>
         </td></tr></div>
    <div >
             <tr><td><label>5th Subject</label></td>
        <td><input type='text' name='fifth' placeholder='Enter Your 5th subject'  value='$fi'required>
         </td></tr></div>
        <div >
             <tr><td><label>6th Subject</label></td>
        <td><input type='text' name='sixth' placeholder='Enter Your 6th subject'  value='$sx'required>
         </td></tr></div>
         <div >
             <tr><td><label>7th Subject</label></td>
  <td><input type='text' name='seventh' placeholder='Enter Your 7th subject'  value='$se'required>
         </td></tr></div>
        <div >
            <tr><td><label>8th Subject</label></td>
        <td><input type='text' name='eight' placeholder='Enter Your 8th subject' value='$e'required>
    </td></tr></div></table>  ";}
 if($b==2) {
  echo"<div  class='section1'> <form action='' method='POST'>
            <table id='subtable'><tr><th>S.No</th><th>Subject Name</th></tr><tr><td><label>1st Subject</label></td>
        <td><input type='text' name='first' placeholder='Enter Your 1st subject' value='$f'required>
    </td></tr></div>
         <div >
            <tr><td><label>2nd Subject</label></td>
      <td><input type='text' name='second' placeholder='Enter Your 2nd subject' value='$s1'required>
         </td></tr></div>
        <div >
             <tr><td><label>3rd Subject</label></td>
       <td><input type='text' name='third' placeholder='Enter Your 3rd subject' value='$td'required>
         </td></tr></div>
     <div >
             <tr><td><label>4th Subject</label></td>
        <td><input type='text' name='fourth' placeholder='Enter Your 4th subject' value='$fr'required>
         </td></tr></div>
         <div >
             <tr><td><label>5th Subject</label></td>
        <td><input type='text' name='fifth' placeholder='Enter Your 5th subject'  value='$fi'required>
         </td></tr></div>
        <div >
             <tr><td><label>6th Subject</label></td>
        <td><input type='text' name='sixth' placeholder='Enter Your 6th subject'  value='$sx'required>
         </td></tr></div>
        <div >
             <tr><td><label>7th Subject</label></td>
  <td><input type='text' name='seventh' placeholder='Enter Your 7th subject'  value='$se'required>
         </td></tr></div>
         <div >
            <tr><td><label>8th Subject</label></td>
        <td><input type='text' name='eight' placeholder='Enter Your 8th subject' value='$e'required>
    </td></tr></div>
    <div >
            <tr><td><label>9th Subject :</label></td>
       <td><input type='text' name='ninth' placeholder='Enter Your 9th subject' value='$n1'required>
    </td></tr></div>
     <div >
            <tr><td><label>10th Subject :</label></td>
        <td><input type='text' name='tenth' placeholder='Enter Your 10th subject' value='$t1'required>
    </td></tr></div></table> "; }
         if($b==6 or $b==7 or $b==8) {
           echo"<div class='section1'> <form action='' method='POST'>
            <table id='subtable'><tr><th>S.No</th><th>Subject Name</th></tr><tr><td><label>1st Subject</label></td>
        <td><input type='text' name='first' placeholder='Enter Your 1st subject' value='$f'required>
    </td></tr></div>
        
         <div >
            <tr><td><label>2nd Subject</label></td>
      <td><input type='text' name='second' placeholder='Enter Your 2nd subject' value='$s1'required>
         </td></tr></div>
         <div >
             <tr><td><label>3rd Subject</label></td>
       <td><input type='text' name='third' placeholder='Enter Your 3rd subject' value='$td'required>
         </td></tr></div>
        <div >
             <tr><td><label>4th Subject</label></td>
        <td><input type='text' name='fourth' placeholder='Enter Your 4th subject' value='$fr'required>
         </td></tr></div>
         <div >
             <tr><td><label>5th Subject</label></td>
        <td><input type='text' name='fifth' placeholder='Enter Your 5th subject'  value='$fi'required>
         </td></tr></div>
        <div >
             <tr><td><label>6th Subject</label></td>
        <td><input type='text' name='sixth' placeholder='Enter Your 6th subject'  value='$sx'required>
         </td></tr></div>
        <div >
             <tr><td><label>7th Subject</label></td>
  <td><input type='text' name='seventh' placeholder='Enter Your 7th subject'  value='$se'required>
         </td></tr></div>
         <div >
            <tr><td><label>8th Subject</label></td>
        <td><input type='text' name='eight' placeholder='Enter Your 8th subject' value='$e'required>
    </td></tr></div>
    <div >
            <tr><td><label>9th Subject :</label></td>
       <td><input type='text' name='ninth' placeholder='Enter Your 9th subject' value='$n1'required>
    </td></tr></div>
         <div >
            <tr><td><label>10th Subject :</label></td>
        <td><input type='text' name='tenth' placeholder='Enter Your 10th subject' value='$t1'required>
    </td></tr></div> <div >
            <tr><td><label>11th Subject :</label></td>
      <td><input type='text' name='eleventh' placeholder='Enter Your 11th subject' value='$el'required>
    </td></tr></div>
        <div >
            <tr><td><label>12th Subject :</label></td>
      <td><input type='text' name='twelveth' placeholder='Enter Your 12th subject' value='$tw'required>
    </td></tr></div>
         <div >
            <tr><td><label>13th Subject :</label></td>
        <td><input type='text' name='thirteen' placeholder='Enter Your 13th subject' value='$th'required>
    </td></tr></div>
          <div >
            <tr><td><label>14th Subject :</label></td>
       <td><input type='text' name='fourteen' placeholder='Enter Your 14th subject' value='$fo'required>
    </td></tr></div></table> ";}
    if($b==9 or $b==10) {
         echo"<div  class='section1'> <form action='' method='POST'>
            <table id='subtable'><tr><th>S.No</th><th>Subject Name</th></tr><tr><td><label>1st Subject</label></td>
        <td><input type='text' name='first' placeholder='Enter Your 1st subject' value='$f'required>
    </td></tr></div>
        <div >
            <tr><td><label>2nd Subject</label></td>
      <td><input type='text' name='second' placeholder='Enter Your 2nd subject' value='$s1'required>
         </td></tr></div>
        <div >
             <tr><td><label>3rd Subject</label></td>
       <td><input type='text' name='third' placeholder='Enter Your 3rd subject' value='$td'required>
         </td></tr></div>
         <div >
             <tr><td><label>4th Subject</label></td>
        <td><input type='text' name='fourth' placeholder='Enter Your 4th subject' value='$fr'required>
         </td></tr></div>
    <div >
             <tr><td><label>5th Subject</label></td>
        <td><input type='text' name='fifth' placeholder='Enter Your 5th subject'  value='$fi'required>
         </td></tr></div>
        <div >
             <tr><td><label>6th Subject</label></td>
        <td><input type='text' name='sixth' placeholder='Enter Your 6th subject'  value='$sx'required>
         </td></tr></div>
        
         <div >
             <tr><td><label>7th Subject</label></td>
  <td><input type='text' name='seventh' placeholder='Enter Your 7th subject'  value='$se'required>
         </td></tr></div>
         <div >
            <tr><td><label>8th Subject</label></td>
        <td><input type='text' name='eight' placeholder='Enter Your 8th subject' value='$e'required>
    </td></tr></div>
    <div >
            <tr><td><label>9th Subject :</label></td>
       <td><input type='text' name='ninth' placeholder='Enter Your 9th subject' value='$n1'required>
    </td></tr></div>
        <div >
            <tr><td><label>10th Subject :</label></td>
        <td><input type='text' name='tenth' placeholder='Enter Your 10th subject' value='$t1'required>
    </td></tr></div> <div >
            <tr><td><label>11th Subject :</label></td>
      <td><input type='text' name='eleventh' placeholder='Enter Your 11th subject' value='$el'required>
    </td></tr></div></table> ";}
       if($b==11 or $b==12){
        echo"<div  class='section1'> <form action='' method='POST'>
            <table id='subtable'><tr><th>S.No</th><th>Subject Name</th></tr><tr><td><label>1st Subject</label></td>
        <td><input type='text' name='first' placeholder='Enter Your 1st subject' value='$f'required>
    </td></tr></div>
        <div >
            <tr><td><label>2nd Subject</label></td>
      <td><input type='text' name='second' placeholder='Enter Your 2nd subject' value='$s1'required>
         </td></tr></div>
         <div >
             <tr><td><label>3rd Subject</label></td>
       <td><input type='text' name='third' placeholder='Enter Your 3rd subject' value='$td'required>
         </td></tr></div>
        <div >
             <tr><td><label>4th Subject</label></td>
        <td><input type='text' name='fourth' placeholder='Enter Your 4th subject' value='$fr'required>
         </td></tr></div>
        <div >
             <tr><td><label>5th Subject</label></td>
        <td><input type='text' name='fifth' placeholder='Enter Your 5th subject'  value='$fi'required>
         </td></tr></div>
         <div >
             <tr><td><label>6th Subject</label></td>
        <td><input type='text' name='sixth' placeholder='Enter Your 6th subject'  value='$sx'required>
         </td></tr></div>
        <div >
             <tr><td><label>7th Subject</label></td>
  <td><input type='text' name='seventh' placeholder='Enter Your 7th subject'  value='$se'required>
         </td></tr></div>
<div >
            <tr><td><label>8th Subject</label></td>
        <td><input type='text' name='eight' placeholder='Enter Your 8th subject' value='$e'required>
    </td></tr></div></table>";  }
echo"<td><input type='hidden' value='$b' name='Class' ><td><input type='hidden' value='$s' name='Stream' ><td>
<br><center><input type='submit' name='update' value='Update Subjects'></center></form>";  } 
?>
<?php
include("connection.php");
$n=NULL;
$t=NULL;
if(isset($_POST["update"])) 
{
$n=$_POST["Class"];
$t=$_POST["Stream"];    
if($n==6 or $n==7 or $n==8){ 
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$seventh=$_POST["seventh"];
$eight=$_POST["eight"];
$ninth=$_POST["ninth"];
$tenth=$_POST["tenth"];
$eleventh=$_POST["eleventh"];
$twelveth=$_POST["twelveth"];
$thirteen=$_POST["thirteen"];
$fourteen=$_POST["fourteen"];
$sql="update sub6 set first='$first', second='$second', third='$third', fourth='$fourth', fifth='$fifth', sixth='$sixth', seventh='$seventh', eight='$eight', ninth='$ninth',tenth='$tenth', eleventh='$eleventh',twelveth='$twelveth',thirteen='$thirteen',fourteen='$fourteen' where class=$n and stream='$t' ";
$result=mysqli_query($con,$sql) or die("Updation Failed");
echo " <script>alert('Updation Successful')</script>";}
if($n==1 or $n==3 or $n==4 or $n==5){
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$seventh=$_POST["seventh"];
$eight=$_POST["eight"];
$sql="update sub6 set first='$first', second='$second', third='$third', fourth='$fourth', fifth='$fifth', sixth='$sixth', seventh='$seventh', eight='$eight', ninth=NULL ,tenth=NULL, eleventh=NULL,twelveth=NULL,thirteen=NULL,fourteen=NULL where class=$n and stream='$t' ";
$result=mysqli_query($con,$sql) or die("Updation Failed");
echo " <script>alert('Updation Successful')</script>";}
if($n==2){ 
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$seventh=$_POST["seventh"];
$eight=$_POST["eight"];
$ninth=$_POST["ninth"];
$tenth=$_POST["tenth"];
$sql="update sub6 set first='$first', second='$second', third='$third', fourth='$fourth', fifth='$fifth', sixth='$sixth', seventh='$seventh', eight='$eight', ninth='$ninth' ,tenth='$tenth', eleventh=NULL,twelveth=NULL,thirteen=NULL,fourteen=NULL where class=$n and stream='$t' ";
$result=mysqli_query($con,$sql) or die("Updation Failed");
echo " <script>alert('Updation Successful')</script>";}
if($n==9 or $n==10){ 
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$seventh=$_POST["seventh"];
$eight=$_POST["eight"];
$ninth=$_POST["ninth"];
$tenth=$_POST["tenth"];
$eleventh=$_POST["eleventh"];
$sql="update sub6 set first='$first', second='$second', third='$third', fourth='$fourth', fifth='$fifth', sixth='$sixth', seventh='$seventh', eight='$eight', ninth='$ninth' ,tenth='$tenth', eleventh='$eleventh',twelveth=NULL,thirteen=NULL,fourteen=NULL where class=$n and stream='$t' ";
$result=mysqli_query($con,$sql) or die("Updation Failed");
echo " <script>alert('Updation Successful')</script>";}
if($n==11 or $n==12){ 
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$seventh=$_POST["seventh"];
$eight=$_POST["eight"];
$sql="update sub6 set first='$first', second='$second', third='$third', fourth='$fourth', fifth='$fifth', sixth='$sixth', seventh='$seventh', eight='$eight', ninth=NULL ,tenth=NULL, eleventh=NULL,twelveth=NULL,thirteen=NULL,fourteen=NULL where class=$n and stream='$t' ";
$result=mysqli_query($con,$sql) or die("Updation Failed");
echo " <script>alert('Updation Successful')</script>"; } }
?>
</body>
</html>