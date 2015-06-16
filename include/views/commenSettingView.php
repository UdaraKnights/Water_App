<?php

require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$system = new setting();


if (array_key_exists("action", $_POST)) {

    ///////////////// DATA PROCCESING ////////////////
    if ($_POST['action'] == 'maincatSave') {
        echo $system->prepareCommandQueryForAlertify("INSERT INTO `mi_main_income_category` (`main_cat_name`) VALUES ('{$_POST['maincatName']}');", "Successfully Saved Main Category Data", "Sorry ! Could not be saved your Data");
    } else if ($_POST['action'] == 'maincatUpdate') {

        echo $system->prepareCommandQueryForAlertify("UPDATE `mi_main_income_category` SET `main_cat_name`='{$_POST['maincatName']}' WHERE (`id`='{$_POST['maincatID']}')", "Successfully Update main category Data", "Sorry Cound not be updated main category Data");
    } else if ($_POST['action'] == 'maincatDelete') {
        echo $system->prepareCommandQueryForAlertify("DELETE FROM `mi_main_income_category` WHERE id = " . $_POST['maincatID'], "Successfully Deleted main category Data", "Sorry could not be deleted main category data");
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



