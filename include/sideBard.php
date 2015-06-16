<?php
if ($_SESSION['user_level'] == 5) {
    echo '<div class="col-md-2" role="navigation">
    <div class="list-group"> 
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapse1">Master Data&nbsp;<i class="fa fa-chevron-circle-down"></i></div>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse out">
                    <div class="list-group">
                        <a class="divider"></a>
                        <a href="moh_masters.php" class="list-group-item">MOH Masters</a>
                        <a href="institute_masters.php" class="list-group-item">Institute Masters</a>
                        <a href="designation_masters.php" class="list-group-item">Designation Masters</a>
                        <a href="category_masters.php" class="list-group-item">Category Masters</a>
                        <a href="grade_masters.php" class="list-group-item">Grade Masters</a>
                        <a href="transferset_masters.php" class="list-group-item">Transfersets Masters</a>
                    </div>
                </div>
            </div>        
        </div>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapse2">Employee Data&nbsp;<i class="fa fa-chevron-circle-down"></i></div>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse out">
                    <div class="list-group">
                        <a href="employee_guardian.php" class="list-group-item">Employee Guardian</a>
                        <a href="employee_children.php" class="list-group-item">Employee Children</a>
                        <a href="employee_education.php" class="list-group-item">Employee Education</a>
                        <a href="employee_training.php" class="list-group-item">Employee Training</a>
                        <a href="employee_service.php" class="list-group-item">Employee Service</a>
                        <a href="employee_promotion.php" class="list-group-item">Employee Promotion</a>
                        <a href="employee_service_history.php" class="list-group-item">Employee Service History</a>
                        <a href="tabs.php" class="list-group-item"><b>Employee Tabs</b></a>
                    </div>
                </div>
            </div>        
        </div>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapse3">Data Viewer&nbsp;<i class="fa fa-chevron-circle-down"></i></div>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse out">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Employee Guardian</a>
                        <a href="#" class="list-group-item">Employee Children</a>
                        <a href="#" class="list-group-item">Employee Education</a>
                        <a href="#" class="list-group-item">Employee Training</a>
                        <a href="#" class="list-group-item">Employee Service</a>
                        <a href="#" class="list-group-item">Employee Promotion</a>
                        <a href="#" class="list-group-item">Employee Service History</a>
                    </div>
                </div>
            </div>        
        </div>

    </div>
</div> ';
} else {
    echo '<div class="col-md-2" role="navigation">
    <div class="list-group">         
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapse3">Data Viewer&nbsp;<i class="fa fa-chevron-circle-down"></i></div>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse out">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Employee Guardian</a>
                        <a href="#" class="list-group-item">Employee Children</a>
                        <a href="#" class="list-group-item">Employee Education</a>
                        <a href="#" class="list-group-item">Employee Training</a>
                        <a href="#" class="list-group-item">Employee Service</a>
                        <a href="#" class="list-group-item">Employee Promotion</a>
                        <a href="#" class="list-group-item">Employee Service History</a>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>';
}
?>     