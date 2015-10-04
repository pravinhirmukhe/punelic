<<<<<<< HEAD
<?php include 'header.php'; ?>
<script type="text/javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<link href="admin/assets/admin/css/fileinput.min.css" rel="stylesheet">
<div class="container" style="padding-top:2%;" ng-app="punelic">
    <div class="row" ng-controller="registration">
        <div class="col-md-12" style=" font-size:14px;"> 
            <h3 align="center">Welcome to PuneLicAgents.com</h3>
            <h2>Registration Form<small> for Agent and Development Officer</small></h2>
            <hr>
            <?php
            if (isset($_SESSION['resmsg']) && !empty($_SESSION['resmsg'])) {
                if (!$_SESSION['resmsg']['e']) {
                    ?>
                    <div class="alert alert-success"><?= $_SESSION['resmsg']['msg'] ?> </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger"><?= $_SESSION['resmsg']['msg'] ?> </div>
                    <?php
                }
            }
            ?>
            <form action="application/register.php" method="post" enctype="multipart/form-data">
                <div class="list-group" style="box-shadow: 0 2px 4px 3px #e3e3e3;">
                    <div class="list-group-item">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <!-- <td>
                                            ID: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Id" class="form-control" required="required" placeholder="ID">
                                        </td>
                                        <td>
                                            Form No: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Formno" class="form-control" required="required" placeholder="Form No">
                                        </td>
                                        <td>
                                            Date of Registration: <span style="color:red;">*</span>
                                            <input type="date" name="txt_DateofRegistration" class="form-control" required="required" placeholder="Date of Registration">
                                        </td> -->
                                        <td>I am: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_Type" required>
                                                <option value="-1">-- Select --</option>
                                                <option value="Agent">LIC Agent</option>
                                                <option value="DO">Development Officer</option> 
                                            </select>
                                        </td>
                                        <td>
                                            Agent Code: <span style="color:red;">*</span>
                                            <input type="text" name="txt_AgentCode" class="form-control" required="required" placeholder="Agent Code">
                                        </td><td></td>
                                        <td align="center" >Upload Photo</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            First Name: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Fname" class="form-control" required="required" placeholder="First Name">
                                        </td>
                                        <td>
                                            Middle Name: 
                                            <input type="text" name="txt_Mname" class="form-control" placeholder="Middle Name">
                                        </td>
                                        <td>
                                            Last Name: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Lname" class="form-control" required="required" placeholder="Last Name">
                                        </td>
                                        <td rowspan="4" width="200">
                                            <input type="file" class=" file form-control" accept="image/*" name="img_file" required="required"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email: <span style="color:red;">*</span>
                                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="txt_Email" placeholder="Email" class="form-control" required="required">
                                        </td>
                                        <td>
                                            Club Membership:
                                            <input type="text" name="txt_ClubMembership" class="form-control" placeholder="Club Membership">
                                        </td>
                                        <td>
                                            Branch: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Branch" class="form-control" required="required" placeholder="Branch">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Division: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Division" class="form-control" required="required" placeholder="Division">
                                        </td>
                                        <td>
                                            Contact No: <span style="color:red;">*</span>
                                            <input type="text" name="txt_ContactNo" class="form-control" placeholder="Contact No" data-validate-length-range="10,10" required="required" onkeypress="return isNumberKey(event)">
                                        </td>
                                        <td>
                                            Pin Code: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Pincode" class="form-control" placeholder="Pin Code" data-validate-length-range="6,6" required="required" onkeypress="return isNumberKey(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            States: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_State" required ng-model="txt_state" ng-change="getCity(txt_state)">
                                                <option value="-1" >-- Select --</option>
                                                <option value="{{s.city_state}}" ng-repeat="s in states">{{s.city_state}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            City: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_City" required>
                                                <option value="-1" >-- Select --</option>
                                                <option value="{{s.city_name}}" ng-repeat="s in city">{{s.city_name}}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Office Address: <span style="color:red;">*</span>
                                            <textarea class="form-control" name="txt_OfficeAddress" placeholder="Office Address" required="required"></textarea>
                                        </td>
                                        <td colspan="2">
                                            Residence Address: <span style="color:red;">*</span>
                                            <textarea class="form-control" name="txt_ResiAddress" placeholder="Residence Address" required="required"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Agency Since: <span style="color:red;">*</span>
                                            <input type="text" name="txt_AgencySince" class="form-control" placeholder="Agency Since" required="required">
                                        </td>
                                        <td>
                                            Other Business: <span style="color:red;">*</span>
                                            <input type="text" name="txt_OtherBusiness" class="form-control" placeholder="Other Business" required="required">
                                        </td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Area: <span style="color:red;">*</span>
                                            <div class="col-md-12" ng-repeat="e in area">
                                                <i  ng-click="area.splice($index, 1)" class="glyphicon glyphicon-minus-sign pull-right" ng-if="$index < area.length - 1" style="cursor:pointer;z-index: 100;position: absolute;top: 9px;right: 24px"></i>
                                                <i ng-click="area.push({})" class="glyphicon glyphicon-plus-sign pull-right"ng-if="$index == area.length - 1"  style="cursor:pointer;z-index: 100;position: absolute;top: 9px;right: 24px"></i>
                                                <input type="text" name="txt_Area[]" ng-model="e.area" class="form-control" placeholder="Area" required="required">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                            <input type="reset" value="Clear" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
        <p class="gap"></p>
    </div>
</div>

<script type="text/javascript" src="js/angular.min.js"></script>

<script type="text/javascript" src="js/angular.control.js"></script>
<script type="text/javascript" src="admin/assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="admin/assets/admin/js/fileinput.min.js"></script>
<script>
    $(".file").fileinput({
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        maxFileSize: 200
    });
</script>
<?php
session_destroy();
include 'footer.php';
?>
=======
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Pune LIC Agents</title>
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
        <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="lic-agents.php">LIC Agents</a></li>
                        <li><a href="lic-development-officers.php">LIC D.O.</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IC-33 Exam <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">


                                <li><a href="ic33.php">IC-33 Exam Material</a></li>
                                <li><a href="OnlineTest.php">Online Test Practice</a></li>  

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Information <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">

                                <li><a href="product-info.php">Product Info</a></li>
                                <li><a href="premium-calculator.php">Premium Calculator</a></li>
                                <li><a href="branch-locator.php">Branch Locator</a></li> 
                                <li><a href="doctor-locator.php">Doctor Locator</a></li>
                                <li><a href="latest-nav.php">Latest NAV</a></li>

                            </ul>
                        </li>

                        <li><a href="branch-list.php">Branch List</a></li> 
                        <li><a href="download-forms.php">Download Forms</a></li> 
                        <li><a href="https://www.payumoney.com/webfronts/#/index/PuneLicAgents" target="blank">Register</a></li> 

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">LIC Career <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">

                                <li><a href="why-career.php">Why Career as LIC Agent?</a></li>
                                <li><a href="job-profile.php">Job Profile of LIC Agent</a></li>
                                <li><a href="attributes-for-successful.php">Attributes for Successful LIC Agent</a></li>
                                <li><a href="benefits.php">Benefits of LIC Agency as a Career</a></li>
                                <li><a href="article.php">Article</a></li> 
                                <li><a href="industry-news.php">Industry News</a></li>
                                <li><a href="apply-for-lic-agent.php">Apply For LIC Agent Career</a></li>

                            </ul>
                        </li>

                        <li><a href="contact.php">Contact</a></li>
                        <li class="blink_me"><a href="apply-for-lic-agent.php">Apply</a></li>   

                    </ul>
                </div>

            </div>
        </header><!--/header-->
        <section id="main-slider" class="no-margin">
            <div class="carousel slide wet-asphalt">
                <ol class="carousel-indicators">
                    <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#main-slider" data-slide-to="1"></li>
                    <li data-target="#main-slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="carousel-content centered"> 
                                        <h2 class="animation animated-item-1">Find Your Nearest LIC Agent & <br>LIC Develpment Officer</h2>
                                        <p class="animation animated-item-2">You can find Your Nearest LIC Agent & <br>LIC Develpment Officer</p>
                                        <br>
                                        <a class="btn btn-md animation animated-item-3" href="lic-agents.php">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.item-->
                    <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="carousel-content centered"> 
                                        <h2 class="animation animated-item-1">Search Area Wise Agents With <br> Full Details For FREE</h2>
                                        <p class="animation animated-item-2">You can find Your Nearest LIC Agent & <br>LIC Develpment Officer</p>
                                        <br>
                                        <a class="btn btn-md animation animated-item-3" href="lic-agents.php">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.item-->
                    <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="carousel-content centered"> 
                                        <h2 class="animation animated-item-1">Covers All Area Locations <br> And Save Your Valuable Time</h2>
                                        <p class="animation animated-item-2">You can find Your Nearest LIC Agent & <br>LIC Develpment Officer</p>
                                        <br>
                                        <a class="btn btn-md animation animated-item-3" href="lic-agents.php">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.item-->
                </div><!--/.carousel-inner-->
            </div><!--/.carousel-->
            <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
                <i class="icon-angle-left"></i>
            </a>
            <a class="next hidden-xs" href="#main-slider" data-slide="next">
                <i class="icon-angle-right"></i>
            </a>
        </section><!--/#main-slider-->

        <section id="services" class="emerald">
            <div class="container" style="padding-top:2%;">
                <div class="row">

                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-search icon-md"></i>
                            </div>
                            <div class="media-body">
                                <a href="lic-agents.php"><h3 class="media-heading">Find Your Nearest LIC Agent</h3> </a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-search icon-md"></i>
                            </div>
                            <div class="media-body">
                                <a href="lic-development-officers.php"><h3 class="media-heading">Find Your Nearest LIC Develpment Officer</h3> </a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-group icon-md"></i>
                            </div>
                            <div class="media-body">
                                <a href="online_register.php"><h3 class="media-heading">Online Registration for LIC Agent and LIC D.O. </h3> </a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                </div>
            </div>
        </section><!--/#services-->

    </body>
</html>
>>>>>>> 658accc627e015dbd10fca81f008cb49f019cb69
