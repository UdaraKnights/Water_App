function maincatTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'maincatTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('.maincatTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.main_cat_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selmaincatData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delmaincatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('.maincatTable tbody').html(tableData);

            $('.delmaincatData').click(function() {
                maincatDelete($(this).val());
            });
//Select Data through select button   
            $('.selmaincatData').click(function() {
                showmaincatActionBtn();
                selectmaincatdata($(this).val());
            });


        }
    }, "json");
}

function subcattwoTable(mainCatID) {
    var tableData;
    $.post("views/loadTables.php", {table: 'subcattwoTable', mainCatID: mainCatID}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.subcattwoTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.sub_one_category + '</td>';
                tableData += '<td>' + data.vote_code + '</td>';
                tableData += '<td>' + data.sub_two_cat_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selsubtwocatData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger subtwoID" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('.subcattwoTable tbody').html('').append(tableData);

            $('.subtwoID').click(function() {

                subtwoDelete($(this).val());
            });
//Select Data through select button   
            $('.selsubtwocatData').click(function() {
                showsubtwocatActionBtn();
                selectsubtwocatdata($(this).val());
            });


        }
    }, "json");
}

//item*************************************************************************************
function itemTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'itemTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="3"> No Data Found </td></tr>';
            $('.itemTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.item_name + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selitemData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delitemData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('.itemTable tbody').html(tableData);

            $('.delitemData').click(function() {
                itemDelete($(this).val());

            });
//Select Data through select button   
            $('.selitemData').click(function() {
                showitemActionBtn();
                selectitemdata($(this).val());
            });


        }
    }, "json");
}

//************************income payment types*********************************************************************************************
function incomepaymentTable(mainCatID) {
    var tableData;
    $.post("views/loadTables.php", {table: 'PayTypeTable', mainCatID: mainCatID}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="6"> No Data Found </td></tr>';
            $('.PayTypeTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.sub_one_category + '</td>';
                tableData += '<td>' + data.sub_two_cat_name + '</td>';
                tableData += '<td>' + data.payment_type + '</td>';
                tableData += '<td>' + data.unit_price + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selptypeData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delpaymntID" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('.PayTypeTable tbody').html(tableData);

            $('.delpaymntID').click(function() {
                paymenttypeDelete($(this).val());
            });
//Select Data through select button   
            $('.selptypeData').click(function() {
                showpaymenttypeActionBtn();
                selectpaymenttypedata($(this).val());

            });


        }
    }, "json");
}

function voteTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'voteSideTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="4"> No Data Found </td></tr>';
            $('#vote_side_table tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.vote_code + '</td>';
                tableData += '<td>' + data.vote_name + '</td>';
                tableData += '<td>' +
                        '<div class="btn-group"><button class="btn btn-primary selVoteData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button>' +
                        '<button class="btn btn-danger delVoteData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div>' +
                        '</td>';
                tableData += '</tr>';
            });
            //Load Json Data to Table
            $('#vote_side_table tbody').html(tableData);

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

function subCategoryTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'subCategoryTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="4"> No Data Found </td></tr>';
            $('.subCategoryTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.main_cat_name + '</td>';
                tableData += '<td>' + data.sub_one_category + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary selRefData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delSubOneCatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            //Load Json Data to Table
            $('.subCategoryTable tbody').html(tableData);

            ////////// DELETE  SUB ONE CAT DATA ///////////
            $('.delSubOneCatData').click(function() {
                subcatdelete($(this).val());
            });

            //Select Data through select button   
            $('.selRefData').click(function() {

                subcategoryID = $(this).val();
                showsubCategoryActionBtn();
                $.post("views/commenSettingView.php", {findsubcatID: 'find', subcategoryID: subcategoryID}, function(up) {
                    $.each(up, function(index, data) {
                        $('#subcategoryID').val(data.id);
                        maincatNameComboBox(data.main_cat_id);
                        $('#subcatName').val(data.sub_one_category);
                        chosenRefresh();
                    });

                }, "json");
            });
        }
    }, "json");
}

function uniqueCatTable() {
    var tableData;
    $.post("views/loadTables.php", {table: 'uniqueCatTable'}, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.uniqueCatTable tbody').html('').append(tableData);
        } else {
            $.each(e, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + index + '</td>';
                tableData += '<td>' + data.vote_code + '</td>';
                tableData += '<td>' + data.vote_category_name + '</td>';
                tableData += '<td>' + data.payment_type + '</td>';
                tableData += '<td>' + data.price + '</td>';
                tableData += '<td><div class="btn-group"><button class="btn btn-primary uniqueCatData" value="' + data.id + '"><i class="fa fa-plus-square fa-lg"></i>&nbsp;Select</button><button class="btn btn-danger delUniqueCatData" value="' + data.id + '"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Delete</button></div></td>';
                tableData += '</tr>';

            });
            $('.uniqueCatTable tbody').html('').append(tableData);

            $('.uniqueCatData').click(function() {
                showUniqueCatActionBtn();
                getUniqueCatDetailsByID($(this).val());
            });

            $('.delUniqueCatData').click(function() {
                uniqueCatDelete($(this).val());
            });

        }
    }, "json");
}

