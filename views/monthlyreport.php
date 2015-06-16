<?php
require_once '../config/dbc.php';
require_once '../class/database.php';
require_once '../class/systemSetting.php';

function getVotesForDates($start_date, $end_date, $user) {
    $data = array();
    $query = "SELECT mi_votes.vote_code AS vcode 
    FROM mi_customer_payment_income_item 
    INNER JOIN mi_other_category_items ON mi_customer_payment_income_item.vote_cat_id = mi_other_category_items.id 
    INNER JOIN mi_votes ON mi_other_category_items.vote_id = mi_votes.id 
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id 
    WHERE mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}' 
    AND mi_bill.bill_issud_system_user_id = '{$user}' 
    GROUP BY mi_votes.vote_code";
    $result = mysql_query($query);
    if ($result) {
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row['vcode'];
            }
        }
    }
    $query = "SELECT mi_votes.vote_code AS vcode FROM mi_votes
    INNER JOIN mi_sub_two_income_category ON mi_sub_two_income_category.vote_id = mi_votes.id
    INNER JOIN mi_customer_payment_income_item ON mi_customer_payment_income_item.vote_cat_id = mi_sub_two_income_category.id
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
    WHERE mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}'
    AND mi_bill.bill_issud_system_user_id = '{$user}'
    GROUP BY mi_votes.vote_code";
    $result = mysql_query($query);
    if ($result) {
        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $data[] = $row['vcode'];
            }
        }
    }
    return $data;
}

function totalCashChequeArrays($casharray, $chequearray) {
    $data = array();
    $ca = array_merge($casharray, $chequearray);
    foreach ($ca as $k => $v) {
        $data[$k] = array(
            'VATAMOUNT' => 0,
            'WITHOUTVAT' => 0
        );
    }

    foreach ($casharray as $cak => $cav) {
        $data[$cak]['VATAMOUNT'] += $cav['VATAMOUNT'];
        $data[$cak]['WITHOUTVAT'] += $cav['WITHOUTVAT'];
    }

    foreach ($chequearray as $chq => $chqv) {
        $data[$chq]['VATAMOUNT'] += $chqv['VATAMOUNT'];
        $data[$chq]['WITHOUTVAT'] += $chqv['WITHOUTVAT'];
    }

    return $data;
}

function getCashDataByDate($start_date, $end_date, $user) {
    $cashdata = array();
    $cashquery = "SELECT mi_bill.bill_date AS BILLDATE, Sum(mi_customer_payment_income_item.vat_amount) AS VATAMOUNT,
    Sum(mi_customer_payment_income_item.total_payable_amount_without_vat) AS WITHOUTVAT
    FROM mi_payment_proceed_data
    INNER JOIN mi_customer_payment_income_item ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
    WHERE mi_payment_proceed_data.payment_type = '3' AND mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}' AND mi_bill.bill_issud_system_user_id = '{$user}' 
    GROUP BY mi_bill.bill_date";

    $cashresult = mysql_query($cashquery);
    if ($cashresult) {
        while ($cashrow = mysql_fetch_assoc($cashresult)) {
            $billdate = $cashrow['BILLDATE'];
            $vatam = $cashrow['VATAMOUNT'];
            $withoutvam = $cashrow['WITHOUTVAT'];

            $cashdata[$billdate] = array(
                'BILLDATE' => $billdate,
                'VATAMOUNT' => $vatam,
                'WITHOUTVAT' => $withoutvam
            );
        }
    }
    return $cashdata;
}

function getChequeDataByDate($start_date, $end_date, $user) {
    $chqdata = array();
    $chqquery = "SELECT mi_bill.bill_date AS BILLDATE, Sum(mi_customer_payment_income_item.vat_amount) AS VATAMOUNT,
    Sum(mi_customer_payment_income_item.total_payable_amount_without_vat) AS WITHOUTVAT 
    FROM mi_payment_proceed_data 
    INNER JOIN mi_customer_payment_income_item ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id 
    WHERE mi_payment_proceed_data.payment_type = '4' AND mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}' AND mi_bill.bill_issud_system_user_id = '{$user}' 
    GROUP BY mi_bill.bill_date";

    $chqresult = mysql_query($chqquery);
    if ($chqresult) {
        while ($chqrow = mysql_fetch_assoc($chqresult)) {
            $billdate = $chqrow['BILLDATE'];
            $vatam = $chqrow['VATAMOUNT'];
            $withoutvam = $chqrow['WITHOUTVAT'];

            $chqdata[$billdate] = array(
                'BILLDATE' => $billdate,
                'VATAMOUNT' => $vatam,
                'WITHOUTVAT' => $withoutvam
            );
        }
    }
    return $chqdata;
}

