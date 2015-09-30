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
                            <h3 class="media-heading">Add New D.O. Registration<a href="Admin.php"><span class="glyphicon glyphicon-circle-arrow-left pull-right"></span></a></h3>
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
$idd1=$_GET['id']; 
if(!empty($_GET['id']))
    {
      
   
        $query3=mysql_query("select  * from Officer_tbl where Id='".$_GET['id']."'");
   while($query4=mysql_fetch_array($query3))
{
    
    
   
?>
                 
<form action="" method="POST" enctype="multipart/form-data">

<table align="center" cellpadding="5px"><tr><td>Name: </td><td><input type="text" value="<?php echo $query4['Name'];  ?>" class="form-control" name="txtName" PlaceHolder="Enter Name"></td></tr>

<tr><td>D.O. Code :</td><td><input type="text" value="<?php echo $query4['DoCode'];  ?>" class="form-control" name="txtAgentCode" placeholder="Enter Agent Code"></td></tr>
<tr><td>Club Membership :</td><td><input type="text" value="<?php echo $query4['ClubMember'];  ?>" class="form-control" name="txtClubMember"placeholder="Enter Clubmembership Number"></td></tr>
<tr><td><b>Branch </b></td><td><input type="text" value="<?php echo $query4['Branch'];  ?>" class="form-control" name="txtBranch"placeholder="Enter year Branch"></td></tr>
<tr><td>Division : </td><td><input type="text" value="<?php echo $query4['Division'];  ?>" class="form-control" name="txtDivision"placeholder="Enter Division"></td></tr>

<tr><td>Contact Number: </td><td><input type="text" value="<?php echo $query4['Contact'];  ?>" class="form-control" name="txtContact"placeholder="Enter Contact Number"></td></tr>
<tr><td>Email : </td><td><input type="text" value="<?php echo $query4['Email'];  ?>" class="form-control" name="txtEmail" placeholder="Enter Email"></td></tr>
<tr><td>Area :</td><td><input type="text" value="<?php echo $query4['Area'];  ?>" class="form-control" name="txtArea" placeholder="Enter Area"></b></td></tr>
<tr><td>Agency Since :<b></td><td><input type="text" value="<?php echo $query4['AgencySince'];  ?>" class="form-control" name="txtAgencySince" placeholder="Enter Agency Year"></td></tr>
<tr><td>Office Address :<b></td><td><input type="text" value="<?php echo $query4['OfficeAddr'];  ?>" class="form-control" name="txtOfficeAddr" placeholder="Enter Office Address"></td></tr>
<tr><td>Resdience Address :<b></td><td><input type="text" value="<?php echo $query4['ResAddr'];  ?>" class="form-control" name="txtRessAddr" placeholder="Enter Resdience Address"></td></tr>
<tr><td>Description :<b></td><td><input type="text" value="<?php echo $query4['Description'];  ?>" class="form-control" name="txtDescription" placeholder="Enter Other Business"></td></tr>



<tr><td><br><br> <input type="submit" name="Update" value="Update" class="btn btn-success"/></td>
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
if(isset($_REQUEST['Update']))
{
if(validate())
{
include 'config.php';
$id2=$_GET['id'];
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
//$sql="insert into Officer_tbl (DoCode,Name,ClubMember,Branch,Division,Contact,Email,Area,AgencySince,OfficeAddr,ResAddr,Description,Image,Date) values('$ac','$nm','$cm','$br','$di','$cnt','$em','$ar','$as','$oa','$ra','$de','$de','".date("Y-m-d")."')";
$sql="Update officer_tbl  set DoCode='$ac',Name='$nm',ClubMember='$cm',Branch='$br',Division='$di',Contact='$cnt',Email='$em',Area='$ar',AgencySince='$as',OfficeAddr='$oa',ResAddr='$ra',Description='$de',Date='".date("Y-m-d")."' where Id='$id2'";

echo "$sql";
$q=mysql_query($sql) or die(mysql_error());
    if($query)
        {
      echo "<script type='text/javascript'> confirm('Update Successfuly done')</script>";
    //header("location:Admin.php");
      print "<script>";
            print " self.location='Admin.php';";
            print "</script>";

        }
        else
        {
        echo "<script type='text/javascript'> alert(' Your Updation not done')</script>";   
        print "<script>";
            print " self.location='Admin.php';";
            print "</script>";
        
        }
}
}

if(isset($_REQUEST['Cancel']))
{
    header("location:Admin.php");

}
    }
?>