<?php
session_start();
session_regenerate_id(true);
require_once './com.water.app/config/dbc.php';
?>
<!DOCTYPE html>

<html>
    

    <head>
        <meta charset="UTF-8"> 
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <style>
        body {
            background-image: url("img/back.png");
            background-position: 50% 50%;
        }
    </style>
    <body>        
        <div class="container signForm">
            <h3 class="form-signin-heading text-center">National Water Supply and Drainage Board</h3>
            <h4 class="form-signin-heading text-center">Service login</h4>
            <div class="card card-signin">
                <img class="img-circle profile-img" src="ico/avatar.png" alt="">
                <div class="form-signin">
                    <input type="text" class="form-control" id="userName" placeholder="Username" required autofocus autocapitalize="off" autocomplete="off" autocorrect="off">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <label class="checkbox">
                        <input type="checkbox" class="showHidePwd"> Show / Hide Password
                    </label>
                    <button class="btn btn-lg btn-primary btn-block" id="logSystem">Sign in</button>
                    <div>
                        <a class="pull-right"></a>
                        <label class="checkbox">
                            <input type="checkbox" id="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->        
        <?php require_once './include/systemFooter.php'; ?>       
        <script type="text/javascript">

            $(function() {
               


                $('.showHidePwd').on('change', function() {
                    $('#password').hideShowPassword($(this).prop('checked'));
                });

                $('#logSystem').click(function() {
                    userName = $('#userName').val();
                    password = $('#password').val();

                    if ($('#remember').prop('checked')) {
                        remember = "r";
                    } else {
                        remember = "nr";
                    }
                    login(userName, password, remember);
                });
            });
        </script>
    </body>
</html>