function getbilliddataforbillreport($start_date, $end_date, $user) {
    $data = array();
    $q1 = "SELECT
    mi_bill.bill_date,
    mi_votes.vote_code AS vcode,
    Sum(mi_customer_payment_income_item.total_payable_amount_without_vat) AS sumvat
    FROM mi_customer_payment_income_item 
    INNER JOIN mi_other_category_items ON mi_customer_payment_income_item.vote_cat_id = mi_other_category_items.id 
    INNER JOIN mi_votes ON mi_other_category_items.vote_id = mi_votes.id 
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
    WHERE mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}'  
    AND mi_bill.bill_issud_system_user_id = '{$user}'
    GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result1 = mysql_query($q1);
    if ($result1) {
        if (mysql_num_rows($result1) > 0) {
            while ($row = mysql_fetch_assoc($result1)) {
                $billdate = $row['bill_date'];
                $vcode = $row['vcode'];
                $sumvat = $row['sumvat'];
                if (array_key_exists(($billdate . $vcode), $data)) {
                    $data["{$billdate}_{$vcode}"] += $sumvat;
                } else {
                    $data["{$billdate}_{$vcode}"] = $sumvat;
                }
            }
        }
    }

    $q2 = "SELECT
    mi_votes.vote_code AS vcode,
    Sum(mi_customer_payment_income_item.total_payable_amount_without_vat) AS sumvat,
    mi_bill.bill_date
    FROM mi_votes 
    INNER JOIN mi_sub_two_income_category ON mi_sub_two_income_category.vote_id = mi_votes.id 
    INNER JOIN mi_customer_payment_income_item ON mi_customer_payment_income_item.vote_cat_id = mi_sub_two_income_category.id 
    INNER JOIN mi_payment_proceed_data ON mi_payment_proceed_data.cus_id = mi_customer_payment_income_item.cus_id 
    INNER JOIN mi_bill ON mi_bill.bill_proceed_id = mi_payment_proceed_data.proceed_id
    WHERE mi_bill.bill_date BETWEEN '{$start_date}' AND '{$end_date}'  
    AND mi_bill.bill_issud_system_user_id = '{$user}'
    GROUP BY mi_votes.vote_code,mi_bill.bill_date";
    $result2 = mysql_query($q2);
    if ($result2) {
        if (mysql_num_rows($result2) > 0) {
            while ($row = mysql_fetch_assoc($result2)) {
                $billdate = $row['bill_date'];
                $vcode = $row['vcode'];
                $sumvat = $row['sumvat'];
                if (array_key_exists(($billdate . $vcode), $data)) {
                    $data["{$billdate}_{$vcode}"] += $sumvat;
                } else {
                    $data["{$billdate}_{$vcode}"] = $sumvat;
                }
            }
        }
    }

    return $data;
}
?>
<table class="table table-bordered table-striped table-hover" id="reportdailyTable">
    <thead>
        <tr>
            <td>දිනය</td>

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

        $cashByDate = getCashDataByDate($_POST['from_date'], $_POST['to_date'], $_POST['user']);
        $chequeByDate = getChequeDataByDate($_POST['from_date'], $_POST['to_date'], $_POST['user']);

        $totalByDate = totalCashChequeArrays($cashByDate, $chequeByDate);
        $bdfr = getbilliddataforbillreport($_POST['from_date'], $_POST['to_date'], $_POST['user']);
        foreach ($totalByDate as $k => $v) {
            $VAM = $v['VATAMOUNT'];
            $WIAM = $v['WITHOUTVAT'];
            $wamca = array_key_exists("$k", $cashByDate) ? $cashByDate[$k]['WITHOUTVAT'] + $cashByDate[$k]['VATAMOUNT'] : 0;
            $wamcq = array_key_exists("$k", $chequeByDate) ? $chequeByDate[$k]['WITHOUTVAT'] + $chequeByDate[$k]['VATAMOUNT'] : 0;

            echo "<tr>";
            echo "<td>{$k}</td>";
            echo "<td><span class=\"pull-right\">" . number_format($wamca, 2) . "</span></td>";
            $totals['cash'] += doubleval($wamca);
            echo "<td><span class=\"pull-right\">" . number_format($wamcq, 2) . "</span></td>";
            $totals['cheques'] += doubleval($wamcq);
            echo "<td><span class=\"pull-right\"><strong>" . number_format(($WIAM + $VAM), 2) . "</strong></span></td>";
            $totals['total'] += doubleval($WIAM + $VAM);
            foreach ($dat as $kcodev => $vcodev) {
                if (array_key_exists("{$k}_{$vcodev}", $bdfr)) {
                    $vcodeval = $bdfr["{$k}_{$vcodev}"];
                    $totals[$vcodev] += doubleval($vcodeval);
                } else {
                    $vcodeval = 0.0;
                }
                echo "<td><span class=\"pull-right\">" . number_format($vcodeval, 2) . "</span></td>";
            }
            echo "<td><span class=\"pull-right\">" . number_format($VAM, 2) . "</span></td>";
            $totals['vat'] += doubleval($VAM);
            echo "</tr>";
         
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td>මුළු එකතුව : </td>
            <?php
            echo "<td><strong><span class=\"pull-right\">" . number_format($totals['cash'], 2) . "</span></strong></td>";
            echo "<td><strong><span class=\"pull-right\">" . number_format($totals['cheques'], 2) . "</span></strong></td>";
            echo "<td><strong><span class=\"pull-right\">" . number_format($totals['total'], 2) . "</span></strong></td>";
            foreach ($dat as $v) {
                echo "<td><strong><span class=\"pull-right\">" . number_format($totals["{$v}"], 2) . "</span></strong></td>";
            }
            echo "<td><strong><span class=\"pull-right\">" . number_format($totals['vat'], 2) . "</span></strong></td>";
            
            ?>
            
        </tr>
    
       
       
    </tfoot>
</table>
