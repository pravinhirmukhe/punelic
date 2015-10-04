<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LACACO ADMIN</title>

        <!-- Bootstrap core CSS -->

        <link href="<?= BASEURL ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?= BASEURL ?>assets/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= BASEURL ?>assets/admin/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?= BASEURL ?>assets/admin/css/custom.css" rel="stylesheet">
        <link href="<?= BASEURL ?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">


        <script src="<?= BASEURL ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= BASEURL ?>assets/admin/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var site_url = '<?= SITEURL ?>';
        </script>
        <script src="<?php echo SITEURL; ?>assets/user/js/angular.min.js"></script>
        <script src="<?php echo SITEURL; ?>assets/admin/js/ngFileUpload/ng-file-upload-shim.js"></script>
        <script src="<?php echo SITEURL; ?>assets/admin/js/ngFileUpload/ng-file-upload.js"></script>
        <script src="<?php echo SITEURL; ?>assets/admin/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
        <script src="<?php echo SITEURL; ?>assets/admin/js/angular.control.js"></script>
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body style="background:#F7F7F7;" ng-app="administrator">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper" ng-controller="adminlostpasschange">
                <div id="login" class="animate form">
                    <span ng-if="status3 == '2'" class="alert alert-danger col-lg-12">{{error3}}</span>
                    <span ng-if="status3 == '1'" class="alert alert-success col-lg-12">{{error3}}</span>
                    <section class="login_content">
                        <form class="form-horizontal" ng-submit="changepass()">
                            <h1>Lost Password</h1>

                            <div ng-init="id =<?= $rs->id ?>">
                                <input type="text" ng-blur="checkmail()" class="form-control" placeholder="Username" required="" ng-model="username" />
                                <span ng-if="status == '2'" class="label label-danger">{{error}}</span>
                                <span ng-if="status == '1'" class="label label-success">{{error}}</span>
                            </div>

                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" ng-model="newpass" ng-change="matchpass()"/>
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Re-Password" required="" ng-model="repass" ng-change="matchpass()"/>
                                <span ng-if="status1 == '2'" class="label label-danger">{{error1}}</span>
                                <span ng-if="status1 == '1'" class="label label-success">{{error1}}</span>
                            </div>

                            <div style="padding-top: 10px">
                                <button class="btn btn-default" href="index.html" type="submit">Change Password</button>

                            </div>

                            <div class="clearfix"></div>
                            <div class="separator">
<!--                                <p class="change_link">New to site?
                                    <a href="#toregister" class="to_register"> Create Account </a>
                                </p>-->
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><img src="<?= BASEURL ?>assets/admin/favicon.png" alt="..." style="height: 30px;width: 32px;margin-top: 0px;margin-left:0px" class="img-circle profile_img"> LACACO</h1>
                                    <p>©2015 All Rights Reserved. LACACO. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>
    </body>

</html>