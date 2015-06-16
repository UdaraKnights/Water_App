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
                            <h1>Administrative Tasks <small>Administrate the Application and it's users</small></h1>
                        </div>
                        <ul id="settingsTab" class="nav nav-tabs">
                            <li class="active"><a href="#allUsers" data-toggle="tab">View All Users</a></li>
<!--                            <li class=""><a href="#dbBackup" data-toggle="tab">Database Backup</a></li>-->
                        </ul>
                        <div id="settingsTabContent" class="tab-content">

                            <div class="tab-pane fade in active" id="allUsers"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="well dark_turq">                                                                                      <div class="well-header">
                                                    <h5>Create New User</h5>
                                                    
                                                        <input type="button" class="btn btn-default pull-right navbar-btn" value="New User" id="newuser"/></a>

                                                    
                                                </div>
                                                <div class="well-content">
                                                    <div class="scrollable" style="height: 200px; overflow-y: auto">
                                                        <table id="allUsersControlTable" class="table table-bordered table-responsive table-hover table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>User Name</th>                                                                    
                                                                    <th>Institute</th>
                                                                    <th>Role</th>
                                                                    <th>Status</th>
                                                                    <th>Active / Deactivate</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>                                                                                                 
                                                    <div class="bs-callout bs-callout-info">
                                                        <h4>Help</h4>
                                                        <p>AC - User Activation | DC - User Deactivation</p>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!--                            <div class="tab-pane fade" id="dbBackup">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="page-header">-->
<!--                                            <div class="panel panel-danger">-->
<!--                                                <div class="panel-heading">Database Backup</div>-->
<!--                                                <div class="panel-body">-->
<!--                                                    <p>Made your system backup using following "Made Backup" Button Pressing.it will be useful to recover your system to previous backup restore point.get your backup every half of day and secure your system<br/>දෛනික දත්ත උපස්තක ගොනු කිරීම සදහා පහල යෙදවුම ක්‍රියාත්මක කරන්න. ක්‍රියාත්මක කිරීමෙන් අනතුරුව ඔබගේ ගොනු උපස්තකය අප වෙත එවීමට හෝ එහි අනුපිටපතක් ඔබගේ ආරක්‍ෂිත දත්ත තැම්පත් කරණයකට පිටපත් කර ආරක්ෂිතව තබාගන්න.හදිසි පද්ධති බිදවැටීමකදී ඔබ විසින් ලබාගන්නා ලද අවසාන දත්ත උපස්තක ගොනුව අප වෙත බාරදීමෙන් ඔබගේ පද්ධතිය යතා තත්වයට පත්කර ගැනීමට අනිවාර්ය සාධකයක් වනු ඇත</p><p>-->
<!--                                                        <button class="btn btn-lg btn-primary getBackup"><i class="glyphicon glyphicon-floppy-saved"></i> Backup</button>-->
<!--                                                    </p>-->
<!--                                                    <p><span class="backupDisplay"></span></p>-->
<!--                                                </div>                                                -->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
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

            $(window).load(function() {
                loadAllUserControlTable()
            });

            $("select").chosen({width: "50%"});

            $('#logout').click(function() {
                logout();
            });

            $('#newuser').click(function() {
                createSystemUsers();
                //instituteComboBox();
            });

            $('.getBackup').click(function() {
//                getSystemBackup('.getBackup', '.backupDisplay')
                $.post('run.php', function(data) {
                    $('.backupDisplay').html(data);
                });
            });

        });
        
        
       // $('#modal-content').bind('shown.bs.modal', function () {
            //instituteComboBox();
        //    alert('grrr');
        //});
    </script>
</html>

