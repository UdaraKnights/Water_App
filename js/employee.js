/**
 * Created with JetBrains PhpStorm.
 * User: harshaa
 * Date: 1/28/15
 * Time: 11:48 PM
 * To change this template use File | Settings | File Templates.
 */

/*
 Page Load Initialize
 */
$(function() {
    //////////////// COMMEN EVENT DO NOT REMOVE //////////////
    $('#logout').click(function() {
        logout();
    });

    $(window).load(function() {
        employeeTable();
        provinceComboBox();
        nationalityComboBox();
        civilStatComboBox();
        ////// PAGE LOAD EVENT//////
    });

    $('select').chosen({width: "100%"});
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    //////////////// END OF COMMEN EVENT DO NOT REMOVE //////////////

    $('#empSave').click(function(){
        employeeData($('#empId').val(), $('#fullName').val(),$('#nicNo').val(),
            $('#addrLine1').val(),$('#addrLine2').val(),$('#addrLine3').val(),
            $('#contactRes').val(),$('#contactMob').val(),$('#contactOff').val(),
            $('#email').val(),$('.genderComboBox').val(),$('#dob').val(),
            $('.provinceComboBox').val(),$('.districtComboBox').val(),
            $('.agaDivComboBox').val(),$('.gsDivisionComboBox').val(),
            $('.electorateComboBox').val(),$('.nationalityComboBox').val(),
            $('.civilStatComboBox').val(),$('#drivLicNo').val(),
            $('#chidCnt').val(),$('#religion').val(), null, 'save');
    });

    $('#empUpdate').click(function() {
        employeeData($('#empId').val(), $('#fullName').val(),$('#nicNo').val(),
            $('#addrLine1').val(),$('#addrLine2').val(),$('#addrLine3').val(),
            $('#contactRes').val(),$('#contactMob').val(),$('#contactOff').val(),
            $('#email').val(),$('.genderComboBox').val(),$('#dob').val(),
            $('.provinceComboBox').val(),$('.districtComboBox').val(),
            $('.agaDivComboBox').val(),$('.gsDivisionComboBox').val(),
            $('.electorateComboBox').val(),$('.nationalityComboBox').val(),
            $('.civilStatComboBox').val(),$('#drivLicNo').val(),
            $('#chidCnt').val(),$('#religion').val(), $('#hdn_emp_id').val(), 'update');
    });

    $('.provinceComboBox').change(function() {
        electorateComboBox($(this).val());
        districtComboBox($(this).val());
    });

    $('.districtComboBox').change(function() {
        agaDivisionComboBox($(this).val());
    });

    $('.agaDivComboBox').change(function() {
        gsDivisionComboBox($(this).val());
    });


});

function loadToFields(index, id){
    var refTab = document.getElementById("employee_table");
    var row = refTab.rows[index+1];
    document.getElementById("empId").value = row.cells[1].firstChild.nodeValue;
    document.getElementById("fullName").value = row.cells[2].firstChild.nodeValue;
    document.getElementById("hdn_emp_id").value = id; //alert('setted ID is '+$('#data_id').val());
}

function clearEmployee(){
    $('input[type="text"]').val('');
}

function userDelete(maincatID) {
    confirm("Delete Main Category Data", "Are you sure want to delete main category data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'maincatDelete', maincatID: maincatID}, function(delMsg) {
            maincatTable();
            alertifyMsgDisplay(delMsg, 2000);
        }, "json");
    });
}

function showmaincatActionBtn() {
    if ($('#maincatActionBtn').hasClass("hidden")) {
        $('#maincatActionBtn').removeClass("hidden");
    }

}

function selectUserdata(maincatId) {
    $.post("views/commenSettingView.php", {findmaincatDataByID: 'find', maincatID: maincatId}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("Internal Error Occured", 1000);
        } else {
            $.each(e, function(index, maincatData) {
                $('#maincatID').val(maincatData.id);
                $('#maincatName').val(maincatData.main_cat_name);
            });
        }

    }, 'json');
}

function userClear() {
    $('#maincatID').val('');
    $('#maincatName').val('');
}

function userUpdate() {
    maincatID = parseInt($('#maincatID').val());
    if (maincatID !== null || maincatID !== 0) {
        maincatName = $('#maincatName').val();
        $.post("views/commenSettingView.php", {action: 'maincatUpdate', maincatID: maincatID, maincatName: maincatName}, function(updateSerMsg) {
            maincategoryClear();
            hidemaincatUpdateDeleteBtns();
            maincatTable();
            alertifyMsgDisplay(updateSerMsg, 2000);
        }, "json");
    } else {
        alertify.error("Internal Error Occured", 1000);
    }
}

function hideuserUpdateDeleteBtns() {
    if (!$('#userActionBtn').hasClass("hidden")) {
        $('#userActionBtn').addClass("hidden");
    }
}

