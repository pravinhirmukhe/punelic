<?php
ob_start();
include './secure.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Flat Theme</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->
    <body>

        <?php include 'header.php'; ?>

        <section id="services" class="emerald">
            <div class="container" style="padding-top:1%;">
                <div class="row">
                    <div class="col-md-9 col-sm-6">
                        <div class="media"> 
                            <div class="media-body">
                                <h3 class="media-heading">Change Password<a href="Admin.php"><span class="glyphicon glyphicon-circle-arrow-left pull-right"></span></a></h3>
                            </div>
                        </div>
                    </div><!--/.col-md-4--> 
                </div>
            </div>
        </section><!--/#services-->


        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 
                    <form action="" method="POST">
                        <table><tr><td>Old Password:</td><td><input type="text" class="form-control"  placeholder="Enter Old Password" name="txtOldPass" id="opassword"></td></tr>
                            <tr><td>Enter New Password:</td><td><input type="Password" class="form-control"  id="npassword" placeholder="Enter New Password" name="txtNewPass"></td></tr>
                            <tr><td>Confirm Password:</td><td><input type="password" class="form-control"  placeholder="Retype Password" id="cpassword" name="txtConfPass"></td></tr>
                        </table>
                        <br>
                        <div>
                            <table><tr><td>
                                        <input type="submit"  class="btn btn-success" name="btnChange" value="Change Password"></td> 
                                    <td><input type="submit"  class="btn btn-warning" name="btnCancel" value="Cancel"></td> </tr>
                            </table>
                        </div>
                    </form>

                    <?php
                    ob_start();
                    include('config.php');

                    function validate() {
                        $op = $_POST['txtOldPass'];
                        $np = $_POST['txtNewPass'];
                        $cp = $_POST['txtConfPass'];

                        if (empty($op) && empty($np) && empty($cp)) {
                            echo"<script type=text/javascript>alert('Field Should not empty');
    document.getElementById('opassword').focus();
    </script>";
                        } elseif ($np != $cp) {
                            echo"<script type=text/javascript>alert('Password Doesnt Match');
    document.getElementById('cpassword').focus();
    </script>";
                        } else {
                            return true;
                        }
                    }

                    if (isset($_REQUEST['btnChange'])) {

                        if (validate()) {
                            $pass = $_POST['txtOldPass'];
                            $q = mysql_query("select * from login where Password ='$pass'");
                            if (mysql_num_rows($q) > 0) {
                                $result = mysql_query("update login set Password='" . $_POST['txtNewPass'] . "' where Password='" . $pass . "'");
                                if ($result) {
                                    echo"<script type=text/javascript>alert('Password Successfully updated');</script>";
                                    print "<script>";
                                    print " self.location='Admin.php';";
                                    print "</script>";
                                } else {
                                    echo"<script type=text/javascript>alert('Password Not Updated');</script>";
                                }
                            } else {
                                echo"<script type=text/javascript>alert('Old Password Is Wrong! Enter Correct Password.');</script>";
                            }
                        }
                    }

                    if (isset($_REQUEST['btnCancel'])) {
                        header("location:Admin.php");
                    }
                    ?>  

                </div> 



            </div><!--/.row-->
        </div>


        <?php include 'footer-admin.php'; ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>