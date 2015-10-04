<<<<<<< HEAD
<?php ob_start();
//session_start();
include('config.php');
$query_parent = mysql_query("SELECT DISTINCT Branch from Officer_tbl order by Branch") or die("Query failed: ".mysql_error()); 
?>
<?php include 'header.php'; ?>

<section id="services" class="emerald">
<div class="container" style="padding-top:1%;">
    <div class="row">
        <div class="col-md-9 col-sm-6">
            <div class="media"> 
                <div class="media-body">
                    <h3 class="media-heading">LIC Development Officers</h3>
                </div>
            </div>
        </div><!--/.col-md-4--> 
    </div>
</div>
</section><!--/#services-->

<div class="container" style="padding-top:3%;">
<div class="row">
<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
    <div class="col-md-9 sidebar">                    
        <div class="row">
            <div class="col-md-3">
                <h4><b>Select Branch</b></h4> 
            </div>
        </div> 
        <div class="row">
        <div class="col-md-3">
            <select class="form-control" name="parent_cat" id="parent_cat"><option>------Select Branch-------</option>
                <?php include 'config.php'; while($row = mysql_fetch_array($query_parent)): ?>
                <option ><?php echo $row['Branch']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="submit" name="btnSubmit" value="Search" class="btn btn-primary btn-large pull-center"/>
        </div>
        </div><br>
        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="list-group" style="box-shadow: 0 2px 4px 3px #e3e3e3;">
                        <div class="wow fadeInDown" data-wow-delay="5.10s">
                            <div class="list-group-item"> 
                                <div class="row">
                                    <div class="img-thumbnail col-md-2 col-xs-10">
                                        <img class="img-responsive" src="images/logo.png" height="130px" width="130px" style="padding-bottom:10px;"/>
                                    </div>
                                    <ul class="list-group col-md-5 col-sm-5 col-xs-10 listingdata">                                    
                                        <li class="list-group-item" style="padding-bottom: 5px;border:0px;">
                                            <span class="" ><h3 style="color:#0f7799"><a href="#" style="cursor: pointer">Agent Name 1</a></h3></span>
                                        </li>
                                    </ul>

                                    <ul class="list-group col-md-5 col-sm-5 col-xs-10 listingdata">
                                        <li class="list-group-item" style="padding-bottom: 5px;">
                                            <div class="row">
                                                <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Email : xyz@example.com
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="padding-bottom: 5px;">
                                            <div class="row">
                                                <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Branch : Laxmi Road
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="padding-bottom: 5px;">
                                            <div class="row">
                                                <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Division : Pune Division 1
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <span class="col-md-8">
                                                    <a href="#"><button class="btn btn-primary btn-xs">View Details</button></a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> 
                </div> 
    </div>
<div class="col-md-3">
    <img src="list/a1.PNG" align="right" width="72%" ><br><br>
    <img src="list/a1.PNG" align="right" width="72%" ><br><br>
    <img src="list/a1.PNG" align="right" width="72%" >             
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
=======
<!DOCTYPE html>
<?php ob_start();
//session_start();
           include('config.php');

    $query_parent = mysql_query("SELECT DISTINCT Branch from Officer_tbl order by Branch") or die("Query failed: ".mysql_error());
 
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Development Officer</title>
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
    </script>
  
</head><!--/head-->
<body>
    
    <?php include 'header.php'; ?>

     <section id="services" class="emerald">
        <div class="container" style="padding-top:1%;">
            <div class="row">
                <div class="col-md-9 col-sm-6">
                    <div class="media"> 
                        <div class="media-body">
                            <h3 class="media-heading">LIC Development Officers</h3>
                        </div>
                    </div>
                </div><!--/.col-md-4--> 
            </div>
        </div>
    </section><!--/#services-->

<div class="container" style="padding-top:3%;">
<div class="row">

<form action="" method="POST">
     
<div class="col-md-9 sidebar"> 
                   
                <h4><b>Select Branch</b></h4>
<div class="col-md-3">
    <select class="form-control" name="parent_cat" id="parent_cat"><option>------Select Branch-------</option>
    <?php include 'config.php'; while($row = mysql_fetch_array($query_parent)): ?>
    <option ><?php echo $row['Branch']; ?></option>
    <?php endwhile; ?>
    </select>

</div>
<div class="col-md-3">

     <input type="submit" name="btnSubmit" value="Search" class="btn btn-primary btn-large pull-center"/>
     <br><br>
    
   
</div>

<br><br><br><br> 

    <div>
    <?php if(isset($_POST['btnSubmit']))
    {
    echo"<div><table class='table' border='1px' width='auto'><tr><td><b><center>Name</center></b></td><td width='auto'><b><center>Email</center></b></td><td width='auto'><b><center>Branch</center></b></td><td width='auto'><b><center>View Detail</center></b></td></tr>";
    $q=mysql_query("select * from Officer_tbl where Branch='".$_POST['parent_cat']."'order by rand()");
    while($r = mysql_fetch_array($q))
    {
           echo"<tr><td><b>".$r['Name']."</b></td><td>".$r['Email']."</td><td>".$r['Branch']."</td><td><a href='view-more-do.php?id=".$r['Id']."'><b>View More...</b></a></td></tr>";
    }
    echo"</table></div>";
    }//if?>

    </div> 

    </div> 

</form>
 

             
                <div class="col-md-3">

             <img src="list/a1.PNG" align="right" width="72%" ><br><br>
              <img src="list/a1.PNG" align="right" width="72%" ><br><br>
               <img src="list/a1.PNG" align="right" width="72%" >
             
             </div>

            </div><!--/.row-->
        </div>
     



    <?php include 'footer.php'; ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
>>>>>>> 658accc627e015dbd10fca81f008cb49f019cb69
