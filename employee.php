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
                                <h3>Employee Details<small> Employee Data</small></h3>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                
                                                <div class="col-lg-6">
                                                    <input type="hidden" class="form-control" id="empId" name="empId" placeholder="Employee ID">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Category :</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control categoryComboBox" name="cat_name" id="cat_name"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nic" class="col-lg-4 control-label">NIC</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericFieldNIC numericFieldAdvNIC" id="nic_no" name="nic_no" placeholder="NIC" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname" class="col-lg-4 control-label">Surname:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control charactorField" id="surname" name="surname" placeholder="Enter Surname">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="initials" class="col-lg-4 control-label">Name of Initials:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control charactorField" id="initials" name="initials" placeholder="Enter Initials">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="first_appoint_date" class="col-lg-4 control-label">First Appointment Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="first_appoint_date" name="first_appoint_date" placeholder="Enter First Appoint Date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="eb_passed_date" class="col-lg-4 control-label">EB Passed Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="eb_passed_date" name="eb_passed_date" placeholder="Enter EB Passed Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="w_opn_number" class="col-lg-4 control-label">W & OP Number:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericField numericFieldAdv" id="w_opn_number" name="w_opn_number" placeholder="Enter W OPN Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="agrahara_no" class="col-lg-4 control-label">Agrahara Number:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericField numericFieldAdv" id="agrahara_no" name="agrahara_no" placeholder="Enter Agrahara Number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pension_date" class="col-lg-4 control-label">Pension Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="pension_date" name="pension_date" placeholder="Enter Pension Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="aborobtion_date" class="col-lg-4 control-label">Absorption Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="aborobtion_date" name="aborobtion_date" placeholder="Enter Abortion Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_of_absorbtion" class="col-lg-4 control-label">Absorption Number:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericField numericFieldAdv" id="no_of_absorbtion" name="no_of_absorbtion" placeholder="Enter Number of Abortion">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_mc_registration" class="col-lg-4 control-label">MC Registration:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control numericField numericFieldAdv" id="no_mc_registration" name="no_mc_registration" placeholder="Enter MC Registration">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="childCnt" class="col-lg-4 control-label">Current Grade  :</label>
                                                <div class="col-lg-6">
                                                    <select  class="form-control gradeComboBox" name="current_grade_id" id="current_grade_id"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirmation_date" class="col-lg-4 control-label">Confirmation Date:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control datepicker" id="confirmation_date" name="confirmation_date" placeholder="Enter Confirmation Date">
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
            EmpData($('#empId').val(), $('#nic_no').val(), $('#surname').val(), $('#initials').val(), $('#first_appoint_date').val(), $('#confirmation_date').val(), $('#eb_passed_date').val(), $('#w_opn_number').val(), $('#agrahara_no').val(), $('#pension_date').val(), $('#aborobtion_date').val(), $('#no_of_absorbtion').val(), $('#no_mc_registration').val(), $('#current_grade_id').val(),'save');
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
		document.getElementById("empId").value = id;		
        document.getElementById("nic_no").value = row.cells[1].firstChild.nodeValue;
        document.getElementById("surname").value = row.cells[2].firstChild.nodeValue;
        document.getElementById("initials").value = row.cells[3].firstChild.nodeValue;
        document.getElementById("first_appoint_date").value = row.cells[4].firstChild.nodeValue;
        document.getElementById("confirmation_date").value = row.cells[5].firstChild.nodeValue;
        document.getElementById("eb_passed_date").value = row.cells[6].firstChild.nodeValue;
        document.getElementById("w_opn_number").value = row.cells[7].firstChild.nodeValue;
        document.getElementById("agrahara_no").value = row.cells[8].firstChild.nodeValue;
        document.getElementById("pension_date").value = row.cells[9].firstChild.nodeValue;
        document.getElementById("aborobtion_date").value = row.cells[10].firstChild.nodeValue;
        document.getElementById("no_of_absorbtion").value = row.cells[11].firstChild.nodeValue;
        document.getElementById("no_mc_registration").value = row.cells[12].firstChild.nodeValue;
        document.getElementById("current_grade_id").value = row.cells[13].firstChild.nodeValue;
        $('#cat_name').val(category_id);
        $('#cat_name').trigger("chosen:updated");
        $('#cat_name').trigger("change");
        setTimeout("reloadGrade("+grade_id+")",500);

    }

    function reloadGrade(grade_id){
        $('#current_grade_id').val(grade_id);
        $('#current_grade_id').trigger("chosen:updated");
    }

    function deleteRecord(id){
        alertify.confirm("Are you sure you want to Delete this Record? this cannot be undone !" +id, function(e) {
            if (e) {
                EmpData(id, $('#nic_no').val(), $('#surname').val(), $('#initials').val(), $('#first_appoint_date').val(), $('#confirmation_date').val(), $('#eb_passed_date').val(), $('#w_opn_number').val(), $('#agrahara_no').val(), $('#pension_date').val(), $('#aborobtion_date').val(), $('#no_of_absorbtion').val(), $('#no_mc_registration').val(), $('#current_grade_id').val(),'delete');
                $('#empId').val('');                    
            } else {
                alertify.alert("Cancelled !!");
            }
        });        
    }
    
    function clearFields(){
        $('#empId').val('');
        $('#nic_no').val('');
        $('#surname').val('');
        $('#initials').val('');
        $('#first_appoint_date').val('');
        $('#confirmation_date').val('');
        $('#eb_passed_date').val('');
        $('#w_opn_number').val('');
        $('#agrahara_no').val('');
        $('#pension_date').val('');
        $('#aborobtion_date').val('');
        $('#no_of_absorbtion').val('');
        $('#no_mc_registration').val('');
        $('#current_grade_id').val('');
    }
</script>
</html>

