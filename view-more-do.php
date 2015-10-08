<?php
ob_start();
include('config.php');

if($_GET['id'] != "")
{
	$agent_data = mysql_query("SELECT * from Agent_tbl Where id = ".$_GET['id']." AND type = 'DO'") or die("Query failed: " . mysql_error());
}
?>

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
                        <?php if(isset($agent_data )) {
						while ($row_agt = mysql_fetch_array($agent_data)): ?>
						
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
                                                    <span class=""><h4><?php echo $row_agt['fname']." ".$row_agt['mname']." ".$row_agt['lname']; ?></h4></span>
                                                </li>
                                            </ul>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <ul>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-certificate"></i><b>Agent Code:</b> <?php echo $row_agt['agent_code']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-inr"></i><b>Club Membership :</b> <?php echo $row_agt['club_membership']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-map-marker"></i><b>Branch :</b> <?php echo $row_agt['branch']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-map-marker"></i><b>Division :</b> <?php echo $row_agt['division']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-map-marker"></i><b>Contact :</b> <?php echo $row_agt['contact_no']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <ul>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Email :</b> <?php echo $row_agt['email']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Area :</b> <?php echo $row_agt['area']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Agency Since :</b> <?php echo $row_agt['agency_since']; ?></span>
                                                    </li>
                                                    <li class="" style="padding-bottom: 5px;list-style: none;">
                                                        <span class=""><i class="fa fa-thumbs-up fa-2x"></i><b>Other Business :</b> <?php echo $row_agt['oth_busi']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <hr>
                                        <!-- <div class="row"> -->                                        
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><b>Office Address:</b> </td>
                                                        <td><?php echo $row_agt['office_add']; ?></td>
                                                        <td><b>Residence Address:</b> </td>
                                                        <td><?php echo $row_agt['resi_add']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endwhile; }?>
                    <?php include 'sidebar-do.php'; ?>
                </div>
            </div>
        </div>

    </div><!--/.row-->

</div>
<?php include 'footer.php'; ?>
<?php
if (isset($_REQUEST['btnBack'])) {
    header("Location:lic-agents.php");
}?>