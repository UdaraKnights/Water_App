function delayLoading(callBack, waitingTime) {
    setTimeout(function() {
        callBack();
    }, waitingTime);
}

function submitBulkDataByPost(submitPage, submitData) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($(submitData))
            .appendTo($(document.body))
            .submit();
}
function submitSingleDataByPost(submitPage, submitDataName, submitDataValue) {
    $('<form action="' + submitPage + '" method="POST"/>')
            .append($('<input type="hidden" name="' + submitDataName + '" value ="' + submitDataValue + '">'))
            .appendTo($(document.body))
            .submit();
}

function alertFadeOut() {
    $(".alert").delay(200).fadeOut(2000);
}

function chosenRefresh() {
    $("select").trigger("chosen:updated");
}

function timelyRedirect(url, delay) {
    setTimeout(function() {
        window.location = url;
    }, delay);
}

function refreshBootstrapSwitch() {
    $('.switch')['bootstrapSwitch']();
}

function modalShowEventCallBack(modalData, callback) {
    modalData.modal("show").on('shown.bs.modal', function() {
        callback();
    });
}

function confirm(heading, question, cancelButtonTxt, okButtonTxt, callback) {
    var confirmModal = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">' + heading + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p>' + question + '</p>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">' + cancelButtonTxt + '</button>' +
            '<button type="button" class="btn btn-primary" id="okButton">' + okButtonTxt + '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    confirmModal.find('#okButton').click(function(event) {
        callback();
        confirmModal.modal('hide');
    });
    confirmModal.modal('show');
}

function logout() {
    
    alertify.confirm("Are you sure you want to logout?", function(e) {
                if (e) {
                    $.post("com.water.app/service/userServices.php", {proccess: 'logout'}, function(e) {
                        if (parseInt(e) === 1) {
                            timelyRedirect("index.php", 500);
                        }
                    });                    
                } else {
                    alertify.alert("Never Mind. Do hand on the works. :)");
                }
            });
    
    
}

function  login(userName, password, remember) {
    $.post("com.water.app/service/userServices.php", {logSystem: 'login', userName: userName, password: password, remember: remember}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("System Error Occured", 2000);
        } else {
            $.each(e, function(index, msgData) {
                if (msgData.msgType === 0) {
                    alertify.success(msgData.msg, 2000)
                    timelyRedirect("dashboard.php", "1700");
                } else if (msgData.msgType === 1) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 2) {
                    alertify.error(msgData.msg, 2000);
                } else if (msgData.msgType === 3) {
                    alertify.error(msgData.msg, 2000);
                }
            });
        }
    }, "json");
}

function alertifyMsgDisplay(jsonArray, msgTime) {
    $.each(jsonArray, function(index, msgData) {
        if (msgData.msgType === 1) {
            alertify.success(msgData.msg, msgTime);
        } else if (msgData.msgType === 2) {
            alertify.error(msgData.msg, msgTime);
        }
    });
}

function starterBgSlideTransition() {
    $('body').backstretch([
        "img/starterSlides/slide_01.jpg",
        "img/starterSlides/slide_02.jpg",
        "img/starterSlides/slide_03.jpg",
        "img/starterSlides/slide_04.jpg"
    ], {
        duration: 3000, fade: 1000
    });
}

function loadAllUserControlTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'AllUserControlTable'}, function(tableData) {
        if (tableData === undefined || tableData.length === 0 || tableData === null) {
            $('#allUsersControlTable tbody').html(' -- No Data Found -- ');
        } else {
            $.each(tableData, function(index, tblValue) { 
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + tblValue.user_name + '</td>';
                tableData += '<td>' + tblValue.Institute + '</td>';
//                tableData += '<td>' + tblValue.pwd + '</td>';
                if (parseInt(tblValue.user_level) === 1) {
                    tableData += '<td> SYSTEM ADMIN LEVEL </td>';
                } else if (parseInt(tblValue.user_level) === 2) {
                    tableData += '<td> ADMIN LEVEL </td>';
                } else if (parseInt(tblValue.user_level) === 3) {
                    tableData += '<td> LOCAL USER LEVEL </td>';
                }
                if (parseInt(tblValue.approved) === 1) {

                    tableData += '<td> AUTHORICED USER </td>';
                    tableData += '<td><div  class="switch switch-small userActivation" data-animated="true" data-on="success" data-off="danger" data-on-label="AC" data-off-label="DC"><input class="usrID" type="checkbox" value="' + tblValue.user_id + '" checked></div></td>';
                } else {
                    tableData += '<td> UNAUTHORISED USER </td>';
                    tableData += '<td><div class="switch switch-small userActivation" data-animated="true" data-on="success" data-off="danger" data-on-label="AC" data-off-label="DC"><input class="usrID" type="checkbox" value="' + tblValue.user_id + '"></div></td>';
                }
                tableData += '<td><div class="btn-group"><button class="btn btn-warning updateSystemUser" value="' + tblValue.user_id + '"><i class="fa fa-lg fa-edit"></i> Edit</button><button class="btn btn-danger deleteSystemUser" value="' + tblValue.user_id + '"><i class="fa fa-trash-o fa-lg"></i> Delete</button><div></td>';
                tableData += '</tr>';
            });
            $('#allUsersControlTable tbody').html('').append(tableData);
            refreshBootstrapSwitch();
            /////////////// USER ACTIVATION /////////////////////
            $('.userActivation').on('switch-change', function(e, data) {//alert(data.value);
                if (data.value) {   //alert(display($(this).get()));
                    $(this).find('input:checkbox').attr('checked', function() {
                        uID = $(this).val();
                        $.post("views/databaseViews.php", {userActivation: "active", uID: uID}, function(ua) {
                            alertifyMsgDisplay(ua, "2000", function() {
                                loadAllUserControlTable();
                            });
                        }, "json");
                    });
                } else {
                    $(this).find('input:checkbox').attr('checked', function() {
                        uID = $(this).val(); //alert(display($(this).get()));
                        $.post("views/databaseViews.php", {userActivation: "deactivate", uID: uID}, function(ua) {
                            alertifyMsgDisplay(ua, "2000", function() {
                                loadAllUserControlTable();
                            });
                        }, "json");
                    });
                }
            });
            ///////////// DELETE USERS /////////////////
            $('.deleteSystemUser').click(function() {
                deleteSystemUserID = $(this).val();
                confirm("Delete System Users", "Are you sure want to detele this user", "No", "Yes", function() {
                    $.post("views/databaseViews.php", {userLoginProccess: 'deleteUser', deleteSystemUserID: deleteSystemUserID}, function(e) {
                        alertifyMsgDisplay(e, 2000, function() {
                            loadAllUserControlTable();
                        })
                    }, "json");
                });
            });
            ///////////// UPDATE USERS ///////////////
            $('.updateSystemUser').click(function() {
                updateSystemUsers($(this).val());
            });
        }
    }, "json");
}

