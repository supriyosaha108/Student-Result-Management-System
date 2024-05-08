<?php
if(isset($_COOKIE['SRM14S'])) {
    setcookie('SRM14S', "" ,time() - 3600,"/");
    if(file_exists("temp.bin")){unlink("temp.bin");}
    if(file_exists("images/temp.bin")){unlink("images/temp.bin");}
    echo "Logging out...";
    header( "refresh:0.2;url='loginStudent.php'" );
}
else {
    echo "<h3>Invalid Request.<h3>";
}
?>