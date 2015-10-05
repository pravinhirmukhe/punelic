
<?php include 'header.php'; ?>
<script type="text/javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<link href="admin/assets/admin/css/fileinput.min.css" rel="stylesheet">
<div class="container" style="padding-top:2%;" ng-app="punelic">
    <div class="row" ng-controller="registration">
        <div class="col-md-12" style=" font-size:14px;"> 
            <h3 align="center">Welcome to PuneLicAgents.com</h3>
            <h2>Registration Form<small> for Agent and Development Officer</small></h2>
            <hr>
            <?php
            if (isset($_SESSION['resmsg']) && !empty($_SESSION['resmsg'])) {
                if (!$_SESSION['resmsg']['e']) {
                    ?>
                    <div class="alert alert-success"><?= $_SESSION['resmsg']['msg'] ?> </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger"><?= $_SESSION['resmsg']['msg'] ?> </div>
                    <?php
                }
            }
            ?>
            <form action="application/register.php" method="post" enctype="multipart/form-data">
                <div class="list-group" style="box-shadow: 0 2px 4px 3px #e3e3e3;">
                    <div class="list-group-item">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <!-- <td>
                                            ID: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Id" class="form-control" required="required" placeholder="ID">
                                        </td>
                                        <td>
                                            Form No: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Formno" class="form-control" required="required" placeholder="Form No">
                                        </td>
                                        <td>
                                            Date of Registration: <span style="color:red;">*</span>
                                            <input type="date" name="txt_DateofRegistration" class="form-control" required="required" placeholder="Date of Registration">
                                        </td> -->
                                        <td>I am: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_Type" required>
                                                <option value="-1">-- Select --</option>
                                                <option value="Agent">LIC Agent</option>
                                                <option value="DO">Development Officer</option> 
                                            </select>
                                        </td>
                                        <td>
                                            Agent Code: <span style="color:red;">*</span>
                                            <input type="text" name="txt_AgentCode" class="form-control" required="required" placeholder="Agent Code">
                                        </td><td></td>
                                        <td align="center" >Upload Photo</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            First Name: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Fname" class="form-control" required="required" placeholder="First Name">
                                        </td>
                                        <td>
                                            Middle Name: 
                                            <input type="text" name="txt_Mname" class="form-control" placeholder="Middle Name">
                                        </td>
                                        <td>
                                            Last Name: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Lname" class="form-control" required="required" placeholder="Last Name">
                                        </td>
                                        <td rowspan="4" width="200">
                                            <input type="file" class=" file form-control" accept="image/*" name="img_file" required="required"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email: <span style="color:red;">*</span>
                                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="txt_Email" placeholder="Email" class="form-control" required="required">
                                        </td>
                                        <td>
                                            Club Membership:
                                            <input type="text" name="txt_ClubMembership" class="form-control" placeholder="Club Membership">
                                        </td>
                                        <td>
                                            Branch: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Branch" class="form-control" required="required" placeholder="Branch">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Division: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Division" class="form-control" required="required" placeholder="Division">
                                        </td>
                                        <td>
                                            Contact No: <span style="color:red;">*</span>
                                            <input type="text" name="txt_ContactNo" class="form-control" placeholder="Contact No" data-validate-length-range="10,10" required="required" onkeypress="return isNumberKey(event)">
                                        </td>
                                        <td>
                                            Pin Code: <span style="color:red;">*</span>
                                            <input type="text" name="txt_Pincode" class="form-control" placeholder="Pin Code" data-validate-length-range="6,6" required="required" onkeypress="return isNumberKey(event)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            States: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_State" required ng-model="txt_state" ng-change="getCity(txt_state)">
                                                <option value="-1" >-- Select --</option>
                                                <option value="{{s.city_state}}" ng-repeat="s in states">{{s.city_state}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            City: <span style="color:red;">*</span>
                                            <select class="form-control" name="txt_City" required>
                                                <option value="-1" >-- Select --</option>
                                                <option value="{{s.city_name}}" ng-repeat="s in city">{{s.city_name}}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Office Address: <span style="color:red;">*</span>
                                            <textarea class="form-control" name="txt_OfficeAddress" placeholder="Office Address" required="required"></textarea>
                                        </td>
                                        <td colspan="2">
                                            Residence Address: <span style="color:red;">*</span>
                                            <textarea class="form-control" name="txt_ResiAddress" placeholder="Residence Address" required="required"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Agency Since: <span style="color:red;">*</span>
                                            <input type="text" name="txt_AgencySince" class="form-control" placeholder="Agency Since" required="required">
                                        </td>
                                        <td>
                                            Other Business: <span style="color:red;">*</span>
                                            <input type="text" name="txt_OtherBusiness" class="form-control" placeholder="Other Business" required="required">
                                        </td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Area: <span style="color:red;">*</span>
                                            <div class="col-md-12" ng-repeat="e in area">
                                                <i  ng-click="area.splice($index, 1)" class="glyphicon glyphicon-minus-sign pull-right" ng-if="$index < area.length - 1" style="cursor:pointer;z-index: 100;position: absolute;top: 9px;right: 24px"></i>
                                                <i ng-click="area.push({})" class="glyphicon glyphicon-plus-sign pull-right"ng-if="$index == area.length - 1"  style="cursor:pointer;z-index: 100;position: absolute;top: 9px;right: 24px"></i>
                                                <input type="text" name="txt_Area[]" ng-model="e.area" class="form-control" placeholder="Area" required="required">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                            <input type="reset" value="Clear" class="btn btn-primary">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
        <p class="gap"></p>
    </div>
</div>

<script type="text/javascript" src="js/angular.min.js"></script>

<script type="text/javascript" src="js/angular.control.js"></script>
<script type="text/javascript" src="admin/assets/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="admin/assets/admin/js/fileinput.min.js"></script>
<script>
                                                    $(".file").fileinput({
                                                        allowedFileExtensions: ['jpg', 'png', 'gif'],
                                                        maxFileSize: 200
                                                    });
</script>
<?php
session_destroy();
include 'footer.php';
?>