function display( divs ) {
    var a = [];
    for ( var i = 0; i < divs.length; i++ ) {
    a.push( divs[ i ].innerHTML );
    }
    $( "span" ).text( a.join(" ") );
}

function createSystemUsers() {
//headingText,bodyHtml,footerBtns
    var Actionmodel = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">Create System Users</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row">' +
            '<div class="form-horizontal">' +
            '<div class="form-group">' +
            '<label for="modalUserName" class="col-md-4 control-label">User Name</label>' +
            '<div class="col-md-6">' +
            '<input type="text" class="form-control modalUserName" placeholder="User Name">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserLevel" class="col-md-4 control-label">User Permission Level</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control modalUserLevel" >' +
            '<option value="1">SUPER ADMIN LEVEL</option>' +
            '<option value="2">ADMIN LEVEL</option>' +
            '<option value="3">LOCAL USER LEVEL</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalInstitute" class="col-md-4 control-label">Institute</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control instituteComboBox" id="modalUserInstitute">'+
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserPassword" class="col-md-4 control-label">User Password</label>' +
            '<div class="col-md-6">' +
            '<input type="password" class="form-control modalUserPassword" placeholder="User Password">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary modalUserSave" id="okButton"><i class="fa fa-lg fa-save"></i> Create</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    Actionmodel.modal("show"); 
    //instituteComboBox();
    //$("#modal-content").on("shown.bs.modal", function () {alert("grrr");});
    Actionmodel.on("shown.bs.modal", function () {instituteComboBox();});
    Actionmodel.find(".modalUserSave").click(function() {
        modalUserName = $('.modalUserName').val();
        modalUserLevel = $('.modalUserLevel').val();
        modalUserInstitute = $('#modalUserInstitute').val();
        modalUserPassword = $('.modalUserPassword').val();
        if (modalUserName !== null && modalUserPassword !== null) {
            $.post('views/databaseViews.php', {userLoginProccess: 'saveUser', modalUserName: modalUserName, modalUserLevel: modalUserLevel, modelUserIns:modalUserInstitute, modalUserPassword: modalUserPassword}, function(e) {
                alertifyMsgDisplay(e, "2000", function() {
                    loadAllUserControlTable();
                });
            }, "json");
        } else {
            alertify.error("Sorry! coudld not create the new user.please enter both username and password", 2000)
        }
        Actionmodel.modal('hide');
        //Actionmodel.on("hidden.bs.modal", function () {alert('dsds')});
        
    });
}

