<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';

$system = new setting();


if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == 'uniqueCatSave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_other_category_items` (`vote_id`, `vote_category_name`, `payment_type_id`, `price`) VALUES ('{$_POST['voteCodeID']}','{$_POST['voteCatName']}', '{$_POST['paymenttypeID']}', '{$_POST['unitprice']}')", "successfully Saved Data", "Sorry Could not be saved");
    } else if ($_POST['action'] == 'uniqueCatUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_other_category_items` SET `vote_id`='{$_POST['voteCodeID']}', `vote_category_name`='{$_POST['voteCatName']}', `payment_type_id`='{$_POST['paymenttypeID']}', `price`='{$_POST['unitprice']}' WHERE (`id`='{$_POST['uniqueCatID']}')", "Successfully Updated", "Sorry Could not Be Updated");
    } else if ($_POST['action'] == 'uniqueCatDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_other_category_items` WHERE `id` = '{$_POST['delID']}'", "Successfully Deleted", "Sorry Could Not Be Deleted");
    } else if ($_POST['action'] == 'getUniqueCatDetailsByID') {
        echo $system->prepareSelectQueryForJSON("SELECT
mi_other_category_items.id,
mi_other_category_items.vote_id,
mi_other_category_items.vote_category_name,
mi_other_category_items.payment_type_id,
mi_other_category_items.price,
mi_other_category_items.system_item_id
FROM
mi_other_category_items
WHERE
mi_other_category_items.id = '{$_POST['selID']}'");
    }

    if ($_POST['action'] == 'subcategorySave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mixincome`.`mi_sub_one_income_category` (`sub_one_category`,`main_cat_id`) VALUES ('{$_POST['subcatName']}','{$_POST['maincatName']}');", "Successfully Saved Referance Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'subcategoryUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_sub_one_income_category` SET `sub_one_category`='{$_POST['subcatName']}', `main_cat_id`='{$_POST['maincatName']}' WHERE (`id`='{$_POST['subcategoryID']}');
", "Successfully update Designation Data", "Sorry Could not be update Designation Data");
    } else if ($_POST['action'] == 'subcategoryDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_sub_one_income_category` WHERE id = " . $_POST['categoryID'], "Successfully Deleted Referance Data", "Sorry could not be deleted Referance data");
    }

    if ($_POST['action'] == 'voteSave') {
        $vote_name = $_POST['votename'];
        $vote_code = $_POST['votecode'];
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_votes` (`vote_name`, `vote_code`) VALUES ('{$vote_name}', '{$vote_code}')", "Successfuly Saves Data", "Sorry cannot save data. try again");
    } else if ($_POST['action'] == 'VoteDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM mi_votes WHERE mi_votes.id = '{$_POST['Vote_id']}'", "Successfuly deleted data", "Sorry cannot delete");
    } else if ($_POST['action'] == 'voteUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_votes` SET `vote_name`='{$_POST['votename']}', `vote_code`='{$_POST['votecode']}' WHERE (`id`='{$_POST['voteID']}')", "Successfully Update Votes", "Sorry Could not Be Updated");
    }

    if ($_POST['action'] == 'maincatSave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_main_income_category` (`main_cat_name`) VALUES ('{$_POST['maincatName']}');", "Successfully Saved Main Category Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'maincatUpdate') {

        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_main_income_category` SET `main_cat_name`='{$_POST['maincatName']}' WHERE (`id`='{$_POST['maincatID']}')", "Successfully Update main category Data", "Sorry Cound not be updated main category Data");
    } else if ($_POST['action'] == 'maincatDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_main_income_category` WHERE id = " . $_POST['maincatID'], "Successfully Deleted main category Data", "Sorry could not be deleted main category data");
    }
    if ($_POST['action'] == 'subcattwoSave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_sub_two_income_category` (`sub_two_cat_name`, `sub_one_cat_id`, `vote_id`) VALUES ('{$_POST['subtwocatname']}', '{$_POST['subcatOneComboBox']}', '{$_POST['voteCodeComboBox']}');", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'subtwocategoryUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_sub_two_income_category` SET `sub_two_cat_name`='{$_POST['subtwocatname']}',`sub_one_cat_id`='{$_POST['subcatOneComboBox']}',`vote_id`='{$_POST['voteCodeComboBox']}' WHERE (`id`='{$_POST['subtwoID']}')", "Successfully Update Data", "Sorry Cound not be updated Data");
    } else if ($_POST['action'] == 'subtwoDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_sub_two_income_category` WHERE id = " . $_POST['subcattwoID'], "Successfully Deleted Data", "Sorry could not be deleted ");
    }
    if ($_POST['action'] == 'itemsave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_items` (`item_name`) VALUES ('{$_POST['itemName']}');", "Successfully Saved Item Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'itemUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_items` SET `item_name`='{$_POST['itemName']}' WHERE (`id`='{$_POST['itemID']}')", "Successfully Update Data", "Sorry Cound not be updated Data");
    } else if ($_POST['action'] == 'itemDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_items` WHERE id = " . $_POST['itemID'], "Successfully Deleted Data", "Sorry could not be deleted data");
    } else if ($_POST['action'] == 'billing_details_delete_data') {

        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_customer_payment_income_item` WHERE id = " . $_POST['deleteID'], "Successfully Deleted Data", "Sorry could not be deleted data");
    } else if ($_POST['action'] == 'billdetaildeleteid') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_customer_payment_details` WHERE id = " . $_POST['fullbillID'], "Successfully Deleted Data", "Sorry could not be deleted data");
    }
    else if ($_POST['action'] == 'loadBillNoTypeHead') {
        echo $system->prepareSelectQueryForJSON("SELECT
mi_customer_payment_details.cus_name,
mi_customer_payment_details.cus_address
FROM
mi_customer_payment_details
GROUP BY
mi_customer_payment_details.cus_address
");
    }
    if ($_POST['action'] == 'customerIDSave') {
        if (empty($_POST['chequeDate'])) {
            $_POST['chequeDate'] = '0000-00-00';
        }
//        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_payment_proceed_data` (`cus_id`) VALUES ('{$_POST['customerID']}');", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_payment_proceed_data` (`cus_id`, `payment_type`, `check_number`, `check_date`, `bank_name`) VALUES ('{$_POST['customerID']}','{$_POST['cash']}','{$_POST['chequeNo']}','{$_POST['chequeDate']}','{$_POST['bankname']}');", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
    }
//    $billauto = $system->getNextAutoIncrementID("mi_bill");
    if ($_POST['action'] == 'issueBill') {
        $isBillConfiremedQuery = "SELECT
mi_payment_proceed_data.proceed_id
FROM
mi_payment_proceed_data
WHERE
mi_payment_proceed_data.cus_id = '{$_POST['customerID']}' LIMIT 1";

        $isBillConfiremedQueryResult = mysql_query($isBillConfiremedQuery);
        $isBillConfiremed = mysql_num_rows($isBillConfiremedQueryResult);
        if ($isBillConfiremed > 0) {
            $isBillConfiremedData = $system->prepareSelectQuery($isBillConfiremedQuery);
            foreach ($isBillConfiremedData as $billProceedData) {
                $proceedID = $billProceedData['proceed_id'];
                if (isset($proceedID) && !empty($proceedID)) {
                    session_start();
                    $systemUser = $_SESSION['user_id'];
                    $billID = $system->getNextAutoIncrementID("mi_bill");
                    if (isset($billID) && !empty($billID)) {
                        $getBillNoAndSave = $system->prepareCommandQuerySpecial("INSERT INTO `mi_bill` (`bill_proceed_id`, `bill_date`, `bill_time`, `bill_issud_system_user_id`) VALUES ('{$proceedID}', '{$_POST['date']}', CURTIME(), '{$systemUser}')");
                        if ($getBillNoAndSave) {
                            echo json_encode(array(array("msgType" => 3, "billID" => $billID)));
                        } else {
                            echo json_encode(array(array("msgType" => 2, "msg" => 'system Error | bill Not Issued')));
                        }
                    } else {

                        echo json_encode(array(array("msgType" => 2, "msg" => 'system Error | geting Bill ID')));
                    }
                } else {

                    echo json_encode(array(array("msgType" => 2, "msg" => 'system Error | geting Procced ID')));
                }
            }
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => 'Not Confiremd')));
        }
    }
