<div class="right_col" role="main" >
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add User<small>(Admin)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >
                        <!-- <div ng-class="status==1?'alert alert-success':'alert alert-danger'" ng-if="status">{{msg}}</div> -->
                        <br />
                        <form id="addadminuser" class="form-horizontal form-label-left"  >
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Name :</label>
                                <div class="col-sm-6">
                                    <input type="text" pattern="[a-zA-Z]+" class="form-control" placeholder="Name" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Email :</label>
                                <div class="col-sm-6">
                                    <input type="email" id="email" class="form-control"  placeholder="Username" required="required">
                                    <!-- <span ng-if="status1 == '1'" class="label label-danger">{{error1}}</span> -->
                                    <!-- <span ng-if="status1 == '2'" class="label label-success">{{error1}}</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password :</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Repassword :</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control"  placeholder="Password"  required="required">
                                    <!-- <label ng-if="adminUser.pass" ng-class="adminUser.pass!=adminUser.repass?'label label-danger':'label label - success'">{{adminUser.pass!=adminUser.repass?'Password Didnt match.':'Password Match'}}</label> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Mobile Number :</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="10" min="10" max="10"   class="form-control"  required="required" placeholder="MOBILE NO." title="Enter only Mobile No.">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <span class="pull-right">
                                        <input type="reset" class="btn btn-danger" value="Clear"/>
                                        <input type="submit" class="btn btn-primary" value="Submit"/>
                                    </span>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->
</div>