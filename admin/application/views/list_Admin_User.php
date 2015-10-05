<div class="right_col" role="main" >
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content" >
                        <div class="page-title">
                            <div class="title_left">
                                <h3>
                                    Admin Users
                                </h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Edit User</h2>
                                        <span class="pull-right"><i class="fa fa-remove" style="cursor: pointer" ng-click="editclose()"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content" >
                                        <!-- <div ng-class="status == 1 ? 'alert alert-success' : 'alert alert-danger'" ng-if="status">{{msg}}</div> -->
                                        <br />
                                        <!-- ng-submit="update()" -->
                                        <form id="editadminuser" class="form-horizontal form-label-left"  >
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label">Name :</label>
                                                <div class="col-sm-6">
                                                    <input type="text" pattern="[a-zA-Z]+" class="form-control" placeholder="Name"  required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label">Email :</label>
                                                <div class="col-sm-6">
                                                    <input type="email" class="form-control" id="email" placeholder="Username" disabled required="required" >
                                                    <!-- <span ng-if="status1 == '2'" class="label label-danger">{{error1}}</span> -->
                                                    <!-- <span ng-if="status1 == '1'" class="label label-success">{{error1}}</span> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label" >Password :</label>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control" id="" placeholder="Password" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">Repassword :</label>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control" id="adminUser.pass" placeholder="Password" required="required">
                                                    <!-- <label ng-if="adminUser.pass" ng-class="adminUser.pass != adminUser.repass ? 'label label-danger' : 'label label - success'">{{adminUser.pass!=adminUser.repass?'Password Didnt match.':'Password Match'}}</label> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label">Mobile Number :</label>
                                                <div class="col-sm-6">
                                                    <input type="text" pattern="[0-9]{10}" maxlength="10" min="10" max="10" class="form-control"  placeholder="Mobile Number" id="mobno"  required="required">
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
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>All (Admin) users</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content" >
                                        <span class="">Per Page :
                                            <!-- ng-model="per" ng-init="per=30" ng-change="perpage(per)" -->
                                            <select >
                                                <option value="30">30</option>
                                                <option value="60">60</option>
                                                <option value="120">120</option>
                                                <option value="240">240</option>
                                            </select>
                                        </span>
                                        <!-- ng-model="search" -->
                                        <span class="pull-right">Search :<input type="text" /></span>
                                        <table id="userList" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr class="headings">
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Mobile No.</th>
                                                    <th>Username</th>
                                                    <th>Edit</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="even pointer" >

                                                    <td class=" ">1212</td>
                                                    <td class=" ">XYZ</td>
                                                    <td class=" ">1234567890</td>
                                                    <td class=" ">PQR</td>
                                                    <td >
                                                        <a href="#" ><i class="glyphicon glyphicon-edit " ></a>
                                                    </td>
                                                    <td >
                                                        <label title="Change Status" alt="Change Status" style="cursor: pointer" >Active</label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <pagination total-items="totalItems" max-size="noOfPages" class="pagination-sm pull-right" boundary-links="true" items-per-page="entryLimit"></pagination>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>