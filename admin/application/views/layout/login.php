<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PuneLIC ADMIN</title>

        <!-- Bootstrap core CSS -->
        <link rel="shortcut icon" href="<?php echo SITEURL; ?>assets/user/favicon.png" type="image/x-icon">
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
        <script src="<?php echo SITEURL; ?>assets/admin/js/angular.min.js"></script>
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
        <style type="text/css">
            .userValidate{
                position: absolute;
                top: 57px;
                right: 0px;
                width: 125px;
                z-index: 100;
            }
            .passValidate{
                position: absolute;
                top: 122px;
                right: 0px;
                width: 125px;
                z-index: 100;
            }
        </style>
    </head>

    <body style="background:#F7F7F7;" ng-app="administrator">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper" ng-controller="adminlogin">
                <div id="login" class="animate form">
                    <section class="login_content">

                        <form class="form-horizontal" ng-submit="login(user)" name="userForm" novalidate>
                            <h1>Administrator Login</h1>
                            <!-- USERNAME -->
                            <div class="form-group " ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.username.$pristine }">
                                <input type="text" name="username" placeholder="Username" class="form-control" ng-model="user.username" required=""/>
                                <p class="userValidate" ng-if="userForm.username.$error.required" class="help-block">Username is required.</p>
                            </div>
                            <div class="form-group" ng-class="{ 'has-error' : userForm.pass.$invalid && !userForm.pass.$pristine }">
                                <input type="password" name="pass" placeholder="Password" class="form-control" ng-model="user.pass" required=""/>
                                <p class="passValidate" ng-if="userForm.pass.$error.required" class="help-block">Password is Required.</p>
                            </div>
                            <div style="padding-top: 10px">
                                <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Submit</button>
                                <a class="" href="#" data-toggle="modal" data-target="#lost_pass">Lost your password?</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
<!--                                <p class="change_link">New to site?
                                    <a href="#toregister" class="to_register"> Create Account </a>
                                </p>-->
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><img src="<?= BASEURL ?>assets/admin/logo.png" alt="..." style="height: 30px;width: 32px;margin-top: 0px;margin-left:0px" class="img-circle profile_img"> PUNELIC</h1>
                                    <p>©2015 All Rights Reserved. PUNELIC. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="lost_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Lost Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2" ng-controller="lostpassadmin">
                                <form role="form" ng-submit="save()">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="email" ng-model="email" ng-blur="checkmail()" id="email" class="form-control input-lg" placeholder="Email Address">
                                            <span ng-if="status == '2'" class="label label-danger">{{error}}</span>
                                            <span ng-if="status == '1'" class="label label-success">{{error}}</span>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-12">
                                                <input type="submit" class="btn btn-md btn-success btn-block" value="Submit">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </body>

</html>