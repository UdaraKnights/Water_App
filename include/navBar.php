<!-- Fixed navbar -->
<?php
//session_start();

$user_level="";
$user_name="";

if (isset($_COOKIE['user_id'])) {
    $user_level = $_COOKIE['user_level'];
    $user_name = $_COOKIE['user_name'];
} else {
    $user_level = $_SESSION['user_level'];
    $user_name = $_SESSION['user_name'];
}
?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Web Application</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="dashboard.php">Home</a></li>   
                <?php 
                    if($user_level<3){
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator <b class="caret"></b></a>
                                <ul class="dropdown-menu">                        
                                    <li><a href="SystemManagment.php">System Configuration </a></li>                       
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Manage User</li>
                                    <li><a href="#">Manage Users</a></li>                        
                                </ul>
                            </li>
                        <?php
                    }
                ?>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">



                <li><a href="#">WELCOME <span style="color:Gray; font-weight:bold; font-size:16px;"><?php echo $user_name ?></span> <?php
                        if ($user_level == 3) {
                            echo ' From ' . $_SESSION['institute'] . '';
                        }
                        ?> </a></li>
                <li><a href="#" id="logout">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

