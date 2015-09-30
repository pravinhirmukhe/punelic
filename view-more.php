<?php ob_start();
include('config.php');
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
                            <h3 class="media-heading">LIC Agents</h3>
                        </div>
                    </div>
                </div><!--/.col-md-4--> 
            </div>
        </div>
    </section><!--/#services-->

     
        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 

<div class="s">    <h2><b><center>LIC Agent Details</center></b></h2>
    <form action="" method="POST"><input type="submit" name="btnBack" value="Back" class="btn btn-primary btn-large pull-right"/></form>
    <!--
    <form action="message.php" method="POST"><input type="submit" name="btnEmail" value="Email" class="btn btn-primary btn-large pull-right"/></form>
    -->
    <br>
    <br>
    <h4><table class='table' border="1px" align="center">

  <?php
  
   $id3=$_GET['id'];
  $_SESSION['id5']=$id3;
      
  if(!empty($_GET['id']))
    {
   //   $id3=$_GET['id'];
      //echo $id3;
  //    $_SESSION['id5']=$id3;
      
   //   $_SESSION["no"] =$id3;
      
  //    $id9=$_SESSION['id5'];
  //    echo $id9;
        $query=mysql_query("select  * from Agent_tbl where id='".$_GET['id']."'");
   while($query2=mysql_fetch_array($query))
{?>

         
<tr><td>Name</td><td><?php echo $query2['Name'];?></td></tr>
<tr><td>Agent Code</td><td><?php echo $query2['AgentCode'];?></td></tr>
<tr><td>Club Membership</td><td><?php echo $query2['ClubMember'];?></td></tr>
<tr><td>Branch</td><td><?php echo $query2['Branch'];?></td></tr>
<tr><td>Division</td><td><?php echo $query2['Division'];?></td></tr>


<tr><td>Contact</td><td><?php echo $query2['Contact'];?></td></tr>


<tr><td>Email</td><td><?php echo $query2['Email'];?></td></tr>
<tr><td>Area</td><td><?php echo $query2['Area'];?></td></tr>
<tr><td>Office Address</td><td><?php echo $query2['OfficeAddr'];?></td></tr>
<tr><td>Residence Address</td><td><?php echo $query2['ResAddr'];?></td></tr>
<tr><td>Agency Since</td><td><?php echo $query2['AgencySince'];?></td></tr>
<tr><td>Other Business</td><td><?php echo $query2['Description'];?></td></tr>

<?php }}?>
 
  </table></h4>
  </div>
                </div> 

                <?php include 'sidebar.php'; ?>

            </div><!--/.row-->
        </div>
     

    <?php include 'footer.php'; ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php if(isset($_REQUEST['btnBack']))
{
    header("Location:lic-agents.php");
}?>