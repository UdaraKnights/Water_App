<?php
require_once './include/MainConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
        
        <link rel="stylesheet" href="css/common.css" type="text/css" />
        <link type="text/css" rel="stylesheet" href="css/themes/smoothness/jquery-ui-1.7.1.custom.css" />
        <link type="text/css" href="css/ui.multiselect.css" rel="stylesheet" />
        
        
        
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
                            <h3>Assign Employee <small> Assign Employees to Users</small></h3>
                        </div>                       
                                <div class="col-md-6">
                                    <div class="hidden" id="province"></div>
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Main Road </label>
                                                <div class="col-lg-5">
                                                    <select  class="form-control mainRoadCombobox" name="cat_name" id="mainRoadCombobox"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="civilStatId" class="col-lg-4 control-label">Sub Road </label>
                                                <div class="col-lg-5">
                                                    <select class="form-control subRoadCombobox" name="designation_id" id="subRoadCombobox"></select>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <label class="col-lg-4 control-label">Meter Reader </label>
                                                    <div class="col-lg-5">
                                                        <select  class="form-control meterReaderCombobox" name="user_name" id="meterReaderCombobox"></select>
                                                    </div>
                                                </div>
                                                
                                                <span id="">
                                                        <button class="btn btn-success" id="saveToDB"><i class="fa fa-edit fa-lg"></i>&nbsp;Save</button>
                                                </span>
                                                <span id="">
                                                    <button class="btn btn-warning" id="clear"><i class="fa fa-edit fa-lg"></i>&nbsp;Clear</button>
                                                </span>
                                            </div>
                                        </div>                                
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="form.php" target="submitFrame" style="border: none;">
                                        <dl>
                                            <dd>
                                                <select id="countries" class="multiselect" multiple="multiple" name="countries[]">
                                                    <!--option value="SVK">Slovakia</option>
                                                    <option value="SVN">Slovenia</option>
                                                    <option value="ZAF">South Africa</option>
                                                    <option value="KOR">South Korea</option>
                                                    <option value="ESP">Spain</option>
                                                    <option value="LKA" selected="selected">Sri Lanka</option>
                                                    <option value="SWE">Sweden</option>
                                                    <option value="CHE">Switzerland</option>
                                                    <option value="SYR">Syria</option>

                                                    <option value="TWN">Taiwan</option>
                                                    <option value="TJK">Tajikistan</option>
                                                    <option value="THA">Thailand</option>
                                                    <option value="TUR">Turkey</option>
                                                    <option value="TKM">Turkmenistan</option>
                                                    <option value="UKR">Ukraine</option>
                                                    <option value="ARE">United Arab Emirates</option>
                                                    <option value="GBR">United Kingdom</option>
                                                    <option value="USA" selected="selected">United States</option>

                                                    <option value="UZB">Uzbekistan</option>
                                                    <option value="VAT">Vatican City</option>
                                                    <option value="VNM">Vietnam</option-->
                                                </select>
                                            </dd>
                                            
                                        </dl>
                                </form>                  
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

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
        <script type="text/javascript" src="js/plugins/localisation/jquery.localisation-min.js"></script>
        <script type="text/javascript" src="js/plugins/tmpl/jquery.tmpl.1.1.1.js"></script>
        <script type="text/javascript" src="js/plugins/blockUI/jquery.blockUI.js"></script>
        <script type="text/javascript" src="js/ui.multiselect.js"></script>


<script type="text/javascript">
		$(function(){
            //loading data to comboboxes
            mainRoadSelectBox();
            subRoadSelectBox();
            meterReaderSelectBox();
            //loadMultiselect($('#subRoadCombobox').val());
            
            $('.subRoadCombobox').change(function() { 
            if(!$('.mainRoadCombobox').val()==null || !$('.mainRoadCombobox').val()==""){
               //alert("it's not null"); 
                //$('#countries').multiSelect('deselect_all');
                $('.multiselect').multiselect( 'destroy' );
                loadMultiselect($('#subRoadCombobox').val());
                $('.multiselect').multiselect( '_refreshDividerLocation' );
            }            
            //designationComboBox($(this).val());
            });
            
			
		
        //////////////// COMMEN EVENT DO NOT REMOVE //////////////
        $('#logout').click(function() {
            logout();
        });
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
                AssginEmployee(selected, $('#user_name').val(), 'save');

                $('#my-select').multiSelect('deselect_all');
//                alert($('#user_name').val());
                $('#user_name').trigger("chosen:updated");
                $('#user_name').trigger("change");
            }
        });
            
        $.localise('ui.multiselect', {/*language: 'es',/* */ path: 'js/locale/'});

			// local
			$("#ddd").multiselect();
			// remote
			

			// only if the function is available...
			if ($.fn.themeswitcher) {
				$('#switcher')
					.before('<h4>Use the themeroller to dynamically change look and feel</h4>')
					.themeswitcher();
        }      
    });

    
    
    function validate(){
        var flag = true;

        if($('#cat_name').val()==null || $('#cat_name').val()==""|| $('#cat_name').val()<1){
            flag = false;
            alert('Please select Category.');
        }else if($('#designation_id').val()==null || $('#designation_id').val()==""|| $('#designation_id').val()<1){
            flag = false;
            alert('Please select Designation.');
        }else if($('#my-select option:selected').length <1){
            flag = false;
            alert('Please select Employees.');
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
    
    function test(){
        alert($.map( $('.multiselect').find('option[selected]'), function(item,i) { return $(item).val() }));
    }
    
    function loadMultiselect(subRoad_id){ //alert('loading data to multiselect '+mainRoad_id);
        $("#countries").multiselect({
				remoteUrl: 'com.water.app/service/dataService.php?data_request=assigncustomers&sub_road='+subRoad_id
        });
    }

</script>
</html>

