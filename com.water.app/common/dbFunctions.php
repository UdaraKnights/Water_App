<?php

class dbFunctions {

    function prepareSelectQueryForJSON($query) {
        $data = array();
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function prepareSelectQuaryForAllData($query) {
        $data = array();
        $result = mysql_query($query) or die(mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function getNextAutoIncrementID($table) {
        $result = mysql_query("SHOW TABLE STATUS LIKE '" . $table . "'");
        $row = mysql_fetch_array($result);
        return $nextId = $row['Auto_increment'];
    }

    function getFirstKey($arr) {
        reset($arr);
        return key($arr);
    }
   

    function prepareSelectQuery($query) {
        $data = array();
        $result = mysql_query($query) or die(mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function prepareCommandQuery($query, $successMsg, $errorMsg) {
        $save = mysql_query($query);
        if (isset($save) && $save) {
            echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> ' . $successMsg . ' </div>';
        } else {
            echo '<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> ' . $errorMsg . ' </div>';
        }
    }

    function prepareCommandQuerySpecial($query) {
        $save = mysql_query($query);
        if ($save) {
            return TRUE;
        } else {
            die(mysql_error());
            return FALSE;
        }
    }

    function prepareCommandQueryForAlertify($query, $successMsg, $errorMsg) {
        $save = mysql_query($query);
        if (isset($save) && $save) {
            echo json_encode(array("msgType" => 1, "msg" => $successMsg));
        } else {
            echo json_encode(array("msgType" => 2, "msg" => $errorMsg, "err" => mysql_error()));
        }
    }


    function prepareMessageForAlertify( $successMsg) {
            echo json_encode(array("msgType" => 1, "msg" => $successMsg));
    }

    function prepareQueryCount($tableName) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName;
        $countData = $this->getSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function prepareQueryCountByCondition($tableName, $colName, $colValue) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName . " WHERE " . $colName . " = '" . $colValue . "'";
        $countData = $this->prepareSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function getCountByQuery($query) {
        $count = 0;
        $queryResult = mysql_query($query);
        $count = mysql_num_rows($queryResult);
        return $count;
    }

}
?>

