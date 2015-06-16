<?php
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
                        <div class="page-header">
                            <h3>Assign Customers <small> Assign Customers to Meter Readers</small></h3>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="hidden" id="province"></div>
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Main Road :</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control mainRoadCombobox" name="mainRoad" id="mainRoadCombobox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="civilStatId" class="col-lg-4 control-label">Sub Road :</label>
                                                <div class="col-lg-5">
                                                    <select class="form-control subRoadCombobox" name="subRoad" id="subRoadCombobox"></select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Meter Reader :</label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control meterReaderCombobox" name="meterReader" id="meterReaderCombobox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                        <select multiple="multiple" id="my-select" name="my-select[]"></select>
                                            </div>
                                                <div class="">
                                                    <span id="">
                                                        <button class="btn btn-success" id="saveToDB"><i class="fa fa-edit fa-lg"></i>&nbsp;Save</button>
                                                    </span>
                                                    <span id="">
                                                            <button class="btn btn-warning" id="clear"><i class="fa fa-edit fa-lg"></i>&nbsp;Clear</button>
                                                    </span>
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
        $('#my-select').multiSelect();
        $('#clear').on('click', function(){
            $('#cat_name').val(0);
            $('#designation_id').val(0);
            $('#my-select').multiSelect('deselect_all');
        });


        $('#saveToDB').click(function() {

            if(validate()){
                var brands = $('#my-select option:selected');
                var selected = [];
                $(brands).each(function(index, brand){
                    selected.push([$(this).val()]);
                });
                AssginEmployee(selected, $('#meterReaderCombobox').val(), $('#subRoadCombobox').val(), 'save');

                $('#my-select').multiSelect('deselect_all');
//                alert($('#user_name').val());
                $('#user_name').trigger("chosen:updated");
                $('#user_name').trigger("change");
            }
        });
        
        $('.mainRoadCombobox').change(function() {
            //designationComboBox($(this).val());
            subRoadSelectBox($(this).val());
        });
        
        $('.subRoadCombobox').change(function() {
            //designationComboBox($(this).val());
            loadCustomersMultiSelectBox($(this).val());
        });
       

        $(window).load(function() {
            mainRoadSelectBox();
            //subRoadSelectBox();
            meterReaderSelectBox();
            
        });
        
        $('#logout').click(function() {
            logout();
        });

    });

    function validate(){
        var flag = true;

        if($('#mainRoadCombobox').val()==null || $('#cat_name').val()==""|| $('#cat_name').val()<1){
            flag = false;
            //alert('Please select Category.');
            alertify.alert('Please select Main Road.');
        }else if($('#subRoadCombobox').val()==null || $('#designation_id').val()==""|| $('#designation_id').val()<1){
            flag = false;
            //alert('Please select Designation.');
            alertify.alert('Please select Sub Road.');
        }else if($('#my-select option:selected').length <1){
            flag = false;
            //alert();
            alertify.alert('Please select Customers.');
        }
        return flag;
    }

    function loadToFields(userId,desi_id,cat_id){
//        alert(desi_id)
        $('#cat_name').val(cat_id);
        $('#cat_name').trigger("chosen:updated");
        $('#cat_name').trigger("change");
        setTimeout("reloadDesignation("+desi_id+","+userId+")",500);

    }

    function reloadDesignation(desi_id, userId){
        $('#designation_id').val(desi_id);
        $('#designation_id').trigger("chosen:updated");
        loadEmployeeMultiSelectBox(desi_id,pushSelectedMultiBox);
    }

    function pushSelectedMultiBox(){

        var user_id = $('#user_name').val();
        selectEmployeeMultiSelectBox(user_id);
    }

</script>
</html>

