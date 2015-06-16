<?php

require_once '../com.water.app/config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';
$dbClass = new database();
$system = new setting();
session_start();

if (array_key_exists("table", $_POST)) {
    //loading Regional office master data
    if ($_POST['table'] == 'regionalOfficeData') {
        echo $system->prepareSelectQueryForJSON("SELECT hs_t_regional_office.id, hs_t_province.description As 'Province', hs_t_province.id As 'Province_id', hs_t_regional_office.description As 'RO' FROM hs_t_regional_office, healthservice.hs_t_province where hs_t_regional_office.province_id=hs_t_province.id");
    }
    //loading privince master data
    else if($_POST['table'] == 'provinceData'){
        echo $system->prepareSelectQueryForJSON("SELECT id, code, description FROM hs_t_province");
    }
    //loading district data
    else if($_POST['table'] == 'districtData'){
        echo $system->prepareSelectQueryForJSON("SELECT hs_t_district.id, hs_t_district.description As 'District', hs_t_province.id As 'Province_id', hs_t_province.description As 'Province' FROM hs_t_district, hs_t_province where hs_t_district.province_id = hs_t_province.id");
    }
    
    //loading grades data
    else if($_POST['table'] == 'gradesData'){
        echo $system->prepareSelectQueryForJSON("SELECT id, description FROM hs_t_grade");
    } 
    //loading aga divisions data
    else if($_POST['table'] == 'agaDivData'){
        echo $system->prepareSelectQueryForJSON("SELECT aga.id, aga.CODE, aga.description,d.id AS district_id, p.id AS province_id
                    FROM hs_t_aga_division aga, hs_t_district d, hs_t_province p
                    WHERE aga.district_id= d.id
                    AND d.province_id=p.id");
    } 
    //loading electorate divisions data
    else if($_POST['table'] == 'elecDivData'){
        echo $system->prepareSelectQueryForJSON("SELECT e.id, p.description AS 'Province', e.description AS 'des', p.id AS province_id
            FROM hs_t_electorate e, hs_t_province p
            WHERE e.province_id=p.id");
    }
    //loading GS divisions data
    else if($_POST['table'] == 'gsDivData'){
        echo $system->prepareSelectQueryForJSON("SELECT gs.id, gs.description, aga.description AS 'aga_div' ,
            d.description AS 'district' , p.id AS province_id, d.id AS district_id, aga.id AS aga_id
            FROM hs_t_gs_division gs, hs_t_aga_division aga, hs_t_district d , hs_t_province p
            WHERE gs.aga_id=aga.id
            AND aga.district_id=d.id
            AND P.ID = d.province_id");
    }
    //loading institute data
    else if($_POST['table'] == 'instituteData'){
        echo $system->prepareSelectQueryForJSON("SELECT id, code, description FROM hs_t_institute");
    }
    //loading employee guardian data
    else if($_POST['table'] == 'guardianData'){
        echo $system->prepareSelectQueryForJSON("SELECT e.id AS emp_id, e.full_name,eg.name AS guard_name, eg.id FROM hs_t_employee e, hs_t_emp_guardian eg
                                WHERE eg.employee_id = e.id");
    }
    //loading Business Units data
    else if($_POST['table'] == 'bUnitData'){
        echo $system->prepareSelectQueryForJSON("SELECT bu.id, bu.description AS 'des',
                         mc.description AS 'main_cat', sc.description AS 'sub_cat',
                         ro.description  AS 'ro', p.id AS province_id, ro.id AS ro_id,mc.id AS mc_id, sc.id AS sc_id
                         FROM hs_t_business_unit bu, hs_t_main_category mc, hs_t_sub_category sc,hs_t_regional_office ro, hs_t_province p
                         WHERE bu.main_cat=mc.id
                        AND bu.sub_cat=sc.id
                        AND bu.ro_id=ro.id
                        AND p.id=ro.province_id");
    } else if ($_POST['table'] == 'AllUserControlTable') {
        echo $system->prepareSelectQueryForJSON("SELECT 
        tl_system_users.user_id,
        tl_system_users.user_name,
        tl_system_users.user_level,
        tl_system_users.pwd,
        tl_system_users.date,
        tl_system_users.approved, 
        hs_m_institute.code As 'Institute' 
        FROM 
        tl_system_users,
        hs_m_institute 
        WHERE 
        hs_m_institute.id = tl_system_users.institute_id");
    }
    
    /*  New Development  */
    
    //moh data
    else if($_POST['table'] == 'mohData'){
        echo $system->prepareSelectQueryForJSON("SELECT id, moh_area FROM hs_m_moh_area");
    }
    
    //institution master data
    else if ($_POST['table'] == 'instituteMasterData') {
        echo $system->prepareSelectQueryForJSON("SELECT hs_m_institute.id As 'id', hs_m_institute.code As 'des', hs_m_institute.unit_name As 'unit_name', hs_m_institute.drug_code As 'drug_code', hs_m_institute.type As 'type', hs_m_moh_area.moh_area As 'moh_area', hs_m_moh_area.id As 'moh_area_id' FROM health_system.hs_m_institute, health_system.hs_m_moh_area where hs_m_institute.moh_id=hs_m_moh_area.id");
    }
    
    //loading designations data
    else if($_POST['table'] == 'designationsData'){
        echo $system->prepareSelectQueryForJSON("SELECT d.id, d.designation, d.category_id, c.category_name FROM hs_m_desgination d, hs_m_category c WHERE c.id = d.category_id");
    }
    
    //loading category data
    else if($_POST['table'] == 'categoryData'){
        echo $system->prepareSelectQueryForJSON("SELECT id, category_name FROM hs_m_category");
    }
    
    //loading grade data
    else if($_POST['table'] == 'gradeData'){
        echo $system->prepareSelectQueryForJSON("SELECT hs_m_grade.id As 'id', hs_m_grade.grade_name As 'grade_name', hs_m_category.category_name As 'category_name' , hs_m_category.id As 'category_id' From hs_m_category, hs_m_grade Where hs_m_grade.category_id = hs_m_category.id");
    }
    
    //loading transferset data
    else if($_POST['table'] == 'transfersetData'){
        echo $system->prepareSelectQueryForJSON("SELECT id,list_name,date_started FROM hs_m_transfer_set");
    }
    //loading Employee data
    else if($_POST['table'] == 'employeeData'){        
        echo $system->prepareSelectQueryForJSON("SELECT e.*, g.id grade_id,c.id category_id FROM hs_m_employee e, hs_m_grade g,hs_m_category c
                    WHERE e.current_grade_id = g.id
                    AND g.category_id = c.id");
    }
    
     //loading Employee data
    else if($_POST['table'] == 'appoinmentData'){
        if(isset($_SESSION['user_level']) && $_SESSION['user_level']==1){
            echo $system->prepareSelectQueryForJSON("SELECT ap.*,emp.*,ins.*,c.id cat_id,d.id desi_id
                FROM hs_t_appointment ap, hs_m_employee emp, hs_m_institute ins ,hs_m_category c, hs_m_desgination d
                    WHERE ap.employee_id=emp.id
                    AND ap.institute_id=ins.id
                    AND ap.designation_id = d.id
                    AND d.category_id = c.id");
        }else{
            $usr_id = $_SESSION['user_id'];
            echo $system->prepareSelectQueryForJSON("SELECT ap.*,emp.*,ins.*,c.id cat_id,d.id desi_id
                FROM hs_t_appointment ap, hs_m_employee emp, hs_m_institute ins ,hs_m_category c, hs_m_desgination d, hs_t_user_employee ue
                    WHERE ap.employee_id=emp.id
                    AND ap.institute_id=ins.id
                    AND ap.designation_id = d.id
                    AND d.category_id = c.id
                    AND ue.employee_id = emp.id
                    AND ue.user_id = '{$usr_id}'");
        }

    }
    //loading Assigned Employee for users data
    else if($_POST['table'] == 'assignEmployeeData'){
        $userId = $_POST['user_id'];

        echo $system->prepareSelectQueryForJSON("SELECT u.user_name,e.surname, u.user_id, d.id desi_id, c.id cat_id
                FROM hs_t_user_employee ue, tl_system_users u, hs_m_employee e,hs_t_appointment ap, hs_m_category c, hs_m_desgination d
                WHERE ue.user_id = u.user_id
                AND ue.employee_id = e.id
                AND u.user_id = '{$userId}'
                AND d.category_id = c.id
                AND ap.employee_id = e.id
                AND ap.designation_id = d.id
                ORDER BY u.user_id");
    }
    //loading Assigned Employee for users data
    else if($_POST['table'] == 'employeeViewerData'){
        $nic_no = mysql_real_escape_string($_POST['nic_no']);
        $surname = mysql_real_escape_string($_POST['surname']);
//        $user_id = $_SESSION['user_id'];             $user_id

        $sql = "SELECT * FROM hs_m_employee e ";
        if($nic_no != null  && $nic_no != "" && $surname != null && $surname != ""){
            $sql = $sql . " where e.nic_no like '" . $nic_no ."%' and e.surname like '" . $surname . "'";
        }else if($nic_no != null  && $nic_no != ""){
            $sql = $sql . " where e.nic_no like '" . $nic_no . "%'";
        }else  if($surname != null && $surname != ""){
            $sql = $sql . " where e.surname like '%" . $surname . "%'";
        }
        echo $system->prepareSelectQueryForJSON($sql);
    }
    //load employee and appointment data for employee data viewer
    elseif($_POST['table'] == 'employeeAppointmentData'){
        $emp_id = mysql_real_escape_string($_POST['emp_id']);
        $sql = "SELECT e.*, g.grade_name, c.category_name ,a.*, i.code, t.list_name, d.designation, (SELECT ins.code FROM hs_m_institute ins WHERE ins.id = a.came_from) came_from
        FROM hs_m_employee e, hs_m_grade g, hs_m_category c, hs_t_appointment a, hs_m_institute i, hs_m_transfer_set t, hs_m_desgination d WHERE e.current_grade_id = g.id
                AND c.id=g.category_id
                AND a.employee_id = e.id
                AND i.id = a.institute_id
                AND a.assign_tset_id = t.id
                AND a.designation_id =  d.id ";
        if($emp_id != null  && $emp_id != ""){
            $sql = $sql . " and e.id ='" . $emp_id ."'";
        }
        echo $system->prepareSelectQueryForJSON($sql);
    }
}
    








