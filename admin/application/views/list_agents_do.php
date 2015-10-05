<div class="right_col" role="main" ng-controller="prof_list">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agent and Development Officer<small>Total Professional</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >

                        <span class="">Per Page :
                            <!-- ng-model="per" ng-init="per = 30" ng-change="perpage(per)" -->
                            <select ng-model="per" ng-init="per = 30" ng-change="perpage(per)">
                                <option value="30">30</option>
                                <option value="60">60</option>
                                <option value="120">120</option>
                                <option value="240">240</option>
                            </select>
                        </span>
                        <!-- ng-model="search" -->
                        <span class="pull-right">Search :<input type="text" ng-model="search"/></span>
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings" >
                                    <th >ID</th>
                                    <th  ng-click="order('type')"style="cursor: pointer">Type </th>
                                    <th ng-click="order('fname')" style="cursor: pointer">Name</th>
                                    <th ng-click="order('agent_code')" style="cursor: pointer">Agent Code</th>
                                    <th ng-click="order('email')" style="cursor: pointer">Email </th>
                                    <th  ng-click="order('status')" style="cursor: pointer">Status </th>
                                    <th class="no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <!-- ng-model="proflist" -->
                            <tbody >
                                <tr class="even pointer" ng-repeat="p in filtered = proflist| filter:search|orderBy:predicate:reverse | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">
                                    <td class=" " >{{$index + ((currentPage - 1) * entryLimit) + 1}}</td>
                                    <td class=" ">{{p.type}}</td>
                                    <td class=" ">{{p.fname + " " + p.lname}}</td>
                                    <td class=" ">{{p.agent_code}}</td>
                                    <td class=" a-right a-right">{{p.email}}</td>
                                    <td ><label title="Change Status" alt="Change Status" ng-class="p.status == 'Active'?'label label-success':'label label-danger'" style="cursor: pointer" ng-click="statusupdate($index, p.id)">{{p.status}}</label></td>
                                    <td class=" last">
                                        <a href="#" ><i class="fa fa-eye fa-2x "></i></a>
                                        <a href="#" ><i class="fa fa-pencil-square-o fa-2x "></i></a>
                                        <a href="#" ><i class="fa fa-trash-o fa-2x "></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- ng-model="currentPage" -->
                        <pagination ng-model="currentPage" total-items="totalItems"  max-size="noOfPages" class="pagination-sm pull-right" boundary-links="true" items-per-page="entryLimit"></pagination>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

