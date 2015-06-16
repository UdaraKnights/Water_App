//@udara setting the province id fectch by server via a JSON as parameter of loadToFields function
function regionalOfficeTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'regionalOfficeData'}, function(e) {
        //img\ajax\loading.gif
        //$('#ajax_load').html('').append('<img src='+'img/ajax/loading.gif'+'>');
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#regional_offices tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.Province + '</td>';
                tableData += '<td>' + data.RO + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+data.Province_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#regional_offices tbody').html(tableData);
            /*
             $('.delmaincatData').click(function() {
             maincatDelete($(this).val());
             });
             //Select Data through select button
             $('.selmaincatData').click(function() {
             showmaincatActionBtn();
             selectmaincatdata($(this).val());
             }); */
        }
    }, "json");
}

function provinceTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'provinceData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#province_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.code + '</td>';
                tableData += '<td>' + data.description + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#province_table tbody').html(tableData);            
        }
    }, "json");
}

function districtTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'districtData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#district_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) { //
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.District + '</td>';
                tableData += '<td>' + data.Province + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+', '+data.Province_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#district_table tbody').html(tableData);            
        }
    }, "json");
}

function gradesTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'gradesData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#grades_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.description + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#grades_table tbody').html(tableData);            
        }
    }, "json");
}

function agaDivTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'agaDivData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#aga_div_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.CODE + '</td>';
                tableData += '<td>' + data.description + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+data.district_id+', '+data.province_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#aga_div_table tbody').html(tableData);            
        }
    }, "json");
}

function electorateDivTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'elecDivData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#electorate_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.des + '</td>';
                tableData += '<td>' + data.Province + '</td>';
//                tableData += '<td>' + data.dess + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+ data.province_id +')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#electorate_table tbody').html(tableData);
        }
    }, "json");
}

function gsDivTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'gsDivData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#gs_div_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.district + '</td>';
                tableData += '<td>' + data.aga_div + '</td>';
                tableData += '<td>' + data.description + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+data.province_id+', '+data.district_id+', '+data.aga_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#gs_div_table tbody').html(tableData);
        }
    }, "json");
}

function instituteTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'instituteData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#institute_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.code + '</td>';
                tableData += '<td>' + data.description + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#institute_table tbody').html(tableData);
        }
    }, "json");
}

function employeeTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'employeeData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#employee_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index+1 + '</td>';
                tableData += '<td>' + data.employee_id + '</td>';
                tableData += '<td>' + data.full_name + '</td>';
                tableData += '<td>' + data.nic_no + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#employee_table tbody').html(tableData);
        }
    }, "json");
}

function guardianTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'guardianData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#guardian_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index+1 + '</td>';
                tableData += '<td>' + data.full_name + '</td>';
                tableData += '<td>' + data.guard_name + '</td>';
//                tableData += '<td>' + data.nic_no + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#guardian_table tbody').html(tableData);
        }
    }, "json");
}

function BusinessUnitTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'bUnitData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#bu_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.ro + '</td>';
                tableData += '<td>' + data.main_cat + '</td>';
                tableData += '<td>' + data.sub_cat + '</td>';
                tableData += '<td>' + data.des + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+data.mc_id+', '+data.sc_id+', '+data.ro_id+', '+data.province_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#bu_table tbody').html(tableData);
        }
    }, "json");
}


/********************************************
 *          User Table Data Loading         *
 ********************************************/

function userTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'userSideTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="4"> No Data Found </td></tr>';
            $('#user_side_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.user_id + '</td>';
                tableData += '<td>' + data.user_fname + '</td>';
                tableData += '<td>' + data.user_lname + '</td>';
                tableData += '<td>' +
                    '<div class="btn-group"><button class="btn btn-primary selUserData" value="' + data.user_id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button>' +
                    '<button class="btn btn-danger delVoteData" value="' + data.user_id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div>' +
                    '</td>';
                tableData += '</tr>';
            });
            //Load Json Data to Table
            $('#user_side_table tbody').html(tableData);

            ////////// DELETE  SUB ONE CAT DATA ///////////
            $('.delVoteData').click(function() {
                VoteDelete($(this).val());
            });

            //Select Data through select button
            $('.selVoteData').click(function() {
                VoteSelectedID = $(this).val();
                showVoteActionBtn();
                $.post("views/commenSettingView.php", {findVoteId: 'find', VoteSelectedID: VoteSelectedID}, function(up) {
                    $.each(up, function(index, data) {
                        $('#voteID').val(data.id);
                        $('#votename').val(data.vote_name);
                        $('#votecode').val(data.vote_code);
                    });
                }, "json");
            });
        }
    }, "json");
}