function payTypeSelctionBox() {
    incomeID = $('.incomeitemComboBox').val();


    $.post("views/loadTables.php", {table: 'paytype', incomeID: incomeID}, function(e) {

        $.each(e, function(index, data) {

            $('.paymenttypeComboBox').val(data.payment_type);
            $('.paymentTypeID').val(data.paymenttypeautoID);

            getpaytypevalues($('.paymenttypeComboBox').val());
        });
    }, "json");
}
//**********************

function priceSelctionBox() {
    if ($('#uniquecategoryID').is(':checked')) {
        priceID = $('.incomeitemComboBox').val();
        $.post("views/loadTables.php", {table: 'pricesID', priceID: priceID}, function(e) {
            $.each(e, function(index, data) {
                $('.pricecatID').val(data.price);
                $('#display').val(data.price);


            });
        }, "json");
    }

}

function paymentTypedataviewClear() {
    $('.paymentTypeforcatComboBox').val('');
    $('.paymentTypeforcatPricepriceID').val('');
}
function paymentTypedataview(paymenttypeID, callBack) {
    $.post("views/loadTables.php", {table: 'paymenttypedataID', paymenttypeID: paymenttypeID}, function(e) {
        paymentTypedataviewClear();
        hideByOther();
        hideByItem();
        hideByDate();
        hideByHour();
        if (e === undefined || e.lenght === 0 || e === null) {

            ;

        } else {
            $.each(e, function(index, data) {
                $('.paymentTypeforcatComboBox').val(data.payment_type);
                $('.paymentTypeforcatPricepriceID').val(data.unit_price);
                $('.paymentTypeforcatID').val(data.paytypeforcat);
                getpaytypevaluesforcat($('.paymentTypeforcatComboBox').val());

            });
        }
        if (callBack === undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}


function showByItem() {
    if ($('#byItemID').hasClass('hidden')) {
        $('#byItemID').removeClass('hidden');
    }
}
function hideByItem() {
    if (!$('#byItemID').hasClass('hidden')) {
        $('#byItemID').addClass('hidden');
    }
}
function showByDate() {
    if ($('#byDateID').hasClass('hidden')) {
        $('#byDateID').removeClass('hidden');
    }
}
function hideByDate() {
    if (!$('#byDateID').hasClass('hidden')) {
        $('#byDateID').addClass('hidden');
    }
}
function showByHour() {
    if ($('#byhourID').hasClass('hidden')) {
        $('#byhourID').removeClass('hidden');
    }
}
function hideByHour() {
    if (!$('#byhourID').hasClass('hidden')) {
        $('#byhourID').addClass('hidden');
    }
}
function showByOthrer() {
    if ($('#byotherID').hasClass('hidden')) {
        $('#byotherID').removeClass('hidden');
    }
}
function hideByOther() {
    if (!$('#byotherID').hasClass('hidden')) {
        $('#byotherID').addClass('hidden');
    }
}


function paymentFormChanging(paytype) {
    if (paytype === 'By Item') {
        showByItem();
        hideByDate();
        hideByHour();
        hideByOther();
    }
    else if (paytype === 'By Date') {
        showByDate();
        hideByHour();
        hideByOther();
        hideByItem();
    }
    else if (paytype === 'By Hour') {
        showByHour();
        hideByOther();
        hideByItem();
        hideByDate();
    }
    else if (paytype === 'By Other') {
        showByOthrer();
        hideByItem();
        hideByDate();
        hideByHour();
    } else {
        hideByOther();
        hideByItem();
        hideByDate();
        hideByHour();
    }
}
function getpaytypevalues() {
    paytype = $('.paymenttypeComboBox').val();

    if (paytype === 'By Item') {
        showByItem();
        hideByDate();
        hideByHour();
        hideByOther();
    }
    else if (paytype === 'By Date') {
        showByDate();
        hideByHour();
        hideByOther();
        hideByItem();
    }
    else if (paytype === 'By Hour') {
        showByHour();
        hideByOther();
        hideByItem();
        hideByDate();
    }
    else if (paytype === 'By Other') {
        showByOthrer();
        hideByItem();
        hideByDate();
        hideByHour();
    }
    else if (paytype === "") {
        hideByOther();
        hideByItem();
        hideByDate();
        hideByHour();
    }
}
function getpaytypevaluesforcat() {
    paytype = $('.paymentTypeforcatComboBox').val();

    if (paytype === 'By Item') {
        showByItem();
        hideByDate();
        hideByHour();
        hideByOther();
    }
    else if (paytype === 'By Date') {
        showByDate();
        hideByHour();
        hideByOther();
        hideByItem();
    }
    else if (paytype === 'By Hour') {
        showByHour();
        hideByOther();
        hideByItem();
        hideByDate();
    }
    else if (paytype === 'By Other') {
        showByOthrer();
        hideByItem();
        hideByDate();
        hideByHour();
    }
    else if (paytype === "") {
        hideByOther();
        hideByItem();
        hideByDate();
        hideByHour();
    }
}
//item tax value*****************************************

function calculatingtotpaybledata() {
    price = $('.pricecatID').val();
    pricecategory = $('.paymentTypeforcatPricepriceID').val();
    qun = $('.quantityID').val();
    if ($('#uniquecategoryID').is(':checked')) {
        subtot = price * qun;
        $('.totalpaybleID').val(subtot);
        $('#itemquantity').val(qun);
    } else {
        subtot = pricecategory * qun;
        $('.totalpaybleID').val(subtot);

//        savepayitem(subtot);
    }
}

function calculatingdatedata() {
    price = $('.pricecatID').val();
    pricecategory = $('.paymentTypeforcatPricepriceID').val();
    qundate = $('.numofdateID').val();
    if ($('#uniquecategoryID').is(':checked')) {
        subtot = price * qundate;
        $('.datetotalpaybledateID').val(subtot);
    } else {
        subtot = pricecategory * qundate;
        $('.datetotalpaybledateID').val(subtot);
    }
}
function calculatinghourdata() {
    price = $('.pricecatID').val();
    pricecategory = $('.paymentTypeforcatPricepriceID').val();
    quntime = $('.timerangeID').val();
    if ($('#uniquecategoryID').is(':checked')) {
        subtot = price * quntime;
        $('.totalpayblehourID').val(subtot);
        $('#timeq').val(quntime);
        $('#timetotal').val(subtot);
    } else {
        subtot = pricecategory * quntime;
        $('.totalpayblehourID').val(subtot);
        $('#timeq').val(quntime);
        $('#timetotal').val(subtot);
    }
}

function vatincludefortick() {
    currenttax = parseFloat($('.totalpaybleID').val());
    if (currenttax === '' || currenttax === null || currenttax.length === 0 || currenttax === undefined) {
        $('.totalpaybleID').val("please enter quantity");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = parseFloat(data);
            newprice = (checkedvat * currenttax) / 100;
            lastprice = parseFloat(currenttax) + parseFloat(newprice);
            $('.totalpaybleID').val(Number(lastprice).toFixed(2));
            $('#vatitemID').val(Number(newprice).toFixed(2));
//            $('#timevat').val(newprice);
        });
    }
}

function removetickboxvalue() {
    current_value = parseFloat($('.totalpaybleID').val());
    Vat = parseFloat($('#vatitemID').val());
    reduceVat = current_value - Vat;
    $('.totalpaybleID').val(reduceVat.toFixed(2));
    $('#vatitemID').val('');

//    if (current_value === '' || current_value === null || current_value.length === 0 || current_value === undefined) {
//        $('.totalpaybleID').val("please enter quantity");
//    } else {
//        
//        $.post("views/loadTables.php", {table: 'checkedforitem'},
//        function(data) {
//            checkedvat = parseFloat(data);
//            newprice = (checkedvat * current_value) / 100;
//            lastprice = parseFloat(current_value) - parseFloat(newprice);
//            $('.totalpaybleID').val(lastprice);
//            $('#vatitemID').val('');
//        });
//    }
}

function getdaterange() {
    datte01 = $('#datepickerfrom').val();
    datte02 = $('#datepickerto').val();
    dateprice = $('.pricecatID').val();
    pricecategory = $('.paymentTypeforcatPricepriceID').val();
    $.post("views/loadTables.php", {table: 'getdaterange', datte01: datte01, datte02: datte02},
    function(data) {
        $('.numofdateID').val(data);

        if ($('#uniquecategoryID').is(':checked')) {
            datetotal = (parseFloat(data)) * (parseFloat(dateprice));
            finaldatetot = parseFloat(datetotal);
            $('.datetotalpaybledateID').val(finaldatetot);

        } else {
            datetotal = (parseFloat(data)) * (parseFloat(pricecategory));
            finaldatetot = parseFloat(datetotal);
            $('.datetotalpaybledateID').val(finaldatetot);
        }




    });

}
//***************************************************************date***
function datevatincludefortick() {
    currenttax = $('.datetotalpaybledateID').val();
    if (currenttax === '') {
        $('.datetotalpaybledateID').val("please select date");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(currenttax) + parseFloat(newprice);
            $('.datetotalpaybledateID').val(lastprice.toFixed(2));
            $('#vatdateID').val(newprice.toFixed(2));

        });
    }
}
function dateremovetickboxvalue() {
    current_value = $('.datetotalpaybledateID').val();
    if (currenttax === '') {
        $('.datetotalpaybledateID').val("please select date");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(current_value) - parseFloat(newprice);
            $('.datetotalpaybledateID').val(lastprice.toFixed(2));
            $('#vatdateID').val('');
        });
    }
}



