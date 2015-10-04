<?php
ob_start();
include('config.php');
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
<?php
if (isset($_REQUEST['btnBack'])) {
    header("Location:lic-agents.php");
}?>