function updateSystemUsers(userID) {

    var Actionmodel = $('<div class="modal fade">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
            '<h4 class="modal-title">Update System Users</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row">' +
            '<div class="form-horizontal">' +
            '<input type="hidden" class="form-control modalUserID" >' +
            '<div class="form-group">' +
            '<label for="modalUserName" class="col-md-4 control-label">User Name</label>' +
            '<div class="col-md-6">' +
            '<input type="text" class="form-control modalUserName" placeholder="User Name">' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserLevel" class="col-md-4 control-label">User Permission Level</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control modalUserLevel" >' +
            '<option value="1">SUPER ADMIN LEVEL</option>' +
            '<option value="2">ADMIN LEVEL</option>' +
            '<option value="3">LOCAL USER LEVEL</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalInstitute" class="col-md-4 control-label">Institute</label>' +
            '<div class="col-md-6">' +
            '<select  class="form-control instituteComboBox" id="modalUserInstitute">'+
            '</select>' +
            '</div>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="modalUserPassword" class="col-md-4 control-label">User Password</label>' +
            '<div class="col-md-6">' +
            '<input type="password" class="form-control modalUserPassword" placeholder="User Password">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
            '<button type="button" class="btn btn-primary modalUserUpdate" id="okButton"><i class="fa fa-lg fa-save"></i> Update</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    $.post("views/databaseViews.php", {userLoginProccess: 'getUserDetailsByID', userID: userID}, function(userData) {
        if (userData === undefined || userData.length === 0 || userData === null) {
            alertify.error("Internal Error Occured", 2000);
        } else {
            $.each(userData, function(index, userDataView) {
                modalShowEventCallBack(Actionmodel, function() {
                    $('.modalUserID').val(userDataView.user_id);
                    $('.modalUserName').val(userDataView.user_name);
                    $('.modalUserLevel').val(userDataView.user_level);
                    $('.modalUserPassword').val(userDataView.pwd);
                    $('.showHidePwd').click(function() {
                        $('.modalUserPassword').hideShowPassword($(this).prop('checked'));
                    });
                });
            });
        }
        Actionmodel.on("shown.bs.modal", function () {instituteComboBox();});
        Actionmodel.find(".modalUserUpdate").click(function() {
            modalUserID = $('.modalUserID').val();
            modalUserName = $('.modalUserName').val();
            modalUserInstitute = $('#modalUserInstitute').val();
            $('.modalUserLevel').append(function() {
                modalUserLevel = $(this).val();
            });
            modalUserPassword = $('.modalUserPassword').val();
            if (modalUserName !== null && modalUserPassword !== null) {
                $.post('views/databaseViews.php', {userLoginProccess: 'updateUser', modalUserName: modalUserName, modalUserLevel: modalUserLevel, modalUserPassword: modalUserPassword, modalUserID: modalUserID, modelUserIns:modalUserInstitute}, function(e) {
                    alertifyMsgDisplay(e, "2000", function() {
                        
                    });
                    loadAllUserControlTable();
                }, "json");
            } else {
                alertify.error("Sorry! coudld not update the user.please enter both username and password", 2000)
            }
            Actionmodel.modal('hide');
            Actionmodel.on("hidden.bs.modal", function () {
                                                            //Actionmodel.remove();
                                                            $(".modal").remove();
                                                            $('.modal-backdrop').remove();
                                                          });
            //Actionmodel.remove();
        });
    }, "json");
}

function getSystemBackup(BckupBtnClassName, msgDisplayClassName) {
    $.post("views/databaseViews.php", {databseBackup: 'backup'}, function(msg) {
        $(msgDisplayClassName).html(msg);
    });
}

//startt**************************************************************
function maincatSave() {
    maincatName = $('#maincatName').val();
    if (maincatName !== null && maincatName.length !== 0) {
        $.post("views/commenSettingView.php", {action: 'maincatSave', maincatName: maincatName}, function(serMsg) {
            hidemaincatUpdateDeleteBtns();
            maincategoryClear();
            maincatTable();
            alertifyMsgDisplay(serMsg, 2000);
        }, "json");
    } else {
        alert('Please enter correct value..');
    }
}

function maincatDelete(maincatID) {
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

function selectmaincatdata(maincatId) {
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

function maincategoryClear() {
    $('#maincatID').val('');
    $('#maincatName').val('');
}

function maincategoryUpdate() {
    maincatID = parseInt($('#maincatID').val());
    if (maincatID !== null || maincatID !== 0) {
        maincatName = $('#maincatName').val();
        $.post("views/commenSettingView.php", {action: 'maincatUpdate', maincatID: maincatID, maincatName: maincatName}, function(updateSerMsg) {
            maincategoryClear();
            hidemaincatUpdateDeleteBtns();
//            maincatTable();
            alertifyMsgDisplay(updateSerMsg, 2000);
        }, "json");
    } else {
        alertify.error("Internal Error Occured", 1000);
    }
}

function hidemaincatUpdateDeleteBtns() {
    if (!$('#maincatActionBtn').hasClass("hidden")) {
        $('#maincatActionBtn').addClass("hidden");
    }
}


// end of main cat **************************************************************

//sub_cat_two_save***************************************************************
function subcattwoSave() {
    subcatOneComboBoxID = $('.subcatOneComboBox').val();
    voteCodeComboBoxID = $('.voteCodeComboBox').val();
    subtwocatname = $('.subtwocatname').val();
    $.post('views/commenSettingView.php', {action: 'subcattwoSave', subcatOneComboBox: subcatOneComboBoxID, voteCodeComboBox: voteCodeComboBoxID, subtwocatname: subtwocatname}, function(savecattwo) {
        hidesbtwoUpdateDeleteBtns();
        subcattwoTable($('.maincatNameComboBox').val());
        subtwoClear();
        alertifyMsgDisplay(savecattwo, 2000);
    }, "json");
}

function showsubtwocatActionBtn() {
    if ($('#subtwocatActionBtn').hasClass("hidden")) {
        $('#subtwocatActionBtn').removeClass("hidden");
    }
}

function selectsubtwocatdata(subtwocatId) {
    $.post("views/commenSettingView.php", {findsubtwocatDataByID: 'find', subtwocatId: subtwocatId}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("Internal Error Occured", 1000);
        } else {
            $.each(e, function(index, subtwocatData) {
                $('#subtwoID').val(subtwocatData.id);
                $('.maincatNameComboBox').val(subtwocatData.mainCatID);
                subcatOneComboBox(subtwocatData.mainCatID, subtwocatData.sub_one_cat_id);
                $('.voteCodeComboBox').val(subtwocatData.vote_id);
                $('.subtwocatname').val(subtwocatData.sub_two_cat_name);
            });
        }

    }, 'json');
}

function subtwoDelete(subcattwoID) {
    confirm("Delete sub category two Data", "Are you sure want to delete data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'subtwoDelete', subcattwoID: subcattwoID}, function(delMsg) {
            hidesbtwoUpdateDeleteBtns();
            subcattwoTable($('.maincatNameComboBox').val());
            alertifyMsgDisplay(delMsg, 2000);
        }, "json");
    });
}