//*****************other*************************************************
function othervatincludefortick() {
    currenttax = $('.totalpaybleotherID').val();
    if (currenttax === '') {
        $('.totalpaybleotherID').val("please select related value");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(currenttax) + parseFloat(newprice);
            $('.totalpaybleotherID').val(lastprice.toFixed(2));
            $('#vatotherID').val(newprice.toFixed(2));
        });
    }
}


function otherremovetickboxvalue() {
    current_value = $('.totalpaybleotherID').val();
    if (currenttax === '') {
        $('.totalpaybleotherID').val("please related value");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(current_value) - parseFloat(newprice);
            $('.totalpaybleotherID').val(lastprice.toFixed(2));
            $('#vatotherID').val('');
        });
    }
}


//******************************************************hour*hour**hour*hour*hour*hour********************************************************
function hourvatincludefortick() {
    currenttax = $('.totalpayblehourID').val();
    if (currenttax === '') {
        $('.totalpayblehourID').val("please select related value");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(currenttax) + parseFloat(newprice);
            $('.totalpayblehourID').val(lastprice);
            $('#vathourID').val(newprice.toFixed(2));
            $('#timevat').val(newprice.toFixed(2));
            $('#timetotal').val(lastprice.toFixed(2));
        });
    }
}


function hourremovetickboxvalue() {
    current_value = $('.totalpayblehourID').val();
    if (currenttax === '') {
        $('.totalpayblehourID').val("please related value");
    } else {
        $.post("views/loadTables.php", {table: 'checkedforitem'},
        function(data) {
            checkedvat = data;
            newprice = ((checkedvat) / 100) * currenttax;
            lastprice = parseFloat(current_value) - parseFloat(newprice);
            $('.totalpayblehourID').val(lastprice.toFixed(2));
            $('#vathourID').val('');
            $('#timevat').val('');
            $('#timetotal').val(lastprice.toFixed(2));
        });
    }
}
//********************************************************************************************************************