//    bill_id
//`` (`id`, `cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`) VALUES ('16', '5', '2', '44', '100.00', '66660.00', '555500.00', '622160.00');


    if ($_POST['action'] == 'paymentTypeSave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_trade_income_prices` (`sub_two_cat_id`, `payment_type_id`, `unit_price`) VALUES ('{$_POST['subcatTwoComboBox']}', '{$_POST['paymenttypeComboBox']}', '{$_POST['unitprice']}');", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'paymenttypeUpdate') {
        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_trade_income_prices` SET `sub_two_cat_id`='{$_POST['subcatTwoComboBox']}',`payment_type_id`='{$_POST['paymenttypeComboBox']}',`unit_price`='{$_POST['unitprice']}' WHERE (`id`='{$_POST['paymentTypeID']}')", "Successfully Update Data", "Sorry Cound not be updated Data");
    } else if ($_POST['action'] == 'paymenttypeDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_trade_income_prices` WHERE id = " . $_POST['paymentID'], "Successfully Deleted Data", "Sorry could not be deleted ");
    }
    if ($_POST['action'] == 'cusdatasave') {
        $name = mysql_real_escape_string($_POST['name']);
        $address = mysql_real_escape_string($_POST['address']);
        $nic = mysql_real_escape_string($_POST['nic']);
        $mobile = mysql_real_escape_string($_POST['mobile']);

        $cusID = $system->getNextAutoIncrementID("mi_customer_payment_details");
        $spqry = "INSERT INTO `mi_customer_payment_details` (`cus_name`, `cus_address`, `cus_nic`, `cus_mobile`) "
                . "VALUES ('{$name}', '{$address}', '{$nic}', '{$mobile}')";
        $cusSave = $system->prepareCommandQuerySpecial($spqry);
        if ($cusSave) {
            echo json_encode(array(array("msgType" => 3, "cusID" => $cusID)));
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => "Sorry!Could not be saved your Data")));
        }
    }
    if ($_POST['action'] == 'itempaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['dateforitem']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'datepaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}','{$_POST['datecorrect']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'hourpaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`)"
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}' , '{$_POST['datefordate']}')") or die(mysql_error());
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'otherpaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['otherdate']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '0')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'itemcaypaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['dateforitem']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'datecatpaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['datecorrect']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'hourcatpaymentsave') {
        $autoid = $_POST['cusID'];
      $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['datefordate']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '{$_POST['quantity']}')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    } else if ($_POST['action'] == 'othercatpaymentsave') {
        $autoid = $_POST['cusID'];
        $autominusid = $autoid;
        $autopayid = $system->getNextAutoIncrementID("mi_customer_payment_income_item");
        $autopayedid = $autopayid;
        $itempaydetails = mysql_query("INSERT INTO `mi_customer_payment_income_item` (`cus_id`, `system_cat_id`, `vote_cat_id`, `unit_price`, `vat_amount`, `total_payable_amount_without_vat`, `total_payable_amount_with_vat`, `date_of_booking`) "
                . "VALUES ('{$autominusid}', '{$_POST['radiovalue']}', '{$_POST['incomeitem']}', '{$_POST['unitpricee']}', '{$_POST['onlytax']}', '{$_POST['witoutvat']}', '{$_POST['totalamount']}', '{$_POST['otherdate']}')");
        if (isset($itempaydetails)) {
            echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_customer_income_item_detail` (`cus_income_itam_detail_id`, `pay_type_id`, `item_qty`) VALUES ('{$autopayedid}', '{$_POST['paymenttypeID']}', '0')", "Successfully Saved Data", "Sorry ! Could not be saved your Data");
        }
    }
}

if (array_key_exists("findmaincatDataByID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_main_income_category.id,
mi_main_income_category.main_cat_name
FROM
mi_main_income_category
WHERE
mi_main_income_category.id = '{$_POST['maincatID']}'");
}
if (array_key_exists("findsubtwocatDataByID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_sub_two_income_category.id,
mi_sub_two_income_category.sub_two_cat_name,
mi_sub_two_income_category.sub_one_cat_id,
mi_sub_two_income_category.vote_id,
mi_main_income_category.id AS mainCatID
FROM
mi_sub_two_income_category
INNER JOIN mi_sub_one_income_category ON mi_sub_two_income_category.sub_one_cat_id = mi_sub_one_income_category.id
INNER JOIN mi_main_income_category ON mi_sub_one_income_category.main_cat_id = mi_main_income_category.id
WHERE
mi_sub_two_income_category.id = '{$_POST['subtwocatId']}'");
}
if (array_key_exists("finditemDataByID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_items.id,
mi_items.item_name
FROM
mi_items
WHERE
mi_items.id = '{$_POST['itemID']}'");
}
if (array_key_exists("paymenttypeDataByID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_trade_income_prices.id,
mi_trade_income_prices.unit_price,
mi_trade_income_prices.payment_type_id,
mi_sub_one_income_category.id AS subCatOneID,
mi_sub_two_income_category.id AS subcatTwoID,
mi_main_income_category.id AS mainCatID
FROM
mi_trade_income_prices
INNER JOIN mi_sub_two_income_category ON mi_trade_income_prices.sub_two_cat_id = mi_sub_two_income_category.id
INNER JOIN mi_sub_one_income_category ON mi_sub_two_income_category.sub_one_cat_id = mi_sub_one_income_category.id
INNER JOIN mi_main_income_category ON mi_sub_one_income_category.main_cat_id = mi_main_income_category.id
WHERE
mi_trade_income_prices.id = '{$_POST['paymenttypeId']}'");
}
/////////////// VOTE ////////
if (array_key_exists('findVoteId', $_POST)) {
    $vote_id = $_POST['VoteSelectedID'];
    echo $system->prepareSelectQueryForJSON("SELECT
mi_votes.id,
mi_votes.vote_name,
mi_votes.vote_code
FROM
mi_votes
WHERE
mi_votes.id = '{$vote_id}'");
}

////////////// MAIN CATEGORY /////////////////
if (array_key_exists("findsubcatID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_sub_one_income_category.sub_one_category,
mi_sub_one_income_category.main_cat_id,
mi_sub_one_income_category.id
FROM
mi_sub_one_income_category
WHERE
mi_sub_one_income_category.id = '{$_POST['subcategoryID']}'");
}
if (array_key_exists("proceedIDbycusID", $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT
mi_payment_proceed_data.proceed_id
FROM
mi_payment_proceed_data
WHERE
mi_payment_proceed_data.cus_id = '{$_POST['proceedIDbycusID']}'");
}

if (array_key_exists("next_id_for_cus", $_POST)) {
    echo $system->getNextAutoIncrementID('mi_customer_payment_details');
}

if (array_key_exists('net_id_data', $_POST)) {
    echo $system->prepareSelectQueryForJSON("SELECT mi_customer_payment_details.cus_name, mi_customer_payment_details.cus_nic FROM mi_customer_payment_details WHERE  mi_customer_payment_details.id = {$_POST['net_id_data']}");
}


if ($_POST['action'] == 'userSave') {
    $userId = $_POST['userId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    echo $system->prepareCommandQueryForAlertify("INSERT INTO `hs_t_user` (`user_id`,`user_fname`,`user_lname`) VALUES ('{$userId}','{$fname}','{&lname}');", "Successfully Saved User Details.", "Sorry ! Could not be saved your Data");
} else if ($_POST['action'] == 'maincatUpdate') {

    echo $system->prepareCommandQueryForAlertify("UPDATE `mi_main_income_category` SET `main_cat_name`='{$_POST['maincatName']}' WHERE (`id`='{$_POST['maincatID']}')", "Successfully Update main category Data", "Sorry Cound not be updated main category Data");
} else if ($_POST['action'] == 'maincatDelete') {
    echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_main_income_category` WHERE id = " . $_POST['maincatID'], "Successfully Deleted main category Data", "Sorry could not be deleted main category data");
}







