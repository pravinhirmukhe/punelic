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
                            <h3 class="media-heading">Update Agent Details<a href="Admin.php"><span class="glyphicon glyphicon-circle-arrow-left pull-right"></span></a></h3>
                        </div>
                    </div>
                </div><!--/.col-md-4--> 
            </div>
        </div>
    </section><!--/#services-->

     
        <div class="container" style="padding-top:3%;">
            <div class="row">

                <div class="col-md-9 sidebar"> 
<?php
include 'config.php';
$idd=$_GET['id']; 
if(!empty($_GET['id']))
    {
      
   
        $query=mysql_query("select  * from Agent_tbl where id='".$_GET['id']."'");
   while($query2=mysql_fetch_array($query))
{
    
    
   
?>
<form action="" method="POST" enctype="multipart/form-data">

<table align="center" cellpadding="5px"><tr><td>Name: </td><td><input type="text"  class="form-control" name="txtName" value="<?php echo $query2['Name'];  ?>"></td></tr>

<tr><td>Agent Code :</td><td><input type="text"  class="form-control" name="txtAgentCode" value="<?php echo $query2['AgentCode']  ?>"></td></tr>
<tr><td>Club Membership :</td><td><input type="text"  class="form-control" name="txtClubMember" value="<?php echo $query2['ClubMember']  ?>"></td></tr>
<tr><td>Branch </td><td><input type="text"  class="form-control" name="txtBranch" value="<?php echo $query2['Branch']  ?>"></td></tr>
<tr><td>Division : </td><td><input type="text" class="form-control" name="txtDivision" value="<?php echo $query2['Division']  ?>"></td></tr>

<tr><td>Contact Number: </td><td><input type="text"  class="form-control" name="txtContact" maxlength="10" value="<?php echo $query2['Contact']  ?>"></td></tr>
<tr><td>Email : </td><td><input type="text"  class="form-control" name="txtEmail" value="<?php echo $query2['Email']  ?>"></td></tr>
<tr><td><b>Area :<b></td><td><input type="text"  class="form-control" name="txtArea" value="<?php echo $query2['Area']  ?>"></b></td></tr>
<tr><td>Agency Since :<b></td><td><input type="text"  class="form-control" name="txtAgencySince" value="<?php echo $query2['AgencySince']  ?>"></td></tr>
<tr><td>Office Address :<b></td><td><input type="text"  class="form-control" name="txtOfficeAddr" value="<?php echo $query2['OfficeAddr']  ?>"></td></tr>
<tr><td>Resdience Address :<b></td><td><input type="text"  class="form-control" name="txtRessAddr" value="<?php echo $query2['ResAddr']  ?>"></td></tr>
<tr><td>Description :<b></td><td><input type="text"  class="form-control" name="txtDescription" value="<?php echo $query2['Description']  ?>"></td></tr>



<tr><td><br><br> <input type="submit" name="Registration" value="Submit" class="btn btn-success"/></td>
<td> <br><br><input type="submit" name="Cancel" value="Back" class="btn btn-warning"/> </td></tr>

</table>
</div>
</form>
<?php
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

<?php
session_start();


function validate()
{
    if($_POST['txtName']!="" && $_POST['txtContact']!="")
    {
        return true;

    }
    else {
        return false;
    }
}
if(isset($_REQUEST['Registration']))
{
if(validate())
{
include 'config.php';

$ac=$_POST['txtAgentCode'];
        $nm=$_POST['txtName'];
        
         $cm=$_POST['txtClubMember'];
          $br=$_POST['txtBranch'];
           $di=$_POST['txtDivision'];
            $cnt=$_POST['txtContact'];
             $em=$_POST['txtEmail'];
              $ar=$_POST['txtArea'];
        $as=$_POST['txtAgencySince'];
        $oa=$_POST['txtOfficeAddr'];
        $ra=$_POST['txtRessAddr'];
        $de=$_POST['txtDescription'];
/*    
$target_path="";
    if(!empty($_FILES))
    {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES['image']['name']);
$extension = end($temp);
if ((($_FILES['image']['type'] == "image/gif")
|| ($_FILES['image']['type'] == "image/jpeg")
|| ($_FILES['image']['type'] == "image/jpg")
|| ($_FILES['image']['type'] == "image/pjpeg")
|| ($_FILES['image']['type'] == "image/x-png")
|| ($_FILES['image']['type'] == "image/png"))
&& ($_FILES['image']['size'] < 20000)
&& in_array($extension, $allowedExts)) {
      move_uploaded_file($_FILES['image']['tmp_name'],
      "UploadImg/" . $_FILES['image']['name']);
      $target_path="UploadImg/" . $_FILES['image']['name'];
    }
    else
    {
      echo "<script type='text/javascript'> confirm('Select valid Image')</script>";
    }

  }
  else
{
  $target_path="UploadImg/DefaultImg.jpg";
}
*/
//$sql="insert into Agent_tbl (AgentCode,Name,ClubMember,Branch,Division,Contact,Email,Area,AgencySince,OfficeAddr,ResAddr,Description,Image,Date) values('$ac','$nm','$cm','$br','$di','$cnt','$em','$ar','$as','$oa','$ra','$de','$de','".date("Y-m-d")."')";

$sql="update agent_tbl set AgentCode='$ac', Name='$nm', ClubMember='$cm', Branch='$br', Division='$di', Contact='$cnt', Email='$em', Area='$ar', AgencySince='$as', OfficeAddr='$oa', ResAddr='$ra', Description='$de', Date='".date("Y-m-d")."' where Id=$idd";
$q=mysql_query($sql) or die(mysql_error());
    if($q)
        {
      echo "<script type='text/javascript'> confirm('update Successfully')</script>";
    //header("location:Admin.php");
      print "<script>";
            print " self.location='Admin.php';";
            print "</script>";

        }
        else
        {
        echo "<script type='text/javascript'> alert(' Your updation not done')</script>";
        
        }
}
}

if(isset($_REQUEST['Cancel']))
{
    header("location:Admin.php");

}
    }
?>