/*  New Development  */

function MohTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'mohData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#moh_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.moh_area + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#moh_table tbody').html(tableData);            
        }
    }, "json");
}

function instituteTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'instituteMasterData'}, function(e) {
        //img\ajax\loading.gif
        //$('#ajax_load').html('').append('<img src='+'img/ajax/loading.gif'+'>');
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#regional_offices tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.moh_area + '</td>';
                tableData += '<td>' + data.des + '</td>';
                tableData += '<td>' + data.unit_name + '</td>';
                tableData += '<td>' + data.drug_code + '</td>';
                tableData += '<td>' + data.type + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"  onClick="loadToFields('+index+', '+data.id+', '+data.moh_area_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#regional_offices tbody').html(tableData);
        }
    }, "json");
}

function designationsTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'designationsData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#designations_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.category_name + '</td>';
                tableData += '<td>' + data.designation + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+', '+data.category_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#designations_table tbody').html(tableData);            
        }
    }, "json");
}

function categoryTable() { 
    var tableData;
    $.post("views/loadTables.php", {table: 'categoryData'}, function(e) { 
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#cat_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.category_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#cat_table tbody').html(tableData);            
        }
    }, "json");
}

function gradeTable() { 
    var tableData;
    $.post("views/loadTables.php", {table: 'gradeData'}, function(e) { 
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#grades_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.category_name + '</td>';
                tableData += '<td>' + data.grade_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+','+data.id+','+data.category_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#grades_table tbody').html(tableData);            
        }
    }, "json");
}

function TransfersetTable() { 
    var tableData;
    $.post("views/loadTables.php", {table: 'transfersetData'}, function(e) { 
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#transferset_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.list_name + '</td>';
                tableData += '<td>' + data.date_started + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+','+data.id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#transferset_table tbody').html(tableData);            
        }
    }, "json");
}

function EmpTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'employeeData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#emp_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.nic_no + '</td>';
                tableData += '<td>' + data.surname + '</td>';
                tableData += '<td>' + data.initial + '</td>';
                tableData += '<td hidden>' + data.first_appoint_date + '</td>';
                tableData += '<td hidden>' + data.confirmation_date + '</td>';
                tableData += '<td hidden>' + data.eb_passed_date + '</td>';
                tableData += '<td hidden>' + data.w_opn_number + '</td>';
                tableData += '<td hidden>' + data.agrahara_no + '</td>';
                tableData += '<td hidden>' + data.pension_date + '</td>';
                tableData += '<td hidden>' + data.aborobtion_date + '</td>';
                tableData += '<td hidden>' + data.no_of_absorbtion + '</td>';
                tableData += '<td hidden>' + data.no_mc_registration + '</td>';
                tableData += '<td hidden>' + data.current_grade_id + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index+', '+data.id+', '+data.grade_id+', '+data.category_id+')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#emp_table tbody').html(tableData);            
        }
    }, "json");
}

function AppoinmentTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'appoinmentData'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#appoinment_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
//                alert(data.cat_id);
//                alert(data.desi_id);
                tableData += '<tr>';
                tableData += '<td>' + data.id + '</td>';
                tableData += '<td>' + data.initial + ' ' + data.surname + '</td>';
                tableData += '<td>' + data.code + '</td>';
                tableData += '<td hidden>' + data.employee_id + '</td>';
                tableData += '<td hidden>' + data.institute_id + '</td>';
                tableData += '<td hidden>' + data.date_reported + '</td>';
                tableData += '<td>' + data.designation + '</td>';
                tableData += '<td hidden>' + data.type + '</td>';
                tableData += '<td hidden>' + data.assign_tset_id + '</td>';
                tableData += '<td hidden>' + data.came_from + '</td>';
                tableData += '<td hidden>' + data.designation_id + '</td>';
                tableData += '<td hidden>' + data.date_released + '</td>';
                tableData += '<td hidden>' + data.released_tset_id + '</td>';
                tableData += '<td hidden>' + data.released_to + '</td>';
                tableData += '<td hidden>' + data.comment + '</td>';
                tableData += '<td hidden>' + data.is_working + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+index
                    +', '+data.id+','+data.employee_id+','+data.institute_id+','+data.assign_tset_id+','+data.came_from
                    +','+data.cat_id+','+ data.desi_id +')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button><button class="btn btn-danger delmaincatData" value="' + data.id + '" onClick="deleteRecord('+data.id+')"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('#appoinment_table tbody').html(tableData);            
        }
    }, "json");
}

function LoadAssignEmpUserTable(user_id) {
    var tableData;
    $.post("views/loadTables.php", {table: 'assignEmployeeData',user_id: user_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#assign_table tbody').html('').append(tableData);
        } else {
            var cnt = 1;
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + cnt + '</td>';
//                tableData += '<td>' + data.user_name + '</td>';
                tableData += '<td>' + data.surname + '</td>';
                tableData += '<td hidden>' + data.user_id + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.user_id + '" onClick="loadToFields('+ data.user_id +','+data.desi_id+','+data.cat_id +')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Update</button></div></td>';
                tableData += '</tr>';
                cnt = cnt+ 1;

            });
            //Load Json Data to Table
            $('#assign_table tbody').html(tableData);
        }
    }, "json");
}

function EmpViewerTable(nic_no, surname) {
    var tableData;
    $.post("views/loadTables.php", {table: 'employeeViewerData',nic_no:nic_no,surname:surname}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('#employee_view tbody').html('').append(tableData);
        } else {
            var cnt = 1;
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + cnt + '</td>';
                tableData += '<td>' + data.nic_no + '</td>';
                tableData += '<td>' + data.surname + '</td>';
                tableData += '<td hidden>' + data.id + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '" onClick="loadToFields('+ index +', '+ data.id +')"><i class="fa fa-plus-square fa-lg"></i>&nbsp;View</button></div></td>';
                tableData += '</tr>';
                cnt = cnt+ 1;

            });
            //Load Json Data to Table
            $('#employee_view tbody').html(tableData);
        }
    }, "json");
}

function LoadEmployeeAppointment(emp_id) {
    var tableData;
    $.post("views/loadTables.php", {table: 'employeeAppointmentData',emp_id:emp_id}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
//            $('#employee_view tbody').html('').append(tableData);
        } else {
            if($('#nic_no').val()==null || $('#nic_no').val()==""){
                $('#empAppDtl').toggle(1000);
                $('#empDtl').toggle(1000);
            }
            $.each(e, function(index, data) {
                $('#nic_no').val(data['nic_no']);
                $('#surname').val(data['surname']);
                $('#initials').val(data['initial']);
                $('#first_appoint_date').val(data['first_appoint_date']);
                $('#confirmation_date').val(data['confirmation_date']);
                $('#eb_passed_date').val(data['eb_passed_date']);
                $('#w_opn_number').val(data['w_opn_number']);
                $('#agrahara_no').val(data['agrahara_no']);
                $('#pension_date').val(data['pension_date']);
                $('#aborobtion_date').val(data['aborobtion_date']);
                $('#no_of_absorbtion').val(data['no_of_absorbtion']);
                $('#no_mc_registration').val(data['no_mc_registration']);
                $('#current_grade_id').val(data['grade_name']);
                $('#cat_name').val(data['category_name']);

                $('#institute_id').val(data['code']);
                $('#date_reported').val(data['date_reported']);
                $('#designation').val(data['designation']);
                $('#type').val(data['type']);
                $('#assign_tset_id').val(data['list_name']);
                $('#came_from').val(data['came_from']);
            });
            //Load Json Data to Table
//            $('#employee_view tbody').html(tableData);


        }
    }, "json");
}