//function getdaterange() {
//datte01 = $('#datepickerfrom').val();
//        datte02 = $('#datepickerto').val();
//        dateprice = $('.pricecatID').val();
//        pricecategory = $('.paymentTypeforcatPricepriceID').val();
//        $.post("views/loadTables.php", {table: 'getdaterange', datte01: datte01, datte02: datte02},
//                function(data) {
//                $('.numofdateID').val(data);
//                        if ($('#uniquecategoryID').is(':checked')) {
//                datetotal = (parseFloat(data)) * (parseFloat(dateprice));
//                        finaldatetot = parseFloat(datetotal);
//                        $('.datetotalpaybledateID').val(finaldatetot);
//                } else {
//                datetotal = (parseFloat(data)) * (parseFloat(pricecategory));
//                        finaldatetot = parseFloat(datetotal);
//                        $('.datetotalpaybledateID').val(finaldatetot);
//                }

function gettimerange() {
    time01 = $('#timepicker1').val();
    time02 = $('#timepicker2').val();
    date1 = $('#datepickerhour').val();
    day01 = date1 + ' ' + time01;
    day02 = date1 + ' ' + time02;
    pricetime = $('.pricecatID').val();
    pricecategory = $('.paymentTypeforcatPricepriceID').val();
    if ($('#uniquecategoryID').is(':checked')) {
        timerange = (new Date(day02) - new Date(day01)) / 1000 / 60 / 60;
        timetotal = parseFloat(pricetime) * parseFloat(timerange);
    } else {
        timerange = (new Date(day02) - new Date(day01)) / 1000 / 60 / 60;
        timetotal = parseFloat(pricecategory) * parseFloat(timerange);
    }



    $('.totalpayblehourID').val(timetotal);
    $('.timerangeID').val(timerange);
    if (date1 === '') {
        $('.timerangeID').val("please select booking date");
        $('.totalpayblehourID').val("please select booking date");
    } else {

    }

//    pricecatID
//    timerangeID
//    totalpayblehourID

//        $.post("views/loadTables.php", {table: 'gettimerange',time01:time01, time02:time02, date1:date1 },
// function(data) {
//    $('.timerangeID').val(data); 
// });


}
////////////// sampath /////////////////////////////
function billingDetailsTable(customerID) {
    var tableData = '';//    
    $.post("views/loadTables.php", {table: 'billingDetailsCategoryItemsTable', customerID: customerID}, function(e1) {
        $.post("views/loadTables.php", {table: 'billingDetailsNonCategoryItemsTable', customerID: customerID}, function(e) {
            if (e1 === undefined || e1.length === 0 || e1 === null) {
                if (e === undefined || e.length === 0 || e === null) {
                    $('.BillingDetailsTable tbody').html('----- No Data Found -----');
                } else {
                    $.each(e, function(index, data) {
                        tableData += '<tr>';
                        // tableData += '<td>' + index + '</td>';
                        // tableData += '<td>' + data.vote_name + '</td>';
                        tableData += '<td>' + data.vote_category_name + '</td>';
                        tableData += '<td>' + data.payment_type + '</td>';
                        tableData += '<td>' + data.unit_price + '</td>';
                        tableData += '<td>' + data.item_qty + '</td>';
                        tableData += '<td>' + data.vat_amount + '</td>';
                        tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                        tableData += '<td><button class="btn btn-danger BillDataDelete_BTN" value="' + data.id + '">Remove</button></td>';
                        tableData += '</tr>';
                    });
                    $('#BillingDetailsTable tbody').html('').append(tableData);
                    $('.BillDataDelete_BTN').click(function() {
                        delete_billed_details($(this).val(), customerID);
                    });
                }
            } else {
                if (e === undefined || e.length === 0 || e === null) {
                    $.each(e1, function(index, data) {
                        tableData += '<tr>';
                        tableData += '<td>' + data.sub_two_cat_name + '</td>';
                        tableData += '<td>' + data.payment_type + '</td>';
                        tableData += '<td>' + data.unit_price + '</td>';
                        tableData += '<td>' + data.item_qty + '</td>';
                        tableData += '<td>' + data.vat_amount + '</td>';
                        tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                        tableData += '<td><button class="btn btn-danger BillDataDelete_BTN" value="' + data.id + '">Remove</button></td>';
                        tableData += '</tr>';
                    });
                    $('.BillingDetailsTable tbody').html('').append(tableData);
                    $('.BillDataDelete_BTN').click(function() {
                        delete_billed_details($(this).val(), customerID);

                    });
                } else {
                    $.each(e1, function(index, data) {
                        tableData += '<tr>';
                        tableData += '<td>' + data.sub_two_cat_name + '</td>';
                        tableData += '<td>' + data.payment_type + '</td>';
                        tableData += '<td>' + data.unit_price + '</td>';
                        tableData += '<td>' + data.item_qty + '</td>';
                        tableData += '<td>' + data.vat_amount + '</td>';
                        tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                        tableData += '<td><button class="btn btn-danger BillDataDelete_BTN" value="' + data.id + '">Remove</button></td>';
                        tableData += '</tr>';
                    });
                    $.each(e, function(index, data) {
                        tableData += '<tr>';
                        // tableData += '<td>' + index + '</td>';
                        // tableData += '<td>' + data.vote_name + '</td>';
                        tableData += '<td>' + data.vote_category_name + '</td>';
                        tableData += '<td>' + data.payment_type + '</td>';
                        tableData += '<td>' + data.unit_price + '</td>';
                        tableData += '<td>' + data.item_qty + '</td>';
                        tableData += '<td>' + data.vat_amount + '</td>';
                        tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                        tableData += '<td><button class="btn btn-danger BillDataDelete_BTN" value="' + data.id + '">Remove</button></td>';
                        tableData += '</tr>';
                    });
                    $('#BillingDetailsTable tbody').html('').append(tableData);
                    $('.BillDataDelete_BTN').click(function() {
                        delete_billed_details($(this).val(), customerID);
                    });
                }
            }



        }, "json");
    }, "json");



}
//bill data veiw*****************************************************************************************

