<?php

session_start();
session_destroy();

print '<script type="text/javascript">';
print " self.location='index.php';";
//print 'alert("Logout Successful!!!")';
print '</script>';
?>
