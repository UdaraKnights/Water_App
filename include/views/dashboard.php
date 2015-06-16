<?php
require_once './include/MainConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trade License System</title> 
        <meta charset="UTF-8">
        <?php require_once './include/systemHeader.php'; ?>        
    </head>
    <body>
        <div id="wrap">
            <?php require_once './include/navBar.php'; ?>

            <div class="container">               
                <div class="row">
                    <br/>                    
                    <?php require_once './include/sideBar.php'; ?>
                    <div class="col-md-10">
                        <div class="row">


                            <h1> TEST </h1>




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

            $(window).load(function() {
                ////// PAGE LOAD EVENT//////
            });

            $('select').chosen({width: "100%"});
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            //////////////// END OF COMMEN EVENT DO NOT REMOVE //////////////

        });
    </script>
</html>

