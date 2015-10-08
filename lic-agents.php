
<?php
ob_start();
//session_start();
include('./config.php');
$query_parent = mysql_query("SELECT DISTINCT (area),prof_id from area order by area") or die("Query failed: " . mysql_error());

if(isset($_GET['area'] ))
{
	$agent_data = mysql_query("SELECT * from Agent_tbl Where id = ".$_GET['area']." AND type = 'Agent'") or die("Query failed: " . mysql_error());
}

?>
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
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-9 sidebar">
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Select Area</b></h4> 
                            </div>
                        </div> 
						
							<form action="lic-agents.php?area=<?php echo $row['prof_id']; ?>" class="comment-form comment-form-contact" method="get">
							   <div class="row">
									<div class="col-md-3">
									<select class="form-control" name="area" id="parent_cat">
												<option>------Select Area-------</option>
										<?php while ($row = mysql_fetch_array($query_parent)): ?>
											<option value="<?php echo $row['prof_id']; ?>"><?php echo $row['area']; ?></option>
										<?php endwhile; ?>
									</select>
									</div>
									<div class="col-md-3">
										<input type="submit" name="btnSubmit" value="Search" class="btn btn-primary btn-large pull-center"/>
									</div>                    
								</div>
							</form>	
							
                        <br>
						
						<?php if(isset($agent_data )) {
						while ($row_agt = mysql_fetch_array($agent_data)): ?>
						
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="list-group" style="box-shadow: 0 2px 4px 3px #e3e3e3;">
                                    <div class="wow fadeInDown" data-wow-delay="5.10s">
                                        <div class="list-group-item"> 
                                            <div class="row">
                                                <div class="img-thumbnail col-md-2 col-xs-10">
                                                    <img class="img-responsive" src="images/logo.png" height="130px" width="130px" style="padding-bottom:10px;"/>
                                                </div>
                                                <ul class="list-group col-md-5 col-xs-10 listingdata">                                    
                                                    <li class="list-group-item" style="padding-bottom: 5px;border:0px;">
                                                        <span class="" ><h3 style="color:#0f7799"><a href="#" style="cursor: pointer"><?php echo $row_agt['fname']." ".$row_agt['mname']." ".$row_agt['lname']; ?></a></h3></span>
                                                    </li>
                                                </ul>

                                                <ul class="list-group col-md-5 col-xs-10 listingdata">
                                                    <li class="list-group-item" style="padding-bottom: 5px;">
                                                        <div class="row">
                                                            <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Email : <?php echo $row_agt['email']; ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item" style="padding-bottom: 5px;">
                                                        <div class="row">
                                                            <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Branch : <?php echo $row_agt['branch']; ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item" style="padding-bottom: 5px;">
                                                        <div class="row">
                                                            <span class="col-md-12 col-xs-12"><i class="fa fa-clock-o"></i>Division : <?php echo $row_agt['division']; ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <span class="col-md-8">
                                                                <a href="view-more.php?id=<?php echo $row_agt['id']; ?>"><button class="btn btn-primary btn-xs">View Details</button></a>
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
						<?php endwhile; }?>
                    </div> 
                    <div class="col-md-3">
                        <a target="_blank" href="http://licvijaythorat.in/" ><img src="list/vt-1.PNG" align="right" width="72%"></a><br><br>
                        <img src="list/a1.PNG" align="right" width="72%" ><br><br>
                        <img src="list/a1.PNG" align="right" width="72%" >
                    </div>
                </div>
            </div>
        </div>


    </div><!--/.row-->
</div>
<?php include 'footer.php'; ?>
