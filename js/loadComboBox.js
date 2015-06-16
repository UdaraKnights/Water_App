function gsDivisionComboBox(agaDivId, selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'gsDivisionComboBox', agaDivId: agaDivId}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.gsDivisionComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.gsDivisionComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function nationalityComboBox(selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'nationalityComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.nationalityComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.nationalityComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}


function civilStatComboBox(selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'civilStatComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.civilStatComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.civilStatComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function regionalComboBox(provinceId,selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'regionalComboBox',provinceId: provinceId}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.regionalComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.regionalComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function spuCatComboBox(selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'spuCatComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.spuCatComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.spuCatComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function spuSubCatComboBox(selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'spuSubCatComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.spuSubCatComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
//            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.description + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.description + '</option>';
                    }
                });
            }
            $('.spuSubCatComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}


function userComboBox(selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'userComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.userComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.user_id + '">' + value.user_name + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.user_id + '" selected>' + value.user_name + '</option>';
                    } else {
                        optionData += '<option value="' + value.user_id + '">' + value.user_name + '</option>';
                    }
                });
            }
            $('.userComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function gradeComboBox(categoryId,selectedValue, callBack) {
    var optionData;

    $.post("views/loadComboBox.php", {comboBox: 'gradeComboBox',categoryId:categoryId}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.gradeComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.grade_name + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.grade_name + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.grade_name + '</option>';
                    }
                });
            }
            $('.gradeComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}


function designationComboBox(categoryId,selectedValue, callBack) {
    var optionData;
//    alert(categoryId)
    $.post("views/loadComboBox.php", {comboBox: 'designationComboBox',categoryId: categoryId}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            optionData += '<option value="0"> -- No Data Found -- </option>';
            $('.designationComboBox').html('').append(optionData);
            chosenRefresh();
        } else {
            optionData += '<option value="0"> -- Select -- </option>';
            if (selectedValue === undefined || selectedValue === null) {
                $.each(e, function(index, value) {
                    optionData += '<option value="' + value.id + '">' + value.designation + '</option>';
                });
            } else {
                $.each(e, function(index, value) {
                    if (selectedValue === value.id) {
                        optionData += '<option value="' + value.id + '" selected>' + value.designation + '</option>';
                    } else {
                        optionData += '<option value="' + value.id + '">' + value.designation + '</option>';
                    }
                });
            }
            $('.designationComboBox').html('').append(optionData);
            chosenRefresh();
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}




/* New App  */

function mainRoadSelectBox(selectedValue, callBack) {
    var optionData = new Array();

    $.post("views/loadComboBox.php", {comboBox: 'mainRoadComboBox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            alert('no data');
        } else {
            $.each(e, function(index, value) {                
                    optionData += '<option value="' + value.id + '" selected>' + value.road_name + '</option>';               
            });
            $('#mainRoadCombobox').html('').append(optionData);
        }
    }, "json");

}

function subRoadSelectBox(mainRoadID,selectedValue, callBack) {
    var optionData = new Array();

    $.post("views/loadComboBox.php", {comboBox: 'subRoadCombobox', mainroadID:mainRoadID}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            alert('no data');
        } else {
            $.each(e, function(index, value) {                
                    optionData += '<option value="' + value.id + '" selected>' + value.sub_road + '</option>';               
            });
            $('#subRoadCombobox').html('').append(optionData);
            //loadMultiselect($('#subRoadCombobox').val());
        }
    }, "json");

}

function meterReaderSelectBox(selectedValue, callBack) {
    var optionData = new Array();

    $.post("views/loadComboBox.php", {comboBox: 'meterReaderCombobox'}, function(e) {
        if (e == undefined || e.length == 0 || e == null) {
            alert('no data');
        } else {
            $.each(e, function(index, value) {                
                    optionData += '<option value="' + value.id + '" selected>' + value.name + '</option>';               
            });
            $('#meterReaderCombobox').html('').append(optionData);
        }
    }, "json");

}


function loadCustomersMultiSelectBox(subRoadID, callBack) {
    var optionData = new Array();

    $.post("views/loadComboBox.php", {comboBox: 'selectCusMulti',SubroadID: subRoadID}, function(e) {
        $('#my-select').children().remove()
        $('#my-select').multiSelect('refresh');
        if (e == undefined || e.length == 0 || e == null) {
            $('#my-select').multiSelect('refresh');
        } else {
                var cnt=0;
                $.each(e, function(index, value) {
                    optionData[index] = {value: value.cus_id, text:  value.name, index: index};
                });
            $('#my-select').multiSelect('addOption', optionData); //alert('data loaded to the muliselect');
            if (callBack !== undefined) {
                if (typeof callBack === 'function') {
                    callBack();
                }
            }
        }
    }, "json");

}

function selectCustomersMultiSelectBox(subRoadID, selectedValue, callBack) {
   var optionData = new Array();

    $.post("views/loadComboBox.php", {comboBox: 'selectCusMulti',SubroadID: subRoadID}, function(e) { alert('got 1 '+e);
        if (e == undefined || e.length == 0 || e == null) {
            alert('no data');
        } else {
            $.each(e, function(index, value) {
                if (selectedValue === value.name) {
                    optionData.push(value.name);
                } else {
                    optionData.push(value.name);
                }
            });
            alert('got 2 '+optionData );
            //$('#my-select').multiSelect('select', optionData);
            $('#my-select').multiSelect('addOption', optionData);
        }
    }, "json");

}

