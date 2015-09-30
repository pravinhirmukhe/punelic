<!DOCTYPE html>
<?php ob_start();
//session_start();
           include('config.php');

    $query_parent = mysql_query("SELECT DISTINCT Area from Agent_tbl order by Area") or die("Query failed: ".mysql_error());
 
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Lic Agent</title>
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
                            <h3 class="media-heading">LIC Agents</h3>
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
                   
    <h4><b>Select Area</b></h4>
    
    <div class="col-md-3">
    <select class="form-control" name="parent_cat" id="parent_cat"><option>------Select Area-------</option>
    <?php include 'config.php'; while($row = mysql_fetch_array($query_parent)): ?>
    <option ><?php echo $row['Area']; ?></option>
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
    $q=mysql_query("select * from Agent_tbl where Area='".$_POST['parent_cat']."' order by rand()");
    while($r = mysql_fetch_array($q))
    {
           echo"<tr><td><b>".$r['Name']."</b></td><td>".$r['Email']."</td><td>".$r['Branch']."</td><td><a href='view-more.php?id=".$r['Id']."'><b>View More...</b></a></td></tr>";
    }
    echo"</table></div>";
    }//if?>

    </div> 

    </div> 

</form>


                <div class="col-md-3">

             <a target="_blank" href="http://licvijaythorat.in/" ><img src="list/vt-1.PNG" align="right" width="72%"></a><br><br>
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