
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
                                <h3 class="media-heading">Add New Agent Registration <a href="Admin.php"><span class="glyphicon glyphicon-circle-arrow-left pull-right"></span></a></h3>
                            </div>
                        </div>
                    </div><!--/.col-md-4--> 
                </div>
            </div>
        </section><!--/#services-->



        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 


                    <form action="" method="POST" enctype="multipart/form-data">

                        <table align="center" cellpadding="5px"><tr><td>Name: </td><td><input type="text" value="" class="form-control" name="txtName" PlaceHolder="Enter Name"></td></tr>

                            <tr><td>Agent Code :</td><td><input type="text" value="" class="form-control" name="txtAgentCode" placeholder="Enter Agent Code"></td></tr>
                            <tr><td>Club Membership :</td><td><input type="text" value="" class="form-control" name="txtClubMember"placeholder="Enter Clubmembership Number"></td></tr>
                            <tr><td>Branch </td><td><input type="text" value="" class="form-control" name="txtBranch"placeholder="Enter year Branch"></td></tr>
                            <tr><td>Division : </td><td><input type="text" value="" class="form-control" name="txtDivision"placeholder="Enter Division"></td></tr>

                            <tr><td>Contact Number: </td><td><input type="text" value="" class="form-control" name="txtContact" maxlength="10" placeholder="Enter Contact Number"></td></tr>
                            <tr><td>Email : </td><td><input type="text" value="" class="form-control" name="txtEmail" placeholder="Enter Email"></td></tr>
                            <tr><td><b>Area :<b></td><td><input type="text" value="" class="form-control" name="txtArea" placeholder="Enter Area"></b></td></tr>
                            <tr><td>Agency Since :<b></td><td><input type="text" value="" class="form-control" name="txtAgencySince" placeholder="Enter Agency Year"></td></tr>
                            <tr><td>Office Address :<b></td><td><input type="text" value="" class="form-control" name="txtOfficeAddr" placeholder="Enter Office Address"></td></tr>
                            <tr><td>Resdience Address :<b></td><td><input type="text" value="" class="form-control" name="txtRessAddr" placeholder="Enter Resdience Address"></td></tr>
                            <tr><td>Description :<b></td><td><input type="text" value="" class="form-control" name="txtDescription" placeholder="Enter Other Business"></td></tr>



                            <tr><td><br><br> <input type="submit" name="Registration" value="Submit" class="btn btn-success"/></td>
                                <td> <br><br><input type="submit" name="Cancel" value="Back" class="btn btn-warning"/> </td></tr>

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

<?php
session_start();

function validate() {
    if ($_POST['txtName'] != "" && $_POST['txtContact'] != "") {
        return true;
    } else {
        return false;
    }
}

if (isset($_REQUEST['Registration'])) {
    if (validate()) {
        include 'config.php';
        $ac = $_POST['txtAgentCode'];
        $nm = $_POST['txtName'];

        $cm = $_POST['txtClubMember'];
        $br = $_POST['txtBranch'];
        $di = $_POST['txtDivision'];
        $cnt = $_POST['txtContact'];
        $em = $_POST['txtEmail'];
        $ar = $_POST['txtArea'];
        $as = $_POST['txtAgencySince'];
        $oa = $_POST['txtOfficeAddr'];
        $ra = $_POST['txtRessAddr'];
        $de = $_POST['txtDescription'];



        $sql = "insert into Agent_tbl (AgentCode,Name,ClubMember,Branch,Division,Contact,Email,Area,AgencySince,OfficeAddr,ResAddr,Description,Date) values('$ac','$nm','$cm','$br','$di','$cnt','$em','$ar','$as','$oa','$ra','$de','" . date("Y-m-d") . "')";


        $q = mysql_query($sql) or die(mysql_error());
        if ($query) {
            echo "<script type='text/javascript'> confirm('Thanks for Register With Us')</script>";
            print "<script>";

            print "</script>";
            // header("location:Admin.php");
        } else {
            echo "<script type='text/javascript'> alert(' Your Registration not done')</script>";
        }
    }
}

if (isset($_REQUEST['Cancel'])) {
    header("location:Admin.php");
}
?>