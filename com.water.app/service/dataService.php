<?php

require_once '../config/dbc.php';
require_once '../common/dbConnection.php';
require_once '../common/dbFunctions.php';
$dbClass = new database();
$system = new dbFunctions();




if (array_key_exists("data_request", $_GET)) {
    if($_GET['data_request'] == 'assigncustomers'){
        $sub_road = $_GET['sub_road'];
        $data = '';
        $query=mysql_query("SELECT * FROM wb_m_customer WHERE sub_road=".$sub_road."");
        while ($row = mysql_fetch_assoc($query)) {
            if(!$row['cus_id']==null || !$row['cus_id']==""){
                $data .= ' '.$row['cus_id']."=".$row['name']."\n";
            }
        }
        print($data);
    }
    
}
?>