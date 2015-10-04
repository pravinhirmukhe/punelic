<?php ob_start();
include('config.php');
?>
<<<<<<< HEAD
<?php include 'header.php'; ?>
<section id="services" class="emerald">
  <div class="container" style="padding-top:1%;">
      <div class="row">
          <div class="col-md-9 col-sm-6">
              <div class="media"> 
                  <div class="media-body">
                      <h3 class="media-heading">LIC DO</h3>
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
      <div class="s">
        <h2 align="left"><b>LIC Do Details</b></h2>
        <!-- <form action="" method="POST"><input type="submit" name="btnBack" value="Back" class="btn btn-primary btn-large pull-right"/></form> -->
      </div><hr>
      <div class="row">    
        <div class="list-group" style="box-shadow: 0 2px 4px 3px #e3e3e3;">
            <div class="list-group-item">
                <div class="row" style="padding-bottom:10px;">
                    <div class="img-thumbnail col-md-3 col-sm-3 col-xs-10">
                        <img class="img-responsive" src="images/logo.png" height="130px" width="130px"/>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <ul>
                            <li class="" style="padding-bottom: 5px;list-style: none;">
                                <span class=""><h4>First Middle Last</h4></span>
                            </li>
                        </ul>
                      <div class="col-md-5 col-sm-9 col-xs-12">
                        <ul>
                              <li class="" style="padding-bottom: 5px;list-style: none;">
                                  <span class=""><i class="fa fa-certificate"></i><b>Agent Code:</b> 17495986</span>
                              </li>
                                <li class="" style="padding-bottom: 5px;list-style: none;">
                                  <span class=""><i class="fa fa-inr"></i><b>Club Membership :</b> NA</span>
                              </li>
                              <li class="" style="padding-bottom: 5px;list-style: none;">
                                  <span class=""><i class="fa fa-map-marker"></i><b>Branch :</b> Laxmi Road</span>
                              </li>
                              <li class="" style="padding-bottom: 5px;list-style: none;">
                                  <span class=""><i class="fa fa-map-marker"></i><b>Division :</b> Pune Division 2</span>
                              </li>
                              <li class="" style="padding-bottom: 5px;list-style: none;">
                                  <span class=""><i class="fa fa-map-marker"></i><b>Contact :</b> 9865878565</span>
                              </li>
                          </ul>
                      </div>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <ul>
                            <li class="" style="padding-bottom: 5px;list-style: none;">
                               <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Email :</b> xyz@example.com</span>
                            </li>
                            <li class="" style="padding-bottom: 5px;list-style: none;">
                               <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Area :</b> Ambegaon</span>
                            </li>
                            <li class="" style="padding-bottom: 5px;list-style: none;">
                               <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Agency Since :</b> 2010</span>
                            </li>
                            <li class="" style="padding-bottom: 5px;list-style: none;">
                               <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Other Business :</b> LIC Premium Point, General insurance, Mutual Fund.</span>
                            </li>
                        </ul>
                      </div>
                      
                    </div>
                    <hr>
                    <!-- <div class="row"> -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <tr>
                              <td><b>Office Address:</b> </td>
                              <td>A2/101 spring meadows,Near Amit Blow Field Nahre Road Ambegaon Pune 411046</td>
                              <td><b>Residence Address:</b> </td>
                              <td>A2/101 spring meadows,Near Amit Blow Field Nahre Road Ambegaon Pune 411046</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  <?php include 'sidebar-do.php'; ?>
      </div>
    </div>
    </div>

  </div><!--/.row-->

</div>
<?php include 'footer.php'; ?>
<?php if(isset($_REQUEST['btnBack']))
{
    header("Location:lic-agents.php");
=======
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
    
    
    <script>
    function submitVal(){
        var username = document.getElementById('username').value;
        var mobileNumber = document.getElementById('mobile_number').value;
        // var message = document.getElementById('message').value;
        //window.location = "http://103.16.101.52:8080/sendsms/bulksms?username=ams1-pitdemo&password=12345&type=0&dlr=1&destination=919096751112&source=FREEDM&message="+username+''+mobileNumber+''+message;

        // jQuery REST trial
        $.ajax({
        url: 'http://103.16.101.52:8080/sendsms/bulksms?username=pit6-imatessms&password=imatessm&type=0&dlr=1&destination=919860269054&source=imates&message=PuneLicAgents DO Enquiry %0AName: '+username+'%0AContact No.: '+mobileNumber,
        type: 'POST',
        //data: 'ID=1&Name=John&Age=10', // or $('#myform').serializeArray()
        data:username+"-"+mobileNumber,
        complete: function(){
            window.location.href="thank-you.php";
        }
        
});
        
       
    }
    /*
    function next(){
        window.location = "http://www.google.com";
    }
    */
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

                <div class="col-md-9 sidebar"> 

<div class="s">    <h2><b><center>Development Officer Details</center></b></h2>
    <form action="" method="POST"><input type="submit" name="btnBack" value="Back" class="btn btn-primary btn-large pull-right"/></form><br><br>
<h4><table class='table' border="1px" align="center">

  <?php
  if(!empty($_GET['id']))
    {
        $query=mysql_query("select  * from Officer_tbl where id='".$_GET['id']."'");
   while($query2=mysql_fetch_array($query))
{?>


<br>   
<tr><td>Name</td><td><?php echo $query2['Name'];?></td></tr>
<tr><td>D.O. Code</td><td><?php echo $query2['DoCode'];?></td></tr>
<tr><td>Club Membership</td><td><?php echo $query2['ClubMember'];?></td></tr>
<tr><td>Branch</td><td><?php echo $query2['Branch'];?></td></tr>
<tr><td>Division</td><td><?php echo $query2['Division'];?></td></tr>

<!--

<tr><td>Contact</td><td> 
<?php echo $query2['Contact'];?>   </td></tr>
-->

<!--
 <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
  Get a Call Back
</button>

-->

<!-- Modal -->
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Get Call Back..!!</h3>
      </div>
      <div class="modal-body">
     
     <div class="row"> 
     <form method="post">  
     <div class="col-md-6">
     	<div class="form-group">
    	<input class="form-control" placeholder="Enter Name" type="text" name="name" id="username"  required> 
    	</div> 
    </div>
    <div class="col-md-6">
    	<div class="form-group">
    	<input class="form-control" placeholder="Enter Contact Number" type="text" name="phone" id="mobile_number" required> 
    	</div>
    </div>
    </form>
    
    </div> 
   
     
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
         <input type="button" value="Send SMS" class="btn btn-success contact-button" onClick="submitVal()">
      </div>
    </div>
  </div>
</div>
  -->

    


<tr><td>Email</td><td><?php echo $query2['Email'];?></td></tr>
<tr><td>Area</td><td><?php echo $query2['Area'];?></td></tr>
<tr><td>Office Address</td><td><?php echo $query2['OfficeAddr'];?></td></tr>
<tr><td>Residence Address</td><td><?php echo $query2['ResAddr'];?></td></tr>
<tr><td>D.O. Since</td><td><?php echo $query2['AgencySince'];?></td></tr>
<tr><td>Other Business</td><td><?php echo $query2['Description'];?></td></tr>

<?php }}?>
 
  </table></h4>
  </div>
                </div> 

                <?php include 'sidebar-do.php'; ?>

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
    header("Location: lic-development-officers.php");
>>>>>>> 658accc627e015dbd10fca81f008cb49f019cb69
}?>