
<div class="col-md-2" role="navigation">
    <div class="list-group"> 
        <div class="panel-group" id="accordion">
        <?php
        $user_level = "";
        $user_name = "";

        if (isset($_COOKIE['user_id'])) {
            $user_level = $_COOKIE['user_level'];
            $user_name = $_COOKIE['user_name'];
        } else {
            $user_level = $_SESSION['user_level'];
            $user_name = $_SESSION['user_name'];
        }
            //echo 'user_level '.$user_level;
            if($user_level==1){
                //echo 'admin '. $user_level;
                ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <div data-toggle="collapse" data-parent="#accordion" href="#collapse1">Master Data&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                        </h4>
                      </div>
                          <div id="collapse1" class="panel-collapse collapse">
                              <div class="list-group">
                                <a class="divider"></a>
                                <a href="customers.php" class="list-group-item">Customer Masters</a>
                                <a href="institute_masters.php" class="list-group-item">Institute Masters</a>
                                <a href="designation_masters.php" class="list-group-item">Designation Masters</a>
                                <a href="category_masters.php" class="list-group-item">Category Masters</a>
                                <a href="grade_masters.php" class="list-group-item">Grade Masters</a>
                                <a href="transferset_masters.php" class="list-group-item">Transfersets Masters</a>
                            </div>
                          </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <div data-toggle="collapse" data-parent="#accordion" href="#collapse2">Employee Data&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                        </h4>
                      </div>
                          <div id="collapse2" class="panel-collapse collapse">
                              <div class="list-group">
                                <a href="employee.php" class="list-group-item">Employee Details</a>                       
                                <a href="appointment.php" class="list-group-item">Appoinment Details</a>
                                <a href="assignEmployee.php" class="list-group-item">Assign Employees</a>
                            </div>
                          </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <div data-toggle="collapse" data-parent="#accordion" href="#collapse3">Data Viewer&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                        </h4>
                      </div>
                          <div id="collapse3" class="panel-collapse collapse">
                              <div class="list-group">
                               <a href="emp_viewer.php" class="list-group-item">Employee Details</a>                       
                              </div>
                          </div>
                    </div>
                <?php
            }else if ($user_level==2){
                ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <div data-toggle="collapse" data-parent="#accordion" href="#collapse2">Employee Data&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="list-group">
                                <a href="employee.php" class="list-group-item">Employee Details</a>
                                <a href="appointment.php" class="list-group-item">Appoinment Details</a>
                                <a href="assignEmployee.php" class="list-group-item">Assign Employees</a>
                            </div>
                        </div>
                    </div>
                   <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <div data-toggle="collapse" data-parent="#accordion" href="#collapse3">Data Viewer&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                        </h4>
                      </div>
                          <div id="collapse3" class="panel-collapse collapse">
                              <div class="list-group">
                                <a href="emp_viewer.php" class="list-group-item">Employee Details</a>                       
                              </div>
                          </div>
                    </div> 
                <?php
            }else{
                ?>
                   <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <div data-toggle="collapse" data-parent="#accordion" href="#collapse3">Data Viewer&nbsp;<i class="indicator fa fa-chevron-circle-down pull-right"></i></div>
                        </h4>
                      </div>
                          <div id="collapse3" class="panel-collapse collapse">
                              <div class="list-group">
                                <a href="emp_viewer.php" class="list-group-item">Employee Details</a>
                              </div>
                          </div>
                    </div>
                <?php
            }
        ?>           
          </div>        
    </div>
</div> 
<script> 
    
    
    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-chevron-circle-down fa-chevron-circle-up');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron); 
</script>