function billdataveiwTable(customerID) {
    var tableData;
    var vatTotal = 0;
    var totalPayable = 0;
    var tfoot;
    var totalArray = [];

    $.post("views/loadTables.php", {table: 'getCustomerDetails', customerID: customerID}, function(e) {
        $.each(e, function(index, queryData) {
            $('#cusName').html('').append(queryData.cus_name);
            $('#cusadress').html('').append(queryData.cus_address);
        });
    }, "json");

    $.post("views/loadTables.php", {table: 'billingDetailsCategoryItemsTable', customerID: customerID}, function(ec) {
        if (ec === undefined || ec.length === 0 || ec === null) {

        } else {
            $.each(ec, function(index, data) {
                tableData += '<tr>';
                tableData += '<td>' + data.sub_two_cat_name + ' ' + data.unit_price + ' * ' + data.item_qty + ' ( VAT exclude - ' + data.vat_amount + ')</td>';
                vatTotal += parseFloat(data.vat_amount);
                totalPayable += parseFloat(data.total_payable_amount_with_vat)
                tableData += '<td>' + data.total_payable_amount_without_vat + '</td>';
                tableData += '<td>' + data.vote_code + '</td>';
                tableData += '</tr>';
            });
            totalArray.push(totalPayable);
            $('#BillingDetailsTable tbody').html('').append(tableData);
        }

        $.post("views/loadTables.php", {table: 'billingDetailsNonCategoryItemsTable', customerID: customerID}, function(e) {
            if (e === undefined || e.length === 0 || e === null) {

            } else {
                $.each(e, function(index, data) {
                    tableData += '<tr>';
                    tableData += '<td>' + data.vote_category_name + ' ' + data.unit_price + ' * ' + data.item_qty + ' ( VAT exclude - ' + data.vat_amount + ' ) </td>';
                    tableData += '<td>' + data.total_payable_amount_without_vat + '</td>';
                    tableData += '<td>' + data.vote_code + '</td>';
                    tableData += '</tr>';
                    vatTotal += parseFloat(data.vat_amount);

                    totalPayable += parseFloat(data.total_payable_amount_with_vat);
                });
                totalArray.push(totalPayable);
                $('#BillingDetailsTable tbody').html('').append(tableData);
            }
            tfoot += '<tr>';
            tfoot += '<td>Total VAT</td>';
            tfoot += '<td>' + Number(vatTotal).toFixed(2) + '</td>';
            tfoot += '<td>VAT</td>';
            tfoot += '</tr>';
            tfoot += '<tr>';
            tfoot += '<td>Total Payable Amount</td>';
            tfoot += '<td>' + Number(totalPayable).toFixed(2) + '</td>';
            tfoot += '</tr>';
            $('#BillingDetailsTable tfoot').html('').append(tfoot);

        }, "json");



    }, "json");




}

