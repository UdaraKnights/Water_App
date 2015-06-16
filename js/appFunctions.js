function AssginEmployee (customerIds, meterReader_id, sub_road_id, dataReq){ //alert('dd '+desig_des + ' id '+id + ' da '+dataReq);
    var strEmpIds = '';

    if(dataReq == 'save'){
        $.post('com.water.app/service/masterDataService.php', {CustomerIds: customerIds, meter_readderId:meterReader_id, subroad_id:sub_road_id,service:'save', masters_save:'assginCus'}, function(data){
            if(data.msgType === 1){
                alertify.success(data.msg);
//                LoadAssignEmpUserTable();
            }else if(data.msgType === 2){
                alertify.error(data.msg);
            }
        }, "json");
    }else if (dataReq == 'update'){
        $.post('com.health.app/service/masterDataService.php', {EmployeeIds: employeeIds, userId:user_id, service:'update', masters_save:'assginEmp'}, function(data){
            if(data.msgType === 1){
                alertify.success(data.msg);
            }else if(data.msgType === 2){
                alertify.error(data.msg);
            }
        }, "json");

    }else if(dataReq == 'delete'){
        $.post('com.health.app/service/masterDataService.php', {Category: cat, Grade_des:grade_des, service:'delete', id:id, masters_save:'assginEmp'}, function(data){
            if(data.msgType === 1){
                alertify.success(data.msg);
                gradeTable();
            }else if(data.msgType === 2){
                alertify.error(data.msg);
            }
        }, "json");
    }
}