function subtwocategoryUpdate() {
    subtwoID = ($('#subtwoID').val());
    maincatNameComboBoxID = $('.maincatNameComboBox').val();
    voteCodeComboBoxID = $('.voteCodeComboBox').val();
    subtwocatname = $('.subtwocatname').val();
    subcatOneComboBoxID = $('.subcatOneComboBox').val();
    $.post("views/commenSettingView.php", {action: 'subtwocategoryUpdate', subtwoID: subtwoID, maincatNameComboBox: maincatNameComboBoxID, voteCodeComboBox: voteCodeComboBoxID, voteCodeComboBox: voteCodeComboBoxID, subtwocatname: subtwocatname, subcatOneComboBox: subcatOneComboBoxID}, function(updatMsg) {
        hidesbtwoUpdateDeleteBtns();
        subtwoClear();
        subcattwoTable($('.maincatNameComboBox').val());
        alertifyMsgDisplay(updatMsg, 2000);

    }, "json");
}
function subtwoClear() {
    $('#subtwoID').html('');
    $('.subtwocatname').val('');
}

function hidesbtwoUpdateDeleteBtns() {
    if (!$('#subtwocatActionBtn').hasClass("hidden")) {
        $('#subtwocatActionBtn').addClass("hidden");
    }
}

//********************income payment type***********************************************************************

function paymentTypeSave() {

    subcatTwoComboBoxID = $('.subcatTwoComboBox').val();
    paymenttypeComboBoxID = $('.paymenttypeComboBox').val();
    unitprice = $('#unitprice').val();

    $.post('views/commenSettingView.php', {action: 'paymentTypeSave', subcatTwoComboBox: subcatTwoComboBoxID, paymenttypeComboBox: paymenttypeComboBoxID, unitprice: unitprice}, function(saveptype) {
        paymenttypeClear();
        incomepaymentTable($('.maincatNameComboBox').val());
        alertifyMsgDisplay(saveptype, 2000);
    }, "json");
}
function paymenttypeDelete(paymentID) {

    confirm("Delete income payment type Data", "Are you sure want to delete data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'paymenttypeDelete', paymentID: paymentID}, function(delMsg) {
            paymenttypeClear();
            incomepaymentTable($('.maincatNameComboBox').val());
            alertifyMsgDisplay(delMsg, 2000);

        }, "json");
    });
}
function showpaymenttypeActionBtn() {
    if ($('#paymenttypeActionBtn').hasClass("hidden")) {
        $('#paymenttypeActionBtn').removeClass("hidden");
    }
}
function selectpaymenttypedata(paymenttypeId) {
    $.post("views/commenSettingView.php", {paymenttypeDataByID: 'find', paymenttypeId: paymenttypeId}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("Internal Error Occured", 1000);
        } else {
            $.each(e, function(index, paytypeData) {
                $('#paymentTypeID').val(paytypeData.id);
                maincatNameComboBox(paytypeData.mainCatID);
                subcatOneComboBox(paytypeData.mainCatID, paytypeData.sub_one_cat_id);
                delayLoading(function() {
                    subcatTwoComboBox(paytypeData.subCatOneID, paytypeData.subcatTwoID);

                }, 1000)
                // $('.subcatOneComboBox').val(paytypeData.subCatOneID);
                //s  $('.subcatTwoComboBox').val(paytypeData.subcatTwoID);
                $('.paymenttypeComboBox').val(paytypeData.payment_type_id);
                $('#unitprice').val(paytypeData.unit_price);
            });
        }

    }, 'json');
}

function paymenttypeUpdate() {
    paymentTypeID = ($('#paymentTypeID').val());
    maincatNameComboBoxID = $('.maincatNameComboBox').val();
    subcatOneComboBoxID = $('.subcatOneComboBox').val();
    subcatTwoComboBoxID = $('.subcatTwoComboBox').val();
    paymenttypeComboBoxID = $('.paymenttypeComboBox').val();
    unitprice = $('#unitprice').val();
    $.post("views/commenSettingView.php", {action: 'paymenttypeUpdate', paymentTypeID: paymentTypeID, maincatNameComboBox: maincatNameComboBoxID, subcatOneComboBox: subcatOneComboBoxID, subcatTwoComboBox: subcatTwoComboBoxID, paymenttypeComboBox: paymenttypeComboBoxID, unitprice: unitprice}, function(updatMsg) {
        paymenttypeClear();
        incomepaymentTable($('.maincatNameComboBox').val());
        alertifyMsgDisplay(updatMsg, 2000);

    }, "json");
}
function paymenttypeClear() {
    $('#paymentTypeID').html('');
    $('#unitprice').val('');
}
function hidesbtwpaytypeUpdateDeleteBtns() {
    if (!$('#paymenttypeActionBtn').hasClass("hidden")) {
        $('#paymenttypeActionBtn').addClass("hidden");
    }
}
//**************************************************Item start*****************************************************




function itemSave() {
    itemName = $('#itemName').val();
    if (itemName !== null && itemName.length !== 0) {
        $.post("views/commenSettingView.php", {action: 'itemsave', itemName: itemName}, function(serMsg) {
//            maincatTable();
            alertifyMsgDisplay(serMsg, 2000);
            itemTable();
        }, "json");
    } else {
        alert('Please enter correct value..');
    }
}

