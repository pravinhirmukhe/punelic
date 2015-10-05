<?php
ob_start();
session_start();
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
                                <h3 class="media-heading">Admin Login</h3>
                            </div>
                        </div>
                    </div><!--/.col-md-4--> 
                </div>
            </div>
        </section><!--/#services-->


        <div class="container" style="padding-top:3%;">
            <div class="row">
                <form action="" method="POST">  
                    <h3 align="left"><b>Login</b></h3>
                    <br><br>
                    <div class="col-md-3">
                        <input type="text" value="" class="form-control" name="txtUname" placeholder="Enter User Name"><br><br>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-3">    
                    <input type="password" value="" class="form-control" name="txtPass"placeholder="Enter Password">
                </div>
            </div>

            <div class="row">
                <br><br>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-success" name="btnLogin" id="btnSubmit" value="Login">   

                    <input type="submit" class="btn btn-warning" name="btnCancel" id="btnSubmit" value="Cancel"> 
                    </form>
                    <br><br>
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

<?php
if (isset($_SESSION['view'])) {
    $_SESSION['view'] ++;
} else {
    $_SESSION['view'] ++;
}
echo $_SESSION['view'];
if (isset($_REQUEST['btnLogin'])) {
    include 'config.php';
    $myusername = stripslashes($_POST['txtUname']);
    $mypassword = stripslashes($_POST['txtPass']);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    If (!(empty($mypassword) && empty($myusername))) {
        $sql5 = "SELECT * FROM login WHERE Email='$myusername' and Password='$mypassword'";
        $_SESSION['login'] = 0;
        $result10 = mysql_query($sql5);
        if (mysql_num_rows($result10) > 0) {
            while ($row10 = mysql_fetch_array($result10)) {
                $us = $row10['Email'];
                $pwd = $row10['Password'];
                $_SESSION['user'] = $us;
                $_SESSION['password'] = $pwd;

                $_SESSION['login'] = 1;
            }
            if ($_SESSION['login'] == 1) {
                echo"<script type=text/javascript> confirm('U R LOGIN SUCCESS!!!!');</script>";
                // header("location:Admin.php
                print "<script>";
                print " self.location='Admin.php';";
                print "</script>";
            }
        } else {
            $_SESSION['login'] = 0;
            echo"<script type=text/javascript> alert('Enter Valid Email and Password');
            document.getElementById('txtUname').focus();</script>";
        }
    } else {
        echo"<script type=text/javascript> alert('Enter Login Details');
            document.getElementById('txtUname').focus();</script>";
    }
}
if (isset($_REQUEST['btnCancel'])) {
    header("Location:index.php");
}
?>