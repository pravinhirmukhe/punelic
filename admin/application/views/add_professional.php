<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


</script>

<!-- page content -->
<div class="right_col" role="main" >
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Registration Form<small> for Agent and Development Officer</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >
                        <br />
                        <div id="msgshow" ng-class="status==1?'alert alert-success':'alert alert - danger'" ng-if="status"></div>
                        <div class="row">
                            <div class="col-md-12" style=" font-size:14px;"> 
                                <form action="">
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
                                                                <select class="form-control" name="txt_Type" required><option value="-1">-- Select --</option><option>LIC Agent</option><option>Development Officer</option> </select>
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
                                                                <input type="file" class=" file form-control" accept="image/*" name="file" required="required"/>
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
                                                                <input type="text" name="txt_Branch" class="form-control" placeholder="Contact No" data-validate-length-range="10,10" required="required" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                Pin Code: <span style="color:red;">*</span>
                                                                <input type="text" name="txt_Pincode" class="form-control" placeholder="Pin Code" data-validate-length-range="6,6" required="required" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                City: <span style="color:red;">*</span>
                                                                <select class="form-control" name="txt_City" required><option value="-1">-- Select --</option></select>
                                                            </td>
                                                            <td>
                                                                State: <span style="color:red;">*</span>
                                                                <select class="form-control" name="txt_State" required><option value="-1">-- Select --</option></select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                Office Address: <span style="color:red;">*</span>
                                                                <textarea class="form-control" name="txt_OfficeAddress" placeholder="Office Address" required="required"></textarea>
                                                            </td>
                                                            <td colspan="2">
                                                                Residence Address: <span style="color:red;">*</span>
                                                                <textarea class="form-control" name="txt_OfficeAddress" placeholder="Residence Address" required="required"></textarea>
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
                                                                <i class="glyphicon glyphicon-minus-sign pull-right" style="cursor:pointer;"></i>
                                                                <i class="glyphicon glyphicon-plus-sign pull-right" style="cursor:pointer;"></i>
                                                                <input type="text" name="txt_Area" class="form-control" placeholder="Area" required="required">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->
</div>