function selectitemdata(itemID) {
    $.post("views/commenSettingView.php", {finditemDataByID: 'find', itemID: itemID}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alertify.error("Internal Error Occured", 1000);
        } else {
            $.each(e, function(index, itemData) {
                $('#itemID').val(itemData.id);
                $('#itemName').val(itemData.item_name);
            });
        }

    }, 'json');
}
function showitemActionBtn() {
    if ($('#itemActionBtn').hasClass("hidden")) {
        $('#itemActionBtn').removeClass("hidden");
    }

}
function itemupdate() {
    itemID = parseInt($('#itemID').val());
    if (itemID !== null || itemID !== 0) {
        itemName = $('#itemName').val();
        $.post("views/commenSettingView.php", {action: 'itemUpdate', itemID: itemID, itemName: itemName}, function(updateSerMsg) {
            itemTable();
            alertifyMsgDisplay(updateSerMsg, 2000);
        }, "json");
    } else {
        alertify.error("Internal Error Occured", 1000);
    }
}
function itemDelete(itemID) {
    confirm("Delete Item Data", "Are you sure want to delete data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'itemDelete', itemID: itemID}, function(delMsg) {
            itemTable();
            alertifyMsgDisplay(delMsg, 2000);
        }, "json");
    });
}
function hideitemUpdateDeleteBtns() {
    if (!$('#itemActionBtn').hasClass("hidden")) {
        $('#itemActionBtn').addClass("hidden");
    }
}


function showsubCategoryActionBtn() {
    if ($('#categoryActionBtn').hasClass("hidden")) {
        $('#categoryActionBtn').removeClass("hidden");
    }
}

function subcategoryClear() {
    $('.maincatNameComboBox').val('');
    $('#subcatName').val('');
}

function subcategorySave() {
    maincatName = $('.maincatNameComboBox').val();
    subcatName = $('#subcatName').val();
    $.post('views/commenSettingView.php', {action: 'subcategorySave', maincatName: maincatName, subcatName: subcatName}, function(saveCat) {
        subcategoryClear();
        subCategoryTable();
        alertifyMsgDisplay(saveCat, 2000);
    }, "json");
}

function subcatdelete(subcategoryID) {
    confirm("Delete Referance Data", "Are you sure want to delete Referance data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'subcategoryDelete', categoryID: subcategoryID}, function(delMsg) {
            subCategoryTable();
            //categoryClear();
            alertifyMsgDisplay(delMsg, 2000);
        }, "json");
    });
}

function subcategoryUpdate() {

    subcategoryID = parseInt($('#subcategoryID').val());
    maincatName = $('.maincatNameComboBox').val();
    subcatName = $('#subcatName').val();

    $.post("views/commenSettingView.php", {action: 'subcategoryUpdate', subcategoryID: subcategoryID, maincatName: maincatName, subcatName: subcatName}, function(updateDesigMsg) {
        subcategoryClear();
        subCategoryTable();
        alertifyMsgDisplay(updateDesigMsg, 2000);

    }, "json");
}

function subcategoryClear() {
    $('#subcategoryID').val('');
    $('.maincatNameComboBox').val('');
    $('#subcatName').val('');
}

function hidesubcatUpdateDeleteBtns() {
    if (!$('#categoryActionBtn').hasClass("hidden")) {
        $('#categoryActionBtn').addClass("hidden");
    }
}

function voteSave() {
    votename = $('#votename').val();
    votecode = $('#votecode').val();
    if (votename !== '' || votecode !== '') {
        $.post('views/commenSettingView.php', {action: 'voteSave', votename: votename, votecode: votecode}, function(saveCat) {
            voteClear();
            hideVoteActionBtn();
            voteTable();
            alertifyMsgDisplay(saveCat, 2000);
        }, "json");
    } else {
        alertify.error("Please Enter Values");
    }
}

function VoteDelete(Vote_id) {
    confirm("Delete Referance Data", "Are you sure want to delete Referance data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'VoteDelete', Vote_id: Vote_id}, function(delMsg) {
            voteClear();
            voteTable();
            hideVoteActionBtn();
            alertifyMsgDisplay(delMsg, 2000);
        }, "json");
    });
}

function showVoteActionBtn() {
    if ($('#voteActionBtn').hasClass('hidden')) {
        $('#voteActionBtn').removeClass('hidden');
    }
}

function hideVoteActionBtn() {
    if (!$('#voteActionBtn').hasClass('hidden')) {
        $('#voteActionBtn').addClass('hidden');
    }
}
function voteClear() {
    $('#voteID').val('');
    $('#votename').val('');
    $('#votecode').val('');
}

function voteUpdate() {
    voteID = $('#voteID').val();
    votename = $('#votename').val();
    votecode = $('#votecode').val();
    $.post("views/commenSettingView.php", {action: "voteUpdate", voteID: voteID, votename: votename, votecode: votecode}, function(e) {
        voteClear();
        voteTable();
        hideVoteActionBtn();
        alertifyMsgDisplay(e, 2000);
    }, "json")
}


function uniqueCatClear() {
    $('#voteCatName').val('');
    $('#unitprice').val('');
}
function uniqueCatSave() {
    voteCodeID = $('#voteCode').val();
    voteCatName = $('#voteCatName').val();
    paymenttypeID = $('#paymenttype').val();
    unitprice = $('#unitprice').val();
    $.post("views/commenSettingView.php", {action: "uniqueCatSave", voteCodeID: voteCodeID, voteCatName: voteCatName, paymenttypeID: paymenttypeID, unitprice: unitprice}, function(e) {
        hideUniqueCatActionBtn();
        uniqueCatClear();
        uniqueCatTable();
        alertifyMsgDisplay(e, 2000);
    }, "json");
}

