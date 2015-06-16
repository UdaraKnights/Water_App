<?php
require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';

function getVotesForDates($start_date, $end_date, $user) {
    $data = array();

    $str = "SELECT mi_bill.bill_date,mi_votes.vote_code 
            FROM mi_customer_payment_income_item 
            INNER JOIN mi_other_category_items ON mi_customer_payment_income_item.vote_cat_id = mi_other_category_items.id 
            INNER JOIN mi_votes ON mi_other_category_items.vote_id = mi_votes.id 
            INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
            INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id 
            WHERE mi_bill.bill_date BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}'
            AND mi_bill.bill_issud_system_user_id = '{$_POST['user']}'
            GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result = mysql_query($str);
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row['vote_code'];
        }
    }
    //**
    $str2 = "SELECT mi_bill.bill_date,mi_votes.vote_code FROM mi_votes
    INNER JOIN mi_sub_two_income_category ON mi_sub_two_income_category.vote_id = mi_votes.id
    INNER JOIN mi_customer_payment_income_item ON mi_customer_payment_income_item.vote_cat_id = mi_sub_two_income_category.id
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
    WHERE mi_bill.bill_date BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}'
    AND mi_bill.bill_issud_system_user_id = '{$_POST['user']}'
    GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result2 = mysql_query($str2);
    if ($result2) {
        while ($row2 = mysql_fetch_assoc($result2)) {
            $data[] = $row2['vote_code'];
        }
    }
    //**
    return $data;
}

function getbilliddataforbillreport($bid, $start_date, $end_date) {
    $data = array();

    $str = "SELECT mi_bill.bill_date,mi_votes.vote_code AS vcode,mi_bill.bill_id, Sum(mi_customer_payment_income_item.total_payable_amount_without_vat) AS sumvat 
    FROM mi_customer_payment_income_item 
    INNER JOIN mi_other_category_items ON mi_customer_payment_income_item.vote_cat_id = mi_other_category_items.id 
    INNER JOIN mi_votes ON mi_other_category_items.vote_id = mi_votes.id 
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id 
    WHERE mi_bill.bill_date BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}' 
    AND mi_bill.bill_issud_system_user_id = '{$_POST['user']}'
    GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result = mysql_query($str);
    if ($result) {
        while ($row = mysql_fetch_assoc($result)) {
            $data["{$row['vcode']}"] = $row['sumvat'];
        }
    }

    $str2 = "SELECT mi_bill.bill_date,mi_votes.vote_code AS vcode, mi_bill.bill_id, SUM(mi_customer_payment_income_item.total_payable_amount_without_vat) AS sumvat 
            FROM mi_votes 
            INNER JOIN mi_sub_two_income_category ON mi_sub_two_income_category.vote_id = mi_votes.id 
            INNER JOIN mi_customer_payment_income_item ON mi_customer_payment_income_item.vote_cat_id = mi_sub_two_income_category.id 
            INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
            INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id 
            WHERE mi_bill.bill_date BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}' 
            AND mi_bill.bill_id = '{$bid}' 
            AND mi_bill.bill_issud_system_user_id = '{$_POST['user']}'
            GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result2 = mysql_query($str2);
    if ($result2) {
        while ($row2 = mysql_fetch_assoc($result2)) {
            if (array_key_exists("{$row2['vcode']}", $data)) {
                $data["{$row2['vcode']}"] += $row2['sumvat'];
            } else {
                $data["{$row2['vcode']}"] = $row2['sumvat'];
            }
        }
    }

    return $data;
}
?>
<table class="table table-bordered table-striped table-hover" id="reportdailyTable">
    <thead>
        <tr>
            <td>ලදුපත් අංකය</td>

            <td>මුදල්</td>
            <td>චෙක්පත්</td>
            <td>මුළු එකතුව</td>
            <?php
            $tdat = getVotesForDates($_POST['from_date'], $_POST['to_date'], $_POST['user']);
            $dat = array_unique($tdat);
            foreach ($dat as $v) {
                echo "<td>{$v}</td>";
            }
            ?>
            <td>වැට්</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $totals = array();
        $totals['cash'] = 0.0;
        $totals['cheques'] = 0.0;
        $totals['total'] = 0.0;
        foreach ($dat as $k => $v) {
            $totals["{$v}"] = 0.0;
        }
        $totals['vat'] = 0.0;

        $query = "SELECT
mi_bill.bill_id AS billid,
Sum(mi_customer_payment_income_item.vat_amount) AS VAT,
Sum(mi_customer_payment_income_item.total_payable_amount_with_vat) AS SUMWVat,
mi_payment_proceed_data.payment_type,
mi_bill.bill_date AS bdate
FROM mi_customer_payment_income_item
INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id
INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
WHERE
mi_bill.bill_date BETWEEN '{$_POST['from_date']}' AND '{$_POST['to_date']}'
AND mi_bill.bill_issud_system_user_id = '{$_POST['user']}'
GROUP BY  mi_bill.bill_date,payment_type";

        $result = mysql_query($query);
        if ($result) {
            while ($row = mysql_fetch_assoc($result)) {
                $billid = $row['billid'];
                $bdate = $row['bdate'];
                $vat = $row['VAT'];
                $vats = number_format($row['VAT'], 2);
                $sumwvat = $row['SUMWVat'];
                $sumwvats = number_format($row['SUMWVat'], 2);
                $payment_Type = $row['payment_type'];
                echo "<tr>";
//                echo "<td>{$billid}</td>";
                echo "<td>{$bdate}</td>";

                echo "<td><span class=\"pull-right\">";
                if ($payment_Type == 3) {
                    echo $sumwvats;
                } else {
                    
                } "</span></td>"; # cash

                echo "<td><span class=\"pull-right\">";
                if ($payment_Type == 4) {
                    echo $sumwvats;
                } else {
                    
                } "</span></td>"; # cheque0

                if ($payment_Type == 3) {
                    $totals['cash'] += $sumwvat;
                } else {
                    $totals['cheques'] += $sumwvat;
                }

                echo "<td><span class=\"pull-right\">{$sumwvats}</span></td>"; # total
                $totals['total'] += $sumwvat;
                $vcodesumvat = getbilliddataforbillreport($billid, $_POST['from_date'], $_POST['to_date']);
                foreach ($dat as $voteid) {
                    if (array_key_exists($voteid, $vcodesumvat)) {
                        $vidamount = $vcodesumvat["{$voteid}"];
                        $totals["{$voteid}"] += $vidamount;
                        $vidam = number_format($vidamount, 2);
                        echo "<td><span class=\"pull-right\">{$vidam}</span></td>";
                    } else {
                        $vidamount = 0.0;
                        echo "<td><span class=\"pull-right\">-</span></td>";
                    }
                }
                echo "<td><span class=\"pull-right\">{$vats}</span></td>"; # vat
                $totals['vat'] += $vat;
                echo "<tr>";
            }
        } else {
            //nothing for the date range
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td>මුළු එකතුව : </td>
            <?php
            echo "<td><strong><span class=\"pull-right\">{$totals['cash']}</span></strong></td>";
            echo "<td><strong><span class=\"pull-right\">{$totals['cheques']}</span></strong></td>";
            echo "<td><strong><span class=\"pull-right\">{$totals['total']}</span></strong></td>";
            foreach ($dat as $v) {
                echo "<td><strong><span class=\"pull-right\">{$totals["{$v}"]}</span></strong></td>";
            }
            echo "<td><strong><span class=\"pull-right\">{$totals['vat']}</span></strong></td>";
            ?>
        </tr>
    </tfoot>
</table>
