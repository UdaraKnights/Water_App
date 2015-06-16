d<?php
require_once './include/MainConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap">
            <?php require_once './include/navBar.php'; ?>

            <div class="container">               
                <div class="row">          
                    <?php require_once './include/sideBar.php'; ?>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="page-header">
                                <h3>Employee Details<small> Customer Data</small></h3>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="nic" class="col-lg-4 control-label">Customer Id : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="cus_id" name="cus_id" placeholder="Customer Id" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nic" class="col-lg-4 control-label">NIC : </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericFieldNIC numericFieldAdvNIC" id="nic" name="nic" placeholder="NIC" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname" class="col-lg-4 control-label">Name :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control charactorField" id="name" name="name" placeholder="Name ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="initials" class="col-lg-4 control-label">Address :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="address" name="address" placeholder="Address">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="first_appoint_date" class="col-lg-4 control-label">Owner Name :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="owner_name" name="owner_name" placeholder="Owner Name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="eb_passed_date" class="col-lg-4 control-label">TAX Number :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="tax_no" name="tax_no" placeholder="TAX Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="w_opn_number" class="col-lg-4 control-label">Register Date :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="reg_date" name="reg_date" placeholder="Register Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="agrahara_no" class="col-lg-4 control-label">Sub Road :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="sub_road" name="sub_road" placeholder="Sub Road">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pension_date" class="col-lg-4 control-label">Nature :</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="nature" name="nature" placeholder="Nature">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="aborobtion_date" class="col-lg-4 control-label">Security Deposit</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="security_deposit" name="security_deposit" placeholder="Security Deposit">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_of_absorbtion" class="col-lg-4 control-label">Estimate Amount</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control " id="estimate_amount" name="estimate_amount" placeholder="Estimate Amount">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <span id="userSaveBtn">
                                                        <button class="btn btn-success" id="saveToDB"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                                                        <button class="btn btn-warning" id="UpdateDB"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                    </span>
                                                    <span id="userActionBtn" class="hidden">
                                                        <button class="btn btn-warning" id="UpdateDB"><i class="fa fa-edit fa-lg"></i>&nbsp;Update</button>
                                                        <button class="btn btn-danger" id="empDelete"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button>
                                                        <button class="btn btn-primary" id="empClear"><i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;Clear</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="icon-bar-chart"></i>User Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="scrollable" style="height: 400px; overflow-y: auto">
                                                    <table class="table table-bordered table-striped table-hover" id="emp_table">
                                                        <thead>
                                                            <tr>                                                                
                                                                <th>User Id</th>
                                                                <th>NIC</th>
                                                                <th>Surname</th>
                                                                <th>Initials</th>                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                             
                                                        </tbody>
                                                    </table>
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
        </div>
    </div>                    
</div>
</div>
</div>
<?php require_once './include/footerBar.php'; ?>
<?php require_once './include/systemFooter.php'; ?>
</body>
<script type="text/javascript">

    $(function() {
        //////////////// COMMEN EVENT DO NOT REMOVE //////////////
        $('#logout').click(function() {
            logout();
        });
        $('select').chosen({width: "100%"});
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $(window).load(function() {
            categoryComboBox();
            EmpTable();
            validateFileds();
            
            
            //gradeComboBox($('#cat_name').val());
        });

        $('.provinceComboBox').change(function() {
            electorateComboBox($(this).val());
            districtComboBox($(this).val());
        });

        $('.categoryComboBox').change(function() {
            gradeComboBox($(this).val());
        });

        $('#saveToDB').click(function(){             
            CustomerData($('#cus_id').val(), $('#nic').val(), $('#name').val(), $('#address').val(), $('#owner_name').val(), $('#tax_no').val(), $('#reg_date').val(), $('#sub_road').val(), $('#nature').val(), $('#security_deposit').val(), $('#estimate_amount').val(),'save');
            clearFields();
        });
        $('#UpdateDB').click(function(){ //alert('Not yet implemented !!');
            EmpData($('#empId').val(), $('#nic_no').val(), $('#surname').val(), $('#initials').val(), $('#first_appoint_date').val(), $('#confirmation_date').val(), $('#eb_passed_date').val(), $('#w_opn_number').val(), $('#agrahara_no').val(), $('#pension_date').val(), $('#aborobtion_date').val(), $('#no_of_absorbtion').val(), $('#no_mc_registration').val(), $('#current_grade_id').val(),'update');
            clearFields();
        });   
    });
    
    $( "#confirmation_date" ).validate({
        rules: {
            field: {
                required: true,
                date: true
            }
        }
    });
    
    
    
    function loadToFields(index, id,grade_id,category_id){
        clearFields();
        var refTab = document.getElementById("emp_table");
        var row = refTab.rows[index+1];
        document.getElementById("cus_id").value = id;		
        document.getElementById("nic").value = row.cells[1].firstChild.nodeValue;
        document.getElementById("name").value = row.cells[2].firstChild.nodeValue;
        document.getElementById("address").value = row.cells[3].firstChild.nodeValue;
        document.getElementById("owner_name").value = row.cells[4].firstChild.nodeValue;
        document.getElementById("tax_no").value = row.cells[5].firstChild.nodeValue;
        document.getElementById("reg_date").value = row.cells[6].firstChild.nodeValue;
        document.getElementById("sub_road").value = row.cells[7].firstChild.nodeValue;
        document.getElementById("nature").value = row.cells[8].firstChild.nodeValue;
        document.getElementById("security_deposit").value = row.cells[9].firstChild.nodeValue;
        document.getElementById("estimate_amount").value = row.cells[10].firstChild.nodeValue;        
//        $('#cat_name').val(category_id);
//        $('#cat_name').trigger("chosen:updated");
//        $('#cat_name').trigger("change");
        setTimeout("reloadGrade("+grade_id+")",500);

    }


    function deleteRecord(id){
        alertify.confirm("Are you sure you want to Delete this Record? this cannot be undone !" +id, function(e) {
            if (e) {
                CustomerData(id, $('#nic_no').val(), $('#surname').val(), $('#initials').val(), $('#first_appoint_date').val(), $('#confirmation_date').val(), $('#eb_passed_date').val(), $('#w_opn_number').val(), $('#agrahara_no').val(), $('#pension_date').val(), $('#aborobtion_date').val(), $('#no_of_absorbtion').val(), $('#no_mc_registration').val(), $('#current_grade_id').val(),'delete');
                $('#cus_id').val('');                    
            } else {
                alertify.alert("Cancelled !!");
            }
        });        
    }
    
    function clearFields(){
        $('#cus_id').val('');
        $('#nic').val('');
        $('#name').val('');
        $('#address').val('');
        $('#owner_name').val('');
        $('#tax_no').val('');
        $('#reg_date').val('');
        $('#sub_road').val('');
        $('#nature').val('');
        $('#security_deposit').val('');
        $('#estimate_amount').val('');       
    }
</script>
</html>

