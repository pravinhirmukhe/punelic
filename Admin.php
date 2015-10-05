<?php
session_start();
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
                                <h3 class="media-heading">Admin Panel</h3>
                                <h3><a href="Logout.php">Logout</a>
                            </div>
                        </div>
                    </div><!--/.col-md-4--> 
                </div>
            </div>
        </section><!--/#services-->


        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 

                    <div class="span9">
                        <h4>Add New Registration</h4>
                        <a href="AgentRegistration.php"><h4>-----Add New Agent Registration</h4></a>
                        <a href="DORegistration.php"><h4>-----Add New D.O. Registration</h4></a>
                        <br>
                        <h4>Update Registration</h4>
                        <a href="ShowUser.php"><h4>-----Update Agent Registration</h4></a>
                        <a href="UpdateDORegistration.php"><h4>-----Update D.O. Registration</h4></a>
                        <br>
                        <a href="ChangePass.php"><h4>Change Admin Password</h4></a>
                        <br>
                    </div>

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