<?php
session_start();
if($_SESSION['login']!=1)
{
     print '<script type="text/javascript">';
 print " self.location='login.php';";
 print '</script>'; 
}

?>