function checkbilldata() {
    slipbillID = $('#billID').val();
    $.post("views/loadTables.php", {table: 'slipbillID', slipbillID: slipbillID}, function(esc) {

        if (esc == 0) {

            alertify.confirm("Sorry, Entered Bill ID is Not Valid", function(e) {
                if (e) {
                    alertify.alert("Please Enter Valid ID", function(d) {
                        if (d) {
                            timelyRedirect("billviewfoID.php", 0);
                        }
                    });
                }
            });
//            alert('NO DATA FIND FOR CURRENT BILL ID');
        } else {
            $('#billhideID').show();
            billPrintDataQuery(slipbillID);
        }
    });

}
//finalbil**************************************************************************************************
function billPrintDataQuery(billID) {
    var bookdate = '';
    var tableData;
    var vatTotal = 0;
    var totalPayable = 0;
    var tfoot;
    $.post("views/loadTables.php", {table: 'getCustomerDetailsforbill', billID: billID}, function(e) {
        $.each(e, function(index, queryData) {
            $('#custormer_name').html(queryData.cus_name);
            $('#customer_address').html(queryData.cus_address);
            $('#fullbillid').val(queryData.id);
        });



        $.post("views/loadTables.php", {table: 'cusbilldetail', billID: billID}, function(e) {
            $.each(e, function(index, queryData) {
                $('#bill_date').html(queryData.bill_date);
                $('#bill_id').html(queryData.bill_id);
            });
        }, "json");
        $.post("views/loadTables.php", {table: 'billingDetailsCategoryItemsTableforbill', billID: billID}, function(ec) {
            $('#bill_infomationTable tbody').html('');
            if (ec === undefined || ec.length === 0 || ec === null) {

            } else {
                $.each(ec, function(index, data) {
                    tableData += '<tr>';
                    tableData += '<td style="overflow-wrap: break-word; text-align: left">' + data.sub_two_cat_name + ' ' + data.unit_price + ' * ' + data.item_qty + ' </td>';
                    vatTotal += parseFloat(data.vat_amount);
                    totalPayable += parseFloat(data.total_payable_amount_with_vat);
                    tableData += '<td style="overflow-wrap: break-word; text-align: right; padding-right: 0.7cm">' + data.total_payable_amount_without_vat + '</td>';
                    //'<br>  VAT - ' + data.vat_amount + '
                    tableData += '<td style="overflow-wrap: break-word; text-align: right">' + data.vote_code + '</td>';
                    tableData += '</tr>';
                    $('#garnd_total').html(Number(totalPayable).toFixed(2));
                    //$('#bookdate').html(data.date_of_booking);
                    bookdate += data.date_of_booking;

                });

//                $('#bill_infomationTable tbody').append(tableData);
            }

            $.post("views/loadTables.php", {table: 'billingDetailsNonCategoryItemsTableforbill', billID: billID}, function(e) {
                if (e === undefined || e.length === 0 || e === null) {

                } else {
                    $.each(e, function(index, data) {

                        vatTotal += parseFloat(data.vat_amount);
                        totalPayable += parseFloat(data.total_payable_amount_with_vat);
//                grand_total = Number(totalPayable).toFixed(2);
                        $('#garnd_total').html(Number(totalPayable).toFixed(2));
                        // $('#bookdate').html(data.date_of_booking);
                        bookdate += data.date_of_booking;
                        tableData += '<tr>';
                        tableData += '<td style="overflow-wrap: break-word; text-align: left">' + data.vote_category_name + ' ' + data.unit_price + ' * ' + data.item_qty + '  </td>';
                        tableData += '<td style="overflow-wrap: break-word; text-align: right; padding-right: 0.7cm">' + data.total_payable_amount_without_vat + ' </td>';
                        //<br> VAT - ' + data.vat_amount + '
                        tableData += '<td style="overflow-wrap: break-word; text-align: right">' + data.vote_code + '</td>';
                        tableData += '</tr>';
                    });


                }
                tableData += '<tr>';
                tableData += '<td style="overflow-wrap: break-word; text-align: left;">Total VAT</td>';
                tableData += '<td style="overflow-wrap: break-word; text-align: right; padding-right: 0.7cm;">' + Number(vatTotal).toFixed(2) + '</td>';
                tableData += '<td style="overflow-wrap: break-word; text-align: right;">VAT</td>';
                tableData += '</tr>';
                tableData += '<tr><td style="max-width: 5cm; overflow-wrap: break-word; text-align: left;padding-top: 40px;"> &nbsp;' + bookdate + '</td><td style="overflow-wrap: break-word; text-align: right; padding-right: 0.7cm"></td><td style="overflow-wrap: break-word; text-align: right"></td></tr>';

                $('#bill_infomationTable tbody').append(tableData);
            }, "json");

        }, "json");
        /*OLD PLACE*/
    }, "json");
}
//finalbil**************************************************************************************************
//bill data veiw*****************************************************************************************



