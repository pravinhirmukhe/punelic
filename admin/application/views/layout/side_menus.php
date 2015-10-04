<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= SITEURL ?>admin" class="site_title"><img src="<?= BASEURL ?>assets/admin/favicon.png" alt="..." style="height: 30px;width: 32px;margin-top: 0px;margin-left:0px" class="img-circle profile_img"> <span>LIC</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?= BASEURL ?>assets/admin/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span><font color="#FFF">Welcome</font></span>                
            </div>
        </div>
        <!-- /menu prile quick info --> 
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">        
            <div class="menu_section">                        
                <ul class="nav side-menu">
                    <li>
                        <a href="<?= SITEURL ?>admin_controller"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a ><i class="fa fa-user"></i>Admin Users<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?= SITEURL ?>admin_controller/list_Admin_User">List of Admin users</a>
                            </li>
                            <li><a href="<?= SITEURL ?>admin_controller/add_Admin_Users">Add Admin users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a ><i class="fa fa-graduation-cap"></i>Add New Agent/DO<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?= SITEURL ?>admin_controller/list_agent_do">List of Agent/DO</a>
                            </li>
                            <li><a href="<?= SITEURL ?>admin_controller/add_agent_do">Add Agent/DO</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-bar-chart"></i>Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?= SITEURL ?>admin_controller/executive_reports">Area wise Reports</a>
                            </li>
                            <li><a href="<?= SITEURL ?>admin_controller/dataEntry_reports">Branch wise Report</a>
                            </li>
                            <li><a href="<?= SITEURL ?>admin_controller/allexecformcount_reports">Total Agent / DO Report</a>
                            </li>
                            <li><a href="<?= SITEURL ?>admin_controller/alldataentryformcount_reports">Renewal Report</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer">

            <!-- <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a> -->
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= SITEURL ?>admin_controller/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Change Password" href="<?= SITEURL ?>admin_controller/changepass">
                <span class="fa fa-key" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Database Backup" href="<?= SITEURL ?>admin_controller/backup">
                <span class="fa fa-download" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>