function uniqueCatDelete(delID) {

    confirm("Delete Unique Category Item", "Are you Sure Want To Delete This Category Item", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: "uniqueCatDelete", delID: delID}, function(e) {
            hideUniqueCatActionBtn();
            uniqueCatTable();
            alertifyMsgDisplay(e, 2000);
        }, "json");
    });
}

function showUniqueCatActionBtn() {
    if ($('#uniqueCatActionBtn').hasClass('hidden')) {
        $('#uniqueCatActionBtn').removeClass('hidden');
    }
}
function hideUniqueCatActionBtn() {
    if (!$('#uniqueCatActionBtn').hasClass('hidden')) {
        $('#uniqueCatActionBtn').addClass('hidden');
    }
}

function getUniqueCatDetailsByID(selID) {
    $.post("views/commenSettingView.php", {action: "getUniqueCatDetailsByID", selID: selID}, function(e) {
        if (e === undefined || e === null || e.length === 0) {
            alertify.error("Internal Error Occured", 1000);
        } else {
            $.each(e, function(index, dataValues) {
                $('#uniqueCatID').val(dataValues.id);
                voteCodeComboBox(dataValues.vote_id);
                $('#voteCatName').val(dataValues.vote_category_name);
                paymenttypeComboBox(dataValues.payment_type_id);
                $('#unitprice').val(dataValues.price);
            });
        }
    }, "json");
}

function uniqueCatUpdate() {
    uniqueCatID = $('#uniqueCatID').val();
    voteCodeID = $('#voteCode').val();
    voteCatName = $('#voteCatName').val();
    paymenttypeID = $('#paymenttype').val();
    unitprice = $('#unitprice').val();
    $.post("views/commenSettingView.php", {action: "uniqueCatUpdate", voteCodeID: voteCodeID, voteCatName: voteCatName, paymenttypeID: paymenttypeID, unitprice: unitprice, uniqueCatID: uniqueCatID}, function(e) {
        hideUniqueCatActionBtn();
        uniqueCatClear();
        uniqueCatTable();
        alertifyMsgDisplay(e, 2000);
    }, "json");
}

function clear_cutomer_ditails() {
    $('.customernameID').val('');
    $('.customeradressID').val('');
    $('.nicID').val('');
    $('.mobileID').val('');
}

function customregistrationSave() {
    var postData = '';
    var Name = $('.customernameID').val();
    var date = $('#date').val();
    if (Name !== '' && date !== '') {
        adress = $('.customeradressID').val();
        nic = $('.nicID').val();
        mobile = $('.mobileID').val();
        $('#cusnamedisp').html('Name :' + Name + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + 'NIC :' + nic);
        $.post('views/commenSettingView.php', {action: 'cusdatasave', name: Name, address: adress, nic: nic, mobile: mobile}, function(saveCat) {
            $.each(saveCat, function(index, msgData) {
                if (msgData.msgType === 3) {
                    alertify.success("please Wait", 1450);
                    delayLoading(function() {
                        postData += '<input type="hidden" name="date" value ="' + date + '">';
                        postData += '<input type="hidden" name="cusID" value ="' + msgData.cusID + '">';
                        submitBulkDataByPost("billpay.php?regID=" + msgData.cusID, postData);
                    }, 1500);
                } else if (msgData.msgType === 2) {
                    alertify.error(msgData.msg, 1000);
                }
            });
//            var msgtype = saveCat.msgType;
//            var cusid = saveCat.cusID;
//            $('#customerid').val(cusid);
            // redirecttoonother(cusid, date);
//            $('#div001').show();
//            $('.div002').hide();
//            $.each(jsonArray, function(index, msgData) {
//                if (msgData.msgType === 3) {
//                    alertify.success("Saved Customer Successfully", 1500);
//                    delayLoading(function() {
//                        submitSingleDataByPost("billpay.php", "cusID", msgData.cusID);
//                         clear_cutomer_ditails();
//                    }, 1500);
//                } else if (msgData.msgType === 2) {
//                    alertify.error(msgData.msg, 1000);
//                }
//            });    
        }, "json");
    } else {
        alert("Please Insert Customer Name");
        return false;
    }

}


