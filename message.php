<?php
ob_start();
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
                                <h3 class="media-heading">Send Message <a href="Admin.php"><span class="glyphicon glyphicon-circle-arrow-left pull-right"></span></a></h3>
                            </div>
                        </div>
                    </div><!--/.col-md-4--> 
                </div>
            </div>
        </section><!--/#services-->


        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 

                    <form action="contact-smtp3.php" method="POST" enctype="multipart/form-data">

                        <table align="center" cellpadding="5px"><tr><td>Name: </td><td><input type="text" value="" class="form-control" name="txtName" PlaceHolder="Enter Name"></td></tr>



                            <tr><td>Contact Number: </td><td><input type="text" value="" class="form-control" name="txtContact" maxlength="10" placeholder="Enter Contact Number"></td></tr>
                            <tr><td>Email : </td><td><input type="text" value="" class="form-control" name="txtEmail" placeholder="Enter Email"></td></tr>
                            <tr><td><b>Message :<b></td><td><textarea value="" class="form-control" name="txtArea" placeholder="Enter message" cols="25" rows="5"></textarea></b></td></tr>



                            <tr><td><br><br> <input type="submit" name="Registration" value="Send" class="btn btn-success"/></td>
                                <td> <br><br><input type="submit" name="Cancel" value="Back" class="btn btn-warning"/> </td></tr>
                                    <?php
                                    session_start();

//$id6=$_SESSION['id5'];
//echo $id6;
//$id6=$_SESSION["no"];
//echo $id6;

                                    $id9 = $_SESSION['id5'];
                                    echo $id9;
                                    ?>

                        </table>
                </div>
                </form>

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


