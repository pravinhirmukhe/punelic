<div class="right_col" role="main" ng-controller="exe_date_report">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Executive Reports <small> </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" ng-init='exRep =<?= json_encode($search) ?>'>
                        <?php if (!isset($error) && $error != "") { ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php } ?>
                        <form id="addcity" class="form-horizontal form-label" action="<?= SITEURL ?>admin/getExeData" method="post" ng-submit="save(exRep)">

                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-xs-12 form-group">
                                            <div><h5>DATE RANGE</h5></div>
                                            <div class="input-prepend input-group">
                                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                <input type="text" class="form-control date-range" name="dt_from"  ng-model="exRep.dt_from"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                            <div><h5>EXECUTIVE NAME</h5></div>
                                            <div class=" form-group item">
                                                <select class="form-control" name='exe_name' ng-model="exRep.exe_name">
                                                    <option value="">ALL</option>
                                                    <option value="{{e.id}}" ng-repeat="e in exe_user">{{e.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-3 col-xs-12 form-group"></div>
                                        <div class="col-md-4 col-sm-3 col-xs-12 form-group">
                                            <input type="Submit" class="form-control btn btn-primary" id="inputSuccess2" value="GENERATE REPORT"></div>    
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php if (isset($contents) && $contents != "") { ?>
                        <div class="col-md-12 col-sm-12 col-xs-12" ng-init='set_content(<?= json_encode($contents) ?>)'>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Report</h2>
                                    <span class="pull-right"><a href="#" ng-click="downloadexel(exRep)" class="btn btn-success "><i class="fa fa-download"></i>&nbsp;Download Excel</a></span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <span class="">Per Page :
                                        <select ng-model="per" ng-init="per = 30" ng-change="perpage(per)">
                                            <option value="30">30</option>
                                            <option value="60">60</option>
                                            <option value="120">120</option>
                                            <option value="240">240</option>
                                        </select>
                                    </span>
                                    <span class="pull-right">Search :<input type="text" ng-model="search"/></span>
                                    <table id="categoryList" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
    <!--                                                <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th>-->
                                                <th>Sr.no</th>
                                                <th>Form No</th>
                                                <th>Executive Name</th>
                                                <th>Client Name</th>
                                                <th>Create Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="even pointer" ng-repeat="obj in  filtered = exe_date_report1| filter:search | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">
    <!--                                                <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td> -->
                                                <td class=" ">{{$index + ((currentPage - 1) * entryLimit) + 1}}</td>
                                                <td class=" ">{{obj.Form_No}}</td>
                                                <td class=" ">{{obj.Executive_Name}}</td>
                                                <td class=" ">{{obj.Professional_Name}}</td>
                                                <td class=" ">{{obj.Create_Date}}</td>
                                                <td class=" ">{{obj.status}}</td>
                                            </tr>
                                            <tr ng-if="!exe_date_report1.length">
                                                <td colspan="5" class="alert alert-danger">Record not found.</td>
                                            </tr>

                                                                                                                                                                        <!--	<tr class="even pointer" ng-repeat="obj in  filtered = exe_date_report1 | filter:search | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">
                                                                                                                                                                        <td class="a-center ">

                                                                                                                                                                        </td>
                                            <?php $total = count(obj . formno); ?>
                                                                                                                                                                                
                                                                                                                                                                        <td class=" "></td>
                                                                                                                                                                        <td class="" style="float: right;">Total Count :</td>
                                                                                                                                                                        <td class=" "><?php echo $total; ?></td>
                                                                                                                                                                        </tr>-->
                                        </tbody>
                                    </table>
                                    <pagination total-items="totalItems" ng-model="currentPage" max-size="noOfPages" class="pagination-sm pull-right" boundary-links="true" items-per-page="entryLimit"></pagination>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
</div>