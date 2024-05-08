<?php
if(isset($_COOKIE['SRM14A'])) {
    setcookie('SRM14A', "" ,time() - 3600, "/");
    if(file_exists("temp.bin")){unlink("temp.bin");}
    if(file_exists("images/temp.bin")){unlink("images/temp.bin");}
    echo "Logging out...";
    header( "refresh:0.2;url='loginAdmin.php'" );
}
else {
    echo "<h3>Invalid Request.<h3>";
}
?>