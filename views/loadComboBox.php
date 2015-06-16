<?php

require_once '../com.water.app/config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();
session_start();
if (array_key_exists("comboBox", $_POST)) {
    if ($_POST['comboBox'] == 'maincatNameComboBox') {
        echo $system->prepareSelectQueryForJSON("SELECT
mi_main_income_category.id,
mi_main_income_category.main_cat_name
FROM
mi_main_income_category");
    } else if ($_POST['comboBox'] == 'subcatComboBox') {
        $mainCatId = $_POST['mainCatId'];
        echo $system->prepareSelectQueryForJSON("SELECT
mi_sub_one_income_category.id,
mi_sub_one_income_category.sub_one_category
FROM
mi_sub_one_income_category
WHERE
mi_sub_one_income_category.main_cat_id = '{$mainCatId}'");
    }
    /* New App */
    else if ($_POST['comboBox'] == 'mainRoadComboBox') {
        //$mainCatId = $_POST['mainRoadId'];
        echo $system->prepareSelectQueryForJSON("SELECT *
        FROM wb_m_main_road");
    } else if ($_POST['comboBox'] == 'subRoadCombobox') {
        $mainRoadId = $_POST['mainroadID'];
        echo $system->prepareSelectQueryForJSON("SELECT *
        FROM wb_m_sub_road where main_road_id = '{$mainRoadId}'");
    } else if ($_POST['comboBox'] == 'meterReaderCombobox') {
        //$mainCatId = $_POST['mainRoadId'];
        echo $system->prepareSelectQueryForJSON("SELECT *
        FROM wb_m_meter_reader");
    }else if ($_POST['comboBox'] == 'selectCusMulti') {
            $subRoadID = $_POST['SubroadID'];
            echo $system->prepareSelectQueryForJSON("select * from wb_m_customer where sub_road = '{$subRoadID}'");
    }
}