function delete_billed_details(deleteID, customerID) {
    confirm("Remove Payment", "Are you sure want to Delete Payments", "No", "Yes", function() {
        $.post("views/commenSettingView.php", {action: 'billing_details_delete_data', deleteID: deleteID}, function(dlt_msg) {
            billingDetailsTable(customerID);
            alertifyMsgDisplay(dlt_msg, 2000);
        }, "json");
    })
}
////////////// viraj /////////////////////////////
function generateReport(from_date, to_date) {

    var tableData;
    var vatTotal = 0;
    var totalPayable = 0;

    var num;
    $.post("views/loadTables.php", {table: 'generateReport_1', from_date: from_date, to_date: to_date}, function(ec) {
        if (ec === undefined || ec.length === 0 || ec === null) {

        } else {
            $.each(ec, function(index, data) {
                numa = index + 1;
                tableData += '<tr>';
                tableData += '<td>' + numa + '</td>';
                tableData += '<td>' + data.bill_id + '</td>';
                tableData += '<td>' + data.bill_date + '</td>';
//                tableData += '<td>' + data.cus_name + '</td>';
                tableData += '<td>' + data.vote_code + '<br>Vat' + data.vat_amount + '</td>';

                tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                tableData += '</tr>';
                num = numa;
            });
            $('#reportTable tbody').html('').append(tableData);
        }
    }, "json");

    $.post("views/loadTables.php", {table: 'generateReport_2', from_date: from_date, to_date: to_date}, function(e) {
        var all = num + 1;
        if (e === undefined || e.length === 0 || e === null) {

        } else {
            $.each(e, function(index, data) {

//                vatTotal += parseFloat(data.vat_amount);
//                totalPayable += parseFloat(data.total_payable_amount_with_vat);
//                grand_total = Number(totalPayable).toFixed(2);
//                $('#garnd_total').html(Number(totalPayable).toFixed(2));
                tableData += '<tr>';
                tableData += '<td>' + all + '</td>';
                tableData += '<td>' + data.bill_id + '</td>';
                tableData += '<td>' + data.bill_date + '</td>';
//                tableData += '<td>' + data.cus_name + '</td>';
                tableData += '<td>' + data.vote_code + '<br>Vat' + data.vat_amount + '</td>';

                tableData += '<td>' + data.total_payable_amount_with_vat + '</td>';
                tableData += '</tr>';
                all++;
            });
//            tableData += '<tr>';
//            tableData += '<td style="overflow-wrap: break-word; text-align: left;">Total VAT</td>';
//            tableData += '<td style="overflow-wrap: break-word; text-align: right; padding-right: 0.7cm;">' + Number(vatTotal).toFixed(2) + '</td>';
//            tableData += '<td style="overflow-wrap: break-word; text-align: right;">VAT</td>';
//            tableData += '</tr>';
            $('#reportTable tbody').html('').append(tableData);
//            $('#reportTable tbody').html('').append(tableData);
        }
    }, "json");
}

