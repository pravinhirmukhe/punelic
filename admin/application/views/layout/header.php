<!--top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php if ($this->session->userdata('profuserid') != "" && $this->session->userdata('adminusername') == "") { ?>
                        <a href="<?= SITEURL ?>prof/prof_logout">
                            Log Out <span class=" glyphicon glyphicon-off"></span>
                        </a>
                    <?php } else { ?>
                        <a href="<?= SITEURL ?>admin/logout">
                            Log Out <span class=" glyphicon glyphicon-off"></span>
                        </a>
                    <?php } ?>
                </li>
                <li class="">
                <!-- <img src="<?= BASEURL ?>assets/admin/upload/<?= $this->session->userdata('profuserimg') ?>" alt=""> -->
                    <?php if ($this->session->userdata('profuserid') != "" && $this->session->userdata('adminusername') == "") { ?>
                        <a href="<?= SITEURL ?>prof/prof_logout" class="user-profile" aria-expanded="false">
                            <?php if ($this->session->userdata('profuserid') != "") { ?>
                                <?= $this->session->userdata('profuser') ?>
                            <?php } else { ?>
                                <img src="<?= BASEURL ?>assets/admin/images/user.png" alt=""><?= ucfirst($this->session->userdata('adminname')) ?>
                            <?php } ?>
                        </a>
                    <?php } else { ?>
                        <a href="<?= SITEURL ?>admin/changepass" class="user-profile" aria-expanded="false">
                            <?php if ($this->session->userdata('profuserid') != "") { ?>
                                <img src="<?= BASEURL ?>assets/admin/upload/<?= $this->session->userdata('profuserimg') ?>" alt=""><?= $this->session->userdata('profuser') ?>
                            <?php } else { ?>
                                <img src="<?= BASEURL ?>assets/admin/images/user.png" alt=""><?= ucfirst($this->session->userdata('adminname')) ?>
                            <?php } ?>
                        </a>
                    <?php } ?>
                </li>

                <?php if ($this->session->userdata('profuserid') != "") { ?>
                    <li role="presentation" class="dropdown" ng-controller="bookingnotification">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" ng-click="">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-green blink_text" ng-if="booknoti.length">{{booknoti.length}}</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                            <li ng-repeat="b in booknoti| limitTo:5">
                                <a>
                                    <span>
                                        <span>{{b.personname}}</span>
                                        <span class="time">{{b.timeslot}}<br>{{b.book_date}}</span>
                                    </span>
                                    <span class="message">
                                        {{b.contact_no}}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="text-center">
                                    <a>
                                        <strong><a href="<?= SITEURL; ?>prof/Notifications">See All Bookings</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation-->