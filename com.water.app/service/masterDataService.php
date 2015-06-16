<?php

require_once '../config/dbc.php';
require_once '../common/dbConnection.php';
require_once '../common/dbFunctions.php';
$dbClass = new database();
$system = new dbFunctions();

//checks wheather req is a master service or not 
if (array_key_exists("masters_save", $_POST)) {

    /* New Development */
    if ($_POST['masters_save'] == 'e') {
        
    }

        //Customer data DM services
if ($_POST['masters_save'] == 'customer') {
    $cus_id = $_POST['cus_id'];
    $nic = $_POST['nic'];    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $owner_name = $_POST['owner_name'];
    $tax_noe = $_POST['tax_no'];
    $reg_date = $_POST['reg_date'];
    $sub_road = $_POST['sub_road'];
    $nature = $_POST['nature'];
    $security_deposit = $_POST['security_deposit'];
    $estimate_amount = $_POST['estimate_amount'];   

    //save customer data
    if ($_POST['service'] == 'save') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO wb_m_customer (`cus_id`, `nic`, `name`, `address`, `owner_name`, `tax_no`, `reg_date`, `sub_road`, `nature`, `security_deposit`, `estimate_amount`) VALUES ('{$cus_id}', '{$nic}', '{$name}', '{$address}', '{$owner_name}', '{$tax_noe}','{$reg_date}', '{$sub_road}', '{$nature}', '{$security_deposit}', '{$estimate_amount}')", "Successfuly Added new Customer", "Sorry !! Failed to Add new Customer") or die(mysql_error());        
    }
    //update reginal data
    elseif ($_POST['service'] == 'update') {
        echo $system->prepareCommandQueryForAlertify("Update hs_m_employee set nic_no='{$cus_id}', surname='{$surname}',initial='{$initial}', first_appoint_date='{$first_appoint_date}', confirmation_date='{$confirmation_date}', eb_passed_date='{$eb_passed_date}', w_opn_number='{$w_opn_number}', agrahara_no='{$agrahara_no}', pension_date='{$pension_date}', aborobtion_date='{$aborobtion_date}', no_of_absorbtion='{$no_of_absorbtion}', no_mc_registration='{$no_mc_registration}', current_grade_id='{$current_grade_id}' WHERE id='{$empId}'", "Employee Updated !", "Sorry !! Update Process failed.");
    }

    //delete regional data
    elseif ($_POST['service'] == 'delete') {
        echo $system->prepareCommandQueryForAlertify("delete from hs_m_employee where id='{$empId}' ", "Employee Deleted !", "Sorry !! Employee Delete failed.");
}  



    //for a wrong service flag
    else {
        echo json_encode(array("msgType" => 2, "msg" => "Oh ! that's weired !! you are in a wrong place."));
    }
}
    
    elseif ($_POST['masters_save'] == 'assginCus') {
        

        $query =  'INSERT INTO wb_t_customer_road (`cus_id`, `reader_id`, `sub_road_id`) VALUES ';
        $sql = array();
        $meterReader_id = $_POST['meter_readderId'];
        $customerIds = $_POST['CustomerIds'];
        $subRoadID = $_POST['subroad_id'];
        $deleteQry = "delete from wb_t_customer_road where reader_id='{$meterReader_id}'";
        //save assign employee data
        if ($_POST['service'] == 'save') {
            foreach ($customerIds as $cus_id) {
                foreach($cus_id as $id){
                    $sql[] = '('. $id .', ' . $meterReader_id . ' , '.$subRoadID.')';
                }
            }
            $query .= implode(',', $sql);
            if($system->prepareCommandQuerySpecial($deleteQry)){
                echo $system->prepareCommandQueryForAlertify($query, "Successfully Assign Employees", "Sorry !! Failed to Assign Employees");
            }else{
                echo $system->prepareMessageForAlertify("Deletion of existing record failure!");
            }

        }   
        elseif ($_POST['service'] == 'delete') {
            echo $system->prepareCommandQueryForAlertify("Delete From employee_id WHERE id='{$id}'", "Assign Employees Deleted !", "Sorry !! Deleting Process failed.");
        }

        //for a wrong service flag
        else {
            echo json_encode(array("msgType" => 2, "msg" => "Oh ! that's weired !! you are in a wrong place."));
        } 
    }
    
} else {
    echo json_encode(array("msgType" => 2, "msg" => "Oh ! that's weired !! you are in a wrong place."));
}

?>