function genreportfordailysecu() {
    var tableData;
    var num;
    $.post("views/loadTables.php", {table: 'dailysecreport', incomevotenvotecat: incomevotenvotecat, from_date: from_date, to_date: to_date, categorytickboxid: categorytickboxid, user: user}, function(ds) {
        if (ds === undefined || ds.length === 0 || ds === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.dailyreportforsectable tbody').html('').append(tableData);
        } else {
            $.each(ds, function(index, data) {
                num = index + 1;
                tableData += '<tr>';
                tableData += '<td>' + num + '</td>';
                tableData += '<td>' + data.cus_name + '</td>';
                //************************
                if (data.cus_address === null || data.cus_address === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.cus_address + '</td>';
                }
                //************************

                if (data.date_of_booking === null || data.date_of_booking === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.date_of_booking + '</td>';
                }

                tableData += '</tr>';
                num++;
            });
            $('.dailyreportforsectable tbody').html('').append(tableData);

        }
    }, "json");
}

function reportforcategoryitems(incomevotenvotecat, from_date, to_date, maincatid, user) {
    var tableData;
    var num;
    $.post("views/loadTables.php", {table: 'reportforcat', incomevotenvotecat: incomevotenvotecat, from_date: from_date, to_date: to_date, maincatid: maincatid, user: user}, function(ds) {
        if (ds === undefined || ds.length === 0 || ds === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.dailyreportforcategory tbody').html('').append(tableData);
        } else {
            $.each(ds, function(index, data) {
                num = index + 1;
                tableData += '<tr>';
                tableData += '<td>' + num + '</td>';
                tableData += '<td>' + data.cus_name + '</td>';
                //************************
                if (data.cus_address === null || data.cus_address === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.cus_address + '</td>';
                }
                //************************

                if (data.date_of_booking === null || data.date_of_booking === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.date_of_booking + '</td>';
                }

                tableData += '</tr>';
                num++;
            });
            $('.dailyreportforcategory tbody').html('').append(tableData);

        }
    }, "json");
}
//**********************************************************************************************************************************
function reportformaincategory(selectboxid, from_date, to_date, maincategoryid, user) {
    var tableData;
    var num;
    $.post("views/loadTables.php", {table: 'maincategory', selectboxid: selectboxid, from_date: from_date, to_date: to_date, maincategoryid: maincategoryid, user: user}, function(ds) {
        if (ds === undefined || ds.length === 0 || ds === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.dailyreportforsectable tbody').html('').append(tableData);
        } else {
            $.each(ds, function(index, data) {
                num = index + 1;
                tableData += '<tr>';
                tableData += '<td>' + num + '</td>';
                tableData += '<td>' + data.cus_name + '</td>';
                //************************
                if (data.cus_address === null || data.cus_address === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.cus_address + '</td>';
                }
                //************************

                if (data.date_of_booking === null || data.date_of_booking === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.date_of_booking + '</td>';
                }

                tableData += '</tr>';
                num++;
            });
            $('.dailyreportforsectable tbody').html('').append(tableData);

        }
    }, "json");
}



//**********************************************************************************************************************************
//subcat*****************************************************************************************************************************
function reportforsubcategory(selectboxid, from_date, to_date, subcategoryid, user) {
    var tableData;
    var num;
    $.post("views/loadTables.php", {table: 'subcategory', selectboxid: selectboxid, from_date: from_date, to_date: to_date, subcategoryid: subcategoryid, user: user}, function(ds) {
        if (ds === undefined || ds.length === 0 || ds === null) {
            tableData += '<tr class="error text-centered"><td colspan="5"> No Data Found </td></tr>';
            $('.dailyreportforsectable tbody').html('').append(tableData);
        } else {
            $.each(ds, function(index, data) {
                num = index + 1;
                tableData += '<tr>';
                tableData += '<td>' + num + '</td>';
                tableData += '<td>' + data.cus_name + '</td>';
                //************************
                if (data.cus_address === null || data.cus_address === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.cus_address + '</td>';
                }
                //************************

                if (data.date_of_booking === null || data.date_of_booking === "") {
                    tableData += '<td>-----</td>';
                } else
                {
                    tableData += '<td>' + data.date_of_booking + '</td>';
                }

                tableData += '</tr>';
                num++;
            });
            $('.dailyreportforsectable tbody').html('').append(tableData);

        }
    }, "json");
}
//subcat*****************************************************************************************************************************


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


function dailygenaratereport() {
    $.post("views/dailyreport.php", {from_date: from_date, to_date: to_date, user: user}, function(ds) {
//        , user: user
        $('#reportdaiilytableload').html(ds);
    });
}
function monthlygenaratereport() {
    $.post("views/monthlyreport.php", {from_date: from_date, to_date: to_date, user: user}, function(ds) {
//        , user: user
        $('#reportmonthlytableload').html(ds);
    });
}
function getbilliddataforbillreport() {
    $.post("views/dailyreport.php", {from_date: from_date, to_date: to_date}, function(ds) {
        $('#reportdaiilytableload').html(ds);
    });
}