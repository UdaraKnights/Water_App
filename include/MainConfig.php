<?php
include("./com.water.app/config/dbc.php");
include("./class/database.php");
$dbClass = new database();
$dbClass->page_protect();
if (!$dbClass->checkAdmin()) {
    header("Location: index.php");
    exit();
}
?>