function savepayitem(cusID,radiovalue, callBack) {
    incomeitem = $('#incomeitem').val();
    unitprice = $('#patmentPrice').val();
    quantity = $('#quantityID').val();
    onlytax = $('#vatitemID').val();
    totalamount = $('#totalpaybleID').val();
    witoutvat = parseFloat(unitprice) * parseFloat(quantity);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeID').val();
    dateforitem = $('#itemdateID').val();
    $.post('views/commenSettingView.php', {action: 'itempaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, dateforitem: dateforitem}, function(saveietm) {
        alertifyMsgDisplay(saveietm, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }

        $('#numofitemdays').removeAttr('readonly');
        $('#numofitemdays').val('');
        $('#itemdateID').val('');
        $('#savepayitem').val('');
        $('#quantityID').val('');
        $('#vatitemID').val('');
        $('#totalpaybleID').val('');
        $('#checkboxes-0').removeAttr('checked');
        $('#quantityID').removeAttr('readonly');

    }, "json");
}
function savepaydate(cusID,radiovalue, callBack) {
//    votecatid
    incomeitem = $('#incomeitem').val();
    unitprice = $('#patmentPrice').val();
    quantity = $('#numofdateID').val();
    onlytax = $('#vatdateID').val();
    totalamount = $('#datetotalpaybledateID').val();
    witoutvat = parseFloat(unitprice).toFixed(2) * parseFloat(quantity).toFixed(2);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeID').val();
    datecorrect = $('#datecorrectID').val();
    $.post('views/commenSettingView.php', {action: 'datepaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, datecorrect: datecorrect}, function(savedate) {
        alertifyMsgDisplay(savedate, 2000);

        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }

        $('#datecorrectID').val('');
        $('#numofdateID').val('');
        $('#vatdateID').val('');
        $('#datetotalpaybledateID').val('');
        $('#checkboxes-1').removeAttr('checked');
        $('#numofdateID').removeAttr('readonly');

    }, "json");
}
function savepayhour(cusID,radiovalue, callBack) {
//    votecatid
    incomeitem = $('#incomeitem').val();
    unitprice = $('#patmentPrice').val();
    quantity = $('#timerangeID').val();
    onlytax = $('#vathourID').val();
    totalamount = $('#totalpayblehourID').val();
    witoutvat = parseFloat(unitprice) * parseFloat(quantity);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeID').val();
    datefordate = $('#datedate').val();
    $.post('views/commenSettingView.php', {action: 'hourpaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, datefordate: datefordate}, function(savedate) {
        alertifyMsgDisplay(savedate, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
        $('#datedate').val('');
        $('#timerangeID').val('');
        $('#vathourID').val('');
        $('#totalpayblehourID').val('');
        $('#checkboxes-3').removeAttr('checked');
        $('#timerangeID').removeAttr('readonly');

    }, "json");
}
function savepayother(cusID,radiovalue, callBack) {
//    votecatid
    incomeitem = $('#incomeitem').val();
    unitprice = $('#patmentPrice').val();
//   quantity = $('#timerangeID').val();  
    onlytax = isNaN($('#vatotherID').val()) || $('#vatotherID').val() === '' ? 0 : $('#vatotherID').val();

    totalamount = isNaN($('#totalpaybleotherID').val()) || $('#totalpaybleotherID').val() === '' ? 0 : $('#totalpaybleotherID').val();

    witoutvat = parseFloat(totalamount) - parseFloat(onlytax);

//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeID').val();
    otherdate = $('#otherdateID').val();
//    console.log(otherdate);
    $.post('views/commenSettingView.php', {action: 'otherpaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, paymenttypeID: paymenttypeID, otherdate: otherdate}, function(savedate) {
        alertifyMsgDisplay(savedate, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
        $('#otherdateID').val('');
        $('#vatotherID').val('');
        $('#totalpaybleotherID').val('');
        $('#checkboxes-2').removeAttr('checked');

    }, "json");
}
function savepayietmforcategory(cusID,radiovalue, callBack) {
//    votecatid

    incomeitem = $('#votecategory').val();
    unitprice = $('#paymentTypeforcatPrice').val();
    quantity = $('#quantityID').val();
    onlytax = $('#vatitemID').val();
    totalamount = $('#totalpaybleID').val();
    witoutvat = parseFloat(unitprice) * parseFloat(quantity);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeforcatID').val();
    dateforitem = $('#itemdateID').val();
    $.post('views/commenSettingView.php', {action: 'itemcaypaymentsave', cusID:cusID,incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, dateforitem: dateforitem}, function(savecatitem) {
        alertifyMsgDisplay(savecatitem, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
        $('#numofitemdays').val('');
        $('#numofitemdays').removeAttr('readonly');
        $('#itemdateID').val('');
        $('#quantityID').val('');
        $('#vatitemID').val('');
        $('#totalpaybleID').val('');
        $('#checkboxes-0').removeAttr('checked');
        $('#quantityID').removeAttr('readonly');
    }, "json");
}
function savepaydateforcategory(cusID,radiovalue, callBack) {
//    votecatid
    incomeitem = $('#votecategory').val();
    unitprice = $('#paymentTypeforcatPrice').val();
    quantity = $('#numofdateID').val();
    onlytax = $('#vatdateID').val();
    totalamount = $('#datetotalpaybledateID').val();
    witoutvat = parseFloat(unitprice) * parseFloat(quantity);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeforcatID').val();
    datecorrect = $('#datecorrectID').val();
    $.post('views/commenSettingView.php', {action: 'datecatpaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, datecorrect: datecorrect}, function(savecatitem) {
        alertifyMsgDisplay(savecatitem, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
        $('#datecorrectID').val('');
        $('#numofdateID').val('');
        $('#vatdateID').val('');
        $('#datetotalpaybledateID').val('');
        $('#checkboxes-1').removeAttr('checked');
        $('#numofdateID').removeAttr('readonly');
    }, "json");
}
function savepayhourforcategory(cusID,radiovalue, callBack) {
//    votecatid
    incomeitem = $('#votecategory').val();
    unitprice = $('#paymentTypeforcatPrice').val();
    quantity = $('#timerangeID').val();
    onlytax = $('#vathourID').val();
    totalamount = $('#totalpayblehourID').val();
    witoutvat = parseFloat(unitprice) * parseFloat(quantity);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeforcatID').val();
    datefordate = $('#datedate').val();
    $.post('views/commenSettingView.php', {action: 'hourcatpaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, quantity: quantity, paymenttypeID: paymenttypeID, datefordate: datefordate}, function(savecatitem) {
        alertifyMsgDisplay(savecatitem, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
//        $('#datepickerhour').val('');
        $('#datedate').val('');
        $('#timerangeID').val('');
        $('#vathourID').val('');
        $('#totalpayblehourID').val('');
        $('#checkboxes-3').removeAttr('checked');
        $('#timerangeID').removeAttr('readonly');
    }, "json");
}
function savepayotherforcategory(cusID,radiovalue, callBack) {

    incomeitem = $('#votecategory').val();
    unitprice = $('#paymentTypeforcatPrice').val();
//   quantity = $('#timerangeID').val();  
//    onlytax = $('#vatotherID').val();
    onlytax = isNaN($('#vatotherID').val()) || $('#vatotherID').val() === '' ? 0 : $('#vatotherID').val();
//    totalamount = $('#totalpaybleotherID').val();
    totalamount = isNaN($('#totalpaybleotherID').val()) || $('#totalpaybleotherID').val() === '' ? 0 : $('#totalpaybleotherID').val();
    witoutvat = parseFloat(totalamount) - parseFloat(onlytax);
//     paymenttype = $('#paymentType').val();
    paymenttypeID = $('#paymentTypeforcatID').val();
    otherdate = $('#otherdateID').val();
    console.log(otherdate);
    $.post('views/commenSettingView.php', {action: 'othercatpaymentsave',cusID:cusID, incomeitem: incomeitem, radiovalue: radiovalue, unitpricee: unitprice, onlytax: onlytax, totalamount: totalamount, witoutvat: witoutvat, paymenttypeID: paymenttypeID, otherdate: otherdate}, function(savecatitem) {
        alertifyMsgDisplay(savecatitem, 2000);
        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
        $('#otherdateID').val('');
        $('#vatotherID').val('');
        $('#totalpaybleotherID').val('');
        $('#checkboxes-2').removeAttr('checked');
        $('#vatotherID').removeAttr('readonly');



    }, "json");
}

//function post_custermer_id_to_bill(customerID) {
//    submitSingleDataByPost("proceed_bill_veiw.php", 'customerID', customerID);
//}

function post_custermer_id_to_bill(customerID, date) {
    customerID = $('#proceed_custormerID').val();

//    $.post("views/commenSettingView.php", {action: "customerIDSave", customerID: customerID}, function(e) {
    $.post("views/commenSettingView.php", {action: "customerIDSave", customerID: customerID, cash: cash, bankname: bankname, chequeNo: chequeNo, chequeDate: chequeDate}, function(e) {
        alertifyMsgDisplay(e, 2000);
        submitData = '<input type="hidden" name="date" id="date" value=' + date + '><input type="hidden" name="customerID" id="customerID" value=' + customerID + '>';
        submitBulkDataByPost("proceed_bill_veiw.php", submitData);
//        submitSingleDataByPost("proceed_bill_veiw.php", 'customerID', customerID);

    }, "json");
}

function issueBill(customerID, date) {

    $.post("views/commenSettingView.php", {action: "issueBill", customerID: customerID, date: date}, function(e) {
        $.each(e, function(index, msgData) {
            if (msgData.msgType === 3) {
                alertify.success("Your Bill Proccessing......Wait..", 1700);
                delayLoading(function() {
                    submitSingleDataByPost("billllllll.php?customerID=" + customerID, "billID", msgData.billID);
                }, 1700);
            } else if (msgData.msgType === 2) {
                alertify.error(msgData.msg, 1000);
            }
        });
    }, "json");
}

function redirecttoonother(dd, date) {
    minusID = $('#customerid').val();
//    window.location = "billpay.php?regID=" + dd;
    submitSingleDataByPost("billpay.php?regID=" + dd, "date", date);
}

function get_get_cus_id() {
    var cid = '';
    $.post("views/commenSettingView.php", {next_id_for_cus: "next_id_for_cus"}, function(data) {
        cid = $.trim(data);
    });
    return cid;
}

function display_cus_data(cus_id) {
    $.post("views/commenSettingView.php", {net_id_data: cus_id}, function(data) {
        if (data === undefined || data.length === 0 || data === null) {
            window.location.href = "customer_registation.php";
        } else {
            $.each(data, function(index, cusdata) {
                $('#current_cus_name').html('Customer Name &nbsp;::&nbsp;&nbsp;' + cusdata.cus_name);
                $('#current_cus_nic').html('Customer NIC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;::&nbsp;&nbsp;' + cusdata.cus_nic);
            });
        }
    }, "json");
}
function fullbillDelete(fullbillID) {

    confirm("Delete income payment type Data", "Are you sure want to delete data", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'billdetaildeleteid', fullbillID: fullbillID}, function(delfMsg) {

            alertifyMsgDisplay(delfMsg, 2000);

        }, "json");
    });
}
/************************************************************/
/*                User Maintenance                          */
/************************************************************/
function userSave() {
    userId = $('#userId').val();
    fname = $('#fname').val();
    lname = $('#lname').val();
    if ((userId !== null && userId.length !== 0)
         && (fname !== null && fname.length !== 0)) {
        $.post("views/commenSettingView.php", {action: 'userSave', userId: userId, fname: fname, lname:lname}, function(serMsg) {
            hidemaincatUpdateDeleteBtns();
            maincategoryClear();
            userTable();
            alertifyMsgDisplay(serMsg, 2000);
        }, "json");
    } else {
        alert('Please enter correct value..');
    }
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


// end of main cat **************